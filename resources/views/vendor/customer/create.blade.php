@extends('vendor.layouts.app')
@section('page_title', __('Create :x', ['x' => __('Customer')]))
@section('css')
    <link rel="stylesheet" href="{{ asset('dist/css/user-list.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/intl-tel-input/intlTelInput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/validation-error.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="user-add-container">
        <div class="card">
            <div class="card-header">
                <h5> <a href="{{ route('vendor.customer') }}">{{ __('Customer') }} </a>
                    >> {{ __('Create :x', ['x' => __('Customer')]) }}</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="row form-tabs">
                    <form action="{{ route('vendor.customer.store') }}" method="post" id="userAdd"
                        class="form-horizontal col-sm-12">
                        @csrf

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase font-bold" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home"
                                    aria-selected="true">{{ __(':x Information', ['x' => __('Customer')]) }}</a>
                            </li>
                        </ul>

                        <div class="col-sm-12 tab-content form-edit-con" id="myTabContent">
                            <div class="tab-pane fade show active form-con" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                @include('common.customer.add', ['panel' => 'vendor'])
                            </div>

                            <div class="d-flex btn-align mt-30p">
                                                                <div class="w-100 admin-form-actions">
<x-backend.button.cancel :href="route('vendor.customer')" :label="__('Cancel')" class="all-cancel-btn" />
                                <x-backend.button.save type="submit" id="btnSubmit" :label="''">
                                    <i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Create') }}</span>
                                </x-backend.button.save>                                </div>

                            </div>
                        </div>
                        <!-- Modal -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        'use strict';
        let oldCountry = "{!! old('country') ?? 'null' !!}";
        let oldState = "{!! old('state') ?? 'null' !!}";
        let oldCity = "{!! old('city') ?? 'null' !!}";
    </script>

    <script src="{{ asset('dist/js/intl-tel-input/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/site/set-dial-code.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/customer.min.js') }}"></script> 
    <script src="{{ asset('dist/js/custom/validation.min.js') }}"></script>
@endsection
