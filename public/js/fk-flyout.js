'use strict';
// Position the L1 flyout panel below the hovered category tile
// and apply Flipkart-style active (blue underline) on click
document.addEventListener('DOMContentLoaded', function () {

    var allWraps = document.querySelectorAll('.flipkart-cat-item-wrap');

    // ── Hide all L1 flyouts on scroll so they don't drift ──
    window.addEventListener('scroll', function () {
        allWraps.forEach(function (wrap) {
            var panel = wrap.querySelector('.fk-flyout-l1');
            if (panel) {
                panel.style.display = 'none';
            }
        });
    }, { passive: true });

    allWraps.forEach(function (wrap) {
        var panel = wrap.querySelector('.fk-flyout-l1');

        // ── Reposition flyout on every mousemove over the wrap ──
        if (panel) {
            wrap.addEventListener('mousemove', function () {
                var rect = wrap.getBoundingClientRect();
                panel.style.top  = rect.bottom + 'px';
                panel.style.left = rect.left + 'px';
                panel.style.display = 'block';
            });

            wrap.addEventListener('mouseleave', function () {
                panel.style.display = 'none';
            });

            // Keep panel open when mouse is inside the panel itself
            panel.addEventListener('mouseenter', function () {
                var rect = wrap.getBoundingClientRect();
                panel.style.top  = rect.bottom + 'px';
                panel.style.left = rect.left + 'px';
                panel.style.display = 'block';
            });
        }

        // ── Active blue highlight on click ──
        var tile = wrap.querySelector('.flipkart-cat-item');
        if (tile) {
            tile.addEventListener('click', function (e) {
                // Remove active from all tiles first
                allWraps.forEach(function (w) {
                    var t = w.querySelector('.flipkart-cat-item');
                    if (t) t.classList.remove('fk-active');
                });
                // Add active to clicked tile
                tile.classList.add('fk-active');
            });
        }
    });

    // ── Mark current category as active on page load ──
    var currentPath = window.location.pathname + window.location.search;
    allWraps.forEach(function (wrap) {
        var link = wrap.querySelector('a.flipkart-cat-item');
        if (link) {
            var href = link.getAttribute('href') || '';
            // Match if the current URL contains this category's href path
            try {
                var linkPath = new URL(href, window.location.origin).pathname + new URL(href, window.location.origin).search;
                if (currentPath === linkPath || (linkPath !== '/' && currentPath.startsWith(linkPath))) {
                    link.classList.add('fk-active');
                }
            } catch (err) {}
        }
    });
});
