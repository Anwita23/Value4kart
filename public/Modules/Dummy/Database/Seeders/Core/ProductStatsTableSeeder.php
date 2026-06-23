<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class ProductStatsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('product_stats')->delete();

        \DB::table('product_stats')->insert([
            0 => [
                'id' => 1,
                'product_id' => 1205,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            1 => [
                'id' => 2,
                'product_id' => 1203,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            2 => [
                'id' => 3,
                'product_id' => 1204,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            3 => [
                'id' => 4,
                'product_id' => 1199,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            4 => [
                'id' => 5,
                'product_id' => 1178,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            5 => [
                'id' => 6,
                'product_id' => 1144,
                'count_views' => 0,
                'count_sales' => 3,
                'date' => randomDateBefore(5),
            ],
            6 => [
                'id' => 7,
                'product_id' => 1156,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            7 => [
                'id' => 8,
                'product_id' => 1201,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            8 => [
                'id' => 9,
                'product_id' => 1183,
                'count_views' => 0,
                'count_sales' => 3,
                'date' => randomDateBefore(5),
            ],
            9 => [
                'id' => 10,
                'product_id' => 1200,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            10 => [
                'id' => 11,
                'product_id' => 1151,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            11 => [
                'id' => 12,
                'product_id' => 1180,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            12 => [
                'id' => 13,
                'product_id' => 1137,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            13 => [
                'id' => 14,
                'product_id' => 1141,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            14 => [
                'id' => 15,
                'product_id' => 1155,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            15 => [
                'id' => 17,
                'product_id' => 1162,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            16 => [
                'id' => 19,
                'product_id' => 1176,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            17 => [
                'id' => 20,
                'product_id' => 1202,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            18 => [
                'id' => 22,
                'product_id' => 1177,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            19 => [
                'id' => 23,
                'product_id' => 1157,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            20 => [
                'id' => 25,
                'product_id' => 1143,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            21 => [
                'id' => 30,
                'product_id' => 1185,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            22 => [
                'id' => 31,
                'product_id' => 1186,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            23 => [
                'id' => 32,
                'product_id' => 1182,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
        ]);

    }
}
