@extends('layouts.user')

@section('title', 'Support')
@section('page-title', 'Support')

@section('content')

<div style="min-height:100vh;padding:40px 20px;text-align:center;">

    <!-- Subheading Section -->
    <div style="margin-bottom:12px;">
        <h2 style="font-size:18px;color:var(--text-muted);font-weight:500;text-transform:uppercase;letter-spacing:0.05em;">Reach Out to Us</h2>
    </div>

    <!-- Main Heading Section -->
    <div style="margin-bottom:32px;">
        <h1 style="font-size:48px;font-weight:800;color:var(--text);margin:0;line-height:1.2;">Trusted Real Estate Investment Support</h1>
    </div>

    <!-- Session Messages -->
    @if (session('blc_message'))
        <div style="background:rgba(0,200,150,0.1);border:1px solid rgba(0,200,150,0.3);border-radius:var(--radius-sm);padding:14px 18px;margin-bottom:32px;font-size:13.5px;color:var(--success);display:inline-block;">
            {{ session('blc_message') }}
        </div>
    @endif

    <!-- Service Banner Image Section -->
    <div style="margin-bottom:40px;">
        <div style="width:100%;max-width:600px;margin:0 auto;background:linear-gradient(135deg,var(--primary),var(--accent));border-radius:var(--radius);padding:40px;color:#fff;box-shadow:0 8px 24px rgba(108,71,255,0.15);">
            <div style="font-size:48px;margin-bottom:16px;">🏢</div>
            <h3 style="font-size:20px;font-weight:700;margin:0 0 12px 0;">Expert Real Estate Guidance</h3>
            <p style="font-size:14px;opacity:0.9;margin:0;">Your success in property investment is our priority</p>
        </div>
    </div>

    <!-- Support Description Section -->
    <div style="max-width:700px;margin:0 auto 40px;padding:28px;background:var(--card);border:1px solid var(--border);border-radius:var(--radius);text-align:left;">
        <p style="font-size:15px;color:var(--text);line-height:1.7;margin:0 0 16px 0;">
            Welcome to RealtyMogul's dedicated support center. Our expert team is committed to helping you maximize your real estate investment returns with confidence and clarity.
        </p>
        <p style="font-size:15px;color:var(--text);line-height:1.7;margin:0 0 16px 0;">
            Whether you have questions about fund opportunities, investment strategies, withdrawal processes, or account management, our professional consultants are here to provide prompt and comprehensive assistance.
        </p>
        <p style="font-size:15px;color:var(--text);line-height:1.7;margin:0;">
            <strong style="color:var(--primary);">Support Hours:</strong> Available 24/7 to serve your needs
        </p>
    </div>

    <!-- Contact Options Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;max-width:700px;margin:0 auto 40px;padding:0 20px;">
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);padding:20px;text-align:center;">
            <div style="font-size:32px;margin-bottom:12px;">📧</div>
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">Email</div>
            <div style="font-size:13px;font-weight:600;color:var(--text);word-break:break-all;">support@realtymogul.app</div>
        </div>
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);padding:20px;text-align:center;">
            <div style="font-size:32px;margin-bottom:12px;">💬</div>
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">Live Chat</div>
            <div style="font-size:13px;font-weight:600;color:var(--primary);">Instant Response</div>
        </div>
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);padding:20px;text-align:center;">
            <div style="font-size:32px;margin-bottom:12px;">🕐</div>
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">Response Time</div>
            <div style="font-size:13px;font-weight:600;color:var(--success);">Within 2 Hours</div>
        </div>
    </div>

    <!-- Live Chat Button Section -->
    <div style="max-width:400px;margin:0 auto;">
        <button class="btn btn-primary" onclick="openLiveChat()" style="width:100%;padding:14px 24px;font-size:16px;font-weight:600;justify-content:center;display:flex;align-items:center;gap:8px;">
            💬 Start Live Chat Now
        </button>
        <p style="font-size:12px;color:var(--text-muted);margin-top:16px;">Chat with our team instantly for quick answers to your questions</p>
    </div>

</div>

<!-- JavaScript to Open LiveChat -->
<script>
    function openLiveChat() {
        if (window.LC_API) {
            window.LC_API.open_chat_window();
        } else {
            alert('Chat service is currently unavailable. Please email support@realtymogul.app');
        }
    }
</script>

@endsection
