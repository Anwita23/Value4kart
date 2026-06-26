@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('cashondelivery.logo')))

@section('gateway', moduleConfig('cashondelivery.name'))

@section('gateway_subtitle')
    {{ __('Pay in cash when your order is delivered safely to your doorstep.') }}
@endsection

@section('illustration')
    <img src="{{ asset('public/dist/img/cod_delivery.png') }}" class="illustration-img" alt="Cash On Delivery Illustration">
@endsection

@section('content')
    <style>
        .info-box {
            background-color: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            color: #0369a1;
            font-size: 0.9rem;
            line-height: 1.5;
        }
        .info-box svg {
            flex-shrink: 0;
            margin-right: 15px;
        }
        .pay-button {
            width: 100%;
            background-color: #2563eb;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .pay-button:hover {
            background-color: #1d4ed8;
            box-shadow: 0 10px 15px -3px rgba(37,99,235,0.3);
            transform: translateY(-2px);
        }
        .pay-button svg {
            margin-right: 10px;
        }
        .error-box {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
        }
    </style>

    <div class="payment-box">
        @php
            $codResponse = \App\Models\Order::checkCashOnDelivery($purchaseData);
        @endphp
        
        @if ($codResponse['status'] == true && $codResponse['notAvailable'] == false)
            <div class="info-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ __('Kindly verify your order, and make cash payment in full (as mentioned on order invoice or shipping label) when the delivery agent arrives at your doorstep with your order.') }}</span>
            </div>
            
            <form action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('cashondelivery.alias')])) }}" method="post" id="payment-form">
                @csrf
                <button type="submit" class="pay-button sub-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                    </svg>
                    <span>{{ __('CONFIRM CASH ON DELIVERY') }}</span>
                </button>
            </form>
        @else
            <div class="error-box">
                <span>{{ __('Cash on delivery is not available for this order.') }}</span>
            </div>
        @endif
    </div>
@endsection
