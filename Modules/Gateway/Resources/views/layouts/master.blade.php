<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    @include('gateway::partial.favicon')
    <title>{{ __('Gateway') }}</title>
    <link href="{{ asset('Modules/Gateway/Resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Modules/Gateway/Resources/assets/css/gateway.min.css') }}">
    @yield('css')
    @includeIf('googleanalytics::partials.google_analytics_header')
    @includeIf('facebookpixel::partials.facebook_pixel_header')
</head>

<body>
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .modern-checkout-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .checkout-container {
            background: #fff;
            border-radius: 16px;
            max-width: 1000px;
            width: 100%;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            display: flex;
            flex-wrap: wrap;
        }
        .checkout-left {
            background: #fff;
            padding: 40px;
            border-right: 1px solid #eee;
            width: 50%;
        }
        .checkout-right {
            background: #fafafa;
            padding: 40px;
            width: 50%;
        }
        @media (max-width: 768px) {
            .checkout-left, .checkout-right { width: 100%; }
            .checkout-left { border-right: none; border-bottom: 1px solid #eee; }
        }
        .checkout-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .checkout-header img {
            max-height: 45px;
            margin-bottom: 15px;
        }
        .product-image {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }
        .product-card {
            padding: 15px 0;
        }
        .total-amount-box {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
            border-left: 5px solid #2563eb;
            margin-bottom: 35px;
        }
        .total-amount-box .amount {
            font-size: 2.2rem;
            font-weight: 800;
            color: #2563eb;
        }
        .payment-methods-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 25px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        /* Pay Box modern overrides */
        .pay-box {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 15px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            color: #333;
        }
        .pay-box:hover {
            border-color: #2563eb;
            box-shadow: 0 10px 20px rgba(37,99,235,0.12);
            transform: translateY(-3px);
            text-decoration: none;
        }
        .pay-box img {
            max-height: 45px;
        }
        .return-link {
            display: inline-flex;
            align-items: center;
            position: relative;
            color: #4B5563;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-top: 20px;
            white-space: nowrap;
        }
        .return-link svg {
            position: absolute;
            left: 0;
            transition: transform 0.3s ease;
        }
        .return-link span {
            margin-left: 25px;
        }
        .return-link:hover svg {
            transform: translateX(-5px);
        }
        .return-link:hover {
            color: #111827;
            text-decoration: none;
        }
        /* hide original structure */
        .card1 { display: none !important; }
        .payment-loader {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.8);
            z-index: 100;
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

    <div class="modern-checkout-wrapper">
        <div class="payment-loader">
            <div class="sp sp-circle"></div>
        </div>
        
        <div class="checkout-container">
            <!-- Left Column: Product Details -->
            <div class="checkout-left">
                <div class="checkout-header">
                    @include('gateway::partial.logo')
                    <h4 style="font-weight: 800; color: #1e293b; margin-top: 15px;">{{ __('Checkout') }}</h4>
                </div>
                
                @php
                    $order = null;
                    if (isset($purchaseData->sending_details) && isset($purchaseData->sending_details->id)) {
                        $order = \App\Models\Order::with('orderDetails')->find($purchaseData->sending_details->id);
                    }
                @endphp
                
                @if($order && $order->orderDetails->count() > 0)
                    @php
                        $orderAction = new \App\Services\Actions\OrderAction();
                    @endphp
                    <div class="product-list" style="max-height: 650px; overflow-y: auto;">
                        @foreach($order->orderDetails as $detail)
                            @php
                                $productInfo = $orderAction->getProductInfo($detail);
                                $imageUrl = $productInfo['image'];
                            @endphp
                            <div class="product-card text-center">
                                <img src="{{ $imageUrl }}" alt="{{ $detail->product_name }}" class="product-image mb-4">
                                <div style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 10px;">{{ $detail->product_name }}</div>
                                <div style="color: #64748b; font-size: 1rem; margin-bottom: 20px; font-weight: 600;">{{ __('Qty') }}: {{ $detail->quantity + 0 }}</div>
                                
                                <div class="d-flex justify-content-center flex-column align-items-center" style="font-size: 0.95rem;">
                                    <div class="d-flex justify-content-between w-75 mb-2">
                                        <span class="text-muted">{{ __('Price') }}:</span>
                                        <span class="font-weight-bold" style="color: #334155;">{{ formatNumber($detail->price) }}</span>
                                    </div>
                                    @if($detail->shipping_charge > 0)
                                    <div class="d-flex justify-content-between w-75 mb-2">
                                        <span class="text-muted">{{ __('Shipping') }}:</span>
                                        <span class="font-weight-bold" style="color: #334155;">{{ formatNumber($detail->shipping_charge) }}</span>
                                    </div>
                                    @endif
                                    @if($detail->tax_charge > 0)
                                    <div class="d-flex justify-content-between w-75 mb-2">
                                        <span class="text-muted">{{ __('Tax') }}:</span>
                                        <span class="font-weight-bold" style="color: #334155;">{{ formatNumber($detail->tax_charge) }}</span>
                                    </div>
                                    @endif
                                    <hr class="w-75 my-3" style="border-top: 1px dashed #cbd5e1;">
                                    <div class="d-flex justify-content-between w-75">
                                        <span class="text-dark font-weight-bold" style="font-size: 1.1rem;">{{ __('Total') }}:</span>
                                        <span class="text-dark font-weight-bold" style="font-size: 1.1rem; color: #0f172a;">{{ formatNumber(($detail->price * $detail->quantity) + $detail->shipping_charge + $detail->tax_charge) }}</span>
                                    </div>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <hr style="border-top: 2px solid #f1f5f9; margin: 30px 0;">
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right Column: Payment Methods -->
            <div class="checkout-right position-relative">
                <h3 class="payment-methods-title">{{ __('Payment Methods') }}</h3>
                
                <div class="total-amount-box">
                    <span class="text-muted text-uppercase" style="font-size: 0.85rem; font-weight: 800; letter-spacing: 1.5px;">{{ __('Amount to be paid') }}</span>
                    <div class="amount mt-2">{{ formatNumber($purchaseData->total) }}</div>
                </div>

                @include('gateway::partial.errors')
                
                <div class="payment-options-container">
                    @yield('content')
                </div>
                
                <div class="text-center w-100 mt-3">
                    <a href="{{ url('checkout?select=all') }}" class="return-link">
                        <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.70711 0L6.12132 1.41421L3.82843 3.70711H13.4142C13.9665 3.70711 14.4142 4.15482 14.4142 4.70711C14.4142 5.25939 13.9665 5.70711 13.4142 5.70711H3.82843L6.12132 8L4.70711 9.41421L0 4.70711L4.70711 0Z" fill="currentColor" />
                        </svg>
                        <span>{{ __('Close') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var response = {
            status: "failed",
            message: "{{ __('Payment cancelled.') }}"
        }
    </script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/app.min.js') }}"></script>
    @yield('js')
</body>

</html>
