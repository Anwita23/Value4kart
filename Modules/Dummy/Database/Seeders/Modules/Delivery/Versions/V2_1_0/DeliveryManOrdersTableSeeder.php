<?php

namespace Modules\Dummy\Database\Seeders\Modules\Delivery\Versions\V2_1_0;

use App\Models\Currency;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Modules\Delivery\Entities\DeliveryMan;
use Modules\Delivery\Entities\DeliveryManOrder;

class DeliveryManOrdersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['completed', 'pickup', 'delivered', 'assigned', 'processing'];

        $orderStatuses = OrderStatus::whereIn('slug', $statuses)->pluck('id', 'slug')->toArray();

        $orderIds = Order::where('order_status_id', $orderStatuses['processing'])->pluck('id');

        $deliverMan =  DeliveryMan::first();

        $user = User::where('email', 'delivery@techvill.net')->first();

        foreach ($orderIds as $key => $orderId) {
            DeliveryManOrder::insert([
                'delivery_man_id' => $deliverMan->id,
                'order_id' => $orderId,
            ]);

            Order::where('id', $orderId)->update([
                'order_status_id' => $orderStatuses[$statuses[$key]] ?? null,
            ]);

            if ($orderIds->first() == $orderId) {
                $order = Order::find($orderId);

                Transaction::insert([
                    'user_id'           => $order->user_id,
                    'currency_id'       => $order->currency_id,
                    'vendor_id'         => $order->orderDetails[0]?->vendor_id,
                    'order_id'          => $orderId,
                    'amount'            => '5',
                    'total_amount'      => '5',
                    'transaction_type'  => 'delivery_commission',
                    'transaction_date'  =>  now(),
                    'reference_number'  =>  $user->id,
                    'reference_type'    => 'delivery_man_user_id',
                    'status'            => 'Accepted',
                ]);

            }
        }

        if ($user) {
            Wallet::updateOrCreate(
                [
                    'user_id'     => $user->id,
                    'currency_id' => Currency::getDefault()->id,
                ],
                [
                    'balance'     => '5.00000000',
                    'is_default'  => 1,
                ]
            );
        }
    }
}
