@extends('layouts.user')

@section('title', 'Company')
@section('page-title', 'About Us')

@section('content')

{{-- COMPANY INTRODUCTION SECTION --}}
<div style="text-align:center;margin-bottom:40px;">
    <h2 style="font-size:18px;color:var(--text-muted);font-weight:500;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:16px;">Company Introduction</h2>
    <h1 style="font-size:48px;font-weight:800;color:var(--text);margin:0 0 32px;line-height:1.2;">Democratizing Real Estate Investment Opportunity</h1>
</div>

<div style="max-width:800px;margin:0 auto 40px;padding:32px;background:var(--card);border:1px solid var(--border);border-radius:var(--radius);line-height:1.8;font-size:15px;color:var(--text);">
    <p style="margin-bottom:20px;">
        <strong>RealtyMogul</strong> represents a paradigm shift in how people access and profit from real estate investment opportunities.
    </p>

    <p style="margin-bottom:20px;">
        Traditionally, real estate investment has been gatekept by capital requirements, geographic limitations, and complex processes. Today's investor demands accessibility — the ability to participate in quality property investments from anywhere, with flexible capital, and transparent returns.
    </p>

    <p style="margin-bottom:20px;">
        The problem is that most investment platforms lack true accessibility. High minimum investments exclude small investors, opaque fee structures erode returns, geographic constraints limit opportunities, and outdated systems create friction in fund management and withdrawals.
    </p>

    <p style="margin-bottom:20px;">
        We recognized that the future of real estate investing lies in democratization — when investors of all sizes can access institutional-quality property deals, earn meaningful returns, and maintain full control over their capital and withdrawal timing.
    </p>

    <p style="margin-bottom:20px;">
        RealtyMogul created a revolutionary investment platform powered by data-driven fund selection and transparent management systems. Our curated portfolio of vetted property developments and fund opportunities provides the data foundation to deliver smart investment decisions with confidence and clarity.
    </p>

    <p style="margin-bottom:20px;">
        We serve the estimated $3.7 trillion global real estate market segment seeking alternative income and wealth building solutions. The market suffers from limited retail access, high barriers to entry, and lack of transparent performance metrics — resulting in billions in potential wealth creation being locked away from everyday investors.
    </p>

    <p>
        We deliver sophisticated investment opportunities through an intuitive dashboard, real-time fund analytics, and seamless payment processing — putting institutional-grade real estate investing in the hands of every investor.
    </p>
</div>

<div class="company-stats">
    <div class="cs-card">
        <div class="cs-value">12K+</div>
        <div class="cs-label">Active Investors</div>
    </div>
    <div class="cs-card">
        <div class="cs-value">$48M+</div>
        <div class="cs-label">Assets Deployed</div>
    </div>
    <div class="cs-card">
        <div class="cs-value">24+</div>
        <div class="cs-label">Active Funds</div>
    </div>
    <div class="cs-card">
        <div class="cs-value">14.2%</div>
        <div class="cs-label">Avg. Annual Return</div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:22px;margin-bottom:24px;">
    <div class="card">
        <div class="card-header"><div class="card-title">Our Mission</div></div>
        <div class="card-body">
            <p>To democratize real estate investment by providing everyday investors access to vetted, high-performing property funds with transparent returns and minimal barriers to entry.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><div class="card-title">Our Vision</div></div>
        <div class="card-body">
            <p>To be the most trusted real estate investment platform where transparency, security, and accessible opportunities drive meaningful wealth creation for millions of investors globally.</p>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:22px;">
    <div class="cs-card">
        <div style="font-size:22px;margin-bottom:8px;">🔒</div>
        <div style="font-weight:700;color:var(--text);">Security First</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:8px;">Fully verified funds, legal documentation, encrypted transactions, and insured capital.</div>
    </div>
    <div class="cs-card">
        <div style="font-size:22px;margin-bottom:8px;">💰</div>
        <div style="font-weight:700;color:var(--text);">Transparent Returns</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:8px;">Real-time performance dashboards, audited fund statements, and fair fee structures.</div>
    </div>
    <div class="cs-card">
        <div style="font-size:22px;margin-bottom:8px;">🌐</div>
        <div style="font-weight:700;color:var(--text);">Global Opportunity</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:8px;">Access curated real estate opportunities across regions with local payment support.</div>
    </div>
</div>

<div class="card">
    <div class="card-header"><div class="card-title">Get In Touch</div></div>
    <div class="card-body">
        <div style="display:flex;flex-direction:column;gap:20px;">

            {{-- Contact Info --}}
            <div style="display:flex;flex-direction:column;gap:12px;">
                <div style="display:flex;align-items:center;gap:12px;">
                    <span style="font-size:20px;">📧</span>
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:2px;">Email</div>
                        <div style="font-size:14px;color:var(--text);font-weight:500;">support@realtymogul.app</div>
                    </div>
                </div>
                <div style="display:flex;align-items:center;gap:12px;">
                    <span style="font-size:20px;">📱</span>
                    <div>
                        <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:2px;">Phone</div>
                        <div style="font-size:14px;color:var(--text);font-weight:500;">+1 (800) 555-0174</div>
                    </div>
                </div>
            </div>

            {{-- Social Media Links --}}
            <div style="padding-top:12px;border-top:1px solid var(--border);">
                <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:12px;">Follow Us</div>
                <div style="display:flex;gap:12px;align-items:center;">
                    <a href="#" style="display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:var(--radius-sm);background:rgba(29,155,240,0.1);border:1px solid rgba(29,155,240,0.2);text-decoration:none;transition:all 0.2s;color:#1D9BF0;font-weight:600;" onmouseover="this.style.background='rgba(29,155,240,0.2)'" onmouseout="this.style.background='rgba(29,155,240,0.1)'">
                        𝕏
                    </a>
                    <a href="#" style="display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:var(--radius-sm);background:rgba(0,119,181,0.1);border:1px solid rgba(0,119,181,0.2);text-decoration:none;transition:all 0.2s;color:#0077B5;font-weight:600;font-size:20px;" onmouseover="this.style.background='rgba(0,119,181,0.2)'" onmouseout="this.style.background='rgba(0,119,181,0.1)'">
                        in
                    </a>
                    <a href="#" style="display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:var(--radius-sm);background:rgba(59,89,152,0.1);border:1px solid rgba(59,89,152,0.2);text-decoration:none;transition:all 0.2s;color:#3B5998;font-weight:600;font-size:20px;" onmouseover="this.style.background='rgba(59,89,152,0.2)'" onmouseout="this.style.background='rgba(59,89,152,0.1)'">
                        f
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
