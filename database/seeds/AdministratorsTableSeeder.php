<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date('Y-m-d H:i:s');

        $user = User::create([
            'first_name' => 'Build Labour',
            'last_name' => 'Admin',
            'mobile_number' => '+61412345678',
            'email' => env('APP_EMAIL_SUPPORT'),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'created_at' => $date,
            'updated_at' => $date
        ]);

        $table_name = 'administrators';
        
        DB::table($table_name)->insert([
            'user_id' => $user->id,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
