<?php

use App\Models\Companies\Company;
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

            if ($i == 0) {

                $c->created_by = $user->id;
            }

            $c->save();
        }
    }
}
