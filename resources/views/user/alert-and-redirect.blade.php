@extends('layouts.user')

@section('title', 'Notice')
@section('page-title', 'Notice')

@section('content')
<div style="max-width:500px;margin:60px auto;text-align:center;">
    <div class="card" style="padding:48px 32px;">
        <div style="font-size:48px;margin-bottom:18px;">⚠️</div>
        <h2 style="font-size:20px;font-weight:800;color:var(--text);margin:0 0 12px;">Action Required</h2>
        <p style="font-size:14px;color:var(--text-muted);margin:0 0 28px;line-height:1.7;">{{ $message ?? 'Please complete your current pending order before proceeding.' }}</p>
        <a href="{{ $redirect_url ?? route('user.tasks') }}"
           class="btn btn-primary"
           style="display:inline-flex;align-items:center;gap:8px;justify-content:center;">
            📋 View Pending Order
        </a>
    </div>
</div>

@push('scripts')
<script>
    {{-- Auto-redirect after 4 seconds --}}
    setTimeout(function() {
        window.location.href = '{{ $redirect_url ?? route("user.tasks") }}';
    }, 4000);
</script>
@endpush

@endsection
