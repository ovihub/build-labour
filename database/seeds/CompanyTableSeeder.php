<?php

use App\Models\Companies\Company;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Companies\Job;
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

            $c->address = $faker->address;
            $c->contact_name = $faker->name;
            $c->contact_email = $faker->email;
            $c->phone = $faker->phoneNumber;
            $c->locations_json = json_encode(['2933 Hills Greens, South Nicola, AK 03297']);
            $c->sector = 'automotive';
            $c->tier = 'manufacturing';
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
                    'company_id' => $c->id,
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
                    'company_id' => $c->id,
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                $job1 = Job::create([
                    'title' => 'Project Manager',
                    'description' => 'An opportunity is available for a Construction Manager to work in and with the Melbourne Asphalt team to take responsibility for delivery of a portfolio of projects whilst optimising performance.',
                    'exp_level' => 'Senior',
                    'contract_type' => 'Full-time',
                    'salary' => '$20000',
                    'company_id' => $c->id,
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
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
                    'name' => 'Land Development',
                    'company_id' => $c->id
                ]);

                CompanySpecialized::create([
                    'name' => 'Construction',
                    'company_id' => $c->id
                ]);

                CompanySpecialized::create([
                    'name' => 'Engineering Surveying',
                    'company_id' => $c->id
                ]);
            }
        }
    }
}
