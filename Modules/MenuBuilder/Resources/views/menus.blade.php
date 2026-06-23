<li id="menu-item-{{ $m->id }}" class="menu-item display-list-item menu-item-depth-{{ $m->depth }} menu-item-page menu-item-edit-inactive pending mb-tree-item" data-val="{{ $m->depth }}">
    <dl class="menu-item-bar" id="{{ $m->id }}">
        <dt class="menu-item-handle mb-row">
            <span class="item-title mb-row-inner">
                <span class="mb-drag-icon" aria-hidden="true" title="{{ __('Drag') }}">≡</span>
                @if($m->icon)
                    <span class="mb-item-icon">{!! $m->icon !!}</span>
                @else
                    <span class="mb-item-icon mb-item-icon-default" aria-hidden="true">📄</span>
                @endif
                <span class="menu-item-title"><span id="menutitletemp_{{ $m->id }}">{{ $m->getTranslated('label', $selectedLang) }}</span></span>
                <span class="is-submenu" style="@if($m->depth==0)display: none;@endif">{{ __('Subelement') }}</span>
            </span>
            <span class="item-controls mb-row-meta">
                <span class="item-type mb-badge">{{ $m->depth > 0 ? __('Link') : __('Link') }}</span>
                <span class="item-order hide-if-js">
                    <a href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{ $m->id }}&_wpnonce=8b3eb7ac44" class="item-move-up"><abbr title="Move Up">↑</abbr></a>
                    | <a href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{ $m->id }}&_wpnonce=8b3eb7ac44" class="item-move-down"><abbr title="Move Down">↓</abbr></a>
                </span>
                <a class="item-edit mb-expand" id="edit-{{ $m->id }}" href="{{ $currentUrl }}?edit-menu-item={{ $m->id }}#menu-item-settings-{{ $m->id }}" title="{{ __('Edit') }}">
                    <span class="color-transparent d-none">|{{ $m->parent ?? 0 }}|</span>
                    <span aria-hidden="true">▸</span>
                </a>
            </span>
        </dt>
    </dl>
    <div class="menu-item-settings menu-item-edit-inactive" id="menu-item-settings-{{ $m->id }}">
        <input type="hidden" class="edit-menu-item-id" name="menuid_{{ $m->id }}" value="{{ $m->id }}" />
        <input type="hidden" class="edit-menu-depth" id="depthlabelmenu_{{ $m->id }}" name="depth_{{ $m->id }}" value="{{ $m->depth }}" />

        <div class="mb-settings-inspector">
            <div class="mb-settings-group">
                <h3 class="mb-settings-group-title">{{ __('General') }}</h3>
                <div class="mb-field">
                    <label for="edit-menu-item-title-{{ $m->id }}" class="mb-label">{{ __('Label') }}</label>
                    <input type="text" id="idlabelmenu_{{ $m->id }}" class="widefat edit-menu-item-title mb-input mb-input-full" name="idlabelmenu_{{ $m->id }}" value="{{ $m->getTranslated('label', $selectedLang) }}">
                    <span class="mb-helper-text">{{ __('Display text for this menu item.') }}</span>
                </div>
                <div class="mb-field">
                    <label for="edit-menu-item-icon-{{ $m->id }}" class="mb-label">{{ __('Icon') }}</label>
                    <input type="text" id="clases_icon_{{ $m->id }}" class="form-control edit-menu-item-icon mb-input mb-input-full mb-input-icon" name="icon_menu_{{ $m->id }}" value="{{ $m->icon }}" placeholder="e.g. feather icon-home">
                    <span class="mb-helper-text">{{ __('Icon class (e.g. feather icon-dashboard).') }}</span>
                </div>
            </div>

            <div class="mb-settings-group">
                <h3 class="mb-settings-group-title">{{ __('Navigation') }}</h3>
                <div class="mb-field">
                    <label for="edit-menu-item-url-{{ $m->id }}" class="mb-label">{{ __('URL') }}</label>
                    <input type="text" id="url_menu_{{ $m->id }}" class="widefat edit-menu-item-url mb-input mb-input-full" value="{{ $m->link }}" placeholder="https://">
                    <span class="mb-helper-text">{{ __('Link destination.') }}</span>
                </div>
                <div class="mb-field">
                    <label for="edit-menu-item-classes-{{ $m->id }}" class="mb-label">{{ __('CSS Class') }}</label>
                    <input type="text" id="clases_menu_{{ $m->id }}" class="widefat edit-menu-item-classes mb-input mb-input-full" name="clases_menu_{{ $m->id }}" value="{{ $m->class }}" placeholder="optional">
                </div>
            </div>

            <div class="mb-settings-group">
                <h3 class="mb-settings-group-title">{{ __('Permissions') }}</h3>
                <div class="mb-field">
                    <label for="edit-menu-item-attribute-{{ $m->id }}" class="mb-label">{{ __('Permission') }}</label>
                    <?php
                    $jsonDecode = isset($m->params) && !empty($m->params) ? json_decode(json_encode($m->params), true) : [];
                    $perm = '';
                    $fullArray = '';
                    if ($jsonDecode) {
                        $fullArray = json_encode($m->params);
                        $perm = $jsonDecode['permission'] ?? '';
                    }
                    ?>
                    <input type="text" id="attribute_menu_display_{{ $m->id }}" class="mb-input mb-input-full mb-permission-display" value="{{ $perm }}" readonly>
                    <input type="hidden" id="attribute_menu{{ $m->id }}" class="widefat code edit-menu-item-attribute" name="attribute_menu_{{ $m->id }}" value="{{ $fullArray }}" readonly>
                    <span class="mb-helper-text">{{ __('Permission (optional)') }}</span>
                </div>
            </div>

            <div class="mb-settings-actions">
                <button type="button" onclick="deleteitem({{ $m->id }})" class="mb-btn mb-btn-danger-text item-delete delete-{{ $m->id }}" id="del-{{ $m->id }}">{{ __('Delete') }}</button>
            </div>
        </div>
    </div>
    <ul class="menu-item-transport"></ul>
</li>
