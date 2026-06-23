<div class="card blockable">
    <div class="order-sec-head cursor-pointer d-flex justify-content-between align-items-center border-bottom px-3 head-click" data-bs-toggle="collapse" href="#channel_info">
        <span class="add-title text-lg">{{ __('Channel') }}</span>
        <span class="toggle-btn mt-0 icon-collapse">
            <svg width="8" height="6" viewBox="0 0 8 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M4.18767 0.0921111L7.81732 4.65639C8.24162 5.18994 7.87956 6 7.21678 6L0.783223 6C0.120445 6 -0.241618 5.18994 0.182683 4.65639L3.81233 0.092111C3.91 -0.0307037 4.09 -0.0307036 4.18767 0.0921111Z"
                    fill="#2C2C2C"></path>
            </svg>
        </span>
    </div>

    <div id="channel_info" class="mini-form-holder form-group row px-7 mb-0 collapse show">
        <input type="hidden" name="channels_section_saved" value="1">
        <div class="col-md-12">
            <div class="mt-3 mx-3">
                <label class="sp-title d-block mb-10p">{{ __('Select Channels') }}</label>
                @php
                    $productChannels = isset($product)
                        ? ($product->channels ? (is_array($product->channels) ? $product->channels : (array) json_decode($product->channels, true)) : [])
                        : \App\Enums\ProductChannel::allChannels();
                @endphp
                @foreach (\App\Enums\ProductChannel::labels() as $value => $label)
                    <div class="mb-8p">
                        <input class="mt-2 accent-color-dark" type="checkbox" name="channels[]" value="{{ $value }}" id="channel-{{ $value }}"
                            {{ in_array($value, $productChannels, true) ? 'checked' : '' }}>
                        <label class="crs sp-title d-flx-n d-unset" for="channel-{{ $value }}">
                            {{ __($label) }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flx ltr:ms-3 rtl:me-2 align-items-center b-res t-25-res pb-25p mt-10p">
            <x-backend.button.save type="button" class="save-channel-info" :label="__('Save')" />
        </div>
    </div>
</div>
