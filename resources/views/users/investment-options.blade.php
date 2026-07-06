@extends('users.layouts.master')

@section('content')
        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1">
                <div class="container">
                    <div class="breadcum-content">
                        <h2>Investment Options</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Investment Options</li>
                        </ul>
                    </div>
                </div>
                <div class="bg-shap-1" data-background="assets/img/breadcum/v1/bg-shap.html"></div>
                <div class="bg-shap-2" data-background="assets/img/breadcum/v1/img-1.html"></div>
                <div class="bg-shap-3" data-background="assets/img/breadcum/v1/img-2.html"></div>
            </section>
            <!-- Breadcum End -->
            <!-- About Us Start -->
            <section class="about-us v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
                <div class="container">
                    <div class="section-title v1">
                        <h2 class="big-title">Multiple ways to invest in institutional-quality real estate.</h2>
                        <span class="about-title-shap wow animate__bounceIn" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <img src="assets/img/about-us/trigger-n-alerts.html" alt="trigger-n-alerts">
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-xxl-5">
                            <div class="about-profile">
                                <button class="play-btn v1 venobox" data-vbtype="video" data-maxwidth="800px"
                                    data-autoplay="true"
                                    data-href="https://youtu.be/itIpz_Vn3hU?si=ZAJVdN7irElA62Bu&amp;t=5"><i
                                        class="my-icon icon-play-t"></i></button>
                                <img src="{{ asset('images/realtymogul/slide-4.jpg') }}" alt="Real estate investment options">
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7">
                            <div class="about-right">
                                <h6 class="sub-title">RealtyMogul offers a variety of investment structures to match your financial goals, risk tolerance, and investment timeline — from non-traded REITs and private placements to 1031 Exchange properties and private credit opportunities.</h6>
                                <ul class="about-right-cards">
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.1s" data-wow-duration="0.8s">
                                        <h2 class="title">5+</h2>
                                        <h6 class="sub-title">Investment structures</h6>
                                    </li>
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.3s" data-wow-duration="0.8s">
                                        <h2 class="title">$<span class="counter" data-count-min="1" data-count-max="5"
                                                data-count-duration="1000" data-count-delay="200">5</span>K+</h2>
                                        <h6 class="sub-title">Investment minimums from</h6>
                                    </li>
                                    <li class="card-contant big-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.5s" data-wow-duration="0.8s">
                                        <h2 class="title">$1B+</h2>
                                        <h6 class="sub-title">Capital invested</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us End -->
            <!-- Our Mission Start -->
            <section class="our-mission v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
                <div class="container">
                    <div class="section-title-white v1">
                        <h6 class="sub-title v6">Our offerings</h6>
                        <h2 class="big-title">We offer multiple real estate investment structures so every investor can find the approach that best matches their goals, timeline, and risk profile.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-graph"></i>
                                </div>
                                <h4 class="card-title">Non-traded REITs for income and growth</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-profit"></i>
                                </div>
                                <h4 class="card-title">Private placements in individual properties</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-bag"></i>
                                </div>
                                <h4 class="card-title">1031 Exchange and private credit solutions</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Mission End -->
            <!-- Our Values Start -->
            <section class="our-values v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
                <div class="container">
                    <div class="section-title-center-white v1">
                        <h6 class="sub-title v6">Investment types</h6>
                        <h2 class="big-title">Choose the structure that fits your goals</h2>
                    </div>
                    <ul class="faq-accordion" id="accordionFAQ">
                        <li>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#teamwork">Income REIT</button>
                            <div id="teamwork" class="collapse show" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>A non-traded REIT targeting 6–8% annual distributions from a diversified portfolio of income-producing commercial real estate. Available to accredited and non-accredited investors with a $5,000 minimum investment and monthly distributions.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#innovation">Growth REIT</button>
                            <div id="innovation" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>A non-traded REIT focused on value-add commercial real estate targeting 12%+ total annual returns. Designed for investors with a longer time horizon seeking capital appreciation from a professionally managed, diversified portfolio.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#impact">Private Placements</button>
                            <div id="impact" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Accredited investors can access individual commercial real estate deals — apartments, office, industrial, retail — with direct ownership stakes. Each deal is independently vetted and structured to align investor and sponsor interests.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#freedom">1031 Exchange</button>
                            <div id="freedom" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Defer capital gains taxes by reinvesting proceeds from a sold property into a new like-kind real estate investment. RealtyMogul offers curated 1031 Exchange-eligible properties to help investors efficiently roll gains and preserve capital.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#integrity">Private Credit</button>
                            <div id="integrity" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Invest in real estate through debt — specifically short-term bridge loans and other senior secured debt instruments backed by commercial real estate. Private credit offers fixed-income-like returns with the security of real property collateral.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ambition">RM Communities</button>
                            <div id="ambition" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Invest in multifamily apartment communities through RM Communities — our vertically integrated platform focused on acquiring, improving, and managing workforce and affordable housing across key U.S. markets.</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="bg-shap" data-background="assets/img/our-values/v1/bg-shap.html"></div>
            </section>
            <!-- Our Values End -->
            <!-- Banking Experience Start  -->
            <section
                class="banking-experience v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
                <div class="container">
                    <div class="section-title v1">
                        <h2 class="big-title">Designed to give every investor the right real estate investment solution.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banking-card-img">
                                <img src="{{ asset('images/realtymogul/feature-industrial.jpg') }}"
                                    alt="Diverse real estate investment options">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banking-right-card">
                                <div class="banking-card-title">
                                    <h2><span class="counter" data-count-min="1" data-count-max="5"
                                            data-count-duration="1000" data-count-delay="200">5</span>+</h2>
                                    <h6>Investment <br> structures</h6>
                                </div>
                                <div class="card-description">
                                    <p>Whether you are seeking monthly income, long-term appreciation, tax deferral, or debt-like returns, RealtyMogul has an investment structure designed for you. Our team is ready to help you find the right fit for your portfolio and goals.</p>
                                </div>
                                <a class="read-more v1" href="#">Explore All Options</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Banking Experience End  -->
            <!-- The founders Start -->
            <section class="the-founders v1 pb-sm-50 pb-130 pb-md-70 pb-lg-100">
                <div class="container">
                    <div class="section-title v1">
                        <h2 class="big-title">Our investment advisory team</h2>
                        <p class="title-para">Our professionals help match investors to the right opportunity <br> based on their goals, accreditation status, and risk tolerance.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-1.jpg') }}" alt="Investment advisor">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Jilliene Helman</a></h4>
                                        <p>Co-founder and CEO</p>
                                    </div>
                                    <div class="card-link">
                                        <a href="#"><i class="my-icon icon-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-2.jpg') }}" alt="CIO">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">David Schnee</a></h4>
                                        <p>Chief Investment Officer</p>
                                    </div>
                                    <div class="card-link">
                                        <a href="#"><i class="my-icon icon-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-3.jpg') }}" alt="Client advisor">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Sarah Park</a></h4>
                                        <p>Chief Financial Officer</p>
                                    </div>
                                    <div class="card-link">
                                        <a href="#"><i class="my-icon icon-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.7s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-4.jpg') }}" alt="Investor relations">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Michael Kim</a></h4>
                                        <p>Chief Operating Officer</p>
                                    </div>
                                    <div class="card-link">
                                        <a href="#"><i class="my-icon icon-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- The founders End -->
            <!-- Interested Our Team Start -->
            <section class="interested-our-team v1 pb-sm-50 pb-130 pb-md-70 pb-lg-100">
                <div class="container">
                    <div class="interested-team-card">
                        <div class="interested-team-content">
                            <div class="section-title v1">
                                <h2 class="big-title">Explore all investment options today.</h2>
                                <p class="title-para">Choose from REITs, private placements, 1031 exchanges, and more <br> — all vetted and managed by experienced real estate professionals.
                                </p>
                            </div>
                            <a href="#" class="link-anime v1 icon-1 round-border-sm">Get Started</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interested Our Team End -->
        </main>
 @endsection
