@extends('admin.layouts.app')
@section('page_title', __('Menus'))
@section('css')
    <link rel="stylesheet" href="{{ asset('dist/css/menu-builder.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
@endsection
@section('content')
@php
    $currentUrl = url()->current();
    $config = [
        'menuId' => (int) ($menuId ?? 0),
        'lang' => $selectedLang ?? 'en',
        'currentUrl' => $currentUrl,
        'routes' => [
            'custom' => route('menu.custom'),
            'update' => route('menu.update'),
            'control' => route('menu.control'),
            'itemDelete' => route('menu.item.delete'),
            'menuDelete' => route('menu.delete'),
            'create' => route('menu.create'),
            'resolveRoute' => route('menu.resolve-route'),
            'icons' => route('menu.icons'),
        ],
        'csrf' => csrf_token(),
        'menulist' => $menulist->map(fn($r) => ['id' => $r->id, 'name' => $r->name])->values()->all(),
        'permissionOptions' => $permissionOptions ?? [],
    ];
    $sourceItems = [];
    if (!empty($adminMenus) && $adminMenus->count() > 0) {
        foreach ($adminMenus as $v) {
            if ($v->getModuleName($v->permission)) {
                $sourceItems[] = ['id' => $v->id, 'name' => $v->name, 'slug' => $v->slug, 'url' => $v->url, 'permission' => $v->permission ?? '', 'isDefault' => (int) $v->is_default];
            }
        }
    } elseif (!empty($pages) && $pages->count() > 0) {
        foreach ($pages as $p) {
            $sourceItems[] = ['id' => $p->id, 'name' => $p->name, 'slug' => $p->slug ?? $p->name, 'url' => $p->slug ?? '', 'permission' => '', 'isDefault' => 1];
        }
    }
    $config['sourceItems'] = $sourceItems;
@endphp
<meta name="viewport" content="width=device-width, initial-scale=1">

<div id="menu-builder-app" class="gmb" data-lang="{{ $config['lang'] }}">
    <header class="gmb-toolbar">
        <div class="gmb-toolbar-inner">
            <h1 class="gmb-toolbar-title">@if(isset($menuName->name) && !empty($menuName->name)) {{ ucwords($menuName->name) }} @endif {{ __('Menus') }}</h1>
            <form method="get" action="{{ $currentUrl }}" class="gmb-toolbar-form" id="gmb-pref-form">
                <div class="gmb-toolbar-group">
                    <label for="gmb-menu-select" class="gmb-toolbar-label">{{ __('Location') }}</label>
                    <div class="gmb-toolbar-select-wrap">
                        <select name="menu" id="gmb-menu-select" class="gmb-toolbar-select gmb-select2">
                            @foreach ($menulist as $role)
                                <option {{ $menuId == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="gmb-toolbar-group">
                    <label for="gmb-lang-select" class="gmb-toolbar-label">{{ __('Language') }}</label>
                    <div class="gmb-toolbar-select-wrap">
                        <select name="lang" id="gmb-lang-select" class="gmb-toolbar-select gmb-select2">
                            @foreach (\App\Models\Language::getAll()->where('status', 'Active') as $language)
                                <option {{ ($selectedLang ?? '') == $language->short_name ? 'selected' : '' }} value="{{ $language->short_name }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </header>

    <div class="gmb-layout">
        {{-- LEFT: Source Items (collapsible) --}}
        <aside class="gmb-sidebar">
            <section class="gmb-section" data-section="custom">
                <button type="button" class="gmb-section-head" aria-expanded="true" data-toggle>
                    <span>{{ __('Custom Links') }}</span>
                    <span class="gmb-chevron" aria-hidden="true"></span>
                </button>
                <div class="gmb-section-body" data-body>
                    <div class="gmb-form">
                        <div class="gmb-field">
                            <label for="gmb-custom-label">{{ __('Label') }}</label>
                            <input type="text" id="gmb-custom-label" class="gmb-input" placeholder="{{ __('Label Text') }}">
                        </div>
                        <div class="gmb-field">
                            <label for="gmb-custom-url">{{ __('URL') }}</label>
                            <input type="text" id="gmb-custom-url" class="gmb-input" placeholder="https://">
                        </div>
                        
                        <x-backend.button.save type="button" id="gmb-add-custom" :label="'+ ' . __('Add to Menu')" class="gmb-btn-block mt-3" />
                    </div>
                </div>
            </section>

            <section class="gmb-section" data-section="sources">
                <button type="button" class="gmb-section-head" aria-expanded="true" data-toggle>
                    <span>{{ isset($menuName->name) && !empty($menuName->name) ? ucfirst($menuName->name) : __('Source Items') }}</span>
                    <span class="gmb-chevron" aria-hidden="true"></span>
                </button>
                <div class="gmb-section-body" data-body>
                    <div class="gmb-search-wrap">
                        <input type="search" id="gmb-source-search" class="gmb-input gmb-search" placeholder="{{ __('Search...') }}" aria-label="{{ __('Search') }}">
                    </div>
                    <div class="gmb-source-list" id="gmb-source-list" data-source-list>
                        @foreach ($sourceItems as $item)
                            <label class="gmb-source-row" data-source-name="{{ strtolower($item['name']) }}">
                                <input type="checkbox" class="gmb-checkbox" data-source-id="{{ $item['id'] }}" data-source-name="{{ $item['name'] }}" data-source-url="{{ $item['url'] }}" data-source-permission="{{ is_string($item['permission'] ?? '') ? $item['permission'] : json_encode($item['permission'] ?? []) }}" data-source-default="{{ $item['isDefault'] ?? 1 }}">
                                <span class="gmb-source-label">{{ $item['name'] }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div class="gmb-sidebar-footer">
                        <x-backend.button.save type="button" id="gmb-add-selected" :label="'+ ' . __('Add Selected to Menu')" class="gmb-btn-block" />
                    </div>
                </div>
            </section>
        </aside>

        {{-- CENTER: Menu structure canvas --}}
        <main class="gmb-canvas">
            <div class="gmb-canvas-inner">
                <div class="gmb-canvas-header">
                    <h2 class="gmb-panel-title">{{ __('Menu Structure') }}</h2>
                    <p class="gmb-helper">{{ __('Drag items to reorder or nest. Click an item to edit.') }}</p>
                </div>
                <div class="gmb-canvas-body" id="gmb-canvas-body">
                    <div class="gmb-tree" id="gmb-tree" role="list"></div>
                    <div class="gmb-empty {{ !empty($menuItemsFlat) ? 'hidden' : '' }}" id="gmb-empty-state">
                        <p class="gmb-empty-title">{{ __('No menu items yet') }}</p>
                        <p class="gmb-empty-text">{{ __('Add items from the left or create a custom link.') }}</p>
                    </div>
                </div>
            </div>
        </main>

        {{-- RIGHT: Inspector (contextual) --}}
        <aside class="gmb-inspector" id="gmb-inspector">
            <div class="gmb-inspector-placeholder" id="gmb-inspector-placeholder">
                <div class="gmb-inspector-empty-state">
                    <span class="gmb-inspector-empty-icon" aria-hidden="true"><i class="fa fa-sliders-h" aria-hidden="true"></i></span>
                    <h3 class="gmb-inspector-empty-headline">{{ __('No item selected') }}</h3>
                    <p class="gmb-inspector-empty-sub">{{ __('Select an item from the menu structure to edit its properties.') }}</p>
                </div>
            </div>
            <div class="gmb-inspector-content hidden" id="gmb-inspector-content"></div>
        </aside>
    </div>

    <footer class="gmb-footer" id="gmb-footer">
        @if(request()->has('menu'))
            <div class="gmb-footer-left"></div>
            <div class="gmb-footer-right">
                <div class="gmb-footer-save-wrap">
                    <x-backend.button.save type="button" id="gmb-save" :label="__('Save Menu')">
                        <span class="gmb-spinner hidden" id="gmb-spinner" aria-hidden="true"></span>
                    </x-backend.button.save>
                </div>
            </div>
        @else
            <div class="gmb-footer-spacer"></div>
            <x-backend.button.save type="button" id="gmb-create-menu" :label="__('Create menu')" />
        @endif
    </footer>
</div>

<x-backend.delete-modal
    modalId="gmb-delete-modal"
    submitBtnId="gmb-delete-confirm-btn"
    titleId="gmb-delete-modal-label"
    messageId="gmb-delete-modal-message"
    :title="__('Delete?')"
    :message="__('Are you sure you want to delete this item?')"
    :confirmLabel="__('Delete')"
    :includeBatchDelete="false"
    :includeScript="false"
/>

<script>
window.MENU_BUILDER_STATE = @json($menuItemsFlat ?? []);
window.MENU_BUILDER_CONFIG = @json($config);
</script>
<script src="{{ asset('Modules/MenuBuilder/Resources/assets/js/menu-builder-app.js') }}"></script>
@endsection
