{{--
    Shared category form partial for admin and vendor.
    Required: $indexRoute, $storeRoute, $permissionController, $showCommission, $showSuggestionUi, $imageTypes, $showFileNote, $languages
    Material Design / Google Admin style layout.
--}}
<div class="col-sm-12 category-page-wrapper" id="category-info-container" data-can-delete="{{ optional(auth()->user())->hasPermission($permissionController . '@destroy') ? '1' : '0' }}" data-sub-category-disabled-title="{{ __('Select a category in the tree first to add a subcategory under it.') }}">
    <div class="category-page">
        {{-- Page Header: title, subtitle, primary actions --}}
        <header class="category-page-header">
            <div class="category-page-header-inner">
                <div class="category-page-header-text">
                    <h1 class="category-page-title"><a href="{{ $indexRoute }}">{{ __('Categories') }}</a></h1>
                    <p class="category-page-subtitle">{{ __('Manage product categories and hierarchy') }}</p>
                </div>
                <div class="category-page-header-actions">
                    <x-backend.button.save type="button" id="category-btn-root" :label="__('New :x', ['x' => __('Root Category')])" class="root-category">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </x-backend.button.save>
                    <x-backend.button.save type="button" id="category-btn-sub" :label="__('New :x', ['x' => __('Sub Category')])" class="sub-category">
                        <i class="fa fa-level-down-alt" aria-hidden="true"></i>
                    </x-backend.button.save>
                </div>
            </div>
        </header>

        {{-- Toolbar: view toggle, language, search, filter --}}
        <div class="category-toolbar">
            <div class="category-toolbar-group category-toolbar-view">
                <div class="btn-group btn-group-sm" role="group" id="category-view-toggle">
                    <input type="radio" class="btn-check" name="category_view_mode" id="category-view-tree" value="tree" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="category-view-tree">{{ __('Tree View') }}</label>
                    <input type="radio" class="btn-check" name="category_view_mode" id="category-view-list" value="list" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="category-view-list">{{ __('List View') }}</label>
                </div>
            </div>
            <div class="category-toolbar-group category-toolbar-filters">
                <div class="category-search-wrap">
                    <i class="fa fa-search category-search-icon" aria-hidden="true"></i>
                    <input type="search" class="form-control category-search-input" id="category-search" placeholder="{{ __('Search categories...') }}" autocomplete="off">
                </div>
                <select class="form-control category-language-select" name="category_language_id" id="category_language_id" aria-label="{{ __('Language') }}">
                    @foreach ($languages as $language)
                        <option value="{{ $language->short_name }}" {{ (isset(request()->lang) && $language->short_name == request()->lang) || (!isset(request()->lang) && $language->short_name == config('app.locale')) ? 'selected' : '' }}>
                            {{ $language->name }}
                        </option>
                    @endforeach
                </select>
                <div class="dropdown category-filter-dropdown">
                    <button type="button" class="btn category-btn-icon" id="category-filter-btn" data-bs-toggle="dropdown" data-bs-offset="0,4" aria-expanded="false" title="{{ __('Filter') }}">
                        <i class="fa fa-filter" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start category-filter-menu" id="category-filter-menu">
                        <li><a class="dropdown-item category-filter-option active" href="javascript:void(0)" data-status="all">{{ __('All statuses') }}</a></li>
                        <li><a class="dropdown-item category-filter-option" href="javascript:void(0)" data-status="Active">{{ __('Active') }}</a></li>
                        <li><a class="dropdown-item category-filter-option" href="javascript:void(0)" data-status="Inactive">{{ __('Inactive') }}</a></li>
                    </ul>
                </div>
                <div class="dropdown category-sort-dropdown">
                    <button type="button" class="btn category-btn-icon category-sort-btn" id="category-sort-btn" data-bs-toggle="dropdown" data-bs-offset="0,4" aria-expanded="false" title="{{ __('Sort') }}">
                        <i class="fa fa-sort-amount-down-alt" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end category-sort-menu" id="category-sort-menu">
                        <li><a class="dropdown-item category-sort-option active" href="javascript:void(0)" data-sort="name-asc">{{ __('Name (A–Z)') }}</a></li>
                        <li><a class="dropdown-item category-sort-option" href="javascript:void(0)" data-sort="name-desc">{{ __('Name (Z–A)') }}</a></li>
                        <li><a class="dropdown-item category-sort-option" href="javascript:void(0)" data-sort="tree">{{ __('Hierarchy') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Content card: tree view and list view panels --}}
        <div class="card category-content-card">
            <div class="card-block category-content-block">
                {{-- Tree view panel: dual-pane (tree sidebar + editor) --}}
                <div id="category-tree-view" class="category-view-panel">
                    <div class="category-dual-pane" id="add-category">
                        <aside class="category-tree-pane" aria-label="{{ __('Category tree') }}">
                            <div id="evts" class="category-jstree demo"></div>
                        </aside>
                        <main class="category-editor-pane" aria-label="{{ __('Category editor') }}">
                            <form action="{{ $storeRoute }}" method="post" id="categoryFrom" class="category-editor-form form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="category-editor-inner">
                                    <header class="category-editor-header">
                                        <h2 class="category-editor-title">{{ __('Category Information') }}</h2>
                                    </header>
                                    <div class="category-editor-body">
                                        <div class="category-editor-fields" id="formBlock">
                                            @include('partials.category-form-fields', [
                                                'permissionController' => $permissionController,
                                                'showCommission' => $showCommission,
                                                'showSuggestionUi' => $showSuggestionUi,
                                                'showFileNote' => $showFileNote,
                                                'imageTypes' => $imageTypes,
                                                'fieldPrefix' => '',
                                            ])
                                            <div class="category-editor-actions">
                                                @hasPermission($permissionController . '@destroy')
                                                    <x-backend.button.delete type="button" :label="__('Delete')" class="delete all-cancel-bt" />
                                                @endhasPermission
                                                <div class="category-editor-actions-primary">
                                                    @hasAnyPermission([$permissionController . '@store', $permissionController . '@update'])
                                                        <x-backend.button.cancel :label="__('Discard')" class="category-editor-cancel" />
                                                        <x-backend.button.save id="btnSubmit" :label="__('Save')">
                                                            <i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none" aria-hidden="true"></i>
                                                        </x-backend.button.save>
                                                    @endhasAnyPermission
                                                </div>
                                            </div>
                                        </div>
                                        <div class="category-editor-preview" id="imageBlock">
                                            <div class="category-editor-image-wrap">
                                                <span class="category-editor-image-label">{{ __('Image') }}</span>
                                                <div class="fixSize">
                                                    <a class="cursor_pointer" href="javascript:void(0)" data-lightbox="image-1">
                                                        <img class="profile-user-img img-responsive fixSize category-editor-thumb" src="" alt="{{ __('Image') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </main>
                    </div>
                </div>

                {{-- List view panel --}}
                <div id="category-normal-view" class="category-view-panel" style="display: none;">
                    <div id="category-list-skeleton" class="category-table-card category-skeleton-wrap" style="display: none;">
                        <div class="category-skeleton-row"></div>
                        <div class="category-skeleton-row"></div>
                        <div class="category-skeleton-row"></div>
                        <div class="category-skeleton-row"></div>
                        <div class="category-skeleton-row"></div>
                    </div>
                    <div class="category-table-card category-table-card-data">
                        <div class="category-table-scroll">
                            <table class="table category-list-table" id="category-list-table">
                                <thead>
                                    <tr>
                                        <th class="category-col-toggle" scope="col"></th>
                                        <th class="category-col-image" scope="col">{{ __('Image') }}</th>
                                        <th class="category-col-name" scope="col">{{ __('Name') }}</th>
                                        <th class="category-col-parent" scope="col">{{ __('Parent') }}</th>
                                        <th class="category-col-status" scope="col">{{ __('Status') }}</th>
                                        <th class="category-col-actions text-end" scope="col">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="category-list-tbody">
                                    {{-- Filled by JS from get-data --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="category-list-empty" class="category-empty-state" style="display: none;" aria-hidden="true">
                        <div class="category-empty-illustration" aria-hidden="true">
                            <svg class="category-empty-svg" viewBox="0 0 200 160" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="">
                                <path d="M80 20h60l20 30v90H40V20h40z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.4"/>
                                <path d="M80 20v90H40V20h40z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M100 60h40M100 75h40M100 90h25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" opacity="0.6"/>
                            </svg>
                        </div>
                        <p class="category-empty-title">{{ __('No categories created yet.') }}</p>
                        <p class="category-empty-text">{{ __('Create your first category to organize your products.') }}</p>
                        <x-backend.button.save type="button" class="category-empty-cta root-category" :label="__('Create your first category')">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </x-backend.button.save>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Right-side drawer for Create/Edit (List view) – preferred UX --}}
<div id="category-drawer" class="category-drawer" aria-hidden="true">
    <div class="category-drawer-overlay" id="category-drawer-overlay" aria-label="{{ __('Close') }}"></div>
    <div class="category-drawer-panel" role="dialog" aria-labelledby="category-drawer-title" aria-modal="true">
        <div class="category-drawer-header">
            <h2 class="category-drawer-title" id="category-drawer-title">{{ __('Category') }}</h2>
            <button type="button" class="category-drawer-close" id="category-drawer-close" aria-label="{{ __('Close') }}">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </div>
        <div class="category-drawer-body">
            <div id="category-drawer-loading" class="category-drawer-loading d-none" aria-hidden="true">
                <div class="category-drawer-loading-spinner"></div>
                <span class="category-drawer-loading-text">{{ __('Loading...') }}</span>
            </div>
            <form action="{{ $storeRoute }}" method="post" id="categoryFormNormal" class="form-horizontal category-drawer-form" enctype="multipart/form-data">
                @csrf
                @include('partials.category-form-fields', [
                    'permissionController' => $permissionController,
                    'showCommission' => $showCommission,
                    'showSuggestionUi' => $showSuggestionUi,
                    'showFileNote' => $showFileNote,
                    'imageTypes' => $imageTypes,
                    'fieldPrefix' => 'normal_',
                ])
                <div class="category-drawer-footer">
                    <div class="category-drawer-footer-actions">
                        <x-backend.button.cancel id="category-drawer-cancel-btn" :label="__('Cancel')" class="category-drawer-cancel" />
                        @hasAnyPermission([$permissionController . '@store', $permissionController . '@update'])
                            <x-backend.button.save id="normal_btnSubmit" :label="__('Create Category')">
                                <span class="normal-spinner spinner-border spinner-border-sm d-none" role="status"></span>
                            </x-backend.button.save>
                        @endhasAnyPermission
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Fallback modal (kept for compatibility; drawer is primary in list view) --}}
<div class="modal fade" id="categoryFormModal" tabindex="-1" aria-labelledby="categoryFormModalLabel" aria-hidden="true" data-bs-backdrop="static" style="display: none;">
    <div class="modal-dialog modal-lg category-modal-dialog">
        <div class="modal-content category-modal-content">
            <div class="modal-header category-modal-header">
                <h5 class="modal-title" id="categoryFormModalLabel">{{ __('Category Information') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('Use the panel on the right to create or edit categories.') }}</p>
            </div>
        </div>
    </div>
</div>

{{-- Delete confirmation modal --}}
<x-backend.delete-modal
    modalId="categoryDeleteModal"
    titleId="categoryDeleteModalLabel"
    messageId="categoryDeleteModalMessage"
    :title="__('Delete Category?')"
    :messagePrimary="__('Are you sure you want to delete this category?')"
    :messageSecondary="__('This action will also remove all subcategories and cannot be undone.')"
    confirmLabel="{{ __('Delete') }}"
    submitBtnId="category-delete-confirm-btn"
    :includeBatchDelete="false"
    :includeScript="false"
/>

@include('mediamanager::image.modal_image')
