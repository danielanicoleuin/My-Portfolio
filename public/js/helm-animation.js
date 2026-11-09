/*
 * Ship helm animation, synchronised with the Typed.js titles (see typing.js events).
 *   typing:start -> the wheel turns gently one way while the title is typed
 *   typing:done  -> the wheel rests while the full title is on screen
 *   typing:erase -> the wheel turns back the other way while the title is deleted
 * Each type+erase cycle ends where it began, so the wheel never drifts.
 */
(function () {
    'use strict';

    var helm = document.getElementById('helm');
    var typed = document.getElementById('typed-title');
    if (!helm || !typed) { return; }
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) { return; }

    var titles;
    try { titles = JSON.parse(typed.getAttribute('data-titles') || '[]'); } catch (e) { titles = []; }

    var STEP = 60;          // degrees turned per title: gentle, not excessive
    var TYPE_MS = 70;       // must match typeSpeed in typing.js
    var ERASE_MS = 40;      // must match backSpeed in typing.js
    var angle = 0;

    function turn(delta, ms) {
        angle += delta;
        helm.style.setProperty('--helm-duration', Math.max(ms, 600) + 'ms');
        helm.style.setProperty('--helm-rotation', angle + 'deg');
        // The small wheel used as the typing cursor turns with it.
        var root = document.documentElement.style;
        root.setProperty('--cursor-duration', Math.max(ms, 600) + 'ms');
        root.setProperty('--cursor-rotation', angle * 2 + 'deg');
    }

    function lengthOf(e) {
        var i = e && e.detail ? e.detail.index : 0;
        return (titles[i] || '').length || 12;
    }

    document.addEventListener('typing:start', function (e) { turn(STEP, lengthOf(e) * TYPE_MS); });
    document.addEventListener('typing:erase', function (e) { turn(-STEP, lengthOf(e) * ERASE_MS); });
})();
