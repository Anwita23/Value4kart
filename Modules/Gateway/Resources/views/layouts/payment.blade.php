<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    @include('gateway::partial.favicon')
    <title>@yield('gateway') {{ __('Payment') }}</title>
    <link href="{{ asset('Modules/Gateway/Resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @yield('css')
    @includeIf('googleanalytics::partials.google_analytics_header')
    @includeIf('facebookpixel::partials.facebook_pixel_header')
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
        }
        .payment-wrapper {
            max-width: 1100px;
            width: 100%;
        }
        .main-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            display: flex;
            overflow: hidden;
            flex-wrap: wrap;
        }
        .left-col {
            padding: 50px;
            width: 55%;
        }
        .right-col {
            background: #f8fafc;
            padding: 50px;
            width: 45%;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-left: 1px solid #e2e8f0;
        }
        @media (max-width: 992px) {
            .left-col, .right-col { width: 100%; }
            .right-col { border-left: none; border-top: 1px solid #e2e8f0; }
        }
        .logo-container img {
            height: 40px;
            width: auto;
            object-fit: contain;
            margin-bottom: 40px;
        }
        .section-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: #94a3b8;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .gateway-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 10px;
        }
        .gateway-subtitle {
            font-size: 1rem;
            color: #64748b;
            margin-bottom: 40px;
            line-height: 1.5;
        }
        .amount-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px 25px;
            margin-bottom: 30px;
        }
        .amount-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
        }
        .gateway-logo {
            max-height: 35px;
            width: auto;
            object-fit: contain;
        }
        .back-link {
            display: inline-flex;
            align-items: center;
            color: #64748b;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 30px;
            transition: all 0.3s ease;
            justify-content: center;
            width: 100%;
        }
        .back-link:hover {
            color: #0f172a;
            text-decoration: none;
        }
        .back-link svg {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }
        .back-link:hover svg {
            transform: translateX(-5px);
        }
        /* Right col elements */
        .illustration-img {
            max-width: 100%;
            height: auto;
            margin-bottom: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .feature-list {
            width: 100%;
        }
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.03);
            border: 1px solid #f1f5f9;
        }
        .feature-icon {
            width: 24px;
            height: 24px;
            color: #2563eb;
            margin-right: 15px;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .feature-title {
            font-weight: 700;
            color: #1e293b;
            font-size: 0.95rem;
            margin-bottom: 4px;
        }
        .feature-desc {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.4;
        }
        /* Bottom Badges */
        .trust-badges {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 25px 20px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            width: 100%;
        }
        .trust-badge {
            display: flex;
            align-items: center;
            color: #475569;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .trust-badge svg {
            color: #2563eb;
            margin-right: 8px;
        }
        .footer-text {
            text-align: center;
            margin-top: 30px;
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
        }
        .payment-loader {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.9);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            opacity: 0;
            transition: 0.3s;
        }
        .payment-loader.active {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="payment-loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    
    <div class="payment-wrapper">
        <div class="main-card">
            <!-- Left Column -->
            <div class="left-col">
                <div class="logo-container">
                    @include('gateway::partial.logo')
                </div>
                
                <div class="section-label">{{ __('PAYMENT METHOD') }}</div>
                <h1 class="gateway-title">@yield('gateway')</h1>
                <p class="gateway-subtitle">
                    @hasSection('gateway_subtitle')
                        @yield('gateway_subtitle')
                    @else
                        {{ __('Pay securely using ') }} @yield('gateway').
                    @endif
                </p>
                
                <div class="amount-box">
                    <div>
                        <div class="section-label" style="font-size: 0.7rem;">{{ __('AMOUNT TO BE PAID') }}</div>
                        <div class="amount-value">{{ isset($purchaseData->total) ? formatNumber($purchaseData->total) : 0.00 }}</div>
                    </div>
                    <div class="text-end">
                        <div class="section-label" style="font-size: 0.7rem;">{{ __('GATEWAY') }}</div>
                        <img class="gateway-logo mt-1" src="@yield('logo')" alt="@yield('gateway')" />
                    </div>
                </div>
                
                @yield('content')
                
                <a href="{{ route('gateway.payment', withOldQueryIntegrity()) }}" class="back-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    <span>{{ __('Back to Payment') }}</span>
                </a>
            </div>
            
            <!-- Right Column -->
            <div class="right-col">
                @hasSection('illustration')
                    @yield('illustration')
                @else
                    <div style="height: 250px; width: 100%; background: #e2e8f0; border-radius: 16px; margin-bottom: 40px; display: flex; align-items: center; justify-content: center; color: #94a3b8;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </svg>
                    </div>
                @endif
                
                <div class="feature-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <div class="feature-title">{{ __('Safe & Secure') }}</div>
                            <div class="feature-desc">{{ __('Pay only when you receive your order') }}</div>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="feature-title">{{ __('Convenient') }}</div>
                            <div class="feature-desc">{{ __('No online payment needed initially') }}</div>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.514" />
                            </svg>
                        </div>
                        <div>
                            <div class="feature-title">{{ __('Trusted Delivery') }}</div>
                            <div class="feature-desc">{{ __('Verified and professional delivery partners') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Trust Badges -->
            <div class="trust-badges">
                <div class="trust-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/></svg>
                    {{ __('100% Secure') }}
                </div>
                <div class="trust-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 0l2.35 4.77 5.26.77-3.8 3.7 1.18 5.24L8 12.14 3.01 14.48l1.18-5.24-3.8-3.7 5.26-.77L8 0z"/></svg>
                    {{ __('Trusted by Thousands') }}
                </div>
                <div class="trust-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg>
                    {{ __('24/7 Support') }}
                </div>
            </div>
        </div>
        
        <div class="footer-text">
            &copy; {{ date('Y') }} {{ __('Value4Kart. All rights reserved.') }}
        </div>
    </div>

    <script src="{{ asset('Modules/Gateway/Resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/app.min.js') }}"></script>
    @yield('js')
</body>
</html>
