/* ============================================================
   REALTYMOGUL — auth.js
   Show / hide password toggles for the login & register cards.
   Each toggle carries data-target="<inputId>". No inline JS.
   ============================================================ */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        /* Password show / hide toggles */
        var toggles = document.querySelectorAll('.pw-toggle');
        toggles.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = document.getElementById(btn.getAttribute('data-target'));
                if (!input) return;
                var hidden = input.type === 'password';
                input.type = hidden ? 'text' : 'password';
                btn.textContent = hidden ? '🙈' : '👁';
            });
        });

        /* Forgot password: no self-service reset — show a note and open live chat */
        var forgot = document.getElementById('forgotPassword');
        var note = document.getElementById('forgotNote');
        if (forgot) {
            forgot.addEventListener('click', function (e) {
                e.preventDefault();
                if (note) note.hidden = false;
                // Open the LiveChat widget (calls queue until the widget finishes loading)
                if (window.LiveChatWidget && typeof window.LiveChatWidget.call === 'function') {
                    window.LiveChatWidget.call('maximize');
                }
            });
        }
    });
})();
