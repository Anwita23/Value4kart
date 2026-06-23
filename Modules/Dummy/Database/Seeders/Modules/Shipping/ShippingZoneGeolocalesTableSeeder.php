<?php

namespace Modules\Dummy\Database\Seeders\Modules\Shipping;

use Illuminate\Database\Seeder;

class ShippingZoneGeolocalesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('shipping_zone_geolocales')->delete();

        \DB::table('shipping_zone_geolocales')->insert([
            0 => [
                'id' => 58,
                'shipping_zone_id' => 1,
                'country' => 'BD',
                'state' => '81',
                'city' => '',
                'zip' => '',
            ],
            1 => [
                'id' => 59,
                'shipping_zone_id' => 2,
                'country' => 'BD',
                'state' => '82',
                'city' => '',
                'zip' => '',
            ],
            2 => [
                'id' => 60,
                'shipping_zone_id' => 3,
                'country' => 'BD',
                'state' => 'H',
                'city' => '',
                'zip' => '',
            ],
            3 => [
                'id' => 61,
                'shipping_zone_id' => 4,
                'country' => 'BD',
                'state' => '85',
                'city' => '',
                'zip' => '',
            ],
            4 => [
                'id' => 62,
                'shipping_zone_id' => 5,
                'country' => 'BD',
                'state' => '87',
                'city' => '',
                'zip' => '',
            ],
            5 => [
                'id' => 63,
                'shipping_zone_id' => 6,
                'country' => 'BD',
                'state' => '84',
                'city' => '',
                'zip' => '',
            ],
            6 => [
                'id' => 64,
                'shipping_zone_id' => 7,
                'country' => 'BD',
                'state' => '86',
                'city' => '',
                'zip' => '',
            ],
            7 => [
                'id' => 65,
                'shipping_zone_id' => 8,
                'country' => 'BD',
                'state' => '83',
                'city' => '',
                'zip' => '',
            ],
            8 => [
                'id' => 66,
                'shipping_zone_id' => 9,
                'country' => '',
                'state' => '',
                'city' => '',
                'zip' => '',
            ],
        ]);

    }
}
