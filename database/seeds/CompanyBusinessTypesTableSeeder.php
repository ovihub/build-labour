<?php

use Illuminate\Database\Seeder;

class CompanyBusinessTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_business_types')->delete();
        
        \DB::table('company_business_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'business_type' => 'Residential',
            ),
            1 => 
            array (
                'id' => 2,
                'business_type' => 'Commercial',
            ),
            2 => 
            array (
                'id' => 3,
                'business_type' => 'Civil',
            ),
            3 => 
            array (
                'id' => 4,
                'business_type' => 'Industrial',
            ),
        ));
        
        
    }
}