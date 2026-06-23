(function () {
    'use strict';

    var CONFIG = window.MENU_BUILDER_CONFIG || {};
    var STATE = { items: (window.MENU_BUILDER_STATE || []).map(function (it) {
        return {
            id: it.id,
            label: it.label || '',
            link: it.link || '',
            parent: it.parent || 0,
            sort: it.sort !== undefined ? it.sort : 0,
            depth: it.depth || 0,
            class: it.class || '',
            icon: it.icon || '',
            params: it.params || {}
        };
    }) };

    var el = function (id) { return document.getElementById(id); };
    var treeEl = el('gmb-tree');
    var emptyEl = el('gmb-empty-state');
    var inspectorPlaceholder = el('gmb-inspector-placeholder');
    var inspectorContent = el('gmb-inspector-content');
    var selectedId = null;
    var dragId = null;
    var dragOverId = null;
    var dragOverMode = null; // 'before' | 'after' | 'inside'
    var iconSuggestCache = null;

    function buildTreeFromFlat() {
        var items = STATE.items.slice().sort(function (a, b) {
            if (a.parent !== b.parent) return a.parent - b.parent;
            return a.sort - b.sort;
        });
        var byParent = {};
        items.forEach(function (it) {
            var p = it.parent || 0;
            if (!byParent[p]) byParent[p] = [];
            byParent[p].push(it);
        });
        function branch(parentId) {
            var list = byParent[parentId] || [];
            return list.map(function (it) {
                return { item: it, children: branch(it.id) };
            });
        }
        return branch(0);
    }

    function flattenTree(branches, parentId, depth, out, sortIdx) {
        sortIdx = sortIdx || { v: 0 };
        (branches || []).forEach(function (b) {
            b.item.parent = parentId;
            b.item.depth = depth;
            b.item.sort = sortIdx.v++;
            out.push(b.item);
            flattenTree(b.children, b.item.id, depth + 1, out, sortIdx);
        });
        return out;
    }

    function getItem(id) {
        return STATE.items.find(function (it) { return it.id === id; });
    }

    function updateItem(id, patch) {
        var item = getItem(id);
        if (!item) return;
        Object.keys(patch).forEach(function (k) { item[k] = patch[k]; });
    }

    function deleteItem(id) {
        var idx = STATE.items.findIndex(function (it) { return it.id === id; });
        if (idx === -1) return;
        var toRemove = [id];
        function collectChildren(pid) {
            STATE.items.forEach(function (it) {
                if (it.parent === pid) {
                    toRemove.push(it.id);
                    collectChildren(it.id);
                }
            });
        }
        collectChildren(id);
        STATE.items = STATE.items.filter(function (it) { return toRemove.indexOf(it.id) === -1; });
    }

    function renderTree() {
        if (!treeEl) return;
        var tree = buildTreeFromFlat();
        treeEl.innerHTML = '';
        treeEl.setAttribute('role', 'list');

        function renderBranch(branches, parentId, depth) {
            var frag = document.createDocumentFragment();
            branches.forEach(function (b) {
                var it = b.item;
                var li = document.createElement('div');
                li.className = 'gmb-tree-branch';
                li.setAttribute('data-item-id', it.id);
                li.setAttribute('data-depth', String(depth));

                var card = document.createElement('div');
                card.className = 'gmb-tree-item';
                if (selectedId === it.id) card.classList.add('gmb-tree-item-active');
                card.setAttribute('data-item-id', it.id);
                card.draggable = true;

                var row = document.createElement('div');
                row.className = 'gmb-tree-row';

                var handle = document.createElement('span');
                handle.className = 'gmb-drag-handle';
                handle.setAttribute('aria-hidden', 'true');
                handle.setAttribute('aria-label', 'Drag');

                var icon = document.createElement('span');
                icon.className = 'gmb-item-icon';
                if (it.icon && it.icon.indexOf('<') !== -1) {
                    icon.innerHTML = it.icon;
                } else if (it.icon) {
                    icon.innerHTML = '<span class="' + escapeHtml(it.icon) + '"></span>';
                } else {
                    icon.textContent = '\uD83D\uDCC4';
                }

                var label = document.createElement('span');
                label.className = 'gmb-item-label';
                label.textContent = it.label || __('Untitled');

                var actionsWrap = document.createElement('div');
                actionsWrap.className = 'gmb-row-actions';

                var editBtn = document.createElement('button');
                editBtn.type = 'button';
                editBtn.className = 'gmb-row-action-btn gmb-item-edit-trigger';
                editBtn.setAttribute('aria-label', __('Edit') || 'Edit');
                editBtn.innerHTML = '<i class="feather icon-edit" aria-hidden="true"></i>';

                var deleteBtn = document.createElement('button');
                deleteBtn.type = 'button';
                deleteBtn.className = 'gmb-row-action-btn gmb-item-delete-trigger';
                deleteBtn.setAttribute('aria-label', __('Delete') || 'Delete');
                deleteBtn.innerHTML = '<i class="feather icon-trash-2" aria-hidden="true"></i>';

                actionsWrap.appendChild(editBtn);
                actionsWrap.appendChild(deleteBtn);

                row.appendChild(handle);
                row.appendChild(icon);
                row.appendChild(label);
                row.appendChild(actionsWrap);
                card.appendChild(row);

                editBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    selectItem(it.id);
                });
                deleteBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    showDeleteModal({ type: 'item', id: it.id });
                });

                card.addEventListener('dragstart', onDragStart);
                card.addEventListener('dragend', onDragEnd);
                card.addEventListener('dragover', onDragOver);
                card.addEventListener('dragleave', onDragLeave);
                card.addEventListener('drop', onDrop);

                li.appendChild(card);

                if (b.children && b.children.length > 0) {
                    var childrenWrap = document.createElement('div');
                    childrenWrap.className = 'gmb-tree-children';
                    childrenWrap.appendChild(renderBranch(b.children, it.id, depth + 1));
                    li.appendChild(childrenWrap);
                }

                frag.appendChild(li);
            });
            return frag;
        }

        treeEl.appendChild(renderBranch(tree, 0, 0));

        if (STATE.items.length === 0) {
            emptyEl && emptyEl.classList.remove('hidden');
        } else {
            emptyEl && emptyEl.classList.add('hidden');
        }
    }

    function onDragStart(e) {
        if (e.target.closest('.gmb-row-actions')) return;
        var id = e.target.closest('[data-item-id]');
        if (!id) return;
        dragId = parseInt(id.getAttribute('data-item-id'), 10);
        e.target.closest('.gmb-tree-item').classList.add('gmb-dragging');
        e.dataTransfer.effectAllowed = 'move';
        e.dataTransfer.setData('text/plain', String(dragId));
        e.dataTransfer.setData('application/json', JSON.stringify({ id: dragId }));
    }

    function onDragEnd(e) {
        e.target.closest('.gmb-tree-item') && e.target.closest('.gmb-tree-item').classList.remove('gmb-dragging');
        clearDragOver();
        dragId = null;
    }

    function clearDragOver() {
        document.querySelectorAll('.gmb-tree-item.gmb-drag-over').forEach(function (n) { n.classList.remove('gmb-drag-over'); });
        document.querySelectorAll('.gmb-drop-indicator').forEach(function (n) { n.remove(); });
        dragOverId = null;
        dragOverMode = null;
    }

    function onDragOver(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
        var card = e.target.closest('.gmb-tree-item');
        if (!card || !dragId) return;
        var targetId = parseInt(card.getAttribute('data-item-id'), 10);
        if (targetId === dragId) return;
        if (isDescendant(targetId, dragId)) return;

        var rect = card.getBoundingClientRect();
        var y = e.clientY - rect.top;
        var thresh = rect.height / 3;
        var mode = y < thresh ? 'before' : (y > rect.height - thresh ? 'after' : 'inside');

        if (targetId !== dragOverId || mode !== dragOverMode) {
            clearDragOver();
            dragOverId = targetId;
            dragOverMode = mode;
            card.classList.add('gmb-drag-over');
            if (mode === 'before' || mode === 'after') {
                var indicator = document.createElement('div');
                indicator.className = 'gmb-drop-indicator';
                if (mode === 'before') card.parentNode.insertBefore(indicator, card);
                else card.parentNode.insertBefore(indicator, card.nextSibling);
            }
        }
    }

    function onDragLeave(e) {
        if (!e.target.closest('.gmb-tree-item')) clearDragOver();
    }

    function isDescendant(ancestorId, nodeId) {
        var n = getItem(nodeId);
        while (n && n.parent) {
            if (n.parent === ancestorId) return true;
            n = getItem(n.parent);
        }
        return false;
    }

    function onDrop(e) {
        e.preventDefault();
        var targetId = dragOverId;
        var mode = dragOverMode;
        clearDragOver();
        if (!dragId || !targetId) return;

        var item = getItem(dragId);
        if (!item) return;

        var target = getItem(targetId);
        if (!target) return;

        var newParent, newSort;
        if (mode === 'inside') {
            newParent = targetId;
            newSort = 0;
            var siblings = STATE.items.filter(function (it) { return it.parent === targetId; });
            siblings.forEach(function (s, i) { s.sort = i; });
        } else {
            newParent = target.parent || 0;
            var sibs = STATE.items.filter(function (it) { return (it.parent || 0) === newParent && it.id !== dragId; });
            var idx = sibs.findIndex(function (s) { return s.id === targetId; });
            if (mode === 'after') idx += 1;
            sibs.splice(idx, 0, item);
            sibs.forEach(function (s, i) { s.sort = i; });
            newSort = idx;
        }

        item.parent = newParent;
        item.sort = newSort;
        item.depth = newParent === 0 ? 0 : ((getItem(newParent) && getItem(newParent).depth + 1) || 1);

        renderTree();
        if (selectedId === dragId) selectItem(dragId);
    }

    function selectItem(id) {
        selectedId = id;
        document.querySelectorAll('.gmb-tree-item-active').forEach(function (n) { n.classList.remove('gmb-tree-item-active'); });
        var activeCard = id && document.querySelector('.gmb-tree-item[data-item-id="' + id + '"]');
        if (activeCard) activeCard.classList.add('gmb-tree-item-active');
        var item = getItem(id);
        if (!item) {
            inspectorContent && inspectorContent.classList.add('hidden');
            inspectorContent && (inspectorContent.innerHTML = '');
            inspectorContent && (inspectorContent.style.opacity = '');
            if (inspectorPlaceholder) {
                inspectorPlaceholder.classList.remove('gmb-inspector-placeholder-hidden');
            }
            return;
        }
        if (inspectorPlaceholder) inspectorPlaceholder.classList.add('gmb-inspector-placeholder-hidden');
        inspectorContent && inspectorContent.classList.remove('hidden');

        if (inspectorContent && typeof jQuery !== 'undefined' && jQuery.fn.select2) {
            var $oldPerm = jQuery('#insp-permission');
            if ($oldPerm.length && $oldPerm.data('select2')) {
                $oldPerm.select2('destroy');
            }
        }

        var permDisplay = (item.params && item.params.permission) ? item.params.permission : '';
        var routeNameRaw = item.params && item.params.route_name;
        var routeNamesDisplay = Array.isArray(routeNameRaw) ? routeNameRaw.join(', ') : (routeNameRaw ? String(routeNameRaw) : '');

        var permissionOptions = CONFIG.permissionOptions || [];
        var permissionFieldHtml = '';
        if (permissionOptions.length > 0) {
                var opts = '<option value="">' + __('No restriction') + '</option>';
            permissionOptions.forEach(function (opt) {
                var sel = (opt.value === permDisplay) ? ' selected' : '';
                opts += '<option value="' + escapeHtml(opt.value) + '"' + sel + '>' + escapeHtml(opt.label) + '</option>';
            });
            var selectedOpt = permDisplay && permissionOptions.length ? permissionOptions.find(function (o) { return o.value === permDisplay; }) : null;
            var initialPath = selectedOpt && selectedOpt.path ? selectedOpt.path : (selectedOpt ? selectedOpt.label : permDisplay);
            permissionFieldHtml = '<div class="gmb-field">' +
                '<label for="insp-permission">' + __('Who can see this menu?') + '</label>' +
                '<select id="insp-permission" class="gmb-input gmb-select gmb-select2-permission">' + opts + '</select>' +
                '<span class="gmb-helper">' + __('Choose which permission is required to see this menu. Select "No restriction" to show to everyone.') + '</span>' +
                '<div class="gmb-permission-value-wrap" id="insp-permission-value-wrap">' +
                '<span class="gmb-permission-value-label">' + __('Permission path') + ':</span> ' +
                '<span class="gmb-permission-value" id="insp-permission-value">' + (initialPath ? escapeHtml(initialPath) : '') + '</span></div></div>';
        } else {
            permissionFieldHtml = '<div class="gmb-field">' +
                '<label for="insp-permission">' + __('Who can see this menu?') + '</label>' +
                '<input type="text" id="insp-permission" class="gmb-input" value="' + escapeHtml(permDisplay) + '" placeholder="' + __('Permission (optional)') + '">' +
                '<span class="gmb-helper">' + __('Choose which permission is required to see this menu. Leave empty to show to everyone.') + '</span></div>';
        }

        if (inspectorContent) inspectorContent.style.opacity = '0';
        inspectorContent.innerHTML =
            '<h2 class="gmb-inspector-title">' + escapeHtml(item.label || __('Menu Item')) + '</h2>' +
            '<div class="gmb-inspector-group">' +
            '<div class="gmb-field"><label for="insp-label">' + __('Label') + '</label><input type="text" id="insp-label" class="gmb-input" value="' + escapeHtml(item.label) + '"><span class="gmb-helper">' + __('Display text') + '</span></div>' +
            '<div class="gmb-field gmb-icon-field"><label for="insp-icon">' + __('Icon') + '</label><div class="gmb-icon-suggest-wrap"><input type="text" id="insp-icon" class="gmb-input" value="' + escapeHtml(item.icon) + '" placeholder="' + __('e.g. fa fa-home') + '" autocomplete="off"><div class="gmb-icon-suggest-list" id="insp-icon-suggest-list" role="listbox" aria-hidden="true"></div></div></div>' +
            '</div>' +
            '<div class="gmb-inspector-group">' +
            '<div class="gmb-field"><label for="insp-url">' + __('URL') + '</label><input type="text" id="insp-url" class="gmb-input" value="' + escapeHtml(item.link) + '" placeholder="https://"></div>' +
            '<div class="gmb-field"><label for="insp-class">' + __('CSS Class') + '</label><input type="text" id="insp-class" class="gmb-input" value="' + escapeHtml(item.class) + '"></div>' +
            '</div>' +
            '<div class="gmb-inspector-group">' +
            permissionFieldHtml +
            '<div class="gmb-field">' +
            '<label for="insp-active-url">' + __('Mark as active when user is on these pages') + '</label>' +
            '<span class="gmb-helper">' + __('Paste the full page URL from your browser address bar (e.g. https://yourdomain.com/admin/products) and click Add. We will find the route name and add it so this menu shows as active on that page.') + '</span>' +
            '<div class="gmb-active-url-row">' +
            '<input type="text" id="insp-active-url" class="gmb-input" placeholder="' + __('e.g. https://yourdomain.com/admin/products') + '" aria-label="' + __('Page URL') + '">' +
            '<button type="button" id="insp-active-add" class="gmb-btn gmb-btn-primary">' + __('Add') + '</button>' +
            '</div>' +
            '<div class="gmb-active-pages-list" id="insp-active-pages-list" data-item-id="' + id + '"></div>' +
            '<details class="gmb-route-advanced"><summary>' + __('Advanced: edit route names manually') + '</summary><div class="gmb-field"><label for="insp-route-names">' + __('Route names') + '</label><input type="text" id="insp-route-names" class="gmb-input" value="' + escapeHtml(routeNamesDisplay) + '" placeholder="e.g. product.index, product.create"><span class="gmb-helper">' + __('Comma-separated route names.') + '</span></div></details>' +
            '</div>' +
            '</div>';

        inspectorContent.querySelector('#insp-label').addEventListener('input', function () {
            updateItem(id, { label: this.value });
            var title = inspectorContent.querySelector('.gmb-inspector-title');
            if (title) title.textContent = this.value || __('Menu Item');
            var labelInTree = document.querySelector('.gmb-tree-item[data-item-id="' + id + '"] .gmb-item-label');
            if (labelInTree) labelInTree.textContent = this.value || __('Untitled');
        });
        var iconInput = inspectorContent.querySelector('#insp-icon');
        var iconSuggestList = inspectorContent.querySelector('#insp-icon-suggest-list');
        var iconSuggestTimeout = null;

        function filterIcons(query) {
            if (!iconSuggestCache || !Array.isArray(iconSuggestCache)) return [];
            var q = (query || '').toLowerCase().trim();
            if (!q) return iconSuggestCache.slice(0, 5000);
            return iconSuggestCache.filter(function (cls) {
                return cls.toLowerCase().indexOf(q) !== -1;
            }).slice(0, 50);
        }

        function renderIconSuggestions(items) {
            if (!iconSuggestList) return;
            iconSuggestList.innerHTML = '';
            iconSuggestList.setAttribute('aria-hidden', 'true');
            if (!items || items.length === 0) {
                iconSuggestList.classList.remove('gmb-icon-suggest-list--open');
                return;
            }
            items.forEach(function (cls) {
                var el = document.createElement('div');
                el.className = 'gmb-icon-suggest-item';
                el.setAttribute('role', 'option');
                el.innerHTML = '<span class="gmb-icon-suggest-icon"><i class="' + escapeHtml(cls) + '" aria-hidden="true"></i></span><span class="gmb-icon-suggest-label">' + escapeHtml(cls) + '</span>';
                el.addEventListener('click', function () {
                    iconInput.value = cls;
                    updateItem(id, { icon: cls });
                    iconSuggestList.classList.remove('gmb-icon-suggest-list--open');
                    iconSuggestList.setAttribute('aria-hidden', 'true');
                });
                iconSuggestList.appendChild(el);
            });
            iconSuggestList.classList.add('gmb-icon-suggest-list--open');
            iconSuggestList.setAttribute('aria-hidden', 'false');
        }

        function showIconSuggestions() {
            var query = iconInput ? iconInput.value : '';
            if (iconSuggestCache) {
                renderIconSuggestions(filterIcons(query));
                return;
            }
            if (!CONFIG.routes || !CONFIG.routes.icons) {
                renderIconSuggestions([]);
                return;
            }
            fetch(CONFIG.routes.icons, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    iconSuggestCache = data.icons || [];
                    renderIconSuggestions(filterIcons(iconInput ? iconInput.value : ''));
                })
                .catch(function () {
                    iconSuggestCache = [];
                    renderIconSuggestions([]);
                });
        }

        function hideIconSuggestions() {
            if (iconSuggestTimeout) clearTimeout(iconSuggestTimeout);
            iconSuggestTimeout = setTimeout(function () {
                if (iconSuggestList) {
                    iconSuggestList.classList.remove('gmb-icon-suggest-list--open');
                    iconSuggestList.setAttribute('aria-hidden', 'true');
                }
            }, 200);
        }

        if (iconInput) {
            iconInput.addEventListener('input', function () {
                updateItem(id, { icon: this.value });
                showIconSuggestions();
            });
            iconInput.addEventListener('focus', function () { showIconSuggestions(); });
            iconInput.addEventListener('blur', hideIconSuggestions);
        }
        if (iconSuggestList) {
            iconSuggestList.addEventListener('mousedown', function (e) { e.preventDefault(); });
        }

        inspectorContent.querySelector('#insp-url').addEventListener('input', function () { updateItem(id, { link: this.value }); });
        inspectorContent.querySelector('#insp-class').addEventListener('input', function () { updateItem(id, { class: this.value }); });

        var permInput = inspectorContent.querySelector('#insp-permission');
        var permValueEl = inspectorContent.querySelector('#insp-permission-value');
        var permValueWrap = inspectorContent.querySelector('#insp-permission-value-wrap');
        function updatePermissionValueDisplay() {
            if (!permValueEl || !permInput) return;
            var val = '';
            var displayText = '';
            if (permInput.tagName === 'SELECT') {
                val = (typeof jQuery !== 'undefined' && jQuery(permInput).data('select2')) ? (jQuery(permInput).val() || '') : (permInput.value || '');
                var permissionOptions = CONFIG.permissionOptions || [];
                var opt = permissionOptions.find(function (o) { return o.value === val; });
                displayText = (opt && opt.path) ? opt.path : (opt && opt.label ? opt.label : val);
            } else {
                val = permInput.value ? permInput.value.trim() : '';
                displayText = val;
            }
            permValueEl.textContent = displayText || '';
            if (permValueWrap) permValueWrap.classList.toggle('gmb-permission-value-wrap--empty', !val);
        }
        if (permInput) {
            if (permInput.tagName === 'SELECT') {
                updatePermissionValueDisplay();
                if (typeof jQuery !== 'undefined' && jQuery.fn.select2) {
                    var $perm = jQuery('#insp-permission');
                    $perm.select2({
                        width: '100%',
                        placeholder: __('No restriction'),
                        allowClear: true,
                        minimumResultsForSearch: 10
                    });
                    $perm.off('change.gmb-permission').on('change.gmb-permission', function () {
                        var val = $perm.val() || '';
                        var current = getItem(id);
                        var params = current && current.params ? Object.assign({}, current.params) : {};
                        if (val) params.permission = val; else delete params.permission;
                        updateItem(id, { params: params });
                        updatePermissionValueDisplay();
                    });
                } else {
                    permInput.addEventListener('change', function () {
                        var current = getItem(id);
                        var params = current && current.params ? Object.assign({}, current.params) : {};
                        var val = this.value || '';
                        if (val) params.permission = val; else delete params.permission;
                        updateItem(id, { params: params });
                        updatePermissionValueDisplay();
                    });
                }
            } else {
                permInput.addEventListener('input', function () {
                    var current = getItem(id);
                    var params = current && current.params ? Object.assign({}, current.params) : {};
                    var val = this.value.trim();
                    if (val) params.permission = val; else delete params.permission;
                    updateItem(id, { params: params });
                    updatePermissionValueDisplay();
                });
            }
        }

        var routeNamesInput = inspectorContent.querySelector('#insp-route-names');
        if (routeNamesInput) {
            routeNamesInput.addEventListener('input', function () {
                var current = getItem(id);
                var params = current && current.params ? Object.assign({}, current.params) : {};
                var parts = this.value.split(',').map(function (s) { return s.trim(); }).filter(Boolean);
                if (parts.length) params.route_name = parts; else delete params.route_name;
                updateItem(id, { params: params });
                renderActivePagesList(id);
            });
        }

        function renderActivePagesList(itemId) {
            var listEl = inspectorContent.querySelector('#insp-active-pages-list');
            var item = getItem(itemId);
            if (!listEl || !item) return;
            var routes = item.params && item.params.route_name;
            var arr = Array.isArray(routes) ? routes : (routes ? [String(routes)] : []);
            listEl.innerHTML = '';
            arr.forEach(function (routeName) {
                var chip = document.createElement('span');
                chip.className = 'gmb-active-chip';
                chip.textContent = routeName;
                var removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'gmb-active-chip-remove';
                removeBtn.setAttribute('aria-label', __('Remove'));
                removeBtn.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
                removeBtn.addEventListener('click', function () {
                    var cur = getItem(itemId);
                    var par = cur && cur.params ? Object.assign({}, cur.params) : {};
                    var names = (par.route_name && Array.isArray(par.route_name)) ? par.route_name.filter(function (r) { return r !== routeName; }) : [];
                    if (names.length) par.route_name = names; else delete par.route_name;
                    updateItem(itemId, { params: par });
                    renderActivePagesList(itemId);
                    if (routeNamesInput) routeNamesInput.value = names.join(', ');
                });
                chip.appendChild(removeBtn);
                listEl.appendChild(chip);
            });
            if (routeNamesInput) routeNamesInput.value = arr.join(', ');
        }

        renderActivePagesList(id);

        var addActiveBtn = inspectorContent.querySelector('#insp-active-add');
        var activeUrlInput = inspectorContent.querySelector('#insp-active-url');
        if (addActiveBtn && activeUrlInput && CONFIG.routes && CONFIG.routes.resolveRoute) {
            addActiveBtn.addEventListener('click', function () {
                var url = activeUrlInput.value.trim();
                if (!url) {
                    showToast('warning', __('Please enter a page URL.'));
                    return;
                }
                addActiveBtn.disabled = true;
                post(CONFIG.routes.resolveRoute, { path: url })
                    .then(function (r) { return r.json(); })
                    .then(function (data) {
                        if (data.error) {
                            showToast('error', data.error || __('Could not find a route for this URL.'));
                            return;
                        }
                        var routeName = data.route_name;
                        var current = getItem(id);
                        var params = current && current.params ? Object.assign({}, current.params) : {};
                        var names = (params.route_name && Array.isArray(params.route_name)) ? params.route_name.slice() : [];
                        if (names.indexOf(routeName) === -1) names.push(routeName);
                        params.route_name = names;
                        updateItem(id, { params: params });
                        activeUrlInput.value = '';
                        renderActivePagesList(id);
                        showToast('success', __('Page added. Menu will be active on this page.'));
                    })
                    .catch(function () {
                        showToast('error', __('Could not resolve URL.'));
                    })
                    .finally(function () {
                        addActiveBtn.disabled = false;
                    });
            });
        }

        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                if (inspectorContent) inspectorContent.style.opacity = '1';
            });
        });
    }

    function escapeHtml(s) {
        if (s == null) return '';
        var div = document.createElement('div');
        div.textContent = s;
        return div.innerHTML;
    }

    function __(key) {
        return key;
    }

    function showToast(type, message) {
        type = (type || 'success').toLowerCase();
        if (typeof bootstrap !== 'undefined' && bootstrap.Toast) {
            var container = document.getElementById('gmb-toast-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'gmb-toast-container';
                container.className = 'gmb-toast-container';
                container.setAttribute('aria-live', 'polite');
                document.body.appendChild(container);
            }
            var iconClass = 'fa fa-check-circle';
            if (type === 'error') iconClass = 'fa fa-times-circle';
            else if (type === 'warning') iconClass = 'fa fa-exclamation-triangle';
            else if (type === 'info') iconClass = 'fa fa-info-circle';
            var toastEl = document.createElement('div');
            toastEl.className = 'toast gmb-toast gmb-toast--' + type + ' align-items-center border-0';
            toastEl.setAttribute('role', 'alert');
            toastEl.innerHTML = '<div class="gmb-toast-inner">' +
                '<span class="gmb-toast-icon"><i class="' + iconClass + '" aria-hidden="true"></i></span>' +
                '<div class="gmb-toast-body">' + (message || '') + '</div>' +
                '<button type="button" class="gmb-toast-close btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>';
            container.appendChild(toastEl);
            var bsToast = new bootstrap.Toast(toastEl, { delay: 4000, autohide: true });
            bsToast.show();
            toastEl.addEventListener('hidden.bs.toast', function () {
                if (toastEl.parentNode) toastEl.parentNode.removeChild(toastEl);
            });
        } else {
            var notif = document.querySelector('.top-notification');
            if (notif) {
                notif.classList.remove('d-none');
                var alertEl = notif.querySelector('.alert');
                var textEl = notif.querySelector('.alertText');
                if (alertEl) {
                    alertEl.classList.remove('alert-danger');
                    alertEl.classList.add(type === 'error' ? 'alert-danger' : 'alert-success');
                }
                if (textEl) textEl.textContent = message || '';
            }
        }
    }

    function getStateJson() {
        var tree = buildTreeFromFlat();
        var flat = flattenTree(tree, 0, 0, []);
        return {
            items: STATE.items,
            order: flat.map(function (it) { return { id: it.id, parent: it.parent || 0, sort: it.sort, depth: it.depth }; })
        };
    }

    function post(url, body) {
        var headers = { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CONFIG.csrf || '', 'Accept': 'application/json' };
        var opts = { method: 'POST', headers: headers };
        if (body) opts.body = typeof body === 'string' ? body : JSON.stringify(body);
        return fetch(url, opts);
    }

    function postForm(url, formData) {
        var headers = { 'X-CSRF-TOKEN': CONFIG.csrf || '', 'Accept': 'application/json' };
        return fetch(url, { method: 'POST', headers: headers, body: formData });
    }

    function deleteItemApi(id) {
        var form = new FormData();
        form.append('id', id);
        return postForm(CONFIG.routes.itemDelete, form);
    }

    function saveMenu() {
        var spinner = el('gmb-spinner');
        if (spinner) spinner.classList.remove('hidden');

        var tree = buildTreeFromFlat();
        var flat = flattenTree(tree, 0, 0, []);
        var arraydataOrder = flat.map(function (it) { return { id: it.id, parent: it.parent || 0, sort: it.sort, depth: it.depth }; });
        var arraydataUpdate = STATE.items.map(function (it) {
            return {
                id: it.id,
                label: it.label,
                link: it.link,
                class: it.class,
                icon: it.icon,
                params: typeof it.params === 'object' ? JSON.stringify(it.params) : it.params
            };
        });

        Promise.all([
            post(CONFIG.routes.control, { arraydata: arraydataOrder }),
            post(CONFIG.routes.update, { arraydata: arraydataUpdate, lang: CONFIG.lang })
        ]).then(function (responses) {
            if (spinner) spinner.classList.add('hidden');
            var ok = responses.every(function (r) { return r.ok; });
            if (ok) {
                showToast('success', __('Saved successfully'));
                setTimeout(function () { window.location.reload(); }, 1500);
            }
        }).catch(function () {
            if (spinner) spinner.classList.add('hidden');
            showToast('error', __('Failed to save.'));
        });
    }

    function addCustomLink() {
        var url = (el('gmb-custom-url') && el('gmb-custom-url').value) || '';
        var label = (el('gmb-custom-label') && el('gmb-custom-label').value) || '';
        if (!label.trim()) {
            showToast('error', __('Please provide the label name to add menu item'));
            return;
        }
        var form = new FormData();
        form.append('labelmenu', label);
        form.append('linkmenu', url);
        form.append('idmenu', CONFIG.menuId);
        form.append('lang', CONFIG.lang);
        postForm(CONFIG.routes.custom, form).then(function (r) {
            if (r.ok) {
                showToast('success', __('Added to menu'));
                setTimeout(function () { window.location.reload(); }, 1500);
            }
        }).catch(function () {
            showToast('error', __('Failed to add link'));
        });
    }

    function addSelectedToMenu() {
        var checkboxes = document.querySelectorAll('.gmb-source-list .gmb-checkbox:checked');
        if (!checkboxes.length) {
            showToast('warning', __('Please select at least one item'));
            return;
        }
        var customName = [], categoryUrl = [], permissionAttribute = [], menuIds = [];
        checkboxes.forEach(function (cb) {
            customName.push(cb.getAttribute('data-source-name') || '');
            categoryUrl.push(cb.getAttribute('data-source-url') || '');
            permissionAttribute.push(cb.getAttribute('data-source-permission') || '');
            menuIds.push(cb.getAttribute('data-source-id') || '');
        });
        var form = new FormData();
        customName.forEach(function (v) { form.append('customName[]', v); });
        categoryUrl.forEach(function (v) { form.append('categoryUrl[]', v); });
        permissionAttribute.forEach(function (v) { form.append('permissionAttribute[]', v); });
        form.append('idmenu', CONFIG.menuId);
        form.append('lang', CONFIG.lang);
        menuIds.forEach(function (v) { form.append('menuIds[]', v); });
        postForm(CONFIG.routes.custom, form).then(function (r) {
            if (r.ok) {
                showToast('success', __('Added to menu'));
                setTimeout(function () { window.location.reload(); }, 1500);
            }
        }).catch(function () {
            showToast('error', __('Failed to add items'));
        });
    }

    function deleteAllMenu() {
        showDeleteModal({ type: 'all' });
    }

    var pendingDelete = null;

    function showDeleteModal(pending) {
        pendingDelete = pending;
        var modalEl = document.getElementById('gmb-delete-modal');
        var titleEl = modalEl && modalEl.querySelector('#gmb-delete-modal-label');
        var messageEl = modalEl && modalEl.querySelector('#gmb-delete-modal-message');
        if (pending.type === 'all') {
            if (titleEl) titleEl.textContent = __('Delete all menu items?');
            if (messageEl) messageEl.textContent = __('This will remove all items from this menu. This action cannot be undone.');
        } else {
            if (titleEl) titleEl.textContent = __('Delete menu item?');
            if (messageEl) messageEl.textContent = __('Are you sure you want to remove this item from the menu?');
        }
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal && modalEl) {
            var modal = bootstrap.Modal.getOrCreateInstance ? bootstrap.Modal.getOrCreateInstance(modalEl) : new bootstrap.Modal(modalEl);
            modal.show();
        }
    }

    function runPendingDelete() {
        if (!pendingDelete) return;
        var p = pendingDelete;
        pendingDelete = null;
        var modalEl = document.getElementById('gmb-delete-modal');
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal && modalEl) {
            var modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();
        }
        if (p.type === 'item') {
            deleteItemApi(p.id).then(function (r) {
                if (r && r.ok) {
                    deleteItem(p.id);
                    renderTree();
                    selectItem(null);
                    showToast('success', __('Item removed'));
                } else {
                    showToast('error', __('Failed to remove item'));
                }
            }).catch(function () {
                showToast('error', __('Failed to remove item'));
            });
        } else if (p.type === 'all') {
            var form = new FormData();
            form.append('id', CONFIG.menuId);
            postForm(CONFIG.routes.menuDelete, form).then(function (r) {
                if (r.ok) {
                    showToast('success', __('Menu cleared'));
                    setTimeout(function () { window.location.reload(); }, 1500);
                }
            }).catch(function () {
                showToast('error', __('Failed to delete menu'));
            });
        }
    }

    function initCollapse() {
        document.querySelectorAll('.gmb-section').forEach(function (section) {
            var head = section.querySelector('[data-toggle]');
            var body = section.querySelector('[data-body]');
            if (!head || !body) return;
            section.setAttribute('aria-expanded', 'true');
            head.setAttribute('aria-expanded', 'true');
            head.addEventListener('click', function () {
                var open = section.getAttribute('aria-expanded') === 'true';
                section.setAttribute('aria-expanded', !open);
                head.setAttribute('aria-expanded', !open);
            });
        });
    }

    function initSourceSearch() {
        var search = el('gmb-source-search');
        var list = el('gmb-source-list');
        if (!search || !list) return;
        search.addEventListener('input', function () {
            var q = (this.value || '').toLowerCase().trim();
            list.querySelectorAll('.gmb-source-row').forEach(function (row) {
                var name = (row.getAttribute('data-source-name') || '').toLowerCase();
                row.classList.toggle('hidden', q && name.indexOf(q) === -1);
            });
        });
    }

    function initDeleteModal() {
        var confirmBtn = document.getElementById('gmb-delete-confirm-btn');
        if (confirmBtn) confirmBtn.addEventListener('click', runPendingDelete);
    }

    function initButtons() {
        if (el('gmb-add-custom')) el('gmb-add-custom').addEventListener('click', addCustomLink);
        if (el('gmb-add-selected')) el('gmb-add-selected').addEventListener('click', addSelectedToMenu);
        if (el('gmb-save')) el('gmb-save').addEventListener('click', saveMenu);
        if (el('gmb-delete-all')) el('gmb-delete-all').addEventListener('click', deleteAllMenu);
        initDeleteModal();
        if (el('gmb-create-menu')) el('gmb-create-menu').addEventListener('click', function () {
            var name = prompt(__('Enter menu name'));
            if (name) {
                var form = new FormData();
                form.append('menuname', name);
                form.append('_token', CONFIG.csrf);
                fetch(CONFIG.routes.create, { method: 'POST', headers: { 'X-CSRF-TOKEN': CONFIG.csrf, 'Accept': 'application/json' }, body: form })
                    .then(function (r) { return r.json(); })
                    .then(function (data) {
                        if (data.resp) {
                            showToast('success', __('Menu created'));
                            setTimeout(function () {
                                window.location.href = CONFIG.currentUrl + '?menu=' + data.resp + '&lang=' + (CONFIG.lang || 'en');
                            }, 1500);
                        } else {
                            showToast('error', __('Failed to create menu'));
                        }
                    })
                    .catch(function () {
                        showToast('error', __('Failed to create menu'));
                    });
            }
        });
    }

    function initPermissionClearHandler() {
        if (typeof jQuery === 'undefined') return;
        function handleClearClick(e) {
            var $clear = jQuery(e.target).closest('.select2-selection__clear');
            if (!$clear.length) return;
            var $container = $clear.closest('.select2-container');
            if (!$container.prev('#insp-permission').length) return;
            e.preventDefault();
            e.stopPropagation();
            var $perm = jQuery('#insp-permission');
            if ($perm.length && $perm.data('select2')) {
                $perm.val(null).trigger('change.gmb-permission');
            }
        }
        jQuery(document).off('mousedown.gmb-permission-clear click.gmb-permission-clear')
            .on('mousedown.gmb-permission-clear', '#menu-builder-app .select2-selection__clear', handleClearClick)
            .on('click.gmb-permission-clear', '#menu-builder-app .select2-selection__clear', handleClearClick);
    }

    function initToolbarSelect2() {
        if (typeof jQuery === 'undefined' || !jQuery.fn.select2) return;
        jQuery(function ($) {
            var $menu = jQuery('#gmb-menu-select');
            var $lang = jQuery('#gmb-lang-select');
            $menu.add($lang).select2({
                width: '220px',
                minimumResultsForSearch: -1
            }).on('change', function () {
                jQuery('#gmb-pref-form').submit();
            });
            jQuery('#gmb-pref-form').addClass('gmb-select2-ready');
        });
    }

    function init() {
        initCollapse();
        initSourceSearch();
        initButtons();
        initPermissionClearHandler();
        initToolbarSelect2();
        renderTree();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
