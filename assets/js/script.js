/**
 * script.js — Optional interface helpers
 * Handles: sidebar toggle, mobile overlay, active-link detection
 */

(function () {
    'use strict';

    /* -------------------------------------------------------
       1. Sidebar mobile toggle
    ------------------------------------------------------- */
    const sidebar       = document.getElementById('sidebar');
    const menuToggle    = document.getElementById('menuToggle');
    const overlay       = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('visible');
        menuToggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('visible');
        menuToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
        });
    }

    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    /* Close sidebar on ESC */
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeSidebar();
    });

    /* -------------------------------------------------------
       2. Smooth card entry animation on load
    ------------------------------------------------------- */
    const animatable = document.querySelectorAll('.card, .app-card, .stat-panel, .result-panel');

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        animatable.forEach(function (el) {
            el.style.animationPlayState = 'paused';
            observer.observe(el);
        });
    }

    /* -------------------------------------------------------
       3. Form input live validation feedback
    ------------------------------------------------------- */
    document.querySelectorAll('.form-input[required]').forEach(function (input) {
        input.addEventListener('blur', function () {
            if (!input.value.trim()) {
                input.classList.add('is-error');
            } else {
                input.classList.remove('is-error');
            }
        });

        input.addEventListener('input', function () {
            if (input.value.trim()) {
                input.classList.remove('is-error');
            }
        });
    });

    /* -------------------------------------------------------
       4. Age input — allow only numbers
    ------------------------------------------------------- */
    const ageInput = document.getElementById('age');
    if (ageInput) {
        ageInput.addEventListener('input', function () {
            /* Remove anything that is not a digit */
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    }

})();
