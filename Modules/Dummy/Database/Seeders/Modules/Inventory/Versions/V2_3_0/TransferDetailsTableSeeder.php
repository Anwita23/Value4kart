<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Seeder;

class TransferDetailsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('transfer_details')->delete();

        \DB::table('transfer_details')->insert([
            0 => [
                'id' => 1,
                'transfer_id' => 1,
                'product_id' => 1255,
                'quantity' => '2.00000000',
                'quantity_receive' => '2.00000000',
                'quantity_reject' => '0.00000000',
            ],
            1 => [
                'id' => 2,
                'transfer_id' => 1,
                'product_id' => 1238,
                'quantity' => '3.00000000',
                'quantity_receive' => '3.00000000',
                'quantity_reject' => '0.00000000',
            ],
            2 => [
                'id' => 3,
                'transfer_id' => 2,
                'product_id' => 1236,
                'quantity' => '3.00000000',
                'quantity_receive' => '0.00000000',
                'quantity_reject' => '0.00000000',
            ],
            3 => [
                'id' => 4,
                'transfer_id' => 2,
                'product_id' => 1238,
                'quantity' => '2.00000000',
                'quantity_receive' => '0.00000000',
                'quantity_reject' => '0.00000000',
            ],
        ]);

    }
}
