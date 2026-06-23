<?php

namespace Modules\Dummy\Database\Seeders\Modules\CMS;

use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('components')->delete();

        \DB::table('components')->insert([
            0 => [
                'id' => 2,
                'page_id' => 5,
                'layout_id' => 5,
                'level' => 2,
            ],
            1 => [
                'id' => 3,
                'page_id' => 5,
                'layout_id' => 2,
                'level' => 3,
            ],
            2 => [
                'id' => 4,
                'page_id' => 5,
                'layout_id' => 2,
                'level' => 6,
            ],
            3 => [
                'id' => 6,
                'page_id' => 5,
                'layout_id' => 1,
                'level' => 7,
            ],
            4 => [
                'id' => 15,
                'page_id' => 5,
                'layout_id' => 4,
                'level' => 8,
            ],
            5 => [
                'id' => 16,
                'page_id' => 5,
                'layout_id' => 3,
                'level' => 9,
            ],
            6 => [
                'id' => 17,
                'page_id' => 5,
                'layout_id' => 2,
                'level' => 10,
            ],
            7 => [
                'id' => 18,
                'page_id' => 5,
                'layout_id' => 6,
                'level' => 13,
            ],
            8 => [
                'id' => 19,
                'page_id' => 5,
                'layout_id' => 8,
                'level' => 1,
            ],
            9 => [
                'id' => 20,
                'page_id' => 7,
                'layout_id' => 10,
                'level' => 1,
            ],
            10 => [
                'id' => 21,
                'page_id' => 8,
                'layout_id' => 10,
                'level' => 1,
            ],
            11 => [
                'id' => 22,
                'page_id' => 7,
                'layout_id' => 4,
                'level' => 2,
            ],
            12 => [
                'id' => 23,
                'page_id' => 7,
                'layout_id' => 5,
                'level' => 3,
            ],
            13 => [
                'id' => 25,
                'page_id' => 7,
                'layout_id' => 2,
                'level' => 5,
            ],
            14 => [
                'id' => 26,
                'page_id' => 7,
                'layout_id' => 4,
                'level' => 4,
            ],
            15 => [
                'id' => 27,
                'page_id' => 7,
                'layout_id' => 2,
                'level' => 6,
            ],
            16 => [
                'id' => 28,
                'page_id' => 7,
                'layout_id' => 10,
                'level' => 7,
            ],
            17 => [
                'id' => 29,
                'page_id' => 7,
                'layout_id' => 2,
                'level' => 8,
            ],
            18 => [
                'id' => 30,
                'page_id' => 7,
                'layout_id' => 7,
                'level' => 9,
            ],
            19 => [
                'id' => 31,
                'page_id' => 6,
                'layout_id' => 10,
                'level' => 1,
            ],
            20 => [
                'id' => 32,
                'page_id' => 6,
                'layout_id' => 4,
                'level' => 2,
            ],
            21 => [
                'id' => 33,
                'page_id' => 6,
                'layout_id' => 8,
                'level' => 3,
            ],
            22 => [
                'id' => 34,
                'page_id' => 6,
                'layout_id' => 5,
                'level' => 4,
            ],
            23 => [
                'id' => 35,
                'page_id' => 6,
                'layout_id' => 2,
                'level' => 5,
            ],
            24 => [
                'id' => 36,
                'page_id' => 6,
                'layout_id' => 1,
                'level' => 6,
            ],
            25 => [
                'id' => 38,
                'page_id' => 6,
                'layout_id' => 4,
                'level' => 7,
            ],
            26 => [
                'id' => 39,
                'page_id' => 6,
                'layout_id' => 2,
                'level' => 8,
            ],
            27 => [
                'id' => 40,
                'page_id' => 6,
                'layout_id' => 4,
                'level' => 9,
            ],
            28 => [
                'id' => 41,
                'page_id' => 6,
                'layout_id' => 6,
                'level' => 10,
            ],
            29 => [
                'id' => 42,
                'page_id' => 6,
                'layout_id' => 7,
                'level' => 11,
            ],
            30 => [
                'id' => 43,
                'page_id' => 6,
                'layout_id' => 9,
                'level' => 12,
            ],
            31 => [
                'id' => 44,
                'page_id' => 8,
                'layout_id' => 5,
                'level' => 2,
            ],
            32 => [
                'id' => 45,
                'page_id' => 8,
                'layout_id' => 4,
                'level' => 3,
            ],
            33 => [
                'id' => 46,
                'page_id' => 8,
                'layout_id' => 2,
                'level' => 4,
            ],
            34 => [
                'id' => 47,
                'page_id' => 8,
                'layout_id' => 10,
                'level' => 5,
            ],
            35 => [
                'id' => 48,
                'page_id' => 8,
                'layout_id' => 2,
                'level' => 6,
            ],
            36 => [
                'id' => 49,
                'page_id' => 8,
                'layout_id' => 4,
                'level' => 7,
            ],
            37 => [
                'id' => 50,
                'page_id' => 8,
                'layout_id' => 2,
                'level' => 8,
            ],
            38 => [
                'id' => 51,
                'page_id' => 8,
                'layout_id' => 2,
                'level' => 9,
            ],
            39 => [
                'id' => 52,
                'page_id' => 8,
                'layout_id' => 6,
                'level' => 10,
            ],
            40 => [
                'id' => 53,
                'page_id' => 8,
                'layout_id' => 8,
                'level' => 11,
            ],
            41 => [
                'id' => 54,
                'page_id' => 10,
                'layout_id' => 4,
                'level' => 2,
            ],
            42 => [
                'id' => 55,
                'page_id' => 10,
                'layout_id' => 3,
                'level' => 3,
            ],
            43 => [
                'id' => 56,
                'page_id' => 10,
                'layout_id' => 2,
                'level' => 5,
            ],
            44 => [
                'id' => 57,
                'page_id' => 10,
                'layout_id' => 8,
                'level' => 6,
            ],
            45 => [
                'id' => 58,
                'page_id' => 10,
                'layout_id' => 7,
                'level' => 7,
            ],
            46 => [
                'id' => 59,
                'page_id' => 10,
                'layout_id' => 10,
                'level' => 1,
            ],
            47 => [
                'id' => 60,
                'page_id' => 10,
                'layout_id' => 10,
                'level' => 4,
            ],
            48 => [
                'id' => 61,
                'page_id' => 11,
                'layout_id' => 10,
                'level' => 1,
            ],
            49 => [
                'id' => 62,
                'page_id' => 11,
                'layout_id' => 2,
                'level' => 2,
            ],
            50 => [
                'id' => 63,
                'page_id' => 11,
                'layout_id' => 10,
                'level' => 3,
            ],
            51 => [
                'id' => 64,
                'page_id' => 11,
                'layout_id' => 2,
                'level' => 4,
            ],
            52 => [
                'id' => 65,
                'page_id' => 11,
                'layout_id' => 2,
                'level' => 6,
            ],
            53 => [
                'id' => 66,
                'page_id' => 11,
                'layout_id' => 10,
                'level' => 5,
            ],
            54 => [
                'id' => 67,
                'page_id' => 11,
                'layout_id' => 10,
                'level' => 7,
            ],
            55 => [
                'id' => 68,
                'page_id' => 11,
                'layout_id' => 7,
                'level' => 8,
            ],
            56 => [
                'id' => 69,
                'page_id' => 11,
                'layout_id' => 10,
                'level' => 9,
            ],
            57 => [
                'id' => 70,
                'page_id' => 11,
                'layout_id' => 9,
                'level' => 10,
            ],
            58 => [
                'id' => 71,
                'page_id' => 12,
                'layout_id' => 10,
                'level' => 1,
            ],
            59 => [
                'id' => 72,
                'page_id' => 12,
                'layout_id' => 4,
                'level' => 2,
            ],
            60 => [
                'id' => 73,
                'page_id' => 12,
                'layout_id' => 2,
                'level' => 3,
            ],
            61 => [
                'id' => 74,
                'page_id' => 12,
                'layout_id' => 10,
                'level' => 4,
            ],
            62 => [
                'id' => 75,
                'page_id' => 12,
                'layout_id' => 4,
                'level' => 5,
            ],
            63 => [
                'id' => 77,
                'page_id' => 12,
                'layout_id' => 7,
                'level' => 8,
            ],
            64 => [
                'id' => 78,
                'page_id' => 12,
                'layout_id' => 10,
                'level' => 9,
            ],
            65 => [
                'id' => 79,
                'page_id' => 12,
                'layout_id' => 2,
                'level' => 7,
            ],
            66 => [
                'id' => 80,
                'page_id' => 13,
                'layout_id' => 10,
                'level' => 1,
            ],
            67 => [
                'id' => 81,
                'page_id' => 13,
                'layout_id' => 11,
                'level' => 2,
            ],
            68 => [
                'id' => 82,
                'page_id' => 13,
                'layout_id' => 2,
                'level' => 3,
            ],
            69 => [
                'id' => 83,
                'page_id' => 13,
                'layout_id' => 4,
                'level' => 4,
            ],
            70 => [
                'id' => 84,
                'page_id' => 13,
                'layout_id' => 2,
                'level' => 5,
            ],
            71 => [
                'id' => 85,
                'page_id' => 13,
                'layout_id' => 4,
                'level' => 6,
            ],
            72 => [
                'id' => 86,
                'page_id' => 14,
                'layout_id' => 10,
                'level' => 1,
            ],
            73 => [
                'id' => 87,
                'page_id' => 14,
                'layout_id' => 10,
                'level' => 5,
            ],
            74 => [
                'id' => 88,
                'page_id' => 14,
                'layout_id' => 5,
                'level' => 2,
            ],
            75 => [
                'id' => 89,
                'page_id' => 14,
                'layout_id' => 2,
                'level' => 3,
            ],
            76 => [
                'id' => 90,
                'page_id' => 14,
                'layout_id' => 4,
                'level' => 4,
            ],
            77 => [
                'id' => 91,
                'page_id' => 14,
                'layout_id' => 2,
                'level' => 6,
            ],
            78 => [
                'id' => 92,
                'page_id' => 14,
                'layout_id' => 4,
                'level' => 7,
            ],
            79 => [
                'id' => 93,
                'page_id' => 14,
                'layout_id' => 7,
                'level' => 8,
            ],
            80 => [
                'id' => 94,
                'page_id' => 14,
                'layout_id' => 9,
                'level' => 9,
            ],
            81 => [
                'id' => 95,
                'page_id' => 5,
                'layout_id' => 2,
                'level' => 4,
            ],
            82 => [
                'id' => 96,
                'page_id' => 5,
                'layout_id' => 2,
                'level' => 5,
            ],
            83 => [
                'id' => 97,
                'page_id' => 5,
                'layout_id' => 4,
                'level' => 11,
            ],
            84 => [
                'id' => 98,
                'page_id' => 5,
                'layout_id' => 2,
                'level' => 12,
            ],
            85 => [
                'id' => 99,
                'page_id' => 5,
                'layout_id' => 7,
                'level' => 14,
            ],
        ]);
    }
}
