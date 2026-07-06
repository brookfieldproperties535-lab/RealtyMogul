@extends('users.layouts.master')

@section('content')
        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1">
                <div class="container">
                    <div class="breadcum-content">
                        <h2>RM Communities</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>RM Communities</li>
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
                        <h2 class="big-title">Invest in multifamily communities that matter.</h2>
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
                                <img src="{{ asset('images/realtymogul/slide-3.jpg') }}" alt="RM Communities apartment">
                            </div>
                        </div>
                        <div class="col-xl-6 col-xxl-7">
                            <div class="about-right">
                                <h6 class="sub-title">RM Communities focuses on providing quality affordable and workforce housing through strategic multifamily investments. We target well-located apartment communities that serve real residents in growing U.S. markets.</h6>
                                <ul class="about-right-cards">
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.1s" data-wow-duration="0.8s">
                                        <h2 class="title">5K+</h2>
                                        <h6 class="sub-title">Units managed</h6>
                                    </li>
                                    <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.3s" data-wow-duration="0.8s">
                                        <h2 class="title"><span class="counter" data-count-min="5" data-count-max="20"
                                                data-count-duration="1000" data-count-delay="200">20</span>+</h2>
                                        <h6 class="sub-title">Markets served</h6>
                                    </li>
                                    <li class="card-contant big-box wow animate__fadeInUp" data-wow-offset="100"
                                        data-wow-delay="0.5s" data-wow-duration="0.8s">
                                        <h2 class="title">95<span class="counter" data-count-min="0"
                                                data-count-max="0" data-count-duration="1000"
                                                data-count-delay="200">0</span>%+</h2>
                                        <h6 class="sub-title">Average occupancy</h6>
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
                        <h2 class="big-title">RM Communities is dedicated to improving the quality and availability of affordable multifamily housing while delivering compelling risk-adjusted returns to investors.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-graph"></i>
                                </div>
                                <h4 class="card-title">Workforce &amp; affordable housing focus</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-profit"></i>
                                </div>
                                <h4 class="card-title">Stable, income-generating multifamily assets</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s"
                            data-wow-duration="0.8s">
                            <div class="our-mission-card">
                                <div class="card-icon">
                                    <i class="my-icon icon-bag"></i>
                                </div>
                                <h4 class="card-title">Resident-first property management approach</h4>
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
                        <h6 class="sub-title v6">Our approach</h6>
                        <h2 class="big-title">How we invest in communities</h2>
                    </div>
                    <ul class="faq-accordion" id="accordionFAQ">
                        <li>
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#teamwork">Target Markets</button>
                            <div id="teamwork" class="collapse show" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>We focus on high-growth Sun Belt and secondary markets with strong job growth, population inflows, and limited new housing supply — markets where quality affordable housing is critically needed and long-term demand is supported by fundamentals.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#innovation">Property Selection</button>
                            <div id="innovation" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Each community is evaluated based on location quality, current occupancy, physical condition, resident demographics, and the opportunity to improve operations and rents through targeted capital improvements and management enhancements.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#impact">Value-Add Strategy</button>
                            <div id="impact" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>We acquire well-located communities with upside potential, then invest in capital improvements — unit renovations, common area upgrades, amenity enhancements — to increase asset value and improve the resident experience.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#freedom">Operations &amp; Management</button>
                            <div id="freedom" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Our vertically integrated property management platform ensures consistent operating standards, cost efficiency, and resident satisfaction — all designed to maintain strong occupancy and protect investor returns over the hold period.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#integrity">Community Impact</button>
                            <div id="integrity" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Beyond financial returns, RM Communities is committed to providing safe, clean, and well-maintained housing to residents who depend on quality affordable options — creating positive social impact alongside investment value.</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button class="collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ambition">Exit Strategy</button>
                            <div id="ambition" class="collapse" data-bs-parent="#accordionFAQ">
                                <div class="box-content">
                                    <h6>Our typical hold period is 3–7 years, allowing time to execute the value-add business plan and capture appreciation before a strategic disposition. We target institutional buyers to maximize exit proceeds for investors.</h6>
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
                        <h2 class="big-title">Designed to deliver stable returns through quality multifamily housing.</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banking-card-img">
                                <img src="{{ asset('images/realtymogul/feature-multifamily.jpg') }}"
                                    alt="Multifamily apartment community">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banking-right-card">
                                <div class="banking-card-title">
                                    <h2><span class="counter" data-count-min="1" data-count-max="5"
                                            data-count-duration="1000" data-count-delay="200">5</span>K+</h2>
                                    <h6>Units under <br> management</h6>
                                </div>
                                <div class="card-description">
                                    <p>RM Communities leverages deep local market expertise, disciplined underwriting, and hands-on property management to acquire and operate apartment communities that serve essential housing needs while generating attractive risk-adjusted returns for investors.</p>
                                </div>
                                <a class="read-more v1" href="#">Learn More</a>
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
                        <h2 class="big-title">The RM Communities team</h2>
                        <p class="title-para">Led by experienced multifamily investment and operations professionals <br> committed to creating value for investors and residents alike.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s"
                            data-wow-duration="0.8s">
                            <div class="the-founder-card">
                                <div class="founder-card-img">
                                    <img src="{{ asset('images/realtymogul/team-1.jpg') }}" alt="Multifamily investment lead">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Brian Norris</a></h4>
                                        <p>Head of Acquisitions</p>
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
                                    <img src="{{ asset('images/realtymogul/team-2.jpg') }}" alt="Asset manager">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Angela Ross</a></h4>
                                        <p>Director of Asset Management</p>
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
                                    <img src="{{ asset('images/realtymogul/team-3.jpg') }}" alt="Property operations manager">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Carlos Reyes</a></h4>
                                        <p>VP of Property Operations</p>
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
                                    <img src="{{ asset('images/realtymogul/team-4.jpg') }}" alt="Capital markets lead">
                                </div>
                                <div class="card-contant">
                                    <div class="card-text">
                                        <h4><a href="#">Michelle Chen</a></h4>
                                        <p>Director of Capital Markets</p>
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
                                <h2 class="big-title">Ready to invest in multifamily communities?</h2>
                                <p class="title-para">Explore RM Communities offerings and start building <br> a more impactful real estate portfolio today.
                                </p>
                            </div>
                            <a href="#" class="link-anime v1 icon-1 round-border-sm">View Current Offerings</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Interested Our Team End -->
        </main>
 @endsection
