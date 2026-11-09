/* Contact form: stops double submissions and focuses the first problem after a failed attempt. */
(function () {
    'use strict';

    var form = document.getElementById('contact-form');
    var button = document.getElementById('contact-submit');
    if (!form || !button) { return; }

    var label = button.querySelector('span');
    var original = label ? label.textContent : '';

    function reset() {
        button.disabled = false;
        button.removeAttribute('aria-busy');
        if (label) { label.textContent = original; }
    }

    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) { return; } // the browser shows its own messages
        if (button.disabled) { event.preventDefault(); return; }
        button.disabled = true;
        button.setAttribute('aria-busy', 'true');
        if (label) { label.textContent = 'Sending...'; }
    });

    // Coming back with the browser's Back button should not leave the button stuck.
    window.addEventListener('pageshow', reset);

    var firstInvalid = form.querySelector('[aria-invalid="true"]');
    if (firstInvalid) { firstInvalid.focus({ preventScroll: true }); }
})();
