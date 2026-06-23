<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('purchases')->delete();

        \DB::table('purchases')->insert([
            0 => [
                'id' => 1,
                'reference' => 'PU0001',
                'location_id' => 3,
                'supplier_id' => 2,
                'currency_id' => 3,
                'vendor_id' => 19,
                'exchange_rate' => null,
                'shipping_charge' => '60.00000000',
                'payment_type' => 'Cash On Delivery',
                'tax_charge' => '404.92000000',
                'shipping_carrier' => 'DHL express',
                'tracking_number' => '4HeR',
                'note' => null,
                'arrival_date' => randomDateBefore(90),
                'adjustment' => '{"name":["Custom Duty"],"amount":["20"]}',
                'total_quantity' => '382.00000000',
                'total_amount' => '20730.92000000',
                'paid_amount' => null,
                'status' => 'Partial',
            ],
            1 => [
                'id' => 2,
                'reference' => 'PU0002',
                'location_id' => 1,
                'supplier_id' => 1,
                'currency_id' => 3,
                'vendor_id' => 1,
                'exchange_rate' => null,
                'shipping_charge' => '15.00000000',
                'payment_type' => 'Cash On Delivery',
                'tax_charge' => '23.57000000',
                'shipping_carrier' => null,
                'tracking_number' => 'Rt12',
                'note' => null,
                'arrival_date' => randomDateBefore(90),
                'adjustment' => null,
                'total_quantity' => '76.00000000',
                'total_amount' => '1029.57000000',
                'paid_amount' => null,
                'status' => 'Received',
            ],
        ]);

    }
}
