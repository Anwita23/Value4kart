@extends('vendor.layouts.app')
@section('page_title', __('Dashboard'))
@section('css')
<link rel="stylesheet" href="{{ asset('public/dist/css/saas-dashboard.min.css') }}">
@endsection
@section('content')
<div class="va-page" data-analytics-storage-key="{{ 'vendor_analytics_' . ($variant ?? 12) . '_state' }}">
@php
$overviewItems = $overviewItems ?? [];
$primary = $primaryAnalytics ?? [];
$performance = $performanceData ?? [];
$mostSold = $performance['most_sold'] ?? [];
$lowStockProducts = $performance['low_stock_products'] ?? [];
$outOfStockProducts = $performance['out_of_stock_products'] ?? [];
$outOfStockCount = $performance['out_of_stock_count'] ?? 0;
$inventoryPurchase = $inventoryPurchase ?? [];
$recentOrders = $recentOrders ?? [];
$subscription = $subscription ?? [];
@endphp

<div class="ax12">
    {{-- 1. Overview — all 8 metrics (today, this month, last month, total) — same card design with icon ---------- --}}
    <section class="ax12-zone" style="padding-top: 30px;" aria-label="{{ __('Sale Overview') }}">
        <h2 class="ax12-zone-title">{{ __('Sale Overview') }}</h2>
        <div class="ax12-overview-grid">
            @foreach ($overviewItems as $key => $w)
            <div class="ax12-kpi" data-analytics-widget data-variant-key="{{ $key }}">
                <div class="ax12-kpi-icon"><i class="{{ $w['icon'] }}"></i></div>
                <div>
                    <div class="ax12-kpi-value">{{ $w['value'] }}</div>
                    <div class="ax12-kpi-label">{{ $w['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    {{-- 4. From a9: Performance — most sold products, low stock, out of stock ---------- --}}
    <section class="ax12-zone">
        <h2 class="ax12-zone-title">{{ __('Performance') }}</h2>
        <div class="ax12-perf-grid" id="ax12-perf-grid">
            <div class="ax12-card" data-analytics-widget data-variant-key="most_sold_product">
                <div class="ax12-card-header">{{ __('Most Sold Products') }}</div>
                <div class="ax12-card-body">
                    @if (count($mostSold) > 0)
                    <ul class="ax12-list">
                        @foreach ($mostSold as $i => $item)
                        <li class="ax12-list-item ax12-perf-tooltip-row" data-perf-tooltip-name="{{ e($item['name']) }}" data-perf-tooltip-label="{{ __('Sold') }}" data-perf-tooltip-value="{{ $item['qty'] }}">
                            <span class="ax12-list-rank">{{ $i + 1 }}</span>
                            <span class="ax12-list-name"><a href="{{ $item['url'] }}">{{ substr($item['name'], 0, 30) }} {{ strlen($item['name']) > 30 ? '...' : '' }}</a></span>
                            <div class="ax12-list-bar-wrap"><div class="ax12-list-bar" style="width: {{ $item['pct'] }}%;"></div></div>
                            <span class="ax12-list-meta">{{ $item['qty'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="ax12-empty-state">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="80" height="80" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m455.074 172.613 53.996-53.996a10 10 0 0 0-2.258-15.836l-64.914-35.644c-4.84-2.657-10.918-.887-13.578 3.953-2.656 4.844-.89 10.922 3.953 13.578l53.235 29.23-46.34 46.336L272.5 68.714l46.336-46.335 46.84 25.723c4.84 2.656 10.922.89 13.578-3.954 2.66-4.84.89-10.921-3.953-13.578L321.883 1.234A9.996 9.996 0 0 0 310 2.93l-54 54-54-54a10.003 10.003 0 0 0-11.883-1.696L5.187 102.781a9.994 9.994 0 0 0-5.085 7.356 9.987 9.987 0 0 0 2.828 8.48l53.996 53.996L2.93 226.605a9.994 9.994 0 0 0-2.828 8.485 9.987 9.987 0 0 0 5.086 7.351L61.07 273.13v102.57c0 3.653 1.989 7.012 5.188 8.77l184.93 101.543c1.5.824 3.156 1.234 4.812 1.234s3.313-.41 4.813-1.234l184.93-101.543a10.004 10.004 0 0 0 5.187-8.77V273.13l55.883-30.684a10 10 0 0 0 2.257-15.836zM256 262.746 91.848 172.61 256 82.47l164.152 90.14zM193.168 22.38 239.5 68.715l-166.668 91.52-46.336-46.337zM72.84 184.989l166.668 91.519-46.34 46.34-166.672-91.52zm358.09 184.796L266 460.348V358.125c0-5.523-4.477-10-10-10s-10 4.477-10 10v102.223L81.07 369.785v-85.672l109.047 59.88A10 10 0 0 0 202 342.297l54-54.001 54 54a9.984 9.984 0 0 0 7.074 2.93c1.64 0 3.297-.407 4.809-1.235l109.047-59.879zm-112.094-46.937-46.34-46.344 166.668-91.516 46.344 46.336zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path><path d="M404.8 68.176c2.63 0 5.2-1.07 7.071-2.934a10.07 10.07 0 0 0 2.93-7.066c0-2.633-1.07-5.211-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93c-2.64 0-5.211 1.066-7.07 2.93a10.023 10.023 0 0 0-2.93 7.07 10.02 10.02 0 0 0 2.93 7.066 10.067 10.067 0 0 0 7.07 2.934zM256 314.926c-2.629 0-5.21 1.066-7.07 2.93a10.087 10.087 0 0 0-2.93 7.07c0 2.636 1.07 5.207 2.93 7.078 1.86 1.86 4.441 2.922 7.07 2.922s5.21-1.063 7.07-2.922a10.105 10.105 0 0 0 2.93-7.078c0-2.633-1.07-5.203-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path></g></svg>
                        <p class="ax12-empty-state-msg">{{ __('There is no most sold products.') }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="ax12-card" data-analytics-widget data-variant-key="low_stock_products">
                <div class="ax12-card-header">{{ __('Low Stock Products') }} ({{ count($lowStockProducts) }})</div>
                <div class="ax12-card-body">
                    @if (count($lowStockProducts) > 0)
                    <ul class="ax12-list">
                        @foreach ($lowStockProducts as $i => $item)
                        <li class="ax12-list-item ax12-perf-tooltip-row" data-perf-tooltip-name="{{ e($item['name']) }}" data-perf-tooltip-label="{{ __('Stock') }}" data-perf-tooltip-value="{{ $item['qty'] }}">
                            <span class="ax12-list-rank">{{ $i + 1 }}</span>
                            <span class="ax12-list-name"><a href="{{ $item['url'] ?? '#' }}">{{ Str::limit($item['name'], 30) }}</a></span>
                            <div class="ax12-list-bar-wrap"><div class="ax12-list-bar" style="width: {{ $item['pct'] }}%;"></div></div>
                            <span class="ax12-list-meta">{{ $item['qty'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="ax12-empty-state">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="80" height="80" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m455.074 172.613 53.996-53.996a10 10 0 0 0-2.258-15.836l-64.914-35.644c-4.84-2.657-10.918-.887-13.578 3.953-2.656 4.844-.89 10.922 3.953 13.578l53.235 29.23-46.34 46.336L272.5 68.714l46.336-46.335 46.84 25.723c4.84 2.656 10.922.89 13.578-3.954 2.66-4.84.89-10.921-3.953-13.578L321.883 1.234A9.996 9.996 0 0 0 310 2.93l-54 54-54-54a10.003 10.003 0 0 0-11.883-1.696L5.187 102.781a9.994 9.994 0 0 0-5.085 7.356 9.987 9.987 0 0 0 2.828 8.48l53.996 53.996L2.93 226.605a9.994 9.994 0 0 0-2.828 8.485 9.987 9.987 0 0 0 5.086 7.351L61.07 273.13v102.57c0 3.653 1.989 7.012 5.188 8.77l184.93 101.543c1.5.824 3.156 1.234 4.812 1.234s3.313-.41 4.813-1.234l184.93-101.543a10.004 10.004 0 0 0 5.187-8.77V273.13l55.883-30.684a10 10 0 0 0 2.257-15.836zM256 262.746 91.848 172.61 256 82.47l164.152 90.14zM193.168 22.38 239.5 68.715l-166.668 91.52-46.336-46.337zM72.84 184.989l166.668 91.519-46.34 46.34-166.672-91.52zm358.09 184.796L266 460.348V358.125c0-5.523-4.477-10-10-10s-10 4.477-10 10v102.223L81.07 369.785v-85.672l109.047 59.88A10 10 0 0 0 202 342.297l54-54.001 54 54a9.984 9.984 0 0 0 7.074 2.93c1.64 0 3.297-.407 4.809-1.235l109.047-59.879zm-112.094-46.937-46.34-46.344 166.668-91.516 46.344 46.336zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path><path d="M404.8 68.176c2.63 0 5.2-1.07 7.071-2.934a10.07 10.07 0 0 0 2.93-7.066c0-2.633-1.07-5.211-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93c-2.64 0-5.211 1.066-7.07 2.93a10.023 10.023 0 0 0-2.93 7.07 10.02 10.02 0 0 0 2.93 7.066 10.067 10.067 0 0 0 7.07 2.934zM256 314.926c-2.629 0-5.21 1.066-7.07 2.93a10.087 10.087 0 0 0-2.93 7.07c0 2.636 1.07 5.207 2.93 7.078 1.86 1.86 4.441 2.922 7.07 2.922s5.21-1.063 7.07-2.922a10.105 10.105 0 0 0 2.93-7.078c0-2.633-1.07-5.203-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path></g></svg>
                        <p class="ax12-empty-state-msg">{{ __('There is no low stock products.') }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div class="ax12-card" data-analytics-widget data-variant-key="out_of_stock">
                <div class="ax12-card-header">{{ __('Out of Stock Products') }} ({{ $outOfStockCount }})</div>
                <div class="ax12-card-body">
                    @if (count($outOfStockProducts) > 0)
                    <ul class="ax12-list">
                        @foreach ($outOfStockProducts as $i => $p)
                        <li class="ax12-list-item ax12-perf-tooltip-row" data-perf-tooltip-name="{{ e($p['name']) }}" data-perf-tooltip-label="{{ __('Status') }}" data-perf-tooltip-value="{{ __('Out of stock') }}">
                            <span class="ax12-list-rank">{{ $i + 1 }}</span>
                            <span class="ax12-list-name"><a href="{{ $p['url'] ?? '#' }}">{{ Str::limit($p['name'], 40) }}</a></span>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="ax12-empty-state">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="80" height="80" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m455.074 172.613 53.996-53.996a10 10 0 0 0-2.258-15.836l-64.914-35.644c-4.84-2.657-10.918-.887-13.578 3.953-2.656 4.844-.89 10.922 3.953 13.578l53.235 29.23-46.34 46.336L272.5 68.714l46.336-46.335 46.84 25.723c4.84 2.656 10.922.89 13.578-3.954 2.66-4.84.89-10.921-3.953-13.578L321.883 1.234A9.996 9.996 0 0 0 310 2.93l-54 54-54-54a10.003 10.003 0 0 0-11.883-1.696L5.187 102.781a9.994 9.994 0 0 0-5.085 7.356 9.987 9.987 0 0 0 2.828 8.48l53.996 53.996L2.93 226.605a9.994 9.994 0 0 0-2.828 8.485 9.987 9.987 0 0 0 5.086 7.351L61.07 273.13v102.57c0 3.653 1.989 7.012 5.188 8.77l184.93 101.543c1.5.824 3.156 1.234 4.812 1.234s3.313-.41 4.813-1.234l184.93-101.543a10.004 10.004 0 0 0 5.187-8.77V273.13l55.883-30.684a10 10 0 0 0 2.257-15.836zM256 262.746 91.848 172.61 256 82.47l164.152 90.14zM193.168 22.38 239.5 68.715l-166.668 91.52-46.336-46.337zM72.84 184.989l166.668 91.519-46.34 46.34-166.672-91.52zm358.09 184.796L266 460.348V358.125c0-5.523-4.477-10-10-10s-10 4.477-10 10v102.223L81.07 369.785v-85.672l109.047 59.88A10 10 0 0 0 202 342.297l54-54.001 54 54a9.984 9.984 0 0 0 7.074 2.93c1.64 0 3.297-.407 4.809-1.235l109.047-59.879zm-112.094-46.937-46.34-46.344 166.668-91.516 46.344 46.336zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path><path d="M404.8 68.176c2.63 0 5.2-1.07 7.071-2.934a10.07 10.07 0 0 0 2.93-7.066c0-2.633-1.07-5.211-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93c-2.64 0-5.211 1.066-7.07 2.93a10.023 10.023 0 0 0-2.93 7.07 10.02 10.02 0 0 0 2.93 7.066 10.067 10.067 0 0 0 7.07 2.934zM256 314.926c-2.629 0-5.21 1.066-7.07 2.93a10.087 10.087 0 0 0-2.93 7.07c0 2.636 1.07 5.207 2.93 7.078 1.86 1.86 4.441 2.922 7.07 2.922s5.21-1.063 7.07-2.922a10.105 10.105 0 0 0 2.93-7.078c0-2.633-1.07-5.203-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path></g></svg>
                        <p class="ax12-empty-state-msg">{{ __('There is no out of stock products.') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="ax12-chart-tooltip ax12-perf-tooltip" id="ax12-perf-tooltip" role="tooltip" aria-hidden="true">
            <div class="ax12-chart-tooltip-inner">
                <div class="ax12-chart-tooltip-day" id="ax12-perf-tooltip-title"></div>
                <div class="ax12-chart-tooltip-row" id="ax12-perf-tooltip-row">
                    <span class="ax12-chart-tooltip-lbl" id="ax12-perf-tooltip-label"></span>
                    <span class="ax12-chart-tooltip-val" id="ax12-perf-tooltip-value"></span>
                </div>
                <div class="ax12-chart-tooltip-arrow"></div>
            </div>
        </div>
    </section>

    {{-- 2. Primary analytics — KPI strip + hero chart (dynamic via SaasDashboardService) ---------- --}}
    <section class="ax12-zone" data-analytics-widget data-variant-key="heatmap">
        <h2 class="ax12-zone-title">{{ __('Primary analytics') }}</h2>
        <div class="ax12-primary-hero">
            <div class="ax12-primary-kpi-strip">
                <div class="ax12-primary-kpi" data-analytics-widget data-variant-key="completed_orders">
                    <span class="ax12-primary-kpi-num">{{ $primary['complete_ratio'] ?? 0 }}%</span>
                    <div class="ax12-primary-kpi-meta">
                        <span class="ax12-primary-kpi-lbl">{{ __('Fulfillment rate') }}</span>
                        <span class="ax12-primary-kpi-trend up">{{ __('Completed orders ratio') }}</span>
                    </div>
                </div>
                <div class="ax12-primary-kpi" data-analytics-widget data-variant-key="pending_payment">
                    <span class="ax12-primary-kpi-num">{{ $primary['pending_ratio'] ?? 0 }}%</span>
                    <div class="ax12-primary-kpi-meta">
                        <span class="ax12-primary-kpi-lbl">{{ __('Pending payment') }}</span>
                        <span class="ax12-primary-kpi-trend middle">{{ __('Pending orders ratio') }}</span>
                    </div>
                </div>
                <div class="ax12-primary-kpi" data-analytics-widget data-variant-key="cancelled_orders">
                    <span class="ax12-primary-kpi-num">{{ $primary['cancel_ratio'] ?? 0 }}%</span>
                    <div class="ax12-primary-kpi-meta">
                        <span class="ax12-primary-kpi-lbl">{{ __('Cancellation ratio') }}</span>
                        <span class="ax12-primary-kpi-trend down">{{ __('Cancelled orders ratio') }}</span>
                    </div>
                </div>
                <div class="ax12-primary-kpi" data-analytics-widget data-variant-key="cancelled_orders">
                    <span class="ax12-primary-kpi-num">{{ $primary['other_ratio'] ?? 0 }}%</span>
                    <div class="ax12-primary-kpi-meta">
                        <span class="ax12-primary-kpi-lbl">{{ __('Other orders ratio') }}</span>
                        <span class="ax12-primary-kpi-trend other">{{ __('Other orders ratio') }}</span>
                    </div>
                </div>
            </div>
            <div class="ax12-primary-chart-wrap">
                <h3 class="ax12-primary-chart-title">{{ __('Sales Trend') }}</h3>
                <p class="ax12-primary-chart-sub">{{ __('Last 30 days') }}</p>
                <div class="ax12-primary-chart" id="ax12-chart-hover-wrap" data-day-label="{{ __("Day") }}">
                    @php
                        $salesData = $primary['sales_data'] ?? array_fill(0, 30, 0);
                        $ordersData = $primary['orders_data'] ?? array_fill(0, 30, 0);
                        $salesLabels = $primary['sales_labels'] ?? array_map(fn($d) => (string) $d, range(1, 30));
                        $peakIdx = $primary['chart_peak_index'] ?? 0;
                        $maxSales = $primary['chart_max_sales'] ?? 0;
                    @endphp
                    <svg viewBox="0 0 100 100" preserveAspectRatio="none" aria-label="{{ __('Sales trend last 30 days') }}" class="ax12-chart-svg">
                        <defs>
                            <linearGradient id="ax12-chart-gradient" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#4f46e5" stop-opacity="0.14"/>
                                <stop offset="100%" stop-color="#4f46e5" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <line x1="0" y1="20" x2="100" y2="20" stroke="#e2e8f0" stroke-width="0.08"/>
                        <line x1="0" y1="50" x2="100" y2="50" stroke="#e2e8f0" stroke-width="0.08"/>
                        <line x1="0" y1="80" x2="100" y2="80" stroke="#e2e8f0" stroke-width="0.08"/>
                        <path d="{{ $primary['chart_area_path'] ?? '' }}" fill="url(#ax12-chart-gradient)"/>
                        <path d="{{ $primary['chart_path'] ?? '' }}" fill="none" stroke="#4f46e5" stroke-width="0.3" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="{{ $primary['chart_peak_x'] ?? 0 }}" cy="{{ $primary['chart_peak_y'] ?? 0 }}" r="1.2" fill="#4f46e5" stroke="#fff" stroke-width="0.35">
                            <title>{{ __('Peak') }}: {{ __('Day') }} {{ $salesLabels[$peakIdx] ?? $peakIdx + 1 }} — {{ __('Sales') }} ${{ number_format($maxSales) }}, {{ __('Orders') }} {{ $ordersData[$peakIdx] ?? 0 }}</title>
                        </circle>
                        @foreach ($salesData as $i => $v)
                        <rect class="ax12-chart-hover-rect" x="{{ $i * ($primary['chart_day_width'] ?? (100/30)) }}" y="0" width="{{ $primary['chart_day_width'] ?? (100/30) }}" height="100" fill="transparent"
                              data-day="{{ $i + 1 }}"
                              data-date-label="{{ $primary['sales_labels_tooltip'][$i] ?? '' }}"
                              data-sales="{{ $v }}"
                              data-orders="{{ $ordersData[$i] ?? 0 }}">
                        </rect>
                        @endforeach
                    </svg>
                    <div class="ax12-chart-tooltip" id="ax12-chart-tooltip" role="tooltip" aria-hidden="true">
                        <div class="ax12-chart-tooltip-inner">
                            <div class="ax12-chart-tooltip-day" id="ax12-chart-tooltip-day"></div>
                            <div class="ax12-chart-tooltip-row">
                                <span class="ax12-chart-tooltip-lbl">{{ __('Sales') }}</span>
                                <span class="ax12-chart-tooltip-val ax12-chart-tooltip-sales" id="ax12-chart-tooltip-sales"></span>
                            </div>
                            <div class="ax12-chart-tooltip-row">
                                <span class="ax12-chart-tooltip-lbl">{{ __('Orders') }}</span>
                                <span class="ax12-chart-tooltip-val" id="ax12-chart-tooltip-orders"></span>
                            </div>
                            <div class="ax12-chart-tooltip-arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="ax12-primary-chart-labels">
                    @foreach ($salesLabels as $l)
                    <span>{{ $l }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Inventory & purchase ---------- --}}
    <section class="ax12-zone">
        <h2 class="ax12-zone-title">{{ __('Inventory & purchase') }}</h2>
        <div class="ax12-inv-cust">
            <div class="ax12-card ax12-group">
                <div class="ax12-group-title">{{ __('Inventory') }}</div>
                <div class="ax12-inv-grid">
                    <div class="ax12-group-item" data-analytics-widget data-variant-key="low_stock_products">
                        <div class="ax12-group-val">{{ $inventoryPurchase['low_stock_count'] ?? 0 }}</div>
                        <div class="ax12-group-lbl">{{ __('Low stock') }} (≤10)</div>
                    </div>
                    <div class="ax12-group-item" data-analytics-widget data-variant-key="out_of_stock">
                        <div class="ax12-group-val">{{ $outOfStockCount }}</div>
                        <div class="ax12-group-lbl">{{ __('Out of stock') }}</div>
                    </div>
                    <div class="ax12-group-item" data-analytics-widget data-variant-key="this_month_products">
                        <div class="ax12-group-val">{{ $inventoryPurchase['this_month_products'] ?? 0 }}</div>
                        <div class="ax12-group-lbl">{{ __('Monthly items') }}</div>
                    </div>
                    <div class="ax12-group-item" data-analytics-widget data-variant-key="total_products">
                        <div class="ax12-group-val">{{ number_format($inventoryPurchase['total_products'] ?? 0) }}</div>
                        <div class="ax12-group-lbl">{{ __('Total products') }}</div>
                    </div>
                </div>
            </div>
            <div class="ax12-card ax12-group">
                <div class="ax12-group-title">{{ __('Purchase') }}</div>
                <div class="ax12-purchase-grid">
                    <div class="ax12-group-item" data-analytics-widget data-variant-key="this_month_purchase">
                        <div class="ax12-group-val">{{ $inventoryPurchase['this_month_purchase'] ?? '—' }}</div>
                        <div class="ax12-group-lbl">{{ __('This month purchase') }}</div>
                    </div>
                    <div class="ax12-group-item" data-analytics-widget data-variant-key="total_purchase">
                        <div class="ax12-group-val">{{ $inventoryPurchase['total_purchase'] ?? '—' }}</div>
                        <div class="ax12-group-lbl">{{ __('Total purchase') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 6. Recent orders (75%) + Subscription (25%) ---------- --}}
    <section class="ax12-zone">
        <h2 class="ax12-zone-title">{{ __('Recent orders') }}</h2>
        <div class="ax12-recent-row">
            <div class="ax12-card" data-analytics-widget data-variant-key="recent_orders" style="min-width: 0;">
                <div class="ax12-card-header">{{ __('Recent Orders') }}</div>
                <div class="ax12-table-wrap">
                    <table class="ax12-table">
                        <thead>
                            <tr>
                                <th>{{ __('Reference') }}</th>
                                <th>{{ __('Customer') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th width="20%">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentOrders as $r)
                            <tr>
                                <td><a href="{{ $r['url'] ?? '#' }}">{{ $r['reference'] ?? '#' }}</a></td>
                                <td>{{ $r['customer_name'] ?? '—' }}</td>
                                <td>{{ $r['order_date'] ?? '—' }}</td>
                                <td>{{ $r['total'] ?? '—' }}</td>
                                <td width="20%"><span class="ax12-badge ax12-badge-{{ Str::slug($r['status_slug'] ?? 'pending') }}">{{ $r['status_name'] == 'Pending Payment' ? __('Pending') : $r['status_name'] ?? __('Pending') }}</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m455.074 172.613 53.996-53.996a10 10 0 0 0-2.258-15.836l-64.914-35.644c-4.84-2.657-10.918-.887-13.578 3.953-2.656 4.844-.89 10.922 3.953 13.578l53.235 29.23-46.34 46.336L272.5 68.714l46.336-46.335 46.84 25.723c4.84 2.656 10.922.89 13.578-3.954 2.66-4.84.89-10.921-3.953-13.578L321.883 1.234A9.996 9.996 0 0 0 310 2.93l-54 54-54-54a10.003 10.003 0 0 0-11.883-1.696L5.187 102.781a9.994 9.994 0 0 0-5.085 7.356 9.987 9.987 0 0 0 2.828 8.48l53.996 53.996L2.93 226.605a9.994 9.994 0 0 0-2.828 8.485 9.987 9.987 0 0 0 5.086 7.351L61.07 273.13v102.57c0 3.653 1.989 7.012 5.188 8.77l184.93 101.543c1.5.824 3.156 1.234 4.812 1.234s3.313-.41 4.813-1.234l184.93-101.543a10.004 10.004 0 0 0 5.187-8.77V273.13l55.883-30.684a10 10 0 0 0 2.257-15.836zM256 262.746 91.848 172.61 256 82.47l164.152 90.14zM193.168 22.38 239.5 68.715l-166.668 91.52-46.336-46.337zM72.84 184.989l166.668 91.519-46.34 46.34-166.672-91.52zm358.09 184.796L266 460.348V358.125c0-5.523-4.477-10-10-10s-10 4.477-10 10v102.223L81.07 369.785v-85.672l109.047 59.88A10 10 0 0 0 202 342.297l54-54.001 54 54a9.984 9.984 0 0 0 7.074 2.93c1.64 0 3.297-.407 4.809-1.235l109.047-59.879zm-112.094-46.937-46.34-46.344 166.668-91.516 46.344 46.336zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path><path d="M404.8 68.176c2.63 0 5.2-1.07 7.071-2.934a10.07 10.07 0 0 0 2.93-7.066c0-2.633-1.07-5.211-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93c-2.64 0-5.211 1.066-7.07 2.93a10.023 10.023 0 0 0-2.93 7.07 10.02 10.02 0 0 0 2.93 7.066 10.067 10.067 0 0 0 7.07 2.934zM256 314.926c-2.629 0-5.21 1.066-7.07 2.93a10.087 10.087 0 0 0-2.93 7.07c0 2.636 1.07 5.207 2.93 7.078 1.86 1.86 4.441 2.922 7.07 2.922s5.21-1.063 7.07-2.922a10.105 10.105 0 0 0 2.93-7.078c0-2.633-1.07-5.203-2.93-7.07a10.063 10.063 0 0 0-7.07-2.93zm0 0" fill="#b6b6b6" opacity="1" data-original="#000000" class=""></path></g></svg>
                                    <p class="ax12-empty-state-msg">{{ __('There is no recent orders.') }}</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ax12-subscription" data-analytics-widget data-variant-key="subscription">
                <div class="ax12-subscription-header">{{ __('Subscription') }}</div>
                <div class="ax12-subscription-body">
                    <div class="ax12-subscription-row">
                        <span class="ax12-subscription-lbl">{{ __('Current plan') }}</span>
                        <span class="ax12-subscription-val">{{ $subscription['current_plan'] ?? '—' }}</span>
                    </div>
                    <div class="ax12-subscription-row">
                        <span class="ax12-subscription-lbl">{{ __('Plan price') }}</span>
                        <span class="ax12-subscription-val">{{ $subscription['plan_price'] ?? '—' }}</span>
                    </div>
                    <div class="ax12-subscription-row">
                        <span class="ax12-subscription-lbl">{{ __('Activation date') }}</span>
                        <span class="ax12-subscription-val">{{ $subscription['activation_date'] ?? '—' }}</span>
                    </div>
                    <div class="ax12-subscription-row">
                        <span class="ax12-subscription-lbl">{{ __('Expiration date') }}</span>
                        <span class="ax12-subscription-val">{{ $subscription['expiration_date'] ?? '—' }}</span>
                    </div>
                    <div class="ax12-subscription-row">
                        <span class="ax12-subscription-lbl">{{ __('Subscription status') }}</span>
                        <span class="ax12-subscription-val"><span class="ax12-subscription-status {{ $subscription['subscription_status'] == 'Active' ? 'active' : 'pending' }}">{{ $subscription['subscription_status'] ?? '—' }}</span></span>
                    </div>
                    <div class="ax12-subscription-row">
                        <span class="ax12-subscription-lbl">{{ __('Payment status') }}</span>
                        <span class="ax12-subscription-val"><span class="ax12-subscription-status {{ $subscription['payment_status'] == 'Paid' ? 'paid' : 'pending' }}">{{ $subscription['payment_status'] ?? '—' }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js')
<script>
    const defaultCurrency = "{{ $defaultCurrency ?? '$' }}";    
</script>
<script src="{{ asset('public/dist/js/custom/saas-dashboard.min.js') }}"></script>
@endsection
