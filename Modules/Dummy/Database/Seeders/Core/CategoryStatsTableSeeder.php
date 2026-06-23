<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class CategoryStatsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('category_stats')->delete();

        \DB::table('category_stats')->insert([
            0 => [
                'id' => 1,
                'category_id' => 504,
                'count_views' => 0,
                'count_sales' => 7,
                'date' => randomDateBefore(5),
            ],
            1 => [
                'id' => 4,
                'category_id' => 518,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            2 => [
                'id' => 5,
                'category_id' => 38,
                'count_views' => 0,
                'count_sales' => 3,
                'date' => randomDateBefore(5),
            ],
            3 => [
                'id' => 6,
                'category_id' => 511,
                'count_views' => 0,
                'count_sales' => 5,
                'date' => randomDateBefore(5),
            ],
            4 => [
                'id' => 7,
                'category_id' => 510,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            5 => [
                'id' => 9,
                'category_id' => 39,
                'count_views' => 0,
                'count_sales' => 6,
                'date' => randomDateBefore(5),
            ],
            6 => [
                'id' => 11,
                'category_id' => 512,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            7 => [
                'id' => 13,
                'category_id' => 526,
                'count_views' => 0,
                'count_sales' => 2,
                'date' => randomDateBefore(5),
            ],
            8 => [
                'id' => 15,
                'category_id' => 95,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            9 => [
                'id' => 17,
                'category_id' => 521,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            10 => [
                'id' => 30,
                'category_id' => 56,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            11 => [
                'id' => 31,
                'category_id' => 58,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
            12 => [
                'id' => 32,
                'category_id' => 63,
                'count_views' => 0,
                'count_sales' => 1,
                'date' => randomDateBefore(5),
            ],
        ]);

    }
}
