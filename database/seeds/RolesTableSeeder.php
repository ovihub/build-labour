<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Worker',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Company',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Contractor',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Training',
            ),
        ));
        
        
    }
}