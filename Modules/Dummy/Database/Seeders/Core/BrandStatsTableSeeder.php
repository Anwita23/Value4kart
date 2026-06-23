<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class BrandStatsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('brand_stats')->delete();

        \DB::table('brand_stats')->insert([
            0 => [
                'id' => 1,
                'brand_id' => 29,
                'count_views' => 0,
                'count_sales' => 4,
                'date' => randomDateBefore(5),
            ],
            1 => [
                'id' => 2,
                'brand_id' => 50,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            2 => [
                'id' => 3,
                'brand_id' => 4,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            3 => [
                'id' => 4,
                'brand_id' => 18,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            4 => [
                'id' => 5,
                'brand_id' => 35,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            5 => [
                'id' => 6,
                'brand_id' => 16,
                'count_views' => 0,
                'count_sales' => 4,
                'date' => randomDateBefore(5),
            ],
            6 => [
                'id' => 7,
                'brand_id' => 14,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            7 => [
                'id' => 9,
                'brand_id' => 2,
                'count_views' => 0,
                'count_sales' => 4,
                'date' => randomDateBefore(5),
            ],
            8 => [
                'id' => 11,
                'brand_id' => 21,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            9 => [
                'id' => 12,
                'brand_id' => 8,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            10 => [
                'id' => 16,
                'brand_id' => 23,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            11 => [
                'id' => 18,
                'brand_id' => 5,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            12 => [
                'id' => 19,
                'brand_id' => 22,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            13 => [
                'id' => 24,
                'brand_id' => 31,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            14 => [
                'id' => 28,
                'brand_id' => 46,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            15 => [
                'id' => 29,
                'brand_id' => 38,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            16 => [
                'id' => 30,
                'brand_id' => 3,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
        ]);

    }
}
