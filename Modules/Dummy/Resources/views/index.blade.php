@extends('admin.layouts.app')
@section('page_title', __('Dummy Import'))

@section('content')
<div>
    <div class="card pb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>{{ __('Import Demo Data') }}</h5>
            </div>
        </div>
        <div class="card-body row">
            <div class="offset-sm-3 col-sm-6">
                <div>
                    <div class="form-group">
                        <label class="col-sm-12 text-left col-form-label">
                            {{ __('To confirm, type "import" below.') }}</label>
                        <div class="col-sm-12">
                            <div class="custom-file position-relative">
                                <input type="text" class="form-control inputFieldDesign" id="confirm_import" placeholder="{{ __('Type "import"') }}">
                                <small id="emailHelp" class="form-text text-muted">{{ __('It may take one minute or more to
                                    import the database. Please wait until the process is completed.') }}</small>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('import.dummy.store') }}" class="form-horizontal from-class-id" method="POST">
                        @csrf
                        <div class="alert alert-warning">
                            <b class="d-block mt-2">
                                {{ __('You will lose all the data you have inserted, and new dummy data will be set after the import.') }}
                            </b>
                            <b class="d-block mt-2">{{ __('Before performing the action, it is strongly recommended to create a full backup of your current installation (files and database)') }}
                                <a href="https://help.techvill.net/backup-martvill-files-and-database/" target="_blank"><i class="feather icon-external-link"></i> {{ __('See backup documentation') }}</a>
                            </b>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            {{ __('After import, you need to use the following credentials to login') }}:
                            <br>
                            <code><strong>{{ __('Username') }}:</strong> admin@techvill.net</code>
                            <br>
                            <code><strong>{{ __("Password") }}:</strong> 123456</code>
                        </div>
                        <div class="col-sm-12 px-0 m-l-10 mt-3 pr-0 d-flex justify-content-end">
                            <x-backend.button.cancel :href="route('dashboard')" :label="__('Cancel')" class="all-cancel-btn" />
                            <x-backend.button.save
                                type="submit"
                                variant="danger"
                                class="import_now_btn mx-2"
                                disabled
                                :label="__('Import Now')"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Dummy/Resources/assets/js/app.min.js') }}"></script>
@endsection
