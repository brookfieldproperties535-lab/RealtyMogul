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
        <h1 style="font-size:48px;font-weight:800;color:var(--text);margin:0;line-height:1.2;">Need a Hand? We're Here to Help</h1>
    </div>

    <!-- Session Messages -->
    @if (session('blc_message'))
        <div style="background:rgba(0,200,150,0.1);border:1px solid rgba(0,200,150,0.3);border-radius:var(--radius-sm);padding:14px 18px;margin-bottom:32px;font-size:13.5px;color:var(--success);display:inline-block;">
            {{ session('blc_message') }}
        </div>
    @endif

    <!-- Support Description Section -->
    <div style="max-width:700px;margin:0 auto 40px;padding:28px;background:var(--card);border:1px solid var(--border);border-radius:var(--radius);text-align:left;">
        <p style="font-size:15px;color:var(--text);line-height:1.7;margin:0 0 16px 0;">
            Got a question about your account, an investment, or a withdrawal? Just reach out and a real person will get back to you.
        </p>
        <p style="font-size:15px;color:var(--text);line-height:1.7;margin:0 0 16px 0;">
            We can help with funding an investment, understanding your options, tracking a withdrawal, or sorting out anything on your account.
        </p>
        <p style="font-size:15px;color:var(--text);line-height:1.7;margin:0;">
            <strong style="color:var(--primary);">Support Hours:</strong> We're available around the clock, every day.
        </p>
    </div>

    <!-- Contact Options Grid -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;max-width:700px;margin:0 auto 40px;padding:0 20px;">
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);padding:20px;text-align:center;">
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">Email</div>
            <div style="font-size:13px;font-weight:600;color:var(--text);word-break:break-all;">support@realtymogul.live</div>
        </div>
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);padding:20px;text-align:center;">
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">Live Chat</div>
            <div style="font-size:13px;font-weight:600;color:var(--primary);">Instant Response</div>
        </div>
        <div style="background:var(--card);border:1px solid var(--border);border-radius:var(--radius-sm);padding:20px;text-align:center;">
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:0.05em;color:var(--text-muted);font-weight:600;margin-bottom:6px;">Response Time</div>
            <div style="font-size:13px;font-weight:600;color:var(--success);">Within 2 Hours</div>
        </div>
    </div>

    <!-- Live Chat Button Section -->
    <div style="max-width:400px;margin:0 auto;">
        <button class="btn btn-primary" onclick="openLiveChat()" style="width:100%;padding:14px 24px;font-size:16px;font-weight:600;justify-content:center;display:flex;align-items:center;gap:8px;">
            Start Live Chat Now
        </button>
        <p style="font-size:12px;color:var(--text-muted);margin-top:16px;">Chat with our team for a quick answer.</p>
    </div>

</div>

<!-- Open the Chatway live-chat widget when the button is clicked -->
<script>
    function openLiveChat() {
        // Preferred: Chatway's own programmatic open API (name can vary by plan).
        try {
            if (window.$chatway && typeof window.$chatway.openWidget === 'function') {
                window.$chatway.openWidget();
                return;
            }
            if (window.chatway && typeof window.chatway.open === 'function') {
                window.chatway.open();
                return;
            }
        } catch (e) { /* fall through to launcher click */ }

        // Fallback: click Chatway's floating launcher if it's on the page.
        var launcher = document.querySelector(
            '#chatway-launcher, .chatway-launcher, [id^="chatway"] button, iframe[title*="Chatway" i]'
        );
        if (launcher) {
            launcher.click();
            return;
        }

        // Last resort: widget not loaded (e.g. no widget ID configured yet).
        alert('Live chat is not available right now. Please email support@realtymogul.live');
    }
</script>

@endsection
