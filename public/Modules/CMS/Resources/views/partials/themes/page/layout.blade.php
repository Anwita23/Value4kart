<div class="tab-pane fade px-2" id="v-pills-layout" role="tabpanel" aria-labelledby="v-pills-layout-tab">
    <div class="row">
        <div class="col-sm-12 ltr:pe-0 rtl:ps-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-main">
                    <thead class="text-dark border-top-gray bg-light-gray">
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th width="250">{{ __('Primary Color') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $options = option();
                        @endphp
                        @foreach ($layouts as $data)
                            <tr>
                                <td>
                                    {{ ucFirst(str_replace('_', ' ', $data)) }}
                                    {{-- This empty from will be remove during render --}}
                                    <form></form>
                                </td>
                                <td>
                                    @php
                                        $color = option()[$data . '_template_primary_color'] ?? '#FCCA19';
                                    @endphp
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign"
                                            data-control="hue" name="{{ $data }}_template_primary_color"
                                            value="{{ $color }}">
                                    </div>
                                </td>
                                <td width="300" class="flex justify-content-center">
                                    <div class="header-btns-lg d-flex flex-wrap align-items-center gap-2">
                                        @if ($data != 'default')
                                            <x-backend.button.save
                                                type="button"
                                                size="sm"
                                                class="js-layout-edit"
                                                data-bs-toggle="modal"
                                                data-bs-target="#edit-layout"
                                                data-layout="{{ ucFirst(str_replace('_', ' ', $data)) }}"
                                                :label="__('Edit')"
                                            >
                                                <i class="feather icon-edit ltr:me-1 rtl:ms-1" aria-hidden="true"></i>
                                            </x-backend.button.save>
                                            <form method="post"
                                                action="{{ route('theme.layout.delete', ['layout' => $data]) }}"
                                                id="delete-layout-{{ $data }}" accept-charset="UTF-8"
                                                class="display_inline">
                                                @csrf
                                                <x-backend.button.delete
                                                    type="button"
                                                    size="sm"
                                                    modalTarget="#confirmDelete"
                                                    :label="__('Delete')"
                                                    data-label="Delete"
                                                    data-delete="layout"
                                                    data-id="{{ $data }}"
                                                    :title="__('Delete Layout')"
                                                    data-title="{{ __('Delete :x', ['x' => __('Layout')]) }}"
                                                    data-message="{{ __('Are you sure to delete this?') }}"
                                                />
                                            </form>
                                        @endif
                                        @if ($data != $layout)
                                            <x-backend.button.save
                                                type="button"
                                                size="sm"
                                                class="js-layout-setting"
                                                data-val="{{ $data }}"
                                                :label="__('Setting')"
                                            >
                                                <i class="feather icon-settings ltr:me-1 rtl:ms-1" aria-hidden="true"></i>
                                            </x-backend.button.save>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="10" class="pt-3">
                                <x-backend.button.save type="button" size="sm" data-bs-toggle="modal" data-bs-target="#add-layout" :label="__('Add New Layout')" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
