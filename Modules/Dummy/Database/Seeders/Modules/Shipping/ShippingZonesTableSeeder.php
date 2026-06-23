<?php

namespace Modules\Dummy\Database\Seeders\Modules\Shipping;

use Illuminate\Database\Seeder;

class ShippingZonesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('shipping_zones')->delete();

        \DB::table('shipping_zones')->insert([
            0 => [
                'id' => 4,
                'name' => 'Bangladesh - Barishal',
            ],
            1 => [
                'id' => 6,
                'name' => 'Bangladesh - Chittagong',
            ],
            2 => [
                'id' => 1,
                'name' => 'Bangladesh - Dhaka',
            ],
            3 => [
                'id' => 2,
                'name' => 'Bangladesh - Khulna',
            ],
            4 => [
                'id' => 3,
                'name' => 'Bangladesh - Mymensingh',
            ],
            5 => [
                'id' => 8,
                'name' => 'Bangladesh - Rajshahi',
            ],
            6 => [
                'id' => 5,
                'name' => 'Bangladesh - Rangpur',
            ],
            7 => [
                'id' => 7,
                'name' => 'Bangladesh - Sylhet',
            ],
            8 => [
                'id' => 9,
                'name' => 'Global',
            ],
        ]);

    }
}
