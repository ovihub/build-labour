<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table_name = 'levels';

    	DB::table($table_name)->delete();

        DB::table($table_name)->insert([
            [ 'name' => 'Beginner' ],
            [ 'name' => 'Competent' ],
            [ 'name' => 'Expert' ],
        ]);
    }
}
