<?php

use Illuminate\Database\Seeder;

class ChatChannelMembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('chat_channel_members')->delete();
        
        \DB::table('chat_channel_members')->insert(array (
            0 => 
            array (
                'map_id' => 1,
                'member_id' => 368,
                'channel_id' => 1,
            ),
            1 => 
            array (
                'map_id' => 2,
                'member_id' => 392,
                'channel_id' => 1,
            ),
            2 => 
            array (
                'map_id' => 3,
                'member_id' => 305,
                'channel_id' => 2,
            ),
            3 => 
            array (
                'map_id' => 4,
                'member_id' => 304,
                'channel_id' => 2,
            ),
            4 => 
            array (
                'map_id' => 5,
                'member_id' => 368,
                'channel_id' => 3,
            ),
            5 => 
            array (
                'map_id' => 6,
                'member_id' => 405,
                'channel_id' => 3,
            ),
            6 => 
            array (
                'map_id' => 7,
                'member_id' => 21,
                'channel_id' => 4,
            ),
            7 => 
            array (
                'map_id' => 8,
                'member_id' => 367,
                'channel_id' => 4,
            ),
            8 => 
            array (
                'map_id' => 9,
                'member_id' => 21,
                'channel_id' => 5,
            ),
            9 => 
            array (
                'map_id' => 10,
                'member_id' => 41,
                'channel_id' => 5,
            ),
            10 => 
            array (
                'map_id' => 11,
                'member_id' => 368,
                'channel_id' => 6,
            ),
            11 => 
            array (
                'map_id' => 12,
                'member_id' => 389,
                'channel_id' => 6,
            ),
            12 => 
            array (
                'map_id' => 13,
                'member_id' => 612,
                'channel_id' => 7,
            ),
            13 => 
            array (
                'map_id' => 14,
                'member_id' => 511,
                'channel_id' => 7,
            ),
            14 => 
            array (
                'map_id' => 15,
                'member_id' => 612,
                'channel_id' => 8,
            ),
            15 => 
            array (
                'map_id' => 16,
                'member_id' => 470,
                'channel_id' => 8,
            ),
            16 => 
            array (
                'map_id' => 17,
                'member_id' => 600,
                'channel_id' => 9,
            ),
            17 => 
            array (
                'map_id' => 18,
                'member_id' => 511,
                'channel_id' => 9,
            ),
            18 => 
            array (
                'map_id' => 19,
                'member_id' => 29,
                'channel_id' => 10,
            ),
            19 => 
            array (
                'map_id' => 20,
                'member_id' => 511,
                'channel_id' => 10,
            ),
            20 => 
            array (
                'map_id' => 21,
                'member_id' => 611,
                'channel_id' => 11,
            ),
            21 => 
            array (
                'map_id' => 22,
                'member_id' => 511,
                'channel_id' => 11,
            ),
            22 => 
            array (
                'map_id' => 23,
                'member_id' => 611,
                'channel_id' => 12,
            ),
            23 => 
            array (
                'map_id' => 24,
                'member_id' => 541,
                'channel_id' => 12,
            ),
            24 => 
            array (
                'map_id' => 25,
                'member_id' => 611,
                'channel_id' => 13,
            ),
            25 => 
            array (
                'map_id' => 26,
                'member_id' => 662,
                'channel_id' => 13,
            ),
            26 => 
            array (
                'map_id' => 27,
                'member_id' => 708,
                'channel_id' => 14,
            ),
            27 => 
            array (
                'map_id' => 28,
                'member_id' => 735,
                'channel_id' => 14,
            ),
            28 => 
            array (
                'map_id' => 29,
                'member_id' => 678,
                'channel_id' => 15,
            ),
            29 => 
            array (
                'map_id' => 30,
                'member_id' => 731,
                'channel_id' => 15,
            ),
        ));
        
        
    }
}