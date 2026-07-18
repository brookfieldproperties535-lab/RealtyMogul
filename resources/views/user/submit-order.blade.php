@extends('layouts.user')

@section('title', 'Submit Order')
@section('page-title', 'Submit Order')

@push('styles')
<style>
/* ── SUBMIT ORDER PAGE ──────────────────────────────────── */
.so-wrapper {
    max-width: 860px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* Order card */
.so-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    transition: box-shadow 0.2s;
}
.so-card:hover { box-shadow: 0 16px 48px rgba(0,0,0,0.35); }

.so-card-body {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 0;
}
@media (max-width: 680px) {
    .so-card-body { grid-template-columns: 1fr; }
}

/* Image panel */
.so-img-panel {
    position: relative;
    min-height: 200px;
    background: linear-gradient(135deg, #1a1a3e, #2d1b69);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.so-img-panel img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    inset: 0;
}
.so-img-placeholder { font-size: 56px; z-index: 1; }

/* Order badge */
.so-order-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(108,71,255,0.15);
    color: var(--primary-light);
    border: 1px solid rgba(108,71,255,0.3);
    border-radius: 20px;
    padding: 4px 12px;
    font-size: 12px;
    font-weight: 700;
    font-family: 'Space Mono', monospace;
}

/* Content panel */
.so-content-panel { padding: 24px; }

.so-title {
    font-size: 18px;
    font-weight: 800;
    color: var(--text);
    margin: 0 0 6px;
    line-height: 1.3;
}

/* Stats grid */
.so-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin: 18px 0;
}
@media (max-width: 500px) { .so-stats { grid-template-columns: 1fr 1fr; } }

.so-stat {
    background: var(--dark2);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 12px 14px;
}
.so-stat-icon {
    font-size: 18px;
    margin-bottom: 6px;
}
.so-stat-value {
    font-family: 'Space Mono', monospace;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 3px;
}
.so-stat-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-muted);
    font-weight: 600;
}

/* Overpriced warning banner */
.so-overpriced-banner {
    background: rgba(255,71,87,0.08);
    border: 1px solid rgba(255,71,87,0.3);
    border-radius: var(--radius-sm);
    padding: 14px 18px;
    margin-bottom: 18px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    font-size: 13.5px;
    color: var(--danger);
    line-height: 1.6;
}
.so-overpriced-banner strong { color: var(--danger); }

/* Decorative star rating */
.so-stars-row { margin-bottom: 18px; }
.so-stars-label {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-muted);
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}
.so-stars {
    display: flex;
    gap: 4px;
}
.so-star-radio { display: none; }
.so-star-label {
    font-size: 26px;
    color: var(--border);
    cursor: pointer;
    transition: color 0.15s, transform 0.1s;
    line-height: 1;
    user-select: none;
}
.so-star-label:hover,
.so-star-label:hover ~ .so-star-label { color: var(--warning); }
.so-stars:hover .so-star-label { color: var(--warning); }
.so-star-radio:checked ~ .so-star-label { color: var(--border); }
.so-stars .so-star-radio:checked + .so-star-label,
.so-stars .so-star-radio:checked + .so-star-label ~ .so-star-label { color: var(--warning); }
/* Simpler approach: preselect all 5 stars visually */
.so-stars-display { display: flex; gap: 4px; }
.so-stars-display span {
    font-size: 24px;
    color: var(--warning);
    cursor: default;
}

/* Feedback select */
.so-feedback-row { margin-bottom: 20px; }
.so-feedback-label {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-muted);
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}
.so-feedback-select {
    width: 100%;
    background: var(--dark2);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    color: var(--text);
    padding: 10px 14px;
    font-size: 13px;
    font-family: 'Sora', sans-serif;
    outline: none;
    transition: border-color 0.15s;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='rgba(240,240,255,0.4)' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    padding-right: 36px;
}
.so-feedback-select:focus { border-color: var(--primary); }
.so-feedback-select option { background: var(--card); color: var(--text); }

/* Divider */
.so-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 0 0 20px;
}

/* Submit button row */
.so-actions { display: flex; justify-content: flex-end; }
.so-submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 13px 32px;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: #fff;
    border: none;
    border-radius: var(--radius-sm);
    font-size: 15px;
    font-weight: 700;
    font-family: 'Sora', sans-serif;
    cursor: pointer;
    text-decoration: none;
    transition: opacity 0.2s, transform 0.15s;
    min-width: 180px;
}
.so-submit-btn:hover { opacity: 0.88; transform: translateY(-1px); color: #fff; }
.so-submit-btn.support-btn {
    background: linear-gradient(135deg, var(--danger), #c0392b);
}

@media (max-width: 480px) {
    .so-actions { justify-content: stretch; }
    .so-submit-btn { width: 100%; }
}
</style>
@endpush

@section('content')

<div class="so-wrapper">

    {{-- ── SESSION ALERTS ──────────────────────────────────── --}}
    @if (session('error'))
        <div style="background:rgba(255,71,87,0.1);border:1px solid rgba(255,71,87,0.3);border-radius:var(--radius-sm);padding:14px 18px;font-size:13.5px;color:var(--danger);display:flex;align-items:center;gap:10px;">
            ❌ {{ session('error') }}
        </div>
    @endif

    {{-- ── PROGRESS GAUGE (copied from the dashboard) ────────── --}}
    @php
        $gaugeDone       = (int) ($gauge['done'] ?? 0);
        $gaugeLimit      = (int) ($gauge['limit'] ?? 0);
        $gaugeLeft       = max(0, $gaugeLimit - $gaugeDone);
        $gaugeDonePct    = $gaugeLimit > 0 ? min(100, round(($gaugeDone / $gaugeLimit) * 100)) : 0;
        $gaugeLeftPct    = $gaugeLimit > 0 ? 100 - $gaugeDonePct : 0;
        $gaugeAvailable  = $gauge['available'] ?? 0;
        $gaugeCommission = $gauge['commission'] ?? 0;
    @endphp
    <div class="card">
        <div class="card-header">
            <div class="card-title"><span class="icon">📊</span> Your Progress</div>
        </div>
        <div class="card-body">
            <div class="optimize-meter" style="justify-content:space-around;">
                {{-- Semicircle gauge --}}
                <div class="gauge-wrap">
                    <div class="gauge-canvas">
                        <canvas id="taskGauge"
                                data-done="{{ $gaugeDone }}"
                                data-limit="{{ $gaugeLimit }}"
                                data-avail="{{ $gaugeAvailable }}"
                                data-comm="{{ $gaugeCommission }}"></canvas>
                        <div class="gauge-center">
                            <span class="gauge-total">{{ $gaugeLimit ?: '—' }}</span>
                            <span class="gauge-badge">⚡</span>
                        </div>
                    </div>
                    <div class="gauge-edges">
                        <span class="gauge-edge done">{{ $gaugeDonePct }}%</span>
                        <span class="gauge-edge left">{{ $gaugeLeftPct }}%</span>
                    </div>
                </div>

                {{-- Side readings --}}
                <div class="meter-readings">
                    <div class="reading">
                        <div class="reading-value r-avail">${{ number_format($gaugeAvailable, 2) }}</div>
                        <div class="reading-label">Available Balance</div>
                    </div>
                    <div class="reading">
                        <div class="reading-value r-comm">${{ number_format($gaugeCommission, 2) }}</div>
                        <div class="reading-label">Commission Earned</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (!$orderData || count($orderData) === 0)
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:60px 24px;text-align:center;">
            <div style="font-size:44px;margin-bottom:14px;opacity:0.4;">📭</div>
            <p style="font-size:14px;color:var(--text-muted);margin:0 0 20px;">No order available at this time.</p>
            <a href="{{ route('user.dashboard') }}" class="btn btn-primary">← Back to Dashboard</a>
        </div>
    @else

        @foreach ($orderData as $data)
            @php
                $order          = $data['order'];
                $price          = $data['price'];
                $commission     = $data['commission'];
                $totalValue     = $data['total_value'];
                $image          = $data['image'] ?? null;
                $overpriced     = $data['overpriced_amount'] ?? 0;
                $isOverpriced   = $overpriced > 0;
            @endphp

            <div class="so-card">
                <div class="so-card-body">

                    {{-- IMAGE --}}
                    <div class="so-img-panel">
                        @if ($image)
                            <img src="{{ asset('OrderImages/' . $image) }}" alt="{{ $order->title }}">
                        @else
                            <span class="so-img-placeholder">🏢</span>
                        @endif
                    </div>

                    {{-- CONTENT --}}
                    <div class="so-content-panel">

                        {{-- Title + Order # --}}
                        <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;margin-bottom:14px;flex-wrap:wrap;">
                            <h2 class="so-title">{{ $order->title }}</h2>
                            <span class="so-order-badge"># {{ $order->id }}</span>
                        </div>

                        {{-- Overpriced warning --}}
                        @if ($isOverpriced)
                            <div class="so-overpriced-banner">
                                <span style="font-size:20px;flex-shrink:0;">⚠️</span>
                                <div>
                                    <strong>Insufficient Balance</strong><br>
                                    Your account needs an additional
                                    <strong>${{ number_format($overpriced, 2) }}</strong>
                                    to complete this order. Please recharge your account or contact support.
                                </div>
                            </div>
                        @endif

                        {{-- Price / Commission / Total --}}
                        <div class="so-stats">
                            <div class="so-stat">
                                <div class="so-stat-icon">💵</div>
                                <div class="so-stat-value" style="color:var(--accent);">${{ number_format($price, 2) }}</div>
                                <div class="so-stat-label">Price</div>
                            </div>
                            <div class="so-stat">
                                <div class="so-stat-icon">💰</div>
                                <div class="so-stat-value" style="color:{{ $isOverpriced ? 'var(--danger)' : 'var(--success)' }};">
                                    ${{ number_format($commission, 2) }}
                                </div>
                                <div class="so-stat-label">{{ $isOverpriced ? 'Commission' : 'Profit' }}</div>
                            </div>
                            <div class="so-stat">
                                <div class="so-stat-icon">🧮</div>
                                <div class="so-stat-value" style="color:{{ $isOverpriced ? 'var(--warning)' : 'var(--primary-light)' }};">
                                    {{ $isOverpriced ? '-' : '' }}${{ number_format($isOverpriced ? $overpriced : $totalValue, 2) }}
                                </div>
                                <div class="so-stat-label">{{ $isOverpriced ? 'Add Amount' : 'Total' }}</div>
                            </div>
                        </div>

                        <hr class="so-divider">

                        {{-- Decorative Star Rating --}}
                        <div class="so-stars-row">
                            <span class="so-stars-label">Score</span>
                            <div class="so-stars-display">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                        </div>

                        {{-- Decorative Feedback Dropdown --}}
                        <div class="so-feedback-row">
                            <span class="so-feedback-label">Leave a Review</span>
                            <select class="so-feedback-select" name="feedback_{{ $order->id }}">
                                <option>The architecture here is absolutely breathtaking, Modern elegance meets timeless charm.</option>
                                <option>Every corner of this hotel feels like it belongs on a postcard.</option>
                                <option>The building's design is a perfect blend of innovation and tradition.</option>
                                <option>Can't get over how stunning the lobby looks, pure luxury from the first step in.</option>
                                <option>This place defines what comfort and class should feel like.</option>
                                <option>Every detail in the room is thoughtfully placed, true hospitality!</option>
                                <option>The exterior alone deserves a standing ovation, what a striking structure.</option>
                                <option>This hotel really knows how to make you feel like royalty.</option>
                                <option>Sleek, stylish, and so Instagrammable, loved every bit of it.</option>
                                <option>A masterclass in modern architecture, can't stop staring!</option>
                                <option>The views from the top floor? Absolutely worth every penny.</option>
                                <option>Everything here screams excellence, interior, service, and vibe.</option>
                                <option>They really paid attention to aesthetic and comfort equally.</option>
                                <option>From the chandelier to the ceiling, this place is a dream.</option>
                                <option>An ideal mix of luxury, comfort, and world-class service.</option>
                                <option>This building's design could easily be featured in an art museum.</option>
                                <option>I felt like I walked into a movie set, too gorgeous to be real.</option>
                                <option>This is what five-star should always look and feel like.</option>
                                <option>The atmosphere here is peaceful, yet rich with character.</option>
                                <option>Exceptional design and flawless service, highly recommend!</option>
                                <option>Each floor tells a story through its decor, absolutely loved it.</option>
                                <option>I'd live here if they let me, yes, it's that good.</option>
                                <option>Everything is picture-perfect, down to the hallway lighting.</option>
                                <option>An unforgettable experience in a beautifully built space.</option>
                                <option>The attention to detail makes this place truly special.</option>
                                <option>A gem in the heart of the city, what a beautiful structure.</option>
                                <option>So much more than a building, it's an experience.</option>
                                <option>The perfect stay for those who appreciate luxury with taste.</option>
                                <option>The mix of textures, tones, and materials is interior goals.</option>
                                <option>Loved the cozy ambiance and top-tier design elements.</option>
                                <option>Felt like I was living in a magazine spread, so chic!</option>
                                <option>Stylish, sleek, and surprisingly warm for a modern build.</option>
                                <option>This place deserves awards for both looks and hospitality.</option>
                                <option>The rooftop view adds a whole new level of wow.</option>
                                <option>Even the elevator ride felt luxurious, attention to detail!</option>
                                <option>A perfect blend of art, architecture, and comfort.</option>
                                <option>I came for the night and stayed for the vibes.</option>
                                <option>The building lights up beautifully at night, what a sight!</option>
                                <option>I'd book this again just for the lobby vibes alone.</option>
                                <option>One of the most beautifully designed places I've ever been.</option>
                            </select>
                        </div>

                        {{-- Submit action --}}
                        <div class="so-actions">
                            @if ($isOverpriced)
                                <a href="{{ route('user.support') }}" class="so-submit-btn support-btn">
                                    📞 Contact Support
                                </a>
                            @else
                                <form method="POST" action="{{ route('submit.order') }}" style="width:100%;display:flex;justify-content:flex-end;">
                                    @csrf
                                    <input type="hidden" name="order_id"   value="{{ $order->id }}">
                                    <input type="hidden" name="commission" value="{{ $commission }}">
                                    <button type="submit" class="so-submit-btn">✓ Submit Order</button>
                                </form>
                            @endif
                        </div>

                    </div>{{-- /so-content-panel --}}
                </div>{{-- /so-card-body --}}
            </div>{{-- /so-card --}}

        @endforeach

    @endif

</div>{{-- /so-wrapper --}}

@push('scripts')
<script src="{{ asset('admin/assets/libs/chart.js/dist/Chart.min.js') }}"></script>
<script>
// Static progress gauge (same render as the dashboard gauge).
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var canvas = document.getElementById('taskGauge');
        if (!canvas || typeof Chart === 'undefined') return;

        var done  = parseInt(canvas.dataset.done, 10)  || 0;
        var limit = parseInt(canvas.dataset.limit, 10) || 0;
        var remaining = Math.max(0, limit - done);
        if (done > limit && limit > 0) done = limit;

        var data   = limit > 0 ? [done, remaining] : [0, 1];
        var colors = limit > 0 ? ['#8b6bff', '#00e5ff'] : ['rgba(108,71,255,0.14)', 'rgba(108,71,255,0.14)'];

        new Chart(canvas.getContext('2d'), {
            type: 'doughnut',
            data: { datasets: [{ data: data, backgroundColor: colors, borderWidth: 0 }] },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                rotation: Math.PI,
                circumference: Math.PI,
                cutoutPercentage: 72,
                legend: { display: false },
                tooltips: { enabled: false },
                hover: { mode: null },
                animation: { animateRotate: true, duration: 900 }
            }
        });
    });
})();
</script>
@endpush

@endsection
