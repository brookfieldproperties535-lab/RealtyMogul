<?php

namespace App\Http\Controllers;

use App\Models\Funds;
use App\Models\Members;
use App\Models\Membership;
use App\Models\OrderList;
use App\Models\Orders;
use App\Models\ReferenceCodes;
use App\Models\SelectedOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently logged-in user
        $loggedInUser = auth()->user();

        // Eager-load only what each row actually reads (membership + parent name).
        // The old with(['funds','orders']) was wasted: the loop below called the
        // relationship methods (->funds()/->orders()), which re-query the DB.
        $query = User::with(['membershipLevel', 'parent'])->orderBy('id', 'desc');

        // If the logged-in user is a moderator, restrict the query to only their children
        // if ($loggedInUser->user_type == 2) { // Assuming 2 is the user_type for moderators
        // $query->where('parent_id', $loggedInUser->id);
        // }
        // Apply filtering based on user type
        if ($loggedInUser->user_type === 1) {
            // Super admin sees all users
        } elseif ($loggedInUser->user_type === 2) { // Moderator/Editor
            // Filter users where parent_id is either the current user or their descendants
            $descendantIds = User::where('parent_id', $loggedInUser->id)->pluck('id')->toArray();
            $query->where(function ($subquery) use ($loggedInUser, $descendantIds) {
                $subquery->where('parent_id', $loggedInUser->id)
                    ->orWhereIn('parent_id', $descendantIds);
            });
        } else {
            // Normal user (user_type 0) shouldn't reach here (handled by authentication)
            abort(403, 'Unauthorized access');
        }

        // Navbar search filter — searches name, email, phone, reference code
        $searchQuery = request('q');
        if ($searchQuery) {
            $query->where(function ($sub) use ($searchQuery) {
                $sub->where('name',           'like', "%{$searchQuery}%")
                    ->orWhere('email',         'like', "%{$searchQuery}%")
                    ->orWhere('phone',         'like', "%{$searchQuery}%")
                    ->orWhere('reference_code','like', "%{$searchQuery}%");
            });
        }

        // Fetch the users according to the query
        $users = $query->get();
        $ids = $users->pluck('id');

        // ── Per-user totals in a handful of grouped queries ─────────────────
        // (was ~8 queries per user → ~1000 for 108 users → nginx 504 on live).
        // Each helper returns a collection keyed by user_id.
        $sumFunds = function (string $type, array $statuses, bool $todayOnly = false) use ($ids) {
            $q = Funds::whereIn('user_id', $ids)
                ->where('type', $type)
                ->whereIn('status', $statuses);
            if ($todayOnly) {
                $q->whereDate('created_at', today());
            }

            return $q->groupBy('user_id')
                ->selectRaw('user_id, SUM(amount) as total')
                ->pluck('total', 'user_id');
        };

        $deposits    = $sumFunds('deposit',    ['active', 'deactive']);
        $withdrawals = $sumFunds('withdrawal', ['active', 'deactive']);
        $commission  = $sumFunds('commission', ['active']);            // commission: active only
        $dailyComm   = $sumFunds('commission', ['active'], true);      // today's active commission

        // Today's active order value, and active order count — grouped per user.
        $todayOrderValue = Orders::whereIn('user_id', $ids)
            ->where('status', 'active')
            ->whereDate('created_at', today())
            ->groupBy('user_id')
            ->selectRaw('user_id, SUM(total_amount) as total')
            ->pluck('total', 'user_id');

        $activeOrderCount = Orders::whereIn('user_id', $ids)
            ->where('status', 'active')
            ->groupBy('user_id')
            ->selectRaw('user_id, COUNT(*) as c')
            ->pluck('c', 'user_id');

        // Oldest incomplete active order's price, per user (normally ≤ 1 per user).
        $firstIncompletePrice = [];
        Orders::whereIn('user_id', $ids)
            ->where('type', 'Incomplete')
            ->where('status', 'active')
            ->with('orderList:id,price')
            ->orderBy('created_at', 'asc')
            ->get()
            ->each(function ($o) use (&$firstIncompletePrice) {
                if (!array_key_exists($o->user_id, $firstIncompletePrice)) {
                    $firstIncompletePrice[$o->user_id] = (float) optional($o->orderList)->price;
                }
            });

        // ── Map each user to its display row — no per-user queries here ─────
        $userData = $users->map(function ($user) use (
            $deposits, $withdrawals, $commission, $dailyComm,
            $todayOrderValue, $activeOrderCount, $firstIncompletePrice
        ) {
            $totalDeposits    = (float) ($deposits[$user->id] ?? 0);
            $totalWithdrawals = (float) ($withdrawals[$user->id] ?? 0);
            $totalCommission  = (float) ($commission[$user->id] ?? 0);
            $incPrice         = (float) ($firstIncompletePrice[$user->id] ?? 0);

            $balance   = $totalDeposits + $totalCommission - $totalWithdrawals;
            $available = $balance - $incPrice;

            return [
                'user' => $user,
                'membership_level' => $user->membershipLevel,
                'total_order_limit' => $user->membershipLevel->order_limit ?? 0,
                'processed_orders_count' => (int) ($activeOrderCount[$user->id] ?? 0),
                'today_order_value' => (float) ($todayOrderValue[$user->id] ?? 0),
                'balance' => $balance,
                'available' => $available,
                'daily_commission' => (float) ($dailyComm[$user->id] ?? 0),
                'commission_percent' => $user->membershipLevel->commission ?? 0,
                'parent_name' => $user->parent ? $user->parent->name : 'N/A',
                'last_login' => $user->updated_at,
            ];
        });

        return view('admin.clients', ['users' => $userData]);
    }

    public function dashboard()
    {
        // ── USER STATS ──────────────────────────────────────────────────────
        $totalUsers = User::count();
        $newClients = User::where('created_at', '>=', now()->subDays(30))->count();
        $newUsersPercent = $totalUsers > 0 ? round(($newClients / $totalUsers) * 100) : 0;
        $repeatUsersPercent = 100 - $newUsersPercent;
        $activeUsersCount = User::where('status', 'active')->count();

        // ── ORDER STATS ─────────────────────────────────────────────────────
        $totalOrderListCount = OrderList::count();
        $activeOrderLists = OrderList::where('status', 'active')->count();
        $newInvoices = Orders::where('created_at', '>=', now()->subDays(30))->count();
        $totalOrdersCount = Orders::count();
        $totalActiveOrders = Orders::where('status', 'active')->count();
        $newSalesValue = Orders::where('created_at', '>=', now()->subDays(30))->sum('total_amount');

        // ── FINANCIAL TOTALS ────────────────────────────────────────────────
        $totalDeposits = Funds::where('type', 'deposit')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');
        $totalWithdrawals = Funds::where('type', 'withdrawal')
            ->whereIn('status', ['active', 'deactive'])
            ->sum('amount');
        $totalCommission = Funds::where('type', 'commission')
            ->where('status', 'active')
            ->sum('amount');
        $availableBalance = $totalDeposits + $totalCommission - $totalWithdrawals;

        // Pending financial requests
        $pendingRechargeCount = Funds::where('type', 'deposit')->where('status', 'pending')->count();
        $pendingWithdrawalCount = Funds::where('type', 'withdrawal')->where('status', 'pending')->count();
        $pendingRechargeAmount = Funds::where('type', 'deposit')->where('status', 'pending')->sum('amount');
        $pendingWithdrawalAmount = Funds::where('type', 'withdrawal')->where('status', 'pending')->sum('amount');
        $approvedDeposits = Funds::where('type', 'deposit')->whereIn('status', ['active', 'deactive'])->sum('amount');

        // ── WEEKLY SALES ─────────────────────────────────────────────────────
        $thisWeekSales = Orders::where('created_at', '>=', now()->startOfWeek())
                               ->sum('total_amount');
        $lastWeekSales = Orders::whereBetween('created_at', [
            now()->subWeek()->startOfWeek(),
            now()->subWeek()->endOfWeek(),
        ])->sum('total_amount');
        $weeklyChangePercent = $lastWeekSales > 0
            ? round((($thisWeekSales - $lastWeekSales) / $lastWeekSales) * 100, 1)
            : ($thisWeekSales > 0 ? 100 : 0);
        $weeklyDirection = $thisWeekSales >= $lastWeekSales ? 'up' : 'down';

        // ── RECENT DATA ──────────────────────────────────────────────────────
        $recentOrders = Orders::with(['orderList', 'user'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $recentUsers = User::with('membershipLevel')
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // ── MEMBERSHIP DISTRIBUTION ──────────────────────────────────────────
        // Use the correct FK column name (membership_level_id, not membership_id)
        $membershipStats = Membership::all()->map(function ($mem) {
            $mem->users_count = User::where('membership_level_id', $mem->id)->count();

            return $mem;
        });

        // ── PROGRESS BAR PERCENTAGES (0–100) ─────────────────────────────────
        // New clients vs total users
        $newClientsPercent = $totalUsers > 0
            ? min(round(($newClients / $totalUsers) * 100), 100)
            : 0;
        // Active order lists vs total
        $activeOrderListsPercent = $totalOrderListCount > 0
            ? min(round(($activeOrderLists / $totalOrderListCount) * 100), 100)
            : 0;
        // New invoices (last 30d) vs total orders
        $newInvoicesPercent = $totalOrdersCount > 0
            ? min(round(($newInvoices / $totalOrdersCount) * 100), 100)
            : 0;
        // Active orders vs total
        $totalSalesPercent = $totalOrdersCount > 0
            ? min(round(($totalActiveOrders / $totalOrdersCount) * 100), 100)
            : 0;

        return view('admin.index', compact(
            'totalUsers',
            'newClients',
            'activeUsersCount',
            'activeOrderLists',
            'newInvoices',
            'newSalesValue',
            'totalActiveOrders',
            'totalDeposits',
            'totalWithdrawals',
            'totalCommission',
            'availableBalance',
            'approvedDeposits',
            'pendingRechargeCount',
            'pendingWithdrawalCount',
            'pendingRechargeAmount',
            'pendingWithdrawalAmount',
            'thisWeekSales',
            'lastWeekSales',
            'weeklyChangePercent',
            'weeklyDirection',
            'recentOrders',
            'recentUsers',
            'membershipStats',
            'newUsersPercent',
            'repeatUsersPercent',
            'newClientsPercent',
            'activeOrderListsPercent',
            'newInvoicesPercent',
            'totalSalesPercent'
        ));
    }

    public function add_member()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $refCodes = ReferenceCodes::all();
        $memberships = Membership::all();
        $users = User::all();

        return view('admin.add-client', compact('refCodes', 'memberships', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'vallet_password' => 'required',
            'parentUser' => 'required',
            'credibility' => 'required',
            'memLevel' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $members = new User();
        $members->name = $request->input('username');
        $members->email = $request->input('email');
        $members->phone = $request->input('phone');
        $members->password = Hash::make($request->input('password')); // Hash the password
        $members->vallet_password = Hash::make($request->input('vallet_password')); // Hash the password

        // Generate a 6-digit alphanumeric reference code
        $members->reference_code = strtoupper(Str::random(6));

        $members->membership_level_id = $request->input('memLevel');
        $members->parent_id = $request->input('parentUser');
        $members->credibility = $request->input('credibility');
        $members->min_withdraw = $request->input('min_withdraw');
        $members->max_withdraw = $request->input('max_withdraw');
        $members->user_type = $request->input('userType') ?? 0;
        $members->status = 'active';
        $members->wallet_status = 'active';
        $members->withdraw_status = $request->input('withdraw_status', 'active');
        $members->save();

        $opening_balance = new Funds();
        $opening_balance->user_id = $members->id;
        $opening_balance->amount = $request->input('op_balance');
        $opening_balance->type = 'deposit';
        $opening_balance->save();

        return redirect('/administration')->with('add_success', 'Your user has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Members $members)
    {
    }

    /**
     * Show orders (journeys/tasks) for a specific user.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function userOrders($id)
    {
        $user = User::findOrFail($id);

        // Load orders with their related OrderList items and only active orders
        $orders = Orders::with('orderList')
            ->where('user_id', $id)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.user-orders', compact('user', 'orders'));
    }

    /**
     * Show all active orders with related user and order list data.
     *
     * @return \Illuminate\Http\Response
     */
    public function allOrders()
    {
        // Load orders with orderList and user, only active orders
        $orders = Orders::with(['orderList', 'user'])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.all-orders', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $memberships = Membership::all();
        $users = User::all();
        $user = User::findOrFail($id);

        return view('admin.edit-client', compact('memberships', 'users', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate incoming data
        $request->validate([
            'username' => 'required',
            'phone' => 'required',
            'reference_code' => 'required',
            'memLevel' => 'required|exists:memberships,id',
            'parentUser' => 'nullable|exists:users,id',
            'credibility' => 'required',
            'password' => 'nullable', // Optional, must be at least 6 characters if provided
            'wallet_password' => 'nullable', // Optional, must be at least 6 characters if provided
            'min_withdrawal' => 'nullable',
            'max_withdrawal' => 'nullable',
            'user_status' => 'required',
            'wallet_status' => 'required',
            'withdraw_status' => 'required|in:active,deactive',
        ]);

        // Update user data
        $user->name = $request->input('username');
        $user->phone = $request->input('phone');
        $user->reference_code = $request->input('reference_code');
        $user->membership_level_id = $request->input('memLevel');
        $user->parent_id = $request->input('parentUser');
        $user->credibility = $request->input('credibility');
        $user->status = $request->input('user_status');
        $user->wallet_status = $request->input('wallet_status');
        $user->withdraw_status = $request->input('withdraw_status');

        // Update passwords if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        if ($request->filled('wallet_password')) {
            $user->vallet_password = bcrypt($request->input('wallet_password'));
        }

        // Update withdrawal limits if provided
        $user->min_withdraw = $request->input('min_withdrawal', $user->min_withdrawal);
        $user->max_withdraw = $request->input('max_withdrawal', $user->max_withdrawal);

        $user->save();

        return redirect('/administration')->with('upd_success', 'User has been updated successfully.');
    }

    public function resetTodaysOrders(Request $request, User $user)
    {
        // Update status of today's orders to 'deactive'
        $user->orders()->update(['status' => 'deactive']);

        // Update status of today's funds to 'deactive'
        $user->funds()->update(['status' => 'deactive']);

        // Calculate and reset daily commission (if needed)
        $commissionRate = $user->membershipLevel->commission / 100;
        $dailyOrderValue = 0; // Assume commission is based on today's orders
        $dailyCommission = $dailyOrderValue * $commissionRate;

        // Return to the previous page with a success message
        return redirect()->back()->with('success', 'Today\'s orders and funds have been reset.');
    }

    public function reset_single_order($id)
    {
        $order_list = OrderList::orderBy('price', 'asc')->get();
        // Assuming you have a way to get the user ID, or pass it via the route
        $user = User::findOrFail($id); // Or get from the route parameter or session if needed

        return view('admin.reset-orders', compact('order_list', 'user'));
    }

    public function reset_orders($id)
    {
        // Retrieve the selected orders for the user based on user ID
        $selected_order_list = SelectedOrder::where('user_id', $id)
                                            ->with('orderList')  // Assuming there's a relation with the Orders table
                                            ->orderBy('order_after', 'asc')
                                            ->get();

        // Retrieve the user
        $user = User::findOrFail($id);

        return view('admin.setup-orders', compact('selected_order_list', 'user'));
    }

    public function update_orders(Request $request, $id)
    {
        // Get all selected orders from the form
        $selected_order_ids = $request->input('selected_orders', []);

        // Delete any unchecked orders from the selected_orders table
        SelectedOrder::where('user_id', $id)
            ->whereNotIn('id', $selected_order_ids)
            ->delete();

        return redirect()->back()->with('order_success', 'Orders updated successfully!');
    }

    public function saveSelectedOrders(Request $request, $user)
    {
        // Validate the request
        $request->validate([
            'selected_orders' => 'required|array|min:1',
            'order_after' => 'required|integer', // Validate the order_after field
        ]);

        // Retrieve the selected orders
        $selectedOrderIds = $request->input('selected_orders');
        $orderAfter = $request->input('order_after');

        // Save selected orders into the selected_orders table
        foreach ($selectedOrderIds as $orderId) {
            SelectedOrder::create([
                'user_id' => $user,
                'order_list_id' => $orderId,
                'order_after' => $orderAfter,
            ]);
        }

        // Redirect back with a success message
        return redirect('administration')->with('order_success', 'Orders have been saved successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $members)
    {
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in using the name and password
        $credentials = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user's status is 'active'
            if ($user->status === 'active') {
                // Check if the user is an admin
                if ($user->user_type == 1 || $user->user_type == 2) {
                    return redirect()->intended('administration');
                }

                Auth::logout();

                return redirect()->route('admin.login')->with('error', 'You do not have admin access.');
            } else {
                Auth::logout();

                return redirect()->route('admin.login')->with('error', 'Your account is not active.');
            }
        }

        return redirect()->route('admin.login')->with('error', 'Login details are not valid.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
