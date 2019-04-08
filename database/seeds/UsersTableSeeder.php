<?php

use App\Models\Users\Education;
use App\Models\Users\Ticket;
use App\Models\Users\UserSkill;
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
        $user->first_name = 'Henry';
        $user->last_name = 'Ramirez';
        $user->email = 'testemail@test.com';
        $user->password = 'secret';
        $user->dob = Carbon::parse('08/10/1988');
        $user->mobile_number = '+61 412345678';
        $user->address = 'Richmond, Victoria';
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

        WorkExperience::create([
            'job_role' => 'Project Manager',
            'responsibilities' => json_encode($responsibilities),
            'company_name' => 'Probuild',
            'company_id' => 1,
            'isCurrent' => false,
            'user_id' => $user->id,
            'start_date' => Carbon::parse('11/10/2012'),
            'end_date' => Carbon::parse('09/04/2017'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        WorkExperience::create([
            'job_role' => 'Assistant Project Manager',
            'responsibilities' => json_encode(['test']),
            'company_name' => 'BBUILD',
            'company_id' => 1,
            'isCurrent' => true,
            'user_id' => $user->id,
            'start_date' => Carbon::parse('11/10/2012'),
            'end_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        WorkExperience::create([
            'job_role' => 'Construction',
            'responsibilities' => json_encode(['test']),
            'company_name' => 'Tools ‘r’ Us',
            'company_id' => 1,
            'isCurrent' => true,
            'user_id' => $user->id,
            'start_date' => Carbon::parse('11/10/2012'),
            'end_date' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        WorkExperience::create([
            'job_role' => 'Site Manager',
            'responsibilities' => json_encode(['test']),
            'company_name' => 'Richmond Surveying',
            'company_id' => 1,
            'isCurrent' => true,
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
            'nrole_info' => 'My ideal next role would be as a qualified plumber working on high-end residential jobs with an awesome team. ',
            'nrole_when' => 'In 6 months (June 2019)',
            'nrole_travel_to_home' => '100km',
            'nrole_address' => 'New South Wales',
            'nrole_state' => 'VIC',
            'nrole_right_to_work_au' => true,
            'user_id' => $user->id
        ]);

        UserSkill::create([
            'name' => 'Quality Control',
            'description' => 'Expert',
            'user_id' => $user->id
        ]);

        UserSkill::create([
            'name' => 'Time Management',
            'description' => 'Competent',
            'user_id' => $user->id
        ]);

        UserSkill::create([
            'name' => 'Teamwork',
            'description' => 'Competent',
            'user_id' => $user->id
        ]);

        UserSkill::create([
            'name' => 'Communication Skills',
            'description' => 'Expert',
            'user_id' => $user->id
        ]);

        UserSkill::create([
            'name' => 'Can Accept Criticism',
            'description' => 'Competent',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'TLILIC2001',
            'description' => 'Licence to operate a Forklift Truck',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'RIIHAN301D',
            'description' => 'Elevating Work Platform Under 11m',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'RIIWHS205D',
            'description' => 'Control Traffic with Stop - Slow Bat',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'TLILIC2001',
            'description' => 'Licence to operate a Forklift Truck',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'RIIHAN301D',
            'description' => 'Control Traffic with Stop - Slow Bat',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'RIIWHS205D',
            'description' => 'Licence to operate a Forklift Truck',
            'user_id' => $user->id
        ]);

        Ticket::create([
            'title' => 'TLILIC2001',
            'description' => 'Licence to operate a Forklift Truck',
            'user_id' => $user->id
        ]);
    }
}