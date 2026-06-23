<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Seeder;

class TransfersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('transfers')->delete();

        \DB::table('transfers')->insert([
            0 => [
                'id' => 1,
                'reference' => 'TR0001',
                'vendor_id' => 1,
                'from_location_id' => 1,
                'to_location_id' => 5,
                'quantity' => '5.00000000',
                'shipping_carrier' => 'DHL ecommerce',
                'tracking_number' => null,
                'arrival_date' => randomDateBefore(90),
                'note' => null,
                'status' => 'Received',
            ],
            1 => [
                'id' => 2,
                'reference' => 'TR0002',
                'vendor_id' => 1,
                'from_location_id' => 1,
                'to_location_id' => 5,
                'quantity' => '5.00000000',
                'shipping_carrier' => null,
                'tracking_number' => null,
                'arrival_date' => randomDateBefore(90),
                'note' => null,
                'status' => 'Pending',
            ],
        ]);

    }
}
