@extends('layouts.user')

@section('title', 'Redemption')
@section('page-title', 'Redemption / Withdrawal')

@push('styles')
<style>
/* ── REDEMPTION PAGE RESPONSIVE ───────────────────────── */
.redemption-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 22px;
}
.redemption-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 22px;
    align-items: start;
}
.redemption-rules-card { position: sticky; top: 88px; }

@media (max-width: 900px) {
    .redemption-grid       { grid-template-columns: 1fr; }
    .redemption-rules-card { position: relative; top: auto; }
}
@media (max-width: 480px) {
    .redemption-stats { grid-template-columns: 1fr; gap: 10px; }
}
@media (min-width: 481px) and (max-width: 900px) {
    .redemption-stats { grid-template-columns: repeat(3, 1fr); }
}

.redemption-stat-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.redemption-stat-label {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: var(--text-muted);
    font-weight: 600;
}
.redemption-stat-value {
    font-family: 'Space Mono', monospace;
    font-size: 20px;
    font-weight: 700;
}
</style>
@endpush

@section('content')

@php
    $user             = auth()->user();
    $availableBalance = $adjustedTotalFunds ?? 0;
    $minWithdraw      = $user->min_withdraw ?? 20;
    $maxWithdraw      = $user->max_withdraw ?? 2000;
    $maxAllowed       = min($maxWithdraw, $availableBalance);
    $walletStatus     = $user->wallet_status ?? 'inactive';
    $withdrawBlocked  = ($user->withdraw_status ?? '') === 'deactive';
@endphp

@if ($withdrawBlocked)

    {{-- Withdrawal deactivated by admin — block the form, point to support --}}
    <div style="max-width:560px;margin:40px auto;">
        <div class="card">
            <div class="card-header">
                <div class="card-title"><span class="icon">📤</span> Withdrawal</div>
                <span class="status-badge status-pending">Deactive</span>
            </div>
            <div class="card-body" style="text-align:center;padding:36px 28px;">
                <div style="font-size:40px;margin-bottom:14px;">🔒</div>
                <h3 style="font-size:17px;font-weight:700;color:var(--text);margin:0 0 10px;">Your Withdrawal Is Deactivated</h3>
                <p style="font-size:13.5px;color:var(--text-muted);line-height:1.7;margin:0 0 22px;">
                    Your withdrawal status is currently <strong style="color:var(--danger);">deactive</strong>.
                    Please connect with the support assistant to get your withdrawals activated
                    by the admin before you can request a redemption.
                </p>
                <a href="{{ route('user.support') }}" class="btn btn-primary"
                   style="display:inline-flex;align-items:center;justify-content:center;gap:8px;">
                    🎧 Connect to Support Assistant
                </a>
            </div>
        </div>
    </div>

@else

{{-- BALANCE SUMMARY BAR --}}
<div class="redemption-stats">
    <div class="redemption-stat-card">
        <span style="font-size:22px;">💰</span>
        <div>
            <div class="redemption-stat-label">Available</div>
            <div class="redemption-stat-value" style="color:var(--success);">${{ number_format($availableBalance, 2) }}</div>
        </div>
    </div>
    <div class="redemption-stat-card">
        <span style="font-size:22px;">📉</span>
        <div>
            <div class="redemption-stat-label">Min Withdrawal</div>
            <div class="redemption-stat-value" style="color:var(--text);">${{ number_format($minWithdraw, 2) }}</div>
        </div>
    </div>
    <div class="redemption-stat-card">
        <span style="font-size:22px;">⏱️</span>
        <div>
            <div class="redemption-stat-label">Processing Time</div>
            <div class="redemption-stat-value" style="color:var(--accent);">24 hrs</div>
        </div>
    </div>
</div>

{{-- MAIN GRID: FORM + RULES --}}
<div class="redemption-grid">

    {{-- LEFT: WITHDRAWAL FORM --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title"><span class="icon">📤</span> Request Withdrawal</div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.redemption.store') }}" method="POST" data-loading>
                @csrf
                <input type="hidden" id="selectedMethod" name="payment_method" value="">

                {{-- Payment Method --}}
                <span class="section-label-inline">Select Withdrawal Method</span>
                <div class="payment-methods">
                    <div class="pay-method" data-method="ach">
                        <div class="pay-method-icon">🏦</div>
                        <div class="pay-method-name">ACH (Bank Transfer)</div>
                        <div class="pay-method-tag">1–3 business days</div>
                    </div>
                    <div class="pay-method" data-method="zelle">
                        <div class="pay-method-icon">⚡</div>
                        <div class="pay-method-name">Zelle</div>
                        <div class="pay-method-tag">Instant</div>
                    </div>
                    <div class="pay-method" data-method="venmo">
                        <div class="pay-method-icon">💸</div>
                        <div class="pay-method-name">Venmo</div>
                        <div class="pay-method-tag">Instant</div>
                    </div>
                    <div class="pay-method" data-method="paypal">
                        <div class="pay-method-icon">🅿️</div>
                        <div class="pay-method-name">PayPal</div>
                        <div class="pay-method-tag">Instant</div>
                    </div>
                    <div class="pay-method" data-method="card">
                        <div class="pay-method-icon">💳</div>
                        <div class="pay-method-name">Credit / Debit Card</div>
                        <div class="pay-method-tag">Instant</div>
                    </div>
                </div>
                @error('payment_method')
                    <div style="color:var(--danger);font-size:12px;margin-bottom:12px;">{{ $message }}</div>
                @enderror

                {{-- Account Details (shown based on method) --}}
                <div class="method-details">
                    <div class="method-detail" id="detail-ach" style="display:none;">
                        <div class="form-group">
                            <label class="form-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-input" placeholder="e.g. Bank of America">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Account Number</label>
                            <input type="text" name="account_number" class="form-input" placeholder="Account number">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Routing Number</label>
                            <input type="text" name="routing_number" class="form-input" placeholder="Routing number">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Account Title</label>
                            <input type="text" name="account_title" class="form-input" placeholder="Full name as on bank account">
                        </div>
                    </div>
                    <div class="method-detail" id="detail-zelle" style="display:none;">
                        <div class="form-group">
                            <label class="form-label">Zelle Phone or Email</label>
                            <input type="text" name="zelle_contact" class="form-input" placeholder="e.g. +1 (800) 555-0174 or email@example.com">
                        </div>
                    </div>
                    <div class="method-detail" id="detail-venmo" style="display:none;">
                        <div class="form-group">
                            <label class="form-label">Venmo Username</label>
                            <input type="text" name="venmo_username" class="form-input" placeholder="@username">
                        </div>
                    </div>
                    <div class="method-detail" id="detail-paypal" style="display:none;">
                        <div class="form-group">
                            <label class="form-label">PayPal Email</label>
                            <input type="email" name="paypal_email" class="form-input" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="method-detail" id="detail-card" style="display:none;">
                        <div class="form-group">
                            <label class="form-label">Card Reference (last 4 digits)</label>
                            <input type="text" name="card_last4" class="form-input" placeholder="e.g. 4242">
                        </div>
                    </div>
                </div>

                {{-- Amount --}}
                <span class="section-label-inline">Withdrawal Amount</span>
                <div class="amount-presets">
                    <button type="button" class="amount-preset" data-amount="20">$20</button>
                    <button type="button" class="amount-preset" data-amount="50">$50</button>
                    <button type="button" class="amount-preset" data-amount="100">$100</button>
                    <button type="button" class="amount-preset" data-amount="200">$200</button>
                    <button type="button" class="amount-preset" data-amount="500">$500</button>
                </div>
                <div class="form-group">
                    <div style="position:relative;display:flex;align-items:center;">
                        <span style="position:absolute;left:14px;font-size:15px;color:var(--text-muted);font-family:'Space Mono',monospace;font-weight:700;pointer-events:none;z-index:1;">$</span>
                        <input type="number" id="withdrawalAmount" name="amount" class="form-input amount-input"
                            placeholder="Min. ${{ number_format($minWithdraw,2) }}"
                            min="{{ $minWithdraw }}" max="{{ $maxAllowed }}"
                            style="padding-left:36px !important;"
                            value="{{ old('amount') }}">
                    </div>
                    @error('amount')
                        <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Fee Breakdown --}}
                <div class="fee-breakdown" id="feeBreakdown">
                    <div class="fee-row">
                        <span class="label">Withdrawal Amount</span>
                        <span class="val" id="feeAmount">$0.00</span>
                    </div>
                    <hr class="fee-divider">
                    <div class="fee-row">
                        <span class="label">Processing Fee</span>
                        <span class="val" style="color:var(--success);">$0.00</span>
                    </div>
                    <hr class="fee-divider">
                    <div class="fee-row net">
                        <span class="label" style="font-weight:700;color:var(--text);">You Receive</span>
                        <span class="val" id="feeReceive" style="color:var(--success);font-weight:700;">$0.00</span>
                    </div>
                </div>

                {{-- Redemption Password --}}
                <div class="form-group" style="margin-top:12px;">
                    <label class="form-label">Redemption Password</label>
                    <div style="position:relative;display:flex;align-items:center;">
                        <span style="position:absolute;left:14px;font-size:15px;pointer-events:none;z-index:1;line-height:1;">🔒</span>
                        <input type="password" id="walletPassword" name="password" class="form-input"
                            style="padding-left:44px !important;padding-right:50px !important;"
                            placeholder="Enter your redemption password" required
                            autocomplete="current-password">
                        <button type="button" id="toggleRedemptionPwd"
                            title="Show / hide password"
                            style="position:absolute;right:12px;background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:17px;padding:4px 6px;line-height:1;transition:color 0.15s,transform 0.15s;z-index:1;border-radius:4px;"
                            onmouseover="this.style.color='var(--primary-light)';this.style.transform='scale(1.15)'"
                            onmouseout="this.style.color='var(--text-muted)';this.style.transform='scale(1)'">👁</button>
                    </div>
                    @error('password')
                        <div style="color:var(--danger);font-size:12px;margin-top:4px;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">
                    Request Withdrawal →
                </button>
            </form>
        </div>
    </div>

    {{-- RIGHT: RULES --}}
    <div class="card redemption-rules-card">
        <div class="card-header">
            <div class="card-title"><span class="icon">📜</span> Withdrawal Rules</div>
        </div>
        <div class="card-body">
            <div class="info-card" style="margin-bottom:8px;">
                ⚠️ Withdrawals are processed within <strong>24 hours</strong> on business days.
                Submissions after 6 PM ET may process the next business day.
            </div>
            <div class="info-card" style="margin-bottom:12px;">
                <strong>Wallet status:</strong>
                <span style="text-transform:capitalize;color:{{ $walletStatus === 'active' ? 'var(--success)' : 'var(--danger)' }};">
                    {{ $walletStatus }}
                </span>
            </div>

            <span class="section-label-inline">Fee Structure</span>
            <div class="table-responsive" style="margin-bottom:20px;">
                <table style="font-size:12.5px;">
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>Fee</th>
                            <th>Min</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ACH (Bank Transfer)</td>
                            <td style="color:var(--success);">0%</td>
                            <td>${{ number_format($minWithdraw, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Zelle</td>
                            <td style="color:var(--success);">0%</td>
                            <td>${{ number_format($minWithdraw, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Venmo</td>
                            <td style="color:var(--success);">0%</td>
                            <td>${{ number_format($minWithdraw, 2) }}</td>
                        </tr>
                        <tr>
                            <td>PayPal</td>
                            <td style="color:var(--success);">0%</td>
                            <td>${{ number_format($minWithdraw, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Card</td>
                            <td style="color:var(--success);">0%</td>
                            <td>${{ number_format($minWithdraw, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <ul style="padding-left:18px;margin:0;display:flex;flex-direction:column;gap:8px;">
                <li style="font-size:12.5px;color:var(--text-muted);line-height:1.6;">Ensure your payment details are accurate before submitting</li>
                <li style="font-size:12.5px;color:var(--text-muted);line-height:1.6;">Minimum withdrawal is <strong style="color:var(--text);">${{ number_format($minWithdraw, 2) }}</strong></li>
                <li style="font-size:12.5px;color:var(--text-muted);line-height:1.6;">Maximum single withdrawal: <strong style="color:var(--text);">No limit</strong></li>
                <li style="font-size:12.5px;color:var(--text-muted);line-height:1.6;">Rejected withdrawals are refunded within 24 hours</li>
            </ul>
        </div>
    </div>

</div>{{-- /redemption-grid --}}

<script>
    function updateFeeBreakdown(val) {
        const amt = parseFloat(val) || 0;
        const fmt = '$' + amt.toFixed(2);
        const el1 = document.getElementById('feeAmount');
        const el2 = document.getElementById('feeReceive');
        if (el1) el1.textContent = fmt;
        if (el2) el2.textContent = fmt;
    }
    const amtInput = document.getElementById('withdrawalAmount');
    if (amtInput) {
        amtInput.addEventListener('input', () => updateFeeBreakdown(amtInput.value));
        updateFeeBreakdown(amtInput.value);
    }

    document.querySelectorAll('.amount-preset').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('withdrawalAmount').value = this.dataset.amount;
            updateFeeBreakdown(this.dataset.amount);
        });
    });

    document.querySelectorAll('.pay-method').forEach(method => {
        method.addEventListener('click', function() {
            document.querySelectorAll('.pay-method').forEach(m => m.style.opacity = '0.6');
            this.style.opacity = '1';
            document.getElementById('selectedMethod').value = this.dataset.method;
            document.querySelectorAll('.method-detail').forEach(d => d.style.display = 'none');
            const el = document.getElementById('detail-' + this.dataset.method);
            if (el) el.style.display = 'block';
        });
    });

    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const amountEl = document.getElementById('withdrawalAmount');
            const amount = parseFloat(amountEl.value || 0);
            const min = parseFloat(amountEl.getAttribute('min')) || 0;
            if (!amount || amount < min) {
                e.preventDefault();
                alert('Please select or enter a valid amount (minimum $' + min + ')');
                return false;
            }
        });
    }

    (function () {
        const btn   = document.getElementById('toggleRedemptionPwd');
        const input = document.getElementById('walletPassword');
        if (!btn || !input) return;
        btn.addEventListener('click', function () {
            const isHidden  = input.type === 'password';
            input.type      = isHidden ? 'text' : 'password';
            btn.textContent = isHidden ? '🙈' : '👁';
        });
    })();
</script>

@endif

@endsection
