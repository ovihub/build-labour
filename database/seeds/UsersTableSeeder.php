<?php

use App\Models\Users\Education;
use App\Models\Tickets\Ticket;
use App\Models\Users\UserSkill;
use App\Models\Users\UserTicket;
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
        $faker = Faker\Factory::create();

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

            $responsibilities = [
                'Consult with employers to identify needs and preferred qualifications',
                'Interview applicants about their experience, education and skills',
                'Contact references and perform background checks',
                'Inform applicants about job details such as benefits and conditions',
                'Hire or refer qualified candidates',
                'Conduct new employee orientations',
                'Process paperwork'
            ];

            $w = WorkExperience::create([
                'job_role' => 'Project Manager',
                'company_name' => 'Probuild',
                'company_id' => 1,
                'user_id' => $user->id,
                'location' => 'Richmond, Victoria, Australia',
                'project_size' => '1,750,000',
                'start_month' => 11,
                'start_year' => 2015,
                'end_month' => 9,
                'end_year' => 2019,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            foreach ($responsibilities as $responsibility) {
                WorkExperienceResponsibility::create([
                    'work_experience_id' => 1,
                    'responsibility' => $responsibility
                ]);
            }

            WorkExperience::create([
                'job_role' => 'Assistant Project Manager',
                'company_name' => 'BBUILD',
                'company_id' => 2,
                'user_id' => $user->id,
                'location' => 'Richmond, Victoria, Australia',
                'project_size' => '1,000,000',
                'start_month' => 11,
                'start_year' => 2014,
                'end_month' => 9,
                'end_year' => 2015,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            WorkExperience::create([
                'job_role' => 'Construction',
                'company_name' => 'Tools ‘r’ Us',
                'company_id' => 3,
                'user_id' => $user->id,
                'location' => 'Richmond, Victoria, Australia',
                'project_size' => '2,000,000',
                'start_month' => 11,
                'start_year' => 2013,
                'end_month' => 9,
                'end_year' => 2014,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            WorkExperience::create([
                'job_role' => 'Site Manager',
                'company_name' => 'Richmond Surveying',
                'company_id' => 4,
                'user_id' => $user->id,
                'location' => 'Richmond, Victoria, Australia',
                'project_size' => '3,000,000',
                'start_month' => 11,
                'start_year' => 2012,
                'end_month' => 11,
                'end_year' => 2013,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Education::create([
                'course' => 'Construction & Engineer',
                'school' => 'Royal Melbourne Institute of Technology',
                'start_month' => 6,
                'start_year' => 2009,
                'end_month' => 4,
                'end_year' => 2010,
                'description' => 'Learning at this school to be become a Psychologist',
                'user_id' => $user->id
            ]);

            Education::create([
                'course' => 'Cert II - Construction ',
                'school' => 'Royal Melbourne Institute of Technology',
                'start_month' => 11,
                'start_year' => 2008,
                'end_month' => 6,
                'end_year' => 2009,
                'description' => 'Learning at this school to be become a Psychologist',
                'user_id' => $user->id
            ]);

            Education::create([
                'course' => 'Cert I - Construction ',
                'school' => 'Royal Melbourne Institute of Technology',
                'start_month' => 3,
                'start_year' => 2015,
                'end_month' => 11,
                'end_year' => 2018,
                'description' => 'Learning at this school to be become a Psychologist',
                'user_id' => $user->id
            ]);

            WorkerDetail::create([
                'profile_description' => 'Experienced Senior Project Manager; demonstrated history of working on a wide range of construction projects for leading companies.',
                'english_skill' => true,
                'drivers_license' => true,
                'right_to_work' => true,
                'main_skill' => 'Worked on Rail link, saved $30,000 on budget, and delivered 2 weeks before project deadline.',
                'introduction' => 'My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team. ',
                'when' => 5,
                'max_distance' => 100,
                'state' => 'VIC,NSW,TAS',
                'nrole_right_to_work_au' => true,
                'user_id' => $user->id
            ]);

            Ticket::create([
                'ticket' => 'TLILIC2001',
                'description' => 'Licence to operate a Forklift Truck',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Ticket::create([
                'ticket' => 'RIIHAN301D',
                'description' => 'Elevating Work Platform Under 11m',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $t1 = Ticket::create([
                'ticket' => 'RIIWHS205D',
                'description' => 'Control Traffic with Stop - Slow Bat',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $t2 = Ticket::create([
                'ticket' => 'TLILIC2001',
                'description' => 'Licence to operate a Forklift Truck',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $t3 = Ticket::create([
                'ticket' => 'RIIHAN301D',
                'description' => 'Control Traffic with Stop - Slow Bat',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $t4 = Ticket::create([
                'ticket' => 'RIIWHS205D',
                'description' => 'Licence to operate a Forklift Truck',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $t5 = Ticket::create([
                'ticket' => 'TLILIC2001',
                'description' => 'Licence to operate a Forklift Truck',
                'created_by' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            UserTicket::create([
                'user_id' => $user->id,
                'ticket_id' => $t1->id
            ]);

            UserTicket::create([
                'user_id' => $user->id,
                'ticket_id' => $t2->id
            ]);

            UserTicket::create([
                'user_id' => $user->id,
                'ticket_id' => $t3->id
            ]);

            UserTicket::create([
                'user_id' => $user->id,
                'ticket_id' => $t4->id
            ]);

            UserTicket::create([
                'user_id' => $user->id,
                'ticket_id' => $t5->id
            ]);

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
}
