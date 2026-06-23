<?php

/**
 * @author TechVillage <support@techvill.org>
 *
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 *
 * @created 25-01-2024
 */

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DatabaseNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use App\Filters\NotificationDateFilter;
use App\Filters\NotificationTypeFilter;

class NotificationController extends Controller
{
    /**
     * Notification List
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $notificationsQuery = DatabaseNotification::query()
            ->where('notifiable_type', User::class)
            ->where('notifiable_id', auth()->id())
            ->orderBy('read_at')
            ->orderByDesc('created_at');

        $notifications = app(Pipeline::class)
            ->send($notificationsQuery)
            ->through([
                NotificationDateFilter::class,
                NotificationTypeFilter::class,
            ])
            ->thenReturn()
            ->paginate(preference('row_per_page'));

        $filterDay = [
            'all_time' => __('All Time'),
            'today' => __('Today'),
            'last_week' => __('Last 7 Days'),
            'last_month' => __('Last 30 Days'),
            'last_year' => __('Last 12 Months'),
        ];

        $filterType = [
            'all_notification' => __('All Notification'),
            'read' => __('Read'),
            'unread' => __('Unread'),
        ];

        return view('site.myaccount.notification', compact('notifications', 'filterDay', 'filterType'));
    }

    /**
     * Delete Notification
     *
     * @param  string  $id
     */
    public function destroy($id)
    {
        $notification = DatabaseNotification::where('id', $id)
            ->where('notifiable_type', User::class)
            ->where('notifiable_id', auth()->id());

        if ($notification->exists()) {
            $notification->delete();

            return back()->withSuccess(__('The :x has been successfully deleted.', ['x' => __('Notification')]));
        }

        return back()->withErrors(__('Failed to delete :x', ['x' => __('Notification')]));
    }

    /**
     * Mark a specific notification as read.
     *
     * @param  int  $id  The ID of the notification.
     * @return int The number of affected rows (0 or 1).
     */
    public function markAsRead($id)
    {
        return DatabaseNotification::where('id', $id)->update(['read_at' => now()]);
    }

    /**
     * Mark a specific notification as unread.
     *
     * @param  int  $id  The ID of the notification.
     * @return int The number of affected rows (0 or 1).
     */
    public function markAsUnread($id)
    {
        return DatabaseNotification::where('id', $id)->update(['read_at' => null]);
    }

    /**
     * View Notification
     */
    public function view($id)
    {
        $notification = DatabaseNotification::where('id', $id)
            ->where('notifiable_type', User::class)
            ->where('notifiable_id', auth()->id())->first();

        if (! $notification) {
            return back();
        }

        DatabaseNotification::where('id', $id)->update(['read_at' => now()]);

        if (! isset(request()->url)) {
            return back();
        }

        return redirect()->intended(request()->url);
    }
}
