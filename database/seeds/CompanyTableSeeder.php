<?php

use App\Models\Companies\Company;
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

        for ($i=0; $i<5; $i++) {

            $c = new Company();
            $c->name = $faker->company;
            $c->address = $faker->address;
            $c->contact_name = $faker->name;
            $c->contact_email = $faker->email;
            $c->phone = $faker->phoneNumber;
            $c->save();
        }
    }
}
