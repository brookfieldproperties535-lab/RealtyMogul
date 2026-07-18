<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from itcroctheme.com/fincatch/fincatch-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Apr 2026 08:14:29 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Fincatch HTML5 Template">
    <meta name="description" content="Fincatch HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>RealtyMogul.com™ | Real Estate Crowdfunding & Investing</title>

    <!-- Apple Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('user/assets/img/logo/favicon.svg') }}">

    <!-- All Device Favicon -->
    <link rel="icon" href="{{ asset('user/assets/img/logo/icon.svg') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('user/assets/all-icons/myicon.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}">

    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/animate.min.css') }}">

    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/swiper-bundle.min.css') }}">

    <!-- Venobox Css -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/venobox.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">

    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/responsive.css') }}">

</head>

<body>

    <div id="main-wrapper">
        <!-- Mobile nav drawer overlay -->
        <div id="mobileNavOverlay" onclick="closeMobileNav()" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.45);z-index:9998;"></div>

        <!-- Mobile nav drawer -->
        <div id="mobileNavDrawer" style="display:none;position:fixed;top:0;left:0;width:82%;max-width:320px;height:100%;background:#fff;z-index:9999;overflow-y:auto;box-shadow:4px 0 24px rgba(0,0,0,0.18);flex-direction:column;">
            <!-- Drawer header -->
            <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 20px;border-bottom:1px solid #eee;">
                <a href="/"><img src="{{ asset('user/assets/img/logo/logo.svg') }}" alt="logo" style="height:32px;"></a>
                <button onclick="closeMobileNav()" style="background:none;border:none;font-size:22px;cursor:pointer;color:#333;line-height:1;">✕</button>
            </div>
            <!-- Nav links -->
            <nav style="padding:12px 0;">
                <ul style="list-style:none;margin:0;padding:0;">
                    <li style="border-bottom:1px solid #f2f2f2;">
                        <a href="{{ route('users.investment-opportunities') }}" style="display:block;padding:14px 20px;font-size:14px;font-weight:600;color:#1a1a2e;text-decoration:none;text-transform:uppercase;letter-spacing:.04em;">MarketPlace</a>
                    </li>
                    <!-- 1031 Exchange group -->
                    <li style="border-bottom:1px solid #f2f2f2;">
                        <button onclick="toggleMobileGroup(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:14px 20px;font-size:14px;font-weight:600;color:#1a1a2e;text-transform:uppercase;letter-spacing:.04em;background:none;border:none;cursor:pointer;">
                            1031 EXCHANGE <span style="font-size:12px;">▾</span>
                        </button>
                        <ul style="display:none;list-style:none;margin:0;padding:0;background:#f8f8f8;">
                            <li><a href="{{ route('users.knowledge-center') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Knowledge Center</a></li>
                        </ul>
                    </li>
                    <li style="border-bottom:1px solid #f2f2f2;">
                        <a href="{{ route('users.rm-communities') }}" style="display:block;padding:14px 20px;font-size:14px;font-weight:600;color:#1a1a2e;text-decoration:none;text-transform:uppercase;letter-spacing:.04em;">RM Communities</a>
                    </li>
                    <!-- REITs group -->
                    <li style="border-bottom:1px solid #f2f2f2;">
                        <button onclick="toggleMobileGroup(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:14px 20px;font-size:14px;font-weight:600;color:#1a1a2e;text-transform:uppercase;letter-spacing:.04em;background:none;border:none;cursor:pointer;">
                            REITs <span style="font-size:12px;">▾</span>
                        </button>
                        <ul style="display:none;list-style:none;margin:0;padding:0;background:#f8f8f8;">
                            <li><a href="{{ route('users.income-reits') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Income REITs</a></li>
                            <li><a href="{{ route('users.growth-reits') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Growth REITs</a></li>
                            <li><a href="{{ route('users.why-reits') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Why REITs</a></li>
                        </ul>
                    </li>
                    <!-- Research group -->
                    <li style="border-bottom:1px solid #f2f2f2;">
                        <button onclick="toggleMobileGroup(this)" style="width:100%;display:flex;justify-content:space-between;align-items:center;padding:14px 20px;font-size:14px;font-weight:600;color:#1a1a2e;text-transform:uppercase;letter-spacing:.04em;background:none;border:none;cursor:pointer;">
                            Research <span style="font-size:12px;">▾</span>
                        </button>
                        <ul style="display:none;list-style:none;margin:0;padding:0;background:#f8f8f8;">
                            <li><a href="{{ route('users.due-diligence-process') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Due Diligence Process</a></li>
                            <li><a href="{{ route('users.investment-options') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Investment Options</a></li>
                            <li><a href="{{ route('users.1031-exchange') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">1031 Exchange</a></li>
                            <li><a href="{{ route('users.private-credit') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Private Credit</a></li>
                            <li><a href="{{ route('users.why-commercial-real-estate') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Why Commercial Real Estate</a></li>
                            <li><a href="{{ route('users.knowledge-center') }}" style="display:block;padding:11px 32px;font-size:13px;color:#555;text-decoration:none;">Knowledge Center</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Login / Register buttons -->
            <div style="padding:20px;display:flex;flex-direction:column;gap:12px;border-top:1px solid #eee;margin-top:auto;">
                <a href="{{ route('user.login') }}" style="display:flex;align-items:center;justify-content:center;gap:8px;padding:13px;background:#1a1a2e;color:#fff;border-radius:6px;text-decoration:none;font-size:14px;font-weight:700;letter-spacing:.04em;">
                    <i class="my-icon icon-shild-user"></i> Sign In
                </a>
                <a href="{{ route('register') }}" style="display:flex;align-items:center;justify-content:center;gap:8px;padding:13px;background:transparent;color:#1a1a2e;border:2px solid #1a1a2e;border-radius:6px;text-decoration:none;font-size:14px;font-weight:700;letter-spacing:.04em;">
                    <i class="my-icon icon-add-friend"></i> Register
                </a>
            </div>
            <!-- Social links -->
            <div style="padding:16px 20px;display:flex;gap:14px;border-top:1px solid #eee;">
                <a href="#" style="color:#555;font-size:18px;"><i class="my-icon icon-facebook"></i></a>
                <a href="#" style="color:#555;font-size:18px;"><i class="my-icon icon-instagram"></i></a>
                <a href="#" style="color:#555;font-size:18px;"><i class="my-icon icon-twitter"></i></a>
                <a href="#" style="color:#555;font-size:18px;"><i class="my-icon icon-linkedin-in"></i></a>
            </div>
        </div>

        <header>
            <!-- Manu Bar Start -->
            <div class="menu-bar v1">
                <div class="container">
                    <div class="menu-content">
                        <div class="menu-logo">
                            <a href="/"><img src="{{ asset('user/assets/img/logo/logo.svg') }}" alt="logo"></a>
                        </div>
                        <nav class="main-menu">
                            <ul>
                                <li class="active">
                                    <a href="{{ route('users.investment-opportunities') }}">MarketPlace</a>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">1031 EXCHANGE</a>
                                    <ul>
                                        <li><a href="{{ route('users.knowledge-center') }}">KNOWLEDGE CENTER</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('users.rm-communities') }}">RM COMMUNITITES</a></li>
                                <li class="has-dropdown">
                                    <a href="#">REITS</a>
                                    <ul>
                                        <li><a href="{{ route('users.income-reits') }}">INCOME REITS</a></li>
                                        <li><a href="{{ route('users.growth-reits') }}">GROWTH REITS</a></li>
                                        <li><a href="{{ route('users.why-reits') }}">WHY REITS</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#">RESEARCH</a>
                                    <ul>
                                        <li><a href="{{ route('users.due-diligence-process') }}">DUE DELIGENCE PROCESS</a></li>
                                        <li><a href="{{ route('users.investment-options') }}">INVESTMEN OPTIONS</a></li>
                                        <li><a href="{{ route('users.1031-exchange') }}">1031 EXCHANGE</a></li>
                                        <li><a href="{{ route('users.private-credit') }}">PRIVATE CREDIT</a></li>
                                        <li><a href="{{ route('users.why-commercial-real-estate') }}">WHY COMMERCIAL REAL ESTATE</a></li>
                                        <li><a href="{{ route('users.knowledge-center') }}">KNOWLEDGE CENTER</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="menu-right">
                            <ul class="right-menur-btns">
                                <li>
                                    <a href="{{ route('user.login') }}">
                                        <button>
                                            <i class="my-icon icon-shild-user"></i>
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">
                                        <button>
                                            <i class="my-icon icon-add-friend"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                            <!-- Hamburger — mobile only -->
                            <button id="hamburgerBtn" onclick="openMobileNav()" aria-label="Open menu"
                                style="display:none;background:none;border:none;cursor:pointer;padding:6px;flex-direction:column;gap:5px;justify-content:center;align-items:center;">
                                <span style="display:block;width:24px;height:2px;background:#1a1a2e;border-radius:2px;"></span>
                                <span style="display:block;width:24px;height:2px;background:#1a1a2e;border-radius:2px;"></span>
                                <span style="display:block;width:24px;height:2px;background:#1a1a2e;border-radius:2px;"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Manu Bar End -->
        </header>

        <style>
            @media (max-width: 991px) {
                #hamburgerBtn      { display: flex !important; }
                .right-menur-btns { display: none !important; }
            }
        </style>

        <script>
            function openMobileNav() {
                document.getElementById('mobileNavDrawer').style.display = 'flex';
                document.getElementById('mobileNavOverlay').style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
            function closeMobileNav() {
                document.getElementById('mobileNavDrawer').style.display = 'none';
                document.getElementById('mobileNavOverlay').style.display = 'none';
                document.body.style.overflow = '';
            }
            function toggleMobileGroup(btn) {
                var sub = btn.nextElementSibling;
                var arrow = btn.querySelector('span');
                var open = sub.style.display === 'block';
                sub.style.display = open ? 'none' : 'block';
                arrow.textContent = open ? '▾' : '▴';
            }
        </script>

        @yield('content')

        <footer>
            <div class="footer-section v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
                <div class="staking-reward">
                    <div class="container">
                        <div class="staking-reward-content">
                            <h2 class="title">Earn Staking Rewards</h2>
                            <a href="#" class="link-anime v4 round-border-sm icon-1">Sign me up</a>
                        </div>
                    </div>
                </div>
                <div class="info-footer">
                    <div class="container">
                        <div class="info-footer-content">
                            <div class="footer-widget">
                                <div class="footer-widget-content">
                                    <div class="footer-logo">
                                        <a href="/"><img src="{{ asset('user/assets/img/logo/logo-1.svg') }}" alt="Logo"></a>
                                    </div>
                                    <div class="social-profile">
                                        <h6 class="small-title">Social Profile</h6>
                                        <ul class="social-link">
                                            <li><a href="#"><i class="my-icon icon-facebook"></i></a></li>
                                            <li><a href="#"><i class="my-icon icon-instagram"></i></a></li>
                                            <li><a href="#"><i class="my-icon icon-twitter"></i></a></li>
                                            <li><a href="#"><i class="my-icon icon-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Companay</h4>
                                <div class="footer-widget-content">
                                    <ul class="link-list">
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">e-Books</a></li>
                                        <li><a href="#">Guides</a></li>
                                        <li><a href="#">Templates</a></li>
                                        <li><a href="#">Paycatch</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Features</h4>
                                <div class="footer-widget-content">
                                    <ul class="link-list">
                                        <li><a href="#">e-money</a></li>
                                        <li><a href="#">Local Business</a></li>
                                        <li><a href="#">Corporate</a></li>
                                        <li><a href="#">Internet Money</a></li>
                                        <li><a href="#">staking ecosystem</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">Guides</h4>
                                <div class="footer-widget-content">
                                    <ul class="link-list">
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">e-Books</a></li>
                                        <li><a href="#">Guides</a></li>
                                        <li><a href="#">Templates</a></li>
                                        <li><a href="#">Paycatch</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-widget">
                                <div class="footer-widget-content">
                                    <div class="address-link-line">
                                        <h5 class="title">e-Money A/S <br> Hammerensgade 1, 2, 1267, Copenhagen,
                                            Denmark
                                        </h5>
                                        <ul class="link-line">
                                            <li>
                                                <a href="#">FAQ <i class="my-icon icon-arrow-right"></i></a>
                                            </li>
                                            <li>
                                                <a href="#">Legal Notices <i
                                                        class="my-icon icon-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-main v1">
                    <div class="container">
                        <div class="footer-main-content">
                            <h6 class="text">Copyright © 2024 all right reserved</h6>
                            <h6 class="text">Designed by <a href="#">ITcroc</a></h6>
                        </div>
                    </div>
                </div>
                <div class="bg-shap-1" data-background="{{ asset('user/assets/img/footer/v1/bg-shap-1.svg') }}"></div>
                <div class="shap-1" data-background="{{ asset('user/assets/img/footer/v1/shap-1.svg') }}"></div>
            </div>
            <div class="back-to-top">
                <a href="#">
                    <i class="my-icon icon-arrow-up"></i>
                </a>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('user/assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('user/assets/js/bootstrap.min.js') }}"></script>

    <!-- Anime JS -->
    <script src="{{ asset('user/assets/js/plugins/anime.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('user/assets/js/plugins/swiper-bundle.min.js') }}"></script>

    <!-- Venobox JS -->
    <script src="{{ asset('user/assets/js/plugins/venobox.min.js') }}"></script>

    <!-- WOW JS -->
    <script src="{{ asset('user/assets/js/plugins/wow.min.js') }}"></script>

    <!-- Index -->
    <script src="{{ asset('user/assets/js/index.js') }}"></script>

    @include('partials.chatway')
</body>


<!-- Mirrored from itcroctheme.com/fincatch/fincatch-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Apr 2026 08:15:36 GMT -->

</html>
