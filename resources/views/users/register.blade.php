<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account – RealtyMogul</title>
    <link rel="stylesheet" href="{{ asset('user/app/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/appcss/auth.css') }}">
</head>

<body class="auth-page">
    <div class="auth-card wide">
        <div class="auth-brand">
            <div class="logo-icon">RM</div>
            <div class="logo-text">Realty<span>Mogul</span></div>
        </div>

        <div class="auth-head">
            <h1>Create your account</h1>
            <p>Fill in your details to get started for free</p>
        </div>

        <form method="POST" action="{{ route('user-registeration') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-input" placeholder="Full name" required
                    value="{{ old('name') }}">
                @error('name')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-input" placeholder="+1 (XXX) XXX-XXXX" required
                    value="{{ old('phone') }}">
                @error('phone')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="you@example.com" required
                    value="{{ old('email') }}">
                @error('email')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="pw-field">
                    <input type="password" id="regPassword" name="password" class="form-input"
                        placeholder="Min. 8 characters" required>
                    <button type="button" class="pw-toggle" data-target="regPassword"
                        title="Show / hide password" aria-label="Show or hide password">👁</button>
                </div>
                @error('password')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <div class="pw-field">
                    <input type="password" id="regConfirm" name="password_confirmation" class="form-input"
                        placeholder="Repeat your password" required>
                    <button type="button" class="pw-toggle" data-target="regConfirm"
                        title="Show / hide password" aria-label="Show or hide password">👁</button>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Wallet Password</label>
                <div class="pw-field">
                    <input type="password" id="regWallet" name="wallet-password" class="form-input"
                        placeholder="Wallet password" required>
                    <button type="button" class="pw-toggle" data-target="regWallet"
                        title="Show / hide password" aria-label="Show or hide password">👁</button>
                </div>
                @error('wallet-password')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Reference Code</label>
                <input type="text" name="refrence-code" class="form-input" placeholder="Reference code" required
                    value="{{ old('refrence-code') }}">
                @error('refrence-code')<div class="field-error">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="btn btn-primary auth-submit">Create Free Account →</button>
        </form>

        <p class="auth-foot">Already have an account? <a href="{{ route('user.login') }}">Sign In</a></p>
    </div>

    <script src="{{ asset('user/appjs/auth.js') }}"></script>
    @include('partials.chatway')
</body>

</html>
