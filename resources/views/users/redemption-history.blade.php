@extends('layouts.user')

@section('title', 'Redemption History')
@section('page-title', 'Redemption / Withdrawal History')

@push('styles')
<style>
.rdh-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 22px;
}
@media (max-width: 600px) { .rdh-stats { grid-template-columns: 1fr; gap: 10px; } }
@media (min-width: 601px) and (max-width: 900px) { .rdh-stats { grid-template-columns: repeat(3, 1fr); } }

.rdh-stat-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
}
.rdh-stat-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-muted);
    font-weight: 600;
    margin-bottom: 4px;
}
.rdh-stat-value {
    font-family: 'Space Mono', monospace;
    font-size: 22px;
    font-weight: 700;
}
.rdh-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 16px 20px;
    border-top: 1px solid var(--border);
    flex-wrap: wrap;
    gap: 10px;
}
</style>
@endpush

@section('content')

@php
    use App\Models\Funds;
    use App\Models\Orders;
    use App\Models\OrderList;
    $uid  = auth()->id();
    $user = auth()->user();

    // ── Exact same formula as ProfileController::show() and index() ──────
    $totalDeposits = Funds::where('user_id', $uid)
        ->where('type', 'deposit')
        ->whereIn('status', ['active', 'deactive'])
        ->sum('amount');

    $totalCommission = Funds::where('user_id', $uid)
        ->where('type', 'commission')
        ->whereIn('status', ['active', 'deactive'])
        ->sum('amount');

    $totalWithdrawals = Funds::where('user_id', $uid)
        ->where('type', 'withdrawal')
        ->whereIn('status', ['active', 'deactive'])
        ->sum('amount');

    // Gross balance before incomplete order adjustment
    $totalFunds = $totalDeposits + $totalCommission - $totalWithdrawals;

    // Subtract first incomplete order price (same adjustment as controller)
    $firstIncompleteOrder = Orders::where('user_id', $uid)
        ->where('type', 'Incomplete')
        ->where('status', 'active')
        ->with('orderList')
        ->first();

    $adjustedTotalFunds = $totalFunds;
    if ($firstIncompleteOrder) {
        $incompletePrice = optional($firstIncompleteOrder->orderList)->price ?? 0;
        $adjustedTotalFunds -= $incompletePrice;
    }

    // Withdrawal-specific stats for the history cards
    $totalWithdrawn = Funds::where('user_id', $uid)
        ->where('type', 'withdrawal')
        ->sum('amount');                                    // all ever requested

    $totalPending = Funds::where('user_id', $uid)
        ->where('type', 'withdrawal')
        ->where('status', 'pending')
        ->sum('amount');

    $recordCount = count($redemptionHistory);
@endphp

{{-- STAT CARDS --}}
<div class="rdh-stats">
    <div class="rdh-stat-card">
        <div style="font-size:28px;flex-shrink:0;">💰</div>
        <div>
            <div class="rdh-stat-label">Available Balance</div>
            <div class="rdh-stat-value" style="color:var(--success);">${{ number_format($adjustedTotalFunds, 2) }}</div>
        </div>
    </div>
    <div class="rdh-stat-card">
        <div style="font-size:28px;flex-shrink:0;">📤</div>
        <div>
            <div class="rdh-stat-label">Total Withdrawn</div>
            <div class="rdh-stat-value" style="color:var(--text);">${{ number_format($totalWithdrawn, 2) }}</div>
        </div>
    </div>
    <div class="rdh-stat-card">
        <div style="font-size:28px;flex-shrink:0;">⏳</div>
        <div>
            <div class="rdh-stat-label">Pending</div>
            <div class="rdh-stat-value" style="color:var(--warning);">${{ number_format($totalPending, 2) }}</div>
        </div>
    </div>
</div>

{{-- FILTER BAR --}}
<div class="history-filter-bar" style="margin-bottom:18px;">
    <input type="date" name="date_from" title="From date">
    <input type="date" name="date_to" title="To date">
    <select name="status">
        <option value="all">All Statuses</option>
        <option value="active">Paid</option>
        <option value="pending">Pending</option>
        <option value="rejected">Rejected</option>
    </select>
    <input type="text" placeholder="Search by ID...">
    <button class="btn btn-outline btn-sm" style="height:38px;">🔍 Filter</button>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-header">
        <div class="card-title"><span class="icon">📤</span> Withdrawal Records</div>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Amount</th>
                        <th>Wallet Address</th>
                        <th>Status</th>
                        <th>Requested</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($redemptionHistory as $r)
                        @php
                            $displayId = '#WD-' . str_pad($r->id, 4, '0', STR_PAD_LEFT);
                            $status    = strtolower($r->status ?? '');
                        @endphp
                        <tr>
                            <td style="font-family:'Space Mono',monospace;font-size:12px;color:var(--text-muted);">
                                {{ $displayId }}
                            </td>
                            <td style="font-family:'Space Mono',monospace;font-weight:700;color:var(--text);">
                                ${{ number_format($r->amount ?? 0, 2) }}
                            </td>
                            <td style="font-size:12px;color:var(--text-muted);max-width:140px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                {{ $r->vallet_address ?? '—' }}
                            </td>
                            <td>
                                @if ($status === 'active' || $status === 'paid' || $status === 'deactive')
                                    <span class="status-badge status-completed">Paid</span>
                                @elseif ($status === 'pending')
                                    <span class="status-badge status-pending">Pending</span>
                                @else
                                    <span class="status-badge" style="background:rgba(255,71,87,0.12);color:var(--danger);border:1px solid rgba(255,71,87,0.3);">
                                        {{ ucfirst($r->status ?? 'Unknown') }}
                                    </span>
                                @endif
                            </td>
                            <td style="font-size:12px;color:var(--text-muted);">
                                {{ optional($r->created_at)->format('M j, Y H:i') ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="table-empty">No withdrawal records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="rdh-pagination">
            <span style="font-size:12.5px;color:var(--text-muted);">
                Showing {{ $recordCount }} record{{ $recordCount !== 1 ? 's' : '' }}
            </span>
            <a href="{{ route('user.redemption') }}" class="btn btn-primary btn-sm">+ New Withdrawal</a>
        </div>
    </div>
</div>

@endsection
