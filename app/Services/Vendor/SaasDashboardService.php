<?php

namespace App\Services\Vendor;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SaasDashboardService
{
    /**
     * Number of days for sales trend (e.g. last 30 days).
     */
    protected int $trendDays = 30;

    /**
     * Get vendor id for the current user.
     */
    protected function getVendorId(): ?int
    {
        $user = auth()->user();
        if (! $user) {
            return null;
        }

        if (method_exists($user, 'vendor') && $user->vendor()) {
            return $user->vendor()->vendor_id ?? $user->id;
        }

        return $user->id;
    }

    /**
     * Date string at offset from today (e.g. -30 for 30 days ago).
     */
    protected function offsetDate(string $offset): string
    {
        return date('Y-m-d', strtotime($offset . ' day'));
    }

    /**
     * Format amount as currency string (e.g. $1,240).
     */
    protected function formatSales(float $amount): string
    {
        $symbol = '$';
        if (function_exists('currency') && currency()) {
            $symbol = currency()->symbol ?? $symbol;
        }

        return $symbol . number_format(round($amount, 0));
    }

    /**
     * Base query: Order joined with order_details for vendor, returns query builder.
     */
    protected function ordersForVendorQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $vendorId = $this->getVendorId();

        return Order::query()
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.vendor_id', $vendorId);
    }

    /**
     * Get sales amount from orders table (sum of orders.total) for the vendor's orders matching the date scope.
     * Each order has one vendor; we group by order so each order total is counted once.
     */
    protected function getSalesAmount(\Closure $dateWhere): float
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return 0;
        }

        $q = Order::query()
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.vendor_id', $vendorId);
        $dateWhere($q);

        return (float) $q->groupBy('orders.id', 'orders.total')->select('orders.total')->get()->sum('total');
    }

    /**
     * Get order count (distinct orders) for the vendor matching the date scope.
     */
    protected function getOrderCount(\Closure $dateWhere): int
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return 0;
        }

        $q = Order::query()
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.vendor_id', $vendorId);
        $dateWhere($q);

        return (int) $q->select(DB::raw('count(distinct orders.id) as c'))->value('c');
    }

    /**
     * Get sale overview items for the dashboard (today, this month, last month, total).
     * Uses order table for dates; counts distinct orders and sums vendor sales from order_details.
     */
    public function getSaleOverview(): array
    {
        $today = date('Y-m-d');
        $firstDayThisMonth = date('Y-m-01');
        $lastDayThisMonth = date('Y-m-t');
        $firstDayLastMonth = date('Y-m-01', strtotime('first day of last month'));
        $lastDayLastMonth = date('Y-m-t', strtotime('last day of last month'));

        $todaySales = $this->getSalesAmount(function ($q) use ($today) {
            $q->whereDate('orders.order_date', $today);
        });
        $todayOrders = $this->getOrderCount(function ($q) use ($today) {
            $q->whereDate('orders.order_date', $today);
        });
        $thisMonthSales = $this->getSalesAmount(function ($q) use ($firstDayThisMonth, $lastDayThisMonth) {
            $q->whereBetween('orders.order_date', [$firstDayThisMonth, $lastDayThisMonth]);
        });
        $thisMonthOrders = $this->getOrderCount(function ($q) use ($firstDayThisMonth, $lastDayThisMonth) {
            $q->whereBetween('orders.order_date', [$firstDayThisMonth, $lastDayThisMonth]);
        });
        $lastMonthSales = $this->getSalesAmount(function ($q) use ($firstDayLastMonth, $lastDayLastMonth) {
            $q->whereBetween('orders.order_date', [$firstDayLastMonth, $lastDayLastMonth]);
        });
        $lastMonthOrders = $this->getOrderCount(function ($q) use ($firstDayLastMonth, $lastDayLastMonth) {
            $q->whereBetween('orders.order_date', [$firstDayLastMonth, $lastDayLastMonth]);
        });
        $totalSales = $this->getSalesAmount(function ($q) {
            // no date filter = all time (closure may be called with $q only)
        });
        $totalOrders = $this->getOrderCount(function ($q) {
            // no date filter
        });

        return [
            'total_sales' => ['label' => __('Total Sales'), 'value' => $this->formatSales($totalSales), 'icon' => 'feather icon-bar-chart-2'],
            'total_orders' => ['label' => __('Total Orders'), 'value' => (string) number_format($totalOrders), 'icon' => 'feather icon-shopping-cart'],
            'this_month_sales' => ['label' => __('This Month Sales'), 'value' => $this->formatSales($thisMonthSales), 'icon' => 'feather icon-bar-chart-2'],
            'this_month_orders' => ['label' => __('This Month Orders'), 'value' => (string) number_format($thisMonthOrders), 'icon' => 'feather icon-shopping-cart'],
            'today_sales' => ['label' => __("Today's Sales"), 'value' => $this->formatSales($todaySales), 'icon' => 'feather icon-bar-chart-2'],
            'today_orders' => ['label' => __("Today's Orders"), 'value' => (string) number_format($todayOrders), 'icon' => 'feather icon-shopping-cart'],
            'last_month_sales' => ['label' => __('Last Month Sales'), 'value' => $this->formatSales($lastMonthSales), 'icon' => 'feather icon-bar-chart-2'],
            'last_month_orders' => ['label' => __('Last Month Orders'), 'value' => (string) number_format($lastMonthOrders), 'icon' => 'feather icon-shopping-cart'],
        ];
    }

    /**
     * Get order status counts for the vendor in the last 30 days.
     * Returns array of [ 'key' => slug, 'label' => name, 'count' => int, 'color' => hex ].
     */
    public function getOrderStatusCounts(): array
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return $this->defaultOrderStatus();
        }

        $from = $this->offsetDate('-' . $this->trendDays);

        $counts = OrderDetail::query()
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->join('order_statuses', 'order_statuses.id', '=', 'orders.order_status_id')
            ->where('order_details.vendor_id', $vendorId)
            ->where('orders.order_date', '>=', $from)
            ->groupBy('order_details.order_status_id', 'order_statuses.name', 'order_statuses.slug')
            ->select(
                'order_statuses.slug as key',
                'order_statuses.name as label',
                DB::raw('count(distinct order_details.order_id) as count')
            )
            ->get();

        $colors = [
            'pending' => '#64748b',
            'processing' => '#0d9488',
            'completed' => '#15803d',
            'cancelled' => '#dc2626',
        ];

        return $counts->map(function ($row) use ($colors) {
            return [
                'key' => $row->key ?? 'other',
                'label' => $row->label,
                'count' => (int) $row->count,
                'color' => $colors[$row->key ?? ''] ?? '#64748b',
            ];
        })->all();
    }

    /**
     * Default order status structure when no vendor/auth.
     */
    protected function defaultOrderStatus(): array
    {
        return [
            ['key' => 'pending', 'label' => __('Pending'), 'count' => 0, 'color' => '#64748b'],
            ['key' => 'processing', 'label' => __('Processing'), 'count' => 0, 'color' => '#0d9488'],
            ['key' => 'completed', 'label' => __('Completed'), 'count' => 0, 'color' => '#15803d'],
            ['key' => 'cancelled', 'label' => __('Cancelled'), 'count' => 0, 'color' => '#dc2626'],
        ];
    }

    /**
     * Get fulfillment rate (completed %) and cancellation rate (cancelled %) from order status counts.
     */
    public function getOrderRatios(array $orderStatusCounts): array
    {
        $total = array_sum(array_column($orderStatusCounts, 'count'));
        $completed = 0;
        $cancelled = 0;
        $pending = 0;
        $other = 0;
        foreach ($orderStatusCounts as $row) {
            if (strtolower($row['key'] ?? '') === 'completed') {
                $completed = (int) ($row['count'] ?? 0);
            }
            if (strtolower($row['key'] ?? '') === 'cancelled') {
                $cancelled = (int) ($row['count'] ?? 0);
            }
            if (strtolower($row['key'] ?? '') === 'pending-payment') {
                $pending = (int) ($row['count'] ?? 0);
            }
            if (! in_array(strtolower($row['key'] ?? ''), ['completed', 'cancelled', 'pending-payment'])) {
                $other = (int) ($row['count'] ?? 0);
            }
        }

        return [
            'complete_ratio' => $total ? round(($completed / $total) * 100, 1) : 0,
            'cancel_ratio' => $total ? round(($cancelled / $total) * 100, 1) : 0,
            'pending_ratio' => $total ? round(($pending / $total) * 100, 1) : 0,
            'other_ratio' => $total ? round(($other / $total) * 100, 1) : 0,
        ];
    }

    /**
     * Build month-day labels for the last N days (e.g. Jun-15, Jun-16) for chart axis.
     */
    protected function buildSalesTrendLabels(): array
    {
        $from = $this->offsetDate('-' . ($this->trendDays - 1));
        $baseDate = date('Y-m-d', strtotime($from));
        $labels = [];
        for ($i = 0; $i < $this->trendDays; $i++) {
            $labels[] = date('M-j', strtotime($baseDate . ' +' . $i . ' day'));
        }

        return $labels;
    }

    /**
     * Build date labels for tooltip (e.g. Feb 13, Feb 14).
     */
    protected function buildSalesTrendTooltipLabels(): array
    {
        $from = $this->offsetDate('-' . ($this->trendDays - 1));
        $baseDate = date('Y-m-d', strtotime($from));
        $labels = [];
        for ($i = 0; $i < $this->trendDays; $i++) {
            $labels[] = date('M j', strtotime($baseDate . ' +' . $i . ' day'));
        }

        return $labels;
    }

    /**
     * Get daily sales and orders for the last N days (for the chart).
     * Returns [ 'sales_data' => int[], 'orders_data' => int[], 'sales_labels' => string[] ] (labels as month-day e.g. Jun-15).
     */
    public function getSalesTrendData(): array
    {
        $vendorId = $this->getVendorId();
        $from = $this->offsetDate('-' . ($this->trendDays - 1));

        $salesData = array_fill(0, $this->trendDays, 0);
        $ordersData = array_fill(0, $this->trendDays, 0);
        $salesLabels = $this->buildSalesTrendLabels();
        $salesLabelsTooltip = $this->buildSalesTrendTooltipLabels();

        if (! $vendorId) {
            return [
                'sales_data' => $salesData,
                'orders_data' => $ordersData,
                'sales_labels' => $salesLabels,
                'sales_labels_tooltip' => $salesLabelsTooltip,
            ];
        }

        // One row per order (orders.total), then aggregate by date using orders table total
        $orders = Order::query()
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('order_details.vendor_id', $vendorId)
            ->where('orders.order_date', '>=', $from)
            ->groupBy('orders.id', 'orders.order_date', 'orders.total')
            ->select('orders.order_date', 'orders.total')
            ->get();

        $baseDate = date('Y-m-d', strtotime($from));
        $dateToIndex = [];
        for ($i = 0; $i < $this->trendDays; $i++) {
            $dateToIndex[date('Y-m-d', strtotime($baseDate . ' +' . $i . ' day'))] = $i;
        }

        foreach ($orders as $row) {
            $date = $row->order_date;
            if (isset($dateToIndex[$date])) {
                $idx = $dateToIndex[$date];
                $salesData[$idx] += (float) $row->total;
                $ordersData[$idx]++;
            }
        }

        $salesData = array_map(fn ($v) => (int) round($v), $salesData);

        return [
            'sales_data' => $salesData,
            'orders_data' => $ordersData,
            'sales_labels' => $salesLabels,
            'sales_labels_tooltip' => $salesLabelsTooltip,
        ];
    }

    /**
     * Build SVG path and chart data from sales_data (array of 30 numbers).
     * viewBox is 0 0 100 100; path uses percentages.
     */
    public function buildChartPaths(array $salesData): array
    {
        $count = count($salesData);
        if ($count === 0) {
            return [
                'path' => '',
                'area_path' => '',
                'peak_x' => 0,
                'peak_y' => 0,
                'day_width' => 0,
                'max_sales' => 0,
                'peak_index' => 0,
            ];
        }

        $max = max($salesData) ?: 1;
        $peakIdx = (int) array_search($max, $salesData);
        $pts = [];

        foreach ($salesData as $i => $v) {
            $x = ($i + 0.5) / $count * 100;
            $y = 100 - ($max ? ($v / $max) * 88 : 0) - 6;
            $pts[] = round($x, 2) . ',' . round($y, 2);
        }

        $path = 'M ' . implode(' L ', $pts);
        $areaPath = $path . ' L 100,100 L 0,100 Z';
        $peakX = ($peakIdx + 0.5) / $count * 100;
        $peakY = 100 - ($max ? ($max / $max) * 88 : 0) - 6;
        $dayWidth = 100 / $count;

        return [
            'path' => $path,
            'area_path' => $areaPath,
            'peak_x' => round($peakX, 2),
            'peak_y' => round($peakY, 2),
            'day_width' => $dayWidth,
            'max_sales' => $max,
            'peak_index' => $peakIdx,
        ];
    }

    /**
     * Default low-stock threshold (quantity at or below = low stock).
     */
    protected int $lowStockThreshold = 5;

    /**
     * Max number of items to show in performance widgets.
     */
    protected int $performanceLimit = 5;

    /**
     * Most sold products in the last 30 days (by quantity from order_details, orders filtered by order_date).
     * Returns [ ['name' => string, 'qty' => int, 'pct' => float], ... ].
     */
    public function getMostSoldProducts(): array
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return [];
        }

        $from = $this->offsetDate('-' . $this->trendDays);

        $rows = OrderDetail::query()
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_details.vendor_id', $vendorId)
            ->where('orders.order_date', '>=', $from)
            ->groupBy('products.name')
            ->select('products.parent_id as parent_id', 'order_details.product_name as name', 'products.code as code', DB::raw('sum(order_details.quantity) as qty'))
            ->orderByDesc('qty')
            ->limit($this->performanceLimit)
            ->get();

        if ($rows->isEmpty()) {
            return [];
        }

        $max = (int) $rows->max('qty');

        return $rows->map(function ($row) use ($max) {
            $qty = (int) $row->qty;
            $product = $row->parent_id ? Product::find($row->parent_id) : $row;

            return [
                'name' => $row->name ?? __('N/A'),
                'url' => route('product.edit', ['code' => $product->code]),
                'qty' => $qty,
                'pct' => $max > 0 ? min(100, (int) round(($qty / $max) * 100)) : 0,
            ];
        })->all();
    }

    /**
     * Low stock products: products with stock, ordered lowest to highest (no threshold).
     * When Inventory module is active: uses stock_managements (same as out-of-stock) — available = sum(quantity) by stockKeyword(); show available > 0, ordered by available ASC.
     * When Inventory is inactive: uses products.total_stocks > 0, order by total_stocks ASC.
     * Returns [ ['name' => string, 'qty' => int, 'pct' => float], ... ] (pct for bar: relative to max in list).
     */
    public function getLowStockProducts(): array
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return [];
        }

        if (isActive('Inventory') && function_exists('stockKeyword')) {
            $rows = \Modules\Inventory\Entities\StockManagement::query()
                ->select('product_id', DB::raw('sum(quantity) as available'))
                ->whereIn('type', stockKeyword())
                ->whereHas('location', fn ($q) => $q->where('vendor_id', $vendorId))
                ->whereHas('product', fn ($q) => $q->whereNull('deleted_at'))
                ->groupBy('product_id')
                ->havingRaw('sum(quantity) > 0')
                ->orderByRaw('sum(quantity) asc')
                ->limit($this->performanceLimit)
                ->get();

            if ($rows->isEmpty()) {
                return [];
            }

            $productIds = $rows->pluck('product_id')->all();
            $products = Product::query()->whereIn('id', $productIds)->get(['id', 'name', 'code', 'parent_id'])->keyBy('id');
            $max = (int) $rows->max('available');

            return $rows->map(function ($row) use ($products, $max) {
                $qty = (int) $row->available;
                $product = $products->get($row->product_id);
                $name = $product->name ?? __('N/A');
                $productForUrl = $product->parent_id ? Product::find($product->parent_id) : $product;
                $url = $productForUrl && $productForUrl->code ? route('vendor.product.edit', ['code' => $productForUrl->code]) : '#';

                return [
                    'name' => $name,
                    'url' => $url,
                    'qty' => $qty,
                    'pct' => $max > 0 ? min(100, (int) round(($qty / $max) * 100)) : 0,
                ];
            })->all();
        }

        $rows = Product::query()
            ->where('vendor_id', $vendorId)
            ->where('manage_stocks', 1)
            ->where('total_stocks', '>', 0)
            ->orderBy('total_stocks')
            ->limit($this->performanceLimit)
            ->get(['name', 'code', 'parent_id', 'total_stocks']);

        if ($rows->isEmpty()) {
            return [];
        }

        $max = (int) $rows->max('total_stocks');

        return $rows->map(function ($row) use ($max) {
            $qty = (int) $row->total_stocks;
            $productForUrl = $row->parent_id ? Product::find($row->parent_id) : $row;
            $url = $productForUrl && $productForUrl->code ? route('vendor.product.edit', ['code' => $productForUrl->code]) : '#';

            return [
                'name' => $row->name ?? __('N/A'),
                'url' => $url,
                'qty' => $qty,
                'pct' => $max > 0 ? min(100, (int) round(($qty / $max) * 100)) : 0,
            ];
        })->all();
    }

    /**
     * Out of stock products.
     * When Inventory module is active: uses stock_managements (same as VendorInventoryDataTable) —
     * products whose total available (sum of quantity by type in stockKeyword()) is <= 0.
     * When Inventory is inactive: uses products.total_stocks <= 0.
     * Returns [ ['name' => string], ... ].
     */
    public function getOutOfStockProducts(): array
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return [];
        }

        if (isActive('Inventory') && function_exists('stockKeyword')) {
            $productIds = \Modules\Inventory\Entities\StockManagement::query()
                ->select('product_id')
                ->whereIn('type', stockKeyword())
                ->whereHas('location', fn ($q) => $q->where('vendor_id', $vendorId))
                ->whereHas('product', fn ($q) => $q->whereNull('deleted_at'))
                ->groupBy('product_id')
                ->havingRaw('sum(quantity) <= 0')
                ->pluck('product_id');

            return Product::query()
                ->whereIn('id', $productIds)
                ->where('vendor_id', $vendorId)
                ->orderBy('name')
                ->limit($this->performanceLimit)
                ->get(['name', 'code', 'parent_id'])
                ->map(function ($row) {
                    $productForUrl = $row->parent_id ? Product::find($row->parent_id) : $row;
                    $url = $productForUrl && $productForUrl->code ? route('vendor.product.edit', ['code' => $productForUrl->code]) : '#';

                    return [
                        'name' => $row->name ?? __('N/A'),
                        'url' => $url,
                    ];
                })
                ->all();
        }

        return Product::query()
            ->where('vendor_id', $vendorId)
            ->where(function ($q) {
                $q->where('total_stocks', '<=', 0)
                    ->orWhere(function ($q2) {
                        $q2->where('manage_stocks', 1)->whereRaw('(total_stocks IS NULL OR total_stocks <= 0)');
                    });
            })
            ->orderBy('name')
            ->limit($this->performanceLimit)
            ->get(['name', 'code', 'parent_id'])
            ->map(function ($row) {
                $productForUrl = $row->parent_id ? Product::find($row->parent_id) : $row;
                $url = $productForUrl && $productForUrl->code ? route('vendor.product.edit', ['code' => $productForUrl->code]) : '#';

                return [
                    'name' => $row->name ?? __('N/A'),
                    'url' => $url,
                ];
            })
            ->all();
    }

    /**
     * Total count of out-of-stock products for the vendor (not limited).
     * When Inventory module is active: count from stock_managements (same logic as getOutOfStockProducts).
     * When inactive: count from products.total_stocks <= 0.
     */
    public function getOutOfStockCount(): int
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return 0;
        }

        if (isActive('Inventory') && function_exists('stockKeyword')) {
            return (int) \Modules\Inventory\Entities\StockManagement::query()
                ->select('product_id')
                ->whereIn('type', stockKeyword())
                ->whereHas('location', fn ($q) => $q->where('vendor_id', $vendorId))
                ->whereHas('product', fn ($q) => $q->whereNull('deleted_at'))
                ->groupBy('product_id')
                ->havingRaw('sum(quantity) <= 0')
                ->count();
        }

        return (int) Product::query()
            ->where('vendor_id', $vendorId)
            ->where(function ($q) {
                $q->where('total_stocks', '<=', 0)
                    ->orWhere(function ($q2) {
                        $q2->where('manage_stocks', 1)->whereRaw('(total_stocks IS NULL OR total_stocks <= 0)');
                    });
            })
            ->count();
    }

    /**
     * Performance data for the dashboard: most sold, low stock, out of stock.
     */
    public function getPerformanceData(): array
    {
        return [
            'most_sold' => $this->getMostSoldProducts(),
            'low_stock_products' => $this->getLowStockProducts(),
            'out_of_stock_products' => $this->getOutOfStockProducts(),
            'out_of_stock_count' => $this->getOutOfStockCount(),
        ];
    }

    /**
     * Get all primary analytics data for the SaaS dashboard (KPIs + sales trend chart).
     */
    public function getPrimaryAnalytics(): array
    {
        $orderStatus = $this->getOrderStatusCounts();
        $ratios = $this->getOrderRatios($orderStatus);
        $trend = $this->getSalesTrendData();
        $chart = $this->buildChartPaths($trend['sales_data']);

        return [
            'complete_ratio' => $ratios['complete_ratio'],
            'cancel_ratio' => $ratios['cancel_ratio'],
            'pending_ratio' => $ratios['pending_ratio'],
            'other_ratio' => $ratios['other_ratio'],
            'order_status' => $orderStatus,
            'sales_data' => $trend['sales_data'],
            'orders_data' => $trend['orders_data'],
            'sales_labels' => $trend['sales_labels'],
            'sales_labels_tooltip' => $trend['sales_labels_tooltip'] ?? [],
            'chart_path' => $chart['path'],
            'chart_area_path' => $chart['area_path'],
            'chart_peak_x' => $chart['peak_x'],
            'chart_peak_y' => $chart['peak_y'],
            'chart_day_width' => $chart['day_width'],
            'chart_max_sales' => $chart['max_sales'],
            'chart_peak_index' => $chart['peak_index'],
        ];
    }

    /**
     * Count products with low stock (0 < stock <= 10) for the vendor.
     * When Inventory active: sum(quantity) per product in stock_managements, having sum between 1 and 10.
     * When inactive: products.total_stocks between 1 and 10.
     */
    public function getLowStockCount(): int
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return 0;
        }

        if (isActive('Inventory') && function_exists('stockKeyword')) {
            return (int) \Modules\Inventory\Entities\StockManagement::query()
                ->select('product_id')
                ->whereIn('type', stockKeyword())
                ->whereHas('location', fn ($q) => $q->where('vendor_id', $vendorId))
                ->whereHas('product', fn ($q) => $q->whereNull('deleted_at'))
                ->groupBy('product_id')
                ->havingRaw('sum(quantity) >= 1 AND sum(quantity) <= 10')
                ->count();
        }

        return (int) Product::query()
            ->where('vendor_id', $vendorId)
            ->where('manage_stocks', 1)
            ->whereBetween('total_stocks', [1, 10])
            ->count();
    }

    /**
     * Inventory & purchase section: product counts and purchase amounts.
     * Purchase amounts come from the purchases table (Inventory module) when active; otherwise zero.
     * Low stock = products with stock between 1 and 10 (stock <= 10).
     */
    public function getInventoryPurchaseData(): array
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return [
                'low_stock_count' => 0,
                'this_month_products' => 0,
                'total_products' => 0,
                'this_month_purchase' => $this->formatSales(0),
                'total_purchase' => $this->formatSales(0),
            ];
        }

        $firstDayThisMonth = date('Y-m-01');
        $lastDayThisMonth = date('Y-m-t');

        $lowStockCount = $this->getLowStockCount();

        $thisMonthProducts = (int) Product::query()
            ->where('vendor_id', $vendorId)
            ->whereNull('parent_id')
            ->whereBetween(DB::raw('DATE(created_at)'), [$firstDayThisMonth, $lastDayThisMonth])
            ->count();

        $totalProducts = (int) Product::query()
            ->where('vendor_id', $vendorId)
            ->whereNull('parent_id')
            ->count();

        $thisMonthPurchase = 0.0;
        $totalPurchase = 0.0;

        if (isActive('Inventory') && class_exists(\Modules\Inventory\Entities\Purchase::class)) {
            $purchaseQuery = \Modules\Inventory\Entities\Purchase::query()
                ->where('vendor_id', $vendorId);

            $totalPurchase = (float) (clone $purchaseQuery)->sum('total_amount');

            $thisMonthPurchase = (float) (clone $purchaseQuery)
                ->where(function ($q) use ($firstDayThisMonth, $lastDayThisMonth) {
                    $q->whereBetween(DB::raw('COALESCE(purchase_date, DATE(created_at))'), [$firstDayThisMonth, $lastDayThisMonth]);
                })
                ->sum('total_amount');
        }

        return [
            'low_stock_count' => $lowStockCount,
            'this_month_products' => $thisMonthProducts,
            'total_products' => $totalProducts,
            'this_month_purchase' => $this->formatSales($thisMonthPurchase),
            'total_purchase' => $this->formatSales($totalPurchase),
        ];
    }

    /**
     * Recent orders for the vendor (order reference, customer name, status slug).
     * Limit 6, ordered by order_date desc.
     */
    public function getRecentOrders(int $limit = 5): array
    {
        $vendorId = $this->getVendorId();
        if (! $vendorId) {
            return [];
        }

        $orderIds = OrderDetail::query()
            ->where('vendor_id', $vendorId)
            ->distinct()
            ->pluck('order_id');

        if ($orderIds->isEmpty()) {
            return [];
        }

        $orders = Order::query()
            ->with(['user:id,name', 'customer:id,name', 'orderStatus:id,name,slug'])
            ->whereIn('id', $orderIds)
            ->orderByDesc('order_date')
            ->limit($limit)
            ->get(['id', 'reference', 'user_id', 'customer_id', 'order_status_id', 'order_date', 'total']);

        return $orders->map(function ($order) {
            $customerName = $order->user?->name ?? $order->customer?->name ?? $order->customer?->phone ?? __('Guest');
            $statusSlug = $order->orderStatus?->slug ?? 'pending';
            $orderDate = $order->order_date ? timeZoneFormatDate($order->order_date) : '—';
            $totalFormatted = formatNumber($order->total ?? 0);

            return [
                'id' => $order->id,
                'reference' => $order->reference ?? '#' . $order->id,
                'customer_name' => $customerName,
                'status_slug' => $statusSlug,
                'status_name' => $order->orderStatus?->name ?? ucfirst($statusSlug),
                'url' => route('vendorOrder.edit', ['id' => $order->id]),
                'order_date' => $orderDate,
                'total' => $totalFormatted,
            ];
        })->all();
    }

    /**
     * Subscription data for the vendor (SaaS plan).
     * Returns placeholder; override via getVendorSubscription() helper if provided by a subscription module.
     */
    public function getSubscriptionData(): array
    {
        $default = [
            'current_plan' => '—',
            'plan_price' => '—',
            'activation_date' => '—',
            'expiration_date' => '—',
            'subscription_status' => '—',
            'payment_status' => '—',
        ];

        if (isActive('Subscription')) {
            $subscription = subscription('getUserSubscription');
            if ($subscription) {
                return [
                    'current_plan' => $subscription->package?->name ?? $default['current_plan'],
                    'plan_price' => formatNumber($subscription['billing_price']) ?? $default['plan_price'],
                    'activation_date' => timeZoneFormatDate($subscription['activation_date']) ?? $default['activation_date'],
                    'expiration_date' => timeZoneFormatDate($subscription['next_billing_date']) ?? $default['expiration_date'],
                    'subscription_status' => $subscription['status'] ?? $default['subscription_status'],
                    'payment_status' => $subscription['payment_status'] ?? $default['payment_status'],
                ];
            }
        }

        return $default;
    }
}
