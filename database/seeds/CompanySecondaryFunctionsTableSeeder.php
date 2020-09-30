<?php

use Illuminate\Database\Seeder;

class CompanySecondaryFunctionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_secondary_functions')->delete();
        
        \DB::table('company_secondary_functions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'main_id' => 1,
                'secondary_name' => 'Item 1 - Building Contractor',
            ),
            1 => 
            array (
                'id' => 2,
                'main_id' => 1,
                'secondary_name' => 'Item 2 - Building Contractor',
            ),
            2 => 
            array (
                'id' => 3,
                'main_id' => 1,
                'secondary_name' => 'Item 3 - Building Contractor',
            ),
            3 => 
            array (
                'id' => 4,
                'main_id' => 2,
                'secondary_name' => 'Plumbing',
            ),
            4 => 
            array (
                'id' => 5,
                'main_id' => 2,
                'secondary_name' => 'Carpentry',
            ),
            5 => 
            array (
                'id' => 6,
                'main_id' => 3,
                'secondary_name' => 'Item 1 - Supplier',
            ),
            6 => 
            array (
                'id' => 7,
                'main_id' => 3,
                'secondary_name' => 'Item 2 - Supplier',
            ),
            7 => 
            array (
                'id' => 8,
                'main_id' => 4,
                'secondary_name' => 'Engineer',
            ),
            8 => 
            array (
                'id' => 9,
                'main_id' => 4,
                'secondary_name' => 'Architect',
            ),
            9 => 
            array (
                'id' => 10,
                'main_id' => 5,
                'secondary_name' => 'Item 1 - Training and Education Provider',
            ),
            10 => 
            array (
                'id' => 11,
                'main_id' => 5,
                'secondary_name' => 'Item 2 - Training and Education Provider',
            ),
        ));
        
        
    }
}