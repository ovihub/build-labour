<?php

use Illuminate\Database\Seeder;

class ChatHistoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('chat_history')->delete();
        
        \DB::table('chat_history')->insert(array (
            0 => 
            array (
                'history_id' => 1,
                'message_type' => 'message',
                'message' => 'test',
                'channel_id' => 2,
                'sent_by' => 305,
                'seen_by' => 'true',
                'sent_at' => '2020-02-26 00:30:30',
            ),
            1 => 
            array (
                'history_id' => 2,
                'message_type' => 'message',
                'message' => 'Hey Nathan, thanks for applying to this role.  Up for a phone chat now-ish?',
                'channel_id' => 3,
                'sent_by' => 368,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 20:23:00',
            ),
            2 => 
            array (
                'history_id' => 3,
                'message_type' => 'message',
                'message' => 'Hey Benno, thanks for applying to our job.',
                'channel_id' => 4,
                'sent_by' => 21,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 23:26:23',
            ),
            3 => 
            array (
                'history_id' => 4,
                'message_type' => 'message',
                'message' => 'Where abouts are you located? Do you have a car?',
                'channel_id' => 4,
                'sent_by' => 21,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 23:26:23',
            ),
            4 => 
            array (
                'history_id' => 5,
                'message_type' => 'message',
                'message' => 'Hey Jay, Thanks for applying to our job',
                'channel_id' => 5,
                'sent_by' => 21,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 21:21:50',
            ),
            5 => 
            array (
                'history_id' => 6,
                'message_type' => 'message',
                'message' => 'At',
                'channel_id' => 5,
                'sent_by' => 21,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 21:21:50',
            ),
            6 => 
            array (
                'history_id' => 7,
                'message_type' => 'message',
                'message' => 'Do you have a car',
                'channel_id' => 5,
                'sent_by' => 21,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 21:21:50',
            ),
            7 => 
            array (
                'history_id' => 8,
                'message_type' => 'message',
                'message' => 'Your profile is ideal for this job',
                'channel_id' => 5,
                'sent_by' => 21,
                'seen_by' => 'true',
                'sent_at' => '2020-02-24 21:21:50',
            ),
            8 => 
            array (
                'history_id' => 9,
                'message_type' => 'message',
                'message' => 'Hey mate, yes I do have a car.',
                'channel_id' => 5,
                'sent_by' => 41,
                'seen_by' => 'true',
                'sent_at' => '2020-02-27 05:55:59',
            ),
            9 => 
            array (
                'history_id' => 10,
                'message_type' => 'message',
                'message' => 'Feel free to to call me on 0411 625 467 if you’d like to have a chat',
                'channel_id' => 5,
                'sent_by' => 41,
                'seen_by' => 'true',
                'sent_at' => '2020-02-27 05:55:59',
            ),
            10 => 
            array (
                'history_id' => 11,
                'message_type' => 'message',
                'message' => 'Hello
I am located in Melbourne at the moment. I have my own car and I am willing to relocate!',
                'channel_id' => 4,
                'sent_by' => 367,
                'seen_by' => 'true',
                'sent_at' => '2020-02-27 05:55:49',
            ),
            11 => 
            array (
                'history_id' => 12,
                'message_type' => 'message',
                'message' => '0499743041 is my phone number
Thanks
Benno',
                'channel_id' => 4,
                'sent_by' => 367,
                'seen_by' => 'true',
                'sent_at' => '2020-02-27 05:55:49',
            ),
            12 => 
            array (
                'history_id' => 13,
                'message_type' => 'message',
                'message' => 'I am really interested in the labouring job. So if you need more details or documents don\'t hesitate to contact me directly.
Thanks',
                'channel_id' => 4,
                'sent_by' => 367,
                'seen_by' => 'true',
                'sent_at' => '2020-02-27 05:55:49',
            ),
            13 => 
            array (
                'history_id' => 14,
                'message_type' => 'message',
                'message' => 'hello, I sincerely apologize for the inconvenience caused, but could you call me on 0413806535. Thanks,',
                'channel_id' => 3,
                'sent_by' => 405,
                'seen_by' => 'true',
                'sent_at' => '2020-02-25 03:34:06',
            ),
            14 => 
            array (
                'history_id' => 15,
                'message_type' => 'message',
                'message' => 'With regards, Nathan Madampe',
                'channel_id' => 3,
                'sent_by' => 405,
                'seen_by' => 'true',
                'sent_at' => '2020-02-25 03:34:06',
            ),
            15 => 
            array (
                'history_id' => 16,
                'message_type' => 'message',
                'message' => 'No problem at all Nathan, I just thought it was an opportune time to call yesterday.  What\'s your afternoon like for a quick phone chat?',
                'channel_id' => 3,
                'sent_by' => 368,
                'seen_by' => 'true',
                'sent_at' => '2020-02-25 03:43:17',
            ),
            16 => 
            array (
                'history_id' => 17,
                'message_type' => 'message',
                'message' => 'Hi Venu, thanks for applying.  Do you have a MANUAL driver\'s licence?',
                'channel_id' => 1,
                'sent_by' => 368,
                'seen_by' => '',
                'sent_at' => '2020-02-25 14:36:26',
            ),
            17 => 
            array (
                'history_id' => 18,
                'message_type' => 'message',
                'message' => 'Hi Mohammed, do you have a MANUAL driver\'s licence?  We are still sorting a large number of candidates so please bear with us while we do.',
                'channel_id' => 6,
                'sent_by' => 368,
                'seen_by' => 'true',
                'sent_at' => '2020-02-25 04:28:30',
            ),
            18 => 
            array (
                'history_id' => 19,
                'message_type' => 'message',
                'message' => 'I am free right now, if you want to call me right now. And I will be available the whole evening as well.',
                'channel_id' => 3,
                'sent_by' => 405,
                'seen_by' => '',
                'sent_at' => '2020-02-25 14:44:23',
            ),
            19 => 
            array (
                'history_id' => 20,
                'message_type' => 'message',
                'message' => 'I have a valid international driver\'s licence. In which I can drive both manual and auto as of now until April 28th. I have scheduled with vicroads already to obtain my full Victorian licence by first week of april.',
                'channel_id' => 6,
                'sent_by' => 389,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 05:17:04',
            ),
            20 => 
            array (
                'history_id' => 21,
                'message_type' => 'message',
                'message' => 'Hey Jaun, How are you mate?',
                'channel_id' => 7,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 08:59:52',
            ),
            21 => 
            array (
                'history_id' => 22,
                'message_type' => 'message',
                'message' => 'Hey Seb,',
                'channel_id' => 8,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 05:11:53',
            ),
            22 => 
            array (
                'history_id' => 23,
                'message_type' => 'message',
                'message' => 'How are you going?',
                'channel_id' => 8,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 05:11:53',
            ),
            23 => 
            array (
                'history_id' => 24,
                'message_type' => 'message',
                'message' => 'Keen to know more about your work experience in construction',
                'channel_id' => 8,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 05:11:53',
            ),
            24 => 
            array (
                'history_id' => 25,
                'message_type' => 'message',
                'message' => 'Hey Juan,',
                'channel_id' => 9,
                'sent_by' => 600,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 09:01:21',
            ),
            25 => 
            array (
                'history_id' => 26,
                'message_type' => 'message',
                'message' => 'Thanks for applying to our ad mate. Keen to know a bit more about what you\'ve been up to? Do you love in Melbourne etc?',
                'channel_id' => 9,
                'sent_by' => 600,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 09:01:21',
            ),
            26 => 
            array (
                'history_id' => 27,
                'message_type' => 'message',
                'message' => 'Hey dude, thanks for applying. what your experience onsite? Do you live local to Melbourne? do you have a car?',
                'channel_id' => 10,
                'sent_by' => 29,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 09:02:47',
            ),
            27 => 
            array (
                'history_id' => 28,
                'message_type' => 'message',
                'message' => 'Hey mate, profiles impressive. Where are you located? have you had any experience working with formwork/ concrete works?',
                'channel_id' => 11,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 09:00:24',
            ),
            28 => 
            array (
                'history_id' => 29,
                'message_type' => 'message',
                'message' => 'Hey John, thanks for the application. How long have you been working in construction? Do you have a car and transport?',
                'channel_id' => 12,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-09 05:35:23',
            ),
            29 => 
            array (
                'history_id' => 30,
                'message_type' => 'message',
                'message' => 'Honestly talking, I haven\'t got experience yet but I can learn quickly and I\'m going to do my best at work',
                'channel_id' => 8,
                'sent_by' => 470,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:50:39',
            ),
            30 => 
            array (
                'history_id' => 31,
                'message_type' => 'message',
                'message' => 'Hi',
                'channel_id' => 12,
                'sent_by' => 541,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:57:08',
            ),
            31 => 
            array (
                'history_id' => 32,
                'message_type' => 'message',
                'message' => 'I have been working in construction for 10 years.',
                'channel_id' => 12,
                'sent_by' => 541,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:57:08',
            ),
            32 => 
            array (
                'history_id' => 33,
                'message_type' => 'message',
                'message' => 'i have everything you need and ready to start tomorrow.',
                'channel_id' => 12,
                'sent_by' => 541,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:57:08',
            ),
            33 => 
            array (
                'history_id' => 34,
                'message_type' => 'message',
                'message' => 'Good mate',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:51:34',
            ),
            34 => 
            array (
                'history_id' => 35,
                'message_type' => 'message',
                'message' => 'how\'re you going?',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:51:34',
            ),
            35 => 
            array (
                'history_id' => 36,
                'message_type' => 'message',
                'message' => 'Hey mate',
                'channel_id' => 11,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:56:14',
            ),
            36 => 
            array (
                'history_id' => 37,
                'message_type' => 'message',
                'message' => 'i live in point cook but I’ve been working all around Melbourne suburbs',
                'channel_id' => 11,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:56:14',
            ),
            37 => 
            array (
                'history_id' => 38,
                'message_type' => 'message',
                'message' => 'Hey, I’ve been doing some private works with several companies around Melbourne suburbs. Been working as a labour as well as trade assistant for around 2.5 years now',
                'channel_id' => 9,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 03:34:38',
            ),
            38 => 
            array (
                'history_id' => 39,
                'message_type' => 'message',
                'message' => 'Hey mate, I’ve been working as a labourer/trade assistant for around 2.5 years now. I live in Point cook atm. I do have a car.',
                'channel_id' => 10,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:22:31',
            ),
            39 => 
            array (
                'history_id' => 40,
                'message_type' => 'message',
                'message' => 'I did a couple of works that involved concreting but not much tbh. I’m ager to learn about it tho',
                'channel_id' => 11,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:56:14',
            ),
            40 => 
            array (
                'history_id' => 41,
                'message_type' => 'message',
                'message' => 'Thats fine mate, do you have a car or any form of transport?',
                'channel_id' => 8,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:51:47',
            ),
            41 => 
            array (
                'history_id' => 42,
                'message_type' => 'message',
            'message' => 'Do you have a licence? (do you know how to drive a car etc?)',
                'channel_id' => 8,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 00:51:47',
            ),
            42 => 
            array (
                'history_id' => 43,
                'message_type' => 'message',
                'message' => 'Yeah great!, whats type of experience do you have working in construction?',
                'channel_id' => 7,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 01:38:58',
            ),
            43 => 
            array (
                'history_id' => 44,
                'message_type' => 'message',
                'message' => 'Do you have a driver\'s licence or car to get around?',
                'channel_id' => 7,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 01:38:58',
            ),
            44 => 
            array (
                'history_id' => 45,
                'message_type' => 'message',
                'message' => 'Thats all good mate, do you have a car and licence? are you willing to travel around 20-40km for work?',
                'channel_id' => 11,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 01:40:36',
            ),
            45 => 
            array (
                'history_id' => 46,
                'message_type' => 'message',
                'message' => 'Awesome to hear!',
                'channel_id' => 12,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 04:12:37',
            ),
            46 => 
            array (
                'history_id' => 47,
                'message_type' => 'message',
                'message' => 'Do you have a car and licence? are you willing to travel for work? around 20km-30km? Our work is quite physical, you have to operate a pneumatic ram for the whole day. is that something you could do?',
                'channel_id' => 12,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 04:12:37',
            ),
            47 => 
            array (
                'history_id' => 48,
                'message_type' => 'message',
                'message' => 'Experience:',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:20:41',
            ),
            48 => 
            array (
                'history_id' => 49,
                'message_type' => 'message',
                'message' => 'from cleaning, demo, assisting tradies, basic knowledge and power tools handling',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:20:41',
            ),
            49 => 
            array (
                'history_id' => 50,
                'message_type' => 'message',
                'message' => 'I do have a licence as well as a car',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:20:41',
            ),
            50 => 
            array (
                'history_id' => 51,
                'message_type' => 'message',
                'message' => 'I do have both a licence and a car. And also I’m willing to travel. Been commuting most of the time',
                'channel_id' => 11,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:17:04',
            ),
            51 => 
            array (
                'history_id' => 52,
                'message_type' => 'message',
                'message' => 'My answer is yes to all your questions',
                'channel_id' => 12,
                'sent_by' => 541,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:18:35',
            ),
            52 => 
            array (
                'history_id' => 53,
                'message_type' => 'message',
                'message' => 'I do not have a car but I do drive but I have no problem with the transport. Yes, I have a translated driver\'s license',
                'channel_id' => 8,
                'sent_by' => 470,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:20:24',
            ),
            53 => 
            array (
                'history_id' => 54,
                'message_type' => 'message',
                'message' => 'Great to heat mate. Our job involves you to hold on to a pneumatic ram for 8hrs, itss quite physical. Is this something your capable of doing?',
                'channel_id' => 11,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:28:30',
            ),
            54 => 
            array (
                'history_id' => 55,
                'message_type' => 'message',
                'message' => 'awesome dude, ill talk to the boys and get back to you this week. I\'m happy with your experience etc I\'ll see what my directors say',
                'channel_id' => 8,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-13 04:40:38',
            ),
            55 => 
            array (
                'history_id' => 56,
                'message_type' => 'message',
            'message' => 'Sick man, ill speak to the boys (directors) and get back to you this week.',
                'channel_id' => 7,
                'sent_by' => 612,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:26:59',
            ),
            56 => 
            array (
                'history_id' => 57,
                'message_type' => 'message',
                'message' => 'Thanks Juan! let me get back to you next week I think I will have something middle of next week. I\'ll let you know.',
                'channel_id' => 10,
                'sent_by' => 29,
                'seen_by' => 'true',
                'sent_at' => '2020-06-10 23:26:31',
            ),
            57 => 
            array (
                'history_id' => 58,
                'message_type' => 'message',
                'message' => 'Thank you! I appreciate that',
                'channel_id' => 10,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-19 02:00:18',
            ),
            58 => 
            array (
                'history_id' => 59,
                'message_type' => 'message',
                'message' => 'Thank you man! I’d really appreciate that! 
Looking forward to hearing from you',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-12 01:27:40',
            ),
            59 => 
            array (
                'history_id' => 60,
                'message_type' => 'message',
                'message' => '0450525061 it’s my contact  number',
                'channel_id' => 7,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-12 01:27:40',
            ),
            60 => 
            array (
                'history_id' => 61,
                'message_type' => 'message',
                'message' => 'I am! I can do it mate! Here’s my contact number 0450525061',
                'channel_id' => 11,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 06:06:43',
            ),
            61 => 
            array (
                'history_id' => 62,
                'message_type' => 'message',
                'message' => 'Cool mate, what\'s your availability like?',
                'channel_id' => 9,
                'sent_by' => 600,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 03:43:16',
            ),
            62 => 
            array (
                'history_id' => 63,
                'message_type' => 'message',
                'message' => 'Immediate availability. You just lemme know the job details . I’m available weekends too.',
                'channel_id' => 9,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 05:45:11',
            ),
            63 => 
            array (
                'history_id' => 64,
                'message_type' => 'message',
                'message' => 'I would also like to know about the wages and payments. Cheers',
                'channel_id' => 9,
                'sent_by' => 511,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 05:45:11',
            ),
            64 => 
            array (
                'history_id' => 65,
                'message_type' => 'message',
                'message' => 'No problem mate, we generally start you off on $30hr for a week or so and than once we\'re happy your up to the standard we then negotiate a rate thats suitable for both.',
                'channel_id' => 9,
                'sent_by' => 600,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 06:37:03',
            ),
            65 => 
            array (
                'history_id' => 66,
                'message_type' => 'message',
                'message' => 'I will speak with my business partner and check our work scheedule and get bakc to you this week',
                'channel_id' => 9,
                'sent_by' => 600,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 06:37:03',
            ),
            66 => 
            array (
                'history_id' => 67,
                'message_type' => 'message',
                'message' => 'we aslo pay weekly',
                'channel_id' => 9,
                'sent_by' => 600,
                'seen_by' => 'true',
                'sent_at' => '2020-06-11 06:37:03',
            ),
            67 => 
            array (
                'history_id' => 68,
                'message_type' => 'message',
                'message' => 'That’s awesome mate. Thank you so much',
                'channel_id' => 9,
                'sent_by' => 511,
                'seen_by' => '',
                'sent_at' => '2020-06-11 16:38:06',
            ),
            68 => 
            array (
                'history_id' => 69,
                'message_type' => 'message',
                'message' => 'Ok thank you very much for the opportunity, I will be very pending.',
                'channel_id' => 8,
                'sent_by' => 470,
                'seen_by' => 'true',
                'sent_at' => '2020-06-16 02:55:48',
            ),
            69 => 
            array (
                'history_id' => 70,
                'message_type' => 'message',
                'message' => 'Thanks John',
                'channel_id' => 12,
                'sent_by' => 611,
                'seen_by' => 'true',
                'sent_at' => '2020-06-15 02:29:47',
            ),
            70 => 
            array (
                'history_id' => 71,
                'message_type' => 'message',
                'message' => 'Hey Tom,',
                'channel_id' => 13,
                'sent_by' => 611,
                'seen_by' => '',
                'sent_at' => '2020-06-22 10:02:31',
            ),
            71 => 
            array (
                'history_id' => 72,
                'message_type' => 'message',
                'message' => 'Thanks for applying to the job, where abouts are you located?',
                'channel_id' => 13,
                'sent_by' => 611,
                'seen_by' => '',
                'sent_at' => '2020-06-22 10:02:52',
            ),
            72 => 
            array (
                'history_id' => 73,
                'message_type' => 'message',
                'message' => 'Hey Alex, thanks for your application',
                'channel_id' => 14,
                'sent_by' => 708,
                'seen_by' => 'true',
                'sent_at' => '2020-07-02 06:53:37',
            ),
            73 => 
            array (
                'history_id' => 74,
                'message_type' => 'message',
                'message' => 'from reading your profile you have a fair bit of experience in fitouts. We have a project in Clayton that needs a carpenter. Would you be able to get to and from that site?',
                'channel_id' => 14,
                'sent_by' => 708,
                'seen_by' => 'true',
                'sent_at' => '2020-07-02 06:53:37',
            ),
            74 => 
            array (
                'history_id' => 75,
                'message_type' => 'message',
                'message' => 'tools can reamin onsite',
                'channel_id' => 14,
                'sent_by' => 708,
                'seen_by' => 'true',
                'sent_at' => '2020-07-02 06:53:37',
            ),
            75 => 
            array (
                'history_id' => 76,
                'message_type' => 'message',
                'message' => 'remain*',
                'channel_id' => 14,
                'sent_by' => 708,
                'seen_by' => 'true',
                'sent_at' => '2020-07-02 06:53:37',
            ),
            76 => 
            array (
                'history_id' => 77,
                'message_type' => 'message',
                'message' => 'Hey there!',
                'channel_id' => 14,
                'sent_by' => 735,
                'seen_by' => 'true',
                'sent_at' => '2020-07-03 00:18:43',
            ),
            77 => 
            array (
                'history_id' => 78,
                'message_type' => 'message',
                'message' => 'No worries, I would absolutely love to! getting to and from Clayton will be absolutely no issue what so ever. sorry for the late reply. I\'ve been running around today.',
                'channel_id' => 14,
                'sent_by' => 735,
                'seen_by' => 'true',
                'sent_at' => '2020-07-03 00:18:43',
            ),
            78 => 
            array (
                'history_id' => 79,
                'message_type' => 'message',
                'message' => 'look forward to hearing from you. Cheers Alex',
                'channel_id' => 14,
                'sent_by' => 735,
                'seen_by' => 'true',
                'sent_at' => '2020-07-03 00:18:43',
            ),
            79 => 
            array (
                'history_id' => 80,
                'message_type' => 'message',
                'message' => 'Awesome man, whats your number ill try get the construction manage to give you a call',
                'channel_id' => 14,
                'sent_by' => 708,
                'seen_by' => 'true',
                'sent_at' => '2020-07-03 02:19:22',
            ),
            80 => 
            array (
                'history_id' => 81,
                'message_type' => 'message',
                'message' => '0490910068 is my number! call me any time i\'ll answer',
                'channel_id' => 14,
                'sent_by' => 735,
                'seen_by' => 'true',
                'sent_at' => '2020-07-07 03:30:04',
            ),
            81 => 
            array (
                'history_id' => 82,
                'message_type' => 'message',
                'message' => 'G\'day,',
                'channel_id' => 14,
                'sent_by' => 735,
                'seen_by' => 'true',
                'sent_at' => '2020-07-07 03:30:04',
            ),
            82 => 
            array (
                'history_id' => 83,
                'message_type' => 'message',
                'message' => 'I was just messaging to see if you had any news on this position. Really looking forward to being back on the tools as soon as possible!',
                'channel_id' => 14,
                'sent_by' => 735,
                'seen_by' => 'true',
                'sent_at' => '2020-07-07 03:30:04',
            ),
        ));
        
        
    }
}