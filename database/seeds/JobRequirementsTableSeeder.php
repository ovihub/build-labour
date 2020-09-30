<?php

use Illuminate\Database\Seeder;

class JobRequirementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_requirements')->delete();
        
        \DB::table('job_requirements')->insert(array (
            0 => 
            array (
                'id' => 13,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 25,
                'white_card' => 0,
            ),
            1 => 
            array (
                'id' => 14,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 25,
                'white_card' => 0,
            ),
            2 => 
            array (
                'id' => 15,
                'title' => 'Skills',
                'items_json' => '["Head Engineer"]',
                'job_id' => 25,
                'white_card' => 0,
            ),
            3 => 
            array (
                'id' => 16,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 25,
                'white_card' => 0,
            ),
            4 => 
            array (
                'id' => 21,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 26,
                'white_card' => 0,
            ),
            5 => 
            array (
                'id' => 22,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 26,
                'white_card' => 0,
            ),
            6 => 
            array (
                'id' => 23,
                'title' => 'Skills',
                'items_json' => '["Head Engineer"]',
                'job_id' => 26,
                'white_card' => 0,
            ),
            7 => 
            array (
                'id' => 24,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 26,
                'white_card' => 0,
            ),
            8 => 
            array (
                'id' => 25,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 27,
                'white_card' => 0,
            ),
            9 => 
            array (
                'id' => 26,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 27,
                'white_card' => 0,
            ),
            10 => 
            array (
                'id' => 27,
                'title' => 'Skills',
                'items_json' => '["PS","Illustrator"]',
                'job_id' => 27,
                'white_card' => 0,
            ),
            11 => 
            array (
                'id' => 28,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 27,
                'white_card' => 0,
            ),
            12 => 
            array (
                'id' => 33,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 28,
                'white_card' => 0,
            ),
            13 => 
            array (
                'id' => 34,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 28,
                'white_card' => 0,
            ),
            14 => 
            array (
                'id' => 35,
                'title' => 'Skills',
                'items_json' => '["Head Engineer"]',
                'job_id' => 28,
                'white_card' => 0,
            ),
            15 => 
            array (
                'id' => 36,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 28,
                'white_card' => 0,
            ),
            16 => 
            array (
                'id' => 51,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 31,
                'white_card' => 0,
            ),
            17 => 
            array (
                'id' => 52,
                'title' => 'Experience',
                'items_json' => '{"min_exp":"1 years","experiences":["General Labouring",null]}',
                'job_id' => 31,
                'white_card' => 0,
            ),
            18 => 
            array (
                'id' => 53,
                'title' => 'Skills',
                'items_json' => '["Physically abled"]',
                'job_id' => 31,
                'white_card' => 0,
            ),
            19 => 
            array (
                'id' => 54,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 31,
                'white_card' => 0,
            ),
            20 => 
            array (
                'id' => 55,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 32,
                'white_card' => 0,
            ),
            21 => 
            array (
                'id' => 56,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 32,
                'white_card' => 0,
            ),
            22 => 
            array (
                'id' => 57,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 32,
                'white_card' => 0,
            ),
            23 => 
            array (
                'id' => 58,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 32,
                'white_card' => 0,
            ),
            24 => 
            array (
                'id' => 59,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 33,
                'white_card' => 0,
            ),
            25 => 
            array (
                'id' => 60,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 33,
                'white_card' => 0,
            ),
            26 => 
            array (
                'id' => 61,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 33,
                'white_card' => 0,
            ),
            27 => 
            array (
                'id' => 62,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 33,
                'white_card' => 0,
            ),
            28 => 
            array (
                'id' => 63,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 34,
                'white_card' => 0,
            ),
            29 => 
            array (
                'id' => 64,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 34,
                'white_card' => 0,
            ),
            30 => 
            array (
                'id' => 65,
                'title' => 'Skills',
                'items_json' => '["Formwork Carpentry"]',
                'job_id' => 34,
                'white_card' => 0,
            ),
            31 => 
            array (
                'id' => 66,
                'title' => 'Tickets',
                'items_json' => '[{"ticket":"Driver","description":"Licence","created_by":28,"id":20},{"ticket":"White","description":"Card","created_by":28,"id":21}]',
                'job_id' => 34,
                'white_card' => 0,
            ),
            32 => 
            array (
                'id' => 71,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 35,
                'white_card' => 0,
            ),
            33 => 
            array (
                'id' => 72,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 35,
                'white_card' => 0,
            ),
            34 => 
            array (
                'id' => 73,
                'title' => 'Skills',
                'items_json' => '["Formwork Carpentry"]',
                'job_id' => 35,
                'white_card' => 0,
            ),
            35 => 
            array (
                'id' => 74,
                'title' => 'Tickets',
                'items_json' => '[{"ticket":"Driver","description":"Licence","created_by":28,"id":20},{"ticket":"White","description":"Card","created_by":28,"id":21}]',
                'job_id' => 35,
                'white_card' => 0,
            ),
            36 => 
            array (
                'id' => 75,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 36,
                'white_card' => 0,
            ),
            37 => 
            array (
                'id' => 76,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 36,
                'white_card' => 0,
            ),
            38 => 
            array (
                'id' => 77,
                'title' => 'Skills',
                'items_json' => '["Physically Fit"]',
                'job_id' => 36,
                'white_card' => 0,
            ),
            39 => 
            array (
                'id' => 78,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 36,
                'white_card' => 0,
            ),
            40 => 
            array (
                'id' => 83,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 37,
                'white_card' => 0,
            ),
            41 => 
            array (
                'id' => 84,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 37,
                'white_card' => 0,
            ),
            42 => 
            array (
                'id' => 85,
                'title' => 'Skills',
                'items_json' => '["Physically Fit"]',
                'job_id' => 37,
                'white_card' => 0,
            ),
            43 => 
            array (
                'id' => 86,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 37,
                'white_card' => 0,
            ),
            44 => 
            array (
                'id' => 87,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 38,
                'white_card' => 0,
            ),
            45 => 
            array (
                'id' => 88,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 38,
                'white_card' => 0,
            ),
            46 => 
            array (
                'id' => 89,
                'title' => 'Skills',
                'items_json' => '["Attention to detail","Patience"]',
                'job_id' => 38,
                'white_card' => 0,
            ),
            47 => 
            array (
                'id' => 90,
                'title' => 'Tickets',
                'items_json' => '[{"id":32,"ticket":"TLIE3002 - Estimate\\/calculate mass, area and quantify dimensions","description":"Ability to estimate and calculate mass, area and quantify dimensions of loads in accordance with workplace requirements and relevant regulations, as part of work functions within the transpor","created_by":null}]',
                'job_id' => 38,
                'white_card' => 0,
            ),
            48 => 
            array (
                'id' => 91,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 39,
                'white_card' => 0,
            ),
            49 => 
            array (
                'id' => 92,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 39,
                'white_card' => 0,
            ),
            50 => 
            array (
                'id' => 93,
                'title' => 'Skills',
                'items_json' => '["Attention to detail","Patience"]',
                'job_id' => 39,
                'white_card' => 0,
            ),
            51 => 
            array (
                'id' => 94,
                'title' => 'Tickets',
                'items_json' => '[{"id":32,"ticket":"TLIE3002 - Estimate\\/calculate mass, area and quantify dimensions","description":"Ability to estimate and calculate mass, area and quantify dimensions of loads in accordance with workplace requirements and relevant regulations, as part of work functions within the transpor","created_by":null}]',
                'job_id' => 39,
                'white_card' => 0,
            ),
            52 => 
            array (
                'id' => 95,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 40,
                'white_card' => 0,
            ),
            53 => 
            array (
                'id' => 96,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 40,
                'white_card' => 0,
            ),
            54 => 
            array (
                'id' => 97,
                'title' => 'Skills',
                'items_json' => '["All carpentry from frame to fix"]',
                'job_id' => 40,
                'white_card' => 0,
            ),
            55 => 
            array (
                'id' => 98,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 40,
                'white_card' => 0,
            ),
            56 => 
            array (
                'id' => 103,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 41,
                'white_card' => 0,
            ),
            57 => 
            array (
                'id' => 104,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 41,
                'white_card' => 0,
            ),
            58 => 
            array (
                'id' => 105,
                'title' => 'Skills',
                'items_json' => '["All carpentry from frame to fix"]',
                'job_id' => 41,
                'white_card' => 0,
            ),
            59 => 
            array (
                'id' => 106,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 41,
                'white_card' => 0,
            ),
            60 => 
            array (
                'id' => 107,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 42,
                'white_card' => 0,
            ),
            61 => 
            array (
                'id' => 108,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 42,
                'white_card' => 0,
            ),
            62 => 
            array (
                'id' => 109,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 42,
                'white_card' => 0,
            ),
            63 => 
            array (
                'id' => 110,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 42,
                'white_card' => 0,
            ),
            64 => 
            array (
                'id' => 115,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 43,
                'white_card' => 0,
            ),
            65 => 
            array (
                'id' => 116,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 43,
                'white_card' => 0,
            ),
            66 => 
            array (
                'id' => 117,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 43,
                'white_card' => 0,
            ),
            67 => 
            array (
                'id' => 118,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 43,
                'white_card' => 0,
            ),
            68 => 
            array (
                'id' => 128,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 46,
                'white_card' => 0,
            ),
            69 => 
            array (
                'id' => 129,
                'title' => 'Skills',
                'items_json' => '["Skills1"]',
                'job_id' => 46,
                'white_card' => 0,
            ),
            70 => 
            array (
                'id' => 130,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 46,
                'white_card' => 0,
            ),
            71 => 
            array (
                'id' => 131,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 47,
                'white_card' => 0,
            ),
            72 => 
            array (
                'id' => 132,
                'title' => 'Skills',
                'items_json' => '["test","again"]',
                'job_id' => 47,
                'white_card' => 0,
            ),
            73 => 
            array (
                'id' => 133,
                'title' => 'Tickets',
                'items_json' => '[{"id":1,"ticket":"RIIWHS202D","description":"Enter and work in confined spaces","created_by":1}]',
                'job_id' => 47,
                'white_card' => 0,
            ),
            74 => 
            array (
                'id' => 142,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 52,
                'white_card' => 0,
            ),
            75 => 
            array (
                'id' => 143,
                'title' => 'Skills',
                'items_json' => '["Skills"]',
                'job_id' => 52,
                'white_card' => 0,
            ),
            76 => 
            array (
                'id' => 144,
                'title' => 'Tickets',
                'items_json' => '[{"id":3,"ticket":"CPCCWHS1001","description":"Prepare to work safely in the construction industry","created_by":1}]',
                'job_id' => 52,
                'white_card' => 0,
            ),
            77 => 
            array (
                'id' => 145,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 53,
                'white_card' => 0,
            ),
            78 => 
            array (
                'id' => 146,
                'title' => 'Skills',
                'items_json' => '["Skills"]',
                'job_id' => 53,
                'white_card' => 0,
            ),
            79 => 
            array (
                'id' => 147,
                'title' => 'Tickets',
                'items_json' => '[{"id":3,"ticket":"CPCCWHS1001","description":"Prepare to work safely in the construction industry","created_by":1}]',
                'job_id' => 53,
                'white_card' => 0,
            ),
            80 => 
            array (
                'id' => 157,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 54,
                'white_card' => 0,
            ),
            81 => 
            array (
                'id' => 158,
                'title' => 'Skills',
                'items_json' => '["Skills"]',
                'job_id' => 54,
                'white_card' => 0,
            ),
            82 => 
            array (
                'id' => 159,
                'title' => 'Tickets',
                'items_json' => '[{"id":3,"ticket":"CPCCWHS1001","description":"Prepare to work safely in the construction industry","created_by":1}]',
                'job_id' => 54,
                'white_card' => 0,
            ),
            83 => 
            array (
                'id' => 169,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 55,
                'white_card' => 0,
            ),
            84 => 
            array (
                'id' => 170,
                'title' => 'Skills',
                'items_json' => '["Skills"]',
                'job_id' => 55,
                'white_card' => 0,
            ),
            85 => 
            array (
                'id' => 171,
                'title' => 'Tickets',
                'items_json' => '[{"id":3,"ticket":"CPCCWHS1001","description":"Prepare to work safely in the construction industry","created_by":1}]',
                'job_id' => 55,
                'white_card' => 0,
            ),
            86 => 
            array (
                'id' => 175,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Bachelor\'s Degree"}]',
                'job_id' => 56,
                'white_card' => 0,
            ),
            87 => 
            array (
                'id' => 176,
                'title' => 'Skills',
                'items_json' => '["Skills"]',
                'job_id' => 56,
                'white_card' => 0,
            ),
            88 => 
            array (
                'id' => 177,
                'title' => 'Tickets',
                'items_json' => '[{"id":3,"ticket":"CPCCWHS1001","description":"Prepare to work safely in the construction industry","created_by":1}]',
                'job_id' => 56,
                'white_card' => 0,
            ),
            89 => 
            array (
                'id' => 187,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 60,
                'white_card' => 0,
            ),
            90 => 
            array (
                'id' => 188,
                'title' => 'Skills',
                'items_json' => '["Sample"]',
                'job_id' => 60,
                'white_card' => 0,
            ),
            91 => 
            array (
                'id' => 189,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 60,
                'white_card' => 0,
            ),
            92 => 
            array (
                'id' => 196,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Advanced Welding Certification","qualification_level":"Cert III"}]',
                'job_id' => 63,
                'white_card' => 0,
            ),
            93 => 
            array (
                'id' => 197,
                'title' => 'Skills',
                'items_json' => '["welder"]',
                'job_id' => 63,
                'white_card' => 0,
            ),
            94 => 
            array (
                'id' => 198,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 63,
                'white_card' => 0,
            ),
            95 => 
            array (
                'id' => 199,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"fdsfs","qualification_level":"Cert II"}]',
                'job_id' => 64,
                'white_card' => 0,
            ),
            96 => 
            array (
                'id' => 200,
                'title' => 'Skills',
                'items_json' => '["fdsf"]',
                'job_id' => 64,
                'white_card' => 0,
            ),
            97 => 
            array (
                'id' => 201,
                'title' => 'Tickets',
                'items_json' => '[{"ticket":"fds","description":"fds","created_by":294,"id":157}]',
                'job_id' => 64,
                'white_card' => 0,
            ),
            98 => 
            array (
                'id' => 208,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 67,
                'white_card' => 0,
            ),
            99 => 
            array (
                'id' => 209,
                'title' => 'Skills',
                'items_json' => '["fdgdfg"]',
                'job_id' => 67,
                'white_card' => 0,
            ),
            100 => 
            array (
                'id' => 210,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 67,
                'white_card' => 0,
            ),
            101 => 
            array (
                'id' => 217,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 70,
                'white_card' => 0,
            ),
            102 => 
            array (
                'id' => 218,
                'title' => 'Skills',
                'items_json' => '["Computer Skills"]',
                'job_id' => 70,
                'white_card' => 0,
            ),
            103 => 
            array (
                'id' => 219,
                'title' => 'Tickets',
                'items_json' => '[{"ticket":"white","description":"white","created_by":29,"id":158},{"id":154,"ticket":"White","description":"Card RIIMPO320F - Excavator Operator RIIHAN309F - Telescopic Materials Handler Operator RIIMPO317F - Roller Operations RIIMPO321F - Wheeled Front End Loader Operation RIIMPO318F - Skid Steer","created_by":258}]',
                'job_id' => 70,
                'white_card' => 0,
            ),
            104 => 
            array (
                'id' => 220,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 71,
                'white_card' => 0,
            ),
            105 => 
            array (
                'id' => 221,
                'title' => 'Experience',
                'items_json' => NULL,
                'job_id' => 71,
                'white_card' => 0,
            ),
            106 => 
            array (
                'id' => 222,
                'title' => 'Skills',
                'items_json' => '["Physically Fit"]',
                'job_id' => 71,
                'white_card' => 0,
            ),
            107 => 
            array (
                'id' => 223,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 71,
                'white_card' => 0,
            ),
            108 => 
            array (
                'id' => 224,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"project management","qualification_level":"Cert II"}]',
                'job_id' => 72,
                'white_card' => 0,
            ),
            109 => 
            array (
                'id' => 225,
                'title' => 'Skills',
                'items_json' => '["project management"]',
                'job_id' => 72,
                'white_card' => 0,
            ),
            110 => 
            array (
                'id' => 226,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 72,
                'white_card' => 0,
            ),
            111 => 
            array (
                'id' => 227,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Advanced Diploma"}]',
                'job_id' => 58,
                'white_card' => 0,
            ),
            112 => 
            array (
                'id' => 228,
                'title' => 'Skills',
                'items_json' => '["UI Design"]',
                'job_id' => 58,
                'white_card' => 0,
            ),
            113 => 
            array (
                'id' => 229,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 58,
                'white_card' => 0,
            ),
            114 => 
            array (
                'id' => 230,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 61,
                'white_card' => 0,
            ),
            115 => 
            array (
                'id' => 231,
                'title' => 'Skills',
                'items_json' => '["Sample"]',
                'job_id' => 61,
                'white_card' => 0,
            ),
            116 => 
            array (
                'id' => 232,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 61,
                'white_card' => 0,
            ),
            117 => 
            array (
                'id' => 236,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction & Engineer","qualification_level":"Cert I"}]',
                'job_id' => 73,
                'white_card' => 0,
            ),
            118 => 
            array (
                'id' => 237,
                'title' => 'Skills',
                'items_json' => '["Welding"]',
                'job_id' => 73,
                'white_card' => 0,
            ),
            119 => 
            array (
                'id' => 238,
                'title' => 'Tickets',
                'items_json' => '[{"id":158,"ticket":"white","description":"white","created_by":29}]',
                'job_id' => 73,
                'white_card' => 0,
            ),
            120 => 
            array (
                'id' => 239,
                'title' => 'Skills',
                'items_json' => '["Wel"]',
                'job_id' => 74,
                'white_card' => 0,
            ),
            121 => 
            array (
                'id' => 240,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 75,
                'white_card' => 0,
            ),
            122 => 
            array (
                'id' => 241,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 75,
                'white_card' => 0,
            ),
            123 => 
            array (
                'id' => 242,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 75,
                'white_card' => 0,
            ),
            124 => 
            array (
                'id' => 249,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 79,
                'white_card' => 0,
            ),
            125 => 
            array (
                'id' => 250,
                'title' => 'Skills',
                'items_json' => '["Labouring"]',
                'job_id' => 79,
                'white_card' => 0,
            ),
            126 => 
            array (
                'id' => 251,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 79,
                'white_card' => 0,
            ),
            127 => 
            array (
                'id' => 257,
                'title' => 'Skills',
                'items_json' => '["Formwork Carpentry"]',
                'job_id' => 80,
                'white_card' => 0,
            ),
            128 => 
            array (
                'id' => 258,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 81,
                'white_card' => 0,
            ),
            129 => 
            array (
                'id' => 259,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 81,
                'white_card' => 0,
            ),
            130 => 
            array (
                'id' => 260,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 81,
                'white_card' => 0,
            ),
            131 => 
            array (
                'id' => 261,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 82,
                'white_card' => 0,
            ),
            132 => 
            array (
                'id' => 262,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 82,
                'white_card' => 0,
            ),
            133 => 
            array (
                'id' => 263,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 82,
                'white_card' => 0,
            ),
            134 => 
            array (
                'id' => 264,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Construction Management","qualification_level":"Bachelor\'s Degree"},{"course_type":"Building & Construction","qualification_level":"Diploma"}]',
                'job_id' => 83,
                'white_card' => 0,
            ),
            135 => 
            array (
                'id' => 265,
                'title' => 'Skills',
                'items_json' => '["Keen to learn","Shows initiative"]',
                'job_id' => 83,
                'white_card' => 0,
            ),
            136 => 
            array (
                'id' => 266,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 83,
                'white_card' => 0,
            ),
            137 => 
            array (
                'id' => 267,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 84,
                'white_card' => 0,
            ),
            138 => 
            array (
                'id' => 268,
                'title' => 'Skills',
                'items_json' => '["Concrete Finishing","Concrete Reapir & Grouting","Caulking, Concrete Patching","Trowelling Skills","Solid Plastering","Steel Replacement","Rendering"]',
                'job_id' => 84,
                'white_card' => 0,
            ),
            139 => 
            array (
                'id' => 269,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 84,
                'white_card' => 0,
            ),
            140 => 
            array (
                'id' => 273,
                'title' => 'Skills',
                'items_json' => '["Concrete Finishing","Concrete Reapir & Grouting","Caulking, Concrete Patching","Trowelling Skills","Solid Plastering","Steel Replacement","Rendering"]',
                'job_id' => 85,
                'white_card' => 0,
            ),
            141 => 
            array (
                'id' => 274,
                'title' => 'Tickets',
                'items_json' => '[{"ticket":"Australian","description":"Drivers Licence","created_by":387,"id":176},{"ticket":"White","description":"Card","created_by":387,"id":177}]',
                'job_id' => 85,
                'white_card' => 0,
            ),
            142 => 
            array (
                'id' => 275,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 86,
                'white_card' => 0,
            ),
            143 => 
            array (
                'id' => 276,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 86,
                'white_card' => 0,
            ),
            144 => 
            array (
                'id' => 277,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 86,
                'white_card' => 0,
            ),
            145 => 
            array (
                'id' => 278,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 87,
                'white_card' => 0,
            ),
            146 => 
            array (
                'id' => 279,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 87,
                'white_card' => 0,
            ),
            147 => 
            array (
                'id' => 280,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 87,
                'white_card' => 0,
            ),
            148 => 
            array (
                'id' => 284,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Bricklaying","qualification_level":"Cert III"}]',
                'job_id' => 89,
                'white_card' => 0,
            ),
            149 => 
            array (
                'id' => 285,
                'title' => 'Skills',
                'items_json' => '["Re-cut stone and other types of building blocks","Partitions, Arches and other Structures","Erecting and dismantling restricted height scaffolding","Sealing foundations with damp-resistant materials and spreading layers of mortar to serve as","Must be able to lay at least 500 clean bricks a day","Cutting, shaping bricks using machines and hand tools"]',
                'job_id' => 89,
                'white_card' => 0,
            ),
            150 => 
            array (
                'id' => 286,
                'title' => 'Tickets',
                'items_json' => '[{"id":177,"ticket":"White","description":"Card","created_by":387}]',
                'job_id' => 89,
                'white_card' => 0,
            ),
            151 => 
            array (
                'id' => 290,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Bricklaying","qualification_level":"Cert III"}]',
                'job_id' => 90,
                'white_card' => 0,
            ),
            152 => 
            array (
                'id' => 291,
                'title' => 'Skills',
                'items_json' => '["Re-cut stone and other types of building blocks","Partitions, Arches and other Structures","Erecting and dismantling restricted height scaffolding","Sealing foundations with damp-resistant materials and spreading layers of mortar to serve as","Must be able to lay at least 500 clean bricks a day","Cutting, shaping bricks using machines and hand tools"]',
                'job_id' => 90,
                'white_card' => 0,
            ),
            153 => 
            array (
                'id' => 292,
                'title' => 'Tickets',
                'items_json' => '[{"id":177,"ticket":"White","description":"Card","created_by":387}]',
                'job_id' => 90,
                'white_card' => 0,
            ),
            154 => 
            array (
                'id' => 293,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 91,
                'white_card' => 0,
            ),
            155 => 
            array (
                'id' => 294,
                'title' => 'Skills',
                'items_json' => '["Basic Site Knowledge","Physically Fit","Shoveling","Wheel barrow"]',
                'job_id' => 91,
                'white_card' => 0,
            ),
            156 => 
            array (
                'id' => 295,
                'title' => 'Tickets',
                'items_json' => '[{"id":177,"ticket":"White","description":"Card","created_by":387}]',
                'job_id' => 91,
                'white_card' => 0,
            ),
            157 => 
            array (
                'id' => 296,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 92,
                'white_card' => 0,
            ),
            158 => 
            array (
                'id' => 297,
                'title' => 'Skills',
                'items_json' => '["Basic Site Knowledge","Physically Fit","Shoveling","Wheel barrow"]',
                'job_id' => 92,
                'white_card' => 0,
            ),
            159 => 
            array (
                'id' => 298,
                'title' => 'Tickets',
                'items_json' => '[{"id":177,"ticket":"White","description":"Card","created_by":387}]',
                'job_id' => 92,
                'white_card' => 0,
            ),
            160 => 
            array (
                'id' => 299,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Building and Construction","qualification_level":"Cert III"}]',
                'job_id' => 93,
                'white_card' => 0,
            ),
            161 => 
            array (
                'id' => 300,
                'title' => 'Skills',
                'items_json' => '["Carpentry"]',
                'job_id' => 93,
                'white_card' => 0,
            ),
            162 => 
            array (
                'id' => 301,
                'title' => 'Tickets',
                'items_json' => '[{"id":177,"ticket":"White","description":"Card","created_by":387}]',
                'job_id' => 93,
                'white_card' => 0,
            ),
            163 => 
            array (
                'id' => 304,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"Carpentry","qualification_level":"Cert III"}]',
                'job_id' => 95,
                'white_card' => 0,
            ),
            164 => 
            array (
                'id' => 305,
                'title' => 'Skills',
                'items_json' => '["Carpentry"]',
                'job_id' => 95,
                'white_card' => 0,
            ),
            165 => 
            array (
                'id' => 306,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 95,
                'white_card' => 0,
            ),
            166 => 
            array (
                'id' => 307,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 96,
                'white_card' => 0,
            ),
            167 => 
            array (
                'id' => 308,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 96,
                'white_card' => 0,
            ),
            168 => 
            array (
                'id' => 309,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 96,
                'white_card' => 0,
            ),
            169 => 
            array (
                'id' => 310,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 97,
                'white_card' => 0,
            ),
            170 => 
            array (
                'id' => 311,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 97,
                'white_card' => 0,
            ),
            171 => 
            array (
                'id' => 312,
                'title' => 'Tickets',
                'items_json' => '[{"id":177,"ticket":"White","description":"Card","created_by":387}]',
                'job_id' => 97,
                'white_card' => 0,
            ),
            172 => 
            array (
                'id' => 317,
                'title' => 'Skills',
                'items_json' => '["Physically Fit"]',
                'job_id' => 98,
                'white_card' => 0,
            ),
            173 => 
            array (
                'id' => 318,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 99,
                'white_card' => 0,
            ),
            174 => 
            array (
                'id' => 319,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 99,
                'white_card' => 0,
            ),
            175 => 
            array (
                'id' => 320,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 99,
                'white_card' => 0,
            ),
            176 => 
            array (
                'id' => 321,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 100,
                'white_card' => 0,
            ),
            177 => 
            array (
                'id' => 322,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 100,
                'white_card' => 0,
            ),
            178 => 
            array (
                'id' => 323,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 100,
                'white_card' => 0,
            ),
            179 => 
            array (
                'id' => 324,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 101,
                'white_card' => 0,
            ),
            180 => 
            array (
                'id' => 325,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 101,
                'white_card' => 0,
            ),
            181 => 
            array (
                'id' => 326,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 101,
                'white_card' => 0,
            ),
            182 => 
            array (
                'id' => 327,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 102,
                'white_card' => 0,
            ),
            183 => 
            array (
                'id' => 328,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 102,
                'white_card' => 0,
            ),
            184 => 
            array (
                'id' => 329,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 102,
                'white_card' => 0,
            ),
            185 => 
            array (
                'id' => 330,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 103,
                'white_card' => 0,
            ),
            186 => 
            array (
                'id' => 331,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 103,
                'white_card' => 0,
            ),
            187 => 
            array (
                'id' => 332,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 103,
                'white_card' => 0,
            ),
            188 => 
            array (
                'id' => 333,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 104,
                'white_card' => 0,
            ),
            189 => 
            array (
                'id' => 334,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 104,
                'white_card' => 0,
            ),
            190 => 
            array (
                'id' => 335,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 104,
                'white_card' => 0,
            ),
            191 => 
            array (
                'id' => 339,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 106,
                'white_card' => 0,
            ),
            192 => 
            array (
                'id' => 340,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 106,
                'white_card' => 0,
            ),
            193 => 
            array (
                'id' => 341,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 106,
                'white_card' => 0,
            ),
            194 => 
            array (
                'id' => 342,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 107,
                'white_card' => 0,
            ),
            195 => 
            array (
                'id' => 343,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 107,
                'white_card' => 0,
            ),
            196 => 
            array (
                'id' => 344,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 107,
                'white_card' => 0,
            ),
            197 => 
            array (
                'id' => 349,
                'title' => 'Tickets',
                'items_json' => '[{"ticket":"test","description":"test","created_by":305,"id":340}]',
                'job_id' => 108,
                'white_card' => 0,
            ),
            198 => 
            array (
                'id' => 368,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 122,
                'white_card' => 1,
            ),
            199 => 
            array (
                'id' => 369,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 122,
                'white_card' => 1,
            ),
            200 => 
            array (
                'id' => 370,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 122,
                'white_card' => 1,
            ),
            201 => 
            array (
                'id' => 371,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 126,
                'white_card' => 1,
            ),
            202 => 
            array (
                'id' => 372,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 126,
                'white_card' => 1,
            ),
            203 => 
            array (
                'id' => 373,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 126,
                'white_card' => 1,
            ),
            204 => 
            array (
                'id' => 374,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 127,
                'white_card' => 1,
            ),
            205 => 
            array (
                'id' => 375,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 127,
                'white_card' => 1,
            ),
            206 => 
            array (
                'id' => 376,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 127,
                'white_card' => 1,
            ),
            207 => 
            array (
                'id' => 377,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 128,
                'white_card' => 1,
            ),
            208 => 
            array (
                'id' => 378,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 128,
                'white_card' => 1,
            ),
            209 => 
            array (
                'id' => 379,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 128,
                'white_card' => 1,
            ),
            210 => 
            array (
                'id' => 380,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 129,
                'white_card' => 1,
            ),
            211 => 
            array (
                'id' => 381,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 129,
                'white_card' => 1,
            ),
            212 => 
            array (
                'id' => 382,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 129,
                'white_card' => 1,
            ),
            213 => 
            array (
                'id' => 383,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 130,
                'white_card' => 1,
            ),
            214 => 
            array (
                'id' => 384,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 130,
                'white_card' => 1,
            ),
            215 => 
            array (
                'id' => 385,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 130,
                'white_card' => 1,
            ),
            216 => 
            array (
                'id' => 386,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 131,
                'white_card' => 1,
            ),
            217 => 
            array (
                'id' => 387,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 131,
                'white_card' => 1,
            ),
            218 => 
            array (
                'id' => 388,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 131,
                'white_card' => 1,
            ),
            219 => 
            array (
                'id' => 389,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 132,
                'white_card' => 1,
            ),
            220 => 
            array (
                'id' => 390,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 132,
                'white_card' => 1,
            ),
            221 => 
            array (
                'id' => 391,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 132,
                'white_card' => 1,
            ),
            222 => 
            array (
                'id' => 392,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 133,
                'white_card' => 1,
            ),
            223 => 
            array (
                'id' => 393,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 133,
                'white_card' => 1,
            ),
            224 => 
            array (
                'id' => 394,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 133,
                'white_card' => 1,
            ),
            225 => 
            array (
                'id' => 395,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 134,
                'white_card' => 1,
            ),
            226 => 
            array (
                'id' => 396,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 134,
                'white_card' => 1,
            ),
            227 => 
            array (
                'id' => 397,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 134,
                'white_card' => 1,
            ),
            228 => 
            array (
                'id' => 398,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 135,
                'white_card' => 1,
            ),
            229 => 
            array (
                'id' => 399,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 135,
                'white_card' => 1,
            ),
            230 => 
            array (
                'id' => 400,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 135,
                'white_card' => 1,
            ),
            231 => 
            array (
                'id' => 401,
                'title' => 'Qualifications',
                'items_json' => NULL,
                'job_id' => 136,
                'white_card' => 1,
            ),
            232 => 
            array (
                'id' => 402,
                'title' => 'Skills',
                'items_json' => NULL,
                'job_id' => 136,
                'white_card' => 1,
            ),
            233 => 
            array (
                'id' => 403,
                'title' => 'Tickets',
                'items_json' => NULL,
                'job_id' => 136,
                'white_card' => 1,
            ),
            234 => 
            array (
                'id' => 407,
                'title' => 'Qualifications',
                'items_json' => '[{"course_type":"bricklaying","qualification_level":"Cert II"}]',
                'job_id' => 138,
                'white_card' => 1,
            ),
            235 => 
            array (
                'id' => 408,
                'title' => 'Skills',
                'items_json' => '["Basic site knowledge"]',
                'job_id' => 138,
                'white_card' => 1,
            ),
            236 => 
            array (
                'id' => 409,
                'title' => 'Tickets',
            'items_json' => '[{"id":7,"ticket":"TLILIC20005","description":"Licence to operate a boom-type elevating work platform (boom length 11meters or more)","created_by":1}]',
                'job_id' => 138,
                'white_card' => 1,
            ),
        ));
        
        
    }
}