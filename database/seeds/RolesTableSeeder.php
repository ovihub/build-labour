<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'worker']);
        Role::create(['name' => 'company']);
        Role::create(['name' => 'contractor']);
        Role::create(['name' => 'training']);
    }
}
