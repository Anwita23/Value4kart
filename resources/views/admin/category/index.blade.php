@extends('admin.layouts.app')
@section('page_title', __('Categories'))
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/jstree/jstree.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Modules/MediaManager/Resources/assets/css/media-manager.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/custom/category.min.css') }}">
@endsection
@section('content')
    @include('partials.category-form', [
        'indexRoute' => route('categories.index'),
        'storeRoute' => route('categories.store'),
        'permissionController' => 'App\Http\Controllers\CategoryController',
        'showCommission' => !empty($commission) && $commission->is_category_based == 1,
        'showSuggestionUi' => false,
        'imageTypes' => 'png,jpg,jpeg',
        'showFileNote' => true,
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
            currentCategoryUrl: '{{ route('categories.index') }}',
            selectedLang: '{{ request()->input('lang', config('app.locale')) }}',
            isAllowSuggestion: 0,
            vendorId: null
        };
    </script>
    <script src="{{ asset('public/dist/js/custom/category.min.js') }}"></script>
@endsection
