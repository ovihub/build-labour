<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_resets_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2019_03_19_063441_create_chat_history',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_03_19_064013_create_chat_channels',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2019_03_19_064034_create_chat_channel_members',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2019_03_20_084955_create_firebase_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2019_03_25_070700_create_connections',
                'batch' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2019_03_26_012125_create_connections_map',
                'batch' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2019_03_26_025647_create_users_notification_info',
                'batch' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2019_03_28_031019_create_roles_table',
                'batch' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2019_03_29_072731_create_user_skills_table',
                'batch' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2019_04_01_012426_create_companies_table',
                'batch' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2019_04_01_012427_create_job_posts_table',
                'batch' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2019_04_01_012427_create_work_experience_table',
                'batch' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2019_04_01_012428_create_work_experience_positions_table',
                'batch' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2019_04_01_012659_create_metas_table',
                'batch' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2019_04_01_012724_create_settings_table',
                'batch' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2019_04_01_032412_create_educations_table',
                'batch' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2019_04_03_053930_create_worker_details_table',
                'batch' => 1,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2019_04_03_075751_create_tickets_table',
                'batch' => 1,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2019_04_08_094223_create_company_posts_table',
                'batch' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2019_04_11_001950_create_ads_table',
                'batch' => 1,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2019_04_18_144301_modify_column_names',
                'batch' => 1,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2019_04_21_005812_create_work_experience_responsibilities',
                'batch' => 1,
            ),
            24 => 
            array (
                'id' => 25,
                'migration' => '2019_04_22_020654_remove_responsibilities_field_work_experience',
                'batch' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'migration' => '2019_04_24_011612_remove_is_current_field_from_work_experience_table',
                'batch' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'migration' => '2019_04_25_023254_create_skills_table',
                'batch' => 1,
            ),
            27 => 
            array (
                'id' => 28,
                'migration' => '2019_04_25_041201_create_skill_levels_table',
                'batch' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'migration' => '2019_04_25_041430_modify_user_skills_columns',
                'batch' => 1,
            ),
            29 => 
            array (
                'id' => 30,
                'migration' => '2019_04_25_102035_modify_work_experience',
                'batch' => 1,
            ),
            30 => 
            array (
                'id' => 31,
                'migration' => '2019_04_25_160501_modify_work_experience_dates',
                'batch' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'migration' => '2019_04_25_161223_modify_education_dates',
                'batch' => 1,
            ),
            32 => 
            array (
                'id' => 33,
                'migration' => '2019_04_26_035247_add_is_current_column_to_work_experience_table',
                'batch' => 1,
            ),
            33 => 
            array (
                'id' => 34,
                'migration' => '2019_04_28_231054_modify_worker_details',
                'batch' => 1,
            ),
            34 => 
            array (
                'id' => 35,
                'migration' => '2019_04_28_231959_modify_worker_details_2',
                'batch' => 1,
            ),
            35 => 
            array (
                'id' => 36,
                'migration' => '2019_04_30_063426_change_worker_detail_fields',
                'batch' => 1,
            ),
            36 => 
            array (
                'id' => 37,
                'migration' => '2019_05_01_061719_add_education_id_to_worker_details_table',
                'batch' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'migration' => '2019_05_07_005515_change_job_role_to_nullable_from_work_experience_table',
                'batch' => 1,
            ),
            38 => 
            array (
                'id' => 39,
                'migration' => '2019_05_07_042243_modify_tickets_table',
                'batch' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'migration' => '2019_05_07_042910_create_user_tickets_table',
                'batch' => 1,
            ),
            40 => 
            array (
                'id' => 41,
                'migration' => '2019_05_09_081937_add_columns_in_companies_table',
                'batch' => 1,
            ),
            41 => 
            array (
                'id' => 42,
                'migration' => '2019_05_14_024711_create_job_requirements_table',
                'batch' => 1,
            ),
            42 => 
            array (
                'id' => 43,
                'migration' => '2019_05_14_024759_create_job_responsibilities_table',
                'batch' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'migration' => '2019_05_14_055431_create_administrators_table',
                'batch' => 1,
            ),
            44 => 
            array (
                'id' => 45,
                'migration' => '2019_05_15_030258_create_company_specialization',
                'batch' => 1,
            ),
            45 => 
            array (
                'id' => 46,
                'migration' => '2019_05_28_072835_create_company_tiers_table',
                'batch' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'migration' => '2019_05_28_075443_create_company_main_functions_table',
                'batch' => 1,
            ),
            47 => 
            array (
                'id' => 48,
                'migration' => '2019_05_28_075505_create_company_secondary_functions_table',
                'batch' => 1,
            ),
            48 => 
            array (
                'id' => 49,
                'migration' => '2019_05_29_010731_create_company_business_types_table',
                'batch' => 1,
            ),
            49 => 
            array (
                'id' => 50,
                'migration' => '2019_06_07_023001_create_bookmarks_table',
                'batch' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'migration' => '2019_06_11_034927_create_job_roles_table',
                'batch' => 1,
            ),
            51 => 
            array (
                'id' => 52,
                'migration' => '2019_06_18_030358_create_worker_areas_table',
                'batch' => 1,
            ),
            52 => 
            array (
                'id' => 53,
                'migration' => '2019_06_18_030605_create_worker_tiers_table',
                'batch' => 1,
            ),
            53 => 
            array (
                'id' => 54,
                'migration' => '2019_06_19_052808_add_columns_to_worker_details_table',
                'batch' => 1,
            ),
            54 => 
            array (
                'id' => 55,
                'migration' => '2019_06_20_042840_add_columns_to_users',
                'batch' => 1,
            ),
            55 => 
            array (
                'id' => 56,
                'migration' => '2019_06_20_061452_create_courses_table',
                'batch' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'migration' => '2019_06_28_003116_make_unique_worker_details_table',
                'batch' => 1,
            ),
            57 => 
            array (
                'id' => 58,
                'migration' => '2019_07_03_003846_create_schools_table',
                'batch' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'migration' => '2019_07_03_035120_add_columns_to_educations_table',
                'batch' => 1,
            ),
            59 => 
            array (
                'id' => 60,
                'migration' => '2019_07_03_051930_modify_description_in_tickets',
                'batch' => 1,
            ),
            60 => 
            array (
                'id' => 61,
                'migration' => '2019_07_08_030309_create_company_main_function_answers_table',
                'batch' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'migration' => '2019_08_26_070856_create_job_post_applicants',
                'batch' => 1,
            ),
            62 => 
            array (
                'id' => 63,
                'migration' => '2019_08_27_050900_add_status_and_template_name_columns_for_job_posts_table',
                'batch' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'migration' => '2019_08_27_062939_add_template_id_colum_from_job_posts_table',
                'batch' => 1,
            ),
            64 => 
            array (
                'id' => 65,
                'migration' => '2019_08_30_035822_add_project_size_column_to_users_table',
                'batch' => 1,
            ),
            65 => 
            array (
                'id' => 66,
                'migration' => '2019_09_01_005040_create_job_post_stats_table',
                'batch' => 1,
            ),
            66 => 
            array (
                'id' => 67,
                'migration' => '2019_09_03_103504_add_softdelete_to_job_posts_table',
                'batch' => 1,
            ),
            67 => 
            array (
                'id' => 68,
                'migration' => '2019_09_05_083425_modify_template_name_in_job_posts',
                'batch' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'migration' => '2019_10_07_035640_modify_job_post_applicants_table',
                'batch' => 2,
            ),
            69 => 
            array (
                'id' => 70,
                'migration' => '2019_10_22_073045_add_salary_type_field_job_posts_table',
                'batch' => 3,
            ),
            70 => 
            array (
                'id' => 71,
                'migration' => '2019_10_22_075951_add_params_field_to_worker_details_table',
                'batch' => 3,
            ),
            71 => 
            array (
                'id' => 72,
                'migration' => '2019_10_23_005425_change_params_col_from_worker_details_table',
                'batch' => 4,
            ),
            72 => 
            array (
                'id' => 73,
                'migration' => '2019_10_28_084314_create_cache_table',
                'batch' => 5,
            ),
            73 => 
            array (
                'id' => 74,
                'migration' => '2019_10_30_125756_add_params_field_to_job_posts',
                'batch' => 5,
            ),
            74 => 
            array (
                'id' => 75,
                'migration' => '2019_11_22_133304_add_unique_cols_to_worker_tiers_table',
                'batch' => 6,
            ),
            75 => 
            array (
                'id' => 76,
                'migration' => '2019_11_22_141707_add_unique_cols_to_worker_areas_table',
                'batch' => 6,
            ),
            76 => 
            array (
                'id' => 77,
                'migration' => '2019_12_02_035255_add_deleted_at_col_to_users_companies_workerdetailstables',
                'batch' => 7,
            ),
            77 => 
            array (
                'id' => 78,
                'migration' => '2019_12_29_035521_create_messages_table',
                'batch' => 8,
            ),
            78 => 
            array (
                'id' => 79,
                'migration' => '2020_01_02_053812_chat_request',
                'batch' => 8,
            ),
            79 => 
            array (
                'id' => 80,
                'migration' => '2020_01_13_042355_add_message_type_to_chat_history_table',
                'batch' => 8,
            ),
            80 => 
            array (
                'id' => 81,
                'migration' => '2020_01_15_041737_add_day_labour_to_worker_details',
                'batch' => 8,
            ),
            81 => 
            array (
                'id' => 82,
                'migration' => '2020_01_15_223523_add_job_type_to_job_posts',
                'batch' => 8,
            ),
            82 => 
            array (
                'id' => 83,
                'migration' => '2020_01_20_014733_create_trade_list',
                'batch' => 8,
            ),
            83 => 
            array (
                'id' => 84,
                'migration' => '2020_01_20_014830_create_trade_list_parent',
                'batch' => 8,
            ),
            84 => 
            array (
                'id' => 85,
                'migration' => '2020_01_20_014951_create_job_daylabour_booking',
                'batch' => 8,
            ),
            85 => 
            array (
                'id' => 86,
                'migration' => '2020_01_20_015024_create_job_daylabour_details',
                'batch' => 8,
            ),
            86 => 
            array (
                'id' => 87,
                'migration' => '2020_01_20_015042_create_job_daylabour_shift_records',
                'batch' => 8,
            ),
            87 => 
            array (
                'id' => 88,
                'migration' => '2020_01_20_015107_create_job_dispute_channel',
                'batch' => 8,
            ),
            88 => 
            array (
                'id' => 89,
                'migration' => '2020_01_20_015127_create_job_dispute_history',
                'batch' => 8,
            ),
            89 => 
            array (
                'id' => 90,
                'migration' => '2020_01_20_015148_create_user_ratings',
                'batch' => 8,
            ),
            90 => 
            array (
                'id' => 91,
                'migration' => '2020_01_20_015212_create_calendar_unavailability',
                'batch' => 8,
            ),
            91 => 
            array (
                'id' => 92,
                'migration' => '2020_01_20_015234_create_transactions',
                'batch' => 8,
            ),
            92 => 
            array (
                'id' => 93,
                'migration' => '2020_01_20_015409_add_selected_to_job_post_applicants',
                'batch' => 8,
            ),
            93 => 
            array (
                'id' => 94,
                'migration' => '2020_01_20_015439_add_night_shift_wallet_balance_to_worker_details',
                'batch' => 8,
            ),
            94 => 
            array (
                'id' => 95,
                'migration' => '2020_01_26_041331_change_job_daylabour_details_datetime_to_date',
                'batch' => 8,
            ),
            95 => 
            array (
                'id' => 96,
                'migration' => '2020_01_27_094831_add_table_job_daylabour_requirements',
                'batch' => 8,
            ),
            96 => 
            array (
                'id' => 97,
                'migration' => '2020_01_28_010852_add_table_worker_daylabour_details',
                'batch' => 8,
            ),
            97 => 
            array (
                'id' => 98,
                'migration' => '2020_02_03_021809_create_notifications_table',
                'batch' => 8,
            ),
            98 => 
            array (
                'id' => 99,
                'migration' => '2020_02_11_050604_update_worker_details_change_profile_description_length',
                'batch' => 8,
            ),
            99 => 
            array (
                'id' => 100,
                'migration' => '2020_02_12_004611_worker_details_add_english_skill_competency',
                'batch' => 8,
            ),
            100 => 
            array (
                'id' => 101,
                'migration' => '2020_02_24_024433_add_seen_by_to_chat_history',
                'batch' => 9,
            ),
            101 => 
            array (
                'id' => 102,
                'migration' => '2020_02_19_023249_add_duration_to_work_experience',
                'batch' => 10,
            ),
            102 => 
            array (
                'id' => 103,
                'migration' => '2020_02_25_120148_worker_details_add_drive_manual_confirmation',
                'batch' => 11,
            ),
            103 => 
            array (
                'id' => 104,
                'migration' => '2020_07_05_223232_users_add_training_provider',
                'batch' => 12,
            ),
            104 => 
            array (
                'id' => 105,
                'migration' => '2020_07_06_041436_job_requirements_add_whitecard_field',
                'batch' => 13,
            ),
            105 => 
            array (
                'id' => 106,
                'migration' => '2020_09_30_172004_create_administrators_table',
                'batch' => 0,
            ),
            106 => 
            array (
                'id' => 107,
                'migration' => '2020_09_30_172004_create_ads_table',
                'batch' => 0,
            ),
            107 => 
            array (
                'id' => 108,
                'migration' => '2020_09_30_172004_create_bookmarks_table',
                'batch' => 0,
            ),
            108 => 
            array (
                'id' => 109,
                'migration' => '2020_09_30_172004_create_cache_table',
                'batch' => 0,
            ),
            109 => 
            array (
                'id' => 110,
                'migration' => '2020_09_30_172004_create_calendar_unavailability_table',
                'batch' => 0,
            ),
            110 => 
            array (
                'id' => 111,
                'migration' => '2020_09_30_172004_create_chat_channel_members_table',
                'batch' => 0,
            ),
            111 => 
            array (
                'id' => 112,
                'migration' => '2020_09_30_172004_create_chat_channels_table',
                'batch' => 0,
            ),
            112 => 
            array (
                'id' => 113,
                'migration' => '2020_09_30_172004_create_chat_history_table',
                'batch' => 0,
            ),
            113 => 
            array (
                'id' => 114,
                'migration' => '2020_09_30_172004_create_chat_request_table',
                'batch' => 0,
            ),
            114 => 
            array (
                'id' => 115,
                'migration' => '2020_09_30_172004_create_companies_table',
                'batch' => 0,
            ),
            115 => 
            array (
                'id' => 116,
                'migration' => '2020_09_30_172004_create_company_business_types_table',
                'batch' => 0,
            ),
            116 => 
            array (
                'id' => 117,
                'migration' => '2020_09_30_172004_create_company_main_function_answers_table',
                'batch' => 0,
            ),
            117 => 
            array (
                'id' => 118,
                'migration' => '2020_09_30_172004_create_company_main_functions_table',
                'batch' => 0,
            ),
            118 => 
            array (
                'id' => 119,
                'migration' => '2020_09_30_172004_create_company_posts_table',
                'batch' => 0,
            ),
            119 => 
            array (
                'id' => 120,
                'migration' => '2020_09_30_172004_create_company_secondary_functions_table',
                'batch' => 0,
            ),
            120 => 
            array (
                'id' => 121,
                'migration' => '2020_09_30_172004_create_company_specialization_table',
                'batch' => 0,
            ),
            121 => 
            array (
                'id' => 122,
                'migration' => '2020_09_30_172004_create_company_tiers_table',
                'batch' => 0,
            ),
            122 => 
            array (
                'id' => 123,
                'migration' => '2020_09_30_172004_create_connections_table',
                'batch' => 0,
            ),
            123 => 
            array (
                'id' => 124,
                'migration' => '2020_09_30_172004_create_connections_map_table',
                'batch' => 0,
            ),
            124 => 
            array (
                'id' => 125,
                'migration' => '2020_09_30_172004_create_courses_table',
                'batch' => 0,
            ),
            125 => 
            array (
                'id' => 126,
                'migration' => '2020_09_30_172004_create_educations_table',
                'batch' => 0,
            ),
            126 => 
            array (
                'id' => 127,
                'migration' => '2020_09_30_172004_create_job_daylabour_booking_table',
                'batch' => 0,
            ),
            127 => 
            array (
                'id' => 128,
                'migration' => '2020_09_30_172004_create_job_daylabour_details_table',
                'batch' => 0,
            ),
            128 => 
            array (
                'id' => 129,
                'migration' => '2020_09_30_172004_create_job_daylabour_requirements_table',
                'batch' => 0,
            ),
            129 => 
            array (
                'id' => 130,
                'migration' => '2020_09_30_172004_create_job_daylabour_shift_records_table',
                'batch' => 0,
            ),
            130 => 
            array (
                'id' => 131,
                'migration' => '2020_09_30_172004_create_job_dispute_channel_table',
                'batch' => 0,
            ),
            131 => 
            array (
                'id' => 132,
                'migration' => '2020_09_30_172004_create_job_dispute_history_table',
                'batch' => 0,
            ),
            132 => 
            array (
                'id' => 133,
                'migration' => '2020_09_30_172004_create_job_post_applicants_table',
                'batch' => 0,
            ),
            133 => 
            array (
                'id' => 134,
                'migration' => '2020_09_30_172004_create_job_post_stats_table',
                'batch' => 0,
            ),
            134 => 
            array (
                'id' => 135,
                'migration' => '2020_09_30_172004_create_job_posts_table',
                'batch' => 0,
            ),
            135 => 
            array (
                'id' => 136,
                'migration' => '2020_09_30_172004_create_job_requirements_table',
                'batch' => 0,
            ),
            136 => 
            array (
                'id' => 137,
                'migration' => '2020_09_30_172004_create_job_responsibilities_table',
                'batch' => 0,
            ),
            137 => 
            array (
                'id' => 138,
                'migration' => '2020_09_30_172004_create_job_roles_table',
                'batch' => 0,
            ),
            138 => 
            array (
                'id' => 139,
                'migration' => '2020_09_30_172004_create_levels_table',
                'batch' => 0,
            ),
            139 => 
            array (
                'id' => 140,
                'migration' => '2020_09_30_172004_create_messages_table',
                'batch' => 0,
            ),
            140 => 
            array (
                'id' => 141,
                'migration' => '2020_09_30_172004_create_metas_table',
                'batch' => 0,
            ),
            141 => 
            array (
                'id' => 142,
                'migration' => '2020_09_30_172004_create_notifications_table',
                'batch' => 0,
            ),
            142 => 
            array (
                'id' => 143,
                'migration' => '2020_09_30_172004_create_password_resets_table',
                'batch' => 0,
            ),
            143 => 
            array (
                'id' => 144,
                'migration' => '2020_09_30_172004_create_roles_table',
                'batch' => 0,
            ),
            144 => 
            array (
                'id' => 145,
                'migration' => '2020_09_30_172004_create_schools_table',
                'batch' => 0,
            ),
            145 => 
            array (
                'id' => 146,
                'migration' => '2020_09_30_172004_create_settings_table',
                'batch' => 0,
            ),
            146 => 
            array (
                'id' => 147,
                'migration' => '2020_09_30_172004_create_skills_table',
                'batch' => 0,
            ),
            147 => 
            array (
                'id' => 148,
                'migration' => '2020_09_30_172004_create_tickets_table',
                'batch' => 0,
            ),
            148 => 
            array (
                'id' => 149,
                'migration' => '2020_09_30_172004_create_trade_list_table',
                'batch' => 0,
            ),
            149 => 
            array (
                'id' => 150,
                'migration' => '2020_09_30_172004_create_trade_list_parent_table',
                'batch' => 0,
            ),
            150 => 
            array (
                'id' => 151,
                'migration' => '2020_09_30_172004_create_transactions_table',
                'batch' => 0,
            ),
            151 => 
            array (
                'id' => 152,
                'migration' => '2020_09_30_172004_create_user_ratings_table',
                'batch' => 0,
            ),
            152 => 
            array (
                'id' => 153,
                'migration' => '2020_09_30_172004_create_user_skills_table',
                'batch' => 0,
            ),
            153 => 
            array (
                'id' => 154,
                'migration' => '2020_09_30_172004_create_user_tickets_table',
                'batch' => 0,
            ),
            154 => 
            array (
                'id' => 155,
                'migration' => '2020_09_30_172004_create_users_table',
                'batch' => 0,
            ),
            155 => 
            array (
                'id' => 156,
                'migration' => '2020_09_30_172004_create_users_firebase_table',
                'batch' => 0,
            ),
            156 => 
            array (
                'id' => 157,
                'migration' => '2020_09_30_172004_create_users_notification_info_table',
                'batch' => 0,
            ),
            157 => 
            array (
                'id' => 158,
                'migration' => '2020_09_30_172004_create_work_experience_table',
                'batch' => 0,
            ),
            158 => 
            array (
                'id' => 159,
                'migration' => '2020_09_30_172004_create_work_experience_positions_table',
                'batch' => 0,
            ),
            159 => 
            array (
                'id' => 160,
                'migration' => '2020_09_30_172004_create_work_experience_responsibilities_table',
                'batch' => 0,
            ),
            160 => 
            array (
                'id' => 161,
                'migration' => '2020_09_30_172004_create_worker_areas_table',
                'batch' => 0,
            ),
            161 => 
            array (
                'id' => 162,
                'migration' => '2020_09_30_172004_create_worker_daylabour_details_table',
                'batch' => 0,
            ),
            162 => 
            array (
                'id' => 163,
                'migration' => '2020_09_30_172004_create_worker_details_table',
                'batch' => 0,
            ),
            163 => 
            array (
                'id' => 164,
                'migration' => '2020_09_30_172004_create_worker_tiers_table',
                'batch' => 0,
            ),
            164 => 
            array (
                'id' => 165,
                'migration' => '2020_09_30_172007_add_foreign_keys_to_administrators_table',
                'batch' => 0,
            ),
            165 => 
            array (
                'id' => 166,
                'migration' => '2020_09_30_172007_add_foreign_keys_to_job_post_applicants_table',
                'batch' => 0,
            ),
            166 => 
            array (
                'id' => 167,
                'migration' => '2020_09_30_172007_add_foreign_keys_to_job_post_stats_table',
                'batch' => 0,
            ),
            167 => 
            array (
                'id' => 168,
                'migration' => '2020_09_30_172007_add_foreign_keys_to_messages_table',
                'batch' => 0,
            ),
            168 => 
            array (
                'id' => 169,
                'migration' => '2020_09_30_172007_add_foreign_keys_to_user_skills_table',
                'batch' => 0,
            ),
        ));
        
        
    }
}