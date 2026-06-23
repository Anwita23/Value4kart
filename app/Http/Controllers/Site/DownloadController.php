<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    /**
     * view downloadable orders
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = auth()->user()->orders()
            ->whereHas('metadata', function ($query) {
                $query->where('key', 'download_data');
            })
            ->whereHas('orderStatus', function ($query) {
                $query->where('payment_scenario', 'paid');
            })
            ->get();

        $downloadItems = collect();
        foreach ($orders as $order) {
            $downloadData = $order->download_data;
            if (is_array($downloadData) && ! empty($downloadData)) {
                foreach ($downloadData as $data) {
                    if (isset($data['is_accessible']) && $data['is_accessible'] == 1 && $order->checkValidFile($data)) {
                        $downloadItems->push(['order' => $order, 'data' => $data]);
                    }
                }
            }
        }

        $isFound = $downloadItems->isNotEmpty();

        return view('site.myaccount.download', compact('downloadItems', 'isFound'));
    }
}
