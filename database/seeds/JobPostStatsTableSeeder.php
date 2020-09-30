<?php

use Illuminate\Database\Seeder;

class JobPostStatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_post_stats')->delete();
        
        \DB::table('job_post_stats')->insert(array (
            0 => 
            array (
                'id' => 1,
                'job_id' => 4,
                'performed_by' => 3,
                'scored_to' => 3,
                'category' => 'viewed',
                'created_at' => '2019-09-26 06:27:24',
            ),
            1 => 
            array (
                'id' => 2,
                'job_id' => 4,
                'performed_by' => 3,
                'scored_to' => 3,
                'category' => 'favourite',
                'created_at' => '2019-09-26 06:27:24',
            ),
            2 => 
            array (
                'id' => 3,
                'job_id' => 4,
                'performed_by' => 4,
                'scored_to' => 4,
                'category' => 'viewed',
                'created_at' => '2019-09-26 06:27:24',
            ),
            3 => 
            array (
                'id' => 4,
                'job_id' => 4,
                'performed_by' => 5,
                'scored_to' => 5,
                'category' => 'viewed',
                'created_at' => '2019-09-26 06:27:24',
            ),
            4 => 
            array (
                'id' => 5,
                'job_id' => 4,
                'performed_by' => 6,
                'scored_to' => 6,
                'category' => 'viewed',
                'created_at' => '2019-09-26 06:27:24',
            ),
            5 => 
            array (
                'id' => 7,
                'job_id' => 4,
                'performed_by' => 2,
                'scored_to' => 6,
                'category' => 'not_suitable',
                'created_at' => '2019-09-30 10:55:52',
            ),
            6 => 
            array (
                'id' => 8,
                'job_id' => 4,
                'performed_by' => 8,
                'scored_to' => 8,
                'category' => 'viewed',
                'created_at' => '2019-09-30 17:57:50',
            ),
            7 => 
            array (
                'id' => 9,
                'job_id' => 26,
                'performed_by' => 8,
                'scored_to' => 8,
                'category' => 'viewed',
                'created_at' => '2019-09-30 18:42:51',
            ),
            8 => 
            array (
                'id' => 10,
                'job_id' => 26,
                'performed_by' => 10,
                'scored_to' => 10,
                'category' => 'viewed',
                'created_at' => '2019-09-30 19:02:47',
            ),
            9 => 
            array (
                'id' => 13,
                'job_id' => 26,
                'performed_by' => 9,
                'scored_to' => 10,
                'category' => 'not_suitable',
                'created_at' => '2019-09-30 19:04:09',
            ),
            10 => 
            array (
                'id' => 14,
                'job_id' => 26,
                'performed_by' => 2,
                'scored_to' => 8,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-04 00:20:01',
            ),
            11 => 
            array (
                'id' => 15,
                'job_id' => 26,
                'performed_by' => 2,
                'scored_to' => 10,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-04 00:20:18',
            ),
            12 => 
            array (
                'id' => 16,
                'job_id' => 4,
                'performed_by' => 2,
                'scored_to' => 8,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-04 07:05:02',
            ),
            13 => 
            array (
                'id' => 17,
                'job_id' => 4,
                'performed_by' => 16,
                'scored_to' => 16,
                'category' => 'viewed',
                'created_at' => '2019-10-04 09:55:00',
            ),
            14 => 
            array (
                'id' => 18,
                'job_id' => 26,
                'performed_by' => 17,
                'scored_to' => 17,
                'category' => 'viewed',
                'created_at' => '2019-10-04 22:22:27',
            ),
            15 => 
            array (
                'id' => 19,
                'job_id' => 26,
                'performed_by' => 9,
                'scored_to' => 17,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-04 22:23:18',
            ),
            16 => 
            array (
                'id' => 20,
                'job_id' => 26,
                'performed_by' => 3,
                'scored_to' => 3,
                'category' => 'viewed',
                'created_at' => '2019-10-07 04:19:41',
            ),
            17 => 
            array (
                'id' => 23,
                'job_id' => 27,
                'performed_by' => 18,
                'scored_to' => 18,
                'category' => 'viewed',
                'created_at' => '2019-10-07 22:23:39',
            ),
            18 => 
            array (
                'id' => 24,
                'job_id' => 26,
                'performed_by' => 19,
                'scored_to' => 19,
                'category' => 'viewed',
                'created_at' => '2019-10-07 23:19:55',
            ),
            19 => 
            array (
                'id' => 25,
                'job_id' => 28,
                'performed_by' => 8,
                'scored_to' => 8,
                'category' => 'viewed',
                'created_at' => '2019-10-08 16:41:36',
            ),
            20 => 
            array (
                'id' => 26,
                'job_id' => 4,
                'performed_by' => 2,
                'scored_to' => 3,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-11 01:05:15',
            ),
            21 => 
            array (
                'id' => 27,
                'job_id' => 4,
                'performed_by' => 2,
                'scored_to' => 16,
                'category' => 'favourite',
                'created_at' => '2019-10-11 01:08:49',
            ),
            22 => 
            array (
                'id' => 28,
                'job_id' => 4,
                'performed_by' => 2,
                'scored_to' => 6,
                'category' => 'favourite',
                'created_at' => '2019-10-11 01:08:53',
            ),
            23 => 
            array (
                'id' => 29,
                'job_id' => 27,
                'performed_by' => 3,
                'scored_to' => 3,
                'category' => 'viewed',
                'created_at' => '2019-10-11 21:07:36',
            ),
            24 => 
            array (
                'id' => 30,
                'job_id' => 31,
                'performed_by' => 7,
                'scored_to' => 7,
                'category' => 'viewed',
                'created_at' => '2019-10-12 11:55:23',
            ),
            25 => 
            array (
                'id' => 33,
                'job_id' => 31,
                'performed_by' => 22,
                'scored_to' => 7,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-12 11:56:10',
            ),
            26 => 
            array (
                'id' => 34,
                'job_id' => 31,
                'performed_by' => 22,
                'scored_to' => 7,
                'category' => 'favourite',
                'created_at' => '2019-10-12 11:56:46',
            ),
            27 => 
            array (
                'id' => 35,
                'job_id' => 33,
                'performed_by' => 7,
                'scored_to' => 7,
                'category' => 'viewed',
                'created_at' => '2019-10-12 12:26:01',
            ),
            28 => 
            array (
                'id' => 36,
                'job_id' => 35,
                'performed_by' => 18,
                'scored_to' => 18,
                'category' => 'viewed',
                'created_at' => '2019-10-16 02:11:35',
            ),
            29 => 
            array (
                'id' => 37,
                'job_id' => 38,
                'performed_by' => 221,
                'scored_to' => 221,
                'category' => 'viewed',
                'created_at' => '2019-10-18 01:00:13',
            ),
            30 => 
            array (
                'id' => 38,
                'job_id' => 41,
                'performed_by' => 221,
                'scored_to' => 221,
                'category' => 'viewed',
                'created_at' => '2019-10-18 01:11:11',
            ),
            31 => 
            array (
                'id' => 39,
                'job_id' => 37,
                'performed_by' => 221,
                'scored_to' => 221,
                'category' => 'viewed',
                'created_at' => '2019-10-18 01:12:06',
            ),
            32 => 
            array (
                'id' => 40,
                'job_id' => 35,
                'performed_by' => 221,
                'scored_to' => 221,
                'category' => 'viewed',
                'created_at' => '2019-10-18 01:13:17',
            ),
            33 => 
            array (
                'id' => 41,
                'job_id' => 38,
                'performed_by' => 222,
                'scored_to' => 221,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-10-18 01:19:22',
            ),
            34 => 
            array (
                'id' => 42,
                'job_id' => 37,
                'performed_by' => 224,
                'scored_to' => 224,
                'category' => 'viewed',
                'created_at' => '2019-10-18 01:31:49',
            ),
            35 => 
            array (
                'id' => 44,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 224,
                'category' => 'favourite',
                'created_at' => '2019-10-18 01:33:15',
            ),
            36 => 
            array (
                'id' => 45,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 221,
                'category' => 'not_suitable',
                'created_at' => '2019-10-18 01:33:17',
            ),
            37 => 
            array (
                'id' => 46,
                'job_id' => 43,
                'performed_by' => 8,
                'scored_to' => 8,
                'category' => 'viewed',
                'created_at' => '2019-10-22 15:30:22',
            ),
            38 => 
            array (
                'id' => 47,
                'job_id' => 43,
                'performed_by' => 234,
                'scored_to' => 234,
                'category' => 'viewed',
                'created_at' => '2019-10-30 08:41:18',
            ),
            39 => 
            array (
                'id' => 48,
                'job_id' => 26,
                'performed_by' => 9,
                'scored_to' => 3,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-11-07 15:40:15',
            ),
            40 => 
            array (
                'id' => 49,
                'job_id' => 37,
                'performed_by' => 248,
                'scored_to' => 248,
                'category' => 'viewed',
                'created_at' => '2019-11-12 02:16:48',
            ),
            41 => 
            array (
                'id' => 50,
                'job_id' => 31,
                'performed_by' => 248,
                'scored_to' => 248,
                'category' => 'viewed',
                'created_at' => '2019-11-12 02:17:49',
            ),
            42 => 
            array (
                'id' => 51,
                'job_id' => 43,
                'performed_by' => 253,
                'scored_to' => 253,
                'category' => 'viewed',
                'created_at' => '2019-11-12 21:32:27',
            ),
            43 => 
            array (
                'id' => 52,
                'job_id' => 31,
                'performed_by' => 253,
                'scored_to' => 253,
                'category' => 'viewed',
                'created_at' => '2019-11-12 21:33:06',
            ),
            44 => 
            array (
                'id' => 53,
                'job_id' => 43,
                'performed_by' => 255,
                'scored_to' => 255,
                'category' => 'viewed',
                'created_at' => '2019-11-13 04:38:34',
            ),
            45 => 
            array (
                'id' => 54,
                'job_id' => 37,
                'performed_by' => 255,
                'scored_to' => 255,
                'category' => 'viewed',
                'created_at' => '2019-11-13 04:39:46',
            ),
            46 => 
            array (
                'id' => 55,
                'job_id' => 43,
                'performed_by' => 260,
                'scored_to' => 260,
                'category' => 'viewed',
                'created_at' => '2019-11-14 06:53:19',
            ),
            47 => 
            array (
                'id' => 56,
                'job_id' => 31,
                'performed_by' => 260,
                'scored_to' => 260,
                'category' => 'viewed',
                'created_at' => '2019-11-14 06:56:27',
            ),
            48 => 
            array (
                'id' => 57,
                'job_id' => 37,
                'performed_by' => 260,
                'scored_to' => 260,
                'category' => 'viewed',
                'created_at' => '2019-11-14 06:57:34',
            ),
            49 => 
            array (
                'id' => 58,
                'job_id' => 43,
                'performed_by' => 262,
                'scored_to' => 262,
                'category' => 'viewed',
                'created_at' => '2019-11-15 00:16:54',
            ),
            50 => 
            array (
                'id' => 59,
                'job_id' => 37,
                'performed_by' => 262,
                'scored_to' => 262,
                'category' => 'viewed',
                'created_at' => '2019-11-15 00:17:42',
            ),
            51 => 
            array (
                'id' => 60,
                'job_id' => 31,
                'performed_by' => 262,
                'scored_to' => 262,
                'category' => 'viewed',
                'created_at' => '2019-11-15 00:18:32',
            ),
            52 => 
            array (
                'id' => 61,
                'job_id' => 43,
                'performed_by' => 263,
                'scored_to' => 263,
                'category' => 'viewed',
                'created_at' => '2019-11-15 01:51:51',
            ),
            53 => 
            array (
                'id' => 62,
                'job_id' => 31,
                'performed_by' => 263,
                'scored_to' => 263,
                'category' => 'viewed',
                'created_at' => '2019-11-15 01:58:53',
            ),
            54 => 
            array (
                'id' => 63,
                'job_id' => 37,
                'performed_by' => 268,
                'scored_to' => 268,
                'category' => 'viewed',
                'created_at' => '2019-11-17 23:52:45',
            ),
            55 => 
            array (
                'id' => 64,
                'job_id' => 31,
                'performed_by' => 268,
                'scored_to' => 268,
                'category' => 'viewed',
                'created_at' => '2019-11-17 23:53:02',
            ),
            56 => 
            array (
                'id' => 65,
                'job_id' => 43,
                'performed_by' => 268,
                'scored_to' => 268,
                'category' => 'viewed',
                'created_at' => '2019-11-17 23:53:24',
            ),
            57 => 
            array (
                'id' => 66,
                'job_id' => 43,
                'performed_by' => 271,
                'scored_to' => 271,
                'category' => 'viewed',
                'created_at' => '2019-11-18 07:27:46',
            ),
            58 => 
            array (
                'id' => 67,
                'job_id' => 37,
                'performed_by' => 271,
                'scored_to' => 271,
                'category' => 'viewed',
                'created_at' => '2019-11-18 07:28:17',
            ),
            59 => 
            array (
                'id' => 68,
                'job_id' => 31,
                'performed_by' => 273,
                'scored_to' => 273,
                'category' => 'viewed',
                'created_at' => '2019-11-19 03:54:03',
            ),
            60 => 
            array (
                'id' => 69,
                'job_id' => 43,
                'performed_by' => 274,
                'scored_to' => 274,
                'category' => 'viewed',
                'created_at' => '2019-11-19 04:20:26',
            ),
            61 => 
            array (
                'id' => 70,
                'job_id' => 43,
                'performed_by' => 278,
                'scored_to' => 278,
                'category' => 'viewed',
                'created_at' => '2019-11-19 13:32:07',
            ),
            62 => 
            array (
                'id' => 71,
                'job_id' => 47,
                'performed_by' => 278,
                'scored_to' => 278,
                'category' => 'viewed',
                'created_at' => '2019-11-19 13:37:17',
            ),
            63 => 
            array (
                'id' => 72,
                'job_id' => 47,
                'performed_by' => 279,
                'scored_to' => 278,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-11-19 13:38:13',
            ),
            64 => 
            array (
                'id' => 73,
                'job_id' => 47,
                'performed_by' => 279,
                'scored_to' => 278,
                'category' => 'favourite',
                'created_at' => '2019-11-19 13:38:20',
            ),
            65 => 
            array (
                'id' => 74,
                'job_id' => 54,
                'performed_by' => 230,
                'scored_to' => 230,
                'category' => 'viewed',
                'created_at' => '2019-11-19 15:35:04',
            ),
            66 => 
            array (
                'id' => 75,
                'job_id' => 55,
                'performed_by' => 230,
                'scored_to' => 230,
                'category' => 'viewed',
                'created_at' => '2019-11-19 16:12:12',
            ),
            67 => 
            array (
                'id' => 76,
                'job_id' => 37,
                'performed_by' => 282,
                'scored_to' => 282,
                'category' => 'viewed',
                'created_at' => '2019-11-20 00:08:32',
            ),
            68 => 
            array (
                'id' => 77,
                'job_id' => 35,
                'performed_by' => 284,
                'scored_to' => 284,
                'category' => 'viewed',
                'created_at' => '2019-11-20 04:42:27',
            ),
            69 => 
            array (
                'id' => 78,
                'job_id' => 31,
                'performed_by' => 285,
                'scored_to' => 285,
                'category' => 'viewed',
                'created_at' => '2019-11-20 08:06:30',
            ),
            70 => 
            array (
                'id' => 79,
                'job_id' => 43,
                'performed_by' => 287,
                'scored_to' => 287,
                'category' => 'viewed',
                'created_at' => '2019-11-20 10:38:44',
            ),
            71 => 
            array (
                'id' => 80,
                'job_id' => 37,
                'performed_by' => 287,
                'scored_to' => 287,
                'category' => 'viewed',
                'created_at' => '2019-11-20 10:39:16',
            ),
            72 => 
            array (
                'id' => 81,
                'job_id' => 31,
                'performed_by' => 287,
                'scored_to' => 287,
                'category' => 'viewed',
                'created_at' => '2019-11-20 10:39:51',
            ),
            73 => 
            array (
                'id' => 82,
                'job_id' => 47,
                'performed_by' => 290,
                'scored_to' => 290,
                'category' => 'viewed',
                'created_at' => '2019-11-20 20:03:04',
            ),
            74 => 
            array (
                'id' => 89,
                'job_id' => 67,
                'performed_by' => 295,
                'scored_to' => 295,
                'category' => 'viewed',
                'created_at' => '2019-11-22 05:53:09',
            ),
            75 => 
            array (
                'id' => 90,
                'job_id' => 67,
                'performed_by' => 294,
                'scored_to' => 295,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-11-22 05:54:24',
            ),
            76 => 
            array (
                'id' => 92,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 282,
                'category' => 'not_suitable',
                'created_at' => '2019-11-22 12:17:10',
            ),
            77 => 
            array (
                'id' => 93,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 271,
                'category' => 'not_suitable',
                'created_at' => '2019-11-22 12:17:12',
            ),
            78 => 
            array (
                'id' => 94,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 268,
                'category' => 'favourite',
                'created_at' => '2019-11-22 12:17:14',
            ),
            79 => 
            array (
                'id' => 95,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 262,
                'category' => 'favourite',
                'created_at' => '2019-11-22 12:17:17',
            ),
            80 => 
            array (
                'id' => 96,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 248,
                'category' => 'not_suitable',
                'created_at' => '2019-11-22 12:17:18',
            ),
            81 => 
            array (
                'id' => 97,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 255,
                'category' => 'not_suitable',
                'created_at' => '2019-11-22 12:17:20',
            ),
            82 => 
            array (
                'id' => 98,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 260,
                'category' => 'not_suitable',
                'created_at' => '2019-11-22 12:17:21',
            ),
            83 => 
            array (
                'id' => 99,
                'job_id' => 37,
                'performed_by' => 29,
                'scored_to' => 287,
                'category' => 'favourite',
                'created_at' => '2019-11-22 12:17:25',
            ),
            84 => 
            array (
                'id' => 100,
                'job_id' => 37,
                'performed_by' => 165,
                'scored_to' => 165,
                'category' => 'viewed',
                'created_at' => '2019-11-22 12:47:51',
            ),
            85 => 
            array (
                'id' => 101,
                'job_id' => 31,
                'performed_by' => 165,
                'scored_to' => 165,
                'category' => 'viewed',
                'created_at' => '2019-11-22 12:48:19',
            ),
            86 => 
            array (
                'id' => 110,
                'job_id' => 55,
                'performed_by' => 2,
                'scored_to' => 230,
                'category' => 'company_viewed_profile',
                'created_at' => '2019-12-03 01:44:37',
            ),
            87 => 
            array (
                'id' => 113,
                'job_id' => 43,
                'performed_by' => 160,
                'scored_to' => 160,
                'category' => 'viewed',
                'created_at' => '2019-12-06 11:44:45',
            ),
            88 => 
            array (
                'id' => 115,
                'job_id' => 37,
                'performed_by' => 244,
                'scored_to' => 244,
                'category' => 'viewed',
                'created_at' => '2020-01-14 00:49:43',
            ),
            89 => 
            array (
                'id' => 116,
                'job_id' => 75,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-01-21 00:25:53',
            ),
            90 => 
            array (
                'id' => 117,
                'job_id' => 43,
                'performed_by' => 307,
                'scored_to' => 307,
                'category' => 'viewed',
                'created_at' => '2020-01-29 20:30:17',
            ),
            91 => 
            array (
                'id' => 118,
                'job_id' => 37,
                'performed_by' => 307,
                'scored_to' => 307,
                'category' => 'viewed',
                'created_at' => '2020-01-29 20:34:12',
            ),
            92 => 
            array (
                'id' => 119,
                'job_id' => 31,
                'performed_by' => 307,
                'scored_to' => 307,
                'category' => 'viewed',
                'created_at' => '2020-01-29 20:34:37',
            ),
            93 => 
            array (
                'id' => 120,
                'job_id' => 31,
                'performed_by' => 311,
                'scored_to' => 311,
                'category' => 'viewed',
                'created_at' => '2020-02-12 10:54:15',
            ),
            94 => 
            array (
                'id' => 121,
                'job_id' => 37,
                'performed_by' => 311,
                'scored_to' => 311,
                'category' => 'viewed',
                'created_at' => '2020-02-12 10:54:48',
            ),
            95 => 
            array (
                'id' => 122,
                'job_id' => 43,
                'performed_by' => 311,
                'scored_to' => 311,
                'category' => 'viewed',
                'created_at' => '2020-02-12 10:55:09',
            ),
            96 => 
            array (
                'id' => 123,
                'job_id' => 79,
                'performed_by' => 314,
                'scored_to' => 314,
                'category' => 'viewed',
                'created_at' => '2020-02-13 23:45:45',
            ),
            97 => 
            array (
                'id' => 124,
                'job_id' => 79,
                'performed_by' => 316,
                'scored_to' => 316,
                'category' => 'viewed',
                'created_at' => '2020-02-14 01:24:54',
            ),
            98 => 
            array (
                'id' => 125,
                'job_id' => 79,
                'performed_by' => 320,
                'scored_to' => 320,
                'category' => 'viewed',
                'created_at' => '2020-02-14 22:13:57',
            ),
            99 => 
            array (
                'id' => 126,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 320,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-14 22:25:49',
            ),
            100 => 
            array (
                'id' => 127,
                'job_id' => 79,
                'performed_by' => 322,
                'scored_to' => 322,
                'category' => 'viewed',
                'created_at' => '2020-02-15 04:16:26',
            ),
            101 => 
            array (
                'id' => 128,
                'job_id' => 79,
                'performed_by' => 321,
                'scored_to' => 321,
                'category' => 'viewed',
                'created_at' => '2020-02-15 11:45:30',
            ),
            102 => 
            array (
                'id' => 129,
                'job_id' => 79,
                'performed_by' => 326,
                'scored_to' => 326,
                'category' => 'viewed',
                'created_at' => '2020-02-16 03:35:14',
            ),
            103 => 
            array (
                'id' => 130,
                'job_id' => 82,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-02-16 23:34:34',
            ),
            104 => 
            array (
                'id' => 131,
                'job_id' => 79,
                'performed_by' => 332,
                'scored_to' => 332,
                'category' => 'viewed',
                'created_at' => '2020-02-17 01:37:30',
            ),
            105 => 
            array (
                'id' => 132,
                'job_id' => 79,
                'performed_by' => 337,
                'scored_to' => 337,
                'category' => 'viewed',
                'created_at' => '2020-02-17 01:54:01',
            ),
            106 => 
            array (
                'id' => 133,
                'job_id' => 79,
                'performed_by' => 338,
                'scored_to' => 338,
                'category' => 'viewed',
                'created_at' => '2020-02-17 03:28:40',
            ),
            107 => 
            array (
                'id' => 134,
                'job_id' => 79,
                'performed_by' => 327,
                'scored_to' => 327,
                'category' => 'viewed',
                'created_at' => '2020-02-17 05:38:02',
            ),
            108 => 
            array (
                'id' => 135,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 314,
                'category' => 'not_suitable',
                'created_at' => '2020-02-17 07:20:13',
            ),
            109 => 
            array (
                'id' => 136,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 316,
                'category' => 'not_suitable',
                'created_at' => '2020-02-17 07:20:14',
            ),
            110 => 
            array (
                'id' => 137,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 320,
                'category' => 'favourite',
                'created_at' => '2020-02-17 07:20:17',
            ),
            111 => 
            array (
                'id' => 139,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 321,
                'category' => 'favourite',
                'created_at' => '2020-02-17 07:28:03',
            ),
            112 => 
            array (
                'id' => 140,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 322,
                'category' => 'not_suitable',
                'created_at' => '2020-02-17 07:28:04',
            ),
            113 => 
            array (
                'id' => 142,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 337,
                'category' => 'not_suitable',
                'created_at' => '2020-02-17 07:31:22',
            ),
            114 => 
            array (
                'id' => 143,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 338,
                'category' => 'not_suitable',
                'created_at' => '2020-02-17 07:31:23',
            ),
            115 => 
            array (
                'id' => 144,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 326,
                'category' => 'not_suitable',
                'created_at' => '2020-02-17 07:39:40',
            ),
            116 => 
            array (
                'id' => 145,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 327,
                'category' => 'favourite',
                'created_at' => '2020-02-17 07:39:47',
            ),
            117 => 
            array (
                'id' => 146,
                'job_id' => 79,
                'performed_by' => 344,
                'scored_to' => 344,
                'category' => 'viewed',
                'created_at' => '2020-02-18 03:14:58',
            ),
            118 => 
            array (
                'id' => 147,
                'job_id' => 79,
                'performed_by' => 357,
                'scored_to' => 357,
                'category' => 'viewed',
                'created_at' => '2020-02-18 05:28:59',
            ),
            119 => 
            array (
                'id' => 148,
                'job_id' => 79,
                'performed_by' => 358,
                'scored_to' => 358,
                'category' => 'viewed',
                'created_at' => '2020-02-18 05:52:07',
            ),
            120 => 
            array (
                'id' => 149,
                'job_id' => 79,
                'performed_by' => 360,
                'scored_to' => 360,
                'category' => 'viewed',
                'created_at' => '2020-02-18 07:27:16',
            ),
            121 => 
            array (
                'id' => 150,
                'job_id' => 79,
                'performed_by' => 362,
                'scored_to' => 362,
                'category' => 'viewed',
                'created_at' => '2020-02-19 02:22:35',
            ),
            122 => 
            array (
                'id' => 151,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 332,
                'category' => 'not_suitable',
                'created_at' => '2020-02-20 08:45:32',
            ),
            123 => 
            array (
                'id' => 152,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 344,
                'category' => 'not_suitable',
                'created_at' => '2020-02-20 08:45:35',
            ),
            124 => 
            array (
                'id' => 153,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 357,
                'category' => 'favourite',
                'created_at' => '2020-02-20 08:45:38',
            ),
            125 => 
            array (
                'id' => 154,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 358,
                'category' => 'not_suitable',
                'created_at' => '2020-02-20 08:49:48',
            ),
            126 => 
            array (
                'id' => 155,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 360,
                'category' => 'not_suitable',
                'created_at' => '2020-02-20 08:49:49',
            ),
            127 => 
            array (
                'id' => 156,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 362,
                'category' => 'not_suitable',
                'created_at' => '2020-02-20 08:49:50',
            ),
            128 => 
            array (
                'id' => 157,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 362,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-20 09:01:21',
            ),
            129 => 
            array (
                'id' => 158,
                'job_id' => 79,
                'performed_by' => 367,
                'scored_to' => 367,
                'category' => 'viewed',
                'created_at' => '2020-02-20 10:14:23',
            ),
            130 => 
            array (
                'id' => 159,
                'job_id' => 79,
                'performed_by' => 381,
                'scored_to' => 381,
                'category' => 'viewed',
                'created_at' => '2020-02-21 07:06:28',
            ),
            131 => 
            array (
                'id' => 160,
                'job_id' => 83,
                'performed_by' => 384,
                'scored_to' => 384,
                'category' => 'viewed',
                'created_at' => '2020-02-21 12:24:33',
            ),
            132 => 
            array (
                'id' => 161,
                'job_id' => 80,
                'performed_by' => 383,
                'scored_to' => 383,
                'category' => 'viewed',
                'created_at' => '2020-02-22 01:15:40',
            ),
            133 => 
            array (
                'id' => 162,
                'job_id' => 83,
                'performed_by' => 389,
                'scored_to' => 389,
                'category' => 'viewed',
                'created_at' => '2020-02-22 05:27:25',
            ),
            134 => 
            array (
                'id' => 163,
                'job_id' => 83,
                'performed_by' => 392,
                'scored_to' => 392,
                'category' => 'viewed',
                'created_at' => '2020-02-22 08:00:25',
            ),
            135 => 
            array (
                'id' => 164,
                'job_id' => 79,
                'performed_by' => 399,
                'scored_to' => 399,
                'category' => 'viewed',
                'created_at' => '2020-02-23 08:18:40',
            ),
            136 => 
            array (
                'id' => 165,
                'job_id' => 83,
                'performed_by' => 368,
                'scored_to' => 392,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-24 01:36:41',
            ),
            137 => 
            array (
                'id' => 166,
                'job_id' => 83,
                'performed_by' => 405,
                'scored_to' => 405,
                'category' => 'viewed',
                'created_at' => '2020-02-24 02:20:06',
            ),
            138 => 
            array (
                'id' => 167,
                'job_id' => 86,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-02-24 02:39:48',
            ),
            139 => 
            array (
                'id' => 168,
                'job_id' => 86,
                'performed_by' => 305,
                'scored_to' => 304,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-24 02:40:00',
            ),
            140 => 
            array (
                'id' => 169,
                'job_id' => 83,
                'performed_by' => 368,
                'scored_to' => 405,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-24 06:39:42',
            ),
            141 => 
            array (
                'id' => 170,
                'job_id' => 79,
                'performed_by' => 41,
                'scored_to' => 41,
                'category' => 'viewed',
                'created_at' => '2020-02-24 09:04:59',
            ),
            142 => 
            array (
                'id' => 171,
                'job_id' => 79,
                'performed_by' => 408,
                'scored_to' => 408,
                'category' => 'viewed',
                'created_at' => '2020-02-24 09:19:02',
            ),
            143 => 
            array (
                'id' => 172,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 408,
                'category' => 'not_suitable',
                'created_at' => '2020-02-24 21:08:40',
            ),
            144 => 
            array (
                'id' => 173,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 399,
                'category' => 'not_suitable',
                'created_at' => '2020-02-24 21:08:43',
            ),
            145 => 
            array (
                'id' => 174,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 41,
                'category' => 'favourite',
                'created_at' => '2020-02-24 21:08:50',
            ),
            146 => 
            array (
                'id' => 175,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 381,
                'category' => 'not_suitable',
                'created_at' => '2020-02-24 21:10:40',
            ),
            147 => 
            array (
                'id' => 176,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 367,
                'category' => 'favourite',
                'created_at' => '2020-02-24 21:10:42',
            ),
            148 => 
            array (
                'id' => 177,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 367,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-24 21:10:45',
            ),
            149 => 
            array (
                'id' => 178,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 41,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-24 21:16:11',
            ),
            150 => 
            array (
                'id' => 179,
                'job_id' => 80,
                'performed_by' => 28,
                'scored_to' => 383,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-24 21:25:58',
            ),
            151 => 
            array (
                'id' => 180,
                'job_id' => 83,
                'performed_by' => 368,
                'scored_to' => 389,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-25 03:36:51',
            ),
            152 => 
            array (
                'id' => 181,
                'job_id' => 79,
                'performed_by' => 414,
                'scored_to' => 414,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:21:48',
            ),
            153 => 
            array (
                'id' => 182,
                'job_id' => 83,
                'performed_by' => 414,
                'scored_to' => 414,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:22:42',
            ),
            154 => 
            array (
                'id' => 183,
                'job_id' => 80,
                'performed_by' => 414,
                'scored_to' => 414,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:22:59',
            ),
            155 => 
            array (
                'id' => 184,
                'job_id' => 80,
                'performed_by' => 413,
                'scored_to' => 413,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:25:10',
            ),
            156 => 
            array (
                'id' => 185,
                'job_id' => 79,
                'performed_by' => 415,
                'scored_to' => 415,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:25:35',
            ),
            157 => 
            array (
                'id' => 186,
                'job_id' => 83,
                'performed_by' => 416,
                'scored_to' => 416,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:38:57',
            ),
            158 => 
            array (
                'id' => 187,
                'job_id' => 83,
                'performed_by' => 374,
                'scored_to' => 374,
                'category' => 'viewed',
                'created_at' => '2020-02-25 05:39:44',
            ),
            159 => 
            array (
                'id' => 188,
                'job_id' => 79,
                'performed_by' => 400,
                'scored_to' => 400,
                'category' => 'viewed',
                'created_at' => '2020-02-25 06:14:09',
            ),
            160 => 
            array (
                'id' => 189,
                'job_id' => 83,
                'performed_by' => 422,
                'scored_to' => 422,
                'category' => 'viewed',
                'created_at' => '2020-02-25 06:32:17',
            ),
            161 => 
            array (
                'id' => 190,
                'job_id' => 83,
                'performed_by' => 407,
                'scored_to' => 407,
                'category' => 'viewed',
                'created_at' => '2020-02-25 07:44:17',
            ),
            162 => 
            array (
                'id' => 191,
                'job_id' => 80,
                'performed_by' => 423,
                'scored_to' => 423,
                'category' => 'viewed',
                'created_at' => '2020-02-25 07:47:47',
            ),
            163 => 
            array (
                'id' => 192,
                'job_id' => 34,
                'performed_by' => 423,
                'scored_to' => 423,
                'category' => 'viewed',
                'created_at' => '2020-02-25 07:50:06',
            ),
            164 => 
            array (
                'id' => 193,
                'job_id' => 79,
                'performed_by' => 423,
                'scored_to' => 423,
                'category' => 'viewed',
                'created_at' => '2020-02-25 08:01:49',
            ),
            165 => 
            array (
                'id' => 194,
                'job_id' => 80,
                'performed_by' => 429,
                'scored_to' => 429,
                'category' => 'viewed',
                'created_at' => '2020-02-25 11:39:25',
            ),
            166 => 
            array (
                'id' => 195,
                'job_id' => 79,
                'performed_by' => 429,
                'scored_to' => 429,
                'category' => 'viewed',
                'created_at' => '2020-02-25 11:40:31',
            ),
            167 => 
            array (
                'id' => 196,
                'job_id' => 79,
                'performed_by' => 431,
                'scored_to' => 431,
                'category' => 'viewed',
                'created_at' => '2020-02-25 17:15:13',
            ),
            168 => 
            array (
                'id' => 197,
                'job_id' => 86,
                'performed_by' => 305,
                'scored_to' => 304,
                'category' => 'favourite',
                'created_at' => '2020-02-26 01:04:39',
            ),
            169 => 
            array (
                'id' => 198,
                'job_id' => 80,
                'performed_by' => 433,
                'scored_to' => 433,
                'category' => 'viewed',
                'created_at' => '2020-02-26 01:05:39',
            ),
            170 => 
            array (
                'id' => 199,
                'job_id' => 83,
                'performed_by' => 439,
                'scored_to' => 439,
                'category' => 'viewed',
                'created_at' => '2020-02-26 11:08:47',
            ),
            171 => 
            array (
                'id' => 200,
                'job_id' => 83,
                'performed_by' => 440,
                'scored_to' => 440,
                'category' => 'viewed',
                'created_at' => '2020-02-26 11:51:43',
            ),
            172 => 
            array (
                'id' => 201,
                'job_id' => 83,
                'performed_by' => 443,
                'scored_to' => 443,
                'category' => 'viewed',
                'created_at' => '2020-02-27 06:15:58',
            ),
            173 => 
            array (
                'id' => 202,
                'job_id' => 80,
                'performed_by' => 445,
                'scored_to' => 445,
                'category' => 'viewed',
                'created_at' => '2020-02-27 09:59:45',
            ),
            174 => 
            array (
                'id' => 203,
                'job_id' => 83,
                'performed_by' => 446,
                'scored_to' => 446,
                'category' => 'viewed',
                'created_at' => '2020-02-27 11:27:38',
            ),
            175 => 
            array (
                'id' => 204,
                'job_id' => 86,
                'performed_by' => 446,
                'scored_to' => 446,
                'category' => 'viewed',
                'created_at' => '2020-02-27 11:28:38',
            ),
            176 => 
            array (
                'id' => 205,
                'job_id' => 85,
                'performed_by' => 446,
                'scored_to' => 446,
                'category' => 'viewed',
                'created_at' => '2020-02-27 11:29:10',
            ),
            177 => 
            array (
                'id' => 206,
                'job_id' => 34,
                'performed_by' => 441,
                'scored_to' => 441,
                'category' => 'viewed',
                'created_at' => '2020-02-27 13:07:20',
            ),
            178 => 
            array (
                'id' => 207,
                'job_id' => 85,
                'performed_by' => 387,
                'scored_to' => 446,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-02-27 21:01:04',
            ),
            179 => 
            array (
                'id' => 208,
                'job_id' => 86,
                'performed_by' => 392,
                'scored_to' => 392,
                'category' => 'viewed',
                'created_at' => '2020-02-28 07:16:54',
            ),
            180 => 
            array (
                'id' => 209,
                'job_id' => 80,
                'performed_by' => 452,
                'scored_to' => 452,
                'category' => 'viewed',
                'created_at' => '2020-02-29 02:19:31',
            ),
            181 => 
            array (
                'id' => 210,
                'job_id' => 80,
                'performed_by' => 469,
                'scored_to' => 469,
                'category' => 'viewed',
                'created_at' => '2020-03-02 08:30:13',
            ),
            182 => 
            array (
                'id' => 211,
                'job_id' => 79,
                'performed_by' => 472,
                'scored_to' => 472,
                'category' => 'viewed',
                'created_at' => '2020-03-02 13:45:51',
            ),
            183 => 
            array (
                'id' => 212,
                'job_id' => 80,
                'performed_by' => 472,
                'scored_to' => 472,
                'category' => 'viewed',
                'created_at' => '2020-03-02 13:46:57',
            ),
            184 => 
            array (
                'id' => 213,
                'job_id' => 83,
                'performed_by' => 475,
                'scored_to' => 475,
                'category' => 'viewed',
                'created_at' => '2020-03-03 00:57:00',
            ),
            185 => 
            array (
                'id' => 214,
                'job_id' => 83,
                'performed_by' => 476,
                'scored_to' => 476,
                'category' => 'viewed',
                'created_at' => '2020-03-03 01:46:22',
            ),
            186 => 
            array (
                'id' => 215,
                'job_id' => 86,
                'performed_by' => 483,
                'scored_to' => 483,
                'category' => 'viewed',
                'created_at' => '2020-03-03 09:39:01',
            ),
            187 => 
            array (
                'id' => 216,
                'job_id' => 79,
                'performed_by' => 483,
                'scored_to' => 483,
                'category' => 'viewed',
                'created_at' => '2020-03-03 09:40:47',
            ),
            188 => 
            array (
                'id' => 217,
                'job_id' => 83,
                'performed_by' => 483,
                'scored_to' => 483,
                'category' => 'viewed',
                'created_at' => '2020-03-03 09:41:34',
            ),
            189 => 
            array (
                'id' => 218,
                'job_id' => 85,
                'performed_by' => 483,
                'scored_to' => 483,
                'category' => 'viewed',
                'created_at' => '2020-03-03 09:42:25',
            ),
            190 => 
            array (
                'id' => 219,
                'job_id' => 80,
                'performed_by' => 486,
                'scored_to' => 486,
                'category' => 'viewed',
                'created_at' => '2020-03-04 02:02:11',
            ),
            191 => 
            array (
                'id' => 220,
                'job_id' => 85,
                'performed_by' => 486,
                'scored_to' => 486,
                'category' => 'viewed',
                'created_at' => '2020-03-04 02:02:45',
            ),
            192 => 
            array (
                'id' => 221,
                'job_id' => 79,
                'performed_by' => 486,
                'scored_to' => 486,
                'category' => 'viewed',
                'created_at' => '2020-03-04 02:03:31',
            ),
            193 => 
            array (
                'id' => 222,
                'job_id' => 79,
                'performed_by' => 487,
                'scored_to' => 487,
                'category' => 'viewed',
                'created_at' => '2020-03-04 03:19:13',
            ),
            194 => 
            array (
                'id' => 223,
                'job_id' => 79,
                'performed_by' => 488,
                'scored_to' => 488,
                'category' => 'viewed',
                'created_at' => '2020-03-04 06:09:52',
            ),
            195 => 
            array (
                'id' => 224,
                'job_id' => 80,
                'performed_by' => 488,
                'scored_to' => 488,
                'category' => 'viewed',
                'created_at' => '2020-03-04 06:11:04',
            ),
            196 => 
            array (
                'id' => 225,
                'job_id' => 79,
                'performed_by' => 490,
                'scored_to' => 490,
                'category' => 'viewed',
                'created_at' => '2020-03-04 08:27:35',
            ),
            197 => 
            array (
                'id' => 226,
                'job_id' => 83,
                'performed_by' => 492,
                'scored_to' => 492,
                'category' => 'viewed',
                'created_at' => '2020-03-04 23:30:56',
            ),
            198 => 
            array (
                'id' => 227,
                'job_id' => 86,
                'performed_by' => 491,
                'scored_to' => 491,
                'category' => 'viewed',
                'created_at' => '2020-03-05 07:19:21',
            ),
            199 => 
            array (
                'id' => 228,
                'job_id' => 83,
                'performed_by' => 491,
                'scored_to' => 491,
                'category' => 'viewed',
                'created_at' => '2020-03-05 07:20:37',
            ),
            200 => 
            array (
                'id' => 229,
                'job_id' => 83,
                'performed_by' => 499,
                'scored_to' => 499,
                'category' => 'viewed',
                'created_at' => '2020-03-06 08:24:03',
            ),
            201 => 
            array (
                'id' => 230,
                'job_id' => 79,
                'performed_by' => 500,
                'scored_to' => 500,
                'category' => 'viewed',
                'created_at' => '2020-03-07 02:54:37',
            ),
            202 => 
            array (
                'id' => 231,
                'job_id' => 83,
                'performed_by' => 501,
                'scored_to' => 501,
                'category' => 'viewed',
                'created_at' => '2020-03-07 04:57:02',
            ),
            203 => 
            array (
                'id' => 232,
                'job_id' => 86,
                'performed_by' => 502,
                'scored_to' => 502,
                'category' => 'viewed',
                'created_at' => '2020-03-07 12:40:12',
            ),
            204 => 
            array (
                'id' => 233,
                'job_id' => 83,
                'performed_by' => 503,
                'scored_to' => 503,
                'category' => 'viewed',
                'created_at' => '2020-03-07 23:10:29',
            ),
            205 => 
            array (
                'id' => 234,
                'job_id' => 80,
                'performed_by' => 504,
                'scored_to' => 504,
                'category' => 'viewed',
                'created_at' => '2020-03-08 05:50:17',
            ),
            206 => 
            array (
                'id' => 235,
                'job_id' => 79,
                'performed_by' => 511,
                'scored_to' => 511,
                'category' => 'viewed',
                'created_at' => '2020-03-09 17:12:10',
            ),
            207 => 
            array (
                'id' => 236,
                'job_id' => 83,
                'performed_by' => 513,
                'scored_to' => 513,
                'category' => 'viewed',
                'created_at' => '2020-03-10 01:41:54',
            ),
            208 => 
            array (
                'id' => 237,
                'job_id' => 79,
                'performed_by' => 513,
                'scored_to' => 513,
                'category' => 'viewed',
                'created_at' => '2020-03-10 01:42:21',
            ),
            209 => 
            array (
                'id' => 238,
                'job_id' => 83,
                'performed_by' => 515,
                'scored_to' => 515,
                'category' => 'viewed',
                'created_at' => '2020-03-10 03:11:11',
            ),
            210 => 
            array (
                'id' => 239,
                'job_id' => 83,
                'performed_by' => 517,
                'scored_to' => 517,
                'category' => 'viewed',
                'created_at' => '2020-03-11 01:31:46',
            ),
            211 => 
            array (
                'id' => 240,
                'job_id' => 83,
                'performed_by' => 518,
                'scored_to' => 518,
                'category' => 'viewed',
                'created_at' => '2020-03-11 04:28:15',
            ),
            212 => 
            array (
                'id' => 241,
                'job_id' => 83,
                'performed_by' => 520,
                'scored_to' => 520,
                'category' => 'viewed',
                'created_at' => '2020-03-11 08:39:17',
            ),
            213 => 
            array (
                'id' => 242,
                'job_id' => 83,
                'performed_by' => 521,
                'scored_to' => 521,
                'category' => 'viewed',
                'created_at' => '2020-03-11 11:54:25',
            ),
            214 => 
            array (
                'id' => 243,
                'job_id' => 80,
                'performed_by' => 521,
                'scored_to' => 521,
                'category' => 'viewed',
                'created_at' => '2020-03-11 12:00:20',
            ),
            215 => 
            array (
                'id' => 244,
                'job_id' => 79,
                'performed_by' => 521,
                'scored_to' => 521,
                'category' => 'viewed',
                'created_at' => '2020-03-11 12:01:07',
            ),
            216 => 
            array (
                'id' => 245,
                'job_id' => 79,
                'performed_by' => 526,
                'scored_to' => 526,
                'category' => 'viewed',
                'created_at' => '2020-03-12 08:37:49',
            ),
            217 => 
            array (
                'id' => 246,
                'job_id' => 79,
                'performed_by' => 532,
                'scored_to' => 532,
                'category' => 'viewed',
                'created_at' => '2020-03-14 05:27:54',
            ),
            218 => 
            array (
                'id' => 247,
                'job_id' => 83,
                'performed_by' => 534,
                'scored_to' => 534,
                'category' => 'viewed',
                'created_at' => '2020-03-14 23:58:50',
            ),
            219 => 
            array (
                'id' => 248,
                'job_id' => 86,
                'performed_by' => 534,
                'scored_to' => 534,
                'category' => 'viewed',
                'created_at' => '2020-03-15 00:04:47',
            ),
            220 => 
            array (
                'id' => 249,
                'job_id' => 79,
                'performed_by' => 534,
                'scored_to' => 534,
                'category' => 'viewed',
                'created_at' => '2020-03-15 00:05:57',
            ),
            221 => 
            array (
                'id' => 250,
                'job_id' => 83,
                'performed_by' => 540,
                'scored_to' => 540,
                'category' => 'viewed',
                'created_at' => '2020-03-16 00:21:40',
            ),
            222 => 
            array (
                'id' => 251,
                'job_id' => 79,
                'performed_by' => 541,
                'scored_to' => 541,
                'category' => 'viewed',
                'created_at' => '2020-03-16 02:41:37',
            ),
            223 => 
            array (
                'id' => 252,
                'job_id' => 79,
                'performed_by' => 544,
                'scored_to' => 544,
                'category' => 'viewed',
                'created_at' => '2020-03-16 12:10:47',
            ),
            224 => 
            array (
                'id' => 253,
                'job_id' => 83,
                'performed_by' => 549,
                'scored_to' => 549,
                'category' => 'viewed',
                'created_at' => '2020-03-18 00:10:58',
            ),
            225 => 
            array (
                'id' => 254,
                'job_id' => 83,
                'performed_by' => 559,
                'scored_to' => 559,
                'category' => 'viewed',
                'created_at' => '2020-03-27 15:05:39',
            ),
            226 => 
            array (
                'id' => 255,
                'job_id' => 79,
                'performed_by' => 559,
                'scored_to' => 559,
                'category' => 'viewed',
                'created_at' => '2020-03-27 15:06:02',
            ),
            227 => 
            array (
                'id' => 256,
                'job_id' => 85,
                'performed_by' => 387,
                'scored_to' => 486,
                'category' => 'not_suitable',
                'created_at' => '2020-04-12 03:09:06',
            ),
            228 => 
            array (
                'id' => 257,
                'job_id' => 85,
                'performed_by' => 387,
                'scored_to' => 483,
                'category' => 'not_suitable',
                'created_at' => '2020-04-12 03:09:06',
            ),
            229 => 
            array (
                'id' => 258,
                'job_id' => 85,
                'performed_by' => 387,
                'scored_to' => 446,
                'category' => 'not_suitable',
                'created_at' => '2020-04-12 03:09:07',
            ),
            230 => 
            array (
                'id' => 259,
                'job_id' => 79,
                'performed_by' => 572,
                'scored_to' => 572,
                'category' => 'viewed',
                'created_at' => '2020-04-12 13:48:22',
            ),
            231 => 
            array (
                'id' => 260,
                'job_id' => 80,
                'performed_by' => 573,
                'scored_to' => 573,
                'category' => 'viewed',
                'created_at' => '2020-04-12 22:57:48',
            ),
            232 => 
            array (
                'id' => 261,
                'job_id' => 79,
                'performed_by' => 567,
                'scored_to' => 567,
                'category' => 'viewed',
                'created_at' => '2020-04-13 23:36:04',
            ),
            233 => 
            array (
                'id' => 262,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 567,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-04-30 02:54:22',
            ),
            234 => 
            array (
                'id' => 263,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 572,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-04-30 02:55:00',
            ),
            235 => 
            array (
                'id' => 264,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 559,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-04-30 02:55:11',
            ),
            236 => 
            array (
                'id' => 265,
                'job_id' => 79,
                'performed_by' => 21,
                'scored_to' => 532,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-04-30 02:55:33',
            ),
            237 => 
            array (
                'id' => 266,
                'job_id' => 80,
                'performed_by' => 591,
                'scored_to' => 591,
                'category' => 'viewed',
                'created_at' => '2020-04-30 17:45:24',
            ),
            238 => 
            array (
                'id' => 267,
                'job_id' => 87,
                'performed_by' => 544,
                'scored_to' => 544,
                'category' => 'viewed',
                'created_at' => '2020-05-17 09:44:21',
            ),
            239 => 
            array (
                'id' => 268,
                'job_id' => 95,
                'performed_by' => 596,
                'scored_to' => 596,
                'category' => 'viewed',
                'created_at' => '2020-06-04 04:37:41',
            ),
            240 => 
            array (
                'id' => 269,
                'job_id' => 96,
                'performed_by' => 541,
                'scored_to' => 541,
                'category' => 'viewed',
                'created_at' => '2020-06-05 06:32:28',
            ),
            241 => 
            array (
                'id' => 270,
                'job_id' => 97,
                'performed_by' => 470,
                'scored_to' => 470,
                'category' => 'viewed',
                'created_at' => '2020-06-06 00:52:27',
            ),
            242 => 
            array (
                'id' => 271,
                'job_id' => 96,
                'performed_by' => 511,
                'scored_to' => 511,
                'category' => 'viewed',
                'created_at' => '2020-06-08 07:48:33',
            ),
            243 => 
            array (
                'id' => 272,
                'job_id' => 98,
                'performed_by' => 511,
                'scored_to' => 511,
                'category' => 'viewed',
                'created_at' => '2020-06-08 07:51:39',
            ),
            244 => 
            array (
                'id' => 273,
                'job_id' => 97,
                'performed_by' => 511,
                'scored_to' => 511,
                'category' => 'viewed',
                'created_at' => '2020-06-08 07:52:44',
            ),
            245 => 
            array (
                'id' => 274,
                'job_id' => 91,
                'performed_by' => 511,
                'scored_to' => 511,
                'category' => 'viewed',
                'created_at' => '2020-06-08 07:54:01',
            ),
            246 => 
            array (
                'id' => 275,
                'job_id' => 97,
                'performed_by' => 612,
                'scored_to' => 511,
                'category' => 'favourite',
                'created_at' => '2020-06-12 01:32:11',
            ),
            247 => 
            array (
                'id' => 276,
                'job_id' => 97,
                'performed_by' => 612,
                'scored_to' => 470,
                'category' => 'favourite',
                'created_at' => '2020-06-12 01:32:12',
            ),
            248 => 
            array (
                'id' => 277,
                'job_id' => 97,
                'performed_by' => 612,
                'scored_to' => 511,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-09 03:53:10',
            ),
            249 => 
            array (
                'id' => 278,
                'job_id' => 97,
                'performed_by' => 612,
                'scored_to' => 470,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-09 04:53:33',
            ),
            250 => 
            array (
                'id' => 279,
                'job_id' => 91,
                'performed_by' => 600,
                'scored_to' => 511,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-09 04:55:07',
            ),
            251 => 
            array (
                'id' => 280,
                'job_id' => 98,
                'performed_by' => 29,
                'scored_to' => 511,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-09 04:57:14',
            ),
            252 => 
            array (
                'id' => 281,
                'job_id' => 96,
                'performed_by' => 611,
                'scored_to' => 511,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-09 05:01:32',
            ),
            253 => 
            array (
                'id' => 282,
                'job_id' => 96,
                'performed_by' => 611,
                'scored_to' => 541,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-09 05:03:00',
            ),
            254 => 
            array (
                'id' => 283,
                'job_id' => 98,
                'performed_by' => 631,
                'scored_to' => 631,
                'category' => 'viewed',
                'created_at' => '2020-06-11 08:55:51',
            ),
            255 => 
            array (
                'id' => 284,
                'job_id' => 97,
                'performed_by' => 634,
                'scored_to' => 634,
                'category' => 'viewed',
                'created_at' => '2020-06-12 01:26:51',
            ),
            256 => 
            array (
                'id' => 285,
                'job_id' => 97,
                'performed_by' => 612,
                'scored_to' => 634,
                'category' => 'not_suitable',
                'created_at' => '2020-06-12 01:30:31',
            ),
            257 => 
            array (
                'id' => 286,
                'job_id' => 98,
                'performed_by' => 639,
                'scored_to' => 639,
                'category' => 'viewed',
                'created_at' => '2020-06-12 05:15:17',
            ),
            258 => 
            array (
                'id' => 287,
                'job_id' => 97,
                'performed_by' => 639,
                'scored_to' => 639,
                'category' => 'viewed',
                'created_at' => '2020-06-12 05:15:54',
            ),
            259 => 
            array (
                'id' => 288,
                'job_id' => 91,
                'performed_by' => 639,
                'scored_to' => 639,
                'category' => 'viewed',
                'created_at' => '2020-06-12 05:16:35',
            ),
            260 => 
            array (
                'id' => 289,
                'job_id' => 98,
                'performed_by' => 640,
                'scored_to' => 640,
                'category' => 'viewed',
                'created_at' => '2020-06-12 06:21:34',
            ),
            261 => 
            array (
                'id' => 290,
                'job_id' => 98,
                'performed_by' => 646,
                'scored_to' => 646,
                'category' => 'viewed',
                'created_at' => '2020-06-12 18:44:43',
            ),
            262 => 
            array (
                'id' => 291,
                'job_id' => 97,
                'performed_by' => 646,
                'scored_to' => 646,
                'category' => 'viewed',
                'created_at' => '2020-06-12 18:49:06',
            ),
            263 => 
            array (
                'id' => 292,
                'job_id' => 96,
                'performed_by' => 646,
                'scored_to' => 646,
                'category' => 'viewed',
                'created_at' => '2020-06-12 19:04:55',
            ),
            264 => 
            array (
                'id' => 293,
                'job_id' => 98,
                'performed_by' => 662,
                'scored_to' => 662,
                'category' => 'viewed',
                'created_at' => '2020-06-16 01:01:56',
            ),
            265 => 
            array (
                'id' => 294,
                'job_id' => 96,
                'performed_by' => 662,
                'scored_to' => 662,
                'category' => 'viewed',
                'created_at' => '2020-06-16 01:03:01',
            ),
            266 => 
            array (
                'id' => 295,
                'job_id' => 83,
                'performed_by' => 662,
                'scored_to' => 662,
                'category' => 'viewed',
                'created_at' => '2020-06-16 01:04:16',
            ),
            267 => 
            array (
                'id' => 296,
                'job_id' => 98,
                'performed_by' => 670,
                'scored_to' => 670,
                'category' => 'viewed',
                'created_at' => '2020-06-17 07:35:23',
            ),
            268 => 
            array (
                'id' => 297,
                'job_id' => 98,
                'performed_by' => 29,
                'scored_to' => 631,
                'category' => 'favourite',
                'created_at' => '2020-06-19 01:59:19',
            ),
            269 => 
            array (
                'id' => 298,
                'job_id' => 98,
                'performed_by' => 29,
                'scored_to' => 670,
                'category' => 'favourite',
                'created_at' => '2020-06-19 01:59:19',
            ),
            270 => 
            array (
                'id' => 299,
                'job_id' => 105,
                'performed_by' => 511,
                'scored_to' => 511,
                'category' => 'viewed',
                'created_at' => '2020-06-21 20:54:34',
            ),
            271 => 
            array (
                'id' => 300,
                'job_id' => 96,
                'performed_by' => 611,
                'scored_to' => 662,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-22 00:01:35',
            ),
            272 => 
            array (
                'id' => 301,
                'job_id' => 96,
                'performed_by' => 611,
                'scored_to' => 646,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-22 00:03:11',
            ),
            273 => 
            array (
                'id' => 302,
                'job_id' => 96,
                'performed_by' => 685,
                'scored_to' => 685,
                'category' => 'viewed',
                'created_at' => '2020-06-22 01:40:35',
            ),
            274 => 
            array (
                'id' => 303,
                'job_id' => 105,
                'performed_by' => 678,
                'scored_to' => 511,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-06-22 13:13:03',
            ),
            275 => 
            array (
                'id' => 304,
                'job_id' => 97,
                'performed_by' => 691,
                'scored_to' => 691,
                'category' => 'viewed',
                'created_at' => '2020-06-23 01:24:09',
            ),
            276 => 
            array (
                'id' => 305,
                'job_id' => 96,
                'performed_by' => 720,
                'scored_to' => 720,
                'category' => 'viewed',
                'created_at' => '2020-06-29 04:50:24',
            ),
            277 => 
            array (
                'id' => 306,
                'job_id' => 97,
                'performed_by' => 726,
                'scored_to' => 726,
                'category' => 'viewed',
                'created_at' => '2020-06-29 23:48:13',
            ),
            278 => 
            array (
                'id' => 307,
                'job_id' => 105,
                'performed_by' => 731,
                'scored_to' => 731,
                'category' => 'viewed',
                'created_at' => '2020-06-30 23:16:37',
            ),
            279 => 
            array (
                'id' => 308,
                'job_id' => 97,
                'performed_by' => 731,
                'scored_to' => 731,
                'category' => 'viewed',
                'created_at' => '2020-06-30 23:17:05',
            ),
            280 => 
            array (
                'id' => 309,
                'job_id' => 106,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-01 11:06:40',
            ),
            281 => 
            array (
                'id' => 310,
                'job_id' => 97,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-01 11:07:37',
            ),
            282 => 
            array (
                'id' => 311,
                'job_id' => 105,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-01 11:08:09',
            ),
            283 => 
            array (
                'id' => 312,
                'job_id' => 91,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-01 11:09:27',
            ),
            284 => 
            array (
                'id' => 313,
                'job_id' => 83,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-01 11:10:01',
            ),
            285 => 
            array (
                'id' => 314,
                'job_id' => 106,
                'performed_by' => 708,
                'scored_to' => 735,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-07-02 01:12:45',
            ),
            286 => 
            array (
                'id' => 315,
                'job_id' => 105,
                'performed_by' => 678,
                'scored_to' => 731,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-07-02 09:02:19',
            ),
            287 => 
            array (
                'id' => 316,
                'job_id' => 97,
                'performed_by' => 543,
                'scored_to' => 543,
                'category' => 'viewed',
                'created_at' => '2020-07-03 03:36:00',
            ),
            288 => 
            array (
                'id' => 317,
                'job_id' => 97,
                'performed_by' => 669,
                'scored_to' => 669,
                'category' => 'viewed',
                'created_at' => '2020-07-03 09:57:54',
            ),
            289 => 
            array (
                'id' => 318,
                'job_id' => 107,
                'performed_by' => 615,
                'scored_to' => 615,
                'category' => 'viewed',
                'created_at' => '2020-07-05 22:54:13',
            ),
            290 => 
            array (
                'id' => 319,
                'job_id' => 96,
                'performed_by' => 743,
                'scored_to' => 743,
                'category' => 'viewed',
                'created_at' => '2020-07-05 23:49:25',
            ),
            291 => 
            array (
                'id' => 320,
                'job_id' => 91,
                'performed_by' => 743,
                'scored_to' => 743,
                'category' => 'viewed',
                'created_at' => '2020-07-05 23:50:45',
            ),
            292 => 
            array (
                'id' => 321,
                'job_id' => 122,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 06:06:37',
            ),
            293 => 
            array (
                'id' => 322,
                'job_id' => 96,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-06 06:40:04',
            ),
            294 => 
            array (
                'id' => 323,
                'job_id' => 107,
                'performed_by' => 735,
                'scored_to' => 735,
                'category' => 'viewed',
                'created_at' => '2020-07-06 06:42:19',
            ),
            295 => 
            array (
                'id' => 324,
                'job_id' => 126,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:41:35',
            ),
            296 => 
            array (
                'id' => 325,
                'job_id' => 126,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:41:56',
            ),
            297 => 
            array (
                'id' => 326,
                'job_id' => 127,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:44:23',
            ),
            298 => 
            array (
                'id' => 327,
                'job_id' => 127,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:44:42',
            ),
            299 => 
            array (
                'id' => 328,
                'job_id' => 128,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:49:26',
            ),
            300 => 
            array (
                'id' => 329,
                'job_id' => 128,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:50:15',
            ),
            301 => 
            array (
                'id' => 330,
                'job_id' => 129,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:53:49',
            ),
            302 => 
            array (
                'id' => 331,
                'job_id' => 129,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:54:05',
            ),
            303 => 
            array (
                'id' => 332,
                'job_id' => 130,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:57:59',
            ),
            304 => 
            array (
                'id' => 333,
                'job_id' => 130,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 12:58:17',
            ),
            305 => 
            array (
                'id' => 334,
                'job_id' => 131,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:02:00',
            ),
            306 => 
            array (
                'id' => 335,
                'job_id' => 131,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:02:14',
            ),
            307 => 
            array (
                'id' => 336,
                'job_id' => 132,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:03:29',
            ),
            308 => 
            array (
                'id' => 337,
                'job_id' => 132,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:03:49',
            ),
            309 => 
            array (
                'id' => 338,
                'job_id' => 133,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:05:54',
            ),
            310 => 
            array (
                'id' => 339,
                'job_id' => 133,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:06:12',
            ),
            311 => 
            array (
                'id' => 340,
                'job_id' => 134,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:08:13',
            ),
            312 => 
            array (
                'id' => 341,
                'job_id' => 134,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:08:15',
            ),
            313 => 
            array (
                'id' => 342,
                'job_id' => 135,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:12:43',
            ),
            314 => 
            array (
                'id' => 343,
                'job_id' => 135,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:12:45',
            ),
            315 => 
            array (
                'id' => 344,
                'job_id' => 136,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:17:34',
            ),
            316 => 
            array (
                'id' => 345,
                'job_id' => 136,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:17:42',
            ),
            317 => 
            array (
                'id' => 346,
                'job_id' => 137,
                'performed_by' => 304,
                'scored_to' => 304,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:20:02',
            ),
            318 => 
            array (
                'id' => 347,
                'job_id' => 137,
                'performed_by' => 761,
                'scored_to' => 761,
                'category' => 'viewed',
                'created_at' => '2020-07-06 13:20:04',
            ),
            319 => 
            array (
                'id' => 348,
                'job_id' => 96,
                'performed_by' => 769,
                'scored_to' => 769,
                'category' => 'viewed',
                'created_at' => '2020-07-07 13:25:52',
            ),
            320 => 
            array (
                'id' => 349,
                'job_id' => 105,
                'performed_by' => 769,
                'scored_to' => 769,
                'category' => 'viewed',
                'created_at' => '2020-07-07 13:26:53',
            ),
            321 => 
            array (
                'id' => 350,
                'job_id' => 105,
                'performed_by' => 794,
                'scored_to' => 794,
                'category' => 'viewed',
                'created_at' => '2020-07-14 02:43:01',
            ),
            322 => 
            array (
                'id' => 351,
                'job_id' => 97,
                'performed_by' => 794,
                'scored_to' => 794,
                'category' => 'viewed',
                'created_at' => '2020-07-14 02:44:18',
            ),
            323 => 
            array (
                'id' => 352,
                'job_id' => 96,
                'performed_by' => 794,
                'scored_to' => 794,
                'category' => 'viewed',
                'created_at' => '2020-07-14 02:44:59',
            ),
            324 => 
            array (
                'id' => 353,
                'job_id' => 91,
                'performed_by' => 794,
                'scored_to' => 794,
                'category' => 'viewed',
                'created_at' => '2020-07-14 02:45:43',
            ),
            325 => 
            array (
                'id' => 354,
                'job_id' => 97,
                'performed_by' => 802,
                'scored_to' => 802,
                'category' => 'viewed',
                'created_at' => '2020-07-14 13:19:03',
            ),
            326 => 
            array (
                'id' => 355,
                'job_id' => 91,
                'performed_by' => 802,
                'scored_to' => 802,
                'category' => 'viewed',
                'created_at' => '2020-07-14 13:20:55',
            ),
            327 => 
            array (
                'id' => 356,
                'job_id' => 97,
                'performed_by' => 738,
                'scored_to' => 738,
                'category' => 'viewed',
                'created_at' => '2020-07-16 11:38:48',
            ),
            328 => 
            array (
                'id' => 357,
                'job_id' => 91,
                'performed_by' => 738,
                'scored_to' => 738,
                'category' => 'viewed',
                'created_at' => '2020-07-16 11:41:53',
            ),
            329 => 
            array (
                'id' => 358,
                'job_id' => 96,
                'performed_by' => 738,
                'scored_to' => 738,
                'category' => 'viewed',
                'created_at' => '2020-07-16 11:42:39',
            ),
            330 => 
            array (
                'id' => 359,
                'job_id' => 97,
                'performed_by' => 821,
                'scored_to' => 821,
                'category' => 'viewed',
                'created_at' => '2020-07-20 01:00:38',
            ),
            331 => 
            array (
                'id' => 360,
                'job_id' => 97,
                'performed_by' => 831,
                'scored_to' => 831,
                'category' => 'viewed',
                'created_at' => '2020-07-21 05:00:28',
            ),
            332 => 
            array (
                'id' => 361,
                'job_id' => 97,
                'performed_by' => 838,
                'scored_to' => 838,
                'category' => 'viewed',
                'created_at' => '2020-07-22 05:19:11',
            ),
            333 => 
            array (
                'id' => 362,
                'job_id' => 96,
                'performed_by' => 838,
                'scored_to' => 838,
                'category' => 'viewed',
                'created_at' => '2020-07-22 05:20:08',
            ),
            334 => 
            array (
                'id' => 363,
                'job_id' => 96,
                'performed_by' => 851,
                'scored_to' => 851,
                'category' => 'viewed',
                'created_at' => '2020-07-23 06:06:04',
            ),
            335 => 
            array (
                'id' => 364,
                'job_id' => 105,
                'performed_by' => 851,
                'scored_to' => 851,
                'category' => 'viewed',
                'created_at' => '2020-07-23 06:06:38',
            ),
            336 => 
            array (
                'id' => 365,
                'job_id' => 97,
                'performed_by' => 851,
                'scored_to' => 851,
                'category' => 'viewed',
                'created_at' => '2020-07-23 06:07:10',
            ),
            337 => 
            array (
                'id' => 366,
                'job_id' => 91,
                'performed_by' => 851,
                'scored_to' => 851,
                'category' => 'viewed',
                'created_at' => '2020-07-23 06:07:54',
            ),
            338 => 
            array (
                'id' => 367,
                'job_id' => 107,
                'performed_by' => 854,
                'scored_to' => 854,
                'category' => 'viewed',
                'created_at' => '2020-07-23 10:16:28',
            ),
            339 => 
            array (
                'id' => 368,
                'job_id' => 107,
                'performed_by' => 856,
                'scored_to' => 856,
                'category' => 'viewed',
                'created_at' => '2020-07-30 12:24:45',
            ),
            340 => 
            array (
                'id' => 369,
                'job_id' => 107,
                'performed_by' => 631,
                'scored_to' => 631,
                'category' => 'viewed',
                'created_at' => '2020-08-13 03:50:31',
            ),
            341 => 
            array (
                'id' => 370,
                'job_id' => 107,
                'performed_by' => 710,
                'scored_to' => 631,
                'category' => 'company_viewed_profile',
                'created_at' => '2020-08-19 00:31:59',
            ),
            342 => 
            array (
                'id' => 371,
                'job_id' => 105,
                'performed_by' => 901,
                'scored_to' => 901,
                'category' => 'viewed',
                'created_at' => '2020-09-02 10:40:08',
            ),
            343 => 
            array (
                'id' => 372,
                'job_id' => 96,
                'performed_by' => 901,
                'scored_to' => 901,
                'category' => 'viewed',
                'created_at' => '2020-09-02 10:40:57',
            ),
            344 => 
            array (
                'id' => 373,
                'job_id' => 91,
                'performed_by' => 901,
                'scored_to' => 901,
                'category' => 'viewed',
                'created_at' => '2020-09-02 10:41:59',
            ),
        ));
        
        
    }
}