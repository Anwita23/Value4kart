@extends('admin.auth.login_templates.' . (isset($template) ? $template : preference('auth_template_name', 'template-1')) . '.index')

@section('sub-content')
<link rel="stylesheet" href="{{ asset('dist/css/admin-login.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<div class="al-page">
    {{-- Decorative mid orb --}}
    <div class="al-orb-mid"></div>

    {{-- LEFT PANEL --}}
    <div class="al-left">
        <div class="al-left__inner">
            <div class="al-left__text">
                <h2 class="al-left__heading">Welcome to Value4Kart</h2>
                <p class="al-left__sub">Manage your {{ preference('company_name') }} store with ease. Access orders, products, customers and settings from one place.</p>
            </div>
            <div class="al-left__illustration">
                <img src="{{ asset('dist/images/login-illustration.png') }}" alt="E-commerce illustration">
            </div>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="al-right">
        <div class="al-right__form-wrap">

            {{-- Logo inside glass card --}}
            <div class="al-right__logo">
                @php $loginLogo = App\Models\Preference::getLogo('company_logo'); @endphp
                <img src="{{ $loginLogo }}" alt="{{ preference('company_name') }}">
            </div>

            <h2 class="al-right__title">Admin Login</h2>

            {{-- Notifications --}}
            <div class="al-notifications mb-3">
                @include('admin.auth.partial.notification')
            </div>

            <form action="{{ route('login.post') }}" method="post" id="admin-login-form" class="enhanced-login-form">
                @csrf

                @php
                    $isShowEmail = preference('user_login', 'both') == 'email' || preference('user_login', 'both') == 'both';
                @endphp

                {{-- Email field --}}
                @if ($isShowEmail)
                <div class="al-field">
                    <div class="al-input-wrap">
                        <svg class="al-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <input id="login-email"
                               type="email"
                               class="al-input"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="{{ __('Enter your email') }}"
                               autocomplete="email">
                    </div>
                </div>
                @endif

                {{-- Password field --}}
                <div class="al-field">
                    <div class="al-input-wrap">
                        <svg class="al-input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                        <input id="login-password"
                               type="password"
                               class="al-input password-field"
                               name="password"
                               placeholder="{{ __('Enter your password') }}"
                               autocomplete="current-password">
                        <button type="button" class="al-eye-btn password-toggle-btn" aria-label="{{ __('Toggle password visibility') }}">
                            <svg class="password-hide-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                            <svg class="password-show-icon" style="display:none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Remember + Forgot --}}
                <div class="al-row-between al-field">
                    <label class="al-remember">
                        <input type="checkbox" name="remember" id="remember-me" checked>
                        <span>{{ __('Remember Me') }}</span>
                    </label>
                    <a href="{{ route('login.reset') }}" class="al-forgot">{{ __('Forgot password?') }}</a>
                </div>

                @include('admin.auth.partial.re-captcha')

                {{-- Submit --}}
                <button type="submit" class="al-btn loader w-100 enhanced-login-submit" id="admin-login-btn">
                    <span class="btn-text">{{ __('LOGIN') }}</span>
                    <span class="anim spin enhanced-login-loader" role="status" aria-hidden="true"></span>
                </button>

                @if (isActive('SaaS'))
                    <p class="al-footer-text">{{ __("Don't have an account?") }} <a href="{{ route('saas.registration') }}">{{ __("Sign Up") }}</a></p>
                @endif
            </form>

            @include('admin.auth.partial.demo-credential')
        </div>
    </div>
</div>

<script>
    // Password toggle
    document.querySelectorAll('.password-toggle-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = this.closest('.al-input-wrap').querySelector('.password-field');
            var hideIcon = this.querySelector('.password-hide-icon');
            var showIcon = this.querySelector('.password-show-icon');
            if (input.type === 'password') {
                input.type = 'text';
                hideIcon.style.display = 'none';
                showIcon.style.display = 'block';
            } else {
                input.type = 'password';
                hideIcon.style.display = 'block';
                showIcon.style.display = 'none';
            }
        });
    });

    // Icon darkens when input has content
    document.querySelectorAll('.al-input-wrap .al-input').forEach(function(input) {
        input.addEventListener('input', function() {
            var icon = this.parentNode.querySelector('.al-input-icon');
            if (this.value.trim().length > 0) {
                icon.classList.add('dark');
            } else {
                icon.classList.remove('dark');
            }
        });
        // Initialize on page load
        if (input.value.trim().length > 0) {
            var icon = input.parentNode.querySelector('.al-input-icon');
            icon.classList.add('dark');
        }
    });
</script>

@endsection
