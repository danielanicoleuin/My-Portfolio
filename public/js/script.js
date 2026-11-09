/* Core behaviour: scroll reveal. Other features live in their own files (added in later steps). */
(function () {
    'use strict';

    document.documentElement.classList.add('js');

    var items = document.querySelectorAll('[data-reveal], [data-unfold]');
    if (!('IntersectionObserver' in window)) {
        items.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    items.forEach(function (el) { observer.observe(el); });
})();
