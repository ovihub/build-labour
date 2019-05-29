<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tiers

        DB::table('company_tiers')->insert([
            ['tier_name' => 'Tier 1'],
            ['tier_name' => 'Tier 2'],
            ['tier_name' => 'Tier 3'],
            ['tier_name' => 'Tier 4'],
        ]);

        // business types

        DB::table('company_business_types')->insert([
            ['business_type' => 'Residential'],
            ['business_type' => 'Commercial'],
            ['business_type' => 'Civil']
        ]);


        // main functions

        $main1 = new \App\Models\Options\MainFunction();
        $main1->main_name = 'Building Contractor';
        $main1->save();

        $main2 = new \App\Models\Options\MainFunction();
        $main2->main_name = 'Trade Services Contractor';
        $main2->save();

        DB::table('company_main_functions')->insert([
            ['main_name' => 'Building Contractor'],
            ['main_name' => 'Trade Services Contractor'],
        ]);

        // main functions
        DB::table('company_secondary_functions')->insert([
            ['secondary_name' => 'item1 - building contractor', 'main_id' => $main1->id],
            ['secondary_name' => 'item2 - building contractor', 'main_id' => $main1->id],
            ['secondary_name' => 'item3 - building contractor', 'main_id' => $main1->id],
            ['secondary_name' => 'item1 - Trade Services Contractor', 'main_id' => $main2->id],
            ['secondary_name' => 'item2 - Trade Services Contractor', 'main_id' => $main2->id],
            ['secondary_name' => 'item3 - Trade Services Contractor', 'main_id' => $main2->id],
        ]);

    }
}
