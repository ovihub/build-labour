<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'id' => 4,
                'email' => 'francisgamad@gmail.com',
                'token' => '$2y$10$.SUAQcM7iqP.9pRIHXpJHOnCPmVkZAICkPhVPMnB24Zanmwn4N8yC',
                'created_at' => '2019-10-17 23:44:19',
            ),
            1 => 
            array (
                'id' => 9,
                'email' => 'ey.blues@bigpond.com',
                'token' => '$2y$10$U2zJLN0Y2LvTNaS39hWoOOH8Zxk41HTqpY1KnW3Kc84ei5VBcYEai',
                'created_at' => '2019-11-13 02:05:00',
            ),
            2 => 
            array (
                'id' => 10,
                'email' => 'n.martinsoooon@gmail.com',
                'token' => '$2y$10$WYqTCNTZHsrh5AJN3jrc0eCPV7G0ZGQq9qcdxfiZM9X1xcyMHivf.',
                'created_at' => '2019-11-19 10:46:59',
            ),
            3 => 
            array (
                'id' => 19,
                'email' => 'sinjen@buildlabour.com.au',
                'token' => '$2y$10$kH.lSGpT4HPLaIdH3.OVh.T/13eoJ6b8.2SaTEbdyimJ4gZLaa.9W',
                'created_at' => '2020-04-30 02:53:51',
            ),
            4 => 
            array (
                'id' => 24,
                'email' => 'i.hussains@yahoo.com',
                'token' => '$2y$10$Y5oAPNsXOFxZcEwlWQLT5uXwWClejg6wJXmMVHNRzcHe9.qe78b3e',
                'created_at' => '2020-06-05 16:16:51',
            ),
            5 => 
            array (
                'id' => 26,
                'email' => 'livioavid@bigpond.com',
                'token' => '$2y$10$3GQ6tDTtG8awCtryCWPBMOCAghcoOCqXEEh.LW/CYlTsQ8yBsYRNe',
                'created_at' => '2020-06-08 04:18:03',
            ),
            6 => 
            array (
                'id' => 30,
                'email' => 'tasmaintenanceworx@gmail.com',
                'token' => '$2y$10$kofOd1Bvyb8o0B0pKRDF0OyoYZusWws3B9ToEBGxFSUIw2smxSZKK',
                'created_at' => '2020-08-05 07:35:32',
            ),
        ));
        
        
    }
}