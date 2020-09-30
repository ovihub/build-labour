<?php

use Illuminate\Database\Seeder;

class JobPostApplicantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_post_applicants')->delete();
        
        \DB::table('job_post_applicants')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'job_id' => 4,
                'selected' => 'Pending',
                'applied_at' => '2019-09-26 00:00:00',
                'selected_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 5,
                'job_id' => 4,
                'selected' => 'Pending',
                'applied_at' => '2019-09-26 00:00:00',
                'selected_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'user_id' => 6,
                'job_id' => 4,
                'selected' => 'Pending',
                'applied_at' => '2019-09-26 00:00:00',
                'selected_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'user_id' => 8,
                'job_id' => 4,
                'selected' => 'Pending',
                'applied_at' => '2019-09-30 00:00:00',
                'selected_at' => NULL,
            ),
            4 => 
            array (
                'id' => 7,
                'user_id' => 8,
                'job_id' => 26,
                'selected' => 'Pending',
                'applied_at' => '2019-09-30 00:00:00',
                'selected_at' => NULL,
            ),
            5 => 
            array (
                'id' => 10,
                'user_id' => 17,
                'job_id' => 26,
                'selected' => 'Pending',
                'applied_at' => '2019-10-04 00:00:00',
                'selected_at' => NULL,
            ),
            6 => 
            array (
                'id' => 12,
                'user_id' => 18,
                'job_id' => 27,
                'selected' => 'Pending',
                'applied_at' => '2019-10-07 22:23:39',
                'selected_at' => NULL,
            ),
            7 => 
            array (
                'id' => 13,
                'user_id' => 19,
                'job_id' => 26,
                'selected' => 'Pending',
                'applied_at' => '2019-10-07 23:19:55',
                'selected_at' => NULL,
            ),
            8 => 
            array (
                'id' => 14,
                'user_id' => 8,
                'job_id' => 28,
                'selected' => 'Pending',
                'applied_at' => '2019-10-08 16:41:36',
                'selected_at' => NULL,
            ),
            9 => 
            array (
                'id' => 16,
                'user_id' => 7,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-10-12 11:55:23',
                'selected_at' => NULL,
            ),
            10 => 
            array (
                'id' => 17,
                'user_id' => 7,
                'job_id' => 33,
                'selected' => 'Pending',
                'applied_at' => '2019-10-12 12:26:01',
                'selected_at' => NULL,
            ),
            11 => 
            array (
                'id' => 18,
                'user_id' => 18,
                'job_id' => 35,
                'selected' => 'Pending',
                'applied_at' => '2019-10-16 02:11:35',
                'selected_at' => NULL,
            ),
            12 => 
            array (
                'id' => 19,
                'user_id' => 221,
                'job_id' => 38,
                'selected' => 'Pending',
                'applied_at' => '2019-10-18 01:00:13',
                'selected_at' => NULL,
            ),
            13 => 
            array (
                'id' => 20,
                'user_id' => 221,
                'job_id' => 41,
                'selected' => 'Pending',
                'applied_at' => '2019-10-18 01:11:11',
                'selected_at' => NULL,
            ),
            14 => 
            array (
                'id' => 21,
                'user_id' => 221,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-10-18 01:12:06',
                'selected_at' => NULL,
            ),
            15 => 
            array (
                'id' => 22,
                'user_id' => 221,
                'job_id' => 35,
                'selected' => 'Pending',
                'applied_at' => '2019-10-18 01:13:17',
                'selected_at' => NULL,
            ),
            16 => 
            array (
                'id' => 23,
                'user_id' => 224,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-10-18 01:31:49',
                'selected_at' => NULL,
            ),
            17 => 
            array (
                'id' => 24,
                'user_id' => 8,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-10-22 15:30:22',
                'selected_at' => NULL,
            ),
            18 => 
            array (
                'id' => 25,
                'user_id' => 234,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-10-30 08:41:18',
                'selected_at' => NULL,
            ),
            19 => 
            array (
                'id' => 26,
                'user_id' => 248,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-12 02:16:48',
                'selected_at' => NULL,
            ),
            20 => 
            array (
                'id' => 27,
                'user_id' => 248,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-12 02:17:49',
                'selected_at' => NULL,
            ),
            21 => 
            array (
                'id' => 28,
                'user_id' => 253,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-12 21:32:27',
                'selected_at' => NULL,
            ),
            22 => 
            array (
                'id' => 29,
                'user_id' => 253,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-12 21:33:06',
                'selected_at' => NULL,
            ),
            23 => 
            array (
                'id' => 30,
                'user_id' => 255,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-13 04:38:34',
                'selected_at' => NULL,
            ),
            24 => 
            array (
                'id' => 31,
                'user_id' => 255,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-13 04:39:46',
                'selected_at' => NULL,
            ),
            25 => 
            array (
                'id' => 32,
                'user_id' => 260,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-14 06:53:19',
                'selected_at' => NULL,
            ),
            26 => 
            array (
                'id' => 33,
                'user_id' => 260,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-14 06:56:27',
                'selected_at' => NULL,
            ),
            27 => 
            array (
                'id' => 34,
                'user_id' => 260,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-14 06:57:34',
                'selected_at' => NULL,
            ),
            28 => 
            array (
                'id' => 35,
                'user_id' => 262,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-15 00:16:54',
                'selected_at' => NULL,
            ),
            29 => 
            array (
                'id' => 36,
                'user_id' => 262,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-15 00:17:42',
                'selected_at' => NULL,
            ),
            30 => 
            array (
                'id' => 37,
                'user_id' => 262,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-15 00:18:32',
                'selected_at' => NULL,
            ),
            31 => 
            array (
                'id' => 38,
                'user_id' => 263,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-15 01:51:51',
                'selected_at' => NULL,
            ),
            32 => 
            array (
                'id' => 39,
                'user_id' => 263,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-15 01:58:53',
                'selected_at' => NULL,
            ),
            33 => 
            array (
                'id' => 40,
                'user_id' => 268,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-17 23:52:45',
                'selected_at' => NULL,
            ),
            34 => 
            array (
                'id' => 41,
                'user_id' => 268,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-17 23:53:02',
                'selected_at' => NULL,
            ),
            35 => 
            array (
                'id' => 42,
                'user_id' => 268,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-17 23:53:24',
                'selected_at' => NULL,
            ),
            36 => 
            array (
                'id' => 43,
                'user_id' => 271,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-18 07:27:46',
                'selected_at' => NULL,
            ),
            37 => 
            array (
                'id' => 44,
                'user_id' => 271,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-18 07:28:17',
                'selected_at' => NULL,
            ),
            38 => 
            array (
                'id' => 45,
                'user_id' => 273,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-19 03:54:03',
                'selected_at' => NULL,
            ),
            39 => 
            array (
                'id' => 46,
                'user_id' => 274,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-19 04:20:26',
                'selected_at' => NULL,
            ),
            40 => 
            array (
                'id' => 51,
                'user_id' => 282,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 00:08:32',
                'selected_at' => NULL,
            ),
            41 => 
            array (
                'id' => 52,
                'user_id' => 284,
                'job_id' => 35,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 04:42:27',
                'selected_at' => NULL,
            ),
            42 => 
            array (
                'id' => 53,
                'user_id' => 285,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 08:06:30',
                'selected_at' => NULL,
            ),
            43 => 
            array (
                'id' => 54,
                'user_id' => 287,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 10:38:44',
                'selected_at' => NULL,
            ),
            44 => 
            array (
                'id' => 55,
                'user_id' => 287,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 10:39:16',
                'selected_at' => NULL,
            ),
            45 => 
            array (
                'id' => 56,
                'user_id' => 287,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 10:39:51',
                'selected_at' => NULL,
            ),
            46 => 
            array (
                'id' => 57,
                'user_id' => 290,
                'job_id' => 47,
                'selected' => 'Pending',
                'applied_at' => '2019-11-20 20:03:04',
                'selected_at' => NULL,
            ),
            47 => 
            array (
                'id' => 65,
                'user_id' => 295,
                'job_id' => 67,
                'selected' => 'Pending',
                'applied_at' => '2019-11-22 05:53:08',
                'selected_at' => NULL,
            ),
            48 => 
            array (
                'id' => 68,
                'user_id' => 165,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2019-11-22 12:47:50',
                'selected_at' => NULL,
            ),
            49 => 
            array (
                'id' => 69,
                'user_id' => 165,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2019-11-22 12:48:18',
                'selected_at' => NULL,
            ),
            50 => 
            array (
                'id' => 78,
                'user_id' => 160,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2019-12-06 11:44:43',
                'selected_at' => NULL,
            ),
            51 => 
            array (
                'id' => 79,
                'user_id' => 244,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2020-01-14 00:49:41',
                'selected_at' => NULL,
            ),
            52 => 
            array (
                'id' => 80,
                'user_id' => 304,
                'job_id' => 75,
                'selected' => 'Pending',
                'applied_at' => '2020-01-21 00:25:51',
                'selected_at' => NULL,
            ),
            53 => 
            array (
                'id' => 81,
                'user_id' => 307,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2020-01-29 20:30:15',
                'selected_at' => NULL,
            ),
            54 => 
            array (
                'id' => 82,
                'user_id' => 307,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2020-01-29 20:34:11',
                'selected_at' => NULL,
            ),
            55 => 
            array (
                'id' => 83,
                'user_id' => 307,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2020-01-29 20:34:36',
                'selected_at' => NULL,
            ),
            56 => 
            array (
                'id' => 84,
                'user_id' => 311,
                'job_id' => 31,
                'selected' => 'Pending',
                'applied_at' => '2020-02-12 10:54:13',
                'selected_at' => NULL,
            ),
            57 => 
            array (
                'id' => 85,
                'user_id' => 311,
                'job_id' => 37,
                'selected' => 'Pending',
                'applied_at' => '2020-02-12 10:54:47',
                'selected_at' => NULL,
            ),
            58 => 
            array (
                'id' => 86,
                'user_id' => 311,
                'job_id' => 43,
                'selected' => 'Pending',
                'applied_at' => '2020-02-12 10:55:09',
                'selected_at' => NULL,
            ),
            59 => 
            array (
                'id' => 87,
                'user_id' => 314,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-13 23:45:43',
                'selected_at' => NULL,
            ),
            60 => 
            array (
                'id' => 88,
                'user_id' => 316,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-14 01:24:52',
                'selected_at' => NULL,
            ),
            61 => 
            array (
                'id' => 89,
                'user_id' => 320,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-14 22:13:56',
                'selected_at' => NULL,
            ),
            62 => 
            array (
                'id' => 90,
                'user_id' => 322,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-15 04:16:25',
                'selected_at' => NULL,
            ),
            63 => 
            array (
                'id' => 91,
                'user_id' => 321,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-15 11:45:29',
                'selected_at' => NULL,
            ),
            64 => 
            array (
                'id' => 92,
                'user_id' => 326,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-16 03:35:12',
                'selected_at' => NULL,
            ),
            65 => 
            array (
                'id' => 93,
                'user_id' => 304,
                'job_id' => 82,
                'selected' => 'Accepted',
                'applied_at' => '2020-02-16 23:34:32',
                'selected_at' => NULL,
            ),
            66 => 
            array (
                'id' => 94,
                'user_id' => 332,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-17 01:37:29',
                'selected_at' => NULL,
            ),
            67 => 
            array (
                'id' => 95,
                'user_id' => 337,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-17 01:54:00',
                'selected_at' => NULL,
            ),
            68 => 
            array (
                'id' => 96,
                'user_id' => 338,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-17 03:28:39',
                'selected_at' => NULL,
            ),
            69 => 
            array (
                'id' => 97,
                'user_id' => 327,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-17 05:38:01',
                'selected_at' => NULL,
            ),
            70 => 
            array (
                'id' => 98,
                'user_id' => 344,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-18 03:14:57',
                'selected_at' => NULL,
            ),
            71 => 
            array (
                'id' => 99,
                'user_id' => 357,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-18 05:28:58',
                'selected_at' => NULL,
            ),
            72 => 
            array (
                'id' => 100,
                'user_id' => 358,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-18 05:52:05',
                'selected_at' => NULL,
            ),
            73 => 
            array (
                'id' => 101,
                'user_id' => 360,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-18 07:27:14',
                'selected_at' => NULL,
            ),
            74 => 
            array (
                'id' => 102,
                'user_id' => 362,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-19 02:22:33',
                'selected_at' => NULL,
            ),
            75 => 
            array (
                'id' => 103,
                'user_id' => 367,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-20 10:14:22',
                'selected_at' => NULL,
            ),
            76 => 
            array (
                'id' => 104,
                'user_id' => 381,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-21 07:06:27',
                'selected_at' => NULL,
            ),
            77 => 
            array (
                'id' => 105,
                'user_id' => 384,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-21 12:24:31',
                'selected_at' => NULL,
            ),
            78 => 
            array (
                'id' => 106,
                'user_id' => 383,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-22 01:15:39',
                'selected_at' => NULL,
            ),
            79 => 
            array (
                'id' => 107,
                'user_id' => 389,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-22 05:27:24',
                'selected_at' => NULL,
            ),
            80 => 
            array (
                'id' => 108,
                'user_id' => 392,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-22 08:00:24',
                'selected_at' => NULL,
            ),
            81 => 
            array (
                'id' => 109,
                'user_id' => 399,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-23 08:18:38',
                'selected_at' => NULL,
            ),
            82 => 
            array (
                'id' => 110,
                'user_id' => 405,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-24 02:20:06',
                'selected_at' => NULL,
            ),
            83 => 
            array (
                'id' => 111,
                'user_id' => 304,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-02-24 02:39:47',
                'selected_at' => NULL,
            ),
            84 => 
            array (
                'id' => 112,
                'user_id' => 41,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-24 09:04:58',
                'selected_at' => NULL,
            ),
            85 => 
            array (
                'id' => 113,
                'user_id' => 408,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-24 09:19:01',
                'selected_at' => NULL,
            ),
            86 => 
            array (
                'id' => 114,
                'user_id' => 414,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:21:47',
                'selected_at' => NULL,
            ),
            87 => 
            array (
                'id' => 115,
                'user_id' => 414,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:22:42',
                'selected_at' => NULL,
            ),
            88 => 
            array (
                'id' => 116,
                'user_id' => 414,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:22:59',
                'selected_at' => NULL,
            ),
            89 => 
            array (
                'id' => 117,
                'user_id' => 413,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:25:09',
                'selected_at' => NULL,
            ),
            90 => 
            array (
                'id' => 118,
                'user_id' => 415,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:25:34',
                'selected_at' => NULL,
            ),
            91 => 
            array (
                'id' => 119,
                'user_id' => 416,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:38:57',
                'selected_at' => NULL,
            ),
            92 => 
            array (
                'id' => 120,
                'user_id' => 374,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 05:39:43',
                'selected_at' => NULL,
            ),
            93 => 
            array (
                'id' => 121,
                'user_id' => 400,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 06:14:09',
                'selected_at' => NULL,
            ),
            94 => 
            array (
                'id' => 122,
                'user_id' => 422,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 06:32:16',
                'selected_at' => NULL,
            ),
            95 => 
            array (
                'id' => 123,
                'user_id' => 407,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 07:44:16',
                'selected_at' => NULL,
            ),
            96 => 
            array (
                'id' => 124,
                'user_id' => 423,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 07:47:46',
                'selected_at' => NULL,
            ),
            97 => 
            array (
                'id' => 125,
                'user_id' => 423,
                'job_id' => 34,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 07:50:06',
                'selected_at' => NULL,
            ),
            98 => 
            array (
                'id' => 126,
                'user_id' => 423,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 08:01:48',
                'selected_at' => NULL,
            ),
            99 => 
            array (
                'id' => 127,
                'user_id' => 429,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 11:39:23',
                'selected_at' => NULL,
            ),
            100 => 
            array (
                'id' => 128,
                'user_id' => 429,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 11:40:30',
                'selected_at' => NULL,
            ),
            101 => 
            array (
                'id' => 129,
                'user_id' => 431,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-02-25 17:15:13',
                'selected_at' => NULL,
            ),
            102 => 
            array (
                'id' => 130,
                'user_id' => 433,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-26 01:05:38',
                'selected_at' => NULL,
            ),
            103 => 
            array (
                'id' => 131,
                'user_id' => 439,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-26 11:08:47',
                'selected_at' => NULL,
            ),
            104 => 
            array (
                'id' => 132,
                'user_id' => 440,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-26 11:51:42',
                'selected_at' => NULL,
            ),
            105 => 
            array (
                'id' => 133,
                'user_id' => 443,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-27 06:15:57',
                'selected_at' => NULL,
            ),
            106 => 
            array (
                'id' => 134,
                'user_id' => 445,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-27 09:59:44',
                'selected_at' => NULL,
            ),
            107 => 
            array (
                'id' => 135,
                'user_id' => 446,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-02-27 11:27:37',
                'selected_at' => NULL,
            ),
            108 => 
            array (
                'id' => 136,
                'user_id' => 446,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-02-27 11:28:37',
                'selected_at' => NULL,
            ),
            109 => 
            array (
                'id' => 137,
                'user_id' => 446,
                'job_id' => 85,
                'selected' => 'Pending',
                'applied_at' => '2020-02-27 11:29:09',
                'selected_at' => NULL,
            ),
            110 => 
            array (
                'id' => 138,
                'user_id' => 441,
                'job_id' => 34,
                'selected' => 'Pending',
                'applied_at' => '2020-02-27 13:07:20',
                'selected_at' => NULL,
            ),
            111 => 
            array (
                'id' => 139,
                'user_id' => 392,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-02-28 07:16:53',
                'selected_at' => NULL,
            ),
            112 => 
            array (
                'id' => 140,
                'user_id' => 452,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-02-29 02:19:30',
                'selected_at' => NULL,
            ),
            113 => 
            array (
                'id' => 141,
                'user_id' => 469,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-03-02 08:30:12',
                'selected_at' => NULL,
            ),
            114 => 
            array (
                'id' => 142,
                'user_id' => 472,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-02 13:45:50',
                'selected_at' => NULL,
            ),
            115 => 
            array (
                'id' => 143,
                'user_id' => 472,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-03-02 13:46:56',
                'selected_at' => NULL,
            ),
            116 => 
            array (
                'id' => 144,
                'user_id' => 475,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-03 00:56:59',
                'selected_at' => NULL,
            ),
            117 => 
            array (
                'id' => 145,
                'user_id' => 476,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-03 01:46:20',
                'selected_at' => NULL,
            ),
            118 => 
            array (
                'id' => 146,
                'user_id' => 483,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-03-03 09:38:59',
                'selected_at' => NULL,
            ),
            119 => 
            array (
                'id' => 147,
                'user_id' => 483,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-03 09:40:46',
                'selected_at' => NULL,
            ),
            120 => 
            array (
                'id' => 148,
                'user_id' => 483,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-03 09:41:33',
                'selected_at' => NULL,
            ),
            121 => 
            array (
                'id' => 149,
                'user_id' => 483,
                'job_id' => 85,
                'selected' => 'Pending',
                'applied_at' => '2020-03-03 09:42:24',
                'selected_at' => NULL,
            ),
            122 => 
            array (
                'id' => 150,
                'user_id' => 486,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 02:02:09',
                'selected_at' => NULL,
            ),
            123 => 
            array (
                'id' => 151,
                'user_id' => 486,
                'job_id' => 85,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 02:02:43',
                'selected_at' => NULL,
            ),
            124 => 
            array (
                'id' => 152,
                'user_id' => 486,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 02:03:30',
                'selected_at' => NULL,
            ),
            125 => 
            array (
                'id' => 153,
                'user_id' => 487,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 03:19:12',
                'selected_at' => NULL,
            ),
            126 => 
            array (
                'id' => 154,
                'user_id' => 488,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 06:09:50',
                'selected_at' => NULL,
            ),
            127 => 
            array (
                'id' => 155,
                'user_id' => 488,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 06:11:03',
                'selected_at' => NULL,
            ),
            128 => 
            array (
                'id' => 156,
                'user_id' => 490,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 08:27:33',
                'selected_at' => NULL,
            ),
            129 => 
            array (
                'id' => 157,
                'user_id' => 492,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-04 23:30:55',
                'selected_at' => NULL,
            ),
            130 => 
            array (
                'id' => 158,
                'user_id' => 491,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-03-05 07:19:20',
                'selected_at' => NULL,
            ),
            131 => 
            array (
                'id' => 159,
                'user_id' => 491,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-05 07:20:36',
                'selected_at' => NULL,
            ),
            132 => 
            array (
                'id' => 160,
                'user_id' => 499,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-06 08:24:02',
                'selected_at' => NULL,
            ),
            133 => 
            array (
                'id' => 161,
                'user_id' => 500,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-07 02:54:36',
                'selected_at' => NULL,
            ),
            134 => 
            array (
                'id' => 162,
                'user_id' => 501,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-07 04:57:01',
                'selected_at' => NULL,
            ),
            135 => 
            array (
                'id' => 163,
                'user_id' => 502,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-03-07 12:40:10',
                'selected_at' => NULL,
            ),
            136 => 
            array (
                'id' => 164,
                'user_id' => 503,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-07 23:10:28',
                'selected_at' => NULL,
            ),
            137 => 
            array (
                'id' => 165,
                'user_id' => 504,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-03-08 05:50:16',
                'selected_at' => NULL,
            ),
            138 => 
            array (
                'id' => 166,
                'user_id' => 511,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-09 17:12:10',
                'selected_at' => NULL,
            ),
            139 => 
            array (
                'id' => 167,
                'user_id' => 513,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-10 01:41:52',
                'selected_at' => NULL,
            ),
            140 => 
            array (
                'id' => 168,
                'user_id' => 513,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-10 01:42:19',
                'selected_at' => NULL,
            ),
            141 => 
            array (
                'id' => 169,
                'user_id' => 515,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-10 03:11:10',
                'selected_at' => NULL,
            ),
            142 => 
            array (
                'id' => 170,
                'user_id' => 517,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-11 01:31:45',
                'selected_at' => NULL,
            ),
            143 => 
            array (
                'id' => 171,
                'user_id' => 518,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-11 04:28:14',
                'selected_at' => NULL,
            ),
            144 => 
            array (
                'id' => 172,
                'user_id' => 520,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-11 08:39:16',
                'selected_at' => NULL,
            ),
            145 => 
            array (
                'id' => 173,
                'user_id' => 521,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-11 11:54:24',
                'selected_at' => NULL,
            ),
            146 => 
            array (
                'id' => 174,
                'user_id' => 521,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-03-11 12:00:19',
                'selected_at' => NULL,
            ),
            147 => 
            array (
                'id' => 175,
                'user_id' => 521,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-11 12:01:05',
                'selected_at' => NULL,
            ),
            148 => 
            array (
                'id' => 176,
                'user_id' => 526,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-12 08:37:48',
                'selected_at' => NULL,
            ),
            149 => 
            array (
                'id' => 177,
                'user_id' => 532,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-14 05:27:53',
                'selected_at' => NULL,
            ),
            150 => 
            array (
                'id' => 178,
                'user_id' => 534,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-14 23:58:49',
                'selected_at' => NULL,
            ),
            151 => 
            array (
                'id' => 179,
                'user_id' => 534,
                'job_id' => 86,
                'selected' => 'Pending',
                'applied_at' => '2020-03-15 00:04:46',
                'selected_at' => NULL,
            ),
            152 => 
            array (
                'id' => 180,
                'user_id' => 534,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-15 00:05:56',
                'selected_at' => NULL,
            ),
            153 => 
            array (
                'id' => 181,
                'user_id' => 540,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-16 00:21:38',
                'selected_at' => NULL,
            ),
            154 => 
            array (
                'id' => 182,
                'user_id' => 541,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-16 02:41:36',
                'selected_at' => NULL,
            ),
            155 => 
            array (
                'id' => 183,
                'user_id' => 544,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-16 12:10:46',
                'selected_at' => NULL,
            ),
            156 => 
            array (
                'id' => 184,
                'user_id' => 549,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-18 00:10:57',
                'selected_at' => NULL,
            ),
            157 => 
            array (
                'id' => 185,
                'user_id' => 559,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-03-27 15:05:37',
                'selected_at' => NULL,
            ),
            158 => 
            array (
                'id' => 186,
                'user_id' => 559,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-03-27 15:06:00',
                'selected_at' => NULL,
            ),
            159 => 
            array (
                'id' => 187,
                'user_id' => 572,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-04-12 13:48:20',
                'selected_at' => NULL,
            ),
            160 => 
            array (
                'id' => 188,
                'user_id' => 573,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-04-12 22:57:46',
                'selected_at' => NULL,
            ),
            161 => 
            array (
                'id' => 189,
                'user_id' => 567,
                'job_id' => 79,
                'selected' => 'Pending',
                'applied_at' => '2020-04-13 23:36:02',
                'selected_at' => NULL,
            ),
            162 => 
            array (
                'id' => 190,
                'user_id' => 591,
                'job_id' => 80,
                'selected' => 'Pending',
                'applied_at' => '2020-04-30 17:45:22',
                'selected_at' => NULL,
            ),
            163 => 
            array (
                'id' => 191,
                'user_id' => 544,
                'job_id' => 87,
                'selected' => 'Pending',
                'applied_at' => '2020-05-17 09:44:19',
                'selected_at' => NULL,
            ),
            164 => 
            array (
                'id' => 192,
                'user_id' => 596,
                'job_id' => 95,
                'selected' => 'Pending',
                'applied_at' => '2020-06-04 04:37:41',
                'selected_at' => NULL,
            ),
            165 => 
            array (
                'id' => 193,
                'user_id' => 541,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-06-05 06:32:28',
                'selected_at' => NULL,
            ),
            166 => 
            array (
                'id' => 194,
                'user_id' => 470,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-06 00:52:26',
                'selected_at' => NULL,
            ),
            167 => 
            array (
                'id' => 195,
                'user_id' => 511,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-06-08 07:48:33',
                'selected_at' => NULL,
            ),
            168 => 
            array (
                'id' => 196,
                'user_id' => 511,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-08 07:51:38',
                'selected_at' => NULL,
            ),
            169 => 
            array (
                'id' => 197,
                'user_id' => 511,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-08 07:52:42',
                'selected_at' => NULL,
            ),
            170 => 
            array (
                'id' => 198,
                'user_id' => 511,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-06-08 07:54:00',
                'selected_at' => NULL,
            ),
            171 => 
            array (
                'id' => 199,
                'user_id' => 631,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-11 08:55:50',
                'selected_at' => NULL,
            ),
            172 => 
            array (
                'id' => 200,
                'user_id' => 634,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 01:26:51',
                'selected_at' => NULL,
            ),
            173 => 
            array (
                'id' => 201,
                'user_id' => 639,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 05:15:16',
                'selected_at' => NULL,
            ),
            174 => 
            array (
                'id' => 202,
                'user_id' => 639,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 05:15:54',
                'selected_at' => NULL,
            ),
            175 => 
            array (
                'id' => 203,
                'user_id' => 639,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 05:16:34',
                'selected_at' => NULL,
            ),
            176 => 
            array (
                'id' => 204,
                'user_id' => 640,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 06:21:34',
                'selected_at' => NULL,
            ),
            177 => 
            array (
                'id' => 205,
                'user_id' => 646,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 18:44:43',
                'selected_at' => NULL,
            ),
            178 => 
            array (
                'id' => 206,
                'user_id' => 646,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 18:49:05',
                'selected_at' => NULL,
            ),
            179 => 
            array (
                'id' => 207,
                'user_id' => 646,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-06-12 19:04:55',
                'selected_at' => NULL,
            ),
            180 => 
            array (
                'id' => 208,
                'user_id' => 662,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-16 01:01:55',
                'selected_at' => NULL,
            ),
            181 => 
            array (
                'id' => 209,
                'user_id' => 662,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-06-16 01:03:01',
                'selected_at' => NULL,
            ),
            182 => 
            array (
                'id' => 210,
                'user_id' => 662,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-06-16 01:04:15',
                'selected_at' => NULL,
            ),
            183 => 
            array (
                'id' => 211,
                'user_id' => 670,
                'job_id' => 98,
                'selected' => 'Pending',
                'applied_at' => '2020-06-17 07:35:22',
                'selected_at' => NULL,
            ),
            184 => 
            array (
                'id' => 212,
                'user_id' => 511,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-06-21 20:54:33',
                'selected_at' => NULL,
            ),
            185 => 
            array (
                'id' => 213,
                'user_id' => 685,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-06-22 01:40:35',
                'selected_at' => NULL,
            ),
            186 => 
            array (
                'id' => 214,
                'user_id' => 691,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-23 01:24:09',
                'selected_at' => NULL,
            ),
            187 => 
            array (
                'id' => 215,
                'user_id' => 720,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-06-29 04:50:24',
                'selected_at' => NULL,
            ),
            188 => 
            array (
                'id' => 216,
                'user_id' => 726,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-29 23:48:11',
                'selected_at' => NULL,
            ),
            189 => 
            array (
                'id' => 217,
                'user_id' => 731,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-06-30 23:16:35',
                'selected_at' => NULL,
            ),
            190 => 
            array (
                'id' => 218,
                'user_id' => 731,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-06-30 23:17:04',
                'selected_at' => NULL,
            ),
            191 => 
            array (
                'id' => 219,
                'user_id' => 735,
                'job_id' => 106,
                'selected' => 'Pending',
                'applied_at' => '2020-07-01 11:06:38',
                'selected_at' => NULL,
            ),
            192 => 
            array (
                'id' => 220,
                'user_id' => 735,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-01 11:07:36',
                'selected_at' => NULL,
            ),
            193 => 
            array (
                'id' => 221,
                'user_id' => 735,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-07-01 11:08:08',
                'selected_at' => NULL,
            ),
            194 => 
            array (
                'id' => 222,
                'user_id' => 735,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-07-01 11:09:27',
                'selected_at' => NULL,
            ),
            195 => 
            array (
                'id' => 223,
                'user_id' => 735,
                'job_id' => 83,
                'selected' => 'Pending',
                'applied_at' => '2020-07-01 11:10:00',
                'selected_at' => NULL,
            ),
            196 => 
            array (
                'id' => 224,
                'user_id' => 543,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-03 03:35:59',
                'selected_at' => NULL,
            ),
            197 => 
            array (
                'id' => 225,
                'user_id' => 669,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-03 09:57:53',
                'selected_at' => NULL,
            ),
            198 => 
            array (
                'id' => 226,
                'user_id' => 615,
                'job_id' => 107,
                'selected' => 'Pending',
                'applied_at' => '2020-07-05 22:54:13',
                'selected_at' => NULL,
            ),
            199 => 
            array (
                'id' => 227,
                'user_id' => 743,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-05 23:49:25',
                'selected_at' => NULL,
            ),
            200 => 
            array (
                'id' => 228,
                'user_id' => 743,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-07-05 23:50:44',
                'selected_at' => NULL,
            ),
            201 => 
            array (
                'id' => 229,
                'user_id' => 304,
                'job_id' => 122,
                'selected' => 'Pending',
                'applied_at' => '2020-07-06 06:06:36',
                'selected_at' => NULL,
            ),
            202 => 
            array (
                'id' => 230,
                'user_id' => 735,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-06 06:40:04',
                'selected_at' => NULL,
            ),
            203 => 
            array (
                'id' => 231,
                'user_id' => 735,
                'job_id' => 107,
                'selected' => 'Pending',
                'applied_at' => '2020-07-06 06:42:19',
                'selected_at' => NULL,
            ),
            204 => 
            array (
                'id' => 232,
                'user_id' => 304,
                'job_id' => 126,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 12:41:33',
                'selected_at' => NULL,
            ),
            205 => 
            array (
                'id' => 233,
                'user_id' => 761,
                'job_id' => 126,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 12:41:56',
                'selected_at' => NULL,
            ),
            206 => 
            array (
                'id' => 234,
                'user_id' => 761,
                'job_id' => 127,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 12:44:23',
                'selected_at' => NULL,
            ),
            207 => 
            array (
                'id' => 235,
                'user_id' => 304,
                'job_id' => 127,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 12:44:42',
                'selected_at' => NULL,
            ),
            208 => 
            array (
                'id' => 236,
                'user_id' => 304,
                'job_id' => 128,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 12:49:25',
                'selected_at' => NULL,
            ),
            209 => 
            array (
                'id' => 237,
                'user_id' => 761,
                'job_id' => 128,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 12:50:14',
                'selected_at' => NULL,
            ),
            210 => 
            array (
                'id' => 238,
                'user_id' => 761,
                'job_id' => 129,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 12:53:49',
                'selected_at' => NULL,
            ),
            211 => 
            array (
                'id' => 239,
                'user_id' => 304,
                'job_id' => 129,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 12:54:05',
                'selected_at' => NULL,
            ),
            212 => 
            array (
                'id' => 240,
                'user_id' => 304,
                'job_id' => 130,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 12:57:58',
                'selected_at' => NULL,
            ),
            213 => 
            array (
                'id' => 241,
                'user_id' => 761,
                'job_id' => 130,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 12:58:16',
                'selected_at' => NULL,
            ),
            214 => 
            array (
                'id' => 242,
                'user_id' => 761,
                'job_id' => 131,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:02:00',
                'selected_at' => NULL,
            ),
            215 => 
            array (
                'id' => 243,
                'user_id' => 304,
                'job_id' => 131,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:02:13',
                'selected_at' => NULL,
            ),
            216 => 
            array (
                'id' => 244,
                'user_id' => 304,
                'job_id' => 132,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:03:28',
                'selected_at' => NULL,
            ),
            217 => 
            array (
                'id' => 245,
                'user_id' => 761,
                'job_id' => 132,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:03:49',
                'selected_at' => NULL,
            ),
            218 => 
            array (
                'id' => 246,
                'user_id' => 761,
                'job_id' => 133,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:05:53',
                'selected_at' => NULL,
            ),
            219 => 
            array (
                'id' => 247,
                'user_id' => 304,
                'job_id' => 133,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:06:11',
                'selected_at' => NULL,
            ),
            220 => 
            array (
                'id' => 248,
                'user_id' => 304,
                'job_id' => 134,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:08:13',
                'selected_at' => NULL,
            ),
            221 => 
            array (
                'id' => 249,
                'user_id' => 761,
                'job_id' => 134,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:08:15',
                'selected_at' => NULL,
            ),
            222 => 
            array (
                'id' => 250,
                'user_id' => 304,
                'job_id' => 135,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:12:42',
                'selected_at' => NULL,
            ),
            223 => 
            array (
                'id' => 251,
                'user_id' => 761,
                'job_id' => 135,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:12:45',
                'selected_at' => NULL,
            ),
            224 => 
            array (
                'id' => 252,
                'user_id' => 304,
                'job_id' => 136,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:17:33',
                'selected_at' => NULL,
            ),
            225 => 
            array (
                'id' => 253,
                'user_id' => 761,
                'job_id' => 136,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:17:41',
                'selected_at' => NULL,
            ),
            226 => 
            array (
                'id' => 254,
                'user_id' => 304,
                'job_id' => 137,
                'selected' => 'Declined',
                'applied_at' => '2020-07-06 13:20:01',
                'selected_at' => NULL,
            ),
            227 => 
            array (
                'id' => 255,
                'user_id' => 761,
                'job_id' => 137,
                'selected' => 'Accepted',
                'applied_at' => '2020-07-06 13:20:03',
                'selected_at' => NULL,
            ),
            228 => 
            array (
                'id' => 256,
                'user_id' => 769,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-07 13:25:52',
                'selected_at' => NULL,
            ),
            229 => 
            array (
                'id' => 257,
                'user_id' => 769,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-07-07 13:26:52',
                'selected_at' => NULL,
            ),
            230 => 
            array (
                'id' => 258,
                'user_id' => 794,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-07-14 02:42:59',
                'selected_at' => NULL,
            ),
            231 => 
            array (
                'id' => 259,
                'user_id' => 794,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-14 02:44:16',
                'selected_at' => NULL,
            ),
            232 => 
            array (
                'id' => 260,
                'user_id' => 794,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-14 02:44:59',
                'selected_at' => NULL,
            ),
            233 => 
            array (
                'id' => 261,
                'user_id' => 794,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-07-14 02:45:43',
                'selected_at' => NULL,
            ),
            234 => 
            array (
                'id' => 262,
                'user_id' => 802,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-14 13:19:01',
                'selected_at' => NULL,
            ),
            235 => 
            array (
                'id' => 263,
                'user_id' => 802,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-07-14 13:20:53',
                'selected_at' => NULL,
            ),
            236 => 
            array (
                'id' => 264,
                'user_id' => 738,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-16 11:38:46',
                'selected_at' => NULL,
            ),
            237 => 
            array (
                'id' => 265,
                'user_id' => 738,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-07-16 11:41:52',
                'selected_at' => NULL,
            ),
            238 => 
            array (
                'id' => 266,
                'user_id' => 738,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-16 11:42:39',
                'selected_at' => NULL,
            ),
            239 => 
            array (
                'id' => 267,
                'user_id' => 821,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-20 01:00:36',
                'selected_at' => NULL,
            ),
            240 => 
            array (
                'id' => 268,
                'user_id' => 831,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-21 05:00:26',
                'selected_at' => NULL,
            ),
            241 => 
            array (
                'id' => 269,
                'user_id' => 838,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-22 05:19:09',
                'selected_at' => NULL,
            ),
            242 => 
            array (
                'id' => 270,
                'user_id' => 838,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-22 05:20:08',
                'selected_at' => NULL,
            ),
            243 => 
            array (
                'id' => 271,
                'user_id' => 851,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-07-23 06:06:04',
                'selected_at' => NULL,
            ),
            244 => 
            array (
                'id' => 272,
                'user_id' => 851,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-07-23 06:06:36',
                'selected_at' => NULL,
            ),
            245 => 
            array (
                'id' => 273,
                'user_id' => 851,
                'job_id' => 97,
                'selected' => 'Pending',
                'applied_at' => '2020-07-23 06:07:09',
                'selected_at' => NULL,
            ),
            246 => 
            array (
                'id' => 274,
                'user_id' => 851,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-07-23 06:07:53',
                'selected_at' => NULL,
            ),
            247 => 
            array (
                'id' => 275,
                'user_id' => 854,
                'job_id' => 107,
                'selected' => 'Pending',
                'applied_at' => '2020-07-23 10:16:28',
                'selected_at' => NULL,
            ),
            248 => 
            array (
                'id' => 276,
                'user_id' => 856,
                'job_id' => 107,
                'selected' => 'Pending',
                'applied_at' => '2020-07-30 12:24:45',
                'selected_at' => NULL,
            ),
            249 => 
            array (
                'id' => 277,
                'user_id' => 631,
                'job_id' => 107,
                'selected' => 'Pending',
                'applied_at' => '2020-08-13 03:50:31',
                'selected_at' => NULL,
            ),
            250 => 
            array (
                'id' => 278,
                'user_id' => 901,
                'job_id' => 105,
                'selected' => 'Pending',
                'applied_at' => '2020-09-02 10:40:07',
                'selected_at' => NULL,
            ),
            251 => 
            array (
                'id' => 279,
                'user_id' => 901,
                'job_id' => 96,
                'selected' => 'Pending',
                'applied_at' => '2020-09-02 10:40:57',
                'selected_at' => NULL,
            ),
            252 => 
            array (
                'id' => 280,
                'user_id' => 901,
                'job_id' => 91,
                'selected' => 'Pending',
                'applied_at' => '2020-09-02 10:41:58',
                'selected_at' => NULL,
            ),
        ));
        
        
    }
}