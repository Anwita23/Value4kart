@php
    $defaultCountryCode = preference('company_country');
    $onlyCountries = array_values(array_filter((array) json_decode(preference('phone_country_codes'), true)));
    $utilJs = asset('public/dist/js/intl-tel-input/utils.min.js');
@endphp
    window.PHONE_INPUT_CONFIG = {
        utilJs: "{{ $utilJs }}",
        defaultCountryCode: "{{ $defaultCountryCode }}",
        onlyCountries: @json($onlyCountries)
    };
    var defaultCountryCode = "{{ $defaultCountryCode }}";
    var allowedPhoneCountryCodes = @json($onlyCountries);
    var utilJs = "{{ $utilJs }}";
