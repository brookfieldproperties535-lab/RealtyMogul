@extends('users.layouts.master')

@section('content')
        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1">
                <div class="container">
                    <div class="breadcum-content">
                        <h2>Knowledge Center</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Knowledge Center</li>
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
                        <h2 class="big-title">Your comprehensive guide to real estate investing.</h2>
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
                                <img src="{{ asset('images/realtymogul/blog-3.jpg') }}" alt="Real estate education">
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7">
                            <div class="about-right">
                                <h6 class="sub-title">From first-time investors to seasoned professionals, our Knowledge Center provides articles, guides, and market research to help you make confident, informed real estate investment decisions.</h6>
                                <ul class="about-right-cards">
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.1s" data-wow-duration="0.8s">
                                        <h2 class="title">50+</h2>
                                        <h6 class="sub-title">In-depth guides</h6>
                                    </li>
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.3s" data-wow-duration="0.8s">
                                        <h2 class="title"><span class="counter" data-count-min="1" data-count-max="10"
                                                data-count-duration="1000" data-count-delay="200">10</span>+</h2>
                                        <h6 class="sub-title">Years of insights</h6>
                                    </li>
                                    <li class="card-contant big-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.5s" data-wow-duration="0.8s">
                                        <h2 class="title">300<span class="counter" data-count-min="0"
                                                data-count-max="0" data-count-duration="1000"
                                                data-count-delay="200">0</span>K+</h2>
                                        <h6 class="sub-title">Educated investors</h6>
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
                        <h6 class="sub-title v6">Our mission</h6>
                        <h2 class="big-title">We built the Knowledge Center to equip investors with the information needed to evaluate real estate opportunities and build lasting wealth.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-graph"></i>
                                </div>
                                <h4 class="card-title">In-depth research and market analysis</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-profit"></i>
                                </div>
                                <h4 class="card-title">Plain-language investment guides for all levels</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-bag"></i>
                                </div>
                                <h4 class="card-title">Expert commentary on CRE trends and strategies</h4>
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
                        <h6 class="sub-title v6">Topics we cover</h6>
                        <h2 class="big-title">Explore our resource library</h2>
                    </div>
                    <ul class="faq-accordion" id="accordionFAQ">
                        <li>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#teamwork">Investing Basics</button>
                            <div id="teamwork" class="collapse show" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>New to real estate investing? Start here. We break down the fundamentals — from how private placements work to understanding cap rates, NOI, and the difference between debt and equity investments.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#innovation">REITs Explained</button>
                            <div id="innovation" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Learn how Real Estate Investment Trusts work, the difference between traded and non-traded REITs, and why non-traded REITs like the RealtyMogul Income and Growth REITs may offer compelling benefits for long-term investors.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#impact">1031 Exchange Guide</button>
                            <div id="impact" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Understand how a 1031 Exchange allows real estate investors to defer capital gains taxes by reinvesting proceeds from a sold property into a new like-kind property, potentially building wealth more efficiently over time.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#freedom">Due Diligence</button>
                            <div id="freedom" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Explore what it means to truly vet a real estate investment — including how to evaluate sponsors, review business plans, analyze property financials, and assess market conditions before committing capital.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#integrity">Market Research</button>
                            <div id="integrity" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Stay up to date with our latest market commentary and research covering commercial real estate trends, interest rate impacts, sector outlooks, and the macroeconomic factors that influence property valuations.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ambition">Tax Strategies</button>
                            <div id="ambition" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Discover how real estate investments can deliver meaningful tax advantages — including depreciation deductions, pass-through income treatment, and tax-deferred exchange strategies that help preserve more of your returns.</h6>
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
                        <h2 class="big-title">Education that empowers confident real estate investing.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banking-card-img">
                                <img src="{{ asset('images/realtymogul/benefits-investors.jpg') }}"
                                    alt="Real estate education resources">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banking-right-card">
                                <div class="banking-card-title">
                                    <h2><span class="counter" data-count-min="1" data-count-max="10"
                                            data-count-duration="1000" data-count-delay="200">10</span>+</h2>
                                    <h6>Years of <br> insights</h6>
                                </div>
                                <div class="card-description">
                                    <p>Our team of real estate professionals and investment analysts has spent over a decade curating educational content designed to help investors at every stage — from first-time investors to seasoned professionals seeking deeper market insights.</p>
                                </div>
                                <a class="read-more v1" href="#">Browse All Articles</a>
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
                        <h2 class="big-title">Featured contributors</h2>
                        <p class="title-para">Our content is produced by experienced real estate professionals, <br> portfolio managers, and investment analysts.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-1.jpg') }}" alt="Real estate analyst">
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
                                    <img src="{{ asset('images/realtymogul/team-2.jpg') }}" alt="Portfolio manager">
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
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-3.jpg') }}" alt="Research analyst">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Mark Ellison</a></h4>
                                        <p>Head of Market Research</p>
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
                                    <img src="{{ asset('images/realtymogul/team-4.jpg') }}" alt="Tax strategist">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Lisa Wang</a></h4>
                                        <p>Tax & Structuring Advisor</p>
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
                                <h2 class="big-title">Ready to put your knowledge to work?</h2>
                                <p class="title-para">Explore current investment opportunities and start building <br> your real estate portfolio with RealtyMogul today.
                                </p>
                            </div>
                            <a href="#" class="link-anime v1 icon-1 round-border-sm">View Investments</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interested Our Team End -->
        </main>
 @endsection
