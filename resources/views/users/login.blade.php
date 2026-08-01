<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In – RealtyMogul</title>
    <link rel="stylesheet" href="{{ asset('user/app/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/appcss/auth.css') }}">
</head>

<body class="auth-page">
    <div class="auth-card">
        <div class="auth-brand">
            <div class="logo-icon">RM</div>
            <div class="logo-text">Realty<span>Mogul</span></div>
        </div>

        <div class="auth-head">
            <h1>Welcome back 👋</h1>
            <p>Sign in to your account to continue</p>
        </div>

        @if ($errors->any())
            <div class="auth-alert">
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
                <div class="pw-field">
                    <input type="password" id="loginPassword" name="password"
                        class="form-input @error('password') error @enderror"
                        placeholder="••••••••" required autocomplete="current-password">
                    <button type="button" class="pw-toggle" data-target="loginPassword"
                        title="Show / hide password" aria-label="Show or hide password">👁</button>
                </div>
            </div>

            <div class="auth-row">
                <label class="auth-remember">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link">Forgot password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-primary auth-submit">Sign In →</button>
        </form>

        <p class="auth-foot">Don't have an account? <a href="{{ route('register') }}">Register free →</a></p>
    </div>

    <script src="{{ asset('user/appjs/auth.js') }}"></script>
    @include('partials.chatway')
</body>

</html>
