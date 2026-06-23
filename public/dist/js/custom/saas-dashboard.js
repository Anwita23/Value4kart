/**
 * SaaS dashboard (AX12) — shared analytics state + chart tooltip
 * Page must have [data-analytics-storage-key] (e.g. on .va-page) for widget visibility state.
 * Chart container #ax12-chart-hover-wrap may have data-day-label for "Day" translation.
 */
(function() {
    'use strict';
    var keyEl = document.querySelector('[data-analytics-storage-key]');
    var key = (keyEl && keyEl.getAttribute('data-analytics-storage-key')) || 'vendor_analytics_12_state';
    function loadState() {
        try {
            var raw = localStorage.getItem(key);
            return raw ? JSON.parse(raw) : null;
        } catch (e) { return null; }
    }
    function saveState(state) {
        try {
            localStorage.setItem(key, JSON.stringify(state));
        } catch (e) {}
    }
    function applyState(state) {
        if (!state || !state.hidden) return;
        state.hidden.forEach(function(id) {
            var el = document.getElementById(id);
            if (el) el.style.display = 'none';
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        applyState(loadState());
        document.querySelectorAll('[data-analytics-widget]').forEach(function(widget) {
            var id = widget.id;
            if (!id) return;
            var btn = widget.querySelector('[data-analytics-toggle]');
            if (btn) {
                btn.addEventListener('click', function() {
                    var state = loadState() || { hidden: [] };
                    var idx = state.hidden.indexOf(id);
                    if (idx >= 0) {
                        state.hidden.splice(idx, 1);
                        widget.style.display = '';
                    } else {
                        state.hidden.push(id);
                        widget.style.display = 'none';
                    }
                    saveState(state);
                });
            }
        });
        var customizeBtn = document.getElementById('analytics-reset-cache');
        if (customizeBtn) {
            customizeBtn.addEventListener('click', function() {
                localStorage.removeItem(key);
                window.location.reload();
            });
        }
    });
})();

(function() {
    var wrap = document.getElementById('ax12-chart-hover-wrap');
    var tooltip = document.getElementById('ax12-chart-tooltip');
    var dayEl = document.getElementById('ax12-chart-tooltip-day');
    var salesEl = document.getElementById('ax12-chart-tooltip-sales');
    var ordersEl = document.getElementById('ax12-chart-tooltip-orders');
    if (!wrap || !tooltip) return;

    var dayLabel = (wrap.getAttribute('data-day-label') || 'Day').trim();

    function formatSales(n) {
        return defaultCurrency + Number(n).toLocaleString();
    }

    function showTooltip(rect, e) {
        var dateLabel = rect.getAttribute('data-date-label');
        var day = rect.getAttribute('data-day');
        var sales = rect.getAttribute('data-sales');
        var orders = rect.getAttribute('data-orders');
        dayEl.textContent = (dateLabel && dateLabel.trim()) ? dateLabel : (dayLabel + ' ' + day);
        salesEl.textContent = formatSales(sales);
        ordersEl.textContent = orders;
        tooltip.classList.add('ax12-chart-tooltip-visible');
        tooltip.setAttribute('aria-hidden', 'false');
        positionTooltip(e);
    }

    function positionTooltip(e) {
        var x = e.clientX;
        var y = e.clientY;
        var padding = 12;
        tooltip.style.left = x + 'px';
        tooltip.style.top = (y - padding) + 'px';
        var r = tooltip.getBoundingClientRect();
        if (r.left < 8) tooltip.style.left = (x + (8 - r.left)) + 'px';
        if (r.right > window.innerWidth - 8) tooltip.style.left = (x - (r.right - window.innerWidth + 8)) + 'px';
        if (r.top < 8) tooltip.style.top = (y + 20) + 'px';
    }

    function hideTooltip() {
        tooltip.classList.remove('ax12-chart-tooltip-visible');
        tooltip.setAttribute('aria-hidden', 'true');
    }

    wrap.querySelectorAll('.ax12-chart-hover-rect').forEach(function(rect) {
        rect.addEventListener('mouseenter', function(e) { showTooltip(rect, e); });
        rect.addEventListener('mousemove', positionTooltip);
        rect.addEventListener('mouseleave', hideTooltip);
    });
})();

/* Performance section tooltips (Most Sold, Low Stock, Out of Stock) — same style as sales trend */
(function() {
    var tooltip = document.getElementById('ax12-perf-tooltip');
    var titleEl = document.getElementById('ax12-perf-tooltip-title');
    var rowEl = document.getElementById('ax12-perf-tooltip-row');
    var labelEl = document.getElementById('ax12-perf-tooltip-label');
    var valueEl = document.getElementById('ax12-perf-tooltip-value');
    if (!tooltip || !titleEl || !rowEl) return;

    function positionPerfTooltip(e) {
        var x = e.clientX;
        var y = e.clientY;
        var padding = 12;
        tooltip.style.left = x + 'px';
        tooltip.style.top = (y - padding) + 'px';
        var r = tooltip.getBoundingClientRect();
        if (r.left < 8) tooltip.style.left = (x + (8 - r.left)) + 'px';
        if (r.right > window.innerWidth - 8) tooltip.style.left = (x - (r.right - window.innerWidth + 8)) + 'px';
        if (r.top < 8) tooltip.style.top = (y + 20) + 'px';
    }

    document.querySelectorAll('.ax12-perf-tooltip-row').forEach(function(row) {
        var name = row.getAttribute('data-perf-tooltip-name');
        var label = row.getAttribute('data-perf-tooltip-label');
        var value = row.getAttribute('data-perf-tooltip-value');
        if (!name) return;

        row.addEventListener('mouseenter', function(e) {
            titleEl.textContent = name;
            if (label != null && value != null) {
                labelEl.textContent = label;
                valueEl.textContent = value;
                rowEl.style.display = 'flex';
            } else {
                rowEl.style.display = 'none';
            }
            tooltip.classList.add('ax12-chart-tooltip-visible');
            tooltip.setAttribute('aria-hidden', 'false');
            positionPerfTooltip(e);
        });
        row.addEventListener('mousemove', positionPerfTooltip);
        row.addEventListener('mouseleave', function() {
            tooltip.classList.remove('ax12-chart-tooltip-visible');
            tooltip.setAttribute('aria-hidden', 'true');
        });
    });
})();
