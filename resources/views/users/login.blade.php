<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In – RealtyMogul</title>
    <link rel="stylesheet" href="{{ asset('user/app/css/style.css') }}">
</head>

<body>
    <div class="auth-wrapper">
        <!-- LEFT BRANDING -->
        <div class="auth-left">
            <div class="auth-branding">
                <div class="logo-mark">
                    <div class="logo-icon">RM</div>
                    <div class="logo-text">Realty<span>Mogul</span></div>
                </div>
                <h2>Invest in Real Estate<br>Opportunities</h2>
                <p>Sign in to access your investment portfolio and grow your wealth with vetted property funds.</p>
                <div class="auth-perks">
                    <div class="perk">
                        <div class="perk-icon">💰</div>
                        <span>Earn returns from real estate investments</span>
                    </div>
                    <div class="perk">
                        <div class="perk-icon">📊</div>
                        <span>Transparent performance dashboards</span>
                    </div>
                    <div class="perk">
                        <div class="perk-icon">🔒</div>
                        <span>Secure capital with verified funds</span>
                    </div>
                    <div class="perk">
                        <div class="perk-icon">⚡</div>
                        <span>Fast withdrawals with multiple payment methods</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- RIGHT FORM -->
        <div class="auth-right" style="background-image:url('{{ asset('images/RealtyMogul Login.jpg') }}');background-size:cover;background-position:center;background-attachment:fixed;">
            <div class="auth-form-wrap" style="background-color:rgba(0,0,0,0.75);backdrop-filter:blur(8px);">
                <h3>Welcome Back 👋</h3>
                <p>Sign in to access your investment portfolio</p>

                @if ($errors->any())
                    <div
                        style="background:rgba(255,71,87,0.1);border:1px solid rgba(255,71,87,0.3);border-radius:8px;padding:12px 14px;margin-bottom:20px;font-size:13px;color:#FF4757;">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">Email or Username</label>
                        <input type="text" name="email" class="form-input @error('email') error @enderror"
                            value="{{ old('email') }}" placeholder="you@example.com or username" required autofocus
                            autocomplete="username">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div style="position:relative;display:flex;align-items:center;">
                            <input type="password" id="loginPassword" name="password"
                                class="form-input @error('password') error @enderror"
                                style="padding-right:48px;"
                                placeholder="••••••••" required autocomplete="current-password">
                            <button type="button"
                                onclick="(function(b){var i=document.getElementById('loginPassword'),h=i.type==='password';i.type=h?'text':'password';b.textContent=h?'🙈':'👁';b.style.transform=h?'scale(1.15)':'scale(1)'})(this)"
                                style="position:absolute;right:12px;background:none;border:none;cursor:pointer;color:var(--text-muted);font-size:17px;padding:4px 6px;line-height:1;transition:color 0.15s,transform 0.15s;border-radius:4px;"
                                onmouseover="this.style.color='var(--primary-light)'"
                                onmouseout="this.style.color='var(--text-muted)'"
                                title="Show / hide password">👁</button>
                        </div>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                        <label
                            style="display:flex;align-items:center;gap:8px;font-size:13px;cursor:pointer;color:var(--text-muted);">
                            <input type="checkbox" name="remember" style="accent-color:var(--primary);"> Remember me
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                                style="font-size:13px;color:var(--primary-light);font-weight:600;">Forgot password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="width:100%;justify-content:center;padding:13px;">Sign In →</button>
                </form>

                <div class="divider">or continue with</div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
                    <button class="btn btn-outline" style="justify-content:center;gap:8px;" disabled>
                        <span>🌐</span> Google
                    </button>
                    <button class="btn btn-outline" style="justify-content:center;gap:8px;" disabled>
                        <span>📘</span> Facebook
                    </button>
                </div>
                <p style="text-align:center;margin-top:24px;font-size:13px;color:var(--text-muted);">
                    Don't have an account? <a href="{{ route('register') }}"
                        style="color:var(--primary-light);font-weight:700;">Register Free →</a>
                </p>
            </div>
        </div>
    </div>
    @include('partials.chatway')
</body>

</html>
