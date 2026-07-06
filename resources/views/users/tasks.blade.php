@extends('layouts.user')

@section('title', 'Tasks')
@section('page-title', 'Tasks')

@section('content')

@php
    $completed     = $completedOrders    ?? collect();
    $onHold        = $onHoldOrders       ?? collect();
    $oneIncomplete = $oneIncompleteOrder ?? null;
    $membershipObj = $membership         ?? null;
    $commRate      = ($membershipObj->commission ?? 0) / 100;
    $userFunds     = $funds              ?? 0;

    $pendingCount   = $oneIncomplete ? 1 : 0;
    $completedCount = count($completed);
    $onHoldCount    = count($onHold);
    $allCount       = $pendingCount + $completedCount + $onHoldCount;
@endphp

{{-- ── TAB BAR ───────────────────────────────────────────────────────── --}}
<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:22px;">
    <div class="pill-tabs" style="margin-bottom:0;flex-wrap:wrap;">
        <button class="pill-tab active" onclick="tkTab('tk-all',this)">
            All
            <span style="background:rgba(108,71,255,0.2);color:var(--primary-light);padding:1px 7px;border-radius:10px;font-size:11px;margin-left:5px;font-weight:700;">{{ $allCount }}</span>
        </button>
        <button class="pill-tab" onclick="tkTab('tk-pending',this)">
            ⏳ Pending
            <span style="background:rgba(255,184,0,0.2);color:var(--warning);padding:1px 7px;border-radius:10px;font-size:11px;margin-left:5px;font-weight:700;">{{ $pendingCount }}</span>
        </button>
        <button class="pill-tab" onclick="tkTab('tk-completed',this)">
            ✅ Completed
            <span style="background:rgba(0,200,150,0.2);color:var(--success);padding:1px 7px;border-radius:10px;font-size:11px;margin-left:5px;font-weight:700;">{{ $completedCount }}</span>
        </button>
        <button class="pill-tab" onclick="tkTab('tk-undone',this)">
            🔒 Undone
            <span style="background:rgba(108,71,255,0.15);color:var(--primary-light);padding:1px 7px;border-radius:10px;font-size:11px;margin-left:5px;font-weight:700;">{{ $onHoldCount }}</span>
        </button>
    </div>
</div>

{{-- ══════════════════════════════════════════════════════════════════
     PANE — ALL
══════════════════════════════════════════════════════════════════ --}}
<div id="tk-all" class="tk-pane task-detail-grid">

    {{-- Pending card --}}
    @if ($oneIncomplete)
        @php
            $price = $oneIncomplete->orderList->price ?? 0;
            $comm  = $price * $commRate;
            $total = $price + $comm;
        @endphp
        <div class="task-detail-card">
            <div class="task-card-img normal-bg" style="position:relative;">
                @if (!empty($oneIncomplete->orderList->image))
                    <img src="{{ asset('OrderImages/' . $oneIncomplete->orderList->image) }}"
                         alt="task" style="width:100%;height:100%;object-fit:cover;border-radius:0;">
                @else
                    📦
                @endif
                <span class="task-selected-badge" style="background:linear-gradient(135deg,#ffb800,#ff8800);color:#1a0a00;font-size:12px;">⏳ PENDING</span>
            </div>
            <div class="task-card-body">
                <div class="task-card-title-row">
                    <div class="task-card-title">{{ $oneIncomplete->orderList->title ?? 'Task' }}</div>
                    <div class="task-star-rating">★★★★★</div>
                </div>
                <div class="task-card-meta">
                    <div class="task-meta-item">
                        <span class="task-meta-label">Price</span>
                        <span class="task-meta-value price">$ {{ number_format($price, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Commission</span>
                        <span class="task-meta-value comm">$ {{ number_format($comm, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Total Return</span>
                        <span class="task-meta-value total">$ {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Date</span>
                        <span class="task-meta-value" style="font-size:11px;">
                            {{ $oneIncomplete->created_at->format('M j, Y') }}
                        </span>
                    </div>
                </div>
                <div class="task-card-actions">
                    <form method="POST" action="{{ ($oneIncomplete->orderList->price > $userFunds) ? route('support') : route('submit.order') }}" style="flex:1;">
                        @csrf
                        <input type="hidden" name="order_id"   value="{{ $oneIncomplete->order_id }}">
                        <input type="hidden" name="commission" value="{{ $comm }}">
                        <button type="submit" class="btn-submit-task" style="width:100%;">✓ Submit Task</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

    {{-- Completed cards --}}
    @foreach ($completed as $task)
        @php
            $price = $task['price']      ?? 0;
            $comm  = $task['commission'] ?? 0;
            $total = $task['totalPrice'] ?? ($price + $comm);
        @endphp
        <div class="task-detail-card">
            <div class="task-card-img normal-bg" style="position:relative;">
                @if (!empty($task['image']))
                    <img src="{{ asset('OrderImages/' . $task['image']) }}"
                         alt="task" style="width:100%;height:100%;object-fit:cover;border-radius:0;">
                @else
                    📦
                @endif
                <span class="task-selected-badge" style="background:rgba(0,200,150,0.85);color:#fff;font-size:12px;">✅ DONE</span>
            </div>
            <div class="task-card-body">
                <div class="task-card-title-row">
                    <div class="task-card-title">{{ $task['title'] ?? 'Task' }}</div>
                    <div class="task-star-rating">★★★★★</div>
                </div>
                <div class="task-card-meta">
                    <div class="task-meta-item">
                        <span class="task-meta-label">Price</span>
                        <span class="task-meta-value price">$ {{ number_format($price, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Commission</span>
                        <span class="task-meta-value comm">$ {{ number_format($comm, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Total Return</span>
                        <span class="task-meta-value total">$ {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Date</span>
                        <span class="task-meta-value" style="font-size:11px;">{{ $task['created_at'] ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- On-hold / Undone cards --}}
    @foreach ($onHold as $task)
        @php
            $price = $task['price']      ?? 0;
            $comm  = $task['commission'] ?? 0;
            $total = $task['totalPrice'] ?? ($price + $comm);
        @endphp
        <div class="task-detail-card">
            <div class="task-card-img selected-bg" style="position:relative;">
                @if (!empty($task['image']))
                    <img src="{{ asset('OrderImages/' . $task['image']) }}"
                         alt="task" style="width:100%;height:100%;object-fit:cover;border-radius:0;">
                @else
                    📦
                @endif
                <span class="task-selected-badge" style="font-size:12px;">🔒 UNDONE</span>
            </div>
            <div class="task-card-body">
                <div class="task-card-title-row">
                    <div class="task-card-title">{{ $task['title'] ?? 'Task' }}</div>
                    <div class="task-star-rating">★★★★★</div>
                </div>
                <div class="task-card-meta">
                    <div class="task-meta-item">
                        <span class="task-meta-label">Price</span>
                        <span class="task-meta-value price">$ {{ number_format($price, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Commission</span>
                        <span class="task-meta-value comm" style="color:var(--primary-light);">$ {{ number_format($comm, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Total Return</span>
                        <span class="task-meta-value total">$ {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Date</span>
                        <span class="task-meta-value" style="font-size:11px;">{{ $task['created_at'] ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if ($allCount === 0)
        @include('users._task_empty', ['msg' => 'No tasks yet'])
    @endif
</div>

{{-- ══════════════════════════════════════════════════════════════════
     PANE — PENDING
══════════════════════════════════════════════════════════════════ --}}
<div id="tk-pending" class="tk-pane task-detail-grid" style="display:none;">
    @if ($oneIncomplete)
        @php
            $price = $oneIncomplete->orderList->price ?? 0;
            $comm  = $price * $commRate;
            $total = $price + $comm;
        @endphp
        <div class="task-detail-card">
            <div class="task-card-img normal-bg" style="position:relative;">
                @if (!empty($oneIncomplete->orderList->image))
                    <img src="{{ asset('OrderImages/' . $oneIncomplete->orderList->image) }}"
                         alt="task" style="width:100%;height:100%;object-fit:cover;border-radius:0;">
                @else
                    📦
                @endif
                <span class="task-selected-badge" style="background:linear-gradient(135deg,#ffb800,#ff8800);color:#1a0a00;font-size:12px;">⏳ PENDING</span>
            </div>
            <div class="task-card-body">
                <div class="task-card-title-row">
                    <div class="task-card-title">{{ $oneIncomplete->orderList->title ?? 'Task' }}</div>
                    <div class="task-star-rating">★★★★★</div>
                </div>
                <div class="task-card-meta">
                    <div class="task-meta-item">
                        <span class="task-meta-label">Price</span>
                        <span class="task-meta-value price">$ {{ number_format($price, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Commission</span>
                        <span class="task-meta-value comm">$ {{ number_format($comm, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Total Return</span>
                        <span class="task-meta-value total">$ {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Date</span>
                        <span class="task-meta-value" style="font-size:11px;">
                            {{ $oneIncomplete->created_at->format('M j, Y') }}
                        </span>
                    </div>
                </div>
                <div class="task-card-actions">
                    <form method="POST" action="{{ ($oneIncomplete->orderList->price > $userFunds) ? route('support') : route('submit.order') }}" style="flex:1;">
                        @csrf
                        <input type="hidden" name="order_id"   value="{{ $oneIncomplete->order_id }}">
                        <input type="hidden" name="commission" value="{{ $comm }}">
                        <button type="submit" class="btn-submit-task" style="width:100%;">✓ Submit Task</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        @include('users._task_empty', ['msg' => 'No pending orders'])
    @endif
</div>

{{-- ══════════════════════════════════════════════════════════════════
     PANE — COMPLETED
══════════════════════════════════════════════════════════════════ --}}
<div id="tk-completed" class="tk-pane task-detail-grid" style="display:none;">
    @forelse ($completed as $task)
        @php
            $price = $task['price']      ?? 0;
            $comm  = $task['commission'] ?? 0;
            $total = $task['totalPrice'] ?? ($price + $comm);
        @endphp
        <div class="task-detail-card">
            <div class="task-card-img normal-bg" style="position:relative;">
                @if (!empty($task['image']))
                    <img src="{{ asset('OrderImages/' . $task['image']) }}"
                         alt="task" style="width:100%;height:100%;object-fit:cover;border-radius:0;">
                @else
                    📦
                @endif
                <span class="task-selected-badge" style="background:rgba(0,200,150,0.85);color:#fff;font-size:12px;">✅ DONE</span>
            </div>
            <div class="task-card-body">
                <div class="task-card-title-row">
                    <div class="task-card-title">{{ $task['title'] ?? 'Task' }}</div>
                    <div class="task-star-rating">★★★★★</div>
                </div>
                <div class="task-card-meta">
                    <div class="task-meta-item">
                        <span class="task-meta-label">Price</span>
                        <span class="task-meta-value price">$ {{ number_format($price, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Commission</span>
                        <span class="task-meta-value comm">$ {{ number_format($comm, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Total Return</span>
                        <span class="task-meta-value total">$ {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Date</span>
                        <span class="task-meta-value" style="font-size:11px;">{{ $task['created_at'] ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        @include('users._task_empty', ['msg' => 'No completed orders'])
    @endforelse
</div>

{{-- ══════════════════════════════════════════════════════════════════
     PANE — UNDONE
══════════════════════════════════════════════════════════════════ --}}
<div id="tk-undone" class="tk-pane task-detail-grid" style="display:none;">
    @forelse ($onHold as $task)
        @php
            $price = $task['price']      ?? 0;
            $comm  = $task['commission'] ?? 0;
            $total = $task['totalPrice'] ?? ($price + $comm);
        @endphp
        <div class="task-detail-card">
            <div class="task-card-img selected-bg" style="position:relative;">
                @if (!empty($task['image']))
                    <img src="{{ asset('OrderImages/' . $task['image']) }}"
                         alt="task" style="width:100%;height:100%;object-fit:cover;border-radius:0;">
                @else
                    📦
                @endif
                <span class="task-selected-badge" style="font-size:12px;">🔒 UNDONE</span>
            </div>
            <div class="task-card-body">
                <div class="task-card-title-row">
                    <div class="task-card-title">{{ $task['title'] ?? 'Task' }}</div>
                    <div class="task-star-rating">★★★★★</div>
                </div>
                <div class="task-card-meta">
                    <div class="task-meta-item">
                        <span class="task-meta-label">Price</span>
                        <span class="task-meta-value price">$ {{ number_format($price, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Commission</span>
                        <span class="task-meta-value comm" style="color:var(--primary-light);">$ {{ number_format($comm, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Total Return</span>
                        <span class="task-meta-value total">$ {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="task-meta-item">
                        <span class="task-meta-label">Date</span>
                        <span class="task-meta-value" style="font-size:11px;">{{ $task['created_at'] ?? '—' }}</span>
                    </div>
                </div>
            </div>
        </div>
    @empty
        @include('users._task_empty', ['msg' => 'No undone orders'])
    @endforelse
</div>

@push('scripts')
<script>
function tkTab(paneId, btn) {
    document.querySelectorAll('.tk-pane').forEach(function(p) { p.style.display = 'none'; });
    document.querySelectorAll('.pill-tab').forEach(function(b) { b.classList.remove('active'); });
    var pane = document.getElementById(paneId);
    if (pane) pane.style.display = 'grid';
    if (btn) btn.classList.add('active');
}
</script>
@endpush

@endsection
