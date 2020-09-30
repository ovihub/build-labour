<?php

use Illuminate\Database\Seeder;

class UserSkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_skills')->delete();
        
        \DB::table('user_skills')->insert(array (
            0 => 
            array (
                'id' => 16,
                'user_id' => 17,
                'skill_id' => 8,
                'level_id' => 2,
            ),
            1 => 
            array (
                'id' => 17,
                'user_id' => 20,
                'skill_id' => 9,
                'level_id' => 2,
            ),
            2 => 
            array (
                'id' => 18,
                'user_id' => 20,
                'skill_id' => 10,
                'level_id' => 1,
            ),
            3 => 
            array (
                'id' => 19,
                'user_id' => 20,
                'skill_id' => 11,
                'level_id' => 3,
            ),
            4 => 
            array (
                'id' => 20,
                'user_id' => 20,
                'skill_id' => 12,
                'level_id' => 2,
            ),
            5 => 
            array (
                'id' => 21,
                'user_id' => 36,
                'skill_id' => 13,
                'level_id' => 3,
            ),
            6 => 
            array (
                'id' => 22,
                'user_id' => 36,
                'skill_id' => 14,
                'level_id' => 3,
            ),
            7 => 
            array (
                'id' => 23,
                'user_id' => 37,
                'skill_id' => 15,
                'level_id' => 2,
            ),
            8 => 
            array (
                'id' => 24,
                'user_id' => 38,
                'skill_id' => 16,
                'level_id' => 2,
            ),
            9 => 
            array (
                'id' => 25,
                'user_id' => 38,
                'skill_id' => 17,
                'level_id' => 2,
            ),
            10 => 
            array (
                'id' => 26,
                'user_id' => 38,
                'skill_id' => 18,
                'level_id' => 2,
            ),
            11 => 
            array (
                'id' => 27,
                'user_id' => 38,
                'skill_id' => 19,
                'level_id' => 2,
            ),
            12 => 
            array (
                'id' => 28,
                'user_id' => 38,
                'skill_id' => 20,
                'level_id' => 2,
            ),
            13 => 
            array (
                'id' => 29,
                'user_id' => 38,
                'skill_id' => 21,
                'level_id' => 2,
            ),
            14 => 
            array (
                'id' => 31,
                'user_id' => 106,
                'skill_id' => 22,
                'level_id' => 2,
            ),
            15 => 
            array (
                'id' => 32,
                'user_id' => 106,
                'skill_id' => 23,
                'level_id' => 2,
            ),
            16 => 
            array (
                'id' => 33,
                'user_id' => 106,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            17 => 
            array (
                'id' => 34,
                'user_id' => 106,
                'skill_id' => 25,
                'level_id' => 2,
            ),
            18 => 
            array (
                'id' => 35,
                'user_id' => 106,
                'skill_id' => 26,
                'level_id' => 2,
            ),
            19 => 
            array (
                'id' => 36,
                'user_id' => 106,
                'skill_id' => 27,
                'level_id' => 1,
            ),
            20 => 
            array (
                'id' => 37,
                'user_id' => 106,
                'skill_id' => 28,
                'level_id' => 2,
            ),
            21 => 
            array (
                'id' => 38,
                'user_id' => 1,
                'skill_id' => 29,
                'level_id' => 3,
            ),
            22 => 
            array (
                'id' => 39,
                'user_id' => 1,
                'skill_id' => 30,
                'level_id' => 3,
            ),
            23 => 
            array (
                'id' => 45,
                'user_id' => 95,
                'skill_id' => 36,
                'level_id' => 3,
            ),
            24 => 
            array (
                'id' => 46,
                'user_id' => 95,
                'skill_id' => 37,
                'level_id' => 3,
            ),
            25 => 
            array (
                'id' => 47,
                'user_id' => 95,
                'skill_id' => 38,
                'level_id' => 3,
            ),
            26 => 
            array (
                'id' => 48,
                'user_id' => 95,
                'skill_id' => 39,
                'level_id' => 2,
            ),
            27 => 
            array (
                'id' => 49,
                'user_id' => 164,
                'skill_id' => 14,
                'level_id' => 3,
            ),
            28 => 
            array (
                'id' => 50,
                'user_id' => 164,
                'skill_id' => 40,
                'level_id' => 2,
            ),
            29 => 
            array (
                'id' => 51,
                'user_id' => 165,
                'skill_id' => 41,
                'level_id' => 3,
            ),
            30 => 
            array (
                'id' => 52,
                'user_id' => 165,
                'skill_id' => 42,
                'level_id' => 3,
            ),
            31 => 
            array (
                'id' => 53,
                'user_id' => 165,
                'skill_id' => 43,
                'level_id' => 3,
            ),
            32 => 
            array (
                'id' => 54,
                'user_id' => 165,
                'skill_id' => 44,
                'level_id' => 3,
            ),
            33 => 
            array (
                'id' => 55,
                'user_id' => 165,
                'skill_id' => 45,
                'level_id' => 3,
            ),
            34 => 
            array (
                'id' => 56,
                'user_id' => 165,
                'skill_id' => 46,
                'level_id' => 3,
            ),
            35 => 
            array (
                'id' => 57,
                'user_id' => 240,
                'skill_id' => 47,
                'level_id' => 1,
            ),
            36 => 
            array (
                'id' => 58,
                'user_id' => 246,
                'skill_id' => 36,
                'level_id' => 2,
            ),
            37 => 
            array (
                'id' => 59,
                'user_id' => 246,
                'skill_id' => 48,
                'level_id' => 2,
            ),
            38 => 
            array (
                'id' => 60,
                'user_id' => 246,
                'skill_id' => 14,
                'level_id' => 2,
            ),
            39 => 
            array (
                'id' => 61,
                'user_id' => 246,
                'skill_id' => 49,
                'level_id' => 2,
            ),
            40 => 
            array (
                'id' => 62,
                'user_id' => 246,
                'skill_id' => 50,
                'level_id' => 1,
            ),
            41 => 
            array (
                'id' => 64,
                'user_id' => 248,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            42 => 
            array (
                'id' => 65,
                'user_id' => 253,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            43 => 
            array (
                'id' => 66,
                'user_id' => 253,
                'skill_id' => 51,
                'level_id' => 3,
            ),
            44 => 
            array (
                'id' => 67,
                'user_id' => 253,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            45 => 
            array (
                'id' => 68,
                'user_id' => 253,
                'skill_id' => 52,
                'level_id' => 3,
            ),
            46 => 
            array (
                'id' => 69,
                'user_id' => 253,
                'skill_id' => 53,
                'level_id' => 3,
            ),
            47 => 
            array (
                'id' => 70,
                'user_id' => 257,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            48 => 
            array (
                'id' => 71,
                'user_id' => 257,
                'skill_id' => 2,
                'level_id' => 2,
            ),
            49 => 
            array (
                'id' => 72,
                'user_id' => 257,
                'skill_id' => 54,
                'level_id' => 3,
            ),
            50 => 
            array (
                'id' => 73,
                'user_id' => 257,
                'skill_id' => 55,
                'level_id' => 3,
            ),
            51 => 
            array (
                'id' => 76,
                'user_id' => 265,
                'skill_id' => 56,
                'level_id' => 2,
            ),
            52 => 
            array (
                'id' => 77,
                'user_id' => 265,
                'skill_id' => 57,
                'level_id' => 1,
            ),
            53 => 
            array (
                'id' => 78,
                'user_id' => 265,
                'skill_id' => 58,
                'level_id' => 1,
            ),
            54 => 
            array (
                'id' => 79,
                'user_id' => 265,
                'skill_id' => 59,
                'level_id' => 1,
            ),
            55 => 
            array (
                'id' => 80,
                'user_id' => 265,
                'skill_id' => 60,
                'level_id' => 1,
            ),
            56 => 
            array (
                'id' => 81,
                'user_id' => 268,
                'skill_id' => 61,
                'level_id' => 2,
            ),
            57 => 
            array (
                'id' => 82,
                'user_id' => 268,
                'skill_id' => 62,
                'level_id' => 3,
            ),
            58 => 
            array (
                'id' => 83,
                'user_id' => 268,
                'skill_id' => 63,
                'level_id' => 2,
            ),
            59 => 
            array (
                'id' => 84,
                'user_id' => 268,
                'skill_id' => 64,
                'level_id' => 2,
            ),
            60 => 
            array (
                'id' => 85,
                'user_id' => 268,
                'skill_id' => 65,
                'level_id' => 2,
            ),
            61 => 
            array (
                'id' => 86,
                'user_id' => 268,
                'skill_id' => 66,
                'level_id' => 2,
            ),
            62 => 
            array (
                'id' => 87,
                'user_id' => 268,
                'skill_id' => 67,
                'level_id' => 3,
            ),
            63 => 
            array (
                'id' => 88,
                'user_id' => 268,
                'skill_id' => 68,
                'level_id' => 2,
            ),
            64 => 
            array (
                'id' => 89,
                'user_id' => 268,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            65 => 
            array (
                'id' => 90,
                'user_id' => 268,
                'skill_id' => 69,
                'level_id' => 2,
            ),
            66 => 
            array (
                'id' => 91,
                'user_id' => 268,
                'skill_id' => 12,
                'level_id' => 2,
            ),
            67 => 
            array (
                'id' => 93,
                'user_id' => 271,
                'skill_id' => 70,
                'level_id' => 2,
            ),
            68 => 
            array (
                'id' => 94,
                'user_id' => 271,
                'skill_id' => 12,
                'level_id' => 2,
            ),
            69 => 
            array (
                'id' => 95,
                'user_id' => 271,
                'skill_id' => 71,
                'level_id' => 2,
            ),
            70 => 
            array (
                'id' => 99,
                'user_id' => 274,
                'skill_id' => 75,
                'level_id' => 2,
            ),
            71 => 
            array (
                'id' => 100,
                'user_id' => 275,
                'skill_id' => 2,
                'level_id' => 2,
            ),
            72 => 
            array (
                'id' => 101,
                'user_id' => 275,
                'skill_id' => 5,
                'level_id' => 2,
            ),
            73 => 
            array (
                'id' => 102,
                'user_id' => 275,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            74 => 
            array (
                'id' => 103,
                'user_id' => 275,
                'skill_id' => 76,
                'level_id' => 2,
            ),
            75 => 
            array (
                'id' => 104,
                'user_id' => 275,
                'skill_id' => 77,
                'level_id' => 2,
            ),
            76 => 
            array (
                'id' => 108,
                'user_id' => 287,
                'skill_id' => 79,
                'level_id' => 3,
            ),
            77 => 
            array (
                'id' => 109,
                'user_id' => 289,
                'skill_id' => 80,
                'level_id' => 2,
            ),
            78 => 
            array (
                'id' => 110,
                'user_id' => 289,
                'skill_id' => 81,
                'level_id' => 2,
            ),
            79 => 
            array (
                'id' => 111,
                'user_id' => 290,
                'skill_id' => 7,
                'level_id' => 3,
            ),
            80 => 
            array (
                'id' => 112,
                'user_id' => 300,
                'skill_id' => 82,
                'level_id' => 2,
            ),
            81 => 
            array (
                'id' => 113,
                'user_id' => 300,
                'skill_id' => 83,
                'level_id' => 2,
            ),
            82 => 
            array (
                'id' => 114,
                'user_id' => 300,
                'skill_id' => 84,
                'level_id' => 2,
            ),
            83 => 
            array (
                'id' => 115,
                'user_id' => 300,
                'skill_id' => 85,
                'level_id' => 2,
            ),
            84 => 
            array (
                'id' => 116,
                'user_id' => 300,
                'skill_id' => 86,
                'level_id' => 2,
            ),
            85 => 
            array (
                'id' => 117,
                'user_id' => 300,
                'skill_id' => 87,
                'level_id' => 2,
            ),
            86 => 
            array (
                'id' => 118,
                'user_id' => 300,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            87 => 
            array (
                'id' => 119,
                'user_id' => 300,
                'skill_id' => 88,
                'level_id' => 2,
            ),
            88 => 
            array (
                'id' => 120,
                'user_id' => 326,
                'skill_id' => 89,
                'level_id' => 3,
            ),
            89 => 
            array (
                'id' => 121,
                'user_id' => 326,
                'skill_id' => 90,
                'level_id' => 3,
            ),
            90 => 
            array (
                'id' => 122,
                'user_id' => 326,
                'skill_id' => 91,
                'level_id' => 2,
            ),
            91 => 
            array (
                'id' => 123,
                'user_id' => 326,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            92 => 
            array (
                'id' => 124,
                'user_id' => 334,
                'skill_id' => 92,
                'level_id' => 1,
            ),
            93 => 
            array (
                'id' => 125,
                'user_id' => 327,
                'skill_id' => 2,
                'level_id' => 2,
            ),
            94 => 
            array (
                'id' => 126,
                'user_id' => 327,
                'skill_id' => 93,
                'level_id' => 3,
            ),
            95 => 
            array (
                'id' => 127,
                'user_id' => 327,
                'skill_id' => 94,
                'level_id' => 3,
            ),
            96 => 
            array (
                'id' => 128,
                'user_id' => 327,
                'skill_id' => 95,
                'level_id' => 3,
            ),
            97 => 
            array (
                'id' => 129,
                'user_id' => 327,
                'skill_id' => 96,
                'level_id' => 2,
            ),
            98 => 
            array (
                'id' => 130,
                'user_id' => 346,
                'skill_id' => 47,
                'level_id' => 1,
            ),
            99 => 
            array (
                'id' => 148,
                'user_id' => 356,
                'skill_id' => 99,
                'level_id' => 3,
            ),
            100 => 
            array (
                'id' => 149,
                'user_id' => 356,
                'skill_id' => 100,
                'level_id' => 3,
            ),
            101 => 
            array (
                'id' => 150,
                'user_id' => 356,
                'skill_id' => 101,
                'level_id' => 3,
            ),
            102 => 
            array (
                'id' => 151,
                'user_id' => 344,
                'skill_id' => 102,
                'level_id' => 2,
            ),
            103 => 
            array (
                'id' => 153,
                'user_id' => 358,
                'skill_id' => 103,
                'level_id' => 2,
            ),
            104 => 
            array (
                'id' => 154,
                'user_id' => 362,
                'skill_id' => 55,
                'level_id' => 3,
            ),
            105 => 
            array (
                'id' => 155,
                'user_id' => 362,
                'skill_id' => 104,
                'level_id' => 3,
            ),
            106 => 
            array (
                'id' => 156,
                'user_id' => 364,
                'skill_id' => 105,
                'level_id' => 2,
            ),
            107 => 
            array (
                'id' => 157,
                'user_id' => 367,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            108 => 
            array (
                'id' => 158,
                'user_id' => 367,
                'skill_id' => 106,
                'level_id' => 2,
            ),
            109 => 
            array (
                'id' => 159,
                'user_id' => 367,
                'skill_id' => 107,
                'level_id' => 3,
            ),
            110 => 
            array (
                'id' => 160,
                'user_id' => 367,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            111 => 
            array (
                'id' => 161,
                'user_id' => 367,
                'skill_id' => 108,
                'level_id' => 2,
            ),
            112 => 
            array (
                'id' => 162,
                'user_id' => 367,
                'skill_id' => 109,
                'level_id' => 2,
            ),
            113 => 
            array (
                'id' => 163,
                'user_id' => 367,
                'skill_id' => 110,
                'level_id' => 3,
            ),
            114 => 
            array (
                'id' => 164,
                'user_id' => 372,
                'skill_id' => 3,
                'level_id' => 1,
            ),
            115 => 
            array (
                'id' => 165,
                'user_id' => 372,
                'skill_id' => 111,
                'level_id' => 1,
            ),
            116 => 
            array (
                'id' => 166,
                'user_id' => 372,
                'skill_id' => 16,
                'level_id' => 1,
            ),
            117 => 
            array (
                'id' => 167,
                'user_id' => 372,
                'skill_id' => 112,
                'level_id' => 1,
            ),
            118 => 
            array (
                'id' => 168,
                'user_id' => 377,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            119 => 
            array (
                'id' => 169,
                'user_id' => 377,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            120 => 
            array (
                'id' => 170,
                'user_id' => 381,
                'skill_id' => 113,
                'level_id' => 3,
            ),
            121 => 
            array (
                'id' => 171,
                'user_id' => 383,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            122 => 
            array (
                'id' => 172,
                'user_id' => 383,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            123 => 
            array (
                'id' => 173,
                'user_id' => 384,
                'skill_id' => 114,
                'level_id' => 2,
            ),
            124 => 
            array (
                'id' => 174,
                'user_id' => 385,
                'skill_id' => 115,
                'level_id' => 2,
            ),
            125 => 
            array (
                'id' => 175,
                'user_id' => 385,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            126 => 
            array (
                'id' => 176,
                'user_id' => 388,
                'skill_id' => 116,
                'level_id' => 2,
            ),
            127 => 
            array (
                'id' => 177,
                'user_id' => 395,
                'skill_id' => 117,
                'level_id' => 1,
            ),
            128 => 
            array (
                'id' => 178,
                'user_id' => 396,
                'skill_id' => 118,
                'level_id' => 3,
            ),
            129 => 
            array (
                'id' => 179,
                'user_id' => 396,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            130 => 
            array (
                'id' => 180,
                'user_id' => 396,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            131 => 
            array (
                'id' => 181,
                'user_id' => 396,
                'skill_id' => 59,
                'level_id' => 2,
            ),
            132 => 
            array (
                'id' => 182,
                'user_id' => 396,
                'skill_id' => 119,
                'level_id' => 2,
            ),
            133 => 
            array (
                'id' => 183,
                'user_id' => 397,
                'skill_id' => 120,
                'level_id' => 3,
            ),
            134 => 
            array (
                'id' => 184,
                'user_id' => 397,
                'skill_id' => 121,
                'level_id' => 1,
            ),
            135 => 
            array (
                'id' => 185,
                'user_id' => 397,
                'skill_id' => 122,
                'level_id' => 1,
            ),
            136 => 
            array (
                'id' => 186,
                'user_id' => 400,
                'skill_id' => 123,
                'level_id' => 3,
            ),
            137 => 
            array (
                'id' => 187,
                'user_id' => 407,
                'skill_id' => 124,
                'level_id' => 2,
            ),
            138 => 
            array (
                'id' => 188,
                'user_id' => 407,
                'skill_id' => 35,
                'level_id' => 2,
            ),
            139 => 
            array (
                'id' => 189,
                'user_id' => 407,
                'skill_id' => 125,
                'level_id' => 1,
            ),
            140 => 
            array (
                'id' => 195,
                'user_id' => 41,
                'skill_id' => 126,
                'level_id' => 2,
            ),
            141 => 
            array (
                'id' => 196,
                'user_id' => 41,
                'skill_id' => 127,
                'level_id' => 1,
            ),
            142 => 
            array (
                'id' => 197,
                'user_id' => 41,
                'skill_id' => 120,
                'level_id' => 2,
            ),
            143 => 
            array (
                'id' => 198,
                'user_id' => 41,
                'skill_id' => 128,
                'level_id' => 2,
            ),
            144 => 
            array (
                'id' => 199,
                'user_id' => 41,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            145 => 
            array (
                'id' => 200,
                'user_id' => 41,
                'skill_id' => 113,
                'level_id' => 3,
            ),
            146 => 
            array (
                'id' => 201,
                'user_id' => 409,
                'skill_id' => 129,
                'level_id' => 2,
            ),
            147 => 
            array (
                'id' => 202,
                'user_id' => 409,
                'skill_id' => 29,
                'level_id' => 2,
            ),
            148 => 
            array (
                'id' => 203,
                'user_id' => 409,
                'skill_id' => 130,
                'level_id' => 1,
            ),
            149 => 
            array (
                'id' => 204,
                'user_id' => 409,
                'skill_id' => 131,
                'level_id' => 1,
            ),
            150 => 
            array (
                'id' => 207,
                'user_id' => 392,
                'skill_id' => 118,
                'level_id' => 2,
            ),
            151 => 
            array (
                'id' => 208,
                'user_id' => 392,
                'skill_id' => 132,
                'level_id' => 1,
            ),
            152 => 
            array (
                'id' => 209,
                'user_id' => 411,
                'skill_id' => 133,
                'level_id' => 2,
            ),
            153 => 
            array (
                'id' => 210,
                'user_id' => 414,
                'skill_id' => 134,
                'level_id' => 1,
            ),
            154 => 
            array (
                'id' => 211,
                'user_id' => 414,
                'skill_id' => 135,
                'level_id' => 1,
            ),
            155 => 
            array (
                'id' => 212,
                'user_id' => 406,
                'skill_id' => 120,
                'level_id' => 3,
            ),
            156 => 
            array (
                'id' => 213,
                'user_id' => 421,
                'skill_id' => 29,
                'level_id' => 1,
            ),
            157 => 
            array (
                'id' => 214,
                'user_id' => 423,
                'skill_id' => 136,
                'level_id' => 3,
            ),
            158 => 
            array (
                'id' => 215,
                'user_id' => 423,
                'skill_id' => 137,
                'level_id' => 2,
            ),
            159 => 
            array (
                'id' => 216,
                'user_id' => 423,
                'skill_id' => 138,
                'level_id' => 2,
            ),
            160 => 
            array (
                'id' => 217,
                'user_id' => 423,
                'skill_id' => 139,
                'level_id' => 2,
            ),
            161 => 
            array (
                'id' => 218,
                'user_id' => 423,
                'skill_id' => 140,
                'level_id' => 2,
            ),
            162 => 
            array (
                'id' => 219,
                'user_id' => 423,
                'skill_id' => 141,
                'level_id' => 2,
            ),
            163 => 
            array (
                'id' => 220,
                'user_id' => 423,
                'skill_id' => 142,
                'level_id' => 3,
            ),
            164 => 
            array (
                'id' => 221,
                'user_id' => 423,
                'skill_id' => 143,
                'level_id' => 2,
            ),
            165 => 
            array (
                'id' => 222,
                'user_id' => 423,
                'skill_id' => 144,
                'level_id' => 2,
            ),
            166 => 
            array (
                'id' => 223,
                'user_id' => 423,
                'skill_id' => 145,
                'level_id' => 2,
            ),
            167 => 
            array (
                'id' => 224,
                'user_id' => 431,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            168 => 
            array (
                'id' => 225,
                'user_id' => 431,
                'skill_id' => 76,
                'level_id' => 2,
            ),
            169 => 
            array (
                'id' => 226,
                'user_id' => 431,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            170 => 
            array (
                'id' => 227,
                'user_id' => 432,
                'skill_id' => 146,
                'level_id' => 2,
            ),
            171 => 
            array (
                'id' => 228,
                'user_id' => 433,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            172 => 
            array (
                'id' => 229,
                'user_id' => 433,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            173 => 
            array (
                'id' => 230,
                'user_id' => 433,
                'skill_id' => 147,
                'level_id' => 3,
            ),
            174 => 
            array (
                'id' => 236,
                'user_id' => 422,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            175 => 
            array (
                'id' => 237,
                'user_id' => 422,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            176 => 
            array (
                'id' => 238,
                'user_id' => 422,
                'skill_id' => 150,
                'level_id' => 2,
            ),
            177 => 
            array (
                'id' => 239,
                'user_id' => 422,
                'skill_id' => 149,
                'level_id' => 2,
            ),
            178 => 
            array (
                'id' => 240,
                'user_id' => 422,
                'skill_id' => 148,
                'level_id' => 2,
            ),
            179 => 
            array (
                'id' => 241,
                'user_id' => 436,
                'skill_id' => 151,
                'level_id' => 3,
            ),
            180 => 
            array (
                'id' => 242,
                'user_id' => 436,
                'skill_id' => 152,
                'level_id' => 2,
            ),
            181 => 
            array (
                'id' => 243,
                'user_id' => 439,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            182 => 
            array (
                'id' => 244,
                'user_id' => 439,
                'skill_id' => 153,
                'level_id' => 3,
            ),
            183 => 
            array (
                'id' => 245,
                'user_id' => 439,
                'skill_id' => 154,
                'level_id' => 3,
            ),
            184 => 
            array (
                'id' => 246,
                'user_id' => 439,
                'skill_id' => 155,
                'level_id' => 3,
            ),
            185 => 
            array (
                'id' => 247,
                'user_id' => 439,
                'skill_id' => 156,
                'level_id' => 3,
            ),
            186 => 
            array (
                'id' => 248,
                'user_id' => 439,
                'skill_id' => 157,
                'level_id' => 3,
            ),
            187 => 
            array (
                'id' => 249,
                'user_id' => 440,
                'skill_id' => 115,
                'level_id' => 3,
            ),
            188 => 
            array (
                'id' => 250,
                'user_id' => 440,
                'skill_id' => 158,
                'level_id' => 3,
            ),
            189 => 
            array (
                'id' => 251,
                'user_id' => 440,
                'skill_id' => 58,
                'level_id' => 3,
            ),
            190 => 
            array (
                'id' => 252,
                'user_id' => 440,
                'skill_id' => 159,
                'level_id' => 2,
            ),
            191 => 
            array (
                'id' => 253,
                'user_id' => 440,
                'skill_id' => 160,
                'level_id' => 2,
            ),
            192 => 
            array (
                'id' => 254,
                'user_id' => 440,
                'skill_id' => 161,
                'level_id' => 3,
            ),
            193 => 
            array (
                'id' => 255,
                'user_id' => 440,
                'skill_id' => 162,
                'level_id' => 3,
            ),
            194 => 
            array (
                'id' => 260,
                'user_id' => 443,
                'skill_id' => 29,
                'level_id' => 2,
            ),
            195 => 
            array (
                'id' => 261,
                'user_id' => 443,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            196 => 
            array (
                'id' => 262,
                'user_id' => 443,
                'skill_id' => 76,
                'level_id' => 2,
            ),
            197 => 
            array (
                'id' => 263,
                'user_id' => 443,
                'skill_id' => 163,
                'level_id' => 2,
            ),
            198 => 
            array (
                'id' => 264,
                'user_id' => 446,
                'skill_id' => 164,
                'level_id' => 2,
            ),
            199 => 
            array (
                'id' => 265,
                'user_id' => 449,
                'skill_id' => 36,
                'level_id' => 2,
            ),
            200 => 
            array (
                'id' => 266,
                'user_id' => 449,
                'skill_id' => 108,
                'level_id' => 2,
            ),
            201 => 
            array (
                'id' => 267,
                'user_id' => 449,
                'skill_id' => 165,
                'level_id' => 3,
            ),
            202 => 
            array (
                'id' => 268,
                'user_id' => 449,
                'skill_id' => 166,
                'level_id' => 2,
            ),
            203 => 
            array (
                'id' => 269,
                'user_id' => 449,
                'skill_id' => 64,
                'level_id' => 2,
            ),
            204 => 
            array (
                'id' => 270,
                'user_id' => 449,
                'skill_id' => 167,
                'level_id' => 2,
            ),
            205 => 
            array (
                'id' => 271,
                'user_id' => 449,
                'skill_id' => 168,
                'level_id' => 2,
            ),
            206 => 
            array (
                'id' => 272,
                'user_id' => 453,
                'skill_id' => 169,
                'level_id' => 3,
            ),
            207 => 
            array (
                'id' => 276,
                'user_id' => 467,
                'skill_id' => 172,
                'level_id' => 3,
            ),
            208 => 
            array (
                'id' => 277,
                'user_id' => 467,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            209 => 
            array (
                'id' => 278,
                'user_id' => 467,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            210 => 
            array (
                'id' => 279,
                'user_id' => 467,
                'skill_id' => 173,
                'level_id' => 3,
            ),
            211 => 
            array (
                'id' => 280,
                'user_id' => 471,
                'skill_id' => 174,
                'level_id' => 3,
            ),
            212 => 
            array (
                'id' => 281,
                'user_id' => 471,
                'skill_id' => 16,
                'level_id' => 3,
            ),
            213 => 
            array (
                'id' => 282,
                'user_id' => 471,
                'skill_id' => 175,
                'level_id' => 3,
            ),
            214 => 
            array (
                'id' => 284,
                'user_id' => 473,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            215 => 
            array (
                'id' => 285,
                'user_id' => 473,
                'skill_id' => 177,
                'level_id' => 1,
            ),
            216 => 
            array (
                'id' => 286,
                'user_id' => 473,
                'skill_id' => 44,
                'level_id' => 3,
            ),
            217 => 
            array (
                'id' => 287,
                'user_id' => 473,
                'skill_id' => 147,
                'level_id' => 3,
            ),
            218 => 
            array (
                'id' => 288,
                'user_id' => 473,
                'skill_id' => 178,
                'level_id' => 3,
            ),
            219 => 
            array (
                'id' => 290,
                'user_id' => 475,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            220 => 
            array (
                'id' => 291,
                'user_id' => 475,
                'skill_id' => 179,
                'level_id' => 3,
            ),
            221 => 
            array (
                'id' => 292,
                'user_id' => 475,
                'skill_id' => 115,
                'level_id' => 2,
            ),
            222 => 
            array (
                'id' => 293,
                'user_id' => 475,
                'skill_id' => 180,
                'level_id' => 2,
            ),
            223 => 
            array (
                'id' => 294,
                'user_id' => 476,
                'skill_id' => 158,
                'level_id' => 2,
            ),
            224 => 
            array (
                'id' => 295,
                'user_id' => 476,
                'skill_id' => 118,
                'level_id' => 3,
            ),
            225 => 
            array (
                'id' => 296,
                'user_id' => 476,
                'skill_id' => 181,
                'level_id' => 3,
            ),
            226 => 
            array (
                'id' => 297,
                'user_id' => 476,
                'skill_id' => 182,
                'level_id' => 2,
            ),
            227 => 
            array (
                'id' => 298,
                'user_id' => 476,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            228 => 
            array (
                'id' => 299,
                'user_id' => 478,
                'skill_id' => 183,
                'level_id' => 2,
            ),
            229 => 
            array (
                'id' => 300,
                'user_id' => 478,
                'skill_id' => 120,
                'level_id' => 2,
            ),
            230 => 
            array (
                'id' => 301,
                'user_id' => 478,
                'skill_id' => 61,
                'level_id' => 2,
            ),
            231 => 
            array (
                'id' => 302,
                'user_id' => 483,
                'skill_id' => 184,
                'level_id' => 2,
            ),
            232 => 
            array (
                'id' => 303,
                'user_id' => 483,
                'skill_id' => 82,
                'level_id' => 2,
            ),
            233 => 
            array (
                'id' => 304,
                'user_id' => 483,
                'skill_id' => 185,
                'level_id' => 2,
            ),
            234 => 
            array (
                'id' => 305,
                'user_id' => 486,
                'skill_id' => 186,
                'level_id' => 3,
            ),
            235 => 
            array (
                'id' => 306,
                'user_id' => 486,
                'skill_id' => 175,
                'level_id' => 3,
            ),
            236 => 
            array (
                'id' => 307,
                'user_id' => 486,
                'skill_id' => 95,
                'level_id' => 3,
            ),
            237 => 
            array (
                'id' => 308,
                'user_id' => 486,
                'skill_id' => 187,
                'level_id' => 3,
            ),
            238 => 
            array (
                'id' => 309,
                'user_id' => 488,
                'skill_id' => 36,
                'level_id' => 2,
            ),
            239 => 
            array (
                'id' => 310,
                'user_id' => 488,
                'skill_id' => 14,
                'level_id' => 3,
            ),
            240 => 
            array (
                'id' => 311,
                'user_id' => 488,
                'skill_id' => 188,
                'level_id' => 2,
            ),
            241 => 
            array (
                'id' => 312,
                'user_id' => 488,
                'skill_id' => 12,
                'level_id' => 2,
            ),
            242 => 
            array (
                'id' => 313,
                'user_id' => 488,
                'skill_id' => 84,
                'level_id' => 2,
            ),
            243 => 
            array (
                'id' => 314,
                'user_id' => 488,
                'skill_id' => 189,
                'level_id' => 3,
            ),
            244 => 
            array (
                'id' => 315,
                'user_id' => 488,
                'skill_id' => 190,
                'level_id' => 2,
            ),
            245 => 
            array (
                'id' => 316,
                'user_id' => 488,
                'skill_id' => 191,
                'level_id' => 2,
            ),
            246 => 
            array (
                'id' => 317,
                'user_id' => 490,
                'skill_id' => 109,
                'level_id' => 2,
            ),
            247 => 
            array (
                'id' => 318,
                'user_id' => 490,
                'skill_id' => 192,
                'level_id' => 1,
            ),
            248 => 
            array (
                'id' => 319,
                'user_id' => 492,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            249 => 
            array (
                'id' => 320,
                'user_id' => 492,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            250 => 
            array (
                'id' => 321,
                'user_id' => 492,
                'skill_id' => 193,
                'level_id' => 3,
            ),
            251 => 
            array (
                'id' => 322,
                'user_id' => 492,
                'skill_id' => 194,
                'level_id' => 3,
            ),
            252 => 
            array (
                'id' => 323,
                'user_id' => 492,
                'skill_id' => 195,
                'level_id' => 3,
            ),
            253 => 
            array (
                'id' => 324,
                'user_id' => 492,
                'skill_id' => 26,
                'level_id' => 3,
            ),
            254 => 
            array (
                'id' => 325,
                'user_id' => 491,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            255 => 
            array (
                'id' => 326,
                'user_id' => 491,
                'skill_id' => 149,
                'level_id' => 2,
            ),
            256 => 
            array (
                'id' => 327,
                'user_id' => 491,
                'skill_id' => 196,
                'level_id' => 2,
            ),
            257 => 
            array (
                'id' => 328,
                'user_id' => 491,
                'skill_id' => 197,
                'level_id' => 2,
            ),
            258 => 
            array (
                'id' => 329,
                'user_id' => 491,
                'skill_id' => 198,
                'level_id' => 2,
            ),
            259 => 
            array (
                'id' => 330,
                'user_id' => 491,
                'skill_id' => 199,
                'level_id' => 2,
            ),
            260 => 
            array (
                'id' => 331,
                'user_id' => 491,
                'skill_id' => 200,
                'level_id' => 2,
            ),
            261 => 
            array (
                'id' => 332,
                'user_id' => 491,
                'skill_id' => 148,
                'level_id' => 3,
            ),
            262 => 
            array (
                'id' => 333,
                'user_id' => 491,
                'skill_id' => 201,
                'level_id' => 3,
            ),
            263 => 
            array (
                'id' => 334,
                'user_id' => 491,
                'skill_id' => 202,
                'level_id' => 3,
            ),
            264 => 
            array (
                'id' => 335,
                'user_id' => 491,
                'skill_id' => 203,
                'level_id' => 2,
            ),
            265 => 
            array (
                'id' => 336,
                'user_id' => 496,
                'skill_id' => 30,
                'level_id' => 1,
            ),
            266 => 
            array (
                'id' => 337,
                'user_id' => 497,
                'skill_id' => 162,
                'level_id' => 3,
            ),
            267 => 
            array (
                'id' => 338,
                'user_id' => 497,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            268 => 
            array (
                'id' => 339,
                'user_id' => 497,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            269 => 
            array (
                'id' => 340,
                'user_id' => 497,
                'skill_id' => 115,
                'level_id' => 3,
            ),
            270 => 
            array (
                'id' => 341,
                'user_id' => 500,
                'skill_id' => 204,
                'level_id' => 3,
            ),
            271 => 
            array (
                'id' => 348,
                'user_id' => 501,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            272 => 
            array (
                'id' => 349,
                'user_id' => 501,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            273 => 
            array (
                'id' => 350,
                'user_id' => 501,
                'skill_id' => 205,
                'level_id' => 3,
            ),
            274 => 
            array (
                'id' => 351,
                'user_id' => 501,
                'skill_id' => 206,
                'level_id' => 3,
            ),
            275 => 
            array (
                'id' => 352,
                'user_id' => 503,
                'skill_id' => 24,
                'level_id' => 1,
            ),
            276 => 
            array (
                'id' => 353,
                'user_id' => 504,
                'skill_id' => 120,
                'level_id' => 3,
            ),
            277 => 
            array (
                'id' => 354,
                'user_id' => 509,
                'skill_id' => 58,
                'level_id' => 3,
            ),
            278 => 
            array (
                'id' => 355,
                'user_id' => 511,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            279 => 
            array (
                'id' => 356,
                'user_id' => 511,
                'skill_id' => 207,
                'level_id' => 3,
            ),
            280 => 
            array (
                'id' => 357,
                'user_id' => 511,
                'skill_id' => 178,
                'level_id' => 3,
            ),
            281 => 
            array (
                'id' => 358,
                'user_id' => 511,
                'skill_id' => 208,
                'level_id' => 3,
            ),
            282 => 
            array (
                'id' => 359,
                'user_id' => 513,
                'skill_id' => 209,
                'level_id' => 3,
            ),
            283 => 
            array (
                'id' => 360,
                'user_id' => 513,
                'skill_id' => 210,
                'level_id' => 3,
            ),
            284 => 
            array (
                'id' => 361,
                'user_id' => 513,
                'skill_id' => 211,
                'level_id' => 3,
            ),
            285 => 
            array (
                'id' => 362,
                'user_id' => 515,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            286 => 
            array (
                'id' => 363,
                'user_id' => 515,
                'skill_id' => 212,
                'level_id' => 2,
            ),
            287 => 
            array (
                'id' => 364,
                'user_id' => 515,
                'skill_id' => 161,
                'level_id' => 3,
            ),
            288 => 
            array (
                'id' => 365,
                'user_id' => 515,
                'skill_id' => 213,
                'level_id' => 3,
            ),
            289 => 
            array (
                'id' => 366,
                'user_id' => 515,
                'skill_id' => 214,
                'level_id' => 2,
            ),
            290 => 
            array (
                'id' => 367,
                'user_id' => 515,
                'skill_id' => 215,
                'level_id' => 3,
            ),
            291 => 
            array (
                'id' => 368,
                'user_id' => 517,
                'skill_id' => 111,
                'level_id' => 3,
            ),
            292 => 
            array (
                'id' => 369,
                'user_id' => 517,
                'skill_id' => 216,
                'level_id' => 2,
            ),
            293 => 
            array (
                'id' => 370,
                'user_id' => 517,
                'skill_id' => 217,
                'level_id' => 2,
            ),
            294 => 
            array (
                'id' => 371,
                'user_id' => 517,
                'skill_id' => 218,
                'level_id' => 3,
            ),
            295 => 
            array (
                'id' => 372,
                'user_id' => 517,
                'skill_id' => 186,
                'level_id' => 3,
            ),
            296 => 
            array (
                'id' => 373,
                'user_id' => 517,
                'skill_id' => 219,
                'level_id' => 3,
            ),
            297 => 
            array (
                'id' => 374,
                'user_id' => 517,
                'skill_id' => 220,
                'level_id' => 3,
            ),
            298 => 
            array (
                'id' => 375,
                'user_id' => 518,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            299 => 
            array (
                'id' => 376,
                'user_id' => 518,
                'skill_id' => 221,
                'level_id' => 2,
            ),
            300 => 
            array (
                'id' => 377,
                'user_id' => 518,
                'skill_id' => 22,
                'level_id' => 2,
            ),
            301 => 
            array (
                'id' => 378,
                'user_id' => 518,
                'skill_id' => 76,
                'level_id' => 2,
            ),
            302 => 
            array (
                'id' => 379,
                'user_id' => 519,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            303 => 
            array (
                'id' => 380,
                'user_id' => 519,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            304 => 
            array (
                'id' => 381,
                'user_id' => 519,
                'skill_id' => 222,
                'level_id' => 1,
            ),
            305 => 
            array (
                'id' => 382,
                'user_id' => 519,
                'skill_id' => 223,
                'level_id' => 2,
            ),
            306 => 
            array (
                'id' => 383,
                'user_id' => 519,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            307 => 
            array (
                'id' => 384,
                'user_id' => 519,
                'skill_id' => 159,
                'level_id' => 1,
            ),
            308 => 
            array (
                'id' => 385,
                'user_id' => 519,
                'skill_id' => 224,
                'level_id' => 1,
            ),
            309 => 
            array (
                'id' => 386,
                'user_id' => 519,
                'skill_id' => 225,
                'level_id' => 1,
            ),
            310 => 
            array (
                'id' => 387,
                'user_id' => 519,
                'skill_id' => 226,
                'level_id' => 2,
            ),
            311 => 
            array (
                'id' => 388,
                'user_id' => 519,
                'skill_id' => 227,
                'level_id' => 2,
            ),
            312 => 
            array (
                'id' => 389,
                'user_id' => 520,
                'skill_id' => 58,
                'level_id' => 3,
            ),
            313 => 
            array (
                'id' => 390,
                'user_id' => 520,
                'skill_id' => 228,
                'level_id' => 3,
            ),
            314 => 
            array (
                'id' => 391,
                'user_id' => 520,
                'skill_id' => 159,
                'level_id' => 3,
            ),
            315 => 
            array (
                'id' => 392,
                'user_id' => 520,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            316 => 
            array (
                'id' => 393,
                'user_id' => 520,
                'skill_id' => 115,
                'level_id' => 3,
            ),
            317 => 
            array (
                'id' => 394,
                'user_id' => 520,
                'skill_id' => 229,
                'level_id' => 3,
            ),
            318 => 
            array (
                'id' => 395,
                'user_id' => 520,
                'skill_id' => 230,
                'level_id' => 3,
            ),
            319 => 
            array (
                'id' => 396,
                'user_id' => 520,
                'skill_id' => 231,
                'level_id' => 3,
            ),
            320 => 
            array (
                'id' => 397,
                'user_id' => 520,
                'skill_id' => 232,
                'level_id' => 3,
            ),
            321 => 
            array (
                'id' => 398,
                'user_id' => 521,
                'skill_id' => 29,
                'level_id' => 2,
            ),
            322 => 
            array (
                'id' => 399,
                'user_id' => 521,
                'skill_id' => 18,
                'level_id' => 2,
            ),
            323 => 
            array (
                'id' => 400,
                'user_id' => 521,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            324 => 
            array (
                'id' => 401,
                'user_id' => 521,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            325 => 
            array (
                'id' => 402,
                'user_id' => 526,
                'skill_id' => 233,
                'level_id' => 2,
            ),
            326 => 
            array (
                'id' => 403,
                'user_id' => 526,
                'skill_id' => 234,
                'level_id' => 2,
            ),
            327 => 
            array (
                'id' => 404,
                'user_id' => 526,
                'skill_id' => 235,
                'level_id' => 2,
            ),
            328 => 
            array (
                'id' => 405,
                'user_id' => 531,
                'skill_id' => 236,
                'level_id' => 1,
            ),
            329 => 
            array (
                'id' => 406,
                'user_id' => 532,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            330 => 
            array (
                'id' => 407,
                'user_id' => 532,
                'skill_id' => 106,
                'level_id' => 3,
            ),
            331 => 
            array (
                'id' => 408,
                'user_id' => 532,
                'skill_id' => 95,
                'level_id' => 3,
            ),
            332 => 
            array (
                'id' => 409,
                'user_id' => 532,
                'skill_id' => 56,
                'level_id' => 2,
            ),
            333 => 
            array (
                'id' => 412,
                'user_id' => 540,
                'skill_id' => 237,
                'level_id' => 2,
            ),
            334 => 
            array (
                'id' => 413,
                'user_id' => 540,
                'skill_id' => 238,
                'level_id' => 2,
            ),
            335 => 
            array (
                'id' => 414,
                'user_id' => 540,
                'skill_id' => 58,
                'level_id' => 2,
            ),
            336 => 
            array (
                'id' => 415,
                'user_id' => 540,
                'skill_id' => 239,
                'level_id' => 2,
            ),
            337 => 
            array (
                'id' => 416,
                'user_id' => 540,
                'skill_id' => 240,
                'level_id' => 2,
            ),
            338 => 
            array (
                'id' => 418,
                'user_id' => 541,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            339 => 
            array (
                'id' => 419,
                'user_id' => 543,
                'skill_id' => 123,
                'level_id' => 3,
            ),
            340 => 
            array (
                'id' => 426,
                'user_id' => 544,
                'skill_id' => 241,
                'level_id' => 3,
            ),
            341 => 
            array (
                'id' => 427,
                'user_id' => 544,
                'skill_id' => 88,
                'level_id' => 3,
            ),
            342 => 
            array (
                'id' => 428,
                'user_id' => 544,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            343 => 
            array (
                'id' => 429,
                'user_id' => 544,
                'skill_id' => 76,
                'level_id' => 2,
            ),
            344 => 
            array (
                'id' => 430,
                'user_id' => 544,
                'skill_id' => 242,
                'level_id' => 3,
            ),
            345 => 
            array (
                'id' => 431,
                'user_id' => 544,
                'skill_id' => 18,
                'level_id' => 3,
            ),
            346 => 
            array (
                'id' => 432,
                'user_id' => 545,
                'skill_id' => 3,
                'level_id' => 1,
            ),
            347 => 
            array (
                'id' => 433,
                'user_id' => 548,
                'skill_id' => 243,
                'level_id' => 2,
            ),
            348 => 
            array (
                'id' => 434,
                'user_id' => 553,
                'skill_id' => 241,
                'level_id' => 3,
            ),
            349 => 
            array (
                'id' => 435,
                'user_id' => 554,
                'skill_id' => 244,
                'level_id' => 2,
            ),
            350 => 
            array (
                'id' => 436,
                'user_id' => 558,
                'skill_id' => 58,
                'level_id' => 3,
            ),
            351 => 
            array (
                'id' => 437,
                'user_id' => 558,
                'skill_id' => 159,
                'level_id' => 2,
            ),
            352 => 
            array (
                'id' => 438,
                'user_id' => 558,
                'skill_id' => 170,
                'level_id' => 3,
            ),
            353 => 
            array (
                'id' => 439,
                'user_id' => 558,
                'skill_id' => 118,
                'level_id' => 2,
            ),
            354 => 
            array (
                'id' => 440,
                'user_id' => 558,
                'skill_id' => 245,
                'level_id' => 2,
            ),
            355 => 
            array (
                'id' => 441,
                'user_id' => 552,
                'skill_id' => 246,
                'level_id' => 2,
            ),
            356 => 
            array (
                'id' => 442,
                'user_id' => 552,
                'skill_id' => 247,
                'level_id' => 2,
            ),
            357 => 
            array (
                'id' => 443,
                'user_id' => 552,
                'skill_id' => 248,
                'level_id' => 2,
            ),
            358 => 
            array (
                'id' => 444,
                'user_id' => 552,
                'skill_id' => 249,
                'level_id' => 2,
            ),
            359 => 
            array (
                'id' => 445,
                'user_id' => 552,
                'skill_id' => 250,
                'level_id' => 2,
            ),
            360 => 
            array (
                'id' => 446,
                'user_id' => 552,
                'skill_id' => 251,
                'level_id' => 2,
            ),
            361 => 
            array (
                'id' => 462,
                'user_id' => 559,
                'skill_id' => 58,
                'level_id' => 3,
            ),
            362 => 
            array (
                'id' => 463,
                'user_id' => 559,
                'skill_id' => 252,
                'level_id' => 3,
            ),
            363 => 
            array (
                'id' => 464,
                'user_id' => 559,
                'skill_id' => 253,
                'level_id' => 3,
            ),
            364 => 
            array (
                'id' => 465,
                'user_id' => 559,
                'skill_id' => 254,
                'level_id' => 2,
            ),
            365 => 
            array (
                'id' => 466,
                'user_id' => 559,
                'skill_id' => 225,
                'level_id' => 2,
            ),
            366 => 
            array (
                'id' => 467,
                'user_id' => 559,
                'skill_id' => 255,
                'level_id' => 3,
            ),
            367 => 
            array (
                'id' => 468,
                'user_id' => 559,
                'skill_id' => 155,
                'level_id' => 3,
            ),
            368 => 
            array (
                'id' => 469,
                'user_id' => 559,
                'skill_id' => 173,
                'level_id' => 3,
            ),
            369 => 
            array (
                'id' => 470,
                'user_id' => 559,
                'skill_id' => 256,
                'level_id' => 3,
            ),
            370 => 
            array (
                'id' => 471,
                'user_id' => 559,
                'skill_id' => 257,
                'level_id' => 3,
            ),
            371 => 
            array (
                'id' => 472,
                'user_id' => 559,
                'skill_id' => 232,
                'level_id' => 3,
            ),
            372 => 
            array (
                'id' => 473,
                'user_id' => 559,
                'skill_id' => 76,
                'level_id' => 3,
            ),
            373 => 
            array (
                'id' => 474,
                'user_id' => 559,
                'skill_id' => 258,
                'level_id' => 3,
            ),
            374 => 
            array (
                'id' => 475,
                'user_id' => 559,
                'skill_id' => 259,
                'level_id' => 3,
            ),
            375 => 
            array (
                'id' => 476,
                'user_id' => 559,
                'skill_id' => 5,
                'level_id' => 3,
            ),
            376 => 
            array (
                'id' => 477,
                'user_id' => 566,
                'skill_id' => 260,
                'level_id' => 2,
            ),
            377 => 
            array (
                'id' => 478,
                'user_id' => 567,
                'skill_id' => 186,
                'level_id' => 3,
            ),
            378 => 
            array (
                'id' => 479,
                'user_id' => 567,
                'skill_id' => 55,
                'level_id' => 3,
            ),
            379 => 
            array (
                'id' => 480,
                'user_id' => 567,
                'skill_id' => 72,
                'level_id' => 3,
            ),
            380 => 
            array (
                'id' => 481,
                'user_id' => 567,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            381 => 
            array (
                'id' => 482,
                'user_id' => 567,
                'skill_id' => 76,
                'level_id' => 2,
            ),
            382 => 
            array (
                'id' => 483,
                'user_id' => 567,
                'skill_id' => 22,
                'level_id' => 2,
            ),
            383 => 
            array (
                'id' => 484,
                'user_id' => 573,
                'skill_id' => 261,
                'level_id' => 2,
            ),
            384 => 
            array (
                'id' => 485,
                'user_id' => 573,
                'skill_id' => 37,
                'level_id' => 2,
            ),
            385 => 
            array (
                'id' => 486,
                'user_id' => 573,
                'skill_id' => 262,
                'level_id' => 2,
            ),
            386 => 
            array (
                'id' => 487,
                'user_id' => 579,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            387 => 
            array (
                'id' => 488,
                'user_id' => 579,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            388 => 
            array (
                'id' => 489,
                'user_id' => 579,
                'skill_id' => 263,
                'level_id' => 3,
            ),
            389 => 
            array (
                'id' => 490,
                'user_id' => 579,
                'skill_id' => 186,
                'level_id' => 3,
            ),
            390 => 
            array (
                'id' => 491,
                'user_id' => 579,
                'skill_id' => 95,
                'level_id' => 3,
            ),
            391 => 
            array (
                'id' => 492,
                'user_id' => 586,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            392 => 
            array (
                'id' => 493,
                'user_id' => 586,
                'skill_id' => 22,
                'level_id' => 3,
            ),
            393 => 
            array (
                'id' => 494,
                'user_id' => 586,
                'skill_id' => 264,
                'level_id' => 3,
            ),
            394 => 
            array (
                'id' => 495,
                'user_id' => 586,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            395 => 
            array (
                'id' => 497,
                'user_id' => 587,
                'skill_id' => 265,
                'level_id' => 2,
            ),
            396 => 
            array (
                'id' => 498,
                'user_id' => 587,
                'skill_id' => 266,
                'level_id' => 2,
            ),
            397 => 
            array (
                'id' => 499,
                'user_id' => 587,
                'skill_id' => 267,
                'level_id' => 2,
            ),
            398 => 
            array (
                'id' => 500,
                'user_id' => 587,
                'skill_id' => 268,
                'level_id' => 2,
            ),
            399 => 
            array (
                'id' => 501,
                'user_id' => 587,
                'skill_id' => 269,
                'level_id' => 2,
            ),
            400 => 
            array (
                'id' => 502,
                'user_id' => 587,
                'skill_id' => 270,
                'level_id' => 2,
            ),
            401 => 
            array (
                'id' => 503,
                'user_id' => 587,
                'skill_id' => 271,
                'level_id' => 2,
            ),
            402 => 
            array (
                'id' => 504,
                'user_id' => 587,
                'skill_id' => 272,
                'level_id' => 2,
            ),
            403 => 
            array (
                'id' => 505,
                'user_id' => 587,
                'skill_id' => 273,
                'level_id' => 2,
            ),
            404 => 
            array (
                'id' => 506,
                'user_id' => 587,
                'skill_id' => 274,
                'level_id' => 2,
            ),
            405 => 
            array (
                'id' => 507,
                'user_id' => 587,
                'skill_id' => 275,
                'level_id' => 2,
            ),
            406 => 
            array (
                'id' => 508,
                'user_id' => 587,
                'skill_id' => 276,
                'level_id' => 2,
            ),
            407 => 
            array (
                'id' => 509,
                'user_id' => 587,
                'skill_id' => 277,
                'level_id' => 2,
            ),
            408 => 
            array (
                'id' => 510,
                'user_id' => 593,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            409 => 
            array (
                'id' => 511,
                'user_id' => 593,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            410 => 
            array (
                'id' => 512,
                'user_id' => 593,
                'skill_id' => 278,
                'level_id' => 3,
            ),
            411 => 
            array (
                'id' => 513,
                'user_id' => 593,
                'skill_id' => 88,
                'level_id' => 3,
            ),
            412 => 
            array (
                'id' => 514,
                'user_id' => 593,
                'skill_id' => 279,
                'level_id' => 3,
            ),
            413 => 
            array (
                'id' => 515,
                'user_id' => 593,
                'skill_id' => 109,
                'level_id' => 2,
            ),
            414 => 
            array (
                'id' => 517,
                'user_id' => 599,
                'skill_id' => 281,
                'level_id' => 1,
            ),
            415 => 
            array (
                'id' => 518,
                'user_id' => 607,
                'skill_id' => 282,
                'level_id' => 3,
            ),
            416 => 
            array (
                'id' => 519,
                'user_id' => 610,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            417 => 
            array (
                'id' => 520,
                'user_id' => 610,
                'skill_id' => 51,
                'level_id' => 2,
            ),
            418 => 
            array (
                'id' => 521,
                'user_id' => 460,
                'skill_id' => 170,
                'level_id' => 2,
            ),
            419 => 
            array (
                'id' => 522,
                'user_id' => 460,
                'skill_id' => 171,
                'level_id' => 1,
            ),
            420 => 
            array (
                'id' => 523,
                'user_id' => 460,
                'skill_id' => 118,
                'level_id' => 2,
            ),
            421 => 
            array (
                'id' => 524,
                'user_id' => 630,
                'skill_id' => 113,
                'level_id' => 3,
            ),
            422 => 
            array (
                'id' => 525,
                'user_id' => 630,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            423 => 
            array (
                'id' => 526,
                'user_id' => 631,
                'skill_id' => 109,
                'level_id' => 3,
            ),
            424 => 
            array (
                'id' => 527,
                'user_id' => 631,
                'skill_id' => 169,
                'level_id' => 3,
            ),
            425 => 
            array (
                'id' => 528,
                'user_id' => 631,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            426 => 
            array (
                'id' => 531,
                'user_id' => 639,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            427 => 
            array (
                'id' => 532,
                'user_id' => 639,
                'skill_id' => 186,
                'level_id' => 3,
            ),
            428 => 
            array (
                'id' => 533,
                'user_id' => 639,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            429 => 
            array (
                'id' => 534,
                'user_id' => 639,
                'skill_id' => 284,
                'level_id' => 3,
            ),
            430 => 
            array (
                'id' => 535,
                'user_id' => 639,
                'skill_id' => 285,
                'level_id' => 3,
            ),
            431 => 
            array (
                'id' => 536,
                'user_id' => 639,
                'skill_id' => 286,
                'level_id' => 2,
            ),
            432 => 
            array (
                'id' => 537,
                'user_id' => 640,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            433 => 
            array (
                'id' => 538,
                'user_id' => 640,
                'skill_id' => 287,
                'level_id' => 3,
            ),
            434 => 
            array (
                'id' => 539,
                'user_id' => 645,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            435 => 
            array (
                'id' => 540,
                'user_id' => 645,
                'skill_id' => 76,
                'level_id' => 3,
            ),
            436 => 
            array (
                'id' => 541,
                'user_id' => 645,
                'skill_id' => 288,
                'level_id' => 3,
            ),
            437 => 
            array (
                'id' => 542,
                'user_id' => 645,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            438 => 
            array (
                'id' => 543,
                'user_id' => 645,
                'skill_id' => 289,
                'level_id' => 3,
            ),
            439 => 
            array (
                'id' => 544,
                'user_id' => 645,
                'skill_id' => 290,
                'level_id' => 3,
            ),
            440 => 
            array (
                'id' => 545,
                'user_id' => 662,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            441 => 
            array (
                'id' => 546,
                'user_id' => 663,
                'skill_id' => 291,
                'level_id' => 3,
            ),
            442 => 
            array (
                'id' => 547,
                'user_id' => 663,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            443 => 
            array (
                'id' => 548,
                'user_id' => 663,
                'skill_id' => 135,
                'level_id' => 3,
            ),
            444 => 
            array (
                'id' => 549,
                'user_id' => 663,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            445 => 
            array (
                'id' => 550,
                'user_id' => 663,
                'skill_id' => 292,
                'level_id' => 3,
            ),
            446 => 
            array (
                'id' => 551,
                'user_id' => 663,
                'skill_id' => 76,
                'level_id' => 3,
            ),
            447 => 
            array (
                'id' => 552,
                'user_id' => 668,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            448 => 
            array (
                'id' => 553,
                'user_id' => 668,
                'skill_id' => 88,
                'level_id' => 3,
            ),
            449 => 
            array (
                'id' => 554,
                'user_id' => 671,
                'skill_id' => 293,
                'level_id' => 1,
            ),
            450 => 
            array (
                'id' => 555,
                'user_id' => 675,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            451 => 
            array (
                'id' => 556,
                'user_id' => 675,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            452 => 
            array (
                'id' => 557,
                'user_id' => 680,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            453 => 
            array (
                'id' => 558,
                'user_id' => 680,
                'skill_id' => 294,
                'level_id' => 2,
            ),
            454 => 
            array (
                'id' => 559,
                'user_id' => 680,
                'skill_id' => 295,
                'level_id' => 2,
            ),
            455 => 
            array (
                'id' => 560,
                'user_id' => 680,
                'skill_id' => 296,
                'level_id' => 2,
            ),
            456 => 
            array (
                'id' => 561,
                'user_id' => 680,
                'skill_id' => 297,
                'level_id' => 2,
            ),
            457 => 
            array (
                'id' => 562,
                'user_id' => 686,
                'skill_id' => 298,
                'level_id' => 2,
            ),
            458 => 
            array (
                'id' => 565,
                'user_id' => 697,
                'skill_id' => 300,
                'level_id' => 1,
            ),
            459 => 
            array (
                'id' => 566,
                'user_id' => 700,
                'skill_id' => 301,
                'level_id' => 2,
            ),
            460 => 
            array (
                'id' => 567,
                'user_id' => 703,
                'skill_id' => 302,
                'level_id' => 3,
            ),
            461 => 
            array (
                'id' => 568,
                'user_id' => 703,
                'skill_id' => 95,
                'level_id' => 3,
            ),
            462 => 
            array (
                'id' => 569,
                'user_id' => 703,
                'skill_id' => 44,
                'level_id' => 3,
            ),
            463 => 
            array (
                'id' => 570,
                'user_id' => 703,
                'skill_id' => 303,
                'level_id' => 3,
            ),
            464 => 
            array (
                'id' => 573,
                'user_id' => 704,
                'skill_id' => 304,
                'level_id' => 3,
            ),
            465 => 
            array (
                'id' => 574,
                'user_id' => 704,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            466 => 
            array (
                'id' => 575,
                'user_id' => 704,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            467 => 
            array (
                'id' => 576,
                'user_id' => 704,
                'skill_id' => 305,
                'level_id' => 2,
            ),
            468 => 
            array (
                'id' => 577,
                'user_id' => 704,
                'skill_id' => 306,
                'level_id' => 2,
            ),
            469 => 
            array (
                'id' => 578,
                'user_id' => 712,
                'skill_id' => 307,
                'level_id' => 2,
            ),
            470 => 
            array (
                'id' => 581,
                'user_id' => 694,
                'skill_id' => 14,
                'level_id' => 2,
            ),
            471 => 
            array (
                'id' => 582,
                'user_id' => 694,
                'skill_id' => 308,
                'level_id' => 2,
            ),
            472 => 
            array (
                'id' => 583,
                'user_id' => 726,
                'skill_id' => 309,
                'level_id' => 2,
            ),
            473 => 
            array (
                'id' => 584,
                'user_id' => 730,
                'skill_id' => 310,
                'level_id' => 2,
            ),
            474 => 
            array (
                'id' => 585,
                'user_id' => 730,
                'skill_id' => 311,
                'level_id' => 2,
            ),
            475 => 
            array (
                'id' => 586,
                'user_id' => 734,
                'skill_id' => 312,
                'level_id' => 2,
            ),
            476 => 
            array (
                'id' => 587,
                'user_id' => 734,
                'skill_id' => 2,
                'level_id' => 2,
            ),
            477 => 
            array (
                'id' => 588,
                'user_id' => 734,
                'skill_id' => 313,
                'level_id' => 2,
            ),
            478 => 
            array (
                'id' => 589,
                'user_id' => 735,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            479 => 
            array (
                'id' => 590,
                'user_id' => 735,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            480 => 
            array (
                'id' => 591,
                'user_id' => 735,
                'skill_id' => 314,
                'level_id' => 3,
            ),
            481 => 
            array (
                'id' => 592,
                'user_id' => 735,
                'skill_id' => 135,
                'level_id' => 3,
            ),
            482 => 
            array (
                'id' => 593,
                'user_id' => 735,
                'skill_id' => 76,
                'level_id' => 3,
            ),
            483 => 
            array (
                'id' => 594,
                'user_id' => 735,
                'skill_id' => 36,
                'level_id' => 3,
            ),
            484 => 
            array (
                'id' => 595,
                'user_id' => 735,
                'skill_id' => 315,
                'level_id' => 3,
            ),
            485 => 
            array (
                'id' => 596,
                'user_id' => 744,
                'skill_id' => 113,
                'level_id' => 2,
            ),
            486 => 
            array (
                'id' => 597,
                'user_id' => 751,
                'skill_id' => 316,
                'level_id' => 2,
            ),
            487 => 
            array (
                'id' => 600,
                'user_id' => 767,
                'skill_id' => 318,
                'level_id' => 3,
            ),
            488 => 
            array (
                'id' => 601,
                'user_id' => 767,
                'skill_id' => 319,
                'level_id' => 2,
            ),
            489 => 
            array (
                'id' => 602,
                'user_id' => 767,
                'skill_id' => 320,
                'level_id' => 1,
            ),
            490 => 
            array (
                'id' => 603,
                'user_id' => 770,
                'skill_id' => 14,
                'level_id' => 2,
            ),
            491 => 
            array (
                'id' => 604,
                'user_id' => 772,
                'skill_id' => 321,
                'level_id' => 3,
            ),
            492 => 
            array (
                'id' => 605,
                'user_id' => 772,
                'skill_id' => 235,
                'level_id' => 3,
            ),
            493 => 
            array (
                'id' => 606,
                'user_id' => 772,
                'skill_id' => 322,
                'level_id' => 2,
            ),
            494 => 
            array (
                'id' => 607,
                'user_id' => 772,
                'skill_id' => 36,
                'level_id' => 2,
            ),
            495 => 
            array (
                'id' => 608,
                'user_id' => 772,
                'skill_id' => 22,
                'level_id' => 3,
            ),
            496 => 
            array (
                'id' => 609,
                'user_id' => 772,
                'skill_id' => 323,
                'level_id' => 3,
            ),
            497 => 
            array (
                'id' => 610,
                'user_id' => 772,
                'skill_id' => 324,
                'level_id' => 3,
            ),
            498 => 
            array (
                'id' => 611,
                'user_id' => 772,
                'skill_id' => 325,
                'level_id' => 3,
            ),
            499 => 
            array (
                'id' => 612,
                'user_id' => 772,
                'skill_id' => 24,
                'level_id' => 3,
            ),
        ));
        \DB::table('user_skills')->insert(array (
            0 => 
            array (
                'id' => 613,
                'user_id' => 771,
                'skill_id' => 326,
                'level_id' => 2,
            ),
            1 => 
            array (
                'id' => 626,
                'user_id' => 781,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            2 => 
            array (
                'id' => 627,
                'user_id' => 781,
                'skill_id' => 2,
                'level_id' => 2,
            ),
            3 => 
            array (
                'id' => 628,
                'user_id' => 782,
                'skill_id' => 51,
                'level_id' => 1,
            ),
            4 => 
            array (
                'id' => 629,
                'user_id' => 782,
                'skill_id' => 330,
                'level_id' => 1,
            ),
            5 => 
            array (
                'id' => 630,
                'user_id' => 782,
                'skill_id' => 24,
                'level_id' => 1,
            ),
            6 => 
            array (
                'id' => 631,
                'user_id' => 782,
                'skill_id' => 3,
                'level_id' => 1,
            ),
            7 => 
            array (
                'id' => 632,
                'user_id' => 784,
                'skill_id' => 331,
                'level_id' => 2,
            ),
            8 => 
            array (
                'id' => 633,
                'user_id' => 783,
                'skill_id' => 92,
                'level_id' => 2,
            ),
            9 => 
            array (
                'id' => 634,
                'user_id' => 785,
                'skill_id' => 332,
                'level_id' => 3,
            ),
            10 => 
            array (
                'id' => 635,
                'user_id' => 790,
                'skill_id' => 333,
                'level_id' => 3,
            ),
            11 => 
            array (
                'id' => 636,
                'user_id' => 790,
                'skill_id' => 334,
                'level_id' => 1,
            ),
            12 => 
            array (
                'id' => 637,
                'user_id' => 790,
                'skill_id' => 335,
                'level_id' => 1,
            ),
            13 => 
            array (
                'id' => 638,
                'user_id' => 794,
                'skill_id' => 336,
                'level_id' => 3,
            ),
            14 => 
            array (
                'id' => 639,
                'user_id' => 796,
                'skill_id' => 112,
                'level_id' => 3,
            ),
            15 => 
            array (
                'id' => 640,
                'user_id' => 796,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            16 => 
            array (
                'id' => 641,
                'user_id' => 796,
                'skill_id' => 175,
                'level_id' => 3,
            ),
            17 => 
            array (
                'id' => 642,
                'user_id' => 796,
                'skill_id' => 337,
                'level_id' => 3,
            ),
            18 => 
            array (
                'id' => 643,
                'user_id' => 797,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            19 => 
            array (
                'id' => 644,
                'user_id' => 797,
                'skill_id' => 109,
                'level_id' => 2,
            ),
            20 => 
            array (
                'id' => 645,
                'user_id' => 797,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            21 => 
            array (
                'id' => 646,
                'user_id' => 821,
                'skill_id' => 95,
                'level_id' => 3,
            ),
            22 => 
            array (
                'id' => 647,
                'user_id' => 821,
                'skill_id' => 338,
                'level_id' => 3,
            ),
            23 => 
            array (
                'id' => 648,
                'user_id' => 821,
                'skill_id' => 147,
                'level_id' => 3,
            ),
            24 => 
            array (
                'id' => 649,
                'user_id' => 780,
                'skill_id' => 327,
                'level_id' => 3,
            ),
            25 => 
            array (
                'id' => 650,
                'user_id' => 780,
                'skill_id' => 328,
                'level_id' => 3,
            ),
            26 => 
            array (
                'id' => 651,
                'user_id' => 780,
                'skill_id' => 329,
                'level_id' => 3,
            ),
            27 => 
            array (
                'id' => 652,
                'user_id' => 780,
                'skill_id' => 36,
                'level_id' => 2,
            ),
            28 => 
            array (
                'id' => 653,
                'user_id' => 780,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            29 => 
            array (
                'id' => 654,
                'user_id' => 780,
                'skill_id' => 178,
                'level_id' => 1,
            ),
            30 => 
            array (
                'id' => 655,
                'user_id' => 823,
                'skill_id' => 339,
                'level_id' => 2,
            ),
            31 => 
            array (
                'id' => 656,
                'user_id' => 824,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            32 => 
            array (
                'id' => 657,
                'user_id' => 824,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            33 => 
            array (
                'id' => 658,
                'user_id' => 824,
                'skill_id' => 72,
                'level_id' => 3,
            ),
            34 => 
            array (
                'id' => 659,
                'user_id' => 827,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            35 => 
            array (
                'id' => 660,
                'user_id' => 827,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            36 => 
            array (
                'id' => 661,
                'user_id' => 828,
                'skill_id' => 327,
                'level_id' => 2,
            ),
            37 => 
            array (
                'id' => 662,
                'user_id' => 831,
                'skill_id' => 340,
                'level_id' => 3,
            ),
            38 => 
            array (
                'id' => 663,
                'user_id' => 831,
                'skill_id' => 341,
                'level_id' => 3,
            ),
            39 => 
            array (
                'id' => 664,
                'user_id' => 831,
                'skill_id' => 342,
                'level_id' => 3,
            ),
            40 => 
            array (
                'id' => 665,
                'user_id' => 831,
                'skill_id' => 343,
                'level_id' => 3,
            ),
            41 => 
            array (
                'id' => 666,
                'user_id' => 831,
                'skill_id' => 344,
                'level_id' => 3,
            ),
            42 => 
            array (
                'id' => 667,
                'user_id' => 831,
                'skill_id' => 345,
                'level_id' => 2,
            ),
            43 => 
            array (
                'id' => 668,
                'user_id' => 831,
                'skill_id' => 346,
                'level_id' => 3,
            ),
            44 => 
            array (
                'id' => 669,
                'user_id' => 831,
                'skill_id' => 347,
                'level_id' => 3,
            ),
            45 => 
            array (
                'id' => 670,
                'user_id' => 831,
                'skill_id' => 348,
                'level_id' => 3,
            ),
            46 => 
            array (
                'id' => 671,
                'user_id' => 831,
                'skill_id' => 349,
                'level_id' => 3,
            ),
            47 => 
            array (
                'id' => 672,
                'user_id' => 832,
                'skill_id' => 3,
                'level_id' => 1,
            ),
            48 => 
            array (
                'id' => 673,
                'user_id' => 832,
                'skill_id' => 56,
                'level_id' => 2,
            ),
            49 => 
            array (
                'id' => 674,
                'user_id' => 832,
                'skill_id' => 24,
                'level_id' => 2,
            ),
            50 => 
            array (
                'id' => 675,
                'user_id' => 834,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            51 => 
            array (
                'id' => 676,
                'user_id' => 834,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            52 => 
            array (
                'id' => 677,
                'user_id' => 835,
                'skill_id' => 350,
                'level_id' => 1,
            ),
            53 => 
            array (
                'id' => 678,
                'user_id' => 837,
                'skill_id' => 351,
                'level_id' => 1,
            ),
            54 => 
            array (
                'id' => 679,
                'user_id' => 838,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            55 => 
            array (
                'id' => 680,
                'user_id' => 838,
                'skill_id' => 29,
                'level_id' => 2,
            ),
            56 => 
            array (
                'id' => 681,
                'user_id' => 845,
                'skill_id' => 352,
                'level_id' => 3,
            ),
            57 => 
            array (
                'id' => 682,
                'user_id' => 846,
                'skill_id' => 44,
                'level_id' => 3,
            ),
            58 => 
            array (
                'id' => 683,
                'user_id' => 846,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            59 => 
            array (
                'id' => 684,
                'user_id' => 846,
                'skill_id' => 353,
                'level_id' => 2,
            ),
            60 => 
            array (
                'id' => 685,
                'user_id' => 847,
                'skill_id' => 354,
                'level_id' => 3,
            ),
            61 => 
            array (
                'id' => 686,
                'user_id' => 850,
                'skill_id' => 355,
                'level_id' => 3,
            ),
            62 => 
            array (
                'id' => 687,
                'user_id' => 850,
                'skill_id' => 232,
                'level_id' => 2,
            ),
            63 => 
            array (
                'id' => 688,
                'user_id' => 850,
                'skill_id' => 115,
                'level_id' => 2,
            ),
            64 => 
            array (
                'id' => 689,
                'user_id' => 850,
                'skill_id' => 356,
                'level_id' => 2,
            ),
            65 => 
            array (
                'id' => 690,
                'user_id' => 850,
                'skill_id' => 357,
                'level_id' => 3,
            ),
            66 => 
            array (
                'id' => 691,
                'user_id' => 850,
                'skill_id' => 358,
                'level_id' => 2,
            ),
            67 => 
            array (
                'id' => 692,
                'user_id' => 850,
                'skill_id' => 359,
                'level_id' => 3,
            ),
            68 => 
            array (
                'id' => 693,
                'user_id' => 850,
                'skill_id' => 161,
                'level_id' => 3,
            ),
            69 => 
            array (
                'id' => 694,
                'user_id' => 851,
                'skill_id' => 48,
                'level_id' => 1,
            ),
            70 => 
            array (
                'id' => 695,
                'user_id' => 851,
                'skill_id' => 360,
                'level_id' => 2,
            ),
            71 => 
            array (
                'id' => 696,
                'user_id' => 851,
                'skill_id' => 361,
                'level_id' => 2,
            ),
            72 => 
            array (
                'id' => 697,
                'user_id' => 855,
                'skill_id' => 121,
                'level_id' => 1,
            ),
            73 => 
            array (
                'id' => 698,
                'user_id' => 855,
                'skill_id' => 120,
                'level_id' => 3,
            ),
            74 => 
            array (
                'id' => 699,
                'user_id' => 855,
                'skill_id' => 362,
                'level_id' => 1,
            ),
            75 => 
            array (
                'id' => 700,
                'user_id' => 855,
                'skill_id' => 64,
                'level_id' => 1,
            ),
            76 => 
            array (
                'id' => 701,
                'user_id' => 855,
                'skill_id' => 29,
                'level_id' => 1,
            ),
            77 => 
            array (
                'id' => 702,
                'user_id' => 856,
                'skill_id' => 232,
                'level_id' => 3,
            ),
            78 => 
            array (
                'id' => 703,
                'user_id' => 856,
                'skill_id' => 363,
                'level_id' => 3,
            ),
            79 => 
            array (
                'id' => 704,
                'user_id' => 856,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            80 => 
            array (
                'id' => 705,
                'user_id' => 860,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            81 => 
            array (
                'id' => 706,
                'user_id' => 860,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            82 => 
            array (
                'id' => 707,
                'user_id' => 860,
                'skill_id' => 44,
                'level_id' => 3,
            ),
            83 => 
            array (
                'id' => 708,
                'user_id' => 860,
                'skill_id' => 148,
                'level_id' => 3,
            ),
            84 => 
            array (
                'id' => 709,
                'user_id' => 869,
                'skill_id' => 364,
                'level_id' => 3,
            ),
            85 => 
            array (
                'id' => 710,
                'user_id' => 869,
                'skill_id' => 232,
                'level_id' => 2,
            ),
            86 => 
            array (
                'id' => 711,
                'user_id' => 869,
                'skill_id' => 76,
                'level_id' => 3,
            ),
            87 => 
            array (
                'id' => 712,
                'user_id' => 869,
                'skill_id' => 47,
                'level_id' => 2,
            ),
            88 => 
            array (
                'id' => 713,
                'user_id' => 871,
                'skill_id' => 24,
                'level_id' => 3,
            ),
            89 => 
            array (
                'id' => 714,
                'user_id' => 871,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            90 => 
            array (
                'id' => 715,
                'user_id' => 871,
                'skill_id' => 365,
                'level_id' => 3,
            ),
            91 => 
            array (
                'id' => 716,
                'user_id' => 878,
                'skill_id' => 366,
                'level_id' => 2,
            ),
            92 => 
            array (
                'id' => 717,
                'user_id' => 890,
                'skill_id' => 367,
                'level_id' => 2,
            ),
            93 => 
            array (
                'id' => 718,
                'user_id' => 897,
                'skill_id' => 3,
                'level_id' => 3,
            ),
            94 => 
            array (
                'id' => 719,
                'user_id' => 897,
                'skill_id' => 2,
                'level_id' => 3,
            ),
            95 => 
            array (
                'id' => 720,
                'user_id' => 897,
                'skill_id' => 368,
                'level_id' => 3,
            ),
            96 => 
            array (
                'id' => 721,
                'user_id' => 897,
                'skill_id' => 369,
                'level_id' => 3,
            ),
            97 => 
            array (
                'id' => 722,
                'user_id' => 899,
                'skill_id' => 370,
                'level_id' => 3,
            ),
            98 => 
            array (
                'id' => 723,
                'user_id' => 899,
                'skill_id' => 3,
                'level_id' => 2,
            ),
            99 => 
            array (
                'id' => 724,
                'user_id' => 899,
                'skill_id' => 371,
                'level_id' => 1,
            ),
            100 => 
            array (
                'id' => 725,
                'user_id' => 901,
                'skill_id' => 372,
                'level_id' => 3,
            ),
            101 => 
            array (
                'id' => 726,
                'user_id' => 904,
                'skill_id' => 373,
                'level_id' => 3,
            ),
        ));
        
        
    }
}