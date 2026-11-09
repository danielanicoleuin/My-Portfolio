/* Log Pose: the compass needle in the navbar swings toward the section being read. */
(function () {
    'use strict';

    var pose = document.getElementById('log-pose');
    var menu = document.getElementById('nav-menu');
    if (!pose || !menu) { return; }

    var needle = pose.querySelector('[data-log-pose-needle]');
    var label = pose.querySelector('[data-log-pose-label]');
    if (!needle) { return; }

    var items = Array.prototype.map.call(menu.querySelectorAll('[data-nav-link]'), function (a) {
        return { label: a.textContent.trim(), el: document.getElementById(a.getAttribute('data-nav-link')) };
    }).filter(function (item) { return item.el; });
    if (items.length < 2) { return; }

    var MIN_ANGLE = -75;
    var MAX_ANGLE = 75;
    var current = -1;
    var queued = false;

    function angleFor(index) {
        return MIN_ANGLE + (MAX_ANGLE - MIN_ANGLE) * (index / (items.length - 1));
    }

    function update() {
        queued = false;

        var line = window.innerHeight * 0.45;
        var index = 0;
        items.forEach(function (item, i) {
            if (item.el.getBoundingClientRect().top <= line) { index = i; }
        });

        var atBottom = window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 2;
        if (atBottom) { index = items.length - 1; }

        var angle = angleFor(index);
        if (!atBottom && index < items.length - 1) {
            var top = items[index].el.getBoundingClientRect().top;
            var nextTop = items[index + 1].el.getBoundingClientRect().top;
            var span = nextTop - top;
            var progress = span > 0 ? Math.min(1, Math.max(0, (line - top) / span)) : 0;
            angle += (angleFor(index + 1) - angleFor(index)) * progress;
        }
        needle.style.transform = 'rotate(' + angle.toFixed(1) + 'deg)';

        if (index !== current) {
            current = index;
            if (label) { label.textContent = items[index].label; }
            pose.setAttribute('aria-label', 'Log Pose pointing to ' + items[index].label);
        }
    }

    function queue() {
        if (!queued) { queued = true; window.requestAnimationFrame(update); }
    }

    window.addEventListener('scroll', queue, { passive: true });
    window.addEventListener('resize', queue);
    window.addEventListener('load', queue);
    update();
})();
