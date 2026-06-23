<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Review
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $filterDayDates = [
            'today' => today(),
            'last_week' => now()->subWeek(),
            'last_month' => now()->subMonth(),
            'last_year' => now()->subYear(),
        ];

        $review = auth()->user()->review()->has('product');

        if ($request->filled('filter_day') && array_key_exists($request->filter_day, $filterDayDates)) {
            $review->whereDate('created_at', '>=', $filterDayDates[$request->filter_day]);
        }

        if ($request->filled('filter_status')) {
            $status = $request->filter_status == 'approve' ? 'Active' : 'Inactive';
            $review->where('status', $status);
        }

        $reviews = $review->paginate(preference('row_per_page'));

        $filterDay = [
            'all_time' => __('All Time'),
            'today' => __('Today'),
            'last_week' => __('Last 7 Days'),
            'last_month' => __('Last 30 Days'),
            'last_year' => __('Last 12 Months'),
        ];

        $filterStatus = [
            '' => __('All Status'),
            'approve' => __('Active'),
            'unapprove' => __('Inactive'),
        ];

        return view('site.myaccount.review', compact('reviews', 'filterDay', 'filterStatus'));
    }

    /**
     * Delete
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $response = $this->messageArray(__('Invalid Request'), 'fail');
        $result = $this->checkExistence($id, 'reviews');
        if ($result['status'] === true) {
            $response = (new Review())->remove($id);
        } else {
            $response['message'] = $result['message'];
        }
        $this->setSessionValue($response);

        return redirect()->back();
    }
}
