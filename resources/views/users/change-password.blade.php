@extends('layouts.user')

@section('title', 'Change Password')
@section('page-title', 'Change Password')

@push('styles')
<style>
/* ── PAGE WRAPPER ──────────────────────────────────────── */
.cp-wrap {
    max-width: 540px;
    margin: 0 auto;
}

/* ── TAB STRIP ─────────────────────────────────────────── */
.cp-tabs {
    display: flex;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius) var(--radius) 0 0;
    overflow: hidden;
}
.cp-tab {
    flex: 1;
    padding: 16px 20px;
    font-size: 14px;
    font-weight: 700;
    font-family: 'Sora', sans-serif;
    text-align: center;
    cursor: pointer;
    color: var(--text-muted);
    border: none;
    background: transparent;
    border-bottom: 3px solid transparent;
    transition: color 0.2s, border-color 0.2s, background 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.cp-tab:hover { color: var(--text); background: rgba(108,71,255,0.04); }
.cp-tab.active {
    color: var(--primary-light);
    border-bottom-color: var(--primary);
    background: rgba(108,71,255,0.06);
}
.cp-tab + .cp-tab {
    border-left: 1px solid var(--border);
}

/* ── CARD BODY ─────────────────────────────────────────── */
.cp-card-body {
    background: var(--card);
    border: 1px solid var(--border);
    border-top: none;
    border-radius: 0 0 var(--radius) var(--radius);
    padding: 32px 36px 36px;
}
@media(max-width:480px) {
    .cp-card-body { padding: 24px 20px 28px; }
    .cp-tab { font-size: 13px; padding: 14px 12px; }
}

/* ── TAB PANELS ────────────────────────────────────────── */
.cp-panel { display: none; }
.cp-panel.active { display: block; }

/* ── ALERT BANNERS ─────────────────────────────────────── */
.cp-alert {
    border-radius: var(--radius-sm);
    padding: 13px 16px;
    margin-bottom: 22px;
    font-size: 13.5px;
    display: flex;
    align-items: center;
    gap: 10px;
}
.cp-alert.success {
    background: rgba(0,214,143,0.1);
    border: 1px solid rgba(0,214,143,0.3);
    color: var(--success);
}
.cp-alert.danger {
    background: rgba(255,71,87,0.08);
    border: 1px solid rgba(255,71,87,0.25);
    color: var(--danger);
}

/* ── FORM GROUP ────────────────────────────────────────── */
.cp-group { margin-bottom: 20px; }
.cp-label {
    display: block;
    font-size: 12.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--text-muted);
    margin-bottom: 8px;
}

/* ── INPUT WRAP ────────────────────────────────────────── */
.cp-input-wrap {
    position: relative;
    display: flex;
    align-items: center;
}
.cp-input-icon {
    position: absolute;
    left: 14px;
    font-size: 15px;
    pointer-events: none;
    z-index: 1;
    line-height: 1;
}
.cp-input {
    width: 100%;
    padding: 13px 48px 13px 44px !important; /* left: icon space, right: eye toggle space */
    background: var(--dark2) !important;
    border: 1.5px solid var(--border) !important;
    border-radius: var(--radius-sm) !important;
    color: var(--text) !important;
    font-size: 14px !important;
    font-family: 'Sora', sans-serif;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    box-sizing: border-box;
}
.cp-input:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(108,71,255,0.15);
}
.cp-input::placeholder { color: rgba(240,240,255,0.3); }
.cp-eye {
    position: absolute;
    right: 12px;
    background: none;
    border: none;
    cursor: pointer;
    color: var(--text-muted);
    font-size: 16px;
    padding: 4px;
    line-height: 1;
    transition: color 0.15s;
    z-index: 1;
}
.cp-eye:hover { color: var(--text); }

/* ── FIELD ERROR ───────────────────────────────────────── */
.cp-error { color: var(--danger); font-size: 12px; margin-top: 5px; }

/* ── STRENGTH METER ────────────────────────────────────── */
.cp-strength { margin-top: 10px; }
.cp-bars {
    display: flex;
    gap: 5px;
    margin-bottom: 5px;
}
.cp-bar {
    flex: 1;
    height: 4px;
    border-radius: 2px;
    background: var(--border);
    transition: background 0.3s;
}
.cp-strength-lbl { font-size: 11px; color: var(--text-muted); font-weight: 600; }

/* ── REQUIREMENTS ──────────────────────────────────────── */
.cp-reqs {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px 16px;
    margin: 16px 0 24px;
}
@media(max-width:400px) { .cp-reqs { grid-template-columns: 1fr; } }
.cp-req {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12.5px;
    color: var(--text-muted);
    transition: color 0.2s;
}
.cp-req.met { color: var(--success); }
.cp-dot {
    width: 18px; height: 18px;
    border-radius: 50%;
    border: 1.5px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 10px;
    transition: all 0.2s;
    flex-shrink: 0;
}
.cp-req.met .cp-dot {
    background: var(--success);
    border-color: var(--success);
    color: #fff;
}

/* ── DIVIDER ───────────────────────────────────────────── */
.cp-divider {
    border: none;
    border-top: 1px solid var(--border);
    margin: 24px 0 24px;
}

/* ── SUBMIT BUTTON ─────────────────────────────────────── */
.cp-btn {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: var(--radius-sm);
    font-size: 15px;
    font-weight: 700;
    font-family: 'Sora', sans-serif;
    cursor: pointer;
    transition: opacity 0.2s, transform 0.15s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}
.cp-btn:hover { opacity: 0.88; transform: translateY(-1px); }
.cp-btn-account { background: linear-gradient(135deg, var(--primary), var(--accent)); color: #fff; }
.cp-btn-wallet  { background: linear-gradient(135deg, #00b894, #00cec9); color: #fff; }

/* ── NOTE BOX ──────────────────────────────────────────── */
.cp-note {
    background: rgba(0,214,143,0.06);
    border: 1px solid rgba(0,214,143,0.2);
    border-radius: var(--radius-sm);
    padding: 12px 16px;
    font-size: 12.5px;
    color: var(--text-muted);
    margin-bottom: 24px;
    line-height: 1.6;
}
.cp-note strong { color: var(--success); }
</style>
@endpush

@section('content')

<div class="cp-wrap">

    {{-- ── TAB STRIP ── --}}
    <div class="cp-tabs" role="tablist">
        <button class="cp-tab active" role="tab" data-target="panel-account" id="tab-account">
            🔑 Account Password
        </button>
        <button class="cp-tab" role="tab" data-target="panel-wallet" id="tab-wallet">
            💼 Wallet Password
        </button>
    </div>

    {{-- ── CARD BODY ── --}}
    <div class="cp-card-body">

        {{-- ════════════════════════════════════
             PANEL 1 — ACCOUNT PASSWORD
        ════════════════════════════════════ --}}
        <div class="cp-panel active" id="panel-account" role="tabpanel">

            @if(session('pass_status') && old('_form') !== 'wallet')
                <div class="cp-alert success">✅ {{ session('pass_status') }}</div>
            @endif
            @if($errors->hasAny(['current_password','new_password','new_password_confirmation']))
                <div class="cp-alert danger">❌ Please fix the errors below before continuing.</div>
            @endif

            <form action="{{ route('user.password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="_form" value="account">

                {{-- Current Password --}}
                <div class="cp-group">
                    <label class="cp-label" for="acc-current">Current Password</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">🔒</span>
                        <input type="password" id="acc-current" name="current_password"
                               class="cp-input" placeholder="Enter your current password"
                               autocomplete="current-password">
                        <button type="button" class="cp-eye" data-target="acc-current" aria-label="Toggle password">👁</button>
                    </div>
                    @error('current_password')
                        <div class="cp-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- New Password --}}
                <div class="cp-group">
                    <label class="cp-label" for="acc-new">New Password</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">🔐</span>
                        <input type="password" id="acc-new" name="new_password"
                               class="cp-input" placeholder="Min. 8 characters"
                               autocomplete="new-password">
                        <button type="button" class="cp-eye" data-target="acc-new" aria-label="Toggle password">👁</button>
                    </div>
                    @error('new_password')
                        <div class="cp-error">{{ $message }}</div>
                    @enderror
                    <div class="cp-strength" id="acc-strength">
                        <div class="cp-bars">
                            <div class="cp-bar" id="acc-b1"></div>
                            <div class="cp-bar" id="acc-b2"></div>
                            <div class="cp-bar" id="acc-b3"></div>
                            <div class="cp-bar" id="acc-b4"></div>
                        </div>
                        <span class="cp-strength-lbl" id="acc-strength-lbl">Enter a password above</span>
                    </div>
                </div>

                {{-- Confirm Password --}}
                <div class="cp-group">
                    <label class="cp-label" for="acc-confirm">Confirm New Password</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">✅</span>
                        <input type="password" id="acc-confirm" name="new_password_confirmation"
                               class="cp-input" placeholder="Repeat your new password"
                               autocomplete="new-password">
                        <button type="button" class="cp-eye" data-target="acc-confirm" aria-label="Toggle password">👁</button>
                    </div>
                    @error('new_password_confirmation')
                        <div class="cp-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Requirements --}}
                <div class="cp-reqs" id="acc-reqs">
                    <div class="cp-req" id="acc-req-len"><span class="cp-dot"></span>At least 8 characters</div>
                    <div class="cp-req" id="acc-req-up"><span class="cp-dot"></span>One uppercase letter</div>
                    <div class="cp-req" id="acc-req-num"><span class="cp-dot"></span>One number</div>
                    <div class="cp-req" id="acc-req-sym"><span class="cp-dot"></span>One special character</div>
                </div>

                <hr class="cp-divider">

                <button type="submit" class="cp-btn cp-btn-account">🔑 Update Account Password</button>
            </form>

        </div>{{-- /panel-account --}}

        {{-- ════════════════════════════════════
             PANEL 2 — WALLET PASSWORD
        ════════════════════════════════════ --}}
        <div class="cp-panel" id="panel-wallet" role="tabpanel">

            <div class="cp-note">
                <strong>⚠ Important:</strong> Your wallet password is required to authorize all withdrawals.
                Keep it different from your account password and store it securely.
            </div>

            @if(session('pass_status') && old('_form') === 'wallet')
                <div class="cp-alert success">✅ {{ session('pass_status') }}</div>
            @endif
            @if($errors->hasAny(['current_wallet_password','new_wallet_password','new_wallet_password_confirmation']))
                <div class="cp-alert danger">❌ Please fix the errors below before continuing.</div>
            @endif

            <form action="{{ route('user.wallet-password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="_form" value="wallet">

                {{-- Current Wallet Password --}}
                <div class="cp-group">
                    <label class="cp-label" for="wal-current">Current Wallet Password</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">🔒</span>
                        <input type="password" id="wal-current" name="current_wallet_password"
                               class="cp-input" placeholder="Enter your current wallet password"
                               autocomplete="current-password">
                        <button type="button" class="cp-eye" data-target="wal-current" aria-label="Toggle password">👁</button>
                    </div>
                    @error('current_wallet_password')
                        <div class="cp-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- New Wallet Password --}}
                <div class="cp-group">
                    <label class="cp-label" for="wal-new">New Wallet Password</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">🔐</span>
                        <input type="password" id="wal-new" name="new_wallet_password"
                               class="cp-input" placeholder="Min. 8 characters"
                               autocomplete="new-password">
                        <button type="button" class="cp-eye" data-target="wal-new" aria-label="Toggle password">👁</button>
                    </div>
                    @error('new_wallet_password')
                        <div class="cp-error">{{ $message }}</div>
                    @enderror
                    <div class="cp-strength">
                        <div class="cp-bars">
                            <div class="cp-bar" id="wal-b1"></div>
                            <div class="cp-bar" id="wal-b2"></div>
                            <div class="cp-bar" id="wal-b3"></div>
                            <div class="cp-bar" id="wal-b4"></div>
                        </div>
                        <span class="cp-strength-lbl" id="wal-strength-lbl">Enter a password above</span>
                    </div>
                </div>

                {{-- Confirm Wallet Password --}}
                <div class="cp-group">
                    <label class="cp-label" for="wal-confirm">Confirm New Wallet Password</label>
                    <div class="cp-input-wrap">
                        <span class="cp-input-icon">✅</span>
                        <input type="password" id="wal-confirm" name="new_wallet_password_confirmation"
                               class="cp-input" placeholder="Repeat your new wallet password"
                               autocomplete="new-password">
                        <button type="button" class="cp-eye" data-target="wal-confirm" aria-label="Toggle password">👁</button>
                    </div>
                    @error('new_wallet_password_confirmation')
                        <div class="cp-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Requirements --}}
                <div class="cp-reqs">
                    <div class="cp-req" id="wal-req-len"><span class="cp-dot"></span>At least 8 characters</div>
                    <div class="cp-req" id="wal-req-up"><span class="cp-dot"></span>One uppercase letter</div>
                    <div class="cp-req" id="wal-req-num"><span class="cp-dot"></span>One number</div>
                    <div class="cp-req" id="wal-req-sym"><span class="cp-dot"></span>One special character</div>
                </div>

                <hr class="cp-divider">

                <button type="submit" class="cp-btn cp-btn-wallet">💼 Update Wallet Password</button>
            </form>

        </div>{{-- /panel-wallet --}}

    </div>{{-- /cp-card-body --}}

    {{-- Back link --}}
    <div style="text-align:center;margin-top:18px;">
        <a href="{{ route('user.profile') }}"
           style="font-size:13px;color:var(--text-muted);text-decoration:none;transition:color 0.15s;"
           onmouseover="this.style.color='var(--primary-light)'"
           onmouseout="this.style.color='var(--text-muted)'">← Back to Profile</a>
    </div>

</div>{{-- /cp-wrap --}}

@push('scripts')
<script>
(function () {
    /* ── TAB SWITCHING ───────────────────────────────── */
    document.querySelectorAll('.cp-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
            document.querySelectorAll('.cp-tab').forEach(function (t) { t.classList.remove('active'); });
            document.querySelectorAll('.cp-panel').forEach(function (p) { p.classList.remove('active'); });
            tab.classList.add('active');
            document.getElementById(tab.dataset.target).classList.add('active');
        });
    });

    /* ── Open correct tab if validation errors exist ─ */
    var walletErrors = {{ $errors->hasAny(['current_wallet_password','new_wallet_password','new_wallet_password_confirmation']) ? 'true' : 'false' }};
    var walletSuccess = {{ (session('pass_status') && old('_form') === 'wallet') ? 'true' : 'false' }};
    if (walletErrors || walletSuccess) {
        document.getElementById('tab-wallet').click();
    }

    /* ── EYE TOGGLE ──────────────────────────────────── */
    document.querySelectorAll('.cp-eye').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = document.getElementById(btn.dataset.target);
            if (!input) return;
            var isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            btn.textContent = isText ? '👁' : '🙈';
        });
    });

    /* ── STRENGTH METER ──────────────────────────────── */
    function scorePassword(val) {
        var s = 0;
        if (val.length >= 8)              s++;
        if (/[A-Z]/.test(val))            s++;
        if (/[0-9]/.test(val))            s++;
        if (/[^A-Za-z0-9]/.test(val))     s++;
        return s;
    }
    var colors = ['var(--danger)', 'var(--warning)', 'var(--accent)', 'var(--success)'];
    var labels  = ['Weak', 'Fair', 'Good', 'Strong'];

    function wireStrength(inputId, bars, lblId, reqs) {
        var input = document.getElementById(inputId);
        if (!input) return;
        input.addEventListener('input', function () {
            var val   = input.value;
            var score = val ? scorePassword(val) : 0;
            bars.forEach(function (id, i) {
                var el = document.getElementById(id);
                if (!el) return;
                el.style.background = (i < score && val) ? colors[score - 1] : 'var(--border)';
            });
            var lbl = document.getElementById(lblId);
            if (lbl) lbl.textContent = val ? labels[score - 1] || 'Weak' : 'Enter a password above';
            /* requirements */
            if (reqs) {
                toggle(reqs.len, val.length >= 8);
                toggle(reqs.up,  /[A-Z]/.test(val));
                toggle(reqs.num, /[0-9]/.test(val));
                toggle(reqs.sym, /[^A-Za-z0-9]/.test(val));
            }
        });
    }
    function toggle(id, met) {
        var el = document.getElementById(id);
        if (!el) return;
        el.classList.toggle('met', met);
        el.querySelector('.cp-dot').textContent = met ? '✓' : '';
    }

    wireStrength('acc-new',
        ['acc-b1','acc-b2','acc-b3','acc-b4'],
        'acc-strength-lbl',
        { len: 'acc-req-len', up: 'acc-req-up', num: 'acc-req-num', sym: 'acc-req-sym' }
    );
    wireStrength('wal-new',
        ['wal-b1','wal-b2','wal-b3','wal-b4'],
        'wal-strength-lbl',
        { len: 'wal-req-len', up: 'wal-req-up', num: 'wal-req-num', sym: 'wal-req-sym' }
    );
})();
</script>
@endpush

@endsection
