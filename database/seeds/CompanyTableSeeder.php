<?php

use App\Models\Companies\Company;
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
            $c->name = $faker->company;
            $c->address = $faker->address;
            $c->contact_name = $faker->name;
            $c->contact_email = $faker->email;
            $c->phone = $faker->phoneNumber;
            $c->locations_json = json_encode(['5433 Zola Spring Suite, Australia', '2933 Hills Greens, South Nicola, AK 03297']);
            $c->sector = 'manufacturing';
            $c->tier = 'local';

            if ($i == 0) {

                $c->created_by = $user->id;
            }

            $c->save();

            if ($i == 0) {

                Job::create([
                    'title' => 'Master Carpenter',
                    'description' => 'A 20 years experience carpenter with a big salary',
                    'exp_level' => 'Senior',
                    'type' => 'Workforce',
                    'salary' => '$20000',
                    'company_id' => $c->id,
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                Job::create([
                    'title' => 'Junior Programmer',
                    'description' => 'Looking for a c# programmer',
                    'exp_level' => '2 Years programmer',
                    'type' => 'Workforce',
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
                    'type' => 'Workforce',
                    'salary' => '$30000',
                    'company_id' => $c->id,
                    'created_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }
}
