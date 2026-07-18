{{-- Chatway live-chat widget — renders on every user-facing page when configured
     (widget ID comes from config/services.php, default baked in, overridable via .env). --}}
@if (config('services.chatway.widget_id'))
    <script id="chatway" async
            src="https://cdn.chatway.app/widget.js?id={{ config('services.chatway.widget_id') }}"></script>
@endif
