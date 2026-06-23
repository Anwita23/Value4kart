@extends('admin.layouts.app2')
@section('page_title', __('Log In'))
@section('content')
<div class="auth-wrapper flex items-center justify-center min-h-screen bg-transparent">
    <div class="cart-icon-wrapper text-center">
        <img src="{{ asset('public/frontend/assets/img/coupon/cart.svg') }}" alt="Cart" class="cart-icon wow fadeIn" data-wow-duration="2s" data-wow-delay="0.5s" style="width: 100px; height: 100px;">
    </div>
    <div class="auth-form-wrapper mx-4 glass-card">
        <form action="{{ route('login.post') }}" method="post" id="admin-login-form" class="enhanced-login-form">
            @csrf
            @php
                $isShowEmail = preference('user_login', 'both') == 'email' || preference('user_login', 'both') == 'both';
            @endphp
            @if ($isShowEmail)
            <div class="al-field">
                <label class="al-label" for="login-email">{{ __('Email Address') }}</label>
                <input id="login-email" type="email" class="al-input" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter your email') }}" autocomplete="email">
            </div>
            @endif
            <div class="al-field">
                <label class="al-label" for="login-password">{{ __('Password') }}</label>
                <div class="al-input-wrap">
                    <input id="login-password" type="password" class="al-input password-field" name="password" placeholder="{{ __('Enter your password') }}" autocomplete="current-password">
                    <button type="button" class="al-eye-btn password-toggle-btn" aria-label="{{ __('Toggle password visibility') }}">
                        <svg class="password-hide-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                        <svg class="password-show-icon" style="display:none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
            </div>
            <div class="al-row-between al-field">
                <label class="al-remember"><input type="checkbox" name="remember" id="remember-me" checked><span>{{ __('Remember Me') }}</span></label>
                <a href="{{ route('login.reset') }}" class="al-forgot">{{ __('Forgot password?') }}</a>
            </div>
            @include('admin.auth.partial.re-captcha')
            <button type="submit" class="al-btn loader w-100 enhanced-login-submit" id="admin-login-btn"><span class="btn-text">{{ __('LOGIN') }}</span><span class="anim spin enhanced-login-loader" role="status" aria-hidden="true"></span></button>
            @if (isActive('SaaS'))
                <p class="al-footer-text">{{ __("Don't have an account?") }} <a href="{{ route('saas.registration') }}">{{ __("Sign Up") }}</a></p>
            @endif
        </form>
        @include('admin.auth.partial.demo-credential')
    </div>
</div>
<style>
.auth-wrapper { background: #ffffff; }
.glass-card { background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3); border-radius: 12px; padding: 2rem; }
</style>
@endsection

@section('js')
    @if(config('martvill.is_demo'))
    <script>
        var demoCredentials = '{!! json_encode(config('martvill.credentials')) !!}';
    </script>
    @endif
    <!-- Login Script -->
    @includeIf('externalcode::layouts.scripts.loginScript')
@endsection
