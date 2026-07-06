@extends('users.layouts.master')

@section('content')
        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1">
                <div class="container">
                    <div class="breadcum-content">
                        <h2>Why REITs</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Why REITs</li>
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
                        <h2 class="big-title">Why REITs belong in every serious investor's portfolio.</h2>
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
                                <img src="{{ asset('images/realtymogul/feature-reit.jpg') }}" alt="Real estate investment trusts">
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7">
                            <div class="about-right">
                                <h6 class="sub-title">Real Estate Investment Trusts offer a compelling combination of regular income, portfolio diversification, and long-term growth potential. Non-traded REITs, like those offered by RealtyMogul, provide access to institutional-quality real estate without the volatility of public markets.</h6>
                                <ul class="about-right-cards">
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.1s" data-wow-duration="0.8s">
                                        <h2 class="title">90%</h2>
                                        <h6 class="sub-title">Income distributed to investors</h6>
                                    </li>
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.3s" data-wow-duration="0.8s">
                                        <h2 class="title"><span class="counter" data-count-min="1" data-count-max="6"
                                                data-count-duration="1000" data-count-delay="200">6</span>–12%</h2>
                                        <h6 class="sub-title">Target annual return range</h6>
                                    </li>
                                    <li class="card-contant big-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.5s" data-wow-duration="0.8s">
                                        <h2 class="title">Low</h2>
                                        <h6 class="sub-title">Correlation to stock markets</h6>
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
                        <h6 class="sub-title v6">The case for REITs</h6>
                        <h2 class="big-title">Non-traded REITs offer real estate income and growth potential without the daily price swings of public markets — making them a powerful long-term wealth-building tool.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-graph"></i>
                                </div>
                                <h4 class="card-title">Regular income through real estate distributions</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-profit"></i>
                                </div>
                                <h4 class="card-title">Tax advantages through depreciation and pass-throughs</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-bag"></i>
                                </div>
                                <h4 class="card-title">Portfolio diversification beyond stocks and bonds</h4>
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
                        <h6 class="sub-title v6">Common questions</h6>
                        <h2 class="big-title">REITs explained</h2>
                    </div>
                    <ul class="faq-accordion" id="accordionFAQ">
                        <li>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#teamwork">What exactly is a REIT?</button>
                            <div id="teamwork" class="collapse show" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>A Real Estate Investment Trust (REIT) is a company that owns, operates, or finances income-producing real estate. By law, REITs must distribute at least 90% of their taxable income to shareholders annually — making them one of the most income-oriented investment structures available.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#innovation">Non-traded vs. publicly traded REITs</button>
                            <div id="innovation" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Unlike publicly traded REITs listed on stock exchanges, non-traded REITs are not subject to daily market price fluctuations. This can reduce volatility and help investors stay focused on the long-term performance of the underlying real estate portfolio.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#impact">What are the tax benefits of REIT investing?</button>
                            <div id="impact" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>REIT investors may benefit from depreciation deductions, pass-through income treatment under the Tax Cuts and Jobs Act, and potential return-of-capital distributions that reduce taxable income in the near term. Consulting a qualified tax advisor is always recommended.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#freedom">How often are distributions paid?</button>
                            <div id="freedom" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>RealtyMogul's non-traded REITs declare distributions on a monthly basis, providing investors with a consistent and predictable income stream. Distributions may be received as cash or reinvested through a distribution reinvestment plan (DRIP).</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#integrity">What is the minimum investment?</button>
                            <div id="integrity" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Both the RealtyMogul Income REIT and Growth REIT have a minimum investment of $5,000, making them significantly more accessible than direct real estate ownership or traditional institutional real estate funds that often require $1M or more.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ambition">How do I redeem my REIT shares?</button>
                            <div id="ambition" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Both REITs offer a limited share redemption program subject to availability, holding period requirements, and other conditions outlined in the offering documents. These are illiquid investments and investors should plan accordingly.</h6>
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
                        <h2 class="big-title">The compelling case for non-traded REIT investing.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banking-card-img">
                                <img src="{{ asset('images/realtymogul/slide-1.jpg') }}"
                                    alt="Non-traded REIT real estate portfolio">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banking-right-card">
                                <div class="banking-card-title">
                                    <h2><span class="counter" data-count-min="1" data-count-max="10"
                                            data-count-duration="1000" data-count-delay="200">10</span>+</h2>
                                    <h6>Years serving <br> REIT investors</h6>
                                </div>
                                <div class="card-description">
                                    <p>RealtyMogul has been offering non-traded REIT investments since 2015. Our Income and Growth REITs give accredited and non-accredited investors access to professionally managed, diversified commercial real estate portfolios — with low minimums and monthly distributions.</p>
                                </div>
                                <a class="read-more v1" href="#">Explore Our REITs</a>
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
                        <h2 class="big-title">Expert perspectives on REIT investing</h2>
                        <p class="title-para">Our investment professionals share their insights on commercial real estate <br> and the role non-traded REITs can play in a diversified portfolio.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-1.jpg') }}" alt="REIT investment expert">
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
                                    <img src="{{ asset('images/realtymogul/team-3.jpg') }}" alt="Tax advisor">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Lisa Wang</a></h4>
                                        <p>Tax &amp; Structuring Advisor</p>
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
                                    <img src="{{ asset('images/realtymogul/team-4.jpg') }}" alt="Portfolio strategist">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Rachel Torres</a></h4>
                                        <p>Senior Portfolio Manager</p>
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
                                <h2 class="big-title">Ready to invest in a real estate investment trust?</h2>
                                <p class="title-para">Explore the RealtyMogul Income and Growth REITs <br> and start earning from commercial real estate today.
                                </p>
                            </div>
                            <a href="#" class="link-anime v1 icon-1 round-border-sm">Explore Our REITs</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interested Our Team End -->
        </main>
 @endsection
