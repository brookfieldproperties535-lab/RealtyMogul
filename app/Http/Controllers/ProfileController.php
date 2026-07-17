<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Funds;
use App\Models\Membership;
use App\Models\OrderList;
use App\Models\Orders;
use App\Models\User;
use App\Models\UserVallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Load the user's related data using Eloquent relationships
        $user->load('membershipLevel', 'funds', 'orders');

        // Calculate total funds (sum deposits and subtract withdrawals)
        $totalDeposits = $user->funds()
            ->where('type', 'deposit')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');

        $totalWithdrawals = $user->funds()
            ->where('type', 'withdrawal')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');

        $totalCommission = $user->funds()
            ->where('type', 'commission')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');
        $totalFunds = $totalDeposits + $totalCommission - $totalWithdrawals;

        // Calculate today's orders and total order value, considering only active orders
        $todayOrders = $user->orders()
            ->where('status', 'active')
            ->get();

        // Calculate today's commission
        $todayCommission = $user->funds()
            ->where('type', 'commission')
            ->where('status', 'active')
            ->sum('amount');

        $todayOrderValue = $todayOrders->sum('total_amount');

        // Calculate daily commission based on the user's membership level
        $commissionRate = $user->membershipLevel->commission / 100;
        $dailyCommission = $todayOrderValue * $commissionRate;

        // Check for the first incomplete order
        $firstIncompleteOrder = $user->orders()
            ->where('type', 'Incomplete')
            ->where('status', 'active')
            ->first();

        $overpricedAmount = 0;
        $adjustedTotalFunds = $totalFunds;

        if ($firstIncompleteOrder) {
            // Assuming $order has a relationship to OrderList, like $firstIncompleteOrder->orderList
            $orderPrice = $firstIncompleteOrder->orderList->price; // Fetching the price from the OrderList table

            if ($orderPrice > $totalFunds) {
                $overpricedAmount = $orderPrice - $totalFunds;
            }

            // Adjust total funds by subtracting the first incomplete order's price
            $adjustedTotalFunds -= $orderPrice;
        }

        // Prepare the data to be passed to the view
        $userData = [
            'user' => $user,
            'membership_level' => $user->membershipLevel,
            'total_funds' => $adjustedTotalFunds, // Adjusted total funds
            'today_order_value' => $todayOrderValue,
            'daily_commission' => $dailyCommission,
            'today_commission' => $todayCommission,
            'overpriced_amount' => $overpricedAmount, // Add the overpriced amount
            'tasks_done' => $user->orders()->where('status', 'active')->count(),
        ];

        // Pass the data to the profile view
        return view('users.profile', ['userData' => $userData]);
    }

    public function show()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Load the user's related data using Eloquent relationships
        $user->load('membershipLevel', 'funds', 'orders');

        // Calculate total funds (sum deposits and subtract withdrawals)
        $totalDeposits = $user->funds()
            ->where('type', 'deposit')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');

        $totalWithdrawals = $user->funds()
            ->where('type', 'withdrawal')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');

        $totalCommission = $user->funds()
            ->where('type', 'commission')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');
        $totalFunds = $totalDeposits + $totalCommission - $totalWithdrawals;

        // Calculate today's orders and total order value, considering only active orders
        $todayOrders = $user->orders()
            ->where('status', 'active')
            ->get();

        // Calculate today's commission
        $todayCommission = $user->funds()
            ->where('type', 'commission')
            ->where('status', 'active')
            ->sum('amount');

        $totalTodayOrders = $todayOrders->count(); // Count the total number of today's active orders
        $todayOrderValue = $todayOrders->sum('total_amount'); // Sum the total order value for today's active orders

        // Calculate daily commission based on the user's membership level
        $commissionRate = $user->membershipLevel->commission / 100;
        $dailyCommission = $todayOrderValue * $commissionRate;

        // Check for the first incomplete order
        $firstIncompleteOrder = $user->orders()
            ->where('type', 'Incomplete')
            ->where('status', 'active')
            ->first();

        $overpricedAmount = 0;
        $adjustedTotalFunds = $totalFunds;

        if ($firstIncompleteOrder) {
            // Assuming $order has a relationship to OrderList, like $firstIncompleteOrder->orderList
            $orderPrice = $firstIncompleteOrder->orderList->price; // Fetching the price from the OrderList table

            if ($orderPrice > $totalFunds) {
                $overpricedAmount = $orderPrice - $totalFunds;
            }

            // Adjust total funds by subtracting the first incomplete order's price
            $adjustedTotalFunds -= $orderPrice;
        }

        // Fetch latest active completed orders for the dashboard recent activity table
        $recentOrders = $user->orders()
            ->with('orderList')
            ->where('status', 'active')
            ->where('type', 'Complete')
            ->latest()
            ->take(5)
            ->get();

        // Weekly earnings: commission earned each day for the last 7 days
        $weeklyEarnings = [];
        for ($i = 6; $i >= 0; --$i) {
            $date = now()->subDays($i);
            $dayAmount = (float) $user->funds()
                ->where('type', 'commission')
                ->whereIn('status', ['active', 'deactive'])
                ->whereDate('created_at', $date->toDateString())
                ->sum('amount');
            $weeklyEarnings[] = ['label' => $date->format('D'), 'amount' => $dayAmount];
        }
        $maxWeeklyEarning = max(array_column($weeklyEarnings, 'amount')) ?: 1;

        // Referrals = users who registered using this user's reference code (children)
        $referralsCount = $user->children()->count();

        // Tasks remaining today
        $taskLimit = optional($user->membershipLevel)->task_limit ?? optional($user->membershipLevel)->order_limit ?? 0;
        $tasksRemaining = max(0, $taskLimit - $totalTodayOrders);

        // Prepare the data to be passed to the dashboard view
        $userData = [
            'user' => $user,
            'membership_level' => $user->membershipLevel,
            'total_funds' => $adjustedTotalFunds, // Adjusted total funds (available)
            'total_commission' => $totalCommission, // lifetime commission total
            'today_order_value' => $todayOrderValue,
            'total_today_orders' => $totalTodayOrders, // number of today's active orders
            'daily_commission' => $dailyCommission,
            'today_commission' => $todayCommission,
            'overpriced_amount' => $overpricedAmount, // overpriced amount if any
            'recent_tasks' => $recentOrders,
            'weekly_earnings' => $weeklyEarnings,
            'max_weekly_earning' => $maxWeeklyEarning,
            'referrals_count' => $referralsCount,
            'tasks_remaining' => $tasksRemaining,
            'order_limit' => $taskLimit,
        ];

        // Render the dashboard view with prepared data
        return view('users.dashboard', ['userData' => $userData]);
    }

    /**
     * JSON earnings series (commission per bucket) for the dashboard chart widget,
     * for a given date range preset or a custom from/to range.
     */
    public function earningsChartData(Request $request)
    {
        $validRanges = ['today', 'yesterday', '7d', '30d', 'this_month', 'last_month', 'custom'];
        $range = $request->input('range', '7d');

        if (!in_array($range, $validRanges, true)) {
            return response()->json(['error' => 'Invalid range.'], 422);
        }

        $hourly = false;

        switch ($range) {
            case 'today':
                $start = now()->startOfDay();
                $end = now()->endOfDay();
                $hourly = true;
                break;
            case 'yesterday':
                $start = now()->subDay()->startOfDay();
                $end = now()->subDay()->endOfDay();
                $hourly = true;
                break;
            case '7d':
                $start = now()->subDays(6)->startOfDay();
                $end = now()->endOfDay();
                break;
            case '30d':
                $start = now()->subDays(29)->startOfDay();
                $end = now()->endOfDay();
                break;
            case 'this_month':
                $start = now()->startOfMonth();
                $end = now()->endOfDay();
                break;
            case 'last_month':
                $start = now()->subMonthNoOverflow()->startOfMonth();
                $end = now()->subMonthNoOverflow()->endOfMonth();
                break;
            case 'custom':
                $from = $request->input('from');
                $to = $request->input('to');

                if (!$from || !$to) {
                    return response()->json(['error' => 'Custom range requires from and to dates.'], 422);
                }

                try {
                    $start = Carbon::parse($from)->startOfDay();
                    $end = Carbon::parse($to)->endOfDay();
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Invalid date format.'], 422);
                }

                if ($end->lt($start)) {
                    return response()->json(['error' => 'The "to" date must be on or after the "from" date.'], 422);
                }

                if ($start->diffInDays($end) > 366) {
                    return response()->json(['error' => 'Custom range cannot exceed 366 days.'], 422);
                }

                $hourly = $start->isSameDay($end);
                break;
        }

        $user = Auth::user();

        $rows = $user->funds()
            ->where('type', 'commission')
            ->whereIn('status', ['active', 'deactive'])
            ->whereBetween('created_at', [$start, $end])
            ->selectRaw($hourly
                ? "DATE_FORMAT(created_at, '%Y-%m-%d %H:00:00') as bucket_key, SUM(amount) as amount"
                : 'DATE(created_at) as bucket_key, SUM(amount) as amount')
            ->groupBy('bucket_key')
            ->pluck('amount', 'bucket_key');

        $labels = [];
        $data = [];
        $period = CarbonPeriod::create($start, $hourly ? '1 hour' : '1 day', $end);

        foreach ($period as $bucketStart) {
            $key = $hourly ? $bucketStart->format('Y-m-d H:00:00') : $bucketStart->format('Y-m-d');
            $labels[] = $hourly ? $bucketStart->format('g A') : $bucketStart->format('D n/j');
            $data[] = (float) ($rows[$key] ?? 0);
        }

        return response()->json([
            'range' => $range,
            'granularity' => $hourly ? 'hour' : 'day',
            'labels' => $labels,
            'data' => $data,
            'total' => round(array_sum($data), 2),
            'from' => $start->format('Y-m-d'),
            'to' => $end->format('Y-m-d'),
        ]);
    }

    public function userRegisteration(Request $request)
    {
        $rules = [
            'name' => 'required|unique:users,name',
            'phone' => 'required|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'wallet-password' => 'required',
            'refrence-code' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter your full name.',
            'name.unique' => 'This name is already registered. Try another or login.',
            'phone.required' => 'Please enter your mobile number.',
            'phone.unique' => 'This mobile number is already registered.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least :min characters.',
            'wallet-password.required' => 'Please provide a wallet password.',
            'refrence-code.required' => 'Please enter a valid reference code.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Verify the reference code exists manually for a friendlier error message
        $referenceUser = User::where('reference_code', $request->input('refrence-code'))->first();
        if (!$referenceUser) {
            return redirect()->back()
                ->withErrors(['refrence-code' => 'Reference code not found. Please check the code and try again.'])
                ->withInput();
        }

        // Generate a unique reference code for the new user
        $referenceCode = $this->generateReferenceCode();

        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->vallet_password = Hash::make($request->input('wallet-password'));
            $user->reference_code = $referenceCode;
            $user->parent_id = $referenceUser->id;
            $user->membership_level_id = 1;
            $user->credibility = 100;
            $user->status = 'active';
            $user->wallet_status = 'deactive';
            $user->withdraw_status = 'deactive';
            $user->user_type = 0;
            $user->min_withdraw = 50;
            $user->max_withdraw = 500;
            $user->remember_token = Str::random(10);
            $user->save();

            // Opening balance for new user
            $funds = new Funds();
            $funds->user_id = $user->id;
            $funds->amount = 5;
            $funds->type = 'deposit';
            $funds->status = 'active';
            $funds->save();
        } catch (\Illuminate\Database\QueryException $ex) {
            Log::error('User registration failed: '.$ex->getMessage());

            return redirect()->back()->withInput()
                ->withErrors(['db_error' => 'Registration failed due to a server error. Please try again later.']);
        } catch (\Exception $ex) {
            Log::error('User registration unexpected error: '.$ex->getMessage());

            return redirect()->back()->withInput()
                ->withErrors(['error' => 'An unexpected error occurred. Please try again.']);
        }

        return redirect()->route('user.login')
            ->with('success', 'Registration successful! You have received an opening balance of $15.');
    }

    /**
     * Generate a unique 6-digit reference code.
     *
     * @return string
     */
    protected function generateReferenceCode()
    {
        do {
            $code = strtoupper(Str::random(6)); // Generate a random string
        } while (User::where('reference_code', $code)->exists()); // Ensure uniqueness

        return $code;
    }

    public function showWalletInformation()
    {
        $user = Auth::user();
        $wallet = UserVallet::where('user_id', $user->id)->first();

        return view('user.wallet-info', ['wallet' => $wallet]);
    }

    public function storeWalletInformation(Request $request)
    {
        // Checkpoint: deactive wallets cannot save wallet information. The view
        // hides the form, but this guard stops direct POSTs to the endpoint too.
        if (Auth::user()->wallet_status !== 'active') {
            return redirect()->route('wallet-information')
                ->with('error', 'Your wallet status is deactive. Please contact support and pay the activation fee to add wallet information.');
        }

        $request->validate([
            'vallet-address' => 'required|string|max:255',
            'phone-number' => 'required|numeric',
            'wallet-type' => 'required|string',
        ]);

        $user = Auth::user();

        // Map the request fields to the appropriate database columns
        $walletData = [
            'user_id' => $user->id,
            'vallet_address' => $request->input('vallet-address'),
            'type' => $request->input('wallet-type'),
            'phone' => $request->input('phone-number'),
        ];

        // Use updateOrCreate to either update existing record or create a new one
        UserVallet::updateOrCreate(
            ['user_id' => $user->id],
            $walletData
        );

        return redirect()->route('wallet-information')->with('success', 'Wallet information saved successfully.');
    }

    public function invitation()
    {// Get the currently authenticated user
        $user = Auth::user();

        // Fetch the invitation code from the user's record
        $invitationCode = $user->reference_code;

        // Pass the invitation code to the view
        return view('user.invitation', ['invitationCode' => $invitationCode]);
    }

    public function showBalanceinRecharge()
    {
        // Get the current logged-in user
        $user = Auth::user();

        // Calculate the total balance using Eloquent
        $totalCommission = Funds::where('user_id', $user->id)
                                 ->where('type', 'commission')
                                 ->whereIn('status', ['active', 'deactive'])
                                 ->sum('amount');

        $totalDeposit = Funds::where('user_id', $user->id)
                              ->where('type', 'deposit')
                              ->whereIn('status', ['active', 'deactive'])
                              ->sum('amount');

        $totalWithdraw = Funds::where('user_id', $user->id)
                               ->where('type', 'withdrawal')
                               ->whereIn('status', ['active', 'deactive'])
                               ->sum('amount');

        // Calculate the total balance
        $totalBalance = $totalCommission + $totalDeposit - $totalWithdraw;

        // Fetch the first incomplete order for today
        $firstIncompleteOrder = Orders::where('user_id', $user->id)
            ->where('type', 'Incomplete')
            ->where('status', 'active')
            ->first();
        if ($firstIncompleteOrder) {
            // Fetch the price from the OrderList table
            $orderPrice = $firstIncompleteOrder->orderList->price;

            // Determine if the order is overpriced compared to the user's total funds
            if ($orderPrice > $totalBalance) {
                $overpricedAmount = $orderPrice - $totalBalance;
            }

            // Adjust total funds by subtracting the first incomplete order's price
            $totalBalance -= $orderPrice;
        }

        return view('users.recharge', ['totalBalance' => $totalBalance]);
    }

    public function showRedemption()
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');

        // Calculate total funds (deposit + commission - withdrawal)
        $totalDeposits = $user->funds()->where('type', 'deposit')->whereIn('status', ['active', 'deactive'])->sum('amount');
        $totalWithdrawals = $user->funds()->where('type', 'withdrawal')->whereIn('status', ['active', 'deactive'])->sum('amount');
        $totalCommission = $user->funds()->where('type', 'commission')->whereIn('status', ['active', 'deactive'])->sum('amount');
        $totalFunds = $totalDeposits + $totalCommission - $totalWithdrawals;

        // Initialize variables for overpriced amount and adjusted total funds
        $overpricedAmount = 0;
        $adjustedTotalFunds = $totalFunds;

        // Fetch the first incomplete order for today
        $firstIncompleteOrder = Orders::where('user_id', $user->id)
            ->where('type', 'Incomplete')
            ->where('status', 'active')
            ->first();

        if ($firstIncompleteOrder) {
            // Fetch the price from the OrderList table
            $orderPrice = $firstIncompleteOrder->orderList->price;

            // Determine if the order is overpriced compared to the user's total funds
            if ($orderPrice > $totalFunds) {
                $overpricedAmount = $orderPrice - $totalFunds;
            }

            // Adjust total funds by subtracting the first incomplete order's price
            $adjustedTotalFunds -= $orderPrice;
        }

        // Get today's order count and user's membership details
        $todaysOrdersCount = Orders::where('user_id', $user->id)
            ->where('status', 'active')
            ->count();

        $membership = $user->membershipLevel;

        return view('users.redemption', compact('adjustedTotalFunds', 'overpricedAmount', 'todaysOrdersCount', 'membership'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('user.login');
    }

    public function changeLoginPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update the login password
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('pass_status', 'Login password successfully updated.');
    }

    // Method for changing the wallet password
    public function changeWalletPassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_wallet_password' => 'required',
            'new_wallet_password' => 'required|confirmed',
        ]);

        // Check if the current wallet password matches
        if (!Hash::check($request->current_wallet_password, Auth::user()->vallet_password)) {
            return back()->withErrors(['current_wallet_password' => 'Current wallet password is incorrect']);
        }

        // Update the wallet password
        Auth::user()->update([
            'vallet_password' => Hash::make($request->new_wallet_password),
        ]);

        return back()->with('pass_status', 'Wallet password successfully updated.');
    }

    public function redeem(Request $request)
    {
        $userId = Auth::id();

        $user = User::findOrFail($userId);

        // Get the current user's membership and order limits
        $membership = Auth::user()->membershipLevel;
        if ($user->wallet_status != 'active') {
            return redirect()->back()->with('error', 'Your withdrawal is on hold, please contact support.');
        }
        // Checkpoint: withdrawals explicitly deactivated by admin are blocked. The page
        // hides the form, but this guard stops direct POSTs to the endpoint too.
        if (($user->withdraw_status ?? '') === 'deactive') {
            return redirect()->back()->with('error', 'Your withdrawal status is deactive. Please connect with the support assistant to get it activated.');
        }
        // Count only COMPLETED orders — Incomplete orders do not count toward the limit
        $todaysOrdersCount = Orders::where('user_id', $userId)
                                ->where('type', 'Complete')
                                ->where('status', 'active')
                                ->count();

        // Calculate the user's available balance — include deactive so reset orders don't wipe balance
        $availableBalance = Funds::where('user_id', $userId)
                                ->whereIn('type', ['commission', 'deposit'])
                                ->whereIn('status', ['active', 'deactive'])
                                ->sum('amount')
                            - Funds::where('user_id', $userId)
                                    ->where('type', 'withdrawal')
                                    ->whereIn('status', ['active', 'deactive'])
                                    ->sum('amount');

        // Allow withdrawal if: no tasks started today (0), OR all tasks completed (>= limit)
        // Block only when the user is mid-way through their daily task cycle
        if ($todaysOrdersCount > 0 && $todaysOrdersCount < $membership->order_limit) {
            return redirect()->back()->with('error', 'You cannot withdraw while tasks are in progress. Completed: '.$todaysOrdersCount.' / '.$membership->order_limit.'. Finish all tasks or start fresh tomorrow.');
        }

        // Enforce min/max withdrawal limits from the user's profile
        $minWithdraw = $user->min_withdraw ?? 20;
        $maxWithdraw = is_numeric($user->max_withdraw)
            ? min($user->max_withdraw, $availableBalance)
            : $availableBalance;

        $request->validate([
            'amount' => ['required', 'numeric', 'min:'.$minWithdraw, 'max:'.$maxWithdraw],
            'password' => 'required',
        ], [
            'amount.min' => 'The minimum withdrawal amount is $'.number_format($minWithdraw, 2).'.',
            'amount.max' => 'The maximum withdrawal amount is $'.number_format($maxWithdraw, 2).' (based on your limit or available balance).',
        ]);

        // Validate wallet password
        if (!Hash::check($request->password, Auth::user()->vallet_password)) {
            return redirect()->back()->with('error', 'Invalid wallet password.');
        }

        // Deduct the requested amount from the user's available balance
        $deductedAmount = $request->amount;

        // Create a new withdrawal record for the user
        $withdrawal = new Funds();
        $withdrawal->user_id = $user->id;
        $withdrawal->amount = $deductedAmount;
        $withdrawal->type = 'withdrawal';
        // mark withdrawal as pending for admin review
        $withdrawal->status = 'pending';
        $withdrawal->save();

        return redirect()->back()->with('success', 'Redemption successful! Your request will be processed shortly.');
    }

    public function rechargeHistory()
    {
        // Fetch the recharge history for the authenticated user with active status
        $rechargeHistory = Funds::where('user_id', Auth::id())
                                ->where('status', 'active')
                                ->where('type', 'deposit')
                                ->orderBy('created_at', 'desc')
                                ->take(10)
                                ->get();

        return view('users.recharge-history', compact('rechargeHistory'));
    }

    public function redemptionHistory()
    {
        // Fetch the recharge history for the authenticated user with active status
        $redemptionHistory = Funds::where('funds.user_id', Auth::id())
                                  ->where('funds.status', 'active')
                                  ->where('funds.type', 'withdrawal')
                                  ->join('user_vallets', 'user_vallets.user_id', '=', 'funds.user_id')
                                  ->select('funds.*', 'user_vallets.vallet_address')
                                  ->orderBy('funds.created_at', 'desc')
                                  ->take(10)
                                  ->get();

        return view('users.redemption-history', compact('redemptionHistory'));
    }

    public function storeRecharge(Request $request)
    {
        // Validate the incoming request (only required fields for Funds table)
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:10',
        ]);

        $user = Auth::user();

        // Create a new fund entry with pending status.
        // Only store the minimal fields required in the `funds` table as requested.
        Funds::create([
            'user_id' => $user->id,
            'amount' => $request->input('amount'),
            'type' => 'deposit',
            'status' => 'pending',
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Your funds have been submitted and will be shown in your account soon.');
    }
}
