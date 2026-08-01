/* ============================================================
   REALTYMOGUL — notifications.js
   Cycling activity popups for the dashboard (replaces the
   marquee). One toast at a time, bottom-left; it animates in,
   waits, then the next one appears. Hover to pause. All static
   promo content lives here so the Blade view stays inline-free.
   ============================================================ */
(function () {
    'use strict';

    var VISIBLE = 4500;   // ms a card stays on screen
    var GAP = 5000;       // ms between one leaving and the next arriving

    // type -> icon + colour class handled in notifications.css (.t-<type>)
    var ITEMS = [
        { type: 'earn',      icon: '💰', heading: 'Commission earned',   message: 'Jake M. just earned <strong>$18.75</strong> in commission.' },
        { type: 'task',      icon: '🚀', heading: 'New selected task',    message: 'Premium Real Estate Review is now available.' },
        { type: 'withdraw',  icon: '📤', heading: 'Withdrawal completed', message: 'Sarah L. withdrew <strong>$120.00</strong> successfully.' },
        { type: 'milestone', icon: '🏆', heading: 'Top earner today',     message: 'Tyler B. leads the board with <strong>$312.00</strong>.' },
        { type: 'referral',  icon: '🔗', heading: 'Referral commission',  message: 'Emma R. earned <strong>$74.50</strong> from a referral.' },
        { type: 'task',      icon: '💎', heading: 'Tasks completed',      message: 'Chris D. finished <strong>30 tasks</strong> today.' },
        { type: 'withdraw',  icon: '🏦', heading: 'Bank transfer',        message: 'Marcus T. withdrew <strong>$200.00</strong> via bank transfer.' },
        { type: 'deposit',   icon: '📥', heading: 'Account recharged',    message: 'Robert H. deposited <strong>$6,000.00</strong> via ACH.' },
        { type: 'earn',      icon: '💎', heading: 'Big win',              message: 'David M. completed an <strong>$8,000</strong> selected task.' },
        { type: 'withdraw',  icon: '⚡', heading: 'Large withdrawal',     message: 'Michael B. withdrew <strong>$9,500.00</strong> via Zelle.' },
        { type: 'milestone', icon: '🏆', heading: 'Weekly top earner',    message: 'Alexander P. earned <strong>$12,400.00</strong> this week.' },
        { type: 'deposit',   icon: '⭐', heading: 'Membership upgrade',   message: 'Jennifer L. deposited <strong>$7,500.00</strong> for Platinum.' },
        { type: 'referral',  icon: '👥', heading: 'New members joined',   message: 'Olivia P. referred <strong>8 new members</strong> this week.' },
        { type: 'earn',      icon: '💰', heading: 'Selected task payout',  message: 'William T. earned <strong>$820.00</strong> on a selected task.' },
        { type: 'withdraw',  icon: '📤', heading: 'Withdrawal completed', message: 'Sophia R. withdrew <strong>$6,750.00</strong> via ACH.' },
        { type: 'task',      icon: '🎁', heading: 'Bonus tasks unlocked',  message: 'Silver members unlocked <strong>2 bonus tasks</strong> this weekend.' }
    ];

    function shuffle(a) {
        for (var i = a.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var t = a[i]; a[i] = a[j]; a[j] = t;
        }
        return a;
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (!ITEMS.length) return;

        var host = document.createElement('div');
        host.className = 'notif-popup';
        document.body.appendChild(host);

        var queue = shuffle(ITEMS.slice());
        var idx = 0;
        var card = null;
        var timer = null;
        var startedAt = 0;
        var remaining = VISIBLE;

        function schedule(ms) {
            startedAt = Date.now();
            remaining = ms;
            timer = setTimeout(function () { hide(); }, ms);
        }

        function showNext() {
            var item = queue[idx];
            idx++;
            if (idx >= queue.length) { idx = 0; queue = shuffle(ITEMS.slice()); }

            card = document.createElement('div');
            card.className = 'notif-card t-' + item.type;
            card.style.setProperty('--notif-duration', VISIBLE + 'ms');
            card.innerHTML =
                '<div class="notif-icon">' + item.icon + '</div>' +
                '<div class="notif-body">' +
                    '<div class="notif-heading"></div>' +
                    '<div class="notif-message"></div>' +
                '</div>' +
                '<button type="button" class="notif-close" aria-label="Dismiss">×</button>' +
                '<div class="notif-progress"></div>';
            card.querySelector('.notif-heading').textContent = item.heading;
            card.querySelector('.notif-message').innerHTML = item.message; // static, author-controlled
            host.appendChild(card);

            // enter on the next frame so the transition runs
            requestAnimationFrame(function () {
                requestAnimationFrame(function () { if (card) card.classList.add('show'); });
            });

            card.querySelector('.notif-close').addEventListener('click', hide);
            card.addEventListener('mouseenter', pause);
            card.addEventListener('mouseleave', resume);

            schedule(VISIBLE);
        }

        function pause() {
            if (!card) return;
            clearTimeout(timer);
            remaining -= (Date.now() - startedAt);
            var bar = card.querySelector('.notif-progress');
            if (bar) bar.style.animationPlayState = 'paused';
        }

        function resume() {
            if (!card) return;
            var bar = card.querySelector('.notif-progress');
            if (bar) bar.style.animationPlayState = 'running';
            schedule(Math.max(600, remaining));
        }

        function hide() {
            clearTimeout(timer);
            var leaving = card;
            card = null;
            if (!leaving) return;
            leaving.classList.remove('show');
            setTimeout(function () {
                if (leaving.parentNode) leaving.parentNode.removeChild(leaving);
                setTimeout(showNext, GAP);
            }, 350);
        }

        showNext();
    });
})();
