<?php

use Illuminate\Database\Seeder;

class CompanyMainFunctionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_main_functions')->delete();
        
        \DB::table('company_main_functions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'main_name' => 'Building Contractor',
            ),
            1 => 
            array (
                'id' => 2,
                'main_name' => 'Trade Services Contractor',
            ),
            2 => 
            array (
                'id' => 3,
                'main_name' => 'Supplier',
            ),
            3 => 
            array (
                'id' => 4,
                'main_name' => 'Design Consultant',
            ),
            4 => 
            array (
                'id' => 5,
                'main_name' => 'Training and Education Provider',
            ),
        ));
        
        
    }
}