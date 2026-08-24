/* ============================================================
   REALTYMOGUL — user-app.js
   Behaviour for the authenticated app shell (layouts/user).
   Replaces the inline <script> and inline event handlers that
   used to live in the Blade layout. No inline JS in the views.
   ============================================================ */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        /* ── Sidebar drawer (mobile) ─────────────────────────── */
        var hamburger = document.getElementById('hamburgerBtn');
        var sidebar = document.getElementById('sidebar');
        var overlay = document.getElementById('sidebarOverlay');

        if (hamburger && sidebar) {
            hamburger.addEventListener('click', function () {
                sidebar.classList.toggle('sidebar-open');
                if (overlay) overlay.classList.toggle('active');
            });
        }
        if (overlay) {
            overlay.addEventListener('click', function () {
                if (sidebar) sidebar.classList.remove('sidebar-open');
                overlay.classList.remove('active');
            });
        }

        /* ── Topbar user dropdown (toggle .open, close on outside) ─ */
        var userMenuBtn = document.getElementById('userMenuBtn');
        var userDropdown = document.getElementById('userDropdown');

        if (userMenuBtn && userDropdown) {
            userMenuBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                userDropdown.classList.toggle('open');
            });
            userDropdown.addEventListener('click', function (e) { e.stopPropagation(); });
            document.addEventListener('click', function () {
                userDropdown.classList.remove('open');
            });
        }

        /* ── Flash toasts: auto-dismiss + close button ───────── */
        var flashStack = document.getElementById('flashStack');
        if (flashStack) {
            var toasts = flashStack.querySelectorAll('.flash-toast');
            toasts.forEach(function (el, i) {
                setTimeout(function () {
                    el.classList.add('out');
                    setTimeout(function () { el.remove(); }, 400);
                }, 5000 + i * 300);
            });
            // Close on × — event delegation, no inline onclick
            flashStack.addEventListener('click', function (e) {
                var btn = e.target.closest('.flash-close');
                if (!btn) return;
                var toast = btn.closest('.flash-toast');
                if (toast) toast.remove();
            });
        }

        /* NOTE: the live-chat widget (LiveChat) manages its own position.
           We do NOT touch it from JS — an earlier heuristic that mutated a
           bottom-right fixed element broke the widget on app pages. Any
           mobile offset above the bottom-nav is handled in CSS only. */
    });
})();
