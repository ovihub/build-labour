<?php

use Illuminate\Database\Seeder;

class UserTicketsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_tickets')->delete();
        
        \DB::table('user_tickets')->insert(array (
            0 => 
            array (
                'id' => 8,
                'user_id' => 8,
                'ticket_id' => 2,
            ),
            1 => 
            array (
                'id' => 9,
                'user_id' => 8,
                'ticket_id' => 1,
            ),
            2 => 
            array (
                'id' => 10,
                'user_id' => 17,
                'ticket_id' => 2,
            ),
            3 => 
            array (
                'id' => 11,
                'user_id' => 17,
                'ticket_id' => 1,
            ),
            4 => 
            array (
                'id' => 19,
                'user_id' => 20,
                'ticket_id' => 8,
            ),
            5 => 
            array (
                'id' => 22,
                'user_id' => 36,
                'ticket_id' => 120,
            ),
            6 => 
            array (
                'id' => 23,
                'user_id' => 36,
                'ticket_id' => 8,
            ),
            7 => 
            array (
                'id' => 24,
                'user_id' => 37,
                'ticket_id' => 135,
            ),
            8 => 
            array (
                'id' => 28,
                'user_id' => 38,
                'ticket_id' => 139,
            ),
            9 => 
            array (
                'id' => 32,
                'user_id' => 106,
                'ticket_id' => 143,
            ),
            10 => 
            array (
                'id' => 33,
                'user_id' => 106,
                'ticket_id' => 144,
            ),
            11 => 
            array (
                'id' => 39,
                'user_id' => 224,
                'ticket_id' => 33,
            ),
            12 => 
            array (
                'id' => 40,
                'user_id' => 224,
                'ticket_id' => 5,
            ),
            13 => 
            array (
                'id' => 41,
                'user_id' => 224,
                'ticket_id' => 2,
            ),
            14 => 
            array (
                'id' => 42,
                'user_id' => 230,
                'ticket_id' => 4,
            ),
            15 => 
            array (
                'id' => 43,
                'user_id' => 27,
                'ticket_id' => 145,
            ),
            16 => 
            array (
                'id' => 44,
                'user_id' => 95,
                'ticket_id' => 146,
            ),
            17 => 
            array (
                'id' => 45,
                'user_id' => 95,
                'ticket_id' => 147,
            ),
            18 => 
            array (
                'id' => 46,
                'user_id' => 165,
                'ticket_id' => 149,
            ),
            19 => 
            array (
                'id' => 47,
                'user_id' => 165,
                'ticket_id' => 81,
            ),
            20 => 
            array (
                'id' => 48,
                'user_id' => 165,
                'ticket_id' => 148,
            ),
            21 => 
            array (
                'id' => 49,
                'user_id' => 165,
                'ticket_id' => 128,
            ),
            22 => 
            array (
                'id' => 50,
                'user_id' => 165,
                'ticket_id' => 120,
            ),
            23 => 
            array (
                'id' => 51,
                'user_id' => 177,
                'ticket_id' => 42,
            ),
            24 => 
            array (
                'id' => 52,
                'user_id' => 177,
                'ticket_id' => 84,
            ),
            25 => 
            array (
                'id' => 53,
                'user_id' => 177,
                'ticket_id' => 150,
            ),
            26 => 
            array (
                'id' => 54,
                'user_id' => 240,
                'ticket_id' => 1,
            ),
            27 => 
            array (
                'id' => 55,
                'user_id' => 248,
                'ticket_id' => 145,
            ),
            28 => 
            array (
                'id' => 56,
                'user_id' => 248,
                'ticket_id' => 151,
            ),
            29 => 
            array (
                'id' => 57,
                'user_id' => 248,
                'ticket_id' => 152,
            ),
            30 => 
            array (
                'id' => 58,
                'user_id' => 248,
                'ticket_id' => 153,
            ),
            31 => 
            array (
                'id' => 59,
                'user_id' => 221,
                'ticket_id' => 1,
            ),
            32 => 
            array (
                'id' => 92,
                'user_id' => 1,
                'ticket_id' => 29,
            ),
            33 => 
            array (
                'id' => 93,
                'user_id' => 1,
                'ticket_id' => 23,
            ),
            34 => 
            array (
                'id' => 94,
                'user_id' => 1,
                'ticket_id' => 17,
            ),
            35 => 
            array (
                'id' => 95,
                'user_id' => 1,
                'ticket_id' => 5,
            ),
            36 => 
            array (
                'id' => 96,
                'user_id' => 1,
                'ticket_id' => 2,
            ),
            37 => 
            array (
                'id' => 97,
                'user_id' => 1,
                'ticket_id' => 1,
            ),
            38 => 
            array (
                'id' => 98,
                'user_id' => 266,
                'ticket_id' => 1,
            ),
            39 => 
            array (
                'id' => 99,
                'user_id' => 271,
                'ticket_id' => 155,
            ),
            40 => 
            array (
                'id' => 100,
                'user_id' => 273,
                'ticket_id' => 1,
            ),
            41 => 
            array (
                'id' => 101,
                'user_id' => 274,
                'ticket_id' => 90,
            ),
            42 => 
            array (
                'id' => 102,
                'user_id' => 274,
                'ticket_id' => 148,
            ),
            43 => 
            array (
                'id' => 103,
                'user_id' => 274,
                'ticket_id' => 8,
            ),
            44 => 
            array (
                'id' => 104,
                'user_id' => 254,
                'ticket_id' => 7,
            ),
            45 => 
            array (
                'id' => 105,
                'user_id' => 254,
                'ticket_id' => 48,
            ),
            46 => 
            array (
                'id' => 106,
                'user_id' => 254,
                'ticket_id' => 90,
            ),
            47 => 
            array (
                'id' => 107,
                'user_id' => 254,
                'ticket_id' => 2,
            ),
            48 => 
            array (
                'id' => 108,
                'user_id' => 254,
                'ticket_id' => 148,
            ),
            49 => 
            array (
                'id' => 109,
                'user_id' => 254,
                'ticket_id' => 144,
            ),
            50 => 
            array (
                'id' => 110,
                'user_id' => 254,
                'ticket_id' => 121,
            ),
            51 => 
            array (
                'id' => 111,
                'user_id' => 254,
                'ticket_id' => 120,
            ),
            52 => 
            array (
                'id' => 112,
                'user_id' => 254,
                'ticket_id' => 8,
            ),
            53 => 
            array (
                'id' => 113,
                'user_id' => 289,
                'ticket_id' => 1,
            ),
            54 => 
            array (
                'id' => 114,
                'user_id' => 292,
                'ticket_id' => 156,
            ),
            55 => 
            array (
                'id' => 115,
                'user_id' => 296,
                'ticket_id' => 159,
            ),
            56 => 
            array (
                'id' => 116,
                'user_id' => 296,
                'ticket_id' => 160,
            ),
            57 => 
            array (
                'id' => 117,
                'user_id' => 296,
                'ticket_id' => 161,
            ),
            58 => 
            array (
                'id' => 118,
                'user_id' => 296,
                'ticket_id' => 7,
            ),
            59 => 
            array (
                'id' => 119,
                'user_id' => 296,
                'ticket_id' => 162,
            ),
            60 => 
            array (
                'id' => 120,
                'user_id' => 296,
                'ticket_id' => 4,
            ),
            61 => 
            array (
                'id' => 121,
                'user_id' => 300,
                'ticket_id' => 163,
            ),
            62 => 
            array (
                'id' => 122,
                'user_id' => 300,
                'ticket_id' => 10,
            ),
            63 => 
            array (
                'id' => 123,
                'user_id' => 300,
                'ticket_id' => 120,
            ),
            64 => 
            array (
                'id' => 124,
                'user_id' => 300,
                'ticket_id' => 8,
            ),
            65 => 
            array (
                'id' => 125,
                'user_id' => 314,
                'ticket_id' => 155,
            ),
            66 => 
            array (
                'id' => 126,
                'user_id' => 320,
                'ticket_id' => 82,
            ),
            67 => 
            array (
                'id' => 127,
                'user_id' => 320,
                'ticket_id' => 30,
            ),
            68 => 
            array (
                'id' => 128,
                'user_id' => 320,
                'ticket_id' => 9,
            ),
            69 => 
            array (
                'id' => 129,
                'user_id' => 330,
                'ticket_id' => 164,
            ),
            70 => 
            array (
                'id' => 130,
                'user_id' => 332,
                'ticket_id' => 165,
            ),
            71 => 
            array (
                'id' => 131,
                'user_id' => 332,
                'ticket_id' => 166,
            ),
            72 => 
            array (
                'id' => 137,
                'user_id' => 344,
                'ticket_id' => 35,
            ),
            73 => 
            array (
                'id' => 138,
                'user_id' => 344,
                'ticket_id' => 84,
            ),
            74 => 
            array (
                'id' => 139,
                'user_id' => 344,
                'ticket_id' => 148,
            ),
            75 => 
            array (
                'id' => 140,
                'user_id' => 355,
                'ticket_id' => 30,
            ),
            76 => 
            array (
                'id' => 141,
                'user_id' => 358,
                'ticket_id' => 167,
            ),
            77 => 
            array (
                'id' => 147,
                'user_id' => 367,
                'ticket_id' => 173,
            ),
            78 => 
            array (
                'id' => 148,
                'user_id' => 367,
                'ticket_id' => 155,
            ),
            79 => 
            array (
                'id' => 149,
                'user_id' => 367,
                'ticket_id' => 148,
            ),
            80 => 
            array (
                'id' => 150,
                'user_id' => 367,
                'ticket_id' => 77,
            ),
            81 => 
            array (
                'id' => 151,
                'user_id' => 367,
                'ticket_id' => 144,
            ),
            82 => 
            array (
                'id' => 152,
                'user_id' => 372,
                'ticket_id' => 175,
            ),
            83 => 
            array (
                'id' => 153,
                'user_id' => 372,
                'ticket_id' => 144,
            ),
            84 => 
            array (
                'id' => 154,
                'user_id' => 395,
                'ticket_id' => 178,
            ),
            85 => 
            array (
                'id' => 155,
                'user_id' => 397,
                'ticket_id' => 90,
            ),
            86 => 
            array (
                'id' => 156,
                'user_id' => 397,
                'ticket_id' => 53,
            ),
            87 => 
            array (
                'id' => 157,
                'user_id' => 397,
                'ticket_id' => 179,
            ),
            88 => 
            array (
                'id' => 158,
                'user_id' => 397,
                'ticket_id' => 180,
            ),
            89 => 
            array (
                'id' => 159,
                'user_id' => 397,
                'ticket_id' => 181,
            ),
            90 => 
            array (
                'id' => 160,
                'user_id' => 397,
                'ticket_id' => 182,
            ),
            91 => 
            array (
                'id' => 161,
                'user_id' => 397,
                'ticket_id' => 75,
            ),
            92 => 
            array (
                'id' => 162,
                'user_id' => 400,
                'ticket_id' => 82,
            ),
            93 => 
            array (
                'id' => 163,
                'user_id' => 400,
                'ticket_id' => 90,
            ),
            94 => 
            array (
                'id' => 164,
                'user_id' => 400,
                'ticket_id' => 186,
            ),
            95 => 
            array (
                'id' => 165,
                'user_id' => 41,
                'ticket_id' => 176,
            ),
            96 => 
            array (
                'id' => 166,
                'user_id' => 41,
                'ticket_id' => 148,
            ),
            97 => 
            array (
                'id' => 167,
                'user_id' => 41,
                'ticket_id' => 177,
            ),
            98 => 
            array (
                'id' => 168,
                'user_id' => 413,
                'ticket_id' => 145,
            ),
            99 => 
            array (
                'id' => 169,
                'user_id' => 413,
                'ticket_id' => 187,
            ),
            100 => 
            array (
                'id' => 170,
                'user_id' => 421,
                'ticket_id' => 90,
            ),
            101 => 
            array (
                'id' => 179,
                'user_id' => 406,
                'ticket_id' => 186,
            ),
            102 => 
            array (
                'id' => 180,
                'user_id' => 406,
                'ticket_id' => 90,
            ),
            103 => 
            array (
                'id' => 181,
                'user_id' => 406,
                'ticket_id' => 86,
            ),
            104 => 
            array (
                'id' => 182,
                'user_id' => 406,
                'ticket_id' => 82,
            ),
            105 => 
            array (
                'id' => 183,
                'user_id' => 406,
                'ticket_id' => 8,
            ),
            106 => 
            array (
                'id' => 184,
                'user_id' => 406,
                'ticket_id' => 120,
            ),
            107 => 
            array (
                'id' => 185,
                'user_id' => 406,
                'ticket_id' => 190,
            ),
            108 => 
            array (
                'id' => 186,
                'user_id' => 423,
                'ticket_id' => 192,
            ),
            109 => 
            array (
                'id' => 187,
                'user_id' => 425,
                'ticket_id' => 90,
            ),
            110 => 
            array (
                'id' => 188,
                'user_id' => 437,
                'ticket_id' => 143,
            ),
            111 => 
            array (
                'id' => 189,
                'user_id' => 437,
                'ticket_id' => 193,
            ),
            112 => 
            array (
                'id' => 190,
                'user_id' => 437,
                'ticket_id' => 5,
            ),
            113 => 
            array (
                'id' => 191,
                'user_id' => 437,
                'ticket_id' => 121,
            ),
            114 => 
            array (
                'id' => 192,
                'user_id' => 437,
                'ticket_id' => 1,
            ),
            115 => 
            array (
                'id' => 193,
                'user_id' => 437,
                'ticket_id' => 150,
            ),
            116 => 
            array (
                'id' => 194,
                'user_id' => 437,
                'ticket_id' => 186,
            ),
            117 => 
            array (
                'id' => 195,
                'user_id' => 437,
                'ticket_id' => 144,
            ),
            118 => 
            array (
                'id' => 196,
                'user_id' => 440,
                'ticket_id' => 177,
            ),
            119 => 
            array (
                'id' => 197,
                'user_id' => 441,
                'ticket_id' => 194,
            ),
            120 => 
            array (
                'id' => 198,
                'user_id' => 449,
                'ticket_id' => 242,
            ),
            121 => 
            array (
                'id' => 199,
                'user_id' => 449,
                'ticket_id' => 243,
            ),
            122 => 
            array (
                'id' => 200,
                'user_id' => 449,
                'ticket_id' => 244,
            ),
            123 => 
            array (
                'id' => 203,
                'user_id' => 471,
                'ticket_id' => 119,
            ),
            124 => 
            array (
                'id' => 204,
                'user_id' => 471,
                'ticket_id' => 35,
            ),
            125 => 
            array (
                'id' => 205,
                'user_id' => 475,
                'ticket_id' => 245,
            ),
            126 => 
            array (
                'id' => 206,
                'user_id' => 476,
                'ticket_id' => 177,
            ),
            127 => 
            array (
                'id' => 211,
                'user_id' => 483,
                'ticket_id' => 4,
            ),
            128 => 
            array (
                'id' => 212,
                'user_id' => 483,
                'ticket_id' => 56,
            ),
            129 => 
            array (
                'id' => 213,
                'user_id' => 483,
                'ticket_id' => 71,
            ),
            130 => 
            array (
                'id' => 214,
                'user_id' => 483,
                'ticket_id' => 68,
            ),
            131 => 
            array (
                'id' => 215,
                'user_id' => 485,
                'ticket_id' => 246,
            ),
            132 => 
            array (
                'id' => 216,
                'user_id' => 486,
                'ticket_id' => 82,
            ),
            133 => 
            array (
                'id' => 217,
                'user_id' => 486,
                'ticket_id' => 2,
            ),
            134 => 
            array (
                'id' => 218,
                'user_id' => 492,
                'ticket_id' => 176,
            ),
            135 => 
            array (
                'id' => 219,
                'user_id' => 498,
                'ticket_id' => 161,
            ),
            136 => 
            array (
                'id' => 220,
                'user_id' => 498,
                'ticket_id' => 144,
            ),
            137 => 
            array (
                'id' => 221,
                'user_id' => 499,
                'ticket_id' => 176,
            ),
            138 => 
            array (
                'id' => 222,
                'user_id' => 506,
                'ticket_id' => 82,
            ),
            139 => 
            array (
                'id' => 223,
                'user_id' => 506,
                'ticket_id' => 148,
            ),
            140 => 
            array (
                'id' => 224,
                'user_id' => 506,
                'ticket_id' => 139,
            ),
            141 => 
            array (
                'id' => 225,
                'user_id' => 511,
                'ticket_id' => 120,
            ),
            142 => 
            array (
                'id' => 226,
                'user_id' => 511,
                'ticket_id' => 148,
            ),
            143 => 
            array (
                'id' => 227,
                'user_id' => 511,
                'ticket_id' => 186,
            ),
            144 => 
            array (
                'id' => 228,
                'user_id' => 514,
                'ticket_id' => 152,
            ),
            145 => 
            array (
                'id' => 229,
                'user_id' => 514,
                'ticket_id' => 150,
            ),
            146 => 
            array (
                'id' => 230,
                'user_id' => 514,
                'ticket_id' => 144,
            ),
            147 => 
            array (
                'id' => 231,
                'user_id' => 514,
                'ticket_id' => 177,
            ),
            148 => 
            array (
                'id' => 232,
                'user_id' => 514,
                'ticket_id' => 8,
            ),
            149 => 
            array (
                'id' => 233,
                'user_id' => 521,
                'ticket_id' => 139,
            ),
            150 => 
            array (
                'id' => 234,
                'user_id' => 521,
                'ticket_id' => 121,
            ),
            151 => 
            array (
                'id' => 235,
                'user_id' => 521,
                'ticket_id' => 35,
            ),
            152 => 
            array (
                'id' => 236,
                'user_id' => 521,
                'ticket_id' => 57,
            ),
            153 => 
            array (
                'id' => 237,
                'user_id' => 541,
                'ticket_id' => 90,
            ),
            154 => 
            array (
                'id' => 238,
                'user_id' => 543,
                'ticket_id' => 120,
            ),
            155 => 
            array (
                'id' => 239,
                'user_id' => 543,
                'ticket_id' => 251,
            ),
            156 => 
            array (
                'id' => 240,
                'user_id' => 543,
                'ticket_id' => 252,
            ),
            157 => 
            array (
                'id' => 241,
                'user_id' => 543,
                'ticket_id' => 177,
            ),
            158 => 
            array (
                'id' => 242,
                'user_id' => 566,
                'ticket_id' => 120,
            ),
            159 => 
            array (
                'id' => 243,
                'user_id' => 567,
                'ticket_id' => 245,
            ),
            160 => 
            array (
                'id' => 244,
                'user_id' => 567,
                'ticket_id' => 120,
            ),
            161 => 
            array (
                'id' => 245,
                'user_id' => 568,
                'ticket_id' => 253,
            ),
            162 => 
            array (
                'id' => 246,
                'user_id' => 568,
                'ticket_id' => 254,
            ),
            163 => 
            array (
                'id' => 247,
                'user_id' => 572,
                'ticket_id' => 56,
            ),
            164 => 
            array (
                'id' => 248,
                'user_id' => 572,
                'ticket_id' => 71,
            ),
            165 => 
            array (
                'id' => 249,
                'user_id' => 572,
                'ticket_id' => 166,
            ),
            166 => 
            array (
                'id' => 250,
                'user_id' => 572,
                'ticket_id' => 182,
            ),
            167 => 
            array (
                'id' => 251,
                'user_id' => 579,
                'ticket_id' => 255,
            ),
            168 => 
            array (
                'id' => 252,
                'user_id' => 592,
                'ticket_id' => 144,
            ),
            169 => 
            array (
                'id' => 253,
                'user_id' => 593,
                'ticket_id' => 3,
            ),
            170 => 
            array (
                'id' => 254,
                'user_id' => 607,
                'ticket_id' => 256,
            ),
            171 => 
            array (
                'id' => 255,
                'user_id' => 607,
                'ticket_id' => 257,
            ),
            172 => 
            array (
                'id' => 256,
                'user_id' => 619,
                'ticket_id' => 38,
            ),
            173 => 
            array (
                'id' => 257,
                'user_id' => 630,
                'ticket_id' => 120,
            ),
            174 => 
            array (
                'id' => 258,
                'user_id' => 630,
                'ticket_id' => 144,
            ),
            175 => 
            array (
                'id' => 259,
                'user_id' => 633,
                'ticket_id' => 177,
            ),
            176 => 
            array (
                'id' => 260,
                'user_id' => 633,
                'ticket_id' => 310,
            ),
            177 => 
            array (
                'id' => 261,
                'user_id' => 634,
                'ticket_id' => 148,
            ),
            178 => 
            array (
                'id' => 262,
                'user_id' => 634,
                'ticket_id' => 2,
            ),
            179 => 
            array (
                'id' => 263,
                'user_id' => 634,
                'ticket_id' => 5,
            ),
            180 => 
            array (
                'id' => 264,
                'user_id' => 634,
                'ticket_id' => 7,
            ),
            181 => 
            array (
                'id' => 267,
                'user_id' => 639,
                'ticket_id' => 8,
            ),
            182 => 
            array (
                'id' => 268,
                'user_id' => 639,
                'ticket_id' => 120,
            ),
            183 => 
            array (
                'id' => 269,
                'user_id' => 640,
                'ticket_id' => 148,
            ),
            184 => 
            array (
                'id' => 270,
                'user_id' => 640,
                'ticket_id' => 2,
            ),
            185 => 
            array (
                'id' => 271,
                'user_id' => 640,
                'ticket_id' => 8,
            ),
            186 => 
            array (
                'id' => 272,
                'user_id' => 640,
                'ticket_id' => 120,
            ),
            187 => 
            array (
                'id' => 273,
                'user_id' => 645,
                'ticket_id' => 177,
            ),
            188 => 
            array (
                'id' => 274,
                'user_id' => 645,
                'ticket_id' => 120,
            ),
            189 => 
            array (
                'id' => 276,
                'user_id' => 646,
                'ticket_id' => 148,
            ),
            190 => 
            array (
                'id' => 277,
                'user_id' => 646,
                'ticket_id' => 311,
            ),
            191 => 
            array (
                'id' => 278,
                'user_id' => 646,
                'ticket_id' => 120,
            ),
            192 => 
            array (
                'id' => 279,
                'user_id' => 646,
                'ticket_id' => 8,
            ),
            193 => 
            array (
                'id' => 280,
                'user_id' => 654,
                'ticket_id' => 312,
            ),
            194 => 
            array (
                'id' => 281,
                'user_id' => 654,
                'ticket_id' => 121,
            ),
            195 => 
            array (
                'id' => 283,
                'user_id' => 664,
                'ticket_id' => 150,
            ),
            196 => 
            array (
                'id' => 284,
                'user_id' => 664,
                'ticket_id' => 8,
            ),
            197 => 
            array (
                'id' => 285,
                'user_id' => 663,
                'ticket_id' => 313,
            ),
            198 => 
            array (
                'id' => 286,
                'user_id' => 666,
                'ticket_id' => 121,
            ),
            199 => 
            array (
                'id' => 287,
                'user_id' => 670,
                'ticket_id' => 314,
            ),
            200 => 
            array (
                'id' => 288,
                'user_id' => 670,
                'ticket_id' => 151,
            ),
            201 => 
            array (
                'id' => 289,
                'user_id' => 670,
                'ticket_id' => 165,
            ),
            202 => 
            array (
                'id' => 294,
                'user_id' => 686,
                'ticket_id' => 316,
            ),
            203 => 
            array (
                'id' => 295,
                'user_id' => 686,
                'ticket_id' => 244,
            ),
            204 => 
            array (
                'id' => 296,
                'user_id' => 691,
                'ticket_id' => 8,
            ),
            205 => 
            array (
                'id' => 297,
                'user_id' => 691,
                'ticket_id' => 4,
            ),
            206 => 
            array (
                'id' => 298,
                'user_id' => 691,
                'ticket_id' => 1,
            ),
            207 => 
            array (
                'id' => 299,
                'user_id' => 703,
                'ticket_id' => 317,
            ),
            208 => 
            array (
                'id' => 300,
                'user_id' => 704,
                'ticket_id' => 176,
            ),
            209 => 
            array (
                'id' => 304,
                'user_id' => 694,
                'ticket_id' => 120,
            ),
            210 => 
            array (
                'id' => 305,
                'user_id' => 694,
                'ticket_id' => 177,
            ),
            211 => 
            array (
                'id' => 306,
                'user_id' => 694,
                'ticket_id' => 90,
            ),
            212 => 
            array (
                'id' => 307,
                'user_id' => 694,
                'ticket_id' => 48,
            ),
            213 => 
            array (
                'id' => 310,
                'user_id' => 727,
                'ticket_id' => 30,
            ),
            214 => 
            array (
                'id' => 311,
                'user_id' => 727,
                'ticket_id' => 53,
            ),
            215 => 
            array (
                'id' => 312,
                'user_id' => 728,
                'ticket_id' => 1,
            ),
            216 => 
            array (
                'id' => 313,
                'user_id' => 731,
                'ticket_id' => 176,
            ),
            217 => 
            array (
                'id' => 314,
                'user_id' => 735,
                'ticket_id' => 87,
            ),
            218 => 
            array (
                'id' => 315,
                'user_id' => 669,
                'ticket_id' => 318,
            ),
            219 => 
            array (
                'id' => 316,
                'user_id' => 669,
                'ticket_id' => 3,
            ),
            220 => 
            array (
                'id' => 317,
                'user_id' => 762,
                'ticket_id' => 120,
            ),
            221 => 
            array (
                'id' => 318,
                'user_id' => 762,
                'ticket_id' => 30,
            ),
            222 => 
            array (
                'id' => 319,
                'user_id' => 762,
                'ticket_id' => 8,
            ),
            223 => 
            array (
                'id' => 320,
                'user_id' => 767,
                'ticket_id' => 44,
            ),
            224 => 
            array (
                'id' => 321,
                'user_id' => 767,
                'ticket_id' => 32,
            ),
            225 => 
            array (
                'id' => 322,
                'user_id' => 767,
                'ticket_id' => 7,
            ),
            226 => 
            array (
                'id' => 323,
                'user_id' => 772,
                'ticket_id' => 176,
            ),
            227 => 
            array (
                'id' => 324,
                'user_id' => 771,
                'ticket_id' => 341,
            ),
            228 => 
            array (
                'id' => 325,
                'user_id' => 780,
                'ticket_id' => 90,
            ),
            229 => 
            array (
                'id' => 326,
                'user_id' => 780,
                'ticket_id' => 117,
            ),
            230 => 
            array (
                'id' => 327,
                'user_id' => 795,
                'ticket_id' => 120,
            ),
            231 => 
            array (
                'id' => 328,
                'user_id' => 795,
                'ticket_id' => 8,
            ),
            232 => 
            array (
                'id' => 329,
                'user_id' => 796,
                'ticket_id' => 90,
            ),
            233 => 
            array (
                'id' => 330,
                'user_id' => 797,
                'ticket_id' => 342,
            ),
            234 => 
            array (
                'id' => 331,
                'user_id' => 800,
                'ticket_id' => 144,
            ),
            235 => 
            array (
                'id' => 332,
                'user_id' => 803,
                'ticket_id' => 346,
            ),
            236 => 
            array (
                'id' => 333,
                'user_id' => 803,
                'ticket_id' => 347,
            ),
            237 => 
            array (
                'id' => 334,
                'user_id' => 803,
                'ticket_id' => 348,
            ),
            238 => 
            array (
                'id' => 335,
                'user_id' => 803,
                'ticket_id' => 349,
            ),
            239 => 
            array (
                'id' => 336,
                'user_id' => 803,
                'ticket_id' => 151,
            ),
            240 => 
            array (
                'id' => 337,
                'user_id' => 805,
                'ticket_id' => 2,
            ),
            241 => 
            array (
                'id' => 338,
                'user_id' => 805,
                'ticket_id' => 148,
            ),
            242 => 
            array (
                'id' => 339,
                'user_id' => 805,
                'ticket_id' => 28,
            ),
            243 => 
            array (
                'id' => 340,
                'user_id' => 805,
                'ticket_id' => 1,
            ),
            244 => 
            array (
                'id' => 341,
                'user_id' => 823,
                'ticket_id' => 350,
            ),
            245 => 
            array (
                'id' => 342,
                'user_id' => 823,
                'ticket_id' => 351,
            ),
            246 => 
            array (
                'id' => 344,
                'user_id' => 827,
                'ticket_id' => 128,
            ),
            247 => 
            array (
                'id' => 345,
                'user_id' => 827,
                'ticket_id' => 45,
            ),
            248 => 
            array (
                'id' => 346,
                'user_id' => 828,
                'ticket_id' => 145,
            ),
            249 => 
            array (
                'id' => 347,
                'user_id' => 828,
                'ticket_id' => 68,
            ),
            250 => 
            array (
                'id' => 348,
                'user_id' => 828,
                'ticket_id' => 352,
            ),
            251 => 
            array (
                'id' => 349,
                'user_id' => 828,
                'ticket_id' => 56,
            ),
            252 => 
            array (
                'id' => 350,
                'user_id' => 828,
                'ticket_id' => 5,
            ),
            253 => 
            array (
                'id' => 351,
                'user_id' => 828,
                'ticket_id' => 4,
            ),
            254 => 
            array (
                'id' => 352,
                'user_id' => 831,
                'ticket_id' => 86,
            ),
            255 => 
            array (
                'id' => 353,
                'user_id' => 833,
                'ticket_id' => 171,
            ),
            256 => 
            array (
                'id' => 354,
                'user_id' => 833,
                'ticket_id' => 8,
            ),
            257 => 
            array (
                'id' => 355,
                'user_id' => 833,
                'ticket_id' => 341,
            ),
            258 => 
            array (
                'id' => 356,
                'user_id' => 833,
                'ticket_id' => 177,
            ),
            259 => 
            array (
                'id' => 357,
                'user_id' => 834,
                'ticket_id' => 177,
            ),
            260 => 
            array (
                'id' => 358,
                'user_id' => 838,
                'ticket_id' => 121,
            ),
            261 => 
            array (
                'id' => 359,
                'user_id' => 838,
                'ticket_id' => 120,
            ),
            262 => 
            array (
                'id' => 365,
                'user_id' => 845,
                'ticket_id' => 356,
            ),
            263 => 
            array (
                'id' => 366,
                'user_id' => 845,
                'ticket_id' => 82,
            ),
            264 => 
            array (
                'id' => 367,
                'user_id' => 845,
                'ticket_id' => 355,
            ),
            265 => 
            array (
                'id' => 368,
                'user_id' => 845,
                'ticket_id' => 176,
            ),
            266 => 
            array (
                'id' => 369,
                'user_id' => 845,
                'ticket_id' => 90,
            ),
            267 => 
            array (
                'id' => 370,
                'user_id' => 849,
                'ticket_id' => 82,
            ),
            268 => 
            array (
                'id' => 371,
                'user_id' => 849,
                'ticket_id' => 30,
            ),
            269 => 
            array (
                'id' => 372,
                'user_id' => 849,
                'ticket_id' => 7,
            ),
            270 => 
            array (
                'id' => 373,
                'user_id' => 849,
                'ticket_id' => 356,
            ),
            271 => 
            array (
                'id' => 374,
                'user_id' => 855,
                'ticket_id' => 177,
            ),
            272 => 
            array (
                'id' => 375,
                'user_id' => 855,
                'ticket_id' => 355,
            ),
            273 => 
            array (
                'id' => 376,
                'user_id' => 855,
                'ticket_id' => 53,
            ),
            274 => 
            array (
                'id' => 377,
                'user_id' => 855,
                'ticket_id' => 50,
            ),
            275 => 
            array (
                'id' => 378,
                'user_id' => 860,
                'ticket_id' => 43,
            ),
            276 => 
            array (
                'id' => 379,
                'user_id' => 860,
                'ticket_id' => 7,
            ),
            277 => 
            array (
                'id' => 380,
                'user_id' => 871,
                'ticket_id' => 144,
            ),
            278 => 
            array (
                'id' => 381,
                'user_id' => 871,
                'ticket_id' => 357,
            ),
            279 => 
            array (
                'id' => 382,
                'user_id' => 885,
                'ticket_id' => 359,
            ),
            280 => 
            array (
                'id' => 383,
                'user_id' => 885,
                'ticket_id' => 360,
            ),
            281 => 
            array (
                'id' => 384,
                'user_id' => 899,
                'ticket_id' => 5,
            ),
            282 => 
            array (
                'id' => 385,
                'user_id' => 899,
                'ticket_id' => 7,
            ),
            283 => 
            array (
                'id' => 386,
                'user_id' => 899,
                'ticket_id' => 1,
            ),
            284 => 
            array (
                'id' => 387,
                'user_id' => 901,
                'ticket_id' => 87,
            ),
            285 => 
            array (
                'id' => 388,
                'user_id' => 901,
                'ticket_id' => 148,
            ),
            286 => 
            array (
                'id' => 389,
                'user_id' => 901,
                'ticket_id' => 8,
            ),
            287 => 
            array (
                'id' => 390,
                'user_id' => 901,
                'ticket_id' => 120,
            ),
        ));
        
        
    }
}