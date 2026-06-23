<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('countries')->delete();

        \DB::table('countries')->insert([
            0 => [
                'id' => 1,
                'name' => 'United States',
                'code' => 'US',
            ],
            1 => [
                'id' => 2,
                'name' => 'Canada',
                'code' => 'CA',
            ],
            2 => [
                'id' => 3,
                'name' => 'Afghanistan',
                'code' => 'AF',
            ],
            3 => [
                'id' => 4,
                'name' => 'Albania',
                'code' => 'AL',
            ],
            4 => [
                'id' => 5,
                'name' => 'Algeria',
                'code' => 'DZ',
            ],
            5 => [
                'id' => 6,
                'name' => 'American Samoa',
                'code' => 'AS',
            ],
            6 => [
                'id' => 7,
                'name' => 'Andorra',
                'code' => 'AD',
            ],
            7 => [
                'id' => 8,
                'name' => 'Angola',
                'code' => 'AO',
            ],
            8 => [
                'id' => 9,
                'name' => 'Anguilla',
                'code' => 'AI',
            ],
            9 => [
                'id' => 10,
                'name' => 'Antarctica',
                'code' => 'AQ',
            ],
            10 => [
                'id' => 11,
                'name' => 'Antigua and/or Barbuda',
                'code' => 'AG',
            ],
            11 => [
                'id' => 12,
                'name' => 'Argentina',
                'code' => 'AR',
            ],
            12 => [
                'id' => 13,
                'name' => 'Armenia',
                'code' => 'AM',
            ],
            13 => [
                'id' => 14,
                'name' => 'Aruba',
                'code' => 'AW',
            ],
            14 => [
                'id' => 15,
                'name' => 'Australia',
                'code' => 'AU',
            ],
            15 => [
                'id' => 16,
                'name' => 'Austria',
                'code' => 'AT',
            ],
            16 => [
                'id' => 17,
                'name' => 'Azerbaijan',
                'code' => 'AZ',
            ],
            17 => [
                'id' => 18,
                'name' => 'Bahamas',
                'code' => 'BS',
            ],
            18 => [
                'id' => 19,
                'name' => 'Bahrain',
                'code' => 'BH',
            ],
            19 => [
                'id' => 20,
                'name' => 'Bangladesh',
                'code' => 'BD',
            ],
            20 => [
                'id' => 21,
                'name' => 'Barbados',
                'code' => 'BB',
            ],
            21 => [
                'id' => 22,
                'name' => 'Belarus',
                'code' => 'BY',
            ],
            22 => [
                'id' => 23,
                'name' => 'Belgium',
                'code' => 'BE',
            ],
            23 => [
                'id' => 24,
                'name' => 'Belize',
                'code' => 'BZ',
            ],
            24 => [
                'id' => 25,
                'name' => 'Benin',
                'code' => 'BJ',
            ],
            25 => [
                'id' => 26,
                'name' => 'Bermuda',
                'code' => 'BM',
            ],
            26 => [
                'id' => 27,
                'name' => 'Bhutan',
                'code' => 'BT',
            ],
            27 => [
                'id' => 28,
                'name' => 'Bolivia',
                'code' => 'BO',
            ],
            28 => [
                'id' => 29,
                'name' => 'Bosnia and Herzegovina',
                'code' => 'BA',
            ],
            29 => [
                'id' => 30,
                'name' => 'Botswana',
                'code' => 'BW',
            ],
            30 => [
                'id' => 31,
                'name' => 'Bouvet Island',
                'code' => 'BV',
            ],
            31 => [
                'id' => 32,
                'name' => 'Brazil',
                'code' => 'BR',
            ],
            32 => [
                'id' => 33,
                'name' => 'British lndian Ocean Territory',
                'code' => 'IO',
            ],
            33 => [
                'id' => 34,
                'name' => 'Brunei Darussalam',
                'code' => 'BN',
            ],
            34 => [
                'id' => 35,
                'name' => 'Bulgaria',
                'code' => 'BG',
            ],
            35 => [
                'id' => 36,
                'name' => 'Burkina Faso',
                'code' => 'BF',
            ],
            36 => [
                'id' => 37,
                'name' => 'Burundi',
                'code' => 'BI',
            ],
            37 => [
                'id' => 38,
                'name' => 'Cambodia',
                'code' => 'KH',
            ],
            38 => [
                'id' => 39,
                'name' => 'Cameroon',
                'code' => 'CM',
            ],
            39 => [
                'id' => 40,
                'name' => 'Cape Verde',
                'code' => 'CV',
            ],
            40 => [
                'id' => 41,
                'name' => 'Cayman Islands',
                'code' => 'KY',
            ],
            41 => [
                'id' => 42,
                'name' => 'Central African Republic',
                'code' => 'CF',
            ],
            42 => [
                'id' => 43,
                'name' => 'Chad',
                'code' => 'TD',
            ],
            43 => [
                'id' => 44,
                'name' => 'Chile',
                'code' => 'CL',
            ],
            44 => [
                'id' => 45,
                'name' => 'China',
                'code' => 'CN',
            ],
            45 => [
                'id' => 46,
                'name' => 'Christmas Island',
                'code' => 'CX',
            ],
            46 => [
                'id' => 47,
                'name' => 'Cocos (Keeling) Islands',
                'code' => 'CC',
            ],
            47 => [
                'id' => 48,
                'name' => 'Colombia',
                'code' => 'CO',
            ],
            48 => [
                'id' => 49,
                'name' => 'Comoros',
                'code' => 'KM',
            ],
            49 => [
                'id' => 50,
                'name' => 'Congo',
                'code' => 'CG',
            ],
            50 => [
                'id' => 51,
                'name' => 'Cook Islands',
                'code' => 'CK',
            ],
            51 => [
                'id' => 52,
                'name' => 'Costa Rica',
                'code' => 'CR',
            ],
            52 => [
                'id' => 53,
                'name' => 'Croatia (Hrvatska)',
                'code' => 'HR',
            ],
            53 => [
                'id' => 54,
                'name' => 'Cuba',
                'code' => 'CU',
            ],
            54 => [
                'id' => 55,
                'name' => 'Cyprus',
                'code' => 'CY',
            ],
            55 => [
                'id' => 56,
                'name' => 'Czech Republic',
                'code' => 'CZ',
            ],
            56 => [
                'id' => 57,
                'name' => 'Democratic Republic of Congo',
                'code' => 'CD',
            ],
            57 => [
                'id' => 58,
                'name' => 'Denmark',
                'code' => 'DK',
            ],
            58 => [
                'id' => 59,
                'name' => 'Djibouti',
                'code' => 'DJ',
            ],
            59 => [
                'id' => 60,
                'name' => 'Dominica',
                'code' => 'DM',
            ],
            60 => [
                'id' => 61,
                'name' => 'Dominican Republic',
                'code' => 'DO',
            ],
            61 => [
                'id' => 62,
                'name' => 'East Timor',
                'code' => 'TP',
            ],
            62 => [
                'id' => 63,
                'name' => 'Ecudaor',
                'code' => 'EC',
            ],
            63 => [
                'id' => 64,
                'name' => 'Egypt',
                'code' => 'EG',
            ],
            64 => [
                'id' => 65,
                'name' => 'El Salvador',
                'code' => 'SV',
            ],
            65 => [
                'id' => 66,
                'name' => 'Equatorial Guinea',
                'code' => 'GQ',
            ],
            66 => [
                'id' => 67,
                'name' => 'Eritrea',
                'code' => 'ER',
            ],
            67 => [
                'id' => 68,
                'name' => 'Estonia',
                'code' => 'EE',
            ],
            68 => [
                'id' => 69,
                'name' => 'Ethiopia',
                'code' => 'ET',
            ],
            69 => [
                'id' => 70,
                'name' => 'Falkland Islands (Malvinas)',
                'code' => 'FK',
            ],
            70 => [
                'id' => 71,
                'name' => 'Faroe Islands',
                'code' => 'FO',
            ],
            71 => [
                'id' => 72,
                'name' => 'Fiji',
                'code' => 'FJ',
            ],
            72 => [
                'id' => 73,
                'name' => 'Finland',
                'code' => 'FI',
            ],
            73 => [
                'id' => 74,
                'name' => 'France',
                'code' => 'FR',
            ],
            74 => [
                'id' => 75,
                'name' => 'France, Metropolitan',
                'code' => 'FX',
            ],
            75 => [
                'id' => 76,
                'name' => 'French Guiana',
                'code' => 'GF',
            ],
            76 => [
                'id' => 77,
                'name' => 'French Polynesia',
                'code' => 'PF',
            ],
            77 => [
                'id' => 78,
                'name' => 'French Southern Territories',
                'code' => 'TF',
            ],
            78 => [
                'id' => 79,
                'name' => 'Gabon',
                'code' => 'GA',
            ],
            79 => [
                'id' => 80,
                'name' => 'Gambia',
                'code' => 'GM',
            ],
            80 => [
                'id' => 81,
                'name' => 'Georgia',
                'code' => 'GE',
            ],
            81 => [
                'id' => 82,
                'name' => 'Germany',
                'code' => 'DE',
            ],
            82 => [
                'id' => 83,
                'name' => 'Ghana',
                'code' => 'GH',
            ],
            83 => [
                'id' => 84,
                'name' => 'Gibraltar',
                'code' => 'GI',
            ],
            84 => [
                'id' => 85,
                'name' => 'Greece',
                'code' => 'GR',
            ],
            85 => [
                'id' => 86,
                'name' => 'Greenland',
                'code' => 'GL',
            ],
            86 => [
                'id' => 87,
                'name' => 'Grenada',
                'code' => 'GD',
            ],
            87 => [
                'id' => 88,
                'name' => 'Guadeloupe',
                'code' => 'GP',
            ],
            88 => [
                'id' => 89,
                'name' => 'Guam',
                'code' => 'GU',
            ],
            89 => [
                'id' => 90,
                'name' => 'Guatemala',
                'code' => 'GT',
            ],
            90 => [
                'id' => 91,
                'name' => 'Guinea',
                'code' => 'GN',
            ],
            91 => [
                'id' => 92,
                'name' => 'Guinea-Bissau',
                'code' => 'GW',
            ],
            92 => [
                'id' => 93,
                'name' => 'Guyana',
                'code' => 'GY',
            ],
            93 => [
                'id' => 94,
                'name' => 'Haiti',
                'code' => 'HT',
            ],
            94 => [
                'id' => 95,
                'name' => 'Heard and Mc Donald Islands',
                'code' => 'HM',
            ],
            95 => [
                'id' => 96,
                'name' => 'Honduras',
                'code' => 'HN',
            ],
            96 => [
                'id' => 97,
                'name' => 'Hong Kong',
                'code' => 'HK',
            ],
            97 => [
                'id' => 98,
                'name' => 'Hungary',
                'code' => 'HU',
            ],
            98 => [
                'id' => 99,
                'name' => 'Iceland',
                'code' => 'IS',
            ],
            99 => [
                'id' => 100,
                'name' => 'India',
                'code' => 'IN',
            ],
            100 => [
                'id' => 101,
                'name' => 'Indonesia',
                'code' => 'ID',
            ],
            101 => [
                'id' => 102,
                'name' => 'Iran (Islamic Republic of)',
                'code' => 'IR',
            ],
            102 => [
                'id' => 103,
                'name' => 'Iraq',
                'code' => 'IQ',
            ],
            103 => [
                'id' => 104,
                'name' => 'Ireland',
                'code' => 'IE',
            ],
            104 => [
                'id' => 105,
                'name' => 'Israel',
                'code' => 'IL',
            ],
            105 => [
                'id' => 106,
                'name' => 'Italy',
                'code' => 'IT',
            ],
            106 => [
                'id' => 107,
                'name' => 'Ivory Coast',
                'code' => 'CI',
            ],
            107 => [
                'id' => 108,
                'name' => 'Jamaica',
                'code' => 'JM',
            ],
            108 => [
                'id' => 109,
                'name' => 'Japan',
                'code' => 'JP',
            ],
            109 => [
                'id' => 110,
                'name' => 'Jordan',
                'code' => 'JO',
            ],
            110 => [
                'id' => 111,
                'name' => 'Kazakhstan',
                'code' => 'KZ',
            ],
            111 => [
                'id' => 112,
                'name' => 'Kenya',
                'code' => 'KE',
            ],
            112 => [
                'id' => 113,
                'name' => 'Kiribati',
                'code' => 'KI',
            ],
            113 => [
                'id' => 114,
                'name' => 'Korea, Democratic People\'s Republic of',
                'code' => 'KP',
            ],
            114 => [
                'id' => 115,
                'name' => 'Korea, Republic of',
                'code' => 'KR',
            ],
            115 => [
                'id' => 116,
                'name' => 'Kuwait',
                'code' => 'KW',
            ],
            116 => [
                'id' => 117,
                'name' => 'Kyrgyzstan',
                'code' => 'KG',
            ],
            117 => [
                'id' => 118,
                'name' => 'Lao People\'s Democratic Republic',
                'code' => 'LA',
            ],
            118 => [
                'id' => 119,
                'name' => 'Latvia',
                'code' => 'LV',
            ],
            119 => [
                'id' => 120,
                'name' => 'Lebanon',
                'code' => 'LB',
            ],
            120 => [
                'id' => 121,
                'name' => 'Lesotho',
                'code' => 'LS',
            ],
            121 => [
                'id' => 122,
                'name' => 'Liberia',
                'code' => 'LR',
            ],
            122 => [
                'id' => 123,
                'name' => 'Libyan Arab Jamahiriya',
                'code' => 'LY',
            ],
            123 => [
                'id' => 124,
                'name' => 'Liechtenstein',
                'code' => 'LI',
            ],
            124 => [
                'id' => 125,
                'name' => 'Lithuania',
                'code' => 'LT',
            ],
            125 => [
                'id' => 126,
                'name' => 'Luxembourg',
                'code' => 'LU',
            ],
            126 => [
                'id' => 127,
                'name' => 'Macau',
                'code' => 'MO',
            ],
            127 => [
                'id' => 128,
                'name' => 'Macedonia',
                'code' => 'MK',
            ],
            128 => [
                'id' => 129,
                'name' => 'Madagascar',
                'code' => 'MG',
            ],
            129 => [
                'id' => 130,
                'name' => 'Malawi',
                'code' => 'MW',
            ],
            130 => [
                'id' => 131,
                'name' => 'Malaysia',
                'code' => 'MY',
            ],
            131 => [
                'id' => 132,
                'name' => 'Maldives',
                'code' => 'MV',
            ],
            132 => [
                'id' => 133,
                'name' => 'Mali',
                'code' => 'ML',
            ],
            133 => [
                'id' => 134,
                'name' => 'Malta',
                'code' => 'MT',
            ],
            134 => [
                'id' => 135,
                'name' => 'Marshall Islands',
                'code' => 'MH',
            ],
            135 => [
                'id' => 136,
                'name' => 'Martinique',
                'code' => 'MQ',
            ],
            136 => [
                'id' => 137,
                'name' => 'Mauritania',
                'code' => 'MR',
            ],
            137 => [
                'id' => 138,
                'name' => 'Mauritius',
                'code' => 'MU',
            ],
            138 => [
                'id' => 139,
                'name' => 'Mayotte',
                'code' => 'TY',
            ],
            139 => [
                'id' => 140,
                'name' => 'Mexico',
                'code' => 'MX',
            ],
            140 => [
                'id' => 141,
                'name' => 'Micronesia, Federated States of',
                'code' => 'FM',
            ],
            141 => [
                'id' => 142,
                'name' => 'Moldova, Republic of',
                'code' => 'MD',
            ],
            142 => [
                'id' => 143,
                'name' => 'Monaco',
                'code' => 'MC',
            ],
            143 => [
                'id' => 144,
                'name' => 'Mongolia',
                'code' => 'MN',
            ],
            144 => [
                'id' => 145,
                'name' => 'Montserrat',
                'code' => 'MS',
            ],
            145 => [
                'id' => 146,
                'name' => 'Morocco',
                'code' => 'MA',
            ],
            146 => [
                'id' => 147,
                'name' => 'Mozambique',
                'code' => 'MZ',
            ],
            147 => [
                'id' => 148,
                'name' => 'Myanmar',
                'code' => 'MM',
            ],
            148 => [
                'id' => 149,
                'name' => 'Namibia',
                'code' => 'NA',
            ],
            149 => [
                'id' => 150,
                'name' => 'Nauru',
                'code' => 'NR',
            ],
            150 => [
                'id' => 151,
                'name' => 'Nepal',
                'code' => 'NP',
            ],
            151 => [
                'id' => 152,
                'name' => 'Netherlands',
                'code' => 'NL',
            ],
            152 => [
                'id' => 153,
                'name' => 'Netherlands Antilles',
                'code' => 'AN',
            ],
            153 => [
                'id' => 154,
                'name' => 'New Caledonia',
                'code' => 'NC',
            ],
            154 => [
                'id' => 155,
                'name' => 'New Zealand',
                'code' => 'NZ',
            ],
            155 => [
                'id' => 156,
                'name' => 'Nicaragua',
                'code' => 'NI',
            ],
            156 => [
                'id' => 157,
                'name' => 'Niger',
                'code' => 'NE',
            ],
            157 => [
                'id' => 158,
                'name' => 'Nigeria',
                'code' => 'NG',
            ],
            158 => [
                'id' => 159,
                'name' => 'Niue',
                'code' => 'NU',
            ],
            159 => [
                'id' => 160,
                'name' => 'Norfork Island',
                'code' => 'NF',
            ],
            160 => [
                'id' => 161,
                'name' => 'Northern Mariana Islands',
                'code' => 'MP',
            ],
            161 => [
                'id' => 162,
                'name' => 'Norway',
                'code' => 'NO',
            ],
            162 => [
                'id' => 163,
                'name' => 'Oman',
                'code' => 'OM',
            ],
            163 => [
                'id' => 164,
                'name' => 'Pakistan',
                'code' => 'PK',
            ],
            164 => [
                'id' => 165,
                'name' => 'Palau',
                'code' => 'PW',
            ],
            165 => [
                'id' => 166,
                'name' => 'Panama',
                'code' => 'PA',
            ],
            166 => [
                'id' => 167,
                'name' => 'Papua New Guinea',
                'code' => 'PG',
            ],
            167 => [
                'id' => 168,
                'name' => 'Paraguay',
                'code' => 'PY',
            ],
            168 => [
                'id' => 169,
                'name' => 'Peru',
                'code' => 'PE',
            ],
            169 => [
                'id' => 170,
                'name' => 'Philippines',
                'code' => 'PH',
            ],
            170 => [
                'id' => 171,
                'name' => 'Pitcairn',
                'code' => 'PN',
            ],
            171 => [
                'id' => 172,
                'name' => 'Poland',
                'code' => 'PL',
            ],
            172 => [
                'id' => 173,
                'name' => 'Portugal',
                'code' => 'PT',
            ],
            173 => [
                'id' => 174,
                'name' => 'Puerto Rico',
                'code' => 'PR',
            ],
            174 => [
                'id' => 175,
                'name' => 'Qatar',
                'code' => 'QA',
            ],
            175 => [
                'id' => 176,
                'name' => 'Republic of South Sudan',
                'code' => 'SS',
            ],
            176 => [
                'id' => 177,
                'name' => 'Reunion',
                'code' => 'RE',
            ],
            177 => [
                'id' => 178,
                'name' => 'Romania',
                'code' => 'RO',
            ],
            178 => [
                'id' => 179,
                'name' => 'Russian Federation',
                'code' => 'RU',
            ],
            179 => [
                'id' => 180,
                'name' => 'Rwanda',
                'code' => 'RW',
            ],
            180 => [
                'id' => 181,
                'name' => 'Saint Kitts and Nevis',
                'code' => 'KN',
            ],
            181 => [
                'id' => 182,
                'name' => 'Saint Lucia',
                'code' => 'LC',
            ],
            182 => [
                'id' => 183,
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'VC',
            ],
            183 => [
                'id' => 184,
                'name' => 'Samoa',
                'code' => 'WS',
            ],
            184 => [
                'id' => 185,
                'name' => 'San Marino',
                'code' => 'SM',
            ],
            185 => [
                'id' => 186,
                'name' => 'Sao Tome and Principe',
                'code' => 'ST',
            ],
            186 => [
                'id' => 187,
                'name' => 'Saudi Arabia',
                'code' => 'SA',
            ],
            187 => [
                'id' => 188,
                'name' => 'Senegal',
                'code' => 'SN',
            ],
            188 => [
                'id' => 189,
                'name' => 'Serbia',
                'code' => 'RS',
            ],
            189 => [
                'id' => 190,
                'name' => 'Seychelles',
                'code' => 'SC',
            ],
            190 => [
                'id' => 191,
                'name' => 'Sierra Leone',
                'code' => 'SL',
            ],
            191 => [
                'id' => 192,
                'name' => 'Singapore',
                'code' => 'SG',
            ],
            192 => [
                'id' => 193,
                'name' => 'Slovakia',
                'code' => 'SK',
            ],
            193 => [
                'id' => 194,
                'name' => 'Slovenia',
                'code' => 'SI',
            ],
            194 => [
                'id' => 195,
                'name' => 'Solomon Islands',
                'code' => 'SB',
            ],
            195 => [
                'id' => 196,
                'name' => 'Somalia',
                'code' => 'SO',
            ],
            196 => [
                'id' => 197,
                'name' => 'South Africa',
                'code' => 'ZA',
            ],
            197 => [
                'id' => 198,
                'name' => 'South Georgia South Sandwich Islands',
                'code' => 'GS',
            ],
            198 => [
                'id' => 199,
                'name' => 'Spain',
                'code' => 'ES',
            ],
            199 => [
                'id' => 200,
                'name' => 'Sri Lanka',
                'code' => 'LK',
            ],
            200 => [
                'id' => 201,
                'name' => 'St. Helena',
                'code' => 'SH',
            ],
            201 => [
                'id' => 202,
                'name' => 'St. Pierre and Miquelon',
                'code' => 'PM',
            ],
            202 => [
                'id' => 203,
                'name' => 'Sudan',
                'code' => 'SD',
            ],
            203 => [
                'id' => 204,
                'name' => 'Suriname',
                'code' => 'SR',
            ],
            204 => [
                'id' => 205,
                'name' => 'Svalbarn and Jan Mayen Islands',
                'code' => 'SJ',
            ],
            205 => [
                'id' => 206,
                'name' => 'Swaziland',
                'code' => 'SZ',
            ],
            206 => [
                'id' => 207,
                'name' => 'Sweden',
                'code' => 'SE',
            ],
            207 => [
                'id' => 208,
                'name' => 'Switzerland',
                'code' => 'CH',
            ],
            208 => [
                'id' => 209,
                'name' => 'Syrian Arab Republic',
                'code' => 'SY',
            ],
            209 => [
                'id' => 210,
                'name' => 'Taiwan',
                'code' => 'TW',
            ],
            210 => [
                'id' => 211,
                'name' => 'Tajikistan',
                'code' => 'TJ',
            ],
            211 => [
                'id' => 212,
                'name' => 'Tanzania, United Republic of',
                'code' => 'TZ',
            ],
            212 => [
                'id' => 213,
                'name' => 'Thailand',
                'code' => 'TH',
            ],
            213 => [
                'id' => 214,
                'name' => 'Togo',
                'code' => 'TG',
            ],
            214 => [
                'id' => 215,
                'name' => 'Tokelau',
                'code' => 'TK',
            ],
            215 => [
                'id' => 216,
                'name' => 'Tonga',
                'code' => 'TO',
            ],
            216 => [
                'id' => 217,
                'name' => 'Trinidad and Tobago',
                'code' => 'TT',
            ],
            217 => [
                'id' => 218,
                'name' => 'Tunisia',
                'code' => 'TN',
            ],
            218 => [
                'id' => 219,
                'name' => 'Turkey',
                'code' => 'TR',
            ],
            219 => [
                'id' => 220,
                'name' => 'Turkmenistan',
                'code' => 'TM',
            ],
            220 => [
                'id' => 221,
                'name' => 'Turks and Caicos Islands',
                'code' => 'TC',
            ],
            221 => [
                'id' => 222,
                'name' => 'Tuvalu',
                'code' => 'TV',
            ],
            222 => [
                'id' => 223,
                'name' => 'Uganda',
                'code' => 'UG',
            ],
            223 => [
                'id' => 224,
                'name' => 'Ukraine',
                'code' => 'UA',
            ],
            224 => [
                'id' => 225,
                'name' => 'United Arab Emirates',
                'code' => 'AE',
            ],
            225 => [
                'id' => 226,
                'name' => 'United Kingdom',
                'code' => 'GB',
            ],
            226 => [
                'id' => 227,
                'name' => 'United States minor outlying islands',
                'code' => 'UM',
            ],
            227 => [
                'id' => 228,
                'name' => 'Uruguay',
                'code' => 'UY',
            ],
            228 => [
                'id' => 229,
                'name' => 'Uzbekistan',
                'code' => 'UZ',
            ],
            229 => [
                'id' => 230,
                'name' => 'Vanuatu',
                'code' => 'VU',
            ],
            230 => [
                'id' => 231,
                'name' => 'Vatican City State',
                'code' => 'VA',
            ],
            231 => [
                'id' => 232,
                'name' => 'Venezuela',
                'code' => 'VE',
            ],
            232 => [
                'id' => 233,
                'name' => 'Vietnam',
                'code' => 'VN',
            ],
            233 => [
                'id' => 234,
                'name' => 'Virgin Islands (British)',
                'code' => 'VG',
            ],
            234 => [
                'id' => 235,
                'name' => 'Virgin Islands (U.S.)',
                'code' => 'VI',
            ],
            235 => [
                'id' => 236,
                'name' => 'Wallis and Futuna Islands',
                'code' => 'WF',
            ],
            236 => [
                'id' => 237,
                'name' => 'Western Sahara',
                'code' => 'EH',
            ],
            237 => [
                'id' => 238,
                'name' => 'Yemen',
                'code' => 'YE',
            ],
            238 => [
                'id' => 239,
                'name' => 'Yugoslavia',
                'code' => 'YU',
            ],
            239 => [
                'id' => 240,
                'name' => 'Zaire',
                'code' => 'ZR',
            ],
            240 => [
                'id' => 241,
                'name' => 'Zambia',
                'code' => 'ZM',
            ],
            241 => [
                'id' => 242,
                'name' => 'Zimbabwe',
                'code' => 'ZW',
            ],
        ]);

    }
}
