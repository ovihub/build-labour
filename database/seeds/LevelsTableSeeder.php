<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('levels')->delete();
        
        \DB::table('levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Beginner',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Competent',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Expert',
            ),
        ));
        
        
    }
}