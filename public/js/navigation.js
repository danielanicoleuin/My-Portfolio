/* Navigation: mobile menu, scrolled state, active section tracking. */
(function () {
    'use strict';

    var nav = document.getElementById('site-nav');
    var toggle = document.getElementById('nav-toggle');
    var menu = document.getElementById('nav-menu');
    if (!nav || !toggle || !menu) { return; }

    var links = Array.prototype.slice.call(menu.querySelectorAll('[data-nav-link]'));

    /* ---- Mobile menu ---- */
    function setMenu(open) {
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        menu.classList.toggle('is-open', open);
    }
    toggle.addEventListener('click', function () {
        setMenu(toggle.getAttribute('aria-expanded') !== 'true');
    });
    links.forEach(function (a) { a.addEventListener('click', function () { setMenu(false); }); });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { setMenu(false); }
    });
    document.addEventListener('click', function (e) {
        if (!nav.contains(e.target)) { setMenu(false); }
    });
    window.addEventListener('resize', function () {
        if (window.innerWidth > 860) { setMenu(false); }
    });

    /* ---- Darker bar once the page is scrolled ---- */
    function onScroll() { nav.classList.toggle('is-scrolled', window.scrollY > 20); }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---- Active section ---- */
    function setActive(id) {
        links.forEach(function (a) {
            var active = a.getAttribute('data-nav-link') === id;
            a.classList.toggle('is-active', active);
            if (active) { a.setAttribute('aria-current', 'true'); } else { a.removeAttribute('aria-current'); }
        });
        document.dispatchEvent(new CustomEvent('section:change', { detail: { id: id } }));
    }

    var sections = links
        .map(function (a) { return document.getElementById(a.getAttribute('data-nav-link')); })
        .filter(Boolean);

    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { setActive(entry.target.id); }
            });
        }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });
        sections.forEach(function (s) { io.observe(s); });
    }
    setActive('home');
})();
