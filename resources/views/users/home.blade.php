@extends('users.layouts.master')

@section('content')
<main>

    {{-- HERO --}}
    <section class="banner v1">
        <div class="container">
            <div class="banner-content">
                <div class="section-title v1">
                    {{-- image_type: aerial view of commercial real estate skyline | source: Unsplash | keyword: commercial real estate city | filename: public/assets/images/pages/home/hero.jpg --}}
                    <h5 class="sub-title v1">REAL ESTATE INVESTING, SIMPLIFIED</h5>
                    <h2 class="big-title">Invest in Commercial Real Estate<br> Without the Complexity</h2>
                    <p class="title-para">Access institutional-quality real estate investments previously reserved for the ultra-wealthy.<br> Build passive income and long-term wealth — starting with as little as $5,000.</p>
                </div>
                <ul class="all-btns">
                    <li><a href="#" class="link-anime v1 round-border-sm icon-1">Create Free Account</a></li>
                    <li><a href="{{ route('users.investment-opportunities') }}" class="link-anime v2 round-border-sm icon-1">Explore Investments</a></li>
                </ul>
                <div class="banner-img wow animate__zoomIn" data-wow-delay="0.4s" data-wow-duration="0.8s">
                    <img src="{{ asset('assets/images/pages/home/hero.jpg') }}" alt="Commercial Real Estate Investment Platform">
                </div>
            </div>
        </div>
        <div class="bg-shap-1" data-background="{{ asset('user/assets/img/banner/v1/shap-1.svg') }}"></div>
        <div class="bg-shap-2" data-background="{{ asset('user/assets/img/banner/v1/shap-2.svg') }}"></div>
        <div class="bg-shap-3" data-background="{{ asset('user/assets/img/banner/v1/img-1.png') }}"></div>
    </section>

    {{-- TRUST STATS --}}
    <section class="about-us v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
        <div class="container">
            <div class="section-title v1">
                <h5 class="sub-title v4">PLATFORM HIGHLIGHTS</h5>
                <h2 class="big-title">Trusted by Thousands of Individual Investors</h2>
                <p class="title-para">Our platform has facilitated access to high-quality commercial real estate deals since 2012.</p>
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-5">
                    {{-- image_type: modern office building exterior | source: Unsplash | keyword: modern office building exterior | filename: public/assets/images/pages/home/trust-building.jpg --}}
                    <div class="about-profile">
                        <img src="{{ asset('assets/images/pages/home/trust-building.jpg') }}" alt="Commercial Real Estate">
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-7">
                    <div class="about-right">
                        <h6 class="sub-title">We believe that access to quality real estate investments should not be limited to institutional players. Our platform bridges that gap — giving everyday accredited investors a seat at the table alongside major institutions.</h6>
                        <ul class="about-right-cards">
                            <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s" data-wow-duration="0.8s">
                                <h2 class="title">$1B+</h2>
                                <h6 class="sub-title">Capital Deployed</h6>
                            </li>
                            <li class="card-contant small-box wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s" data-wow-duration="0.8s">
                                <h2 class="title">290K+</h2>
                                <h6 class="sub-title">Registered Members</h6>
                            </li>
                            <li class="card-contant big-box wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s" data-wow-duration="0.8s">
                                <h2 class="title">10+</h2>
                                <h6 class="sub-title">Years of Excellence</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS --}}
    <section class="our-mission v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
        <div class="container">
            <div class="section-title-white v1">
                <h5 class="sub-title v6">HOW IT WORKS</h5>
                <h2 class="big-title">Three Simple Steps to Start Earning<br> Passive Real Estate Income</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s" data-wow-duration="0.8s">
                    <div class="our-mission-card">
                        <div class="card-icon"><i class="my-icon icon-user"></i></div>
                        <h4 class="card-title">1. Create Your Free Account</h4>
                        <p>Register in minutes. Complete your investor profile and verify your accredited investor status to unlock access to the full marketplace.</p>
                    </div>
                </div>
                <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s" data-wow-duration="0.8s">
                    <div class="our-mission-card">
                        <div class="card-icon"><i class="my-icon icon-graph"></i></div>
                        <h4 class="card-title">2. Browse Curated Opportunities</h4>
                        <p>Explore a range of pre-vetted commercial properties — multifamily, office, retail, industrial, and more — each backed by our rigorous due diligence process.</p>
                    </div>
                </div>
                <div class="col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s" data-wow-duration="0.8s">
                    <div class="our-mission-card">
                        <div class="card-icon"><i class="my-icon icon-profit"></i></div>
                        <h4 class="card-title">3. Invest &amp; Earn Returns</h4>
                        <p>Select an investment, review the full offering documents, and fund your position online. Then sit back and receive distributions directly to your account.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- INVESTMENT OPTIONS --}}
    <section class="core-feature v1 pt-sm-50 pb-sm-50 pt-md-70 pb-md-70 pt-xl-100 pb-xl-100 pt-130 pb-130">
        <div class="container">
            <div class="section-title-white v1">
                <div class="title-left-right-end">
                    <div class="w-80-15">
                        <h2 class="big-title">Two Powerful Ways to Invest<br> in Commercial Real Estate</h2>
                    </div>
                    {{-- image_type: investor reviewing real estate portfolio on tablet | source: Pexels | keyword: investor portfolio review | filename: public/assets/images/pages/home/investment-options.jpg --}}
                    <div class="core-feature-img">
                        <img src="{{ asset('assets/images/pages/home/investment-options.jpg') }}" alt="Investment Options">
                    </div>
                </div>
                <h5 class="sub-title v1">CHOOSE YOUR STRATEGY</h5>
            </div>
            <ul class="core-list-card">
                <li class="wow animate__fadeInUp" data-wow-offset="200" data-wow-delay="0.2s" data-wow-duration="0.8s">
                    <div class="core-list-text">
                        <h2 class="big-title">REITs — Diversified Income &amp; Growth</h2>
                        <p class="title-para">Our non-traded REITs offer diversified exposure to commercial real estate with regular dividend distributions. Choose the Income REIT for consistent cash flow or the Growth REIT for long-term appreciation.</p>
                        <a href="{{ route('users.income-reits') }}" class="link-anime v3 round-border-full">Explore REITs</a>
                    </div>
                    {{-- image_type: apartment building aerial view | source: Unsplash | keyword: apartment complex aerial | filename: public/assets/images/pages/home/reits-card.jpg --}}
                    <div class="core-list-img">
                        <img src="{{ asset('assets/images/pages/home/reits-card.jpg') }}" alt="REITs Investment">
                    </div>
                </li>
                <li class="wow animate__fadeInUp" data-wow-offset="200" data-wow-delay="0.4s" data-wow-duration="0.8s">
                    <div class="core-list-text">
                        <h2 class="big-title">Marketplace — Individual Property Deals</h2>
                        <p class="title-para">Browse individual commercial real estate investments sourced directly from experienced sponsors. Each deal is independently underwritten and presented with full transparency on structure, risk, and projected returns.</p>
                        <a href="{{ route('users.investment-opportunities') }}" class="link-anime v3 round-border-full">Browse Marketplace</a>
                    </div>
                    {{-- image_type: commercial real estate building | source: Pexels | keyword: commercial building exterior | filename: public/assets/images/pages/home/marketplace-card.jpg --}}
                    <div class="core-list-img">
                        <img src="{{ asset('assets/images/pages/home/marketplace-card.jpg') }}" alt="Investment Marketplace">
                    </div>
                </li>
            </ul>
        </div>
    </section>

    {{-- WHY REALTYMOGUL --}}
    <section class="benefits v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
        <div class="container">
            <div class="section-title v1">
                <div class="title-left-right-center">
                    <div class="w-80-15">
                        <h2 class="big-title">Why Investors Choose RealtyMogul</h2>
                    </div>
                    <a href="#" class="link-anime v1 round-border-sm icon-1">Get Started Free</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.2s" data-wow-duration="0.8s">
                    <div class="benefits-card">
                        {{-- image_type: due diligence team reviewing documents | source: Unsplash | keyword: business team reviewing documents | filename: public/assets/images/pages/home/due-diligence.jpg --}}
                        <div class="benefits-img">
                            <img src="{{ asset('assets/images/pages/home/due-diligence.jpg') }}" alt="Due Diligence Process">
                        </div>
                        <h3 class="title">Rigorous Underwriting — We Reject the Majority of Deals We Review</h3>
                        <p class="para">Our investment team performs comprehensive financial modeling, market analysis, and sponsor background checks before any opportunity reaches our platform. Only a small fraction of submitted deals are approved for investor access.</p>
                    </div>
                </div>
                <div class="col-lg-6 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.4s" data-wow-duration="0.8s">
                    <div class="benefits-card">
                        {{-- image_type: passive income financial growth chart | source: Pexels | keyword: financial growth investment chart | filename: public/assets/images/pages/home/passive-income.jpg --}}
                        <div class="benefits-img">
                            <img src="{{ asset('assets/images/pages/home/passive-income.jpg') }}" alt="Passive Income Growth">
                        </div>
                        <h3 class="title">Truly Passive Income — Real Estate Returns Without the Landlord Work</h3>
                        <p class="para">Receive regular distributions without managing tenants, maintenance, or property operations. Our experienced sponsors and asset managers handle all day-to-day activities on your behalf.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shap-1" data-background="{{ asset('user/assets/img/benefits/bg-shap.svg') }}"></div>
    </section>

    {{-- PLATFORM FEATURES --}}
    <section class="our-values v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
        <div class="container">
            <div class="section-title-center-white v1">
                <h5 class="sub-title v6">PLATFORM ADVANTAGES</h5>
                <h2 class="big-title">Built for the Modern Real Estate Investor</h2>
            </div>
            <ul class="faq-accordion" id="accordionPlatform">
                <li>
                    <button type="button" data-bs-toggle="collapse" data-bs-target="#featureDiligence">Institutional-Grade Due Diligence</button>
                    <div id="featureDiligence" class="collapse show" data-bs-parent="#accordionPlatform">
                        <div class="box-content">
                            <h6>Every investment opportunity on our platform undergoes a multi-stage review covering sponsor track record, market fundamentals, property condition, financial projections, and legal structure. We employ experienced real estate professionals who evaluate hundreds of deals each year — so you don't have to.</h6>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#featureTransparency">Full Transparency on Every Investment</button>
                    <div id="featureTransparency" class="collapse" data-bs-parent="#accordionPlatform">
                        <div class="box-content">
                            <h6>We provide complete offering documents, detailed financial models, sponsor histories, and risk disclosures for every deal. You'll always know exactly what you're investing in, what the projected returns are, and what the risks entail.</h6>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#featureDiversification">Diversify Across Property Types and Markets</button>
                    <div id="featureDiversification" class="collapse" data-bs-parent="#accordionPlatform">
                        <div class="box-content">
                            <h6>Spread your real estate exposure across multiple property types — multifamily, commercial, industrial, mixed-use — and across different geographic markets to reduce concentration risk. Our REIT options provide automatic diversification in a single investment.</h6>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#featureAccess">Access to Deals Typically Reserved for Institutions</button>
                    <div id="featureAccess" class="collapse" data-bs-parent="#accordionPlatform">
                        <div class="box-content">
                            <h6>Historically, high-quality commercial real estate syndications required connections and millions in minimum commitments. Our platform democratizes access — giving accredited individual investors entry to the same caliber of deals available to pension funds and endowments.</h6>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#featureTech">Seamless Digital Investment Experience</button>
                    <div id="featureTech" class="collapse" data-bs-parent="#accordionPlatform">
                        <div class="box-content">
                            <h6>Review documents, sign agreements, fund your investment, and track your portfolio — all within a single secure online platform. We handle the paperwork and administration so you can focus on building wealth.</h6>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="bg-shap" data-background="{{ asset('user/assets/img/our-values/v1/bg-shap.svg') }}"></div>
    </section>

    {{-- PRESS / FEATURED IN --}}
    <section class="partners v1 pt-sm-50 pb-sm-50 pt-130 pb-130 pt-md-70 pb-md-70 pt-lg-100 pb-lg-100">
        <div class="container">
            <div class="featured-section v1">
                <div class="section-title v1">
                    <div class="title-left-right-center">
                        <div class="w-lg-80-15">
                            <h5 class="sub-title v2">AS SEEN IN</h5>
                        </div>
                        <ul class="slider-btns">
                            <li><button class="prev-btn"><i class="my-icon icon-arrow-left"></i></button></li>
                            <li><button class="next-btn"><i class="my-icon icon-arrow-right"></i></button></li>
                        </ul>
                    </div>
                </div>
                <div class="slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <h5 class="small-text">Featured on Forbes</h5>
                            <h3 class="title">How Online Real Estate Platforms Are Opening Up Commercial Property Investing to Everyday Accredited Investors</h3>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="small-text">Featured on Bloomberg</h5>
                            <h3 class="title">Real Estate Crowdfunding Platforms Are Changing the Way Americans Invest in Property</h3>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="small-text">Featured on The Wall Street Journal</h5>
                            <h3 class="title">Accredited Investors Are Gaining Easier Access to Commercial Real Estate Through New Digital Platforms</h3>
                        </div>
                        <div class="swiper-slide">
                            <h5 class="small-text">Featured on Inc. Magazine</h5>
                            <h3 class="title">The Technology Disrupting Traditional Real Estate Investing — And Who Is Benefiting</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shap-1" data-background="{{ asset('user/assets/img/partners/v1/shap-1.svg') }}"></div>
    </section>

    {{-- RECENT EDUCATION / ARTICLES --}}
    <section class="recent-blogs v1 pb-sm-50 pb-130 pb-md-70 pb-lg-100">
        <div class="container">
            <div class="section-title v1">
                <div class="title-left-right-center">
                    <div class="w-lg-80-15">
                        <h5 class="sub-title v4">INVESTOR EDUCATION</h5>
                        <h2 class="big-title">Expand Your Real Estate Knowledge</h2>
                    </div>
                    <a href="{{ route('users.knowledge-center') }}" class="link-anime v3 round-border-full">View All Articles</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.1s" data-wow-duration="0.8s">
                    {{-- image_type: real estate investor reading | source: Unsplash | keyword: investor reading financial documents | filename: public/assets/images/pages/home/article-1.jpg --}}
                    <div class="recent-blog-card">
                        <div class="recent-blog-card-img">
                            <a href="{{ route('users.knowledge-center') }}">
                                <img src="{{ asset('assets/images/pages/home/article-1.jpg') }}" alt="What is a REIT">
                            </a>
                        </div>
                        <div class="recent-blog-card-contant">
                            <h6 class="small-title">Beginner's Guide</h6>
                            <h4 class="title"><a href="{{ route('users.knowledge-center') }}">What Is a REIT and How Does It Generate Income for Investors?</a></h4>
                            <a href="{{ route('users.knowledge-center') }}" class="read-more v1">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.3s" data-wow-duration="0.8s">
                    {{-- image_type: commercial real estate building facade | source: Pexels | keyword: commercial property investment | filename: public/assets/images/pages/home/article-2.jpg --}}
                    <div class="recent-blog-card">
                        <div class="recent-blog-card-img">
                            <a href="{{ route('users.knowledge-center') }}">
                                <img src="{{ asset('assets/images/pages/home/article-2.jpg') }}" alt="1031 Exchange Explained">
                            </a>
                        </div>
                        <div class="recent-blog-card-contant">
                            <h6 class="small-title">Tax Strategy</h6>
                            <h4 class="title"><a href="{{ route('users.1031-exchange') }}">The 1031 Exchange: A Powerful Tool for Deferring Capital Gains Taxes</a></h4>
                            <a href="{{ route('users.1031-exchange') }}" class="read-more v1">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow animate__fadeInUp" data-wow-offset="100" data-wow-delay="0.5s" data-wow-duration="0.8s">
                    {{-- image_type: diversified investment portfolio chart | source: Unsplash | keyword: investment portfolio diversification | filename: public/assets/images/pages/home/article-3.jpg --}}
                    <div class="recent-blog-card">
                        <div class="recent-blog-card-img">
                            <a href="{{ route('users.knowledge-center') }}">
                                <img src="{{ asset('assets/images/pages/home/article-3.jpg') }}" alt="Commercial Real Estate Benefits">
                            </a>
                        </div>
                        <div class="recent-blog-card-contant">
                            <h6 class="small-title">Investing Strategy</h6>
                            <h4 class="title"><a href="{{ route('users.why-commercial-real-estate') }}">Why Commercial Real Estate Belongs in Every Diversified Portfolio</a></h4>
                            <a href="{{ route('users.why-commercial-real-estate') }}" class="read-more v1">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FINAL CTA --}}
    <section class="interested-our-team v1 pb-sm-50 pb-130 pb-md-70 pb-lg-100">
        <div class="container">
            <div class="interested-team-card">
                <div class="interested-team-content">
                    <div class="section-title v1">
                        <h2 class="big-title">Ready to Put Your Capital to Work in Real Estate?</h2>
                        <p class="title-para">Join over 290,000 investors who have already discovered a smarter way to invest in commercial real estate. It only takes a few minutes to get started.</p>
                    </div>
                    <a href="#" class="link-anime v1 icon-1 round-border-sm">Create Your Free Account</a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
