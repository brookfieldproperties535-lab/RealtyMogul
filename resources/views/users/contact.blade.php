@extends('users.layouts.master')

@section('content')

        <main>
            <!-- Breadcum Start -->
            <section class="breadcum v1">
                <div class="container">
                    <div class="breadcum-content">
                        <h2>Contact Us</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
                <div class="bg-shap-1" data-background="assets/img/breadcum/v1/bg-shap.html"></div>
                <div class="bg-shap-2" data-background="assets/img/breadcum/v1/img-1.html"></div>
                <div class="bg-shap-3" data-background="assets/img/breadcum/v1/img-2.html"></div>
            </section>
            <!-- Breadcum End -->
            <!-- Contact Start -->
            <section class="contact pt-sm-50 pb-sm-50 pt-md-70 pb-md-70 pt-xl-100 pb-xl-100 pt-130">
                <div class="container bg-cover-center" data-background="assets/img/contact/contact-bg.html">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="content-left">
                                <div class="section-title v1">
                                    <h6 class="sub-title v13">Contact</h6>
                                    <h2 class="big-title v3">Dont's hesitate to <br> reach out to us </h2>
                                    <p class="title-pera">Sodales mauris quam faucibus scelerisque risus malesuda
                                        nulla.
                                        Cursus enim quis elementum feugiat ut. Phasellus a vivierra facilisis eu
                                        purus.</p>
                                </div>
                                <ul class="contact-info">
                                    <li>
                                        <div class="box-icon">
                                            <i class="my-icon icon-massage"></i>
                                        </div>
                                        <h6 class="list-title">support@realtymogul.live</h6>
                                    </li>
                                    <li>
                                        <div class="box-icon">
                                            <i class="my-icon icon-diler-2"></i>
                                        </div>
                                        <h6 class="list-title">+1 (800) 555-0174</h6>
                                    </li>
                                    <li>
                                        <div class="box-icon">
                                            <i class="my-icon icon-location-dot-solid"></i>
                                        </div>
                                        <h6 class="list-title">4140 Parker Rd. Allentown,
                                            <br>New
                                            Mexico 31134
                                        </h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="#" method="post">
                                    <div class="form-input">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" placeholder="Your Name" required>
                                    </div>

                                    <div class="form-input">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" placeholder="Work Email" required>
                                    </div>

                                    <div class="form-input">
                                        <label for="company">Company Name:</label>
                                        <input type="text" id="company" placeholder="Company Name" name="company">
                                    </div>

                                    <div class="form-input">
                                        <label for="message">Message:</label>
                                        <textarea id="message" name="message" placeholder="Your Message" rows="4"
                                            required></textarea>
                                    </div>

                                    <div class="form-btn">
                                        <button type="submit">Contact Us</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact End -->
            <!-- Contact Map Start -->
            <section class="contact-map v1">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14613.167032861855!2d90.433811!3d23.701273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b767a022cd4b%3A0xaf33907e219d127!2sRayerbag%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1675146270950!5m2!1sen!2sbd"></iframe>
            </section>
            <!-- Contact Map End -->
            <!-- Our Values Start -->
            <section class="our-values v2 pt-sm-50 pb-sm-50 pt-md-70 pb-md-70 pt-xl-100 pb-xl-100 pt-130 pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-title-white v7">
                                <h2 class="big-title">Aliquam donec turpis senectus arcu?</h2>
                                <p>Vestibulum in donec non sit bibendum. Id justo lorem eget condimentum porttitor lacus
                                    velit scelerisque.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <ul class="faq-accordion" id="accordionFAQ">
                                <li>
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#teamwork">Aliquam
                                        donec turpis senectus arcu?</button>
                                    <div id="teamwork" class="collapse show" data-bs-parent="#accordionFAQ">
                                        <div class="box-content">
                                            <h6>We know that time is of the essence when it comes to securing a
                                                mortgage, which is why we’ve made our application process as quick and
                                                easy as possible.
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#innovation">Elementum pulvinar velit vulputate mauris?</button>
                                    <div id="innovation" class="collapse" data-bs-parent="#accordionFAQ">
                                        <div class="box-content">
                                            <h6>We know that time is of the essence when it comes to securing a
                                                mortgage, which is why we’ve made our application process as quick and
                                                easy as possible.
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#impact">Sapien quam nunc tortor turpis?</button>
                                    <div id="impact" class="collapse" data-bs-parent="#accordionFAQ">
                                        <div class="box-content">
                                            <h6>We know that time is of the essence when it comes to securing a
                                                mortgage, which is why we’ve made our application process as quick and
                                                easy as possible.
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#freedom">Tempus magna et quisque et mauris nisl eu
                                        nunc?</button>
                                    <div id="freedom" class="collapse" data-bs-parent="#accordionFAQ">
                                        <div class="box-content">
                                            <h6>We know that time is of the essence when it comes to securing a
                                                mortgage, which is why we’ve made our application process as quick and
                                                easy as possible.
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <button class="collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#integrity">Faucibus amet quis risus quis dui?</button>
                                    <div id="integrity" class="collapse" data-bs-parent="#accordionFAQ">
                                        <div class="box-content">
                                            <h6>We know that time is of the essence when it comes to securing a
                                                mortgage, which is why we’ve made our application process as quick and
                                                easy as possible.
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Values End -->
            <!-- Partners Logo Start -->
            <section class="partners-logo v4 pt-sm-50 pb-sm-50 pt-md-70 pb-md-70 pt-xl-100 pb-xl-100 pt-130 pb-130">
                <div class="container">
                    <div class="partners-logo-main">
                        <h4 class="partners-logo-title">Loved by marketing <br> teams worldwide</h4>
                        <div class="slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-1.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-2.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-3.html" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-4.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-5.html" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-6.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-1.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-2.svg" alt="logo"></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#"><img src="assets/img/official-partners/v3/logo-3.html" alt="logo"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Partners Logo End -->
        </main>
        @endsection
