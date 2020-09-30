<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('administrators')->delete();
        
        \DB::table('administrators')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'created_at' => '2019-09-26 06:27:23',
                'updated_at' => '2019-09-26 06:27:23',
            ),
        ));
        
        
    }
}