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

    {{-- EARNINGS CHART --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title"><span class="icon">📊</span> Earnings</div>
            <div class="chart-controls">
                <div class="pill-tabs" id="chartTypeTabs">
                    <div class="pill-tab active" data-chart-type="line">Line</div>
                    <div class="pill-tab" data-chart-type="bar">Bar</div>
                    <div class="pill-tab" data-chart-type="pie">Pie</div>
                </div>
                <div class="date-range-picker" id="dateRangePicker">
                    <button type="button" class="date-range-btn" id="dateRangeBtn">📅 <span id="dateRangeLabel">Last 7 days</span></button>
                    <div class="date-range-dropdown" id="dateRangeDropdown">
                        <ul class="date-range-presets">
                            <li data-preset="today">Today</li>
                            <li data-preset="yesterday">Yesterday</li>
                            <li data-preset="7d" class="active">Last 7 days</li>
                            <li data-preset="30d">Last 30 days</li>
                            <li data-preset="this_month">This month</li>
                            <li data-preset="last_month">Last month</li>
                            <li data-preset="custom">Custom range</li>
                        </ul>
                        <div class="date-range-custom" id="dateRangeCustom" style="display:none;">
                            <input type="date" id="customFrom">
                            <input type="date" id="customTo">
                            <button type="button" id="applyCustomRange" class="btn-mini">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="earningsChart" height="160"></canvas>
            <div class="chart-summary" id="chartSummary"></div>
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
<script src="{{ asset('admin/assets/libs/chart.js/dist/Chart.min.js') }}"></script>
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

(function() {
    var earningsChartInstance = null;
    var currentChartType = 'line';
    var currentRange = '7d';
    var lastLabels = [];
    var lastData = [];
    var PALETTE = ['#6c47ff', '#00e5ff', '#00d68f', '#ffb800', '#ff6b35', '#8b6bff'];

    var RANGE_LABELS = {
        today: 'Today',
        yesterday: 'Yesterday',
        '7d': 'Last 7 days',
        '30d': 'Last 30 days',
        this_month: 'This month',
        last_month: 'Last month',
        custom: 'Custom range'
    };

    function renderChart(labels, data, type) {
        var canvas = document.getElementById('earningsChart');
        if (!canvas || typeof Chart === 'undefined') return;

        if (earningsChartInstance) {
            earningsChartInstance.destroy();
        }

        earningsChartInstance = new Chart(canvas.getContext('2d'), {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: 'Earnings',
                    data: data,
                    borderColor: PALETTE[0],
                    backgroundColor: type === 'pie' ? PALETTE : (type === 'line' ? 'rgba(108,71,255,0.15)' : PALETTE[0]),
                    fill: type === 'line'
                }]
            },
            options: {
                legend: { display: type === 'pie' },
                title: { display: false }
            }
        });
    }

    function updateSummary(total, from, to) {
        var el = document.getElementById('chartSummary');
        if (!el) return;
        var totalStr = '$' + Number(total).toFixed(2);
        el.textContent = 'Total: ' + totalStr + ' · ' + from + ' – ' + to;
    }

    function fetchEarnings() {
        var params = new URLSearchParams({ range: currentRange });
        if (currentRange === 'custom') {
            params.set('from', document.getElementById('customFrom').value);
            params.set('to', document.getElementById('customTo').value);
        }

        fetch('{{ route('user.dashboard.earnings-chart') }}?' + params.toString())
            .then(function(r) {
                if (!r.ok) throw new Error('Request failed');
                return r.json();
            })
            .then(function(json) {
                lastLabels = json.labels;
                lastData = json.data;
                renderChart(lastLabels, lastData, currentChartType);
                updateSummary(json.total, json.from, json.to);
            })
            .catch(function() {
                if (typeof showToast === 'function') {
                    showToast('Could not load earnings data.', 'error');
                }
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Seed the chart from the already-server-rendered 7-day data — no extra round-trip on first paint.
        var weeklyEarnings = @json($userData['weekly_earnings'] ?? []);
        lastLabels = weeklyEarnings.map(function(d) { return d.label; });
        lastData = weeklyEarnings.map(function(d) { return d.amount; });
        renderChart(lastLabels, lastData, currentChartType);

        // ── Chart-type pill tabs (pure re-render, no network call) ──
        var chartTypeTabs = document.getElementById('chartTypeTabs');
        if (chartTypeTabs) {
            chartTypeTabs.querySelectorAll('.pill-tab').forEach(function(tab) {
                tab.addEventListener('click', function() {
                    chartTypeTabs.querySelectorAll('.pill-tab').forEach(function(t) { t.classList.remove('active'); });
                    tab.classList.add('active');
                    currentChartType = tab.dataset.chartType;
                    renderChart(lastLabels, lastData, currentChartType);
                });
            });
        }

        // ── Date-range dropdown open/close ──
        var dateRangeBtn = document.getElementById('dateRangeBtn');
        var dateRangeDropdown = document.getElementById('dateRangeDropdown');
        if (dateRangeBtn && dateRangeDropdown) {
            dateRangeBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dateRangeDropdown.style.display = dateRangeDropdown.style.display === 'block' ? 'none' : 'block';
            });
            dateRangeDropdown.addEventListener('click', function(e) { e.stopPropagation(); });
            document.addEventListener('click', function() {
                dateRangeDropdown.style.display = 'none';
            });
        }

        // ── Preset selection ──
        var presetsList = document.querySelector('.date-range-presets');
        var customBlock = document.getElementById('dateRangeCustom');
        var dateRangeLabel = document.getElementById('dateRangeLabel');
        if (presetsList) {
            presetsList.querySelectorAll('li').forEach(function(item) {
                item.addEventListener('click', function() {
                    presetsList.querySelectorAll('li').forEach(function(li) { li.classList.remove('active'); });
                    item.classList.add('active');
                    var preset = item.dataset.preset;

                    if (preset === 'custom') {
                        customBlock.style.display = 'flex';
                        return;
                    }

                    customBlock.style.display = 'none';
                    currentRange = preset;
                    dateRangeLabel.textContent = RANGE_LABELS[preset];
                    dateRangeDropdown.style.display = 'none';
                    fetchEarnings();
                });
            });
        }

        // ── Custom range apply ──
        var applyCustomRange = document.getElementById('applyCustomRange');
        if (applyCustomRange) {
            applyCustomRange.addEventListener('click', function() {
                var from = document.getElementById('customFrom').value;
                var to = document.getElementById('customTo').value;

                if (!from || !to || from > to) {
                    if (typeof showToast === 'function') {
                        showToast('Please choose a valid date range.', 'error');
                    }
                    return;
                }

                currentRange = 'custom';
                dateRangeLabel.textContent = from + ' – ' + to;
                dateRangeDropdown.style.display = 'none';
                fetchEarnings();
            });
        }
    });
})();
</script>
@endpush

@endsection
