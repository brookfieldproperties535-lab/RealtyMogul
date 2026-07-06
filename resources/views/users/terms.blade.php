@extends('layouts.user')

@section('title', 'Terms & Conditions')
@section('page-title', 'Terms & Conditions')

@section('content')

<div class="terms-layout">

    {{-- TOC --}}
    <aside class="terms-toc">
        <h3>Contents</h3>
        <ol>
            <li><a href="#section-1">1. Acceptance</a></li>
            <li><a href="#section-2">2. Eligibility</a></li>
            <li><a href="#section-3">3. Account</a></li>
            <li><a href="#section-4">4. Tasks</a></li>
            <li><a href="#section-5">5. Commissions & Payments</a></li>
            <li><a href="#section-6">6. Withdrawals</a></li>
            <li><a href="#section-7">7. Prohibited Conduct</a></li>
            <li><a href="#section-8">8. Intellectual Property</a></li>
            <li><a href="#section-9">9. Liability</a></li>
            <li><a href="#section-10">10. Privacy</a></li>
            <li><a href="#section-11">11. Governing Law</a></li>
        </ol>
        <div style="margin-top:12px;display:flex;gap:8px;">
            <button onclick="window.print()" class="btn btn-outline btn-sm">🖨️ Print</button>
            <div style="margin-left:auto;font-size:12px;color:var(--text-muted);">Last updated: <strong>May 1, 2026</strong></div>
        </div>
    </aside>

    {{-- TERMS BODY --}}
    <section class="terms-body">
        <h3 id="section-1">1. Acceptance</h3>
        <p>By using RealtyMogul you agree to these Terms. Please read them carefully. If you do not agree, do not use the Service.</p>

        <h3 id="section-2">2. Eligibility</h3>
        <p>To use the Service you must be at least 18 years old and able to form binding contracts under applicable law. You are responsible for maintaining accurate account information.</p>

        <h3 id="section-3">3. Account</h3>
        <p>Users are responsible for safeguarding account credentials. We may suspend accounts that breach these Terms or present security risks.</p>

        <h3 id="section-4">4. Tasks</h3>
        <p>Tasks are provided to members subject to availability. Submissions are reviewed; the platform reserves the right to reject low-quality or fraudulent submissions.</p>

        <h3 id="section-5">5. Commissions & Payments</h3>
        <p>Commission rates and payout schedules are disclosed on the platform. We reserve the right to update rates with notice. Payments are subject to verification and KYC checks.</p>

        <h3 id="section-6">6. Withdrawals</h3>
        <p>Withdrawal requests are processed per the published fee schedule. Fees may apply. We are not responsible for delays caused by payment providers or banks.</p>

        <h3 id="section-7">7. Prohibited Conduct</h3>
        <p>Users may not submit fraudulent content, attempt to manipulate the system, or share account access. Violations may result in suspension and forfeiture of funds.</p>

        <h3 id="section-8">8. Intellectual Property</h3>
        <p>All platform content and trademarks are the property of RealtyMogul or our licensors. Users grant a limited license to use content submitted for task purposes.</p>

        <h3 id="section-9">9. Liability</h3>
        <p>To the maximum extent permitted by law, RealtyMogul is not liable for indirect, incidental, special, or consequential damages arising from use of the Service.</p>

        <h3 id="section-10">10. Privacy</h3>
        <p>We collect and process personal data as described in our Privacy Policy. By using the Service you consent to such processing.</p>

        <h3 id="section-11">11. Governing Law</h3>
        <p>These Terms are governed by the laws of the jurisdiction in which RealtyMogul is incorporated, subject to mandatory local laws.</p>

        <div class="terms-callout">
            Important: Abuse of the platform, including fraudulent submissions or chargeback abuse, may lead to account termination and forfeiture of balances.
        </div>

        <p style="margin-top:18px;color:var(--text-muted);font-size:13px;">If you have questions about these Terms, contact support@realtymogul.app.</p>
    </section>

</div>

@endsection
