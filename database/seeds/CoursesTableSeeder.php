<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'course_name' => 'Construction & Engineer',
            ),
            1 => 
            array (
                'id' => 2,
                'course_name' => 'Computer Literation',
            ),
            2 => 
            array (
                'id' => 3,
                'course_name' => 'Advanced Welding Certification',
            ),
        ));
        
        
    }
}