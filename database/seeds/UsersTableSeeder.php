<?php

use App\Models\Users\Education;
use App\Models\Users\WorkerDetail;
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
            'job_role' => 'Human Resource Officer',
            'responsibilities' => 'Meeting with engineers, architects and contractors on an ongoing basis regarding project objectives and progress',
            'company_name' => 'Johnson & Johnson',
            'company_id' => 1,
            'isCurrent' => false,
            'user_id' => $user->id,
            'start_date' => Carbon::parse('11/10/2012'),
            'end_date' => Carbon::parse('09/04/2017'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        WorkExperience::create([
            'job_role' => 'Human Resource Manager',
            'responsibilities' => 'Meeting with employees on how to discipline',
            'company_name' => 'Cisco Network',
            'company_id' => 1,
            'isCurrent' => true,
            'user_id' => $user->id,
            'start_date' => Carbon::parse('11/10/2012'),
            'end_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Education::create([
            'course' => 'Study Bachelor of Science in Psychology',
            'school' => 'University of Melbourne',
            'start_date' => Carbon::parse('08/10/2006'),
            'end_date' => Carbon::parse('08/10/2010'),
            'description' => 'Learning at this school to be become a Psychologist',
            'user_id' => $user->id
        ]);

        WorkerDetail::create([
            'profile_description' => 'Experienced Senior Project Manager; demonstrated history of working on a wide range of construction projects for leading companies.',
            'nrole_info' => 'My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team. ',
            'nrole_when' => 'In 6 months (June 2019)',
            'nrole_travel_to_home' => '100km',
            'nrole_address' => 'New South Wales',
            'nrole_state' => 'VI',
            'nrole_right_to_work_au' => true,
            'user_id' => $user->id
        ]);
    }
}