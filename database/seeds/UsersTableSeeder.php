<?php

use App\Models\Users\WorkExperience;
use App\User;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = new User();
        $user->first_name = $faker->firstName;
        $user->last_name = $faker->lastName;
        $user->email = 'testemail@test.com';
        $user->password = 'secret';
        $user->dob = Carbon::parse('08/10/1988');
        $user->mobile_number = '+61 412345678';
        $user->address = $faker->address;
        $user->marital_status = 'single';
        $user->gender = 'male';
        $user->is_verified = Carbon::now();
        $user->role_id = 1; // worker
        $user->save();

        WorkExperience::create([
            'job_role' => 'Human Resource Office',
            'company_id' => 1,
            'isCurrent' => true,
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\Models\Users\Education::create([
            'course' => 'Study Bachelor of Science in Psychology',
            'school' => 'University of Melbourne',
            'start_date' => Carbon::parse('08/10/2006'),
            'end_date' => Carbon::parse('08/10/2010'),
            'description' => 'Learning at this school to be become a Psychologist',
            'user_id' => $user->id
        ]);
    }
}