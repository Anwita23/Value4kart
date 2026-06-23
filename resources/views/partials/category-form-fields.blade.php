{{--
    Shared category form fields (inputs only). Used by tree form and drawer/modal.
    Required: $permissionController, $showCommission, $showSuggestionUi, $showFileNote, $imageTypes
    Optional: $fieldPrefix (e.g. 'normal_' for drawer to avoid duplicate ids)
    Modern SaaS layout: labels above inputs, grouped spacing, toggle switches.
--}}
@php
    $pf = $fieldPrefix ?? '';
@endphp
<div class="category-form-group">
    <label for="{{ $pf }}name" class="category-label category-label-required">{{ __('Name') }}</label>
    <input type="text" placeholder="{{ __('Category name') }}" class="category-input" id="{{ $pf }}name" name="name" required
        @if(!$showSuggestionUi) minlength="3" data-min-length="{{ __(':x should contain at least :y characters.', ['x' => __('Name'), 'y' => 3]) }}"
        @endif
        oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')" data-related="{{ $pf }}slug" value="{{ old('name') }}">
    @if ($showSuggestionUi)
        <label for="{{ $pf }}has_category" class="control-label display_none" id="{{ $pf }}has_category"></label>
    @endif
</div>

<input type="hidden" name="type" id="{{ $pf }}type" value="store">
@hasPermission($permissionController . '@edit')
    <input type="hidden" name="edit_id" id="{{ $pf }}edit_id">
@endhasPermission

<div class="category-form-group">
    <label for="{{ $pf }}slug" class="category-label category-label-required">{{ __('Slug') }}</label>
    <input type="text" placeholder="{{ __('url-slug') }}" class="category-input" id="{{ $pf }}slug" name="slug" required
        oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')" value="{{ old('slug') }}">
</div>

<div class="category-form-group" id="{{ $pf }}parentBlock">
    <label for="{{ $pf }}parent_id" class="category-label">{{ __('Parent Category') }}</label>
    <select class="category-select select2 inputFieldDesign" name="parent_id" id="{{ $pf }}parent_id">
        <option value="">{{ __('Select One') }}</option>
    </select>
</div>

<div class="category-form-group">
    <label for="{{ $pf }}status" class="category-label">{{ __('Status') }}</label>
    <select class="category-select select2-hide-search inputFieldDesign" name="status" id="{{ $pf }}status">
        <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>{{ __('Active') }}</option>
        <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
    </select>
</div>

@if (isActive('SaaS'))
    <input type="hidden" name="is_searchable" value="1">
@else
    <div class="category-form-group category-form-group-toggle">
        <span class="category-label">{{ __('Is Searchable') }}</span>
        <select class="category-select-hidden" name="is_searchable" id="{{ $pf }}is_searchable" aria-hidden="true" tabindex="-1">
            <option value="1" selected>{{ __('Yes') }}</option>
            <option value="0">{{ __('No') }}</option>
        </select>
        <label class="category-toggle" aria-label="{{ __('Is Searchable') }}">
            <input type="checkbox" class="category-toggle-input" data-sync-select="{{ $pf }}is_searchable" aria-checked="true">
            <span class="category-toggle-slider"></span>
        </label>
    </div>
@endif

@if (isActive('SaaS'))
    <input type="hidden" name="is_featured" value="0">
@else
    <div class="category-form-group category-form-group-toggle">
        <span class="category-label">{{ __('Is Featured') }}</span>
        <select class="category-select-hidden" name="is_featured" id="{{ $pf }}is_featured" aria-hidden="true" tabindex="-1">
            <option value="1" selected>{{ __('Yes') }}</option>
            <option value="0">{{ __('No') }}</option>
        </select>
        <label class="category-toggle" aria-label="{{ __('Is Featured') }}">
            <input type="checkbox" class="category-toggle-input" data-sync-select="{{ $pf }}is_featured" aria-checked="true">
            <span class="category-toggle-slider"></span>
        </label>
    </div>
@endif

@if ($showCommission)
    <div class="category-form-group">
        <label for="{{ $pf }}sell_commissions" class="category-label">{{ __('Commission') }} (%)</label>
        <input type="text" class="category-input positive-float-number inputFieldDesign" name="sell_commissions" id="{{ $pf }}sell_commissions" placeholder="0">
    </div>
@endif

<div class="category-form-group">
    <label class="category-label">{{ __('Category Image') }}</label>
    {{-- Same media manager design for both tree view and list view --}}
    <div class="form-group preview-parent category-media-image-wrap">
        <div class="custom-file position-relative media-manager-img has-media-manager category-media-trigger" data-val="single" data-type="{{ $imageTypes }}" id="{{ $pf }}image-status">
            <label class="custom-file-label overflow_hidden d-flex align-items-center category-media-label" for="{{ $pf }}validatedCustomFile">
                <i class="fa fa-folder-open me-2" aria-hidden="true"></i>{{ __('Select from media') }}
            </label>
        </div>
        <div class="preview-image category-media-preview" id="{{ $pf }}preview-image">
            {{-- Media manager injects img + hidden file_id[] here --}}
        </div>
    </div>
    <div class="ltr:ps-0 rtl:pe-0 d-none" id="{{ $pf }}img-container" aria-hidden="true"></div>
</div>

@if ($showFileNote)
    <div class="category-form-group category-form-note" id="{{ $pf }}divNote">
        <div class="category-note" id="{{ $pf }}note_txt_1">
            <span class="category-badge-danger">{{ __('Note') }}!</span>
            {{ __('Allowed File Extensions: jpg, jpeg, png') }}
        </div>
        <div id="{{ $pf }}note_txt_2"></div>
    </div>
@endif
