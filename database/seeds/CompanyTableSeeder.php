<?php

use App\Models\Companies\Company;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Companies\Job;
use App\Models\Companies\JobRequirement;
use App\Models\Companies\JobResponsibility;
use App\Models\Options\BusinessType;
use App\Models\Options\MainFunction;
use App\Models\Options\SecondaryFunction;
use App\Models\Options\Tier;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = User::where('email', 'testusercompany@test.com')->first();

        $businessType = BusinessType::find(1);
        $tier = Tier::find(1);
        $main = MainFunction::find(1);

        if (!$user) {

            $user = new User();
            $user->first_name = 'Jane';
            $user->last_name = 'Doe';
            $user->email = 'testusercompany@test.com';
            $user->password = 'secret';
            $user->is_verified = Carbon::now();
            $user->role_id = 2; // company

            $user->save();
        }


        for ($i=0; $i<5; $i++) {

            $c = new Company();

            if ($i == 0) {

                $c->name = 'Richmond Surveying';

            } else {

                $c->name = $faker->company;
            }

            $c->business_type_id = $businessType->id;
            $c->tier_id = $tier->id;
            $c->main_company_id = $main->id;

            $c->address = $faker->address;
            $c->phone = $faker->phoneNumber;
            $c->locations_json = json_encode(['2933 Hills Greens, South Nicola, AK 03297']);
            $c->introduction = 'We are a modern, professional and sophisticated surveying firm specialising in land development, construction and engineering surveying. We provide quality, cost-effective and efficient surveying service.';
            $c->website = $faker->domainName;

            if ($i == 0) {

                $c->created_by = $user->id;
            }

            $c->save();

            if ($i == 0) {

                // jobs

                Job::create([
                    'title' => 'Master Carpenter',
                    'description' => 'A 20 years experience carpenter with a big salary',
                    'exp_level' => 'Senior',
                    'contract_type' => 'Full-time',
                    'salary' => '$20000',
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                Job::create([
                    'title' => 'Junior Programmer',
                    'description' => 'Looking for a c# programmer',
                    'exp_level' => 'Senior',
                    'contract_type' => 'Partime',
                    'salary' => '$10000',
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                Job::create([
                    'title' => 'Plumber',
                    'description' => 'Looking for a experienced plumber',
                    'exp_level' => '5 year more',
                    'contract_type' => 'Full-time',
                    'salary' => '$30000',
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                $job1 = Job::create([
                    'title' => 'Project Manager',
                    'about' => '$730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced apartments across 88 storeys.',
                    'description' => 'An opportunity is available for a Construction Manager to work in and with the Melbourne Asphalt team to take responsibility for delivery of a portfolio of projects whilst optimising performance.',
                    'exp_level' => 'Senior',
                    'contract_type' => 'Full-time',
                    'salary' => '$20000',
                    'reports_to_json' => json_encode(['Construction Manager', 'Construction Director']),
                    'location' => 'South Yarra, Melbourne, Victoria',
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                // $Job1 Requirements

                $jobReq = JobRequirement::create([
                    'title' => 'Qualifications ',
                    'job_id' => $job1->id
                ]);

                $items = [
                    'Bachelor Degree in Construction or a related field'
                ];

                $jobReq->items_json = $items;
                $jobReq->save();

                $jobReq = JobRequirement::create([
                    'title' => 'Experience ',
                    'job_id' => $job1->id
                ]);

                $items = [
                    'Minimum of 10 years industry experience',
                    'Experienced in leading teams'
                ];

                $jobReq->items_json = $items;
                $jobReq->save();

                $jobReq = JobRequirement::create([
                    'title' => 'Skills ',
                    'job_id' => $job1->id
                ]);

                $items = [
                    'Able to mentor and become involved in on the job training of others.'
                ];

                $jobReq->items_json = $items;
                $jobReq->save();

                // $Job1 Responsibilities

                $jobR = JobResponsibility::create([
                    'title' => 'Quality Management',
                    'job_id' => $job1->id
                ]);

                $items = [
                    'Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.',
                    'Lead and drive a “Quality Built In” culture.',
                    'Ensure systems and processes are in place to manage quality planning processes and the application of risk management methods.',
                    'Ensure project team effectively manage the quality performance of subcontractors and implement improvements.'
                ];

                $jobR->items_json = $items;
                $jobR->save();


                $jobR = JobResponsibility::create([
                    'title' => 'Next Title',
                    'job_id' => $job1->id
                ]);

                $items = [
                    'Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures.',
                    'Lead and drive a “Quality Built In” culture.',
                ];

                $jobR->items_json = $items;
                $jobR->save();

                // company posts

                CompanyPost::create([
                    'company_id' => $c->id,
                    'posted_by' => $user->id,
                    'job_id' => $job1->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                CompanyPost::create([
                    'content' => 'Mass hiring please apply :)',
                    'company_id' => $c->id,
                    'posted_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                CompanyPost::create([
                    'content' => 'Feel free to contact us everyone',
                    'company_id' => $c->id,
                    'posted_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                // company specialization

                CompanySpecialized::create([
                    'company_id' => $c->id,
                    'secondary_id' => $main->items[0]->id
                ]);
                CompanySpecialized::create([
                    'company_id' => $c->id,
                    'secondary_id' => $main->items[1]->id
                ]);
                CompanySpecialized::create([
                    'company_id' => $c->id,
                    'secondary_id' => $main->items[2]->id
                ]);
            }
        }
    }
}
