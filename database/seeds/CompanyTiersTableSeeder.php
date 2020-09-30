<?php

use Illuminate\Database\Seeder;

class CompanyTiersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('company_tiers')->delete();
        
        \DB::table('company_tiers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tier_name' => 'Tier 1',
            ),
            1 => 
            array (
                'id' => 2,
                'tier_name' => 'Tier 2',
            ),
            2 => 
            array (
                'id' => 3,
                'tier_name' => 'Tier 3',
            ),
            3 => 
            array (
                'id' => 4,
                'tier_name' => 'Tier 4',
            ),
        ));
        
        
    }
}