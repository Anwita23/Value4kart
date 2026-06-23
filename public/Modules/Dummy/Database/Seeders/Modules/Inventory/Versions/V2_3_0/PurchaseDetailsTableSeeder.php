<?php

namespace Modules\Dummy\Database\Seeders\Modules\Inventory\Versions\V2_3_0;

use Illuminate\Database\Seeder;

class PurchaseDetailsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('purchase_details')->delete();

        \DB::table('purchase_details')->insert([
            0 => [
                'id' => 1,
                'purchase_id' => 1,
                'product_id' => 1199,
                'product_name' => 'Waist straight Slouchy jeans',
                'quantity' => '130.00000000',
                'amount' => '55.00000000',
                'sku' => 'J1234',
                'tax_charge' => '2.00000000',
                'quantity_receive' => '130.00000000',
                'quantity_reject' => '0.00000000',
            ],
            1 => [
                'id' => 2,
                'purchase_id' => 1,
                'product_id' => 1198,
                'product_name' => 'Slouchy pleated shorts',
                'quantity' => '124.00000000',
                'amount' => '54.00000000',
                'sku' => 'S3423',
                'tax_charge' => '2.00000000',
                'quantity_receive' => '121.00000000',
                'quantity_reject' => '3.00000000',
            ],
            2 => [
                'id' => 3,
                'purchase_id' => 1,
                'product_id' => 1197,
                'product_name' => 'Paperbag denim shorts',
                'quantity' => '128.00000000',
                'amount' => '50.00000000',
                'sku' => 'D1236',
                'tax_charge' => '2.00000000',
                'quantity_receive' => '120.00000000',
                'quantity_reject' => '0.00000000',
            ],
            3 => [
                'id' => 4,
                'purchase_id' => 2,
                'product_id' => 1236,
                'product_name' => 'Anti-Drop AirPods1 2 Silicone Bluetooth Compatible Earphone Cover Air Pods, Blue',
                'quantity' => '22.00000000',
                'amount' => '22.00000000',
                'sku' => null,
                'tax_charge' => '2.00000000',
                'quantity_receive' => '22.00000000',
                'quantity_reject' => '0.00000000',
            ],
            4 => [
                'id' => 5,
                'purchase_id' => 2,
                'product_id' => 1242,
                'product_name' => 'Smartwatch Men Support 118 Sports Women Smart Watch, Blue',
                'quantity' => '21.00000000',
                'amount' => '21.00000000',
                'sku' => null,
                'tax_charge' => '3.00000000',
                'quantity_receive' => '20.00000000',
                'quantity_reject' => '1.00000000',
            ],
            5 => [
                'id' => 6,
                'purchase_id' => 2,
                'product_id' => 1169,
                'product_name' => 'Snap Button Bracelet Bangle Elastic Metal Beaded Snap Bracelet Fit',
                'quantity' => '33.00000000',
                'amount' => '2.00000000',
                'sku' => null,
                'tax_charge' => '1.00000000',
                'quantity_receive' => '33.00000000',
                'quantity_reject' => '0.00000000',
            ],
        ]);

    }
}
