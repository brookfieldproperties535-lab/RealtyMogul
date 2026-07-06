@extends('users.layouts.master')

@section('content')
        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1">
                <div class="container">
                    <div class="breadcum-content">
                        <h2>Private Credit</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Private Credit</li>
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
                        <h2 class="big-title">Earn consistent returns backed by real estate collateral.</h2>
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
                                <img src="{{ asset('images/realtymogul/slide-2.jpg') }}" alt="Private credit real estate">
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7">
                            <div class="about-right">
                                <h6 class="sub-title">RealtyMogul's private credit offerings allow accredited investors to invest in real estate through debt — specifically short-term bridge loans and other secured debt instruments backed by commercial real estate. These investments offer fixed-income-like returns with the added security of property collateral.</h6>
                                <ul class="about-right-cards">
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.1s" data-wow-duration="0.8s">
                                        <h2 class="title">7–10%</h2>
                                        <h6 class="sub-title">Target annual return</h6>
                                    </li>
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.3s" data-wow-duration="0.8s">
                                        <h2 class="title"><span class="counter" data-count-min="6" data-count-max="24"
                                                data-count-duration="1000" data-count-delay="200">24</span> mo.</h2>
                                        <h6 class="sub-title">Typical loan term</h6>
                                    </li>
                                    <li class="card-contant big-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.5s" data-wow-duration="0.8s">
                                        <h2 class="title">Senior</h2>
                                        <h6 class="sub-title">Secured debt position</h6>
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
                        <h6 class="sub-title v6">Our approach</h6>
                        <h2 class="big-title">Private credit provides investors with income backed by real assets — offering a compelling risk-return profile for those seeking fixed-income alternatives with real estate security.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-graph"></i>
                                </div>
                                <h4 class="card-title">Senior secured debt backed by real property</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-profit"></i>
                                </div>
                                <h4 class="card-title">Short-term durations with predictable returns</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-bag"></i>
                                </div>
                                <h4 class="card-title">Conservative loan-to-value ratios for downside protection</h4>
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
                        <h6 class="sub-title v6">Investor FAQs</h6>
                        <h2 class="big-title">Private credit explained</h2>
                    </div>
                    <ul class="faq-accordion" id="accordionFAQ">
                        <li>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#teamwork">What is private credit in real estate?</button>
                            <div id="teamwork" class="collapse show" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Private credit refers to non-bank lending — specifically, real estate loans made by private investors rather than traditional financial institutions. Investors act as the lender, earning interest income while the borrower (a real estate operator) uses the funds to acquire, renovate, or develop a property.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#innovation">How do private credit investments work?</button>
                            <div id="innovation" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>RealtyMogul sources, underwrites, and originates short-term real estate loans. Investors fund these loans and receive regular interest payments throughout the loan term. At maturity, the principal is repaid and the loan closes. The underlying property serves as collateral throughout the term.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#impact">What returns can I expect?</button>
                            <div id="impact" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Our private credit opportunities typically target annualized returns of 7–10%, paid as regular interest distributions. Actual returns vary by deal and are not guaranteed. Investors should review individual offering documents carefully before committing capital.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#freedom">What are the risks?</button>
                            <div id="freedom" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Primary risks include borrower default and property value decline. These risks are mitigated by conservative loan-to-value ratios (typically 65–75%), first-lien senior security positions, and thorough underwriting of each borrower and property before funding.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#integrity">What is the minimum investment?</button>
                            <div id="integrity" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Minimums vary by offering but are typically $25,000 or more for individual private credit transactions. These investments are generally available to accredited investors only. Please review specific offering details for exact requirements.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ambition">How long are the investment terms?</button>
                            <div id="ambition" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Private credit investments on the RealtyMogul platform typically have terms of 12–24 months, providing shorter durations than equity investments. This creates a more predictable timeline for investors seeking fixed-income-like exposure to real estate.</h6>
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
                        <h2 class="big-title">Private credit: consistent income backed by real assets.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banking-card-img">
                                <img src="{{ asset('images/realtymogul/feature-office.jpg') }}"
                                    alt="Private credit commercial real estate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banking-right-card">
                                <div class="banking-card-title">
                                    <h2><span class="counter" data-count-min="5" data-count-max="7"
                                            data-count-duration="1000" data-count-delay="200">7</span>–10%</h2>
                                    <h6>Target annual <br> return</h6>
                                </div>
                                <div class="card-description">
                                    <p>RealtyMogul's private credit investments provide accredited investors with the opportunity to earn interest income from short-term real estate loans — secured by first-lien positions on commercial properties and underwritten to conservative loan-to-value standards.</p>
                                </div>
                                <a class="read-more v1" href="#">Explore Private Credit</a>
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
                        <h2 class="big-title">The private credit team</h2>
                        <p class="title-para">Our credit professionals originate, underwrite, and manage every <br> private credit deal with institutional discipline and investor focus.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-1.jpg') }}" alt="Credit origination lead">
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
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-2.jpg') }}" alt="Underwriter">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Mark Ellison</a></h4>
                                        <p>Head of Underwriting</p>
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
                                    <img src="{{ asset('images/realtymogul/team-3.jpg') }}" alt="Risk manager">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Tom Bradley</a></h4>
                                        <p>Director of Risk Management</p>
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
                                    <img src="{{ asset('images/realtymogul/team-4.jpg') }}" alt="Portfolio manager">
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
                                <h2 class="big-title">Explore private credit opportunities today.</h2>
                                <p class="title-para">Access short-term real estate loans with institutional-grade underwriting <br> and earn consistent income backed by real property.
                                </p>
                            </div>
                            <a href="#" class="link-anime v1 icon-1 round-border-sm">View Private Credit Deals</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interested Our Team End -->
        </main>
 @endsection
