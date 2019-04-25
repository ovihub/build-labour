<?php

use App\Models\Users\Education;
use App\Models\Users\Ticket;
use App\Models\Users\UserSkill;
use App\Models\Users\WorkerDetail;
use App\Models\Users\WorkExperience;
use App\Models\Users\WorkExperienceResponsibility;
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
        $user = User::whereEmail('testemail@test.com')->first();

        if (!$user) {

            $user = new User();
            $user->first_name = 'Henry';
            $user->last_name = 'Ramirez';
            $user->email = 'testemail@test.com';
            $user->password = 'secret';
            $user->date_of_birth = Carbon::parse('08/10/1988');
            $user->mobile_number = '+61 412345678';
            $user->address = 'Richmond, Victoria, Australia';
            $user->marital_status = 'Single';
            $user->gender = 'Male';
            $user->is_verified = Carbon::now();
            $user->role_id = 1; // worker
            $user->save();

            WorkExperience::create([
                'job_role' => 'Project Manager',
                'company_name' => 'Probuild',
                'company_id' => 1,
                'user_id' => $user->id,
                'start_date' => Carbon::parse('11/10/2012'),
                'end_date' => Carbon::parse('09/04/2017'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            WorkExperience::create([
                'job_role' => 'Assistant Project Manager',
                'company_name' => 'BBUILD',
                'company_id' => 1,
                'user_id' => $user->id,
                'start_date' => Carbon::parse('11/10/2012'),
                'end_date' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            WorkExperience::create([
                'job_role' => 'Construction',
                'company_name' => 'Tools ‘r’ Us',
                'company_id' => 1,
                'user_id' => $user->id,
                'start_date' => Carbon::parse('11/10/2012'),
                'end_date' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            WorkExperience::create([
                'job_role' => 'Site Manager',
                'company_name' => 'Richmond Surveying',
                'company_id' => 1,
                'user_id' => $user->id,
                'start_date' => Carbon::parse('11/10/2012'),
                'end_date' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Education::create([
                'course' => 'Construction & Engineer',
                'school' => 'Royal Melbourne Institute of Technology',
                'start_date' => Carbon::parse('06/10/2009'),
                'end_date' => Carbon::parse('04/10/2010'),
                'description' => 'Learning at this school to be become a Psychologist',
                'user_id' => $user->id
            ]);

            Education::create([
                'course' => 'Cert II - Construction ',
                'school' => 'Royal Melbourne Institute of Technology',
                'start_date' => Carbon::parse('11/10/2008'),
                'end_date' => Carbon::parse('06/10/2009'),
                'description' => 'Learning at this school to be become a Psychologist',
                'user_id' => $user->id
            ]);

            Education::create([
                'course' => 'Cert I - Construction ',
                'school' => 'Royal Melbourne Institute of Technology',
                'start_date' => Carbon::parse('03/10/2015'),
                'end_date' => Carbon::parse('11/10/2018'),
                'description' => 'Learning at this school to be become a Psychologist',
                'user_id' => $user->id
            ]);

            WorkerDetail::create([
                'profile_description' => 'Experienced Senior Project Manager; demonstrated history of working on a wide range of construction projects for leading companies.',
                'english_skill' => 'Proficient in written and spoken',
                'drivers_license' => 'Owns a license.',
                'right_to_work' => 'Yes, I have right to work in Australia',
                'main_skill' => 'Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline.',
                'introduction' => 'My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team. ',
                'when' => 'In 6 months (June 2019)',
                'max_distance' => '100km',
                'address' => 'New South Wales',
                'state' => 'VIC',
                'nrole_right_to_work_au' => true,
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'TLILIC2001',
                'description' => 'Licence to operate a Forklift Truck',
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'RIIHAN301D',
                'description' => 'Elevating Work Platform Under 11m',
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'RIIWHS205D',
                'description' => 'Control Traffic with Stop - Slow Bat',
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'TLILIC2001',
                'description' => 'Licence to operate a Forklift Truck',
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'RIIHAN301D',
                'description' => 'Control Traffic with Stop - Slow Bat',
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'RIIWHS205D',
                'description' => 'Licence to operate a Forklift Truck',
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'TLILIC2001',
                'description' => 'Licence to operate a Forklift Truck',
                'user_id' => $user->id
            ]);
        }

        UserSkill::create([
            'user_id' => $user->id,
            'skill_id' => 1,
            'level_id' => 1
        ]);

        UserSkill::create([
            'user_id' => $user->id,
            'skill_id' => 2,
            'level_id' => 2
        ]);

        UserSkill::create([
            'user_id' => $user->id,
            'skill_id' => 3,
            'level_id' => 3
        ]);

        UserSkill::create([
            'user_id' => $user->id,
            'skill_id' => 4,
            'level_id' => 1
        ]);

        UserSkill::create([
            'user_id' => $user->id,
            'skill_id' => 5,
            'level_id' => 2
        ]);
    }
}