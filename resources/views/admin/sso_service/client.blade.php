@extends('admin.layouts.app')
@section('page_title', __('SSO Client'))
@section('css')
    <link rel="stylesheet" href="{{ asset('dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="col-sm-12 list-container" id="sso-client-container">
        <div class="card">
            <div class="card-body row">
                <div
                    class="col-lg-3 col-12 z-index-10  ltr:ps-md-3 ltr:pe-0 ltr:ps-0 rtl:pe-md-3 rtl:ps-0 rtl:pe-0">
                    @include('admin.layouts.includes.account_settings_menu')
                </div>
                <div class="col-lg-9 col-12 ltr:ps-0 rtl:pe-0">
                    <div class="card card-info shadow-none mb-0">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <span id="smtp_head">
                            <div class="card-header p-t-20 border-bottom">
                                <h5>{{ __('SSO Client') }}</h5>
                                <div class="card-header-right language-header">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-client"
                                        class="btn btn-outline-primary custom-btn-small m-0 ltr:me-2 rtl:ms-2"><span
                                            class="fa fa-plus">
                                            &nbsp;</span>{{ __('Add Client') }}</a>
                                </div>
                            </div>
                        </span>
                        
                        <div class="card-body px-0 product-table">
                            <div class="row p-l-15">
                                <div class="table-responsive">
                                    <table id="dataTableBuilder" class="table table-bordered dt-responsive">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Client ID') }}</th>
                                                <th>{{ __('Client Secret') }}</th>
                                                <th>{{ __('Redirect Url') }}</th>
                                                <th class="w-5"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($clients as $client)
                                                <tr>
                                                    <td class="align-middle">{{ $client->name }}</td>
                                                    <td class="align-middle">{{ $client->id }}</td>
                                                    <td class="align-middle">{{ $client->secret }}</td>
                                                    <td class="align-middle">{{ $client->redirect }}</td>
                                                    <td class="align-middle">
                                                        <x-backend.datatable.delete-button :route="route('sso.client.delete', ['id' => $client->id])" :id="$client->id" :method="'DELETE'" />
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">{{ __('No Client Available') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-backend.delete-modal />
    
    <div id="add-client" class="modal fade display_none" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Add New') }}</h4>
                    <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                </div>
                <form action="{{ route('sso.client') }}" method="post" id="addLanguage"
                    class="form-horizontal">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row sl_status">
                            <label class="col-sm-4 control-label require" for="status">{{ __('App Name') }}</label>
                            <div class="col-sm-7">
                                <input type="text" name="name" class="form-control inputFieldDesign" 
                                required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                placeholder="">
                            </div>
                        </div>
                        <div class="form-group row sl_status">
                            <label class="col-sm-4 control-label require" for="status">{{ __('Redirect Url') }}</label>
                            <div class="col-sm-7">
                                <input type="text" name="redirect" class="form-control inputFieldDesign" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-0">
                        <div class="form-group row">
                            <label for="btn_save" class="col-sm-3 control-label"></label>
                            <div class="col-sm-12">
                                <x-backend.button.save type="submit" :label="__('Create')" class="py-2 ltr:float-right rtl:float-left" />
                                <x-backend.button.cancel dismiss :label="__('Close')" class="py-2 ltr:float-right ltr:me-2 rtl:float-left rtl:ms-2" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/common.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom/settings.min.js') }}"></script>
@endsection
