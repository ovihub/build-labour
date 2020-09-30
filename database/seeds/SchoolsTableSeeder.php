<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('schools')->delete();
        
        \DB::table('schools')->insert(array (
            0 => 
            array (
                'id' => 1,
                'school_name' => 'The University of New South Wales',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_new_south_wales.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            1 => 
            array (
                'id' => 2,
                'school_name' => 'The University of Sydney',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_sydney.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            2 => 
            array (
                'id' => 3,
                'school_name' => 'The University of Melbourne',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_melbourne.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            3 => 
            array (
                'id' => 4,
                'school_name' => 'Monash University',
                'logo_url' => 'http://178.128.217.88/img/schools/monash_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            4 => 
            array (
                'id' => 5,
                'school_name' => 'The University of Queensland',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_queensland.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            5 => 
            array (
                'id' => 6,
                'school_name' => 'Australian National University',
                'logo_url' => 'http://178.128.217.88/img/schools/australian_national_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            6 => 
            array (
                'id' => 7,
                'school_name' => 'The University of Adelaide',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_adelaide.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            7 => 
            array (
                'id' => 8,
                'school_name' => 'Queensland University of Technology',
                'logo_url' => 'http://178.128.217.88/img/schools/queensland_university_of_technology.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            8 => 
            array (
                'id' => 9,
                'school_name' => 'Macquarie University',
                'logo_url' => 'http://178.128.217.88/img/schools/macquarie_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            9 => 
            array (
                'id' => 10,
                'school_name' => 'The University of Western Australia',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_western_australia.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            10 => 
            array (
                'id' => 11,
                'school_name' => 'RMIT University',
                'logo_url' => 'http://178.128.217.88/img/schools/rmit_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            11 => 
            array (
                'id' => 12,
                'school_name' => 'University of Technology Sydney',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_technology_sydney.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            12 => 
            array (
                'id' => 13,
                'school_name' => 'Curtin University',
                'logo_url' => 'http://178.128.217.88/img/schools/curtin_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            13 => 
            array (
                'id' => 14,
                'school_name' => 'Deakin University',
                'logo_url' => 'http://178.128.217.88/img/schools/deakin_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            14 => 
            array (
                'id' => 15,
                'school_name' => 'University of Wollongong',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_wollongong.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            15 => 
            array (
                'id' => 16,
                'school_name' => 'Griffith University',
                'logo_url' => 'http://178.128.217.88/img/schools/griffith_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            16 => 
            array (
                'id' => 17,
                'school_name' => 'The University of Newcastle',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_newcastle.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            17 => 
            array (
                'id' => 18,
                'school_name' => 'La Trobe University',
                'logo_url' => 'http://178.128.217.88/img/schools/la_trobe_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            18 => 
            array (
                'id' => 19,
                'school_name' => 'University of South Australia',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_south_australia.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            19 => 
            array (
                'id' => 20,
                'school_name' => 'Swinburne University of Technology',
                'logo_url' => 'http://178.128.217.88/img/schools/swinburne_university_of_technology.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            20 => 
            array (
                'id' => 21,
                'school_name' => 'University of Tasmania',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_tasmania.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            21 => 
            array (
                'id' => 22,
                'school_name' => 'Charles Sturt University',
                'logo_url' => 'http://178.128.217.88/img/schools/charles_sturt_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            22 => 
            array (
                'id' => 23,
                'school_name' => 'Western Sydney University',
                'logo_url' => 'http://178.128.217.88/img/schools/western_sydney_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            23 => 
            array (
                'id' => 24,
                'school_name' => 'University of New England, Australia',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_new_england,_australia.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            24 => 
            array (
                'id' => 25,
                'school_name' => 'James Cook University',
                'logo_url' => 'http://178.128.217.88/img/schools/james_cook_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            25 => 
            array (
                'id' => 26,
                'school_name' => 'Murdoch University',
                'logo_url' => 'http://178.128.217.88/img/schools/murdoch_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            26 => 
            array (
                'id' => 27,
                'school_name' => 'Flinders University',
                'logo_url' => 'http://178.128.217.88/img/schools/flinders_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            27 => 
            array (
                'id' => 28,
                'school_name' => 'Victoria University',
                'logo_url' => 'http://178.128.217.88/img/schools/victoria_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            28 => 
            array (
                'id' => 29,
                'school_name' => 'Edith Cowan University',
                'logo_url' => 'http://178.128.217.88/img/schools/edith_cowan_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            29 => 
            array (
                'id' => 30,
                'school_name' => 'University of Canberra',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_canberra.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            30 => 
            array (
                'id' => 31,
                'school_name' => 'Southern Cross University',
                'logo_url' => 'http://178.128.217.88/img/schools/southern_cross_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            31 => 
            array (
                'id' => 32,
                'school_name' => 'University of Southern Queensland',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_southern_queensland.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            32 => 
            array (
                'id' => 33,
                'school_name' => 'Australian Catholic University',
                'logo_url' => 'http://178.128.217.88/img/schools/australian_catholic_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            33 => 
            array (
                'id' => 34,
                'school_name' => 'Central Queensland University',
                'logo_url' => 'http://178.128.217.88/img/schools/central_queensland_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            34 => 
            array (
                'id' => 35,
                'school_name' => 'Federation University Australia',
                'logo_url' => 'http://178.128.217.88/img/schools/federation_university_australia.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            35 => 
            array (
                'id' => 36,
                'school_name' => 'Bond University ',
                'logo_url' => 'http://178.128.217.88/img/schools/bond_university_.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            36 => 
            array (
                'id' => 37,
                'school_name' => 'Charles Darwin University',
                'logo_url' => 'http://178.128.217.88/img/schools/charles_darwin_university.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            37 => 
            array (
                'id' => 38,
                'school_name' => 'University of the Sunshine Coast',
                'logo_url' => 'http://178.128.217.88/img/schools/university_of_the_sunshine_coast.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            38 => 
            array (
                'id' => 39,
                'school_name' => 'The University of Notre Dame Australia',
                'logo_url' => 'http://178.128.217.88/img/schools/the_university_of_notre_dame_australia.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            39 => 
            array (
                'id' => 40,
                'school_name' => 'Torrens University Australia',
                'logo_url' => 'http://178.128.217.88/img/schools/torrens_university_australia.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            40 => 
            array (
                'id' => 41,
                'school_name' => 'Melbourne Institute of Technology',
                'logo_url' => 'http://178.128.217.88/img/schools/melbourne_institute_of_technology.png',
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
        ));
        
        
    }
}