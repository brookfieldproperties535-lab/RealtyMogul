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
                RealtyMogul is a task-based earning platform where registered members complete data optimization tasks — rating and reviewing products, services, and locations online. Each completed task earns you a commission. Normal tasks earn a percentage of the task value based on your membership level, while Selected tasks earn a fixed 10% commission. You can withdraw your earnings via JazzCash, EasyPaisa, bank transfer, USDT, or Binance Pay.
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
                Registration is completely free. Simply click the Register button, fill in your name, email, phone number, and password. You'll start on the free Bronze membership which gives you access to 10 normal tasks per day. To unlock more tasks and higher commissions, you can upgrade your membership at any time from the Membership section.
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
                <strong style="color:var(--text);">Normal Tasks</strong> are standard tasks available to all members. Your commission rate depends on your membership level — Bronze: 0.5%, Silver: 0.7%, Gold: 0.9%, Diamond: 1.2% of the task value.<br><br>
                <strong style="color:var(--warning);">⭐ Selected Tasks</strong> are premium tasks assigned to members based on their membership level. They carry a <strong>fixed 10% commission</strong> regardless of membership tier — making them significantly more valuable. Gold members get 5 selected tasks per day; Silver gets 3; Diamond gets unlimited.
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
                • <strong>Normal Tasks:</strong> Bronze 0.5% · Silver 0.7% · Gold 0.9% · Diamond 1.2%<br>
                • <strong>Selected Tasks:</strong> Fixed 10% for all membership levels<br><br>
                Example: A normal task worth $500 on Gold membership earns $4.50. A selected task worth $2,000 earns $200.00 regardless of your level.
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
                Selected tasks are high-value assignments that carry a guaranteed 10% commission on the full task value. This rate is fixed — it does not vary based on your membership level. For example, a selected task with a value of $5,000 earns exactly $500 in commission. Selected tasks are limited in number and assigned daily based on your membership tier.
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
                Each registered member receives a unique referral link. When someone registers using your link and starts completing tasks, you earn a percentage of every commission they receive — passively and automatically. Your referral earnings are credited to your wallet balance and can be withdrawn at any time. The referral bonus rate varies and is shown in your referrals dashboard.
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
                The minimum withdrawal amount is <strong style="color:var(--text);">$20 USD</strong> for all payment methods except Bank Transfer, which requires a minimum of $50. There is no maximum daily withdrawal limit for Gold and Diamond members, though individual transactions are capped at $2,000 for security purposes.
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
                We support the following payment methods for both recharge and withdrawal:<br><br>
                📱 <strong>JazzCash</strong> — Instant processing<br>
                💚 <strong>EasyPaisa</strong> — Instant processing<br>
                🏦 <strong>Bank Transfer</strong> (HBL, MCB, UBL, Meezan, and others) — 1–3 business days<br>
                💎 <strong>USDT TRC20</strong> — ~10 minutes<br>
                🟡 <strong>Binance Pay</strong> — Instant<br>
                🏛️ <strong>HBL Direct</strong> — 1–2 business days
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
                Most withdrawals are processed within <strong style="color:var(--text);">24 hours</strong> of submission on business days. JazzCash, EasyPaisa, and Binance Pay are typically faster. Bank transfers and USDT may take slightly longer depending on network conditions. Withdrawals submitted after 6 PM PKT may be processed on the next business day.
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
                Withdrawal fees are as follows:<br><br>
                • JazzCash &amp; EasyPaisa: <strong style="color:var(--warning);">2%</strong> of withdrawal amount<br>
                • Bank Transfer: <strong style="color:var(--warning);">2%</strong> of withdrawal amount<br>
                • USDT TRC20: <strong style="color:var(--warning);">1%</strong> of withdrawal amount<br>
                • Binance Pay: <strong style="color:var(--warning);">1%</strong> of withdrawal amount<br><br>
                The fee is deducted from your withdrawal amount before processing. The net amount you receive is shown in the fee breakdown on the Withdrawal page.
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
                Your daily task limit is determined by your membership level:<br><br>
                🥉 <strong>Bronze (Free):</strong> 10 normal tasks/day · No selected tasks<br>
                🥈 <strong>Silver ($20):</strong> 20 normal tasks/day · 3 selected tasks/day<br>
                🥇 <strong>Gold ($49):</strong> 30 normal tasks/day · 5 selected tasks/day<br>
                💎 <strong>Diamond ($149):</strong> Unlimited normal tasks · Unlimited selected tasks<br><br>
                Task limits reset at midnight PKT every day.
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
                Task submissions are reviewed by our system automatically. If a task submission does not meet quality standards or contains errors, it may be marked as Failed — and the commission will not be credited. Repeated intentional incorrect submissions may result in account warnings or suspension. If you believe a task was incorrectly marked as failed, contact our support team with the task ID.
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
                You can upgrade your membership at any time from the Membership section of your dashboard. Payment for membership upgrades can be made using any supported recharge method (JazzCash, EasyPaisa, Bank Transfer, USDT, Binance Pay). Membership is activated immediately after payment is verified. Upgrades are non-refundable.
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
        <div style="font-size:32px;margin-bottom:12px;">🤔</div>
        <h3 style="font-size:18px;font-weight:700;color:var(--text);margin:0 0 8px;">Still Have Questions?</h3>
        <p style="font-size:13.5px;color:var(--text-muted);margin:0 0 20px;">Our support team is available 24/7 to help you.</p>
        <a href="{{ route('user.support') }}" class="btn btn-primary" style="display:inline-flex;align-items:center;justify-content:center;gap:8px;">🎧 Open a Support Ticket</a>
    </div>
</div>

@endsection
