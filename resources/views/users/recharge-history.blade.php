@extends('layouts.user')

@section('title', 'Recharge History')
@section('page-title', 'Recharge History')

@push('styles')
<style>
.rh-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 22px;
}
@media (max-width: 600px) { .rh-stats { grid-template-columns: 1fr; gap: 10px; } }
@media (min-width: 601px) and (max-width: 900px) { .rh-stats { grid-template-columns: repeat(3, 1fr); } }

.rh-stat-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
}
.rh-stat-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-muted);
    font-weight: 600;
    margin-bottom: 4px;
}
.rh-stat-value {
    font-family: 'Space Mono', monospace;
    font-size: 22px;
    font-weight: 700;
}
.rh-pagination {
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
    $uid = auth()->id();

    // Total ever submitted (all statuses)
    $totalRecharged = Funds::where('user_id', $uid)
        ->where('type', 'deposit')
        ->sum('amount');

    // Approved — matches controller balance rule: active + deactive both count
    $totalApproved = Funds::where('user_id', $uid)
        ->where('type', 'deposit')
        ->whereIn('status', ['active', 'deactive'])
        ->sum('amount');

    // Pending — awaiting admin approval
    $totalPending = Funds::where('user_id', $uid)
        ->where('type', 'deposit')
        ->where('status', 'pending')
        ->sum('amount');

    $recordCount = count($rechargeHistory);
@endphp

{{-- STAT CARDS --}}
<div class="rh-stats">
    <div class="rh-stat-card">
        <div style="font-size:28px;flex-shrink:0;">💳</div>
        <div>
            <div class="rh-stat-label">Total Recharged</div>
            <div class="rh-stat-value" style="color:var(--accent);">${{ number_format($totalRecharged, 2) }}</div>
        </div>
    </div>
    <div class="rh-stat-card">
        <div style="font-size:28px;flex-shrink:0;">✅</div>
        <div>
            <div class="rh-stat-label">Approved</div>
            <div class="rh-stat-value" style="color:var(--success);">${{ number_format($totalApproved, 2) }}</div>
        </div>
    </div>
    <div class="rh-stat-card">
        <div style="font-size:28px;flex-shrink:0;">⏳</div>
        <div>
            <div class="rh-stat-label">Pending</div>
            <div class="rh-stat-value" style="color:var(--warning);">${{ number_format($totalPending, 2) }}</div>
        </div>
    </div>
</div>

{{-- FILTER BAR --}}
<div class="history-filter-bar" style="margin-bottom:18px;">
    <input type="date" name="date_from" title="From date">
    <input type="date" name="date_to" title="To date">
    <select name="status">
        <option value="all">All Statuses</option>
        <option value="active">Approved</option>
        <option value="pending">Pending</option>
        <option value="deactive">Reset</option>
    </select>
    <input type="text" name="search" placeholder="Search by ID...">
    <button class="btn btn-outline btn-sm" style="height:38px;">🔍 Filter</button>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-header">
        <div class="card-title"><span class="icon">📥</span> Recharge Records</div>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rechargeHistory as $r)
                        @php
                            $displayId = '#RC-' . str_pad($r->id, 4, '0', STR_PAD_LEFT);
                            $status    = strtolower($r->status ?? '');
                        @endphp
                        <tr>
                            <td style="font-family:'Space Mono',monospace;font-size:12px;color:var(--text-muted);">
                                {{ $displayId }}
                            </td>
                            <td style="font-family:'Space Mono',monospace;color:var(--success);font-weight:700;">
                                ${{ number_format($r->amount ?? 0, 2) }}
                            </td>
                            <td>
                                @if ($status === 'active' || $status === 'deactive')
                                    <span class="status-badge status-completed">Approved</span>
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
                            <td colspan="4" class="table-empty">No recharge records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="rh-pagination">
            <span style="font-size:12.5px;color:var(--text-muted);">
                Showing {{ $recordCount }} record{{ $recordCount !== 1 ? 's' : '' }}
            </span>
            <a href="{{ route('user.recharge') }}" class="btn btn-primary btn-sm">+ New Recharge</a>
        </div>
    </div>
</div>

@endsection
