<?php

use Illuminate\Database\Seeder;

class JobResponsibilitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_responsibilities')->delete();
        
        \DB::table('job_responsibilities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Quality Management',
                'items_json' => '["Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.","Lead and drive a \\u201cQuality Built In\\u201d culture.","Ensure systems and processes are in place to manage quality planning processes and the application of risk management methods.","Ensure project team effectively manage the quality performance of subcontractors and implement improvements."]',
                'job_id' => 6,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Next Title',
                'items_json' => '["Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.","Lead and drive a \\u201cQuality Built In\\u201d culture."]',
                'job_id' => 6,
            ),
            2 => 
            array (
                'id' => 18,
                'title' => 'Head Engineer',
                'items_json' => '["Head Engineer"]',
                'job_id' => 25,
            ),
            3 => 
            array (
                'id' => 19,
                'title' => 'Head Engineer',
                'items_json' => '["Head Engineer"]',
                'job_id' => 26,
            ),
            4 => 
            array (
                'id' => 20,
                'title' => 'Head Engineer',
                'items_json' => '["Head Engineer"]',
                'job_id' => 28,
            ),
            5 => 
            array (
                'id' => 21,
                'title' => 'Formwork Carpentry',
                'items_json' => '["Structure Erection","Formwork Finishing",null]',
                'job_id' => 34,
            ),
            6 => 
            array (
                'id' => 22,
                'title' => 'Formwork Carpentry',
                'items_json' => '["Structure Erection","Formwork Finishing",null]',
                'job_id' => 35,
            ),
            7 => 
            array (
                'id' => 25,
                'title' => 'Formwork Carpentry',
                'items_json' => '["Lead and drive a \\u201cQuality Built In\\u201d culture.","Ensure systems and processes are in place to manage quality planning processes and the application of risk management methods."]',
                'job_id' => 46,
            ),
            8 => 
            array (
                'id' => 26,
                'title' => 'Formwork Carpentry',
                'items_json' => '["Lead and drive a \\u201cQuality Built In\\u201d culture.","Lead and drive a \\u201cQuality Built In\\u201d culture.","Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures."]',
                'job_id' => 47,
            ),
            9 => 
            array (
                'id' => 31,
                'title' => 'Quality Management',
                'items_json' => '["Have QA Skills","Ensure everything is aligned"]',
                'job_id' => 52,
            ),
            10 => 
            array (
                'id' => 32,
                'title' => 'Quality Assurance',
                'items_json' => '["Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.","Create","Design"]',
                'job_id' => 55,
            ),
            11 => 
            array (
                'id' => 33,
                'title' => 'Quality Management',
                'items_json' => '["Have QA Skills","Ensure everything is aligned"]',
                'job_id' => 56,
            ),
            12 => 
            array (
                'id' => 34,
                'title' => 'fsdfsdfd',
                'items_json' => '["fdsfsdf","fdsfsdf"]',
                'job_id' => 64,
            ),
            13 => 
            array (
                'id' => 38,
                'title' => 'General Site Cleaning',
                'items_json' => '["Ensuring the site is clean for other trades"]',
                'job_id' => 79,
            ),
            14 => 
            array (
                'id' => 39,
                'title' => 'Formwork Carpentry',
                'items_json' => '["Structure Erection","Formwork Finishing",null]',
                'job_id' => 80,
            ),
            15 => 
            array (
                'id' => 40,
                'title' => 'High Safety Standards',
                'items_json' => '["Has experience with high risk work"]',
                'job_id' => 84,
            ),
            16 => 
            array (
                'id' => 41,
                'title' => 'High Safety Standards',
                'items_json' => '["Has experience with high risk work"]',
                'job_id' => 85,
            ),
            17 => 
            array (
                'id' => 42,
                'title' => 'High Quality',
                'items_json' => NULL,
                'job_id' => 93,
            ),
            18 => 
            array (
                'id' => 43,
                'title' => 'Carpentry',
                'items_json' => NULL,
                'job_id' => 93,
            ),
            19 => 
            array (
                'id' => 45,
                'title' => 'High Quality',
                'items_json' => '["Carpentry"]',
                'job_id' => 95,
            ),
        ));
        
        
    }
}