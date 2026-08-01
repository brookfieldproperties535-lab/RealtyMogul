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

        /* ── Lift the Chatway launcher above the mobile bottom-nav ──
           The widget loads async and gives its element no predictable
           id/class, so we locate it structurally: a fixed-positioned
           element pinned to the bottom-right corner that isn't one of
           our own UI pieces. Then we offset it on mobile. */
        var LIFT = 82;          // px above the bar
        var OURS = '.mobile-nav, .notif-popup, .flash-stack, .toast-stack';

        function findCornerWidget() {
            // Try obvious Chatway hooks first
            var known = document.querySelector('iframe[src*="chatway"], div[id*="chatway" i]:not(#chatway), div[class*="chatway" i]');
            if (known) {
                var node = known;
                for (var k = 0; k < 4 && node; k++) {
                    if (getComputedStyle(node).position === 'fixed') return node;
                    node = node.parentElement;
                }
                return known;
            }
            // Heuristic: any fixed element hugging the bottom-right that isn't ours
            var all = document.body ? document.body.getElementsByTagName('*') : [];
            for (var i = 0; i < all.length; i++) {
                var el = all[i];
                if (el.closest && el.closest(OURS)) continue;
                if (getComputedStyle(el).position !== 'fixed') continue;
                var r = el.getBoundingClientRect();
                if (r.width < 30 || r.width > 440 || r.height < 30) continue;
                if ((window.innerHeight - r.bottom) < 150 && (window.innerWidth - r.right) < 150) {
                    return el;
                }
            }
            return null;
        }

        var widget = null;
        function positionChatway() {
            if (!widget || !document.body.contains(widget)) widget = findCornerWidget();
            if (!widget) return false;
            widget.style.setProperty('transition', 'bottom 0.2s ease');
            if (window.matchMedia('(max-width: 900px)').matches) {
                widget.style.setProperty('bottom', LIFT + 'px', 'important');
            } else {
                widget.style.removeProperty('bottom');
            }
            return true;
        }

        var cwTries = 0;
        var cwTimer = setInterval(function () {
            positionChatway();
            if (++cwTries > 40) clearInterval(cwTimer);   // stop polling after ~20s
        }, 500);
        window.addEventListener('resize', positionChatway);
    });
})();
