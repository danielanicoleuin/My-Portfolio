/*
 * Rotating professional titles with Typed.js.
 * It also dispatches events the ship helm listens to (added in Step 3):
 *   typing:start  - a title begins to be typed
 *   typing:done   - a full title is on screen (pause)
 *   typing:erase  - the title starts to be deleted
 */
(function () {
    'use strict';

    var el = document.getElementById('typed-title');
    if (!el) { return; }

    var titles;
    try { titles = JSON.parse(el.getAttribute('data-titles') || '[]'); } catch (e) { titles = []; }
    if (!titles.length) { return; }

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduceMotion || typeof Typed === 'undefined') {
        el.textContent = titles[0]; // static fallback (no animation, or Typed.js failed to load)
        return;
    }

    var BACK_DELAY = 1800;
    function emit(name, index) {
        document.dispatchEvent(new CustomEvent(name, { detail: { index: index } }));
    }

    el.textContent = '';
    new Typed(el, {
        strings: titles,
        typeSpeed: 70,
        backSpeed: 40,
        startDelay: 600,
        backDelay: BACK_DELAY,
        loop: true,
        smartBackspace: false,
        showCursor: true,
        cursorChar: '', // the cursor is drawn as a tiny ship's wheel in CSS (.typed-cursor)
        preStringTyped: function (index) { emit('typing:start', index); },
        onStringTyped: function (index) {
            emit('typing:done', index);
            setTimeout(function () { emit('typing:erase', index); }, BACK_DELAY);
        }
    });
})();
