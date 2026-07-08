@extends('layouts.user')

@section('title', 'FAQs')
@section('page-title', 'Frequently Asked Questions')

@section('content')

{{-- CATEGORY TABS --}}
<div class="pill-tabs" style="margin-bottom:24px;">
    <div class="faq-cat-tab pill-tab active" data-cat="all">All Questions</div>
    <div class="faq-cat-tab pill-tab" data-cat="getting-started">Getting Started</div>
    <div class="faq-cat-tab pill-tab" data-cat="earnings">Earnings</div>
    <div class="faq-cat-tab pill-tab" data-cat="payments">Payments</div>
    <div class="faq-cat-tab pill-tab" data-cat="tasks">Tasks</div>
    <div class="faq-cat-tab pill-tab" data-cat="account">Account</div>
</div>

{{-- FAQ LIST --}}
<div id="faqList">

    {{-- Getting Started --}}
    <div class="faq-item" data-cat="getting-started">
        <div class="faq-q">
            <span>What is RealtyMogul and how does it work?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                RealtyMogul is a task-based earning platform. Registered members complete data optimization tasks, rating and reviewing products, services, and locations online, and each completed task earns a commission. Normal tasks earn a percentage of the task value based on your membership level, while Selected tasks earn a fixed 10% commission. You can withdraw your earnings via ACH bank transfer, Zelle, Venmo, PayPal, or debit/credit card.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="getting-started">
        <div class="faq-q">
            <span>How do I register and get started?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Registration is completely free. Simply click the Register button, fill in your name, email, phone number, and password. You'll start on the Silver membership, which gives you 35 tasks a day at a 0.70% commission rate. To unlock more tasks and a higher commission rate, you can upgrade your membership at any time from the Membership section.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="getting-started">
        <div class="faq-q">
            <span>What is the difference between Normal and Selected tasks?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                <strong style="color:var(--text);">Normal Tasks</strong> are the standard tasks every member has access to. Your commission depends on your membership level: Silver earns 0.70%, Gold earns 0.80%, and Platinum earns 1% of the task value.<br><br>
                <strong style="color:var(--warning);">Selected Tasks</strong> are higher-value tasks assigned individually. They pay a <strong>fixed 10% commission</strong> no matter your tier, which makes them worth more per task.
            </div>
        </div>
    </div>

    {{-- Earnings --}}
    <div class="faq-item" data-cat="earnings">
        <div class="faq-q">
            <span>How much commission do I earn per task?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Your commission rate depends on your membership level and the type of task:<br><br>
                • <strong>Normal Tasks:</strong> Silver 0.70% · Gold 0.80% · Platinum 1%<br>
                • <strong>Selected Tasks:</strong> Fixed 10% for all membership levels<br><br>
                Example: A normal task worth $500 on Gold membership earns $4.00. A selected task worth $2,000 earns $200.00 regardless of your level.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="earnings">
        <div class="faq-q">
            <span>What is the 10% fixed commission on Selected tasks?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Selected tasks are high-value assignments that carry a guaranteed 10% commission on the full task value. This rate is fixed and doesn't change based on your membership level. For example, a selected task with a value of $5,000 earns exactly $500 in commission. Selected tasks are limited in number and assigned individually.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="earnings">
        <div class="faq-q">
            <span>How does the referral system work?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                You get a unique referral link when you register. Anyone who signs up through it and starts completing tasks earns you a cut of their commissions automatically, with nothing extra required from you. That money lands in your wallet balance and you can withdraw it whenever you like. Your exact referral rate is shown on your referrals dashboard.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="earnings">
        <div class="faq-q">
            <span>When do my earnings get credited?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Normal task commissions are typically credited to your wallet within minutes of task completion. Selected task commissions may take up to a few hours to reflect as the system verifies the submission. Referral commissions are credited automatically whenever your referral earns a commission. You can track all credits in real time in your History section.
            </div>
        </div>
    </div>

    {{-- Payments --}}
    <div class="faq-item" data-cat="payments">
        <div class="faq-q">
            <span>What is the minimum withdrawal amount?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                The minimum withdrawal amount is <strong style="color:var(--text);">$20 USD</strong> for all payment methods. There's no maximum on how much you can withdraw.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="payments">
        <div class="faq-q">
            <span>Which payment methods are supported?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                You can use any of these for both adding funds and withdrawing:<br><br>
                <strong>ACH (Bank Transfer):</strong> 1–3 business days<br>
                <strong>Zelle:</strong> instant<br>
                <strong>Venmo:</strong> instant<br>
                <strong>PayPal:</strong> instant<br>
                <strong>Debit / Credit Card:</strong> instant
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="payments">
        <div class="faq-q">
            <span>How long do withdrawals take to process?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Most withdrawals are processed within <strong style="color:var(--text);">24 hours</strong> of submission on business days. Zelle, Venmo, PayPal, and card withdrawals are typically faster. ACH bank transfers may take slightly longer to fully settle. Withdrawals submitted after 6 PM ET may be processed on the next business day.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="payments">
        <div class="faq-q">
            <span>What are the withdrawal fees?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                There are no withdrawal fees on any supported payment method. The full amount you request is the amount you receive, as shown in the fee breakdown on the Withdrawal page.
            </div>
        </div>
    </div>

    {{-- Tasks --}}
    <div class="faq-item" data-cat="tasks">
        <div class="faq-q">
            <span>How many tasks can I complete per day?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                It depends on your membership level:<br><br>
                <strong>Silver:</strong> 35 tasks a day at a 0.70% commission rate<br>
                <strong>Gold:</strong> 45 tasks a day at a 0.80% commission rate<br>
                <strong>Platinum:</strong> 50 tasks a day at a 1% commission rate<br><br>
                Limits reset at midnight PKT every day.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="tasks">
        <div class="faq-q">
            <span>What happens if I submit a wrong task?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Task submissions are reviewed by our system automatically. If a task submission does not meet quality standards or contains errors, it may be marked as Failed, and the commission won't be credited. Repeated intentional incorrect submissions may result in account warnings or suspension. If you believe a task was incorrectly marked as failed, contact our support team with the task ID.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="tasks">
        <div class="faq-q">
            <span>What does "On Hold" task status mean?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                "On Hold" means your task submission is undergoing additional verification before the commission is credited. This is normal for high-value selected tasks and is not a cause for concern in most cases. On Hold tasks are typically reviewed within 12–48 hours. If your task remains on hold for longer than 3 days, please contact our support team for assistance.
            </div>
        </div>
    </div>

    {{-- Account --}}
    <div class="faq-item" data-cat="account">
        <div class="faq-q">
            <span>How do I upgrade my membership?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                You can upgrade your membership at any time from the Membership section of your dashboard. Payment for membership upgrades can be made using any supported recharge method (ACH, Zelle, Venmo, PayPal, or card). Membership is activated immediately after payment is verified. Upgrades are non-refundable.
            </div>
        </div>
    </div>

    <div class="faq-item" data-cat="account">
        <div class="faq-q">
            <span>Is my account and money secure?</span>
            <span class="faq-chevron">+</span>
        </div>
        <div class="faq-a">
            <div class="faq-a-inner">
                Yes. All sensitive data is encrypted and stored securely. Withdrawal requests require account verification, and we use a 6-digit security PIN as an additional layer of protection for all withdrawal transactions. We recommend enabling a strong, unique password and never sharing your credentials with anyone. If you suspect unauthorized access to your account, contact support immediately.
            </div>
        </div>
    </div>

</div>

{{-- STILL HAVE QUESTIONS --}}
<div class="card" style="margin-top:24px;text-align:center;">
    <div class="card-body" style="padding:32px;">
        <h3 style="font-size:18px;font-weight:700;color:var(--text);margin:0 0 8px;">Still Have Questions?</h3>
        <p style="font-size:13.5px;color:var(--text-muted);margin:0 0 20px;">Our support team is available 24/7 to help you.</p>
        <a href="{{ route('user.support') }}" class="btn btn-primary" style="display:inline-flex;align-items:center;justify-content:center;gap:8px;">Open a Support Ticket</a>
    </div>
</div>

@endsection
