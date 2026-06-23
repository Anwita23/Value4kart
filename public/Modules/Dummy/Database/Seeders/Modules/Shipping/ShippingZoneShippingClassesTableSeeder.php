<?php

namespace Modules\Dummy\Database\Seeders\Modules\Shipping;

use Illuminate\Database\Seeder;

class ShippingZoneShippingClassesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('shipping_zone_shipping_classes')->delete();

        \DB::table('shipping_zone_shipping_classes')->insert([
            0 => [
                'id' => 172,
                'shipping_zone_id' => 1,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            1 => [
                'id' => 173,
                'shipping_zone_id' => 1,
                'shipping_class_slug' => 'heavy',
                'cost' => '2.00000000',
                'cost_type' => 'cost_per_order',
            ],
            2 => [
                'id' => 174,
                'shipping_zone_id' => 1,
                'shipping_class_slug' => 'light',
                'cost' => '1.00000000',
                'cost_type' => 'cost_per_order',
            ],
            3 => [
                'id' => 175,
                'shipping_zone_id' => 2,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            4 => [
                'id' => 176,
                'shipping_zone_id' => 2,
                'shipping_class_slug' => 'heavy',
                'cost' => '4.00000000',
                'cost_type' => 'cost_per_order',
            ],
            5 => [
                'id' => 177,
                'shipping_zone_id' => 2,
                'shipping_class_slug' => 'light',
                'cost' => '1.00000000',
                'cost_type' => 'cost_per_order',
            ],
            6 => [
                'id' => 178,
                'shipping_zone_id' => 3,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            7 => [
                'id' => 179,
                'shipping_zone_id' => 3,
                'shipping_class_slug' => 'heavy',
                'cost' => '2.00000000',
                'cost_type' => 'cost_per_order',
            ],
            8 => [
                'id' => 180,
                'shipping_zone_id' => 3,
                'shipping_class_slug' => 'light',
                'cost' => '1.00000000',
                'cost_type' => 'cost_per_order',
            ],
            9 => [
                'id' => 181,
                'shipping_zone_id' => 4,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            10 => [
                'id' => 182,
                'shipping_zone_id' => 4,
                'shipping_class_slug' => 'heavy',
                'cost' => '3.00000000',
                'cost_type' => 'cost_per_order',
            ],
            11 => [
                'id' => 183,
                'shipping_zone_id' => 4,
                'shipping_class_slug' => 'light',
                'cost' => '2.00000000',
                'cost_type' => 'cost_per_order',
            ],
            12 => [
                'id' => 184,
                'shipping_zone_id' => 5,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            13 => [
                'id' => 185,
                'shipping_zone_id' => 5,
                'shipping_class_slug' => 'heavy',
                'cost' => '3.00000000',
                'cost_type' => 'cost_per_order',
            ],
            14 => [
                'id' => 186,
                'shipping_zone_id' => 5,
                'shipping_class_slug' => 'light',
                'cost' => '1.00000000',
                'cost_type' => 'cost_per_order',
            ],
            15 => [
                'id' => 187,
                'shipping_zone_id' => 6,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            16 => [
                'id' => 188,
                'shipping_zone_id' => 6,
                'shipping_class_slug' => 'heavy',
                'cost' => '4.00000000',
                'cost_type' => 'cost_per_order',
            ],
            17 => [
                'id' => 189,
                'shipping_zone_id' => 6,
                'shipping_class_slug' => 'light',
                'cost' => '2.00000000',
                'cost_type' => 'cost_per_order',
            ],
            18 => [
                'id' => 190,
                'shipping_zone_id' => 7,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            19 => [
                'id' => 191,
                'shipping_zone_id' => 7,
                'shipping_class_slug' => 'heavy',
                'cost' => '2.00000000',
                'cost_type' => 'cost_per_order',
            ],
            20 => [
                'id' => 192,
                'shipping_zone_id' => 7,
                'shipping_class_slug' => 'light',
                'cost' => '1.00000000',
                'cost_type' => 'cost_per_order',
            ],
            21 => [
                'id' => 193,
                'shipping_zone_id' => 8,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            22 => [
                'id' => 194,
                'shipping_zone_id' => 8,
                'shipping_class_slug' => 'heavy',
                'cost' => '3.00000000',
                'cost_type' => 'cost_per_order',
            ],
            23 => [
                'id' => 195,
                'shipping_zone_id' => 8,
                'shipping_class_slug' => 'light',
                'cost' => '1.00000000',
                'cost_type' => 'cost_per_order',
            ],
            24 => [
                'id' => 196,
                'shipping_zone_id' => 9,
                'shipping_class_slug' => 'no-class',
                'cost' => '0.00000000',
                'cost_type' => 'cost_per_order',
            ],
            25 => [
                'id' => 197,
                'shipping_zone_id' => 9,
                'shipping_class_slug' => 'heavy',
                'cost' => '20.00000000',
                'cost_type' => 'cost_per_order',
            ],
            26 => [
                'id' => 198,
                'shipping_zone_id' => 9,
                'shipping_class_slug' => 'light',
                'cost' => '5.00000000',
                'cost_type' => 'cost_per_order',
            ],
        ]);

    }
}
