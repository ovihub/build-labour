<?php

use Illuminate\Database\Seeder;

class ConnectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('connections')->delete();
        
        
        
    }
}