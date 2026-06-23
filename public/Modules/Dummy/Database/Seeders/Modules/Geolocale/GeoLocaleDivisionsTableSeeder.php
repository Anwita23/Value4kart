<?php

namespace Modules\Dummy\Database\Seeders\Modules\Geolocale;

use Illuminate\Database\Seeder;

class GeoLocaleDivisionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('geolocale_divisions')->truncate();

        \DB::table('geolocale_divisions')->insert([
            1 => [
                'id' => 28,
                'country_id' => 101,
                'name' => 'Fujian',
                'full_name' => null,
                'code' => '7',
                'has_city' => 1,
            ],
            2 => [
                'id' => 61,
                'country_id' => 167,
                'name' => 'Alabama',
                'full_name' => null,
                'code' => 'AL',
                'has_city' => 1,
            ],
            3 => [
                'id' => 78,
                'country_id' => 167,
                'name' => 'Kentucky',
                'full_name' => null,
                'code' => 'KY',
                'has_city' => 1,
            ],
            4 => [
                'id' => 118,
                'country_id' => 170,
                'name' => 'Victoria',
                'full_name' => null,
                'code' => '7',
                'has_city' => 1,
            ],
            5 => [
                'id' => 194,
                'country_id' => 211,
                'name' => 'Roraima',
                'full_name' => null,
                'code' => '25',
                'has_city' => 1,
            ],
            6 => [
                'id' => 481,
                'country_id' => 154,
                'name' => 'Greater Poland',
                'full_name' => null,
                'code' => '86',
                'has_city' => 0,
            ],
            7 => [
                'id' => 516,
                'country_id' => 70,
                'name' => 'Herat',
                'full_name' => null,
                'code' => '11',
                'has_city' => 0,
            ],
            8 => [
                'id' => 620,
                'country_id' => 208,
                'name' => 'Salta',
                'full_name' => null,
                'code' => '17',
                'has_city' => 0,
            ],
            9 => [
                'id' => 730,
                'country_id' => 93,
                'name' => 'Dhaka',
                'full_name' => null,
                'code' => '81',
                'has_city' => 0,
            ],
            10 => [
                'id' => 731,
                'country_id' => 93,
                'name' => 'Khulna',
                'full_name' => null,
                'code' => '82',
                'has_city' => 0,
            ],
            11 => [
                'id' => 732,
                'country_id' => 93,
                'name' => 'Rajshahi Division',
                'full_name' => null,
                'code' => '83',
                'has_city' => 0,
            ],
            12 => [
                'id' => 733,
                'country_id' => 93,
                'name' => 'Chittagong',
                'full_name' => null,
                'code' => '84',
                'has_city' => 0,
            ],

            13 => [
                'id' => 734,
                'country_id' => 93,
                'name' => 'Barisāl',
                'full_name' => null,
                'code' => '85',
                'has_city' => 0,
            ],
            14 => [
                'id' => 735,
                'country_id' => 93,
                'name' => 'Sylhet',
                'full_name' => null,
                'code' => '86',
                'has_city' => 0,
            ],
            15 => [
                'id' => 736,
                'country_id' => 93,
                'name' => 'Rangpur Division',
                'full_name' => null,
                'code' => '87',
                'has_city' => 0,
            ],
            16 => [
                'id' => 737,
                'country_id' => 93,
                'name' => 'Mymensingh Division',
                'full_name' => null,
                'code' => 'H',
                'has_city' => 0,
            ],
            17 => [
                'id' => 739,
                'country_id' => 145,
                'name' => 'Flanders',
                'full_name' => null,
                'code' => 'VLG',
                'has_city' => 0,
            ],
            18 => [
                'id' => 740,
                'country_id' => 145,
                'name' => 'Wallonia',
                'full_name' => null,
                'code' => 'WAL',
                'has_city' => 0,
            ],
            19 => [
                'id' => 812,
                'country_id' => 2,
                'name' => 'Mono',
                'full_name' => null,
                'code' => '15',
                'has_city' => 0,
            ],
            20 => [
                'id' => 843,
                'country_id' => 197,
                'name' => 'Bimini',
                'full_name' => null,
                'code' => '5',
                'has_city' => 0,
            ],
            21 => [
                'id' => 1952,
                'country_id' => 69,
                'name' => 'Bokeo',
                'full_name' => null,
                'code' => '22',
                'has_city' => 0,
            ],
            22 => [
                'id' => 2893,
                'country_id' => 185,
                'name' => 'Aimeliik',
                'full_name' => null,
                'code' => '1',
                'has_city' => 0,
            ],
            23 => [
                'id' => 2981,
                'country_id' => 119,
                'name' => 'Altai',
                'full_name' => null,
                'code' => '3',
                'has_city' => 0,
            ],
        ]);

    }
}
