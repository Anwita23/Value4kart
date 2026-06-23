"use strict";

var CATEGORY_VIEW_STORAGE_KEY = 'categoryViewMode';

function resfreshJSTree() {
    if ($('#evts').length && $('#evts').jstree(true)) {
        setTimeout(function () {
        $('#evts').jstree(true).refresh();
    }, 500);
}
}

if ($('.main-body .page-wrapper').find('#category-info-container').length) {
    var config = window.categoryConfig || {};
    var currentCategoryUrl = config.currentCategoryUrl || '';
    var selectedLang = config.selectedLang || '';
    var isAllowSuggestion = (config.isAllowSuggestion !== undefined && config.isAllowSuggestion !== null) ? config.isAllowSuggestion : 0;
    var vendorId = (config.vendorId !== undefined && config.vendorId !== null && config.vendorId !== '') ? config.vendorId : null;
    var selectedNodeId = '';
    var selectedNodeName = '';
    var editId = '';
    var categoryFlatList = [];
    var treeViewInited = false;
    var listViewInited = false;

    function setSubCategoryButtonDisabled(disabled) {
        var $btn = $('.sub-category');
        $btn.prop('disabled', disabled);
        var hint = $('#category-info-container').data('sub-category-disabled-title');
        if (disabled && hint) {
            $btn.attr('title', hint);
        } else {
            $btn.removeAttr('title');
        }
    }

    function getCategoryViewMode() {
        try {
            var saved = localStorage.getItem(CATEGORY_VIEW_STORAGE_KEY);
            return (saved === 'tree' || saved === 'list') ? saved : 'list';
        } catch (e) {
            return 'list';
        }
    }

    function setCategoryViewMode(mode) {
        try {
            localStorage.setItem(CATEGORY_VIEW_STORAGE_KEY, mode);
        } catch (e) {}
    }

    function applyCategoryViewMode(mode) {
        var $tree = $('#category-tree-view');
        var $list = $('#category-normal-view');
        if (!$list.length) {
            $tree.show();
            $('.category-search-wrap').hide();
            $('.category-filter-dropdown').hide();
            return;
        }
        if (mode === 'tree') {
            $tree.show();
            $list.hide();
            $('#category-view-tree').prop('checked', true);
            $('.category-search-wrap').hide();
            $('.category-filter-dropdown').hide();
        } else {
            $tree.hide();
            $list.show();
            $('#category-view-list').prop('checked', true);
            $('.category-search-wrap').show();
            $('.category-filter-dropdown').show();
        }
    }

    var categorySearchQuery = '';
    var categoryFilterStatus = 'all';
    var categorySortOrder = 'tree';
    var categoryCollapsedIds = {};
    var categoryChildMap = {};
    var categoryNewlyCreatedId = null;

    function categoryShowToast(icon, title) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Toast) {
            var container = document.getElementById('category-toast-container');
            if (!container) {
                container = document.createElement('div');
                container.id = 'category-toast-container';
                container.className = 'category-toast-container';
                container.setAttribute('aria-live', 'polite');
                document.body.appendChild(container);
            }
            var type = (icon || '').toLowerCase();
            if (type !== 'success' && type !== 'error' && type !== 'warning') type = type === 'info' ? 'info' : 'success';
            var iconClass = 'fa fa-check-circle';
            if (type === 'error') iconClass = 'fa fa-times-circle';
            else if (type === 'warning') iconClass = 'fa fa-exclamation-triangle';
            else if (type === 'info') iconClass = 'fa fa-info-circle';
            var toastEl = document.createElement('div');
            toastEl.className = 'toast category-toast category-toast--' + type + ' align-items-center border-0';
            toastEl.setAttribute('role', 'alert');
            toastEl.innerHTML = '<div class="category-toast-inner">' +
                '<span class="category-toast-icon"><i class="' + iconClass + '" aria-hidden="true"></i></span>' +
                '<div class="category-toast-body">' + (title || '') + '</div>' +
                '<button type="button" class="category-toast-close btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>';
            container.appendChild(toastEl);
            var bsToast = new bootstrap.Toast(toastEl, { delay: 4000, autohide: true });
            bsToast.show();
            toastEl.addEventListener('hidden.bs.toast', function () {
                if (toastEl.parentNode) toastEl.parentNode.removeChild(toastEl);
            });
        } else if (typeof swal !== 'undefined') {
            swal(title, { icon: icon, buttons: [false, jsLang ? jsLang('Ok') : 'Ok'] });
        }
    }

    function flattenCategoryTree(nodes, depth, pathPrefix, result) {
        if (!result) result = [];
        if (!nodes || !nodes.length) return result;
        depth = depth || 0;
        pathPrefix = pathPrefix || '';
        for (var i = 0; i < nodes.length; i++) {
            var node = nodes[i];
            var text = node.text || '';
            var path = pathPrefix ? pathPrefix + ' > ' + text : text;
            result.push({
                id: node.id,
                text: text,
                slug: node.slug || '',
                status: (node.status || 'Active').toString(),
                image: node.image || '',
                parent_id: node.parent_id || null,
                depth: depth,
                path: path,
                create_child: node.create_child || 0
            });
            if (node.children && node.children.length) {
                flattenCategoryTree(node.children, depth + 1, path, result);
            }
        }
        return result;
    }

    function getFilteredCategoryList() {
        var list = categoryFlatList || [];
        var q = (categorySearchQuery || '').toLowerCase().trim();
        var statusFilter = categoryFilterStatus || 'all';
        var sortOrder = categorySortOrder || 'tree';
        var filtered = list;
        if (q || statusFilter !== 'all') {
            filtered = list.filter(function (item) {
                var matchSearch = !q ||
                    (item.text && item.text.toLowerCase().indexOf(q) !== -1) ||
                    (item.slug && item.slug.toLowerCase().indexOf(q) !== -1) ||
                    (item.path && item.path.toLowerCase().indexOf(q) !== -1);
                var matchStatus = statusFilter === 'all' || (item.status && item.status === statusFilter);
                return matchSearch && matchStatus;
            });
        }
        if (sortOrder === 'name-asc') {
            filtered = filtered.slice().sort(function (a, b) { return (a.text || '').localeCompare(b.text || ''); });
        } else if (sortOrder === 'name-desc') {
            filtered = filtered.slice().sort(function (a, b) { return (b.text || '').localeCompare(a.text || ''); });
        }
        return filtered;
    }

    function buildCategoryChildMap(list) {
        var map = {};
        for (var i = 0; i < list.length; i++) {
            var p = list[i].parent_id || 'root';
            if (!map[p]) map[p] = [];
            map[p].push(list[i].id);
        }
        return map;
    }

    function getDescendantIds(parentId, map) {
        var ids = [];
        var childIds = map[parentId] || [];
        for (var j = 0; j < childIds.length; j++) {
            ids.push(childIds[j]);
            ids = ids.concat(getDescendantIds(childIds[j], map));
        }
        return ids;
    }

    function renderCategoryListRows(filteredList) {
        var $tbody = $('#category-list-tbody');
        var $empty = $('#category-list-empty');
        var $tableCard = $('.category-table-card-data');
        var $skeleton = $('#category-list-skeleton');
        if (!$tbody.length) return;
        $tbody.empty();
        categoryCollapsedIds = {};
        if (!filteredList || filteredList.length === 0) {
            if ($tableCard.length) $tableCard.hide();
            if ($skeleton.length) $skeleton.hide();
            $empty.show().attr('aria-hidden', 'false');
            return;
        }
        $empty.hide().attr('aria-hidden', 'true');
        if ($skeleton.length) $skeleton.hide();
        if ($tableCard.length) $tableCard.show();
        categoryChildMap = buildCategoryChildMap(filteredList);
        var canDelete = $('#category-info-container').data('can-delete') === 1 || $('#category-info-container').attr('data-can-delete') === '1';
        var editLabel = typeof jsLang === 'function' ? jsLang('Edit') : 'Edit';
        var deleteLabel = typeof jsLang === 'function' ? jsLang('Delete') : 'Delete';
        for (var i = 0; i < filteredList.length; i++) {
            var item = filteredList[i];
            var hasChildren = (categoryChildMap[item.id] || []).length > 0;
            var indent = (item.depth || 0) * 24;
            var parentText = item.depth > 0 ? (categoryFlatList.filter(function (x) { return x.id == item.parent_id; })[0] || {}).text : '';
            var parentTag = parentText ? '<span class="category-parent-tag">' + (parentText || '-') + '</span>' : '<span class="category-parent-tag category-parent-none">—</span>';
            var statusClass = (item.status && item.status.toLowerCase() === 'inactive') ? 'category-chip-inactive' : 'category-chip-active';
            var statusLabel = (item.status && item.status.toLowerCase() === 'inactive') ? (typeof jsLang === 'function' ? jsLang('Inactive') : 'Inactive') : (typeof jsLang === 'function' ? jsLang('Active') : 'Active');
            var statusChip = '<span class="category-chip ' + statusClass + '">' + statusLabel + '</span>';
            var nameStr = (item.text || '').toString();
            var slugStr = (item.slug || '').toString();
            var firstLetter = nameStr.charAt(0).toUpperCase() || '?';
            var imgHtml = item.image
                ? '<img class="category-thumb" src="' + item.image + '" alt="" width="40" height="40">'
                : '<span class="category-letter-avatar" aria-hidden="true">' + firstLetter + '</span>';
            var deleteBtn = canDelete
                ? '<a href="javascript:void(0)" title="' + deleteLabel + '" class="action-icon category-list-delete" data-id="' + item.id + '"><i class="feather icon-trash"></i></a>'
                : '';
            var editBtn = '<a href="javascript:void(0)" title="' + editLabel + '" class="action-icon category-list-edit" data-id="' + item.id + '"><i class="feather icon-edit-1"></i></a>';
            var toggleHtml = hasChildren
                ? '<button type="button" class="btn btn-sm category-list-toggle" data-id="' + item.id + '" aria-label="Toggle"><i class="fa fa-chevron-down category-toggle-icon" aria-hidden="true"></i></button>'
                : '<span class="category-toggle-placeholder"></span>';
            var rowClass = 'category-list-row';
            if (categoryNewlyCreatedId && item.id == categoryNewlyCreatedId) rowClass += ' category-row-newly-added';
            var hierarchyPart = item.depth > 0 ? '<span class="category-hierarchy-guide"><span class="category-hierarchy-line"></span></span>' : '';
            var nameCellContent = hierarchyPart + '<div class="category-name-cell-inner">' +
                '<strong class="category-name-text">' + (item.text || '') + '</strong>' +
                (slugStr ? '<span class="category-slug-subtext">' + slugStr + '</span>' : '') + '</div>';
            var row = '<tr class="' + rowClass + '" data-id="' + item.id + '" data-depth="' + (item.depth || 0) + '" data-parent-id="' + (item.parent_id || '') + '" data-create-child="' + item.create_child + '">' +
                '<td class="category-col-toggle">' + toggleHtml + '</td>' +
                '<td class="category-col-image">' + imgHtml + '</td>' +
                '<td class="category-col-name" style="padding-left:' + indent + 'px;">' + nameCellContent + '</td>' +
                '<td class="category-col-parent">' + parentTag + '</td>' +
                '<td class="category-col-status">' + statusChip + '</td>' +
                '<td class="category-col-actions text-end">' +
                editBtn + (canDelete ? '&nbsp;' + deleteBtn : '') +
                '</td></tr>';
            $tbody.append(row);
        }
        if (categoryNewlyCreatedId) {
            setTimeout(function () {
                $tbody.find('.category-row-newly-added').removeClass('category-row-newly-added');
                categoryNewlyCreatedId = null;
            }, 2500);
        }
    }

    function refreshCategoryList() {
        var $tbody = $('#category-list-tbody');
        var $empty = $('#category-list-empty');
        var $tableCard = $('.category-table-card-data');
        var $skeleton = $('#category-list-skeleton');
        if (!$tbody.length) return;
        $tbody.empty();
        $empty.hide();
        if ($tableCard.length) $tableCard.hide();
        if ($skeleton.length) $skeleton.show();
        $.ajax({
            url: SITE_URL + '/categories/get-data?lang=' + selectedLang,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                categoryFlatList = flattenCategoryTree(data);
                var filtered = getFilteredCategoryList();
                renderCategoryListRows(filtered);
            },
            error: function () {
                if ($skeleton.length) $skeleton.hide();
                if ($tableCard.length) $tableCard.hide();
                $empty.show().attr('aria-hidden', 'false');
            }
        });
    }

    var categoryDrawerScrollTop = 0;

    function openCategoryDrawer() {
        var $drawer = $('#category-drawer');
        if ($drawer.length) {
            categoryDrawerScrollTop = window.scrollY || window.pageYOffset || 0;
            document.body.style.setProperty('--category-body-scroll-top', '-' + categoryDrawerScrollTop + 'px');
            document.body.classList.add('category-drawer-open-body');
            $drawer.addClass('category-drawer-open').attr('aria-hidden', 'false');
        }
    }

    function closeCategoryDrawer() {
        var $drawer = $('#category-drawer');
        if ($drawer.length) {
            $drawer.removeClass('category-drawer-open').attr('aria-hidden', 'true');
            document.body.classList.remove('category-drawer-open-body');
            document.body.style.removeProperty('--category-body-scroll-top');
            window.scrollTo(0, categoryDrawerScrollTop);
        }
    }

    function setCategoryDrawerTitle(title) {
        var $title = $('#category-drawer-title');
        if ($title.length) $title.text(title);
    }

    function setCategorySubmitButtonText(text) {
        var $span = $('#normal_spinnerText');
        if ($span.length) $span.text(text);
    }

    function syncCategoryTogglesFromSelects() {
        $('.category-toggle-input[data-sync-select]').each(function () {
            var id = $(this).data('sync-select');
            var val = $('#' + id).val();
            $(this).prop('checked', val === '1' || val === 1);
        });
    }

    function buildCategoryDrawerImagePreview(imagePath, imageId) {
        if (!imagePath || !imageId) return '';
        var name = 'Category image';
        return '<div class="img-box-two mt-15p"> <img class="fit-boxed" src="' + (imagePath || '') + '" alt="' + (name || '') + '"> <input type="hidden" value="' + imageId + '" name="file_id[]"> <svg class="svg-postion remove-product-image category-drawer-remove-image" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="7" cy="7" r="7" fill="#FCCA19"></circle><path fill-rule="evenodd" clip-rule="evenodd" d="M4.21967 4.21967C4.51256 3.92678 4.98744 3.92678 5.28033 4.21967L9.78033 8.71967C10.0732 9.01256 10.0732 9.48744 9.78033 9.78033C9.48744 10.0732 9.01256 10.0732 8.71967 9.78033L4.21967 5.28033C3.92678 4.98744 3.92678 4.51256 4.21967 4.21967Z" fill="#2C2C2C"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.78033 4.21967C9.48744 3.92678 9.01256 3.92678 8.71967 4.21967L4.21967 8.71967C3.92678 9.01256 3.92678 9.48744 4.21967 9.78033C4.51256 10.0732 4.98744 10.0732 5.28033 9.78033L9.78033 5.28033C10.0732 4.98744 10.0732 4.51256 9.78033 4.21967Z" fill="#2C2C2C"></path></svg> </div>';
    }

    function showCategoryDrawerLoading(show) {
        var $loading = $('#category-drawer-loading');
        if ($loading.length) {
            if (show) {
                $loading.removeClass('d-none').attr('aria-hidden', 'false');
            } else {
                $loading.addClass('d-none').attr('aria-hidden', 'true');
            }
        }
    }

    function loadCategoryEditInDrawer(categoryId) {
        setCategoryDrawerTitle(typeof jsLang === 'function' ? jsLang('Edit Category') : 'Edit Category');
        openCategoryDrawer();
        showCategoryDrawerLoading(true);

        $.ajax({
            url: SITE_URL + '/categories/edit?lang=' + selectedLang,
            type: 'POST',
            data: { _token: token, id: categoryId, create_child: 1 },
            dataType: 'json',
            success: function (data) {
                $('#normal_name').val(data.name);
                $('#normal_slug').val(data.slug);
                $('#normal_status').val(data.status).trigger('change');
                if ($('#normal_is_searchable').length) $('#normal_is_searchable').val(data.is_searchable).trigger('change');
                if ($('#normal_is_featured').length) $('#normal_is_featured').val(data.is_featured).trigger('change');
                if ($('#normal_sell_commissions').length) $('#normal_sell_commissions').val(typeof getDecimalNumberFormat === 'function' ? getDecimalNumberFormat(data.sell_commissions) : data.sell_commissions);
                $('#normal_edit_id').val(categoryId);
                $('#normal_type').val('edit');
                $('#normal_parentBlock').show();
                var $parentSelect = $('select#normal_parent_id');
                $parentSelect.empty().append('<option value="">' + (typeof jsLang === 'function' ? jsLang('Select One') : 'Select One') + '</option>');
                var list = categoryFlatList || [];
                for (var k = 0; k < list.length; k++) {
                    var item = list[k];
                    if (String(item.id) === String(categoryId)) continue;
                    if (typeof item.depth === 'number' && item.depth > 1) continue;
                    var label = (item.path && item.path.length > 0) ? item.path : item.text;
                    $parentSelect.append('<option value="' + item.id + '">' + (label || item.id) + '</option>');
                }
                $parentSelect.val(data.parent_id || '');
                var $preview = $('#normal_preview-image');
                if ($preview.length && data.image_path && data.image_id) {
                    $preview.html(buildCategoryDrawerImagePreview(data.image_path, data.image_id));
                } else {
                    $preview.empty();
                }
                setCategoryDrawerTitle(typeof jsLang === 'function' ? jsLang('Edit Category') : 'Edit Category');
                setCategorySubmitButtonText(typeof jsLang === 'function' ? jsLang('Save') : 'Save');
                syncCategoryTogglesFromSelects();
                showCategoryDrawerLoading(false);
            },
            error: function () {
                showCategoryDrawerLoading(false);
                setCategoryDrawerTitle(typeof jsLang === 'function' ? jsLang('Error loading category') : 'Error loading category');
            }
        });
    }

    function openCategoryDrawerForCreate(mode, parentId, parentName) {
        showCategoryDrawerLoading(false);
        $('#normal_type').val('store');
        $('#normal_edit_id').val('');
        $('#categoryFormNormal')[0].reset();
        $('#normal_status').val('Active').trigger('change');
        if ($('#normal_is_searchable').length) $('#normal_is_searchable').val(1).trigger('change');
        if ($('#normal_is_featured').length) $('#normal_is_featured').val(1).trigger('change');
        var $preview = $('#normal_preview-image');
        if ($preview.length) $preview.empty();
        setCategorySubmitButtonText(typeof jsLang === 'function' ? jsLang('Create Category') : 'Create Category');
        var $parentSelect = $('select#normal_parent_id');
        $parentSelect.empty().append('<option value="">' + (typeof jsLang === 'function' ? jsLang('Select One') : 'Select One') + '</option>');
        if (mode === 'sub' && parentId) {
            $parentSelect.append('<option value="' + parentId + '" selected>' + (parentName || parentId) + '</option>');
            $('#normal_parentBlock').show();
            setCategoryDrawerTitle(typeof jsLang === 'function' ? jsLang('New Sub Category') : 'New Sub Category');
        } else if (mode === 'root') {
            $('#normal_parentBlock').hide();
            setCategoryDrawerTitle(typeof jsLang === 'function' ? jsLang('New Root Category') : 'New Root Category');
        } else {
            var list = categoryFlatList || [];
            for (var j = 0; j < list.length; j++) {
                var p = list[j];
                if (typeof p.depth === 'number' && p.depth > 1) continue;
                var label = (p.path && p.path.length > 0) ? p.path : p.text;
                $parentSelect.append('<option value="' + p.id + '">' + (label || p.id) + '</option>');
            }
            $('#normal_parentBlock').show();
            setCategoryDrawerTitle(typeof jsLang === 'function' ? jsLang('New Sub Category') : 'New Sub Category');
        }
        syncCategoryTogglesFromSelects();
        openCategoryDrawer();
    }

    function showCategoryDeleteModal(categoryId, source) {
        source = source || 'list';
        var $modal = $('#categoryDeleteModal');
        if ($modal.length && typeof bootstrap !== 'undefined') {
            $modal.data('delete-id', categoryId).data('delete-source', source);
            var modal = bootstrap.Modal.getOrCreateInstance($modal[0]);
            modal.show();
        } else if (typeof confirmDeleteAjax === 'function') {
            confirmDeleteAjax(SITE_URL + '/categories/delete', 'POST', categoryId, source === 'tree' ? 'resfreshJSTree' : 'refreshCategoryList');
        }
    }

    $('#categoryDeleteModal').on('show.bs.modal.categoryDelUi', function () {
        $('body').addClass('admin-delete-modal-open');
    });
    $('#categoryDeleteModal').on('hidden.bs.modal.categoryDelUi', function () {
        $('body').removeClass('admin-delete-modal-open');
        $('#category-delete-confirm-btn')
            .prop('disabled', false)
            .attr('aria-disabled', 'false')
            .removeClass('is-loading');
    });

    $(document).off('click.categoryDeleteConfirm').on('click.categoryDeleteConfirm', '#category-delete-confirm-btn', function () {
        var id = $('#categoryDeleteModal').data('delete-id');
        if (!id) return;
        var source = $('#categoryDeleteModal').data('delete-source') || 'list';
        var $btn = $(this);
        $btn.addClass('is-loading').prop('disabled', true);
        $.post(SITE_URL + '/categories/delete', { _token: token, id: id })
            .done(function (r) {
                if (r && r.status == 1) {
                    categoryShowToast('success', typeof jsLang === 'function' ? jsLang('Deleted successfully') : 'Deleted successfully');
                    var $m = $('#categoryDeleteModal');
                    if ($m.length && typeof bootstrap !== 'undefined') {
                        var inst = bootstrap.Modal.getInstance($m[0]);
                        if (inst) inst.hide();
                    }
                    if (source === 'tree') {
                        resfreshJSTree();
                        setSubCategoryButtonDisabled(true);
                        $('.delete').hide();
                        if ($('#evts').length && $('#evts').jstree(true)) {
                            $('#evts').jstree(true).deselect_all();
                        }
                        $('#parentBlock').hide();
                        $('select[name="parent_id"]').empty();
                        $('#type').val('store');
                        $('#status').val('Active').trigger('change');
                        $('#is_searchable').val(1).trigger('change');
                        $('#edit_id').val(null);
                        $('#categoryFrom .preview-image, #preview-image').empty();
                        if ($('#category-tree-view').is(':visible')) {
                            $('#imageBlock').show();
                            $('#imageBlock .cursor_pointer').empty();
                        }
                        if ($('#note_txt_2').length) $('#note_txt_2').hide();
                        if (document.getElementById('categoryFrom')) document.getElementById('categoryFrom').reset();
                    }
                    if (typeof refreshCategoryList === 'function') {
                        refreshCategoryList();
                    }
                } else if (r && r.error) {
                    categoryShowToast('error', r.error);
                }
            })
            .always(function () {
                $btn.removeClass('is-loading').prop('disabled', false).attr('aria-disabled', 'false');
            });
    });

    function initListView() {
        if (listViewInited) return;
        listViewInited = true;
        setSubCategoryButtonDisabled(false);
        refreshCategoryList();
        $('.root-category').off('click.list').on('click.list', function () {
            if ($('#category-normal-view').is(':visible')) {
                openCategoryDrawerForCreate('root');
                return false;
            }
        });
        $('.sub-category').off('click.list').on('click.list', function () {
            if ($('#category-normal-view').is(':visible')) {
                openCategoryDrawerForCreate('list');
                return false;
            }
        });
        $('#category-drawer-overlay, #category-drawer-close, #category-drawer-cancel-btn').on('click', function () {
            closeCategoryDrawer();
        });
        $(document).on('click', '.category-media-preview .remove-product-image, .category-media-preview .category-drawer-remove-image', function () {
            $(this).closest('.img-box-two').remove();
        });
        $(document).on('file-attached', '#category-info-container .media-manager-img', function (e, param) {
            if ($(this).attr('data-val') !== 'single') return;
            var self = this;
            $('#category-info-container #img-container, #category-info-container #normal_img-container').empty();
            setTimeout(function () {
                var $preview = $(self).closest('.preview-parent').find('.preview-image');
                var $boxes = $preview.find('.img-box-two');
                if ($boxes.length > 1) {
                    $boxes.slice(1).remove();
                }
            }, 0);
        });
        $(document).off('submit.categoryNormal').on('submit.categoryNormal', '#categoryFormNormal', function (e) {
            e.preventDefault();
            var form = this;
            var isEdit = $('#normal_type').val() === 'edit';
            var url = isEdit ? (SITE_URL + '/categories/update?lang=' + selectedLang) : (SITE_URL + '/categories/store?lang=' + selectedLang);
            var formData = new FormData(form);
            formData.set('type', isEdit ? 'edit' : 'store');
            if (isEdit) formData.set('edit_id', $('#normal_edit_id').val());
            $('#normal_btnSubmit').prop('disabled', true);
            $('.normal-spinner').removeClass('d-none');
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (r) {
                    if (r && r.status == 1) {
                        categoryShowToast('success', typeof jsLang === 'function' ? jsLang('Saved successfully') : 'Saved successfully');
                        closeCategoryDrawer();
                        if (!isEdit && r.category_id) categoryNewlyCreatedId = r.category_id;
                        refreshCategoryList();
                    } else if (r && r.error) {
                        categoryShowToast('error', r.error);
                    }
                },
                complete: function () {
                    $('#normal_btnSubmit').prop('disabled', false);
                    $('.normal-spinner').addClass('d-none');
                }
            });
        });
        $(document).on('click', '.category-list-edit', function () {
            var id = $(this).data('id');
            loadCategoryEditInDrawer(id);
        });
        $(document).on('click', '.category-list-delete', function () {
            var id = $(this).data('id');
            showCategoryDeleteModal(id);
        });
        $(document).on('click', '.category-list-toggle', function () {
            var id = $(this).data('id');
            categoryCollapsedIds[id] = !categoryCollapsedIds[id];
            var descendantIds = getDescendantIds(id, categoryChildMap);
            var $tbody = $('#category-list-tbody');
            for (var k = 0; k < descendantIds.length; k++) {
                $tbody.find('tr[data-id="' + descendantIds[k] + '"]').toggle(!categoryCollapsedIds[id]);
            }
            $(this).find('.category-toggle-icon').removeClass('fa-chevron-right fa-chevron-down').addClass(categoryCollapsedIds[id] ? 'fa-chevron-right' : 'fa-chevron-down');
        });
        $(document).on('change', '.category-toggle-input[data-sync-select]', function () {
            var id = $(this).data('sync-select');
            $('#' + id).val($(this).prop('checked') ? '1' : '0');
        });
        $(document).on('change', '#normal_is_searchable, #normal_is_featured', function () {
            syncCategoryTogglesFromSelects();
        });
        syncCategoryTogglesFromSelects();
        $(document).on('keyup', '#normal_name', function () {
            var str = (this.value || '').replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, '').trim().toLowerCase().replace(/\s/g, '-');
            if (vendorId && String(vendorId) !== 'undefined') str = str + '-' + vendorId;
            $('#normal_slug').val(str);
        });
        $(document).on('keyup', '#normal_slug', function () {
            var str = (this.value || '').replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, '').trim().toLowerCase().replace(/\s/g, '-');
            $(this).val(str);
        });
        $(document).on('input', '#category-search', function () {
            categorySearchQuery = $(this).val() || '';
            var filtered = getFilteredCategoryList();
            renderCategoryListRows(filtered);
        });
        $(document).on('click', '.category-filter-option', function (e) {
            e.preventDefault();
            var status = $(this).data('status');
            categoryFilterStatus = status || 'all';
            $('.category-filter-option').removeClass('active');
            $(this).addClass('active');
            var filtered = getFilteredCategoryList();
            renderCategoryListRows(filtered);
        });
        $(document).on('click', '.category-sort-option', function (e) {
            e.preventDefault();
            var sort = $(this).data('sort');
            categorySortOrder = sort || 'tree';
            $('.category-sort-option').removeClass('active');
            $(this).addClass('active');
            var filtered = getFilteredCategoryList();
            renderCategoryListRows(filtered);
        });
    }

    window.refreshCategoryList = refreshCategoryList;

    $(document).on('change', '#category-view-toggle input[name="category_view_mode"]', function () {
        var mode = $(this).val();
        setCategoryViewMode(mode);
        applyCategoryViewMode(mode);
        if (mode === 'tree') {
            if (!treeViewInited) initTreeView();
            else resfreshJSTree();
        } else {
            setSubCategoryButtonDisabled(false);
            initListView();
            refreshCategoryList();
        }
    });

    $(document).on("change", "#category_language_id", function () {
        if (currentCategoryUrl) {
            window.location = currentCategoryUrl + '?lang=' + $(this).val();
        }
    });

    if (typeof $.fn.select2 !== 'undefined' && $('#category_language_id').length) {
        $('#category_language_id').select2({
            width: '180px',
            minimumResultsForSearch: 5,
            allowClear: false
        });
    }

    function initTreeView() {
        if (treeViewInited) return;
        treeViewInited = true;
        setSubCategoryButtonDisabled(true);
        $('#parentBlock').hide();
        $('.delete').hide();
        if ($('#category-tree-view').length && $('#category-tree-view').is(':visible')) {
            $('#imageBlock').show();
            $('#imageBlock .cursor_pointer').empty();
        } else {
            $('#imageBlock').hide();
        }

        $(document).on('keyup', '#name', function () {
            var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
            str = str.trim().toLowerCase().replace(/\s/g, "-");
            if (vendorId && String(vendorId) !== 'undefined') str = str + '-' + vendorId;
            $('#slug').val(str);
            if ($('#name').val().length >= 4 && (isAllowSuggestion == 1 || isAllowSuggestion === '1')) categorySuggestion();
            else removeSuggestion();
        });
        $(document).on('keyup', '#slug', function () {
            var str = this.value.replace(/[&\/\\#@,+()$~%.'":*?<>{}]/g, "");
            $('#slug').val(str.trim().toLowerCase().replace(/\s/g, "-"));
        });

        $("#categoryFrom").on('submit', function (event) {
            event.preventDefault();
            var form = this;
            var url = ($('#type').val() == "store" ? "/categories/store" : "/categories/update") + '?lang=' + selectedLang;
            $.ajax({
                type: "POST",
                url: SITE_URL + url,
                data: new FormData(form),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == 1) {
                        categoryShowToast('success', typeof jsLang === 'function' ? jsLang('Successfully Saved') : 'Successfully Saved');
                        resetForm();
                        resfreshJSTree();
                    } else {
                        categoryShowToast('error', (data && data.error) ? data.error : (typeof jsLang === 'function' ? jsLang('Something went wrong, please try again.') : 'Something went wrong, please try again.'));
                    }
                },
                error: function () {
                    categoryShowToast('error', typeof jsLang === 'function' ? jsLang('Something went wrong, please try again.') : 'Something went wrong, please try again.');
                }
            });
        });


        $('.sub-category').off('click.tree').on('click.tree', function () {
            if ($('#category-normal-view').is(':visible')) return;
        resetForm();
        $('#parentBlock').show();
            $('select[name="parent_id"]').empty().append('<option value="' + selectedNodeId + '">' + selectedNodeName + '</option>');
        $('#type').val('store');
        $('.delete').hide();
    });
        $('.root-category').off('click.tree').on('click.tree', function () {
            if ($('#category-normal-view').is(':visible')) return;
            if ($('#evts').length && $('#evts').jstree(true)) {
                $('#evts').jstree(true).deselect_all();
            }
        $('#parentBlock').hide();
        $('select[name="parent_id"]').empty();
        resetForm();
        $('#type').val('store');
        $('.delete').hide();
    });
        $('.delete').off('click.tree').on('click.tree', function (e) {
            if ($('#category-normal-view').is(':visible')) return;
            e.preventDefault();
            showCategoryDeleteModal(selectedNodeId, 'tree');
        });
        $(document).on('click', '.category-editor-cancel', function () {
            if ($('#category-normal-view').is(':visible')) return;
            if ($('#evts').length && $('#evts').jstree(true)) $('#evts').jstree(true).deselect_all();
            $('#parentBlock').hide();
            $('select[name="parent_id"]').empty();
            resetForm();
            $('#type').val('store');
            $('.delete').hide();
        });

        function resetForm() {
        $('#status').val("Active").trigger('change');
        $('#is_searchable').val(1).trigger('change');
        $('#edit_id').val(null);
            $('#preview-image').empty();
            if ($('#category-tree-view').is(':visible')) {
                $('#imageBlock').show();
                $('#imageBlock .cursor_pointer').empty();
            } else {
        $('#imageBlock').hide();
            }
            if ($('#note_txt_2').length) $('#note_txt_2').hide();
            if (document.getElementById("categoryFrom")) document.getElementById("categoryFrom").reset();
    }

        function getInfo(categoryId, createChild) {
        $('#imageBlock').show();
        $('.cursor_pointer > img').remove();
            if ($(".sub-category").is(":disabled") && createChild == 1) setSubCategoryButtonDisabled(false);
            else if (!$(".sub-category").is(":disabled") && createChild == 0) setSubCategoryButtonDisabled(true);
        editId = categoryId;
        $.ajax({
                url: SITE_URL + '/categories/edit?lang=' + selectedLang,
            type: "POST",
                data: { _token: token, id: categoryId, create_child: createChild },
            dataType: "json",
                success: function (data) {
                    $('input').each(function () { this.setCustomValidity(''); });
                $('#name').val(data.name).siblings('.error').remove();
                $('#slug').val(data.slug).siblings('.error').remove();
                $('#status').val(data.status).trigger('change');
                $('#is_searchable').val(data.is_searchable).trigger('change');
                $('#is_featured').val(data.is_featured).trigger('change');
                    $('#sell_commissions').val(typeof getDecimalNumberFormat === 'function' ? getDecimalNumberFormat(data.sell_commissions) : data.sell_commissions);
                $('#edit_id').val(editId);
                    $('.cursor_pointer').empty().append('<img class="profile-user-img img-responsive fixSize" src="' + (data.image_path || '') + '" alt="" class="img-thumbnail attachment-styles"/>');
                    var $treePreview = $('#preview-image');
                    if ($treePreview.length && data.image_path && data.image_id) {
                        $treePreview.html(buildCategoryDrawerImagePreview(data.image_path, data.image_id));
                    } else if ($treePreview.length) {
                        $treePreview.empty();
                    }
                if (data.parent_id != null) {
                    $('#parentBlock').show();
                        $('select[name="parent_id"]').empty().append('<option value="' + data.parent_id + '">' + data.parent_name + '</option>');
                } else {
                    $('select[name="parent_id"]').empty();
                    $('#parentBlock').hide();
                }
                removeSuggestion();
            }
        });
    }

        function doMoveNode(id, parent, oldParent, position, oldPosition) {
            $.ajax({
                type: "POST",
                url: SITE_URL + '/categories/move-node?lang=' + selectedLang,
                data: { _token: token, data: { id: id, parent: parent, old_parent: oldParent, position: position, old_position: oldPosition } },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 1) {
                        categoryShowToast('success', typeof jsLang === 'function' ? jsLang('Successfully Saved') : 'Successfully Saved');
        resetForm();
        resfreshJSTree();
                    } else {
                        categoryShowToast('error', (data && data.error) ? data.error : (typeof jsLang === 'function' ? jsLang('Something went wrong, please try again.') : 'Something went wrong, please try again.'));
                    }
                },
                error: function () {
                    categoryShowToast('error', typeof jsLang === 'function' ? jsLang('Something went wrong, please try again.') : 'Something went wrong, please try again.');
                }
            });
        }

        $('#evts').on("changed.jstree", function (e, data) {
            if (data.selected.length) {
                $('#type').val("edit");
                $('.delete').show();
                selectedNodeId = data.instance.get_node(data.selected[0]).id;
                selectedNodeName = data.instance.get_node(data.selected[0]).text;
                getInfo(selectedNodeId, data.instance.get_node(data.selected[0]).original.create_child);
            }
        }).on('move_node.jstree', function (e, data) {
            if (data.node.parents.length < 4) {
                doMoveNode(data.node.id, data.parent, data.old_parent, data.position, data.old_position);
            } else {
                categoryShowToast('error', typeof jsLang === 'function' ? jsLang('Not Permitted') : 'Not Permitted');
                resfreshJSTree();
            }
        }).jstree({
            'core': {
                "check_callback": true,
                'data': {
                    "url": SITE_URL + '/categories/get-data?lang=' + selectedLang,
                    "dataType": "json"
                }
            },
            "plugins": ["dnd"],
            "themes": { "dots": false, "icons": false }
        });

        function categorySuggestion() {
        $.ajax({
            url: SITE_URL + '/categories/suggestion',
            type: "GET",
                data: { parnet_id: $('#parentBlock').css('display') == 'none' ? null : $('#parent_id').val(), name: $('#name').val(), lang: selectedLang },
            dataType: "json",
                success: function (data) {
                if (typeof data.id != 'undefined') {
                    $('#has_category').removeClass('display_none');
                        var assignLink = data.name + ' ' + (typeof jsLang === 'function' ? jsLang('found!') : 'found!') + ' ' + (typeof jsLang === 'function' ? jsLang('Please') : 'Please') + ' <a href="javascript:void(0)" data-category_id="' + data.id + '" class="assigned_category" id="assigned_category">' + (typeof jsLang === 'function' ? jsLang('click here') : 'click here') + '</a> ' + (typeof jsLang === 'function' ? jsLang('to assign') : 'to assign');
                    $('#has_category').html(assignLink);
                        $('#assigned_category').on("click", assignCategory);
                    } else removeSuggestion();
            }
        });
    }
        function removeSuggestion() {
            if ($('#has_category').length) { $('#has_category').empty().addClass('display_none'); }
        }
        function assignCategory() {
            var categoryId = $('#assigned_category').data('category_id');
            if (typeof swal === 'undefined') return;
            swal({ title: jsLang ? jsLang("Are you sure?") : "Are you sure?", icon: "warning", buttons: true, dangerMode: true })
                .then(function (willDelete) {
                if (willDelete) {
                    $.ajax({
                            type: "POST", url: SITE_URL + '/categories/assign-vendor',
                            data: { _token: token, category_id: categoryId },
                        success: function (data) {
                            if (data.status == 1) {
                                    categoryShowToast('success', typeof jsLang === 'function' ? jsLang('Assigned Successfully') : 'Assigned Successfully');
                                    $('#has_category').addClass('display_none').empty();
                                resetForm();
                                resfreshJSTree();
                            } else {
                                    categoryShowToast('error', typeof jsLang === 'function' ? jsLang('Something went wrong, please try again.') : 'Something went wrong, please try again.');
                                }
                        }
                    });
                }
            });
        }
    }

    var initialMode = getCategoryViewMode();
    setCategoryViewMode(initialMode);
    applyCategoryViewMode(initialMode);
    if (initialMode === 'tree') {
        initTreeView();
    } else {
        if ($('#category-normal-view').length) {
            initListView();
        } else {
            $('#category-tree-view').show();
            initTreeView();
        }
    }
}
