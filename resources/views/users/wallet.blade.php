@extends('layouts.user')

@section('title', 'Wallet')
@section('page-title', 'Wallet')

@section('content')

{{-- ── BALANCE HERO ─────────────────────────────────────────── --}}
<div class="wallet-hero">
    <div class="wallet-hero-gradient">
        <div class="wallet-hero-label">Available Balance</div>
        <div class="wallet-hero-amount">
            ${{ number_format(auth()->user()->balance ?? 0, 2) }}
        </div>
        <div class="wallet-hero-pkr">
            ≈ PKR {{ number_format((auth()->user()->balance ?? 0) * 278, 2) }}
        </div>
    </div>
    <div class="wallet-hero-actions">
        <a href="{{ route('user.recharge') }}" class="btn btn-primary">📥 Recharge</a>
        <a href="{{ route('user.redemption') }}" class="btn btn-outline">📤 Withdraw</a>
    </div>
</div>

{{-- ── THREE STAT CARDS ────────────────────────────────────── --}}
<div class="wallet-stats">
    <div class="wallet-stat">
        <div class="wallet-stat-icon">💰</div>
        <div>
            <div class="wallet-stat-label">Total Earned</div>
            <div class="wallet-stat-value v-success">
                ${{ number_format($totals->earned ?? 0, 2) }}
            </div>
        </div>
    </div>
    <div class="wallet-stat">
        <div class="wallet-stat-icon">📤</div>
        <div>
            <div class="wallet-stat-label">Total Withdrawn</div>
            <div class="wallet-stat-value">
                ${{ number_format($totals->withdrawn ?? 0, 2) }}
            </div>
        </div>
    </div>
    <div class="wallet-stat">
        <div class="wallet-stat-icon">⏳</div>
        <div>
            <div class="wallet-stat-label">Pending</div>
            <div class="wallet-stat-value v-warning">
                ${{ number_format($totals->pending ?? 0, 2) }}
            </div>
        </div>
    </div>
</div>

{{-- ── TWO-COLUMN LAYOUT ───────────────────────────────────── --}}
<div class="wallet-layout">

    {{-- ── LEFT COLUMN ──────────────────────────────────────── --}}
    <div class="wallet-left">

        {{-- Linked wallet OR wallet form --}}
        @if (isset($wallet) && $wallet)

            {{-- Wallet is already linked — show details --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><span class="icon">💳</span> Linked Wallet</div>
                    <span class="card-link">Active</span>
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
                </div>
            </div>

        @else

            {{-- No wallet yet — show link form --}}
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><span class="icon">🔗</span> Link Wallet</div>
                    <span class="card-link">Quick &amp; Secure</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('wallet-information.save') }}" data-loading>
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Wallet Address</label>
                            <input id="vallet-address"
                                   name="vallet-address"
                                   type="text"
                                   class="form-input"
                                   placeholder="e.g. TAbc123..."
                                   value="{{ old('vallet-address') }}"
                                   required>
                            @error('vallet-address')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input id="phone-number"
                                   name="phone-number"
                                   type="tel"
                                   class="form-input"
                                   placeholder="+1 (XXX) XXX-XXXX"
                                   value="{{ old('phone-number') }}"
                                   required>
                            @error('phone-number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Wallet Type</label>
                            <div class="wallet-radio-group">
                                @foreach (['TRC20','ERC20','ETH','BTC'] as $type)
                                    <label class="wallet-radio-option">
                                        <input type="radio"
                                               name="wallet-type"
                                               value="{{ $type }}"
                                               {{ old('wallet-type') === $type ? 'checked' : '' }}
                                               required>
                                        {{ $type }}
                                    </label>
                                @endforeach
                            </div>
                            @error('wallet-type')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                            Link Wallet
                        </button>
                    </form>
                </div>
            </div>

        @endif

        {{-- Quick actions --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">⚡</span> Quick Actions</div>
            </div>
            <div class="card-body">
                <div class="quick-stats">
                    <a href="{{ route('user.recharge') }}" class="qs-row" style="text-decoration:none;">
                        <span class="qs-label">📥 Recharge Balance</span>
                        <span class="qs-value" style="color:var(--accent);">→</span>
                    </a>
                    <a href="{{ route('user.redemption') }}" class="qs-row" style="text-decoration:none;">
                        <span class="qs-label">📤 Withdraw Funds</span>
                        <span class="qs-value" style="color:var(--accent);">→</span>
                    </a>
                    <a href="{{ route('user.recharge-history') }}" class="qs-row" style="text-decoration:none;">
                        <span class="qs-label">📋 Recharge History</span>
                        <span class="qs-value" style="color:var(--accent);">→</span>
                    </a>
                    <a href="{{ route('user.redemption-history') }}" class="qs-row" style="text-decoration:none;">
                        <span class="qs-label">📋 Withdrawal History</span>
                        <span class="qs-value" style="color:var(--accent);">→</span>
                    </a>
                </div>
            </div>
        </div>

    </div>{{-- /wallet-left --}}

    {{-- ── RIGHT COLUMN ─────────────────────────────────────── --}}
    <div class="wallet-right">

        {{-- Recent Transactions --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">🔄</span> Recent Transactions</div>
                <a href="{{ route('user.recharge-history') }}" class="card-link">View All</a>
            </div>
            <div class="card-body" style="padding:0;">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions ?? [] as $tx)
                                <tr>
                                    <td>
                                        @if ($tx->type === 'commission')
                                            <span class="tx-type commission">+ Commission</span>
                                        @elseif ($tx->type === 'deposit')
                                            <span class="tx-type credit">+ Recharge</span>
                                        @else
                                            <span class="tx-type debit">− Withdrawal</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="tx-amount {{ in_array($tx->type, ['commission','deposit']) ? 'tx-credit' : 'tx-debit' }}">
                                            {{ in_array($tx->type, ['commission','deposit']) ? '+' : '−' }}${{ number_format(abs($tx->amount ?? 0), 2) }}
                                        </span>
                                    </td>
                                    <td class="text-muted-sm">{{ $tx->method ?? '—' }}</td>
                                    <td>
                                        @php $st = strtolower($tx->status ?? ''); @endphp
                                        @if ($st === 'active' || $st === 'completed')
                                            <span class="status-badge status-completed">Credited</span>
                                        @elseif ($st === 'pending')
                                            <span class="status-badge status-pending">Pending</span>
                                        @else
                                            <span class="status-badge">{{ ucfirst($tx->status ?? 'Processing') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-muted-sm">
                                        {{ optional($tx->created_at)->format('M j, Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="table-empty">No transactions yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Referral Program --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">👥</span> Referral Program</div>
                <span class="earn-card-value green" style="font-size:16px;">
                    ${{ number_format($referral_total ?? 0, 2) }}
                </span>
            </div>
            <div class="card-body">
                <p class="wallet-ref-desc">
                    You have
                    <strong>{{ $referrals_count ?? 0 }} active referral{{ ($referrals_count ?? 0) !== 1 ? 's' : '' }}</strong>
                    generating passive income on your behalf.
                </p>
                <div class="wallet-ref-inner">
                    <div class="wallet-ref-sub">Your Referral Link</div>
                    <div class="wallet-ref-link-row">
                        <div class="wallet-ref-code">
                            https://realtymogul.app/ref/{{ strtoupper(substr(auth()->user()->name ?? 'USER', 0, 5)) }}{{ auth()->user()->id ?? '001' }}
                        </div>
                        <button class="btn-copy btn btn-primary btn-sm"
                                data-copy="https://realtymogul.app/ref/{{ strtoupper(substr(auth()->user()->name ?? 'USER', 0, 5)) }}{{ auth()->user()->id ?? '001' }}">
                            📋 Copy
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /wallet-right --}}

</div>{{-- /wallet-layout --}}

@endsection
