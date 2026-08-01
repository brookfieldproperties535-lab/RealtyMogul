<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') – RealtyMogul</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=Space+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/app/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/appcss/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('user/appcss/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    @stack('styles')
</head>

<body>

    {{-- SIDEBAR OVERLAY (mobile) --}}
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div class="logo-mark">
                <div class="logo-icon">RM</div>
                <div class="logo-text">Realty<span>Mogul</span></div>
            </div>
        </div>

        <div class="sidebar-user">
            <a href="{{ route('user.profile') }}" class="sidebar-user-link">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</div>
                <div class="user-info">
                    <div class="name">{{ auth()->user()->name ?? 'User' }}</div>
                    <div class="level">
                        {{ $membershipLabel ?? ucfirst(auth()->user()->membership_level ?? 'Bronze') }}
                    </div>
                </div>
            </a>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">Main Menu</div>

            <a href="{{ route('user.dashboard') }}"
                class="nav-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                <span class="nav-icon">🏠</span>
                <span class="nav-label">Dashboard</span>
            </a>

            <a href="{{ route('user.tasks') }}" class="nav-item {{ request()->routeIs('user.tasks') ? 'active' : '' }}">
                <span class="nav-icon">📋</span>
                <span class="nav-label">Tasks</span>
                <span class="nav-badge">{{ $tasksCount ?? 0 }}</span>
            </a>

            <div class="nav-section-label">Finance</div>

            <a href="{{ route('user.wallet') }}"
                class="nav-item {{ request()->routeIs('user.wallet') ? 'active' : '' }}">
                <span class="nav-icon">💼</span>
                <span class="nav-label">Wallet</span>
            </a>

            <a href="{{ route('user.recharge') }}"
                class="nav-item {{ request()->routeIs('user.recharge') ? 'active' : '' }}">
                <span class="nav-icon">📥</span>
                <span class="nav-label">Recharge</span>
            </a>

            <a href="{{ route('user.redemption') }}"
                class="nav-item {{ request()->routeIs('user.redemption') ? 'active' : '' }}">
                <span class="nav-icon">📤</span>
                <span class="nav-label">Redemption</span>
            </a>

            <a href="{{ route('user.tasks') }}"
                class="nav-item {{ request()->routeIs('user.history') ? 'active' : '' }}">
                <span class="nav-icon">📊</span>
                <span class="nav-label">History</span>
            </a>

            <a href="{{ route('user.recharge-history') }}"
                class="nav-item {{ request()->routeIs('user.recharge-history') ? 'active' : '' }}">
                <span class="nav-icon">📥</span>
                <span class="nav-label">Recharge History</span>
            </a>

            <a href="{{ route('user.redemption-history') }}"
                class="nav-item {{ request()->routeIs('user.redemption-history') ? 'active' : '' }}">
                <span class="nav-icon">📤</span>
                <span class="nav-label">Redemption History</span>
            </a>

            <div class="nav-section-label">Support</div>

            <a href="{{ route('user.support') }}"
                class="nav-item {{ request()->routeIs('user.support') ? 'active' : '' }}">
                <span class="nav-icon">🎧</span>
                <span class="nav-label">Support</span>
            </a>

            <a href="{{ route('user.faqs') }}" class="nav-item {{ request()->routeIs('user.faqs') ? 'active' : '' }}">
                <span class="nav-icon">❓</span>
                <span class="nav-label">FAQs</span>
            </a>

            <div class="nav-section-label">Company</div>

            <a href="{{ route('user.company') }}"
                class="nav-item {{ request()->routeIs('user.company') ? 'active' : '' }}">
                <span class="nav-icon">🏢</span>
                <span class="nav-label">Company</span>
            </a>

            <a href="{{ route('user.terms') }}"
                class="nav-item {{ request()->routeIs('user.terms') ? 'active' : '' }}">
                <span class="nav-icon">📜</span>
                <span class="nav-label">Terms</span>
            </a>

            <div class="nav-section-label">Account</div>

            <a href="{{ route('user.profile') }}"
                class="nav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                <span class="nav-icon">👤</span>
                <span class="nav-label">Profile</span>
            </a>

            <a href="{{ route('user.change-password') }}"
                class="nav-item {{ request()->routeIs('user.change-password') ? 'active' : '' }}">
                <span class="nav-icon">🔑</span>
                <span class="nav-label">Change Password</span>
            </a>

            <div class="sidebar-signout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm btn-block">🚪 Sign Out</button>
                </form>
            </div>
        </nav>
    </aside>

    {{-- MAIN WRAPPER --}}
    <div class="main-wrapper app-main">

        {{-- TOPBAR --}}
        <header class="topbar">
            <div class="topbar-left">
                <button class="hamburger" id="hamburgerBtn" aria-label="Toggle menu">☰</button>
                <div class="page-title">@yield('page-title', 'Dashboard')</div>
            </div>
            <div class="topbar-right">
                <div class="topbar-balance">
                    <div>
                        <div class="bal-label">Balance</div>
                        <div class="bal-amount">${{ number_format($balance ?? (auth()->user()->balance ?? 0), 2) }}</div>
                    </div>
                </div>

                {{-- Support --}}
                <a href="{{ route('user.support') }}" class="topbar-icon-btn" id="supportBtn" title="Support">🎧</a>

                {{-- User Dropdown --}}
                <div class="topbar-user-wrap">
                    <div class="topbar-avatar-btn" id="userMenuBtn">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="topbar-dropdown" id="userDropdown">
                        <div class="dropdown-head">
                            <div class="dropdown-name"><a href="{{ route('user.profile') }}">{{ auth()->user()->name ?? 'User' }}</a></div>
                            <div class="dropdown-email">{{ auth()->user()->email ?? '' }}</div>
                        </div>
                        <a href="{{ route('user.profile') }}" class="dropdown-link">👤 Profile</a>
                        <a href="{{ route('user.change-password') }}" class="dropdown-link">🔑 Change Password</a>
                        <div class="dropdown-divider">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-link danger">🚪 Sign Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- FLASH MESSAGES --}}
        @php
            /* Collect any flash messages the controllers may set, normalised to
               [type, icon, text]. Type maps to a .flash-toast--<type> CSS class. */
            $__flashes = [];
            if (session('success')) {
                $__flashes[] = ['success', '✅', session('success')];
            }
            if (session('order_success_message')) {
                $__flashes[] = ['success', '✅', session('order_success_message')];
            }
            if (session('order_message')) {
                $__flashes[] = ['info', 'ℹ️', session('order_message')];
            }
            if (session('error')) {
                $__flashes[] = ['danger', '❌', session('error')];
            }
            if (session('account_message')) {
                $__flashes[] = ['danger', '🚫', session('account_message')];
            }
            if (session('blc_message')) {
                $__flashes[] = ['warning', '⚠️', session('blc_message')];
            }
            if (session('account_notice')) {
                $__flashes[] = ['warning', '⚠️', session('account_notice')];
            }
        @endphp

        @if (!empty($__flashes))
            <div id="flashStack" class="flash-stack">
                @foreach ($__flashes as $__f)
                    <div class="flash-toast {{ $__f[0] }}">
                        <span class="flash-icon">{{ $__f[1] }}</span>
                        <span class="flash-text">{{ $__f[2] }}</span>
                        <button type="button" class="flash-close" aria-label="Dismiss">×</button>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- MAIN CONTENT --}}
        <main class="content">
            @yield('content')
        </main>

    </div>

    {{-- MOBILE BOTTOM NAV (app-style tab bar; shown <=900px) --}}
    <nav class="mobile-nav" aria-label="Primary">
        <a href="{{ route('user.dashboard') }}" class="mnav-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <span class="mnav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 10.5 12 3l9 7.5"/><path d="M5 9.5V21h14V9.5"/><path d="M9.5 21v-6h5v6"/>
                </svg>
            </span>
            <span class="mnav-label">Home</span>
        </a>
        <a href="{{ route('user.tasks') }}" class="mnav-item {{ request()->routeIs('user.tasks') ? 'active' : '' }}">
            <span class="mnav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H9z"/><path d="M9 10h6M9 14h6M9 18h4"/>
                </svg>
            </span>
            <span class="mnav-label">Orders</span>
        </a>
        <a href="{{ route('user.wallet') }}" class="mnav-item {{ request()->routeIs('user.wallet') ? 'active' : '' }}">
            <span class="mnav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="6" width="18" height="14" rx="2.5"/><path d="M3 10h18"/><path d="M16.5 15h4.5v-3h-4.5a1.5 1.5 0 0 0 0 3z"/>
                </svg>
            </span>
            <span class="mnav-label">Wallet</span>
        </a>
        <a href="{{ route('user.profile') }}" class="mnav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">
            <span class="mnav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="8" r="4"/><path d="M4.5 20a7.5 7.5 0 0 1 15 0"/>
                </svg>
            </span>
            <span class="mnav-label">Profile</span>
        </a>
        <a href="{{ route('user.support') }}" class="mnav-item {{ request()->routeIs('user.support') ? 'active' : '' }}">
            <span class="mnav-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 14a8 8 0 0 1 16 0"/><rect x="2.8" y="13.5" width="4" height="6.5" rx="2"/><rect x="17.2" y="13.5" width="4" height="6.5" rx="2"/><path d="M19.2 20v.4a3 3 0 0 1-3 3H14"/>
                </svg>
            </span>
            <span class="mnav-label">Support</span>
        </a>
    </nav>

    {{-- TOAST CONTAINER --}}
    <div id="toastContainer" class="toast-stack"></div>

    <script src="{{ asset('user/app/js/app.js') }}"></script>
    <script src="{{ asset('user/appjs/pages.js') }}"></script>
    <script src="{{ asset('user/appjs/user-app.js') }}"></script>
    @stack('scripts')

    @include('partials.chatway')
</body>

</html>
