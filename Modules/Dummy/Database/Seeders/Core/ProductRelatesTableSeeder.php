<?php

namespace Modules\Dummy\Database\Seeders\Core;

use Illuminate\Database\Seeder;

class ProductRelatesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('product_relates')->delete();

        \DB::table('product_relates')->insert([
            0 => [
                'product_id' => 1205,
                'related_product_id' => 1203,
            ],
            1 => [
                'product_id' => 1205,
                'related_product_id' => 1202,
            ],
            2 => [
                'product_id' => 1205,
                'related_product_id' => 1200,
            ],
            3 => [
                'product_id' => 1204,
                'related_product_id' => 1205,
            ],
            4 => [
                'product_id' => 1204,
                'related_product_id' => 1200,
            ],
            5 => [
                'product_id' => 1204,
                'related_product_id' => 1202,
            ],
            6 => [
                'product_id' => 1203,
                'related_product_id' => 1201,
            ],
            7 => [
                'product_id' => 1203,
                'related_product_id' => 1204,
            ],
            8 => [
                'product_id' => 1203,
                'related_product_id' => 1202,
            ],
            9 => [
                'product_id' => 1202,
                'related_product_id' => 1201,
            ],
            10 => [
                'product_id' => 1202,
                'related_product_id' => 1205,
            ],
            11 => [
                'product_id' => 1202,
                'related_product_id' => 1204,
            ],
            12 => [
                'product_id' => 1201,
                'related_product_id' => 1200,
            ],
            13 => [
                'product_id' => 1201,
                'related_product_id' => 1205,
            ],
            14 => [
                'product_id' => 1201,
                'related_product_id' => 1203,
            ],
            15 => [
                'product_id' => 1200,
                'related_product_id' => 1201,
            ],
            16 => [
                'product_id' => 1200,
                'related_product_id' => 1205,
            ],
            17 => [
                'product_id' => 1200,
                'related_product_id' => 1202,
            ],
            18 => [
                'product_id' => 1199,
                'related_product_id' => 1198,
            ],
            19 => [
                'product_id' => 1199,
                'related_product_id' => 1194,
            ],
            20 => [
                'product_id' => 1199,
                'related_product_id' => 1191,
            ],
            21 => [
                'product_id' => 1198,
                'related_product_id' => 1199,
            ],
            22 => [
                'product_id' => 1198,
                'related_product_id' => 1189,
            ],
            23 => [
                'product_id' => 1198,
                'related_product_id' => 1192,
            ],
            24 => [
                'product_id' => 1197,
                'related_product_id' => 1199,
            ],
            25 => [
                'product_id' => 1197,
                'related_product_id' => 1189,
            ],
            26 => [
                'product_id' => 1197,
                'related_product_id' => 1195,
            ],
            27 => [
                'product_id' => 1196,
                'related_product_id' => 1193,
            ],
            28 => [
                'product_id' => 1196,
                'related_product_id' => 1195,
            ],
            29 => [
                'product_id' => 1196,
                'related_product_id' => 1188,
            ],
            30 => [
                'product_id' => 1195,
                'related_product_id' => 1187,
            ],
            31 => [
                'product_id' => 1195,
                'related_product_id' => 1192,
            ],
            32 => [
                'product_id' => 1195,
                'related_product_id' => 1196,
            ],
            33 => [
                'product_id' => 1194,
                'related_product_id' => 1195,
            ],
            34 => [
                'product_id' => 1194,
                'related_product_id' => 1193,
            ],
            35 => [
                'product_id' => 1194,
                'related_product_id' => 1188,
            ],
            36 => [
                'product_id' => 1193,
                'related_product_id' => 1194,
            ],
            37 => [
                'product_id' => 1193,
                'related_product_id' => 1198,
            ],
            38 => [
                'product_id' => 1193,
                'related_product_id' => 1189,
            ],
            39 => [
                'product_id' => 1192,
                'related_product_id' => 1191,
            ],
            40 => [
                'product_id' => 1192,
                'related_product_id' => 1187,
            ],
            41 => [
                'product_id' => 1192,
                'related_product_id' => 1195,
            ],
            42 => [
                'product_id' => 1191,
                'related_product_id' => 1193,
            ],
            43 => [
                'product_id' => 1191,
                'related_product_id' => 1199,
            ],
            44 => [
                'product_id' => 1191,
                'related_product_id' => 1198,
            ],
            45 => [
                'product_id' => 1190,
                'related_product_id' => 1197,
            ],
            46 => [
                'product_id' => 1190,
                'related_product_id' => 1195,
            ],
            47 => [
                'product_id' => 1190,
                'related_product_id' => 1199,
            ],
            48 => [
                'product_id' => 1189,
                'related_product_id' => 1191,
            ],
            49 => [
                'product_id' => 1189,
                'related_product_id' => 1187,
            ],
            50 => [
                'product_id' => 1189,
                'related_product_id' => 1197,
            ],
            51 => [
                'product_id' => 1188,
                'related_product_id' => 1198,
            ],
            52 => [
                'product_id' => 1188,
                'related_product_id' => 1195,
            ],
            53 => [
                'product_id' => 1188,
                'related_product_id' => 1189,
            ],
            54 => [
                'product_id' => 1187,
                'related_product_id' => 1192,
            ],
            55 => [
                'product_id' => 1187,
                'related_product_id' => 1195,
            ],
            56 => [
                'product_id' => 1187,
                'related_product_id' => 1193,
            ],
            57 => [
                'product_id' => 1186,
                'related_product_id' => 1178,
            ],
            58 => [
                'product_id' => 1186,
                'related_product_id' => 1170,
            ],
            59 => [
                'product_id' => 1186,
                'related_product_id' => 1182,
            ],
            60 => [
                'product_id' => 1185,
                'related_product_id' => 1174,
            ],
            61 => [
                'product_id' => 1185,
                'related_product_id' => 1175,
            ],
            62 => [
                'product_id' => 1185,
                'related_product_id' => 1176,
            ],
            63 => [
                'product_id' => 1184,
                'related_product_id' => 1176,
            ],
            64 => [
                'product_id' => 1184,
                'related_product_id' => 1175,
            ],
            65 => [
                'product_id' => 1184,
                'related_product_id' => 1174,
            ],
            66 => [
                'product_id' => 1183,
                'related_product_id' => 1182,
            ],
            67 => [
                'product_id' => 1183,
                'related_product_id' => 1179,
            ],
            68 => [
                'product_id' => 1183,
                'related_product_id' => 1181,
            ],
            69 => [
                'product_id' => 1182,
                'related_product_id' => 1183,
            ],
            70 => [
                'product_id' => 1182,
                'related_product_id' => 1181,
            ],
            71 => [
                'product_id' => 1182,
                'related_product_id' => 1172,
            ],
            72 => [
                'product_id' => 1181,
                'related_product_id' => 1183,
            ],
            73 => [
                'product_id' => 1181,
                'related_product_id' => 1182,
            ],
            74 => [
                'product_id' => 1181,
                'related_product_id' => 1175,
            ],
            75 => [
                'product_id' => 1180,
                'related_product_id' => 1170,
            ],
            76 => [
                'product_id' => 1180,
                'related_product_id' => 1186,
            ],
            77 => [
                'product_id' => 1180,
                'related_product_id' => 1177,
            ],
            78 => [
                'product_id' => 1179,
                'related_product_id' => 1183,
            ],
            79 => [
                'product_id' => 1179,
                'related_product_id' => 1176,
            ],
            80 => [
                'product_id' => 1179,
                'related_product_id' => 1171,
            ],
            81 => [
                'product_id' => 1178,
                'related_product_id' => 1180,
            ],
            82 => [
                'product_id' => 1178,
                'related_product_id' => 1181,
            ],
            83 => [
                'product_id' => 1178,
                'related_product_id' => 1172,
            ],
            84 => [
                'product_id' => 1177,
                'related_product_id' => 1184,
            ],
            85 => [
                'product_id' => 1177,
                'related_product_id' => 1174,
            ],
            86 => [
                'product_id' => 1177,
                'related_product_id' => 1175,
            ],
            87 => [
                'product_id' => 1176,
                'related_product_id' => 1177,
            ],
            88 => [
                'product_id' => 1176,
                'related_product_id' => 1174,
            ],
            89 => [
                'product_id' => 1176,
                'related_product_id' => 1175,
            ],
            90 => [
                'product_id' => 1175,
                'related_product_id' => 1174,
            ],
            91 => [
                'product_id' => 1175,
                'related_product_id' => 1177,
            ],
            92 => [
                'product_id' => 1175,
                'related_product_id' => 1184,
            ],
            93 => [
                'product_id' => 1174,
                'related_product_id' => 1177,
            ],
            94 => [
                'product_id' => 1174,
                'related_product_id' => 1175,
            ],
            95 => [
                'product_id' => 1174,
                'related_product_id' => 1184,
            ],
            96 => [
                'product_id' => 1173,
                'related_product_id' => 1172,
            ],
            97 => [
                'product_id' => 1173,
                'related_product_id' => 1171,
            ],
            98 => [
                'product_id' => 1173,
                'related_product_id' => 1183,
            ],
            99 => [
                'product_id' => 1172,
                'related_product_id' => 1173,
            ],
            100 => [
                'product_id' => 1172,
                'related_product_id' => 1179,
            ],
            101 => [
                'product_id' => 1172,
                'related_product_id' => 1181,
            ],
            102 => [
                'product_id' => 1171,
                'related_product_id' => 1172,
            ],
            103 => [
                'product_id' => 1171,
                'related_product_id' => 1173,
            ],
            104 => [
                'product_id' => 1171,
                'related_product_id' => 1179,
            ],
            105 => [
                'product_id' => 1170,
                'related_product_id' => 1175,
            ],
            106 => [
                'product_id' => 1170,
                'related_product_id' => 1177,
            ],
            107 => [
                'product_id' => 1170,
                'related_product_id' => 1169,
            ],
            108 => [
                'product_id' => 1169,
                'related_product_id' => 1183,
            ],
            109 => [
                'product_id' => 1169,
                'related_product_id' => 1180,
            ],
            110 => [
                'product_id' => 1169,
                'related_product_id' => 1170,
            ],
            111 => [
                'product_id' => 1168,
                'related_product_id' => 1165,
            ],
            112 => [
                'product_id' => 1168,
                'related_product_id' => 1166,
            ],
            113 => [
                'product_id' => 1168,
                'related_product_id' => 1164,
            ],
            114 => [
                'product_id' => 1167,
                'related_product_id' => 1168,
            ],
            115 => [
                'product_id' => 1167,
                'related_product_id' => 1164,
            ],
            116 => [
                'product_id' => 1167,
                'related_product_id' => 1165,
            ],
            117 => [
                'product_id' => 1166,
                'related_product_id' => 1168,
            ],
            118 => [
                'product_id' => 1166,
                'related_product_id' => 1163,
            ],
            119 => [
                'product_id' => 1166,
                'related_product_id' => 1161,
            ],
            120 => [
                'product_id' => 1165,
                'related_product_id' => 1160,
            ],
            121 => [
                'product_id' => 1165,
                'related_product_id' => 1161,
            ],
            122 => [
                'product_id' => 1165,
                'related_product_id' => 1162,
            ],
            123 => [
                'product_id' => 1164,
                'related_product_id' => 1163,
            ],
            124 => [
                'product_id' => 1164,
                'related_product_id' => 1166,
            ],
            125 => [
                'product_id' => 1164,
                'related_product_id' => 1168,
            ],
            126 => [
                'product_id' => 1163,
                'related_product_id' => 1165,
            ],
            127 => [
                'product_id' => 1163,
                'related_product_id' => 1161,
            ],
            128 => [
                'product_id' => 1163,
                'related_product_id' => 1166,
            ],
            129 => [
                'product_id' => 1162,
                'related_product_id' => 1161,
            ],
            130 => [
                'product_id' => 1162,
                'related_product_id' => 1160,
            ],
            131 => [
                'product_id' => 1162,
                'related_product_id' => 1166,
            ],
            132 => [
                'product_id' => 1161,
                'related_product_id' => 1162,
            ],
            133 => [
                'product_id' => 1161,
                'related_product_id' => 1160,
            ],
            134 => [
                'product_id' => 1161,
                'related_product_id' => 1165,
            ],
            135 => [
                'product_id' => 1160,
                'related_product_id' => 1166,
            ],
            136 => [
                'product_id' => 1160,
                'related_product_id' => 1165,
            ],
            137 => [
                'product_id' => 1160,
                'related_product_id' => 1162,
            ],
            138 => [
                'product_id' => 1159,
                'related_product_id' => 1158,
            ],
            139 => [
                'product_id' => 1159,
                'related_product_id' => 1166,
            ],
            140 => [
                'product_id' => 1159,
                'related_product_id' => 1165,
            ],
            141 => [
                'product_id' => 1158,
                'related_product_id' => 1159,
            ],
            142 => [
                'product_id' => 1158,
                'related_product_id' => 1166,
            ],
            143 => [
                'product_id' => 1158,
                'related_product_id' => 1165,
            ],
            144 => [
                'product_id' => 1157,
                'related_product_id' => 1170,
            ],
            145 => [
                'product_id' => 1157,
                'related_product_id' => 1177,
            ],
            146 => [
                'product_id' => 1157,
                'related_product_id' => 1181,
            ],
            147 => [
                'product_id' => 1156,
                'related_product_id' => 1152,
            ],
            148 => [
                'product_id' => 1156,
                'related_product_id' => 1150,
            ],
            149 => [
                'product_id' => 1156,
                'related_product_id' => 1147,
            ],
            150 => [
                'product_id' => 1155,
                'related_product_id' => 1166,
            ],
            151 => [
                'product_id' => 1155,
                'related_product_id' => 1154,
            ],
            152 => [
                'product_id' => 1155,
                'related_product_id' => 1153,
            ],
            153 => [
                'product_id' => 1154,
                'related_product_id' => 1153,
            ],
            154 => [
                'product_id' => 1154,
                'related_product_id' => 1155,
            ],
            155 => [
                'product_id' => 1154,
                'related_product_id' => 1166,
            ],
            156 => [
                'product_id' => 1153,
                'related_product_id' => 1154,
            ],
            157 => [
                'product_id' => 1153,
                'related_product_id' => 1155,
            ],
            158 => [
                'product_id' => 1153,
                'related_product_id' => 1165,
            ],
            159 => [
                'product_id' => 1152,
                'related_product_id' => 1189,
            ],
            160 => [
                'product_id' => 1152,
                'related_product_id' => 1191,
            ],
            161 => [
                'product_id' => 1152,
                'related_product_id' => 1147,
            ],
            162 => [
                'product_id' => 1151,
                'related_product_id' => 1155,
            ],
            163 => [
                'product_id' => 1151,
                'related_product_id' => 1154,
            ],
            164 => [
                'product_id' => 1151,
                'related_product_id' => 1153,
            ],
            165 => [
                'product_id' => 1150,
                'related_product_id' => 1156,
            ],
            166 => [
                'product_id' => 1150,
                'related_product_id' => 1189,
            ],
            167 => [
                'product_id' => 1150,
                'related_product_id' => 1191,
            ],
            168 => [
                'product_id' => 1149,
                'related_product_id' => 1142,
            ],
            169 => [
                'product_id' => 1149,
                'related_product_id' => 1147,
            ],
            170 => [
                'product_id' => 1149,
                'related_product_id' => 1152,
            ],
            171 => [
                'product_id' => 1148,
                'related_product_id' => 1150,
            ],
            172 => [
                'product_id' => 1148,
                'related_product_id' => 1187,
            ],
            173 => [
                'product_id' => 1148,
                'related_product_id' => 1196,
            ],
            174 => [
                'product_id' => 1147,
                'related_product_id' => 1148,
            ],
            175 => [
                'product_id' => 1147,
                'related_product_id' => 1152,
            ],
            176 => [
                'product_id' => 1147,
                'related_product_id' => 1156,
            ],
            177 => [
                'product_id' => 1146,
                'related_product_id' => 1144,
            ],
            178 => [
                'product_id' => 1146,
                'related_product_id' => 1141,
            ],
            179 => [
                'product_id' => 1146,
                'related_product_id' => 1153,
            ],
            180 => [
                'product_id' => 1145,
                'related_product_id' => 1151,
            ],
            181 => [
                'product_id' => 1145,
                'related_product_id' => 1155,
            ],
            182 => [
                'product_id' => 1145,
                'related_product_id' => 1141,
            ],
            183 => [
                'product_id' => 1144,
                'related_product_id' => 1141,
            ],
            184 => [
                'product_id' => 1144,
                'related_product_id' => 1146,
            ],
            185 => [
                'product_id' => 1144,
                'related_product_id' => 1153,
            ],
            186 => [
                'product_id' => 1143,
                'related_product_id' => 1147,
            ],
            187 => [
                'product_id' => 1143,
                'related_product_id' => 1152,
            ],
            188 => [
                'product_id' => 1143,
                'related_product_id' => 1188,
            ],
            189 => [
                'product_id' => 1142,
                'related_product_id' => 1143,
            ],
            190 => [
                'product_id' => 1142,
                'related_product_id' => 1150,
            ],
            191 => [
                'product_id' => 1142,
                'related_product_id' => 1147,
            ],
            192 => [
                'product_id' => 1141,
                'related_product_id' => 1144,
            ],
            193 => [
                'product_id' => 1141,
                'related_product_id' => 1146,
            ],
            194 => [
                'product_id' => 1141,
                'related_product_id' => 1152,
            ],
            195 => [
                'product_id' => 1140,
                'related_product_id' => 1139,
            ],
            196 => [
                'product_id' => 1139,
                'related_product_id' => 1140,
            ],
            197 => [
                'product_id' => 1138,
                'related_product_id' => 1140,
            ],
            198 => [
                'product_id' => 1138,
                'related_product_id' => 1139,
            ],
            199 => [
                'product_id' => 1137,
                'related_product_id' => 1140,
            ],
            200 => [
                'product_id' => 1137,
                'related_product_id' => 1139,
            ],
            201 => [
                'product_id' => 1137,
                'related_product_id' => 1138,
            ],
            202 => [
                'product_id' => 1136,
                'related_product_id' => 1137,
            ],
            203 => [
                'product_id' => 1136,
                'related_product_id' => 1139,
            ],
            204 => [
                'product_id' => 1136,
                'related_product_id' => 1138,
            ],
            205 => [
                'product_id' => 1135,
                'related_product_id' => 1137,
            ],
            206 => [
                'product_id' => 1135,
                'related_product_id' => 1136,
            ],
            207 => [
                'product_id' => 1135,
                'related_product_id' => 1139,
            ],
            208 => [
                'product_id' => 1140,
                'related_product_id' => 1138,
            ],
            209 => [
                'product_id' => 1140,
                'related_product_id' => 1137,
            ],
            210 => [
                'product_id' => 1139,
                'related_product_id' => 1138,
            ],
            211 => [
                'product_id' => 1139,
                'related_product_id' => 1139,
            ],
            212 => [
                'product_id' => 1138,
                'related_product_id' => 1137,
            ],
            213 => [
                'product_id' => 1130,
                'related_product_id' => 1200,
            ],
            214 => [
                'product_id' => 1130,
                'related_product_id' => 1202,
            ],
            215 => [
                'product_id' => 1130,
                'related_product_id' => 1201,
            ],
            216 => [
                'product_id' => 1131,
                'related_product_id' => 1158,
            ],
            217 => [
                'product_id' => 1131,
                'related_product_id' => 1192,
            ],
            218 => [
                'product_id' => 1131,
                'related_product_id' => 1142,
            ],
            219 => [
                'product_id' => 1132,
                'related_product_id' => 1199,
            ],
            220 => [
                'product_id' => 1132,
                'related_product_id' => 1146,
            ],
            221 => [
                'product_id' => 1132,
                'related_product_id' => 1147,
            ],
            222 => [
                'product_id' => 1133,
                'related_product_id' => 1185,
            ],
            223 => [
                'product_id' => 1133,
                'related_product_id' => 1176,
            ],
            224 => [
                'product_id' => 1133,
                'related_product_id' => 1184,
            ],
            225 => [
                'product_id' => 1134,
                'related_product_id' => 1142,
            ],
            226 => [
                'product_id' => 1134,
                'related_product_id' => 1131,
            ],
            227 => [
                'product_id' => 1134,
                'related_product_id' => 1149,
            ],
        ]);

    }
}
