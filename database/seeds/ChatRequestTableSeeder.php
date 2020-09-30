<?php

use Illuminate\Database\Seeder;

class ChatRequestTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('chat_request')->delete();
        
        \DB::table('chat_request')->insert(array (
            0 => 
            array (
                'id' => 1,
                'requesting_user' => 368,
                'requested_user' => 392,
                'status' => 'Accepted',
                'created' => '2020-02-24 01:39:10',
            ),
            1 => 
            array (
                'id' => 2,
                'requesting_user' => 305,
                'requested_user' => 304,
                'status' => 'Accepted',
                'created' => '2020-02-24 02:40:04',
            ),
            2 => 
            array (
                'id' => 3,
                'requesting_user' => 368,
                'requested_user' => 405,
                'status' => 'Accepted',
                'created' => '2020-02-24 06:40:07',
            ),
            3 => 
            array (
                'id' => 4,
                'requesting_user' => 21,
                'requested_user' => 367,
                'status' => 'Accepted',
                'created' => '2020-02-24 21:10:49',
            ),
            4 => 
            array (
                'id' => 5,
                'requesting_user' => 21,
                'requested_user' => 41,
                'status' => 'Accepted',
                'created' => '2020-02-24 21:16:17',
            ),
            5 => 
            array (
                'id' => 6,
                'requesting_user' => 368,
                'requested_user' => 389,
                'status' => 'Accepted',
                'created' => '2020-02-25 03:37:02',
            ),
            6 => 
            array (
                'id' => 7,
                'requesting_user' => 612,
                'requested_user' => 511,
                'status' => 'Accepted',
                'created' => '2020-06-09 03:53:14',
            ),
            7 => 
            array (
                'id' => 8,
                'requesting_user' => 612,
                'requested_user' => 470,
                'status' => 'Accepted',
                'created' => '2020-06-09 04:53:44',
            ),
            8 => 
            array (
                'id' => 9,
                'requesting_user' => 600,
                'requested_user' => 511,
                'status' => 'Accepted',
                'created' => '2020-06-09 04:55:13',
            ),
            9 => 
            array (
                'id' => 10,
                'requesting_user' => 29,
                'requested_user' => 511,
                'status' => 'Accepted',
                'created' => '2020-06-09 04:57:18',
            ),
            10 => 
            array (
                'id' => 11,
                'requesting_user' => 611,
                'requested_user' => 511,
                'status' => 'Accepted',
                'created' => '2020-06-09 05:01:56',
            ),
            11 => 
            array (
                'id' => 12,
                'requesting_user' => 611,
                'requested_user' => 541,
                'status' => 'Accepted',
                'created' => '2020-06-09 05:03:20',
            ),
            12 => 
            array (
                'id' => 13,
                'requesting_user' => 611,
                'requested_user' => 662,
                'status' => 'Accepted',
                'created' => '2020-06-22 00:02:24',
            ),
            13 => 
            array (
                'id' => 14,
                'requesting_user' => 708,
                'requested_user' => 735,
                'status' => 'Accepted',
                'created' => '2020-07-02 01:13:29',
            ),
            14 => 
            array (
                'id' => 15,
                'requesting_user' => 678,
                'requested_user' => 731,
                'status' => 'Accepted',
                'created' => '2020-07-02 09:02:23',
            ),
        ));
        
        
    }
}