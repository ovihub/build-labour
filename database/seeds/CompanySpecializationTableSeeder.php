<?php

use Illuminate\Database\Seeder;

class CompanySpecializationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_specialization')->delete();
        
        \DB::table('company_specialization')->insert(array (
            0 => 
            array (
                'id' => 4,
                'company_id' => 8,
                'secondary_id' => 1,
            ),
            1 => 
            array (
                'id' => 5,
                'company_id' => 8,
                'secondary_id' => 2,
            ),
            2 => 
            array (
                'id' => 6,
                'company_id' => 8,
                'secondary_id' => 3,
            ),
            3 => 
            array (
                'id' => 7,
                'company_id' => 20,
                'secondary_id' => 8,
            ),
            4 => 
            array (
                'id' => 8,
                'company_id' => 20,
                'secondary_id' => 9,
            ),
        ));
        
        
    }
}