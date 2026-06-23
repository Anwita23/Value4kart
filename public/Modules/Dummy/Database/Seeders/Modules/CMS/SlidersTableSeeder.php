<?php

namespace Modules\Dummy\Database\Seeders\Modules\CMS;

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('sliders')->delete();

        \DB::table('sliders')->insert([
            0 => [
                'id' => 1,
                'name' => 'Home Page',
                'slug' => 'home-page',
                'status' => 'Active',
            ],
            1 => [
                'id' => 2,
                'name' => 'Grocery',
                'slug' => 'grocery',
                'status' => 'Active',
            ],
            2 => [
                'id' => 3,
                'name' => 'Fashion',
                'slug' => 'fashion',
                'status' => 'Active',
            ],
            3 => [
                'id' => 4,
                'name' => 'Fashion - Accessories',
                'slug' => 'fashion-accessories',
                'status' => 'Active',
            ],
            4 => [
                'id' => 5,
                'name' => 'Mixed Primary',
                'slug' => 'mixed',
                'status' => 'Active',
            ],
            5 => [
                'id' => 6,
                'name' => 'Mixed Secondary',
                'slug' => 'mixed-secondary',
                'status' => 'Active',
            ],
            6 => [
                'id' => 7,
                'name' => 'Fashion V2 Primary',
                'slug' => 'fashion-v2-primary',
                'status' => 'Active',
            ],
            7 => [
                'id' => 8,
                'name' => 'Fashion V2 Secondary',
                'slug' => 'fashion-v2-secondary',
                'status' => 'Active',
            ],
            8 => [
                'id' => 9,
                'name' => 'Fashion V3.1',
                'slug' => 'fashion-v31',
                'status' => 'Active',
            ],
            9 => [
                'id' => 10,
                'name' => 'Fashion V3.2',
                'slug' => 'fashion-v32',
                'status' => 'Active',
            ],
            10 => [
                'id' => 11,
                'name' => 'Fashion V3.3',
                'slug' => 'fashion-v33',
                'status' => 'Active',
            ],
            11 => [
                'id' => 12,
                'name' => 'Fashion V3.4',
                'slug' => 'fashion-v34',
                'status' => 'Active',
            ],
            12 => [
                'id' => 13,
                'name' => 'Fashion V3.5',
                'slug' => 'fashion-v35',
                'status' => 'Active',
            ],
            13 => [
                'id' => 14,
                'name' => 'Furniture V1.1',
                'slug' => 'furniture-v11',
                'status' => 'Active',
            ],
            14 => [
                'id' => 15,
                'name' => 'Furniture V1.2',
                'slug' => 'furniture-v12',
                'status' => 'Active',
            ],
            15 => [
                'id' => 16,
                'name' => 'Furniture V1.3',
                'slug' => 'furniture-v13',
                'status' => 'Active',
            ],
            16 => [
                'id' => 17,
                'name' => 'Fashion V4.1',
                'slug' => 'fashion-v41',
                'status' => 'Active',
            ],
            17 => [
                'id' => 18,
                'name' => 'Digital V1.1',
                'slug' => 'digital-v11',
                'status' => 'Active',
            ],
            18 => [
                'id' => 19,
                'name' => 'Digital V1.2',
                'slug' => 'digital-v12',
                'status' => 'Active',
            ],

        ]);
    }
}
