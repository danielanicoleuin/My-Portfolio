/* Education timeline: the gold line fills as you scroll and each marker glows once the line reaches it. */
(function () {
    'use strict';

    var timeline = document.getElementById('timeline');
    if (!timeline) { return; }

    var markers = Array.prototype.slice.call(timeline.querySelectorAll('.timeline__marker'));
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var ticking = false;

    function update() {
        ticking = false;
        var rect = timeline.getBoundingClientRect();
        var progress = reduceMotion ? 1 : Math.min(1, Math.max(0, (window.innerHeight * 0.65 - rect.top) / rect.height));
        var fillY = rect.top + progress * rect.height;

        timeline.style.setProperty('--timeline-progress', progress.toFixed(4));
        markers.forEach(function (marker) {
            var r = marker.getBoundingClientRect();
            marker.classList.toggle('is-active', reduceMotion || r.top + r.height / 2 <= fillY + 1);
        });
    }

    function requestUpdate() {
        if (!ticking) { ticking = true; window.requestAnimationFrame(update); }
    }

    window.addEventListener('scroll', requestUpdate, { passive: true });
    window.addEventListener('resize', requestUpdate);
    update();
})();
