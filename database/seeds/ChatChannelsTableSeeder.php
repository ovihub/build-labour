<?php

use Illuminate\Database\Seeder;

class ChatChannelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('chat_channels')->delete();
        
        \DB::table('chat_channels')->insert(array (
            0 => 
            array (
                'channel_id' => 1,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 368392,
                'created_at' => '2020-02-24 01:39:10',
            ),
            1 => 
            array (
                'channel_id' => 2,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 305304,
                'created_at' => '2020-02-24 02:40:04',
            ),
            2 => 
            array (
                'channel_id' => 3,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 368405,
                'created_at' => '2020-02-24 06:40:07',
            ),
            3 => 
            array (
                'channel_id' => 4,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 21367,
                'created_at' => '2020-02-24 21:10:49',
            ),
            4 => 
            array (
                'channel_id' => 5,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 2141,
                'created_at' => '2020-02-24 21:16:17',
            ),
            5 => 
            array (
                'channel_id' => 6,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 368389,
                'created_at' => '2020-02-25 03:37:02',
            ),
            6 => 
            array (
                'channel_id' => 7,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 612511,
                'created_at' => '2020-06-09 03:53:14',
            ),
            7 => 
            array (
                'channel_id' => 8,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 612470,
                'created_at' => '2020-06-09 04:53:44',
            ),
            8 => 
            array (
                'channel_id' => 9,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 600511,
                'created_at' => '2020-06-09 04:55:13',
            ),
            9 => 
            array (
                'channel_id' => 10,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 29511,
                'created_at' => '2020-06-09 04:57:18',
            ),
            10 => 
            array (
                'channel_id' => 11,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 611511,
                'created_at' => '2020-06-09 05:01:56',
            ),
            11 => 
            array (
                'channel_id' => 12,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 611541,
                'created_at' => '2020-06-09 05:03:20',
            ),
            12 => 
            array (
                'channel_id' => 13,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 611662,
                'created_at' => '2020-06-22 00:02:24',
            ),
            13 => 
            array (
                'channel_id' => 14,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 708735,
                'created_at' => '2020-07-02 01:13:29',
            ),
            14 => 
            array (
                'channel_id' => 15,
                'name' => NULL,
                'type' => 'one-on-one',
                'connection_id' => 678731,
                'created_at' => '2020-07-02 09:02:23',
            ),
        ));
        
        
    }
}