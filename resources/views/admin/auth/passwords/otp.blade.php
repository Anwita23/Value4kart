@extends('admin.auth.login_templates.' . (isset($template) ? $template : preference('auth_template_name', 'template-1')) . '.index')

@section('sub-content')
<link rel="stylesheet" href="{{ asset('public/dist/css/auth/enhanced-auth-forms.min.css') }}">
<form method="GET" action="{{ route('password.reset', ['token' => 'tokens']) }}" class="admin-login-con my-0 enhanced-login-form" id="admin-otp-form">
    @csrf

    <div class="enhanced-login-card">
        <header class="enhanced-login-card__header">
            <div class="enhanced-login-card__icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="11" width="14" height="10" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <h3 class="login-title">{{ __("OTP Verification") }}</h3>
        </header>

        <div class="enhanced-login-card__body">
            <p class="login-box-msg mb-0">{{ __('Enter the OTP code sent to your email or phone') }}</p>

            <div class="notification-wrapper mb-3">
                @include('admin.auth.partial.notification')
                {{-- Dynamic message area for resend OTP --}}
                <div id="resend-otp-message" class="d-none"></div>
            </div>

            {{-- OTP Input Section --}}
            <div class="form-group-enhanced mb-4">
                <div class="input-wrapper position-relative">
                    <div class="input-icon-wrapper">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <rect x="2" y="7" width="20" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/>
                            <circle cx="7" cy="12" r="1" fill="currentColor"/>
                            <circle cx="12" cy="12" r="1" fill="currentColor"/>
                            <circle cx="17" cy="12" r="1" fill="currentColor"/>
                        </svg>
                    </div>
                    <input id="otp-token" type="text" class="form-control enhanced-input py-2" name="token" value="" placeholder="{{ __('Enter OTP') }}" autocomplete="one-time-code" maxlength="4">
                </div>
            </div>

            {{-- Hidden fields for email/phone --}}
            <input type="hidden" name="email" id="reset-email" value="{{ old('email', $email ?? '') }}">
            <input type="hidden" name="phone" id="reset-phone" value="{{ old('phone', $phone ?? '') }}">

            <div class="text-center mb-3 bg-gray p-10p enhanced-login-otp-panel">
                <div class="otp-validity-timer mb-2" id="otp-validity-timer">
                    <span class="mb-0 text-muted" style="font-size: 13px;">{{ __('OTP is valid for') }}:</span>
                    <span class="mb-0 d-inline-block mt-1 enhanced-login-otp-timer">
                        <span id="otp-timer-display">{{ sprintf('%d:%02d', $otp_expire_in ?? 5, 0) }}</span>
                    </span>
                </div>
                @if(isset($otpCreatedAt))
                    <input type="hidden" id="otp-created-timestamp" value="{{ $otpCreatedAt }}">
                @endif
                @if(isset($otpExpireIn))
                    <input type="hidden" id="otp-expire-in" value="{{ $otpExpireIn }}">
                @else
                    <input type="hidden" id="otp-expire-in" value="5">
                @endif
                <div class="resend-code-wrapper d-none" id="resend-code-wrapper">
                    <p class="mb-2 text-muted">{{ __("OTP has expired. Didn't receive the code?") }}</p>
                    <a class="text-muted register-link resend-verification-code-password"
                       href="javascript:void(0)"
                       id="resend-code-link"
                       data-resend-url="{{ route('password.resendOtp') }}"
                       data-text-resend="{{ __('Resend Code') }}"
                       data-text-sending="{{ __('Sending...') }}"
                       data-text-email-phone-required="{{ __('Email or phone number is required.') }}"
                       data-text-success="{{ __('OTP has been resent successfully.') }}"
                       data-text-error="{{ __('Failed to resend OTP. Please try again.') }}"
                       data-text-otp-valid="{{ __('OTP is valid for') }}"
                       data-text-minutes="{{ __('minutes') }}"
                       data-text-seconds="{{ __('seconds') }}">
                       <span class="resend-code d-none">{{ __('Resend Code') }}</span>
                       <span class="resend-sending d-none">{{ __('Sending') }}...</span>
                        <span class="resend-text">{{ __('Resend Code') }}</span>
                    </a>
                </div>
            </div>

            <button class="btn enhanced-submit-btn enhanced-login-submit mb-0 ltr:me-1 rtl:ms-1 loader w-100" type="submit">
                <span class="btn-text">{{ __("Continue") }}</span>
                <span class="anim spin enhanced-login-loader" role="status" aria-hidden="true"></span>
            </button>

            <p class="mb-2 text-muted text-center">{{ __("Click here to") }} <a class="text-muted register-link" href="{{ route('login') }}">{{ __("Log In") }}</a></p>
        </div>
    </div>
</form>

<script src="{{ asset('public/dist/js/custom/auth/enhanced-auth-forms.min.js?v=1.1.0') }}"></script>

@endsection
