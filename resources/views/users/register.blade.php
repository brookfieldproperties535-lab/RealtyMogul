<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account – RealtyMogul</title>
    <link rel="stylesheet" href="{{ asset('user/app/css/style.css') }}">
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-left">
            <div class="auth-branding">
                <div class="logo-mark">
                    <div class="logo-icon">RM</div>
                    <div class="logo-text">Realty<span>Mogul</span></div>
                </div>
                <h2>Start Earning<br>in Minutes 🐝</h2>
                <p>Create your free account today and join 48,000+ members already earning daily commissions.</p>
                <div class="auth-perks">
                    <div class="perk">
                        <div class="perk-icon">✅</div>
                        <span>Free Bronze membership on registration</span>
                    </div>
                    <div class="perk">
                        <div class="perk-icon">📋</div>
                        <span>Access to 35 tasks daily from day one</span>
                    </div>
                    <div class="perk">
                        <div class="perk-icon">💸</div>
                        <span>0.5% commission on every normal task</span>
                    </div>
                    <div class="perk">
                        <div class="perk-icon">🔗</div>
                        <span>Unique referral link to grow passively</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth-right" style="overflow-y:auto;background-image:url('{{ asset('images/RealtyMogul Login.jpg') }}');background-size:cover;background-position:center;background-attachment:fixed;">
            <div class="auth-form-wrap" style="background-color:rgba(0,0,0,0.75);backdrop-filter:blur(8px);">
                <h3>Create Account</h3>
                <p>Fill in your details to get started for free</p>

                <form method="POST" action="{{ route('user-registeration') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-input" placeholder="Full name" required
                            value="{{ old('name') }}">
                        @error('name')
                            <div style="color:#ff4757;font-size:13px;margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-input" placeholder="+1 (XXX) XXX-XXXX" required
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div style="color:#ff4757;font-size:13px;margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input" placeholder="you@example.com"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div style="color:#ff4757;font-size:13px;margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div style="position:relative;display:flex;align-items:center;">
                            <input type="password" id="regPassword" name="password" class="form-input"
                                style="padding-right:48px;"
                                placeholder="Min. 8 characters" required>
                            <button type="button"
                                onclick="(function(b){var i=document.getElementById('regPassword'),h=i.type==='password';i.type=h?'text':'password';b.textContent=h?'🙈':'👁'})(this)"
                                style="position:absolute;right:12px;background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:17px;padding:4px 6px;line-height:1;transition:color 0.15s,transform 0.15s;border-radius:4px;"
                                onmouseover="this.style.color='var(--primary-light)';this.style.transform='scale(1.15)'"
                                onmouseout="this.style.color='var(--text-muted)';this.style.transform='scale(1)'"
                                title="Show / hide password">👁</button>
                        </div>
                        @error('password')
                            <div style="color:#ff4757;font-size:13px;margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div style="position:relative;display:flex;align-items:center;">
                            <input type="password" id="regConfirm" name="password_confirmation" class="form-input"
                                style="padding-right:48px;"
                                placeholder="Repeat your password" required>
                            <button type="button"
                                onclick="(function(b){var i=document.getElementById('regConfirm'),h=i.type==='password';i.type=h?'text':'password';b.textContent=h?'🙈':'👁'})(this)"
                                style="position:absolute;right:12px;background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:17px;padding:4px 6px;line-height:1;transition:color 0.15s,transform 0.15s;border-radius:4px;"
                                onmouseover="this.style.color='var(--primary-light)';this.style.transform='scale(1.15)'"
                                onmouseout="this.style.color='var(--text-muted)';this.style.transform='scale(1)'"
                                title="Show / hide password">👁</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Wallet Password</label>
                        <div style="position:relative;display:flex;align-items:center;">
                            <input type="password" id="regWallet" name="wallet-password" class="form-input"
                                style="padding-right:48px;"
                                placeholder="Wallet password" required>
                            <button type="button"
                                onclick="(function(b){var i=document.getElementById('regWallet'),h=i.type==='password';i.type=h?'text':'password';b.textContent=h?'🙈':'👁'})(this)"
                                style="position:absolute;right:12px;background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:17px;padding:4px 6px;line-height:1;transition:color 0.15s,transform 0.15s;border-radius:4px;"
                                onmouseover="this.style.color='var(--primary-light)';this.style.transform='scale(1.15)'"
                                onmouseout="this.style.color='var(--text-muted)';this.style.transform='scale(1)'"
                                title="Show / hide password">👁</button>
                        </div>
                        @error('wallet-password')
                            <div style="color:#ff4757;font-size:13px;margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Reference Code</label>
                        <input type="text" name="refrence-code" class="form-input" placeholder="Reference code"
                            required value="{{ old('refrence-code') }}">
                        @error('refrence-code')
                            <div style="color:#ff4757;font-size:13px;margin-top:6px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary"
                        style="width:100%;justify-content:center;padding:13px;">Create Free Account →</button>

                    <p style="text-align:center;margin-top:20px;font-size:13px;color:var(--text-muted);">
                        Already have an account? <a href="{{ route('user.login') }}"
                            style="color:var(--primary-light);font-weight:700;">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
