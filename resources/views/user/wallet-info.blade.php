@extends('layouts.user')

@section('title', 'Wallet')
@section('page-title', 'Wallet')

@section('content')

<div style="max-width:520px;margin:0 auto;">

    @if (session('success'))
        <div class="alert alert-success" style="margin-bottom:16px;border-radius:var(--radius-sm);padding:12px 16px;background:rgba(0,200,150,0.1);border:1px solid rgba(0,200,150,0.3);color:var(--success);font-size:13px;">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if (auth()->user()->wallet_status !== 'active')

        {{-- Wallet deactive — block add/view until support activates it --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">💳</span> Wallet</div>
                <span class="status-badge status-pending">Deactive</span>
            </div>
            <div class="card-body" style="text-align:center;padding:36px 28px;">
                <div style="font-size:40px;margin-bottom:14px;">🔒</div>
                <h3 style="font-size:17px;font-weight:700;color:var(--text);margin:0 0 10px;">Your Wallet Is Not Active</h3>
                <p style="font-size:13.5px;color:var(--text-muted);line-height:1.7;margin:0 0 22px;">
                    Your wallet status is currently <strong style="color:var(--danger);">deactive</strong>.
                    Please contact support and pay the activation fee to add your wallet
                    information for future withdrawals.
                </p>
                <a href="{{ route('user.support') }}" class="btn btn-primary"
                   style="display:inline-flex;align-items:center;justify-content:center;gap:8px;">
                    🎧 Contact Support
                </a>
            </div>
        </div>

    @elseif (isset($wallet) && $wallet)

        {{-- Linked wallet display --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">💳</span> Linked Wallet</div>
                <span class="status-badge status-completed">Active</span>
            </div>
            <div class="card-body">
                <div class="wallet-linked-top">
                    <div class="wallet-linked-addr-wrap">
                        <span class="wallet-meta-label">Wallet Address</span>
                        <div class="wallet-linked-addr">{{ $wallet->vallet_address }}</div>
                    </div>
                    <button class="btn-copy btn btn-outline btn-sm"
                            data-copy="{{ $wallet->vallet_address }}">📋</button>
                </div>
                <div class="wallet-meta-grid">
                    <div>
                        <span class="wallet-meta-label">Type / Network</span>
                        <div class="wallet-meta-value accent">{{ $wallet->type }}</div>
                    </div>
                    <div>
                        <span class="wallet-meta-label">Phone</span>
                        <div class="wallet-meta-value muted">{{ $wallet->phone }}</div>
                    </div>
                </div>
                <div class="info-card" style="margin-top:16px;">
                    🔒 Wallet details are locked. Contact support to update your linked wallet.
                </div>
            </div>
        </div>

    @else

        {{-- Link wallet form --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">🔗</span> Link Wallet</div>
                <span class="card-link">Quick &amp; Secure</span>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div style="margin-bottom:16px;border-radius:var(--radius-sm);padding:12px 16px;background:rgba(255,71,87,0.08);border:1px solid rgba(255,71,87,0.3);">
                        <ul style="margin:0;padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li style="font-size:13px;color:var(--danger);">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('wallet-information.save') }}" novalidate data-loading>
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="vallet-address">Wallet Address</label>
                        <input id="vallet-address" name="vallet-address" type="text"
                               class="form-input" placeholder="e.g. TAbc123..."
                               value="{{ old('vallet-address') }}" required>
                        @error('vallet-address')
                            <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone-number">Phone Number</label>
                        <input id="phone-number" name="phone-number" type="tel"
                               class="form-input" placeholder="+1 (XXX) XXX-XXXX"
                               value="{{ old('phone-number') }}" required>
                        @error('phone-number')
                            <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Wallet Type / Network</label>
                        <div class="wallet-radio-group">
                            @foreach (['TRC20', 'ERC20', 'ETH', 'BTC'] as $type)
                                <label class="wallet-radio-option">
                                    <input type="radio" name="wallet-type" value="{{ $type }}"
                                           {{ old('wallet-type') === $type ? 'checked' : '' }} required>
                                    {{ $type }}
                                </label>
                            @endforeach
                        </div>
                        @error('wallet-type')
                            <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                        Link Wallet
                    </button>
                </form>

                <div class="info-card" style="margin-top:16px;">
                    🔒 Make sure your wallet address and network match to avoid failed redemptions.
                </div>
            </div>
        </div>

    @endif

</div>

@endsection
