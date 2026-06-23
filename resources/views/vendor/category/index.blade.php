@extends('vendor.layouts.app')
@section('page_title', __('Categories'))
@section('css')
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/jstree/jstree.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Modules/MediaManager/Resources/assets/css/media-manager.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/custom/category.min.css') }}">
@endsection
@section('content')
    @include('partials.category-form', [
        'indexRoute' => route('vendor.categories.index'),
        'storeRoute' => route('vendor.categories.store'),
        'permissionController' => 'App\Http\Controllers\Vendor\CategoryController',
        'showCommission' => false,
        'showSuggestionUi' => (bool) preference('system_suggestion'),
        'imageTypes' => 'png,jpg,jpeg,webp',
        'showFileNote' => false,
        'languages' => $languages,
    ])
@endsection
@section('js')
    <script src="{{ asset('public/dist/plugins/jstree/jstree.min.js') }}"></script>
    <script src="{{ asset('public/datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/common.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script>
        window.categoryConfig = {
            currentCategoryUrl: '{{ route('vendor.categories.index') }}',
            selectedLang: '{{ request()->input('lang', config('app.locale')) }}',
            isAllowSuggestion: '{{ preference('system_suggestion') }}',
            vendorId: '{{ $vendorId ?? '' }}'
        };
    </script>
    <script src="{{ asset('public/dist/js/custom/category.min.js') }}"></script>
@endsection
