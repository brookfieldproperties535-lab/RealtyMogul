/* ============================================================
   REALTYMOGUL — auth.js
   Show / hide password toggles for the login & register cards.
   Each toggle carries data-target="<inputId>". No inline JS.
   ============================================================ */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
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
    });
})();
