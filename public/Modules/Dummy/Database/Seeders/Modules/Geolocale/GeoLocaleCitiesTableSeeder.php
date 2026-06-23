<?php

namespace Modules\Dummy\Database\Seeders\Modules\Geolocale;

use Illuminate\Database\Seeder;

class GeoLocaleCitiesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('geolocale_cities')->truncate();

        \DB::table('geolocale_cities')->insert([

            1 => [
                'id' => 1369,
                'country_id' => 93,
                'division_id' => 730,
                'name' => 'Dhaka',
                'full_name' => null,
                'code' => 'dac',
                'iana_timezone' => 'Asia/Dhaka',
            ],
            2 => [
                'id' => 2664,
                'country_id' => 101,
                'division_id' => 52,
                'name' => 'Baodi',
                'full_name' => null,
                'code' => '24',
                'iana_timezone' => null,
            ],

            3 => [
                'id' => 13489,
                'country_id' => 167,
                'division_id' => 78,
                'name' => 'Boston',
                'full_name' => null,
                'code' => null,
                'iana_timezone' => null,
            ],

            5 => [
                'id' => 313517,
                'country_id' => 119,
                'division_id' => 2981,
                'name' => 'Biyka',
                'full_name' => 'Biyka',
                'code' => null,
                'iana_timezone' => 'Asia/Barnaul',
            ],
            6 => [
                'id' => 66738,
                'country_id' => 2,
                'division_id' => 812,
                'name' => 'Lokossa',
                'full_name' => 'Lokossa',
                'code' => null,
                'iana_timezone' => 'Africa/Porto-Novo',
            ],
            7 => [
                'id' => 66398,
                'country_id' => 93,
                'division_id' => 734,
                'name' => 'Barishal',
                'full_name' => 'Barishal',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            8 => [
                'id' => 266591,
                'country_id' => 145,
                'division_id' => 739,
                'name' => 'Bellingen',
                'full_name' => 'Bellingen',
                'code' => null,
                'iana_timezone' => 'Europe/Brussels',
            ],
            9 => [
                'id' => 67975,
                'country_id' => 211,
                'division_id' => 194,
                'name' => 'Boa Vista',
                'full_name' => 'Boa Vista',
                'code' => null,
                'iana_timezone' => 'America/Boa_Vista',
            ],
            10 => [
                'id' => 134441,
                'country_id' => 208,
                'division_id' => 620,
                'name' => 'Cerrillos',
                'full_name' => 'Cerrillos',
                'code' => null,
                'iana_timezone' => 'America/Argentina/Salta',
            ],
            11 => [
                'id' => 66339,
                'country_id' => 93,
                'division_id' => 737,
                'name' => 'Mymensingh',
                'full_name' => 'Mymensingh',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            12 => [
                'id' => 66318,
                'country_id' => 93,
                'division_id' => 730,
                'name' => 'Tungi',
                'full_name' => 'Tungi',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            13 => [
                'id' => 66373,
                'country_id' => 93,
                'division_id' => 731,
                'name' => 'Bagerhat',
                'full_name' => 'Bagerhat',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            14 => [
                'id' => 66391,
                'country_id' => 93,
                'division_id' => 733,
                'name' => 'Chattogram',
                'full_name' => 'Chattogram',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            15 => [
                'id' => 65629,
                'country_id' => 70,
                'division_id' => 516,
                'name' => 'Karukh',
                'full_name' => 'Karukh',
                'code' => null,
                'iana_timezone' => 'Asia/Kabul',
            ],
            16 => [
                'id' => 102298,
                'country_id' => 197,
                'division_id' => 843,
                'name' => 'Alice Town',
                'full_name' => 'Alice Town',
                'code' => null,
                'iana_timezone' => 'America/Nassau',
            ],
            17 => [
                'id' => 66414,
                'country_id' => 93,
                'division_id' => 730,
                'name' => 'Azimpur',
                'full_name' => 'Azimpur',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            18 => [
                'id' => 139137,
                'country_id' => 93,
                'division_id' => 736,
                'name' => 'Nilphamari',
                'full_name' => 'Nilphamari',
                'code' => null,
                'iana_timezone' => 'Asia/Dhaka',
            ],
            19 => [
                'id' => 265567,
                'country_id' => 170,
                'division_id' => 118,
                'name' => 'Bonegilla',
                'full_name' => 'Bonegilla',
                'code' => null,
                'iana_timezone' => 'Australia/Melbourne',
            ],
            20 => [
                'id' => 140125,
                'country_id' => 145,
                'division_id' => 740,
                'name' => 'Baileux',
                'full_name' => 'Baileux',
                'code' => null,
                'iana_timezone' => 'Europe/Brussels',
            ],
            21 => [
                'id' => 203527,
                'country_id' => 119,
                'division_id' => 2981,
                'name' => 'Souzga',
                'full_name' => 'Souzga',
                'code' => null,
                'iana_timezone' => 'Asia/Barnaul',
            ],
            22 => [
                'id' => 197008,
                'country_id' => 154,
                'division_id' => 481,
                'name' => 'Babiak',
                'full_name' => 'Babiak',
                'code' => null,
                'iana_timezone' => 'Europe/Warsaw',
            ],
            23 => [
                'id' => 79577,
                'country_id' => 69,
                'division_id' => 1952,
                'name' => 'Ban Houakhoua',
                'full_name' => 'Ban Houakhoua',
                'code' => null,
                'iana_timezone' => 'Asia/Vientiane',
            ],
            24 => [
                'id' => 121385,
                'country_id' => 185,
                'division_id' => 2893,
                'name' => 'Ngchemiangel',
                'full_name' => 'Ngchemiangel',
                'code' => null,
                'iana_timezone' => 'Pacific/Palau',
            ],
        ]);

    }
}
