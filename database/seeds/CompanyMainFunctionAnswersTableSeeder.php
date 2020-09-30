<?php

use Illuminate\Database\Seeder;

class CompanyMainFunctionAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_main_function_answers')->delete();
        
        \DB::table('company_main_function_answers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'main_function_id' => 1,
                'answer' => 'Wall painting',
            ),
            1 => 
            array (
                'id' => 2,
                'main_function_id' => 4,
                'answer' => 'Interior Design',
            ),
            2 => 
            array (
                'id' => 3,
                'main_function_id' => 2,
                'answer' => 'Concreting',
            ),
            3 => 
            array (
                'id' => 4,
                'main_function_id' => 2,
                'answer' => 'Heating Specialist',
            ),
            4 => 
            array (
                'id' => 5,
                'main_function_id' => 2,
                'answer' => 'Heating Specialist, In Slab Heating & Boiler Servicing',
            ),
            5 => 
            array (
                'id' => 6,
                'main_function_id' => 2,
                'answer' => 'Plastering Specialist',
            ),
            6 => 
            array (
                'id' => 7,
                'main_function_id' => 2,
                'answer' => 'Stonemason',
            ),
            7 => 
            array (
                'id' => 8,
                'main_function_id' => 3,
                'answer' => 'Software',
            ),
            8 => 
            array (
                'id' => 9,
                'main_function_id' => 3,
                'answer' => 'Hardware',
            ),
            9 => 
            array (
                'id' => 10,
                'main_function_id' => 2,
                'answer' => 'construction',
            ),
            10 => 
            array (
                'id' => 11,
                'main_function_id' => 4,
                'answer' => 'Web Design',
            ),
            11 => 
            array (
                'id' => 12,
                'main_function_id' => 2,
                'answer' => 'Concrete Repair',
            ),
            12 => 
            array (
                'id' => 13,
                'main_function_id' => 2,
                'answer' => 'Concrete Repair and Remediation',
            ),
            13 => 
            array (
                'id' => 14,
                'main_function_id' => 2,
                'answer' => 'Labour Hire',
            ),
            14 => 
            array (
                'id' => 15,
                'main_function_id' => 5,
                'answer' => 'Vocational',
            ),
            15 => 
            array (
                'id' => 16,
                'main_function_id' => 2,
                'answer' => 'Brick & Blocklayer',
            ),
            16 => 
            array (
                'id' => 17,
                'main_function_id' => 2,
                'answer' => 'High end residential and commercial brick and blocklaying. Servicing the mornington peninsula and bayside areas.',
            ),
            17 => 
            array (
                'id' => 18,
                'main_function_id' => 2,
                'answer' => 'Carpentry',
            ),
            18 => 
            array (
                'id' => 19,
                'main_function_id' => 2,
                'answer' => 'Rammed Earth',
            ),
            19 => 
            array (
                'id' => 20,
                'main_function_id' => 2,
                'answer' => 'Polished Concrete',
            ),
        ));
        
        
    }
}