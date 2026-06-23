/**
 * Menu Builder UI – drawer and save behavior
 * Raw JS: moves settings into right panel, restores before save.
 */
(function () {
    'use strict';

    var placeholder = document.getElementById('menu-item-settings-placeholder');
    var drawerContent = document.getElementById('menu-item-settings-drawer-content');
    var saveBtn = document.getElementById('mb-save-menu-btn');
    var spinEl = document.getElementById('spinsavemenu');

    function moveSettingsToDrawer(li) {
        if (!li || !drawerContent) return;
        var settings = li.querySelector('.menu-item-settings');
        if (!settings) return;
        if (placeholder) placeholder.classList.add('hidden');
        drawerContent.classList.remove('hidden');
        drawerContent.innerHTML = '';
        drawerContent.appendChild(settings);
    }

    function moveAllSettingsBack() {
        if (!drawerContent) return;
        var settings = drawerContent.querySelector('.menu-item-settings');
        if (settings) {
            var idInput = settings.querySelector('.edit-menu-item-id');
            var id = idInput && idInput.value;
            if (id) {
                var li = document.getElementById('menu-item-' + id);
                if (li) li.appendChild(settings);
            }
        }
        if (placeholder) placeholder.classList.remove('hidden');
        drawerContent.classList.add('hidden');
        drawerContent.innerHTML = '';
    }

    function onItemClick(e) {
        var target = e.target;
        var row = target.closest('.mb-row') || target.closest('.menu-item-handle') || target.closest('.menu-item-bar');
        if (!row) return;
        var li = row.closest('li.menu-item');
        if (!li) return;
        var editLink = li.querySelector('.item-edit');
        if (editLink && !target.closest('.item-edit')) {
            e.preventDefault();
            editLink.click();
        }
        setTimeout(function () {
            var active = document.querySelector('#menu-to-edit li.menu-item-edit-active');
            if (active) {
                var s = active.querySelector('.menu-item-settings');
                if (s && drawerContent) {
                    if (placeholder) placeholder.classList.add('hidden');
                    drawerContent.classList.remove('hidden');
                    drawerContent.innerHTML = '';
                    drawerContent.appendChild(s);
                }
            }
        }, 50);
    }

    function init() {
        if (typeof jQuery === 'undefined') return;
        var $ = jQuery;

        $(document).on('click', '#menu-to-edit .menu-item-handle, #menu-to-edit .mb-row, #menu-to-edit .menu-item-bar', function (e) {
            var $li = $(this).closest('li.menu-item');
            if (!$li.length) return;
            var editLink = $li.find('.item-edit')[0];
            if (editLink && !$(e.target).closest('.item-edit').length) {
                e.preventDefault();
                editLink.click();
            }
            setTimeout(function () {
                var active = $('#menu-to-edit li.menu-item-edit-active');
                if (active.length) {
                    var settings = active.find('.menu-item-settings');
                    if (settings.length && drawerContent) {
                        if (placeholder) placeholder.classList.add('hidden');
                        drawerContent.classList.remove('hidden');
                        drawerContent.innerHTML = '';
                        settings.appendTo(drawerContent);
                    }
                }
            }, 50);
        });

        var _getmenus1 = window.getmenus1;
        if (_getmenus1) {
            window.getmenus1 = function () {
                moveAllSettingsBack();
                if (spinEl) spinEl.classList.remove('hidden');
                _getmenus1();
            };
        }

        $(document).ajaxComplete(function () {
            if (spinEl) spinEl.classList.add('hidden');
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
