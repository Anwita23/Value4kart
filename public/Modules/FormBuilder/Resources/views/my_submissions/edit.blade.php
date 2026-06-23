@extends('formbuilder::layout')

@section('page_title', __('Edit Submission'))

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><a href="#">{{ __('Submissions') }}</a></h5>
                <div class="card-header-right d-inline-block">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group" role="group">
                            <a href="{{ route('formbuilder::forms.index') }}" class="btn btn-primary  btn-sm"
                                title="{{ __('Back To My Forms') }}">
                                <i class="fa fa-th-list"></i> {{ __('My Forms') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card-block pt-2 px-2">
                    <div class="col-sm-12">
                        <form action="{{ route('formbuilder::entry.update', $submission->id) }}" method="POST"
                            id="submitForm" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div id="fb-render"></div>
                            </div>

                            <div class="card-footer">
                                                                <div class="w-100 admin-form-actions">
<x-backend.button.cancel :href="route('formbuilder::forms.index')" :label="__('Cancel')" class="all-cancel-btn ltr:me-2 rtl:ms-2" />
                                <x-backend.button.save type="submit" class="confirm-form" data-form="submitForm"
                                    :data-message="__('Submit update to your entry for :x ?', ['x' => $submission?->form?->name])"
                                    :label="__('Submit Form')">
                                    <i class="fa fa-submit"></i>
                                </x-backend.button.save>                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push(moduleConfig('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($submission?->form?->form_builder_json) !!}
    </script>
    <script src="{{ asset('Modules/FormBuilder/Resources/assets/js/render-form.min.js') }}" defer></script>
@endpush
