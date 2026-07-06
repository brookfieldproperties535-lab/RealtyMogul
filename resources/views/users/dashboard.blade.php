@extends('layouts.user')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- MARQUEE TICKER --}}
<div class="marquee-wrapper">
    <div class="marquee-track">
        <span class="marquee-item">🎉 Jake M. just earned <span>$18.75</span> commission</span>
        <span class="marquee-item">🚀 New selected task available: Premium Real Estate Review</span>
        <span class="marquee-item">💰 Sarah L. withdrew <span>$120.00</span> successfully</span>
        <span class="marquee-item">⭐ Gold members: 5 new selected tasks added today</span>
        <span class="marquee-item">🏆 Top earner today: Tyler B. — <span>$312.00</span></span>
        <span class="marquee-item">🎉 Emma R. just earned <span>$74.50</span> referral commission</span>
        <span class="marquee-item">💎 Diamond member Chris D. completed 30 tasks today</span>
        <span class="marquee-item">🚀 New selected task: Luxury Real Estate Campaign — <span>$500</span> commission</span>
        <span class="marquee-item">💰 Marcus T. withdrew <span>$200.00</span> via bank transfer</span>
        <span class="marquee-item">⭐ Platinum upgrade special: Get 5 selected tasks/day</span>
        <span class="marquee-item">🎉 Ashley W. just earned <span>$22.00</span> in daily commissions</span>
        <span class="marquee-item">🏆 Brandon K. hit a milestone — <span>50 tasks</span> completed</span>
        <span class="marquee-item">💰 Megan S. withdrew <span>$95.00</span> successfully</span>
        <span class="marquee-item">🚀 New selected task: Premium Listing Review — <span>$250</span> commission</span>
        <span class="marquee-item">⭐ Silver members: 2 bonus tasks unlocked this weekend</span>
        <span class="marquee-item">🎉 Jordan H. earned <span>$48.00</span> from referral bonus</span>
        <span class="marquee-item">💎 Dylan R. completed a <span>$500</span> selected task today</span>
        <span class="marquee-item">🏆 Olivia P. is this week's top referrer — <span>8 new members</span></span>
        <span class="marquee-item">💰 Nathan G. withdrew <span>$175.00</span> via ACH transfer</span>
        <span class="marquee-item">🎉 Chloe B. just joined using a referral link</span>
        {{-- Duplicate for seamless loop --}}
        <span class="marquee-item">🎉 Jake M. just earned <span>$18.75</span> commission</span>
        <span class="marquee-item">🚀 New selected task available: Premium Real Estate Review</span>
        <span class="marquee-item">💰 Sarah L. withdrew <span>$120.00</span> successfully</span>
        <span class="marquee-item">⭐ Gold members: 5 new selected tasks added today</span>
        <span class="marquee-item">🏆 Top earner today: Tyler B. — <span>$312.00</span></span>
        <span class="marquee-item">🎉 Emma R. just earned <span>$74.50</span> referral commission</span>
        <span class="marquee-item">💎 Diamond member Chris D. completed 30 tasks today</span>
        <span class="marquee-item">🚀 New selected task: Luxury Real Estate Campaign — <span>$500</span> commission</span>
        <span class="marquee-item">💰 Marcus T. withdrew <span>$200.00</span> via bank transfer</span>
        <span class="marquee-item">⭐ Platinum upgrade special: Get 5 selected tasks/day</span>
        <span class="marquee-item">🎉 Ashley W. just earned <span>$22.00</span> in daily commissions</span>
        <span class="marquee-item">🏆 Brandon K. hit a milestone — <span>50 tasks</span> completed</span>
        <span class="marquee-item">💰 Megan S. withdrew <span>$95.00</span> successfully</span>
        <span class="marquee-item">🚀 New selected task: Premium Listing Review — <span>$250</span> commission</span>
        <span class="marquee-item">⭐ Silver members: 2 bonus tasks unlocked this weekend</span>
        <span class="marquee-item">🎉 Jordan H. earned <span>$48.00</span> from referral bonus</span>
        <span class="marquee-item">💎 Dylan R. completed a <span>$500</span> selected task today</span>
        <span class="marquee-item">🏆 Olivia P. is this week's top referrer — <span>8 new members</span></span>
        <span class="marquee-item">💰 Nathan G. withdrew <span>$175.00</span> via ACH transfer</span>
        <span class="marquee-item">🎉 Chloe B. just joined using a referral link</span>
    </div>
</div>

{{-- OPTIMIZE SECTION --}}
<div class="optimize-section">
    <div class="optimize-left">
        <h3>🚀 Data Optimization</h3>
        <p>Sync your task data and refresh available commissions. Run daily for best results and to unlock the latest task assignments for your membership level.</p>
    </div>
    <a href="{{ route('generate.order') }}"
       class="btn-optimize"
       id="optimizeBtn"
       onclick="return handleOptimize(this)">⚡ Start Optimization</a>
</div>

{{-- EARNINGS STATS --}}
<div class="earn-grid">
    <div class="earn-card green">
        <div class="earn-card-label">Total Earning</div>
        <div class="earn-card-value green">
            @if (!empty($userData['overpriced_amount']) && $userData['overpriced_amount'] > 0)
                <span style="font-size:14px;color:var(--danger);">⚠ Hold: ${{ number_format($userData['overpriced_amount'], 2) }}</span>
            @else
                ${{ number_format($userData['total_funds'] ?? 0, 2) }}
            @endif
        </div>
        <div class="earn-card-sub">Adjusted available for withdrawal</div>
    </div>
    <div class="earn-card cyan">
        <div class="earn-card-label">Today's Commission</div>
        <div class="earn-card-value cyan">${{ number_format($userData['today_commission'] ?? 0, 2) }}</div>
        <div class="earn-card-sub">Commission earned today</div>
    </div>
    <div class="earn-card violet">
        <div class="earn-card-label">Tasks Done Today</div>
        <div class="earn-card-value violet">{{ $userData['total_today_orders'] ?? 0 }}</div>
        <div class="earn-card-sub">Limit: {{ $userData['order_limit'] ?? ($userData['membership_level']->task_limit ?? 'N/A') }}</div>
    </div>
</div>

{{-- TWO COLUMN: CHART + QUICK STATS --}}
<div class="dashboard-chart-grid">

    {{-- WEEKLY BAR CHART --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title"><span class="icon">📊</span> Weekly Earnings</div>
            <div style="font-size:12px;color:var(--text-muted);font-family:'Space Mono',monospace;">Last 7 Days</div>
        </div>
        <div class="card-body">
            <div class="chart-bars">
                @php $maxEarning = $userData['max_weekly_earning'] ?? 1; @endphp
                @foreach($userData['weekly_earnings'] ?? [] as $day)
                    @php
                        $heightPct = $maxEarning > 0 ? round(($day['amount'] / $maxEarning) * 100) : 0;
                        $heightPct = ($day['amount'] > 0) ? max($heightPct, 4) : $heightPct;
                    @endphp
                    <div class="bar-wrap">
                        <div class="bar-value">${{ number_format($day['amount'], 0) }}</div>
                        <div class="bar" data-height="{{ $heightPct }}" style="height:0%"></div>
                        <div class="bar-label">{{ $day['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- QUICK STATS --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title"><span class="icon">⚡</span> Quick Stats</div>
        </div>
        <div class="card-body">
            <div class="quick-stats">
                <div class="qs-row">
                    <span class="qs-label">Tasks Completed Today</span>
                    <span class="qs-value" style="color:var(--success);">{{ $userData['total_today_orders'] ?? 0 }}</span>
                </div>
                <div class="qs-row">
                    <span class="qs-label">Membership</span>
                    <span class="qs-value" style="color:var(--warning);">{{ $userData['membership_level']->level_name ?? 'Member' }}</span>
                </div>
                <div class="qs-row">
                    <span class="qs-label">Active Referrals</span>
                    <span class="qs-value">{{ $userData['referrals_count'] ?? 0 }}</span>
                </div>
                <div class="qs-row">
                    <span class="qs-label">Commission Rate</span>
                    <span class="qs-value">{{ $userData['membership_level']->commission ?? 0 }}%</span>
                </div>
                <div class="qs-row">
                    <span class="qs-label">Tasks Remaining Today</span>
                    <span class="qs-value" style="color:var(--warning);">{{ $userData['tasks_remaining'] ?? 'N/A' }}</span>
                </div>
                <div class="qs-row">
                    <span class="qs-label">Total Commission</span>
                    <span class="qs-value" style="color:var(--success);">${{ number_format($userData['total_commission'] ?? 0, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- RECENT TASKS TABLE --}}
<div class="card">
    <div class="card-header">
        <div class="card-title"><span class="icon">📋</span> Recent Task Activity</div>
        <a href="{{ route('user.tasks') }}" class="card-link">View All</a>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Commission</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(($userData['recent_tasks'] ?? []) as $order)
                    @php
                        $orderPrice  = optional($order->orderList)->price ?? 0;
                        $totalAmount = $order->total_amount ?? 0;
                        $commission  = $totalAmount - $orderPrice;
                    @endphp
                    <tr>
                        <td>{{ optional($order->orderList)->title ?? 'Order #' . $order->id }}</td>
                        <td><span class="task-badge {{ $order->type == 'Selected' ? 'selected-badge' : 'normal-badge' }}">{{ $order->type ?? 'Normal' }}</span></td>
                        <td style="font-family:'Space Mono',monospace;color:var(--text);">
                            ${{ number_format($orderPrice, 2) }}
                        </td>
                        <td style="font-family:'Space Mono',monospace;color:var(--success);">
                            ${{ number_format($commission, 2) }}
                        </td>
                        <td style="font-family:'Space Mono',monospace;color:var(--primary-light);font-weight:700;">
                            ${{ number_format($totalAmount, 2) }}
                        </td>
                        <td>
                            @if($order->type == 'Complete')
                                <span class="status-badge status-completed">Completed</span>
                            @elseif($order->type == 'Incomplete')
                                <span class="status-badge status-pending">In Progress</span>
                            @else
                                <span class="status-badge">{{ ucfirst($order->type ?? 'Unknown') }}</span>
                            @endif
                        </td>
                        <td style="color:var(--text-muted);font-size:12px;">{{ optional($order->created_at)->format('M j, Y') ?? '' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="table-empty">No task activity yet — hit <strong>Start Optimization</strong> to get your first task.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
function handleOptimize(el) {
    if (el.dataset.running === '1') return false;
    el.dataset.running = '1';
    el.classList.add('running');
    el.textContent = '⚙️ Optimizing...';
    el.style.pointerEvents = 'none';
    setTimeout(function() {
        window.location.href = el.href;
    }, 1400);
    return false;
}
</script>
@endpush

@endsection
