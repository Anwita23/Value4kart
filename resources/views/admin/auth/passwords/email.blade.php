@extends('admin.auth.login_templates.' . (isset($template) ? $template : preference('auth_template_name', 'template-1')) . '.index')

@section('sub-content')
<link rel="stylesheet" href="{{ asset('dist/css/intl-tel-input/intlTelInput.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/auth/enhanced-auth-forms.min.css') }}">
<form method="POST" action="{{ route('login.sendResetLink') }}" class="admin-login-con my-0 enhanced-login-form" id="admin-reset-password-form">
    @csrf

    <div class="enhanced-login-card">
        <header class="enhanced-login-card__header">
            <div class="enhanced-login-card__icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="11" width="14" height="10" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <h3 class="login-title">{{ __("Reset Your Password") }}</h3>
        </header>

        <div class="enhanced-login-card__body">
            @if(is_null(session('success')))
                <p class="login-box-msg mb-0">{{ __('Enter your email or phone to send password reset link') }}</p>
            @endif

            <div class="notification-wrapper mb-3">
                @include('admin.auth.partial.notification')
            </div>

            {{-- Email Input Section --}}
            <div class="form-group-enhanced mb-4 reset-email-section" style="display: {{ preference('user_login') == 'phone' ? 'none' : 'block' }};">
                <div class="enhanced-login-field-block">
                    <div class="input-wrapper position-relative">
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M15.75 3.75H2.25C1.42157 3.75 0.75 4.42157 0.75 5.25V12.75C0.75 13.5784 1.42157 14.25 2.25 14.25H15.75C16.5784 14.25 17.25 13.5784 17.25 12.75V5.25C17.25 4.42157 16.5784 3.75 15.75 3.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M0.75 6L9 10.5L17.25 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <input id="reset-email" type="email" class="form-control enhanced-input py-2" value="{{ old('email') }}" name="email" placeholder="{{ __('Email') }}" autocomplete="email" {{ preference('user_login') == 'phone' ? 'disabled' : '' }}>
                    </div>
                    @if (preference('user_login', 'both') == 'both')
                        <div class="enhanced-login-toggle-row">
                            <span class="enable-reset-phone-section toggle-link">{{ __('Use Phone Instead') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Phone Input Section --}}
            <div class="form-group-enhanced mb-4 reset-phone-section" style="display: {{ preference('user_login') == 'phone' ? 'block' : 'none' }};">
                <div class="enhanced-login-field-block">
                    <div class="input-wrapper position-relative">
                        <input id="reset-phone" type="text" class="form-control enhanced-input py-2 cc-phone" name="phone" placeholder="{{ __('Phone Number') }}" autocomplete="tel" {{ preference('user_login') != 'phone' ? 'disabled' : '' }}>
                    </div>
                    @if (preference('user_login', 'both') == 'both')
                        <div class="enhanced-login-toggle-row">
                            <span class="enable-reset-email-section toggle-link">{{ __('Use Email Instead') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            @include('admin.auth.partial.re-captcha')

            <button class="btn enhanced-submit-btn enhanced-login-submit mb-0 ltr:me-1 rtl:ms-1 loader w-100" type="submit">
                <span class="btn-text">{{ __("Send") }}</span>
                <span class="anim spin enhanced-login-loader" role="status" aria-hidden="true"></span>
            </button>

            <p class="mb-2 text-muted text-center">{{ __("Click here to") }} <a class="text-muted register-link" href="{{ route('login') }}">{{ __("Log In") }}</a></p>
        </div>
    </div>
</form>

<script>
    window.ENHANCED_AUTH_FORMS_CONFIG = {
        utilJs: "{{ asset('dist/js/intl-tel-input/utils.min.js') }}",
        defaultCountry: "{{ preference('default_country_code', '') ?: '' }}",
        onlyCountries: @json(array_values(array_filter((array) json_decode(preference('phone_country_codes'), true))))
    };
</script>
<script src="{{ asset('dist/js/intl-tel-input/intlTelInput.min.js') }}"></script>
<script src="{{ asset('dist/js/custom/auth/enhanced-auth-forms.min.js') }}"></script>

@endsection
