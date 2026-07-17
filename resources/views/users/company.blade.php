@extends('layouts.user')

@section('title', 'Company')
@section('page-title', 'About Us')

@section('content')

{{-- COMPANY INTRODUCTION SECTION --}}
<div style="text-align:center;margin-bottom:40px;">
    <h2 style="font-size:18px;color:var(--text-muted);font-weight:500;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:16px;">Who We Are</h2>
    <h1 style="font-size:48px;font-weight:800;color:var(--text);margin:0 0 32px;line-height:1.2;">Real Estate Investing, Opened Up</h1>
</div>

<div style="max-width:800px;margin:0 auto 40px;padding:32px;background:var(--card);border:1px solid var(--border);border-radius:var(--radius);line-height:1.8;font-size:15px;color:var(--text);">
    <p style="margin-bottom:20px;">
        Real estate has always been one of the best ways to build long-term wealth, but getting in has usually meant a lot of money up front, a lot of paperwork, or knowing the right people. RealtyMogul exists to change that.
    </p>

    <p style="margin-bottom:20px;">
        We give everyday investors a way to put money into vetted real estate funds and developments without those usual barriers. No massive minimums, no confusing legal process, and no wondering where your money actually went.
    </p>

    <p style="margin-bottom:20px;">
        Every fund on the platform is reviewed before it's ever listed. Once you've invested, you can track how it's performing, see your returns, and request a withdrawal whenever you need to, all from your dashboard.
    </p>

    <p>
        We're still growing, and we're doing it the same way we started: keeping things simple and being upfront with the people who invest with us.
    </p>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:22px;margin-bottom:24px;">
    <div class="card">
        <div class="card-header"><div class="card-title">Our Mission</div></div>
        <div class="card-body">
            <p>To give everyday investors real access to property funds that used to be out of reach, without high minimums or unnecessary complexity.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><div class="card-title">Our Vision</div></div>
        <div class="card-body">
            <p>To be a real estate investment platform people actually trust: upfront about how it works and easy for anyone to use.</p>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:22px;">
    <div class="cs-card">
        <div style="font-weight:700;color:var(--text);">Security First</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:8px;">Verified funds, proper legal documentation, and encrypted transactions.</div>
    </div>
    <div class="cs-card">
        <div style="font-weight:700;color:var(--text);">Transparent Returns</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:8px;">Real-time dashboards and fee structures with no hidden surprises.</div>
    </div>
    <div class="cs-card">
        <div style="font-weight:700;color:var(--text);">Global Opportunity</div>
        <div style="font-size:13px;color:var(--text-muted);margin-top:8px;">Real estate opportunities across regions, with local payment support.</div>
    </div>
</div>

<div class="card">
    <div class="card-header"><div class="card-title">Get In Touch</div></div>
    <div class="card-body">
        <div style="display:flex;flex-direction:column;gap:12px;">
            <div>
                <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:2px;">Email</div>
                <div style="font-size:14px;color:var(--text);font-weight:500;">support@realtymogul.live</div>
            </div>
            <div>
                <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:2px;">Phone</div>
                <div style="font-size:14px;color:var(--text);font-weight:500;">+1 (800) 555-0174</div>
            </div>
        </div>
    </div>
</div>

@endsection
