@extends('users.layouts.master')

@section('content')
    <main>
        <!-- Banner Start -->
        <section class="banner v1">
            <div class="container">
                <div class="banner-content">
                    <div class="section-title v1">
                        <h2 class="big-title">
                            Build Your Real Estate Portfolio</h2>
                        <p class="title-para">Empowering investors for over 10 years. Explore select real estate
                            <br> opportunities and go beyond stocks and bonds.
                        </p>
                    </div>
                    <ul class="all-btns">
                        <li><a href="{{ route('user.login') }}" class="link-anime v1 round-border-sm icon-1">Login</a></li>
                        <li><a href="{{ route('register') }}" class="link-anime v2 round-border-sm icon-1">Register</a></li>
                    </ul>
                        <div class="banner-img wow animate__zoomIn" data-wow-delay="0.4s" data-wow-duration="0.8s">
                        <img src="{{ asset('images/realtymogul/hero-banner.jpg') }}" alt="Real estate portfolio">
                    </div>
                </div>
            </div>
            <div class="bg-shap-1" data-background="{{ asset('user/assets/img/banner/v1/shap-1.svg') }}"></div>
            <div class="bg-shap-2" data-background="{{ asset('user/assets/img/banner/v1/shap-2.svg') }}"></div>
            <div class="bg-shap-3" data-background="{{ asset('user/assets/img/banner/v1/img-1.png') }}"></div>
        </section>
        <!-- Banner End -->
        <!-- Core Feature Start -->
        <section class="core-feature v1 pt-sm-50 pb-sm-50 pt-md-70 pb-md-70 pt-xl-100 pb-xl-100 pt-130 pb-130">
            <div class="container">
                <div class="section-title-white v1">
                    <div class="title-left-right-end">
                        <div class="w-80-15">
                            <h2 class="big-title">We offer you more than just <br> an investment platform.</h2>
                        </div>
                        <div class="core-feature-img">
                            <img src="{{ asset('images/realtymogul/feature-multifamily.jpg') }}" alt="Real estate investment platform">
                        </div>
                    </div>
                    <h5 class="sub-title v1">PRIVATE MARKET REAL ESTATE</h5>
                </div>
                <ul class="core-list-card">
                    <li class="wow animate__fadeInUp" data-wow-offset="200" data-wow-delay="0.4s" data-wow-duration="0.8s">
                        <div class="core-list-text">
                            <h2 class="big-title">Access Private Market Offerings</h2>
                            <p class="title-para">Gain access to a curated selection of private real estate
                                investments not available on public markets.</p>
                        </div>
                        <div class="core-list-img">
                            <img src="{{ asset('images/realtymogul/feature-multifamily.jpg') }}" alt="Private market real estate">
                        </div>
                    </li>
                    <li class="wow animate__fadeInUp" data-wow-offset="200" data-wow-delay="0.4s" data-wow-duration="0.8s">
                        <div class="core-list-text">
                            <h2 class="big-title">Invest in REITs &amp; Placements</h2>
                            <p class="title-para">Participate in private placements, 1031 Exchange properties,
                                and Real Estate Investment Trusts with ease.</p>
                        </div>
                        <div class="core-list-img">
                            <img src="{{ asset('images/realtymogul/feature-reit.jpg') }}" alt="REITs and placements">
                        </div>
                    </li>
                    <li class="wow animate__fadeInUp" data-wow-offset="200" data-wow-delay="0.4s" data-wow-duration="0.8s">
                        <div class="core-list-text">
                            <h2 class="big-title">Diversify Across Asset Classes</h2>
                            <p class="title-para">Spread your capital across multifamily, office, industrial,
                                and mixed-use commercial properties.</p>
                        </div>
                        <div class="core-list-img">
                            <img src="{{ asset('images/realtymogul/feature-office.jpg') }}" alt="Diversified real estate">
                        </div>
                    </li>
                    <li class="wow animate__fadeInUp" data-wow-offset="200" data-wow-delay="0.4s" data-wow-duration="0.8s">
                        <div class="core-list-text">
                            <h2 class="big-title">Gain Exposure to More Deals</h2>
                            <p class="title-para">Our rigorous due diligence process ensures only high-quality
                                opportunities reach our investor marketplace.</p>
                        </div>
                        <div class="core-list-img">
                            <img src="{{ asset('images/realtymogul/feature-industrial.jpg') }}" alt="More real estate deals">
                        </div>
                    </li>
                </ul>

            </div>
        </section>
        <!-- Core Feature End -->
        <!-- Benefits Start -->
        <section class="benefits v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
            <div class="container">
                <div class="section-title v1">
                    <div class="title-left-right-center">
                        <div class="w-80-15">
                            <h2 class="big-title">The future of real estate investing, made accessible</h2>
                        </div>
                        <a href="#" class="link-anime v1 round-border-sm icon-1">Get Started</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.4s"
                        data-wow-duration="0.8s">
                        <div class="benefits-card">
                            <div class="benefits-img">
                                <img src="{{ asset('images/realtymogul/benefits-investors.jpg') }}" alt="Real estate investors">
                            </div>
                            <h3 class="title">Objective: Income — earn potential cash distributions from institutional-quality real estate assets.</h3>
                            <p class="para">Our Income REIT targets stable, income-generating properties
                                designed to provide consistent monthly distributions to investors.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.6s"
                        data-wow-duration="0.8s">
                        <div class="benefits-card">
                            <div class="benefits-img">
                                <img src="{{ asset('images/realtymogul/benefits-portfolio.jpg') }}" alt="Real estate portfolio growth">
                            </div>
                            <h3 class="title">Objective: Growth — build long-term wealth through appreciation-focused commercial real estate.</h3>
                            <p class="para">Our Growth REIT targets value-add and opportunistic properties
                                with strong appreciation potential across key U.S. markets.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-shap-1" data-background="{{ asset('user/assets/img/benefits/bg-shap.svg') }}"></div>
        </section>
        <!-- Benefits End -->
        <!-- Video Box Start -->
        <section class="video-box v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
            <div class="container">
                <div class="section-title-white v1">
                    <h2 class="big-title">Our rigorous process puts only the best opportunities <span
                            class="color-blue">in front of you.</span></h2>
                </div>
                    <div class="video-card-box">
                    <button class="play-btn v1 venobox" data-vbtype="video" data-maxwidth="800px" data-autoplay="true"
                        data-href="https://youtu.be/itIpz_Vn3hU?si=ZAJVdN7irElA62Bu&amp;t=5"><i
                            class="my-icon icon-play-t"></i></button>
                    <img src="{{ asset('images/realtymogul/video-thumbnail.jpg') }}" alt="Real estate investment overview">
                </div>
                <div class="earn-staking">
                    <div class="content-left">
                        <h6 class="small-title">AVERAGE ANNUAL RETURN <span class="staking-vale">8–12%</span></h6>
                        <h2 class="title">Earn Passive Real Estate Income</h2>
                    </div>
                    <span class="earn-staking-link">
                        <a href="#">Learn more about REITs</a>
                    </span>
                </div>
            </div>
            <div class="bg-shap-1" data-background="{{ asset('user/assets/img/ngm-token/shap-1.svg') }}"></div>
        </section>
        <!-- Video Box End -->
        <!-- Key Benefits Start -->
        <section class="key-benefits v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
            <div class="slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                            <div class="slide-img">
                            <img src="{{ asset('images/realtymogul/slide-1.jpg') }}" alt="Multifamily property">
                        </div>
                    </div>
                    <div class="swiper-slide">
                            <div class="slide-img">
                            <img src="{{ asset('images/realtymogul/slide-2.jpg') }}" alt="Commercial office building">
                        </div>
                    </div>
                    <div class="swiper-slide">
                            <div class="slide-img">
                            <img src="{{ asset('images/realtymogul/slide-3.jpg') }}" alt="Residential investment property">
                        </div>
                    </div>
                    <div class="swiper-slide">
                            <div class="slide-img">
                            <img src="{{ asset('images/realtymogul/slide-4.jpg') }}" alt="Mixed-use development">
                        </div>
                    </div>
                    <div class="swiper-slide">
                            <div class="slide-img">
                            <img src="{{ asset('images/realtymogul/slide-5.jpg') }}" alt="Industrial real estate">
                        </div>
                    </div>
                    <div class="swiper-slide">
                            <div class="slide-img">
                            <img src="{{ asset('images/realtymogul/slide-2.jpg') }}" alt="Commercial real estate">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Key Benefits End -->
        <!-- Recent Blogs START -->
        <section class="recent-blogs v1 pb-sm-50 pb-130 pb-md-70 pb-lg-100">
            <div class="container">
                <div class="section-title v1">
                    <div class="title-left-right-center">
                        <div class="w-lg-80-15">
                            <h5 class="sub-title v4">KNOWLEDGE CENTER</h5>
                        </div>
                        <button class="link-anime v3 round-border-full">View all</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                        data-wow-duration="0.8s">
                        <div class="recent-blog-card">
                            <div class="recent-blog-card-img">
                                <a href="#">
                                    <img src="{{ asset('images/realtymogul/blog-1.jpg') }}"
                                        alt="What is a REIT">
                                </a>
                            </div>
                            <div class="recent-blog-card-contant">
                                <h6 class="small-title">Published on March 12, 2025</h6>
                                <h4 class="title"><a href="#">What is a REIT and How Does It Generate Returns?</a>
                                </h4>
                                <a href="#" class="read-more v1">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                        data-wow-duration="0.8s">
                        <div class="recent-blog-card">
                            <div class="recent-blog-card-img">
                                <a href="#">
                                    <img src="{{ asset('images/realtymogul/blog-2.jpg') }}"
                                        alt="1031 Exchange guide">
                                </a>
                            </div>
                            <div class="recent-blog-card-contant">
                                <h6 class="small-title">Published on February 28, 2025</h6>
                                <h4 class="title"><a href="#">A Beginner's Guide to the 1031 Exchange Strategy</a>
                                </h4>
                                <a href="#" class="read-more v1">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                        data-wow-duration="0.8s">
                        <div class="recent-blog-card">
                            <div class="recent-blog-card-img">
                                <a href="#">
                                    <img src="{{ asset('images/realtymogul/blog-3.jpg') }}"
                                        alt="Commercial real estate investing">
                                </a>
                            </div>
                            <div class="recent-blog-card-contant">
                                <h6 class="small-title">Published on January 15, 2025</h6>
                                <h4 class="title"><a href="#">Why Commercial Real Estate Belongs in Your Portfolio</a>
                                </h4>
                                <a href="#" class="read-more v1">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                        data-wow-duration="0.8s">
                        <div class="recent-blog-card">
                            <div class="recent-blog-card-img">
                                <a href="#">
                                    <img src="{{ asset('images/realtymogul/blog-4.jpg') }}"
                                        alt="Private credit real estate">
                                </a>
                            </div>
                            <div class="recent-blog-card-contant">
                                <h6 class="small-title">Published on December 10, 2024</h6>
                                <h4 class="title"><a href="#">Understanding Private Credit in Real Estate Finance</a>
                                </h4>
                                <a href="#" class="read-more v1">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                        data-wow-duration="0.8s">
                        <div class="recent-blog-card">
                            <div class="recent-blog-card-img">
                                <a href="#">
                                    <img src="{{ asset('images/realtymogul/blog-5.jpg') }}"
                                        alt="Due diligence process">
                                </a>
                            </div>
                            <div class="recent-blog-card-contant">
                                <h6 class="small-title">Published on November 5, 2024</h6>
                                <h4 class="title"><a href="#">How RealtyMogul's Due Diligence Process Protects Investors</a>
                                </h4>
                                <a href="#" class="read-more v1">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                        data-wow-duration="0.8s">
                        <div class="recent-blog-card">
                            <div class="recent-blog-card-img">
                                <a href="#">
                                    <img src="{{ asset('images/realtymogul/blog-6.jpg') }}"
                                        alt="Accredited investor guide">
                                </a>
                            </div>
                            <div class="recent-blog-card-contant">
                                <h6 class="small-title">Published on October 22, 2024</h6>
                                <h4 class="title"><a href="#">Accredited vs. Non-Accredited Investors: What You Need to Know</a>
                                </h4>
                                <a href="#" class="read-more v1">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Recent Blogs End -->
        <!-- Partners Start -->
        <section class="partners v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
            <div class="container">
                <div class="featured-section v1">
                    <div class="section-title v1">
                        <div class="title-left-right-center">
                            <div class="w-lg-80-15">
                                <h5 class="sub-title v2">AS FEATURED IN</h5>
                            </div>
                            <ul class="slider-btns">
                                <li>
                                    <button class="prev-btn"><i class="my-icon icon-arrow-left"></i></button>
                                </li>
                                <li>
                                    <button class="next-btn"><i class="my-icon icon-arrow-right"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <h5 class="small-text">Published on Forbes</h5>
                                <h3 class="title">How RealtyMogul Is Democratizing Access to Commercial Real Estate Investment</h3>
                            </div>
                            <div class="swiper-slide">
                                <h5 class="small-text">Published on Wall Street Journal</h5>
                                <h3 class="title">Crowdfunding Platforms Bring Institutional Real Estate to Everyday Investors
                                </h3>
                            </div>
                            <div class="swiper-slide">
                                <h5 class="small-text">Published on Bloomberg</h5>
                                <h3 class="title">Private Real Estate Platforms See Record Inflows as Investors Diversify Beyond Stocks</h3>
                            </div>
                            <div class="swiper-slide">
                                <h5 class="small-text">Published on CNBC</h5>
                                <h3 class="title">Real Estate Crowdfunding: A New Path to Passive Income for Accredited Investors
                                </h3>
                            </div>
                            <div class="swiper-slide">
                                <h5 class="small-text">Published on Barron's</h5>
                                <h3 class="title">Why Non-Traded REITs Are Gaining Favor Among Long-Term Income Investors
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seleced-section v1">
                    <div class="section-title v1">
                        <div class="title-left-right-center">
                            <div class="w-lg-80-15">
                                <h5 class="sub-title v2">TRUSTED PARTNERS</h5>
                            </div>
                            <ul class="slider-btns">
                                <li>
                                    <button class="prev-btn"><i class="my-icon icon-arrow-left"></i></button>
                                </li>
                                <li>
                                    <button class="next-btn"><i class="my-icon icon-arrow-right"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="seleced-card">
                                    <div class="partner-logo">
                                        <img src="{{ asset('user/assets/img/partners/v1/logo-1.svg') }}" alt="logo">
                                    </div>
                                    <h6 class="para">A leading custodial platform ensuring safe and compliant
                                        handling of investor assets and transactions.</h6>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="seleced-card">
                                    <div class="partner-logo">
                                        <img src="{{ asset('user/assets/img/partners/v1/logo-2.svg') }}" alt="logo">
                                    </div>
                                    <h6 class="para">Institutional-grade property management and advisory services
                                        across major U.S. commercial real estate markets.</h6>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="seleced-card">
                                    <div class="partner-logo">
                                        <img src="{{ asset('user/assets/img/partners/v1/logo-3.svg') }}" alt="logo">
                                    </div>
                                    <h6 class="para">Trusted legal and compliance partner supporting investor
                                        protection and regulatory adherence.</h6>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="seleced-card">
                                    <div class="partner-logo">
                                        <img src="{{ asset('user/assets/img/partners/v1/logo-4.svg') }}" alt="logo">
                                    </div>
                                    <h6 class="para">Independent valuation and auditing firm providing transparent
                                        reporting on all platform-listed real estate assets.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-shap-1" data-background="{{ asset('user/assets/img/partners/v1/shap-1.svg') }}"></div>
        </section>
        <!-- Partners End -->
    </main>
@endsection
