/* Pause the heavy decorative animations while the hero is off-screen (saves battery and CPU). */
(function () {
    'use strict';

    var hero = document.getElementById('home');
    if (!hero || !('IntersectionObserver' in window)) { return; }

    new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            hero.classList.toggle('is-offscreen', !entry.isIntersecting);
        });
    }, { threshold: 0 }).observe(hero);
})();
