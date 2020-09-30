<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tickets')->delete();
        
        \DB::table('tickets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ticket' => 'RIIWHS202D',
                'description' => 'Enter and work in confined spaces',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            1 => 
            array (
                'id' => 2,
                'ticket' => 'HLTAID001',
                'description' => 'Provide cardiopulmonary resuscitation [CPR]',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-11-26 20:13:13',
            ),
            2 => 
            array (
                'id' => 3,
                'ticket' => 'CPCCWHS1001',
                'description' => 'Prepare to work safely in the construction industry',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            3 => 
            array (
                'id' => 4,
                'ticket' => 'RIIMPO320E',
                'description' => 'Conduct civil construction excavator operations',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            4 => 
            array (
                'id' => 5,
                'ticket' => 'RIIMPO321E',
                'description' => 'Conduct civil construction wheeled front end loader operations',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            5 => 
            array (
                'id' => 6,
                'ticket' => 'RIIMPO326D',
                'description' => 'Conduct civil',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            6 => 
            array (
                'id' => 7,
                'ticket' => 'TLILIC20005',
            'description' => 'Licence to operate a boom-type elevating work platform (boom length 11meters or more)',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            7 => 
            array (
                'id' => 8,
                'ticket' => 'RIIWHS302D',
                'description' => 'Implement traffic management plan',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            8 => 
            array (
                'id' => 9,
                'ticket' => 'CPCCDE3014A',
                'description' => 'Remove non-friable asbestos',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-09-26 06:27:24',
            ),
            9 => 
            array (
                'id' => 10,
                'ticket' => 'CPCCDE3015A',
                'description' => 'Remove friable asbestos',
                'created_by' => 1,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-10-11 06:57:24',
            ),
            10 => 
            array (
                'id' => 17,
                'ticket' => 'CPCCM1013A - Plan and organise work',
                'description' => 'Ability to plan and organise task work flows',
                'created_by' => NULL,
                'created_at' => '2019-10-11 06:56:11',
                'updated_at' => '2019-10-11 06:56:11',
            ),
            11 => 
            array (
                'id' => 22,
                'ticket' => 'CPCCCM1015A - Carry out measurements and calculations',
                'description' => 'Ability to calculate measurements within the workplace',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:42:03',
                'updated_at' => '2019-10-14 12:42:03',
            ),
            12 => 
            array (
                'id' => 23,
                'ticket' => 'MSMBLIC002 - Licence to operate an advanced boiler',
                'description' => 'Ability to operate an advance boiler',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:44:35',
                'updated_at' => '2019-10-14 12:44:35',
            ),
            13 => 
            array (
                'id' => 24,
                'ticket' => 'AVID2001 - Accept dangerous goods for air transport',
                'description' => 'Skills and knowledge to accept dangerous goods for air transport',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:45:13',
                'updated_at' => '2019-10-14 12:45:13',
            ),
            14 => 
            array (
                'id' => 25,
                'ticket' => 'TLID3015 - Identify and label explosives and dangerous goods',
                'description' => 'Ability to identify and label explosive and dangerous goods',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:46:33',
                'updated_at' => '2019-10-14 12:46:33',
            ),
            15 => 
            array (
                'id' => 26,
                'ticket' => 'TLIE3004 - Prepare workplace documents',
                'description' => 'Ability to prepare workplace documents',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:46:58',
                'updated_at' => '2019-10-14 12:46:58',
            ),
            16 => 
            array (
                'id' => 27,
                'ticket' => 'MSMWHS217 - Gas test atmospheres',
                'description' => 'Ability to test the working atmosphere, using electronic test apparatus, to find out if it is safe for the proposed work.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:56:09',
                'updated_at' => '2019-10-14 12:56:09',
            ),
            17 => 
            array (
                'id' => 28,
                'ticket' => 'RIIWHS202D - Enter and work in confined spaces',
                'description' => 'Ability to enter and work in confined spaces in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 12:56:40',
                'updated_at' => '2019-10-14 12:56:40',
            ),
            18 => 
            array (
                'id' => 29,
                'ticket' => 'MSMPER205 - Enter confined space',
                'description' => 'Ability to o enter a confined space, as defined by the Australian Standard AS 2865-2009 Confined spaces, or its authorised update or replacement.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:35:23',
                'updated_at' => '2019-10-14 13:35:23',
            ),
            19 => 
            array (
                'id' => 30,
                'ticket' => 'TLID2010 - Operate a forklift',
                'description' => 'Ability to operate a forklift in compliance with the relevant state/territory authority licence requirements and regulations, in a variety of operational contexts.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:36:00',
                'updated_at' => '2019-10-14 13:36:00',
            ),
            20 => 
            array (
                'id' => 31,
                'ticket' => 'TLIE2008 - Process workplace documentation',
                'description' => 'Ability to process workplace documentation in accordance with workplace requirements.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:36:27',
                'updated_at' => '2019-10-14 13:36:27',
            ),
            21 => 
            array (
                'id' => 32,
                'ticket' => 'TLIE3002 - Estimate/calculate mass, area and quantify dimensions',
                'description' => 'Ability to estimate and calculate mass, area and quantify dimensions of loads in accordance with workplace requirements and relevant regulations, as part of work functions within the transpor',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:40:18',
                'updated_at' => '2019-10-14 13:40:18',
            ),
            22 => 
            array (
                'id' => 33,
                'ticket' => 'TLIF1001 - Follow occupational health and safety procedures',
            'description' => 'Ability to follow and apply work health and safety (WHS)/occupational health and safety (OHS) procedures when carrying out work activities in compliance with the relevant WHS/OHS regulations ',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:40:44',
                'updated_at' => '2019-10-14 13:40:44',
            ),
            23 => 
            array (
                'id' => 34,
                'ticket' => 'TLIL1001 - Complete workplace orientation/induction procedures',
                'description' => 'Ability to complete workplace orientation and induction procedures when commencing a new work role, in accordance with regulatory requirements and workplace operational policies and procedure',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:41:18',
                'updated_at' => '2019-10-14 13:41:18',
            ),
            24 => 
            array (
                'id' => 35,
                'ticket' => 'TLILIC2001 - Licence to operate a forklift truck',
                'description' => 'Ability to operate a forklift truck safely.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:42:44',
                'updated_at' => '2019-10-14 13:42:44',
            ),
            25 => 
            array (
                'id' => 36,
                'ticket' => 'RIICCM201D - Carry out measurements and calculations',
                'description' => 'Ability to carry out measurements and calculations in Civil Construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:43:09',
                'updated_at' => '2019-10-14 13:43:09',
            ),
            26 => 
            array (
                'id' => 37,
                'ticket' => 'RIIHAN201D - Operate a forklift',
                'description' => 'Ability to operate a forklift in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:43:37',
                'updated_at' => '2019-10-14 13:43:37',
            ),
            27 => 
            array (
                'id' => 38,
                'ticket' => 'RIIWHS201D - Work safely and follow WHS policies and procedures',
                'description' => 'Ability to work safely and follow WHS policies and procedures in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:44:25',
                'updated_at' => '2019-10-14 13:44:25',
            ),
            28 => 
            array (
                'id' => 39,
                'ticket' => 'TLIB2001 - Check and assess operational capabilities of equipment',
                'description' => 'Ability to check and assess the operational capabilities of equipment in accordance with regulations, workplace procedures and requirements, within the transport and logistics industry.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:44:55',
                'updated_at' => '2019-10-14 13:44:55',
            ),
            29 => 
            array (
                'id' => 40,
                'ticket' => 'TLIF3091 - Apply awareness of dangerous goods and hazardous materials requirements',
                'description' => 'Ability to identify and apply an awareness of hazardous substances and dangerous goods requirements.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:46:34',
                'updated_at' => '2019-10-14 13:46:34',
            ),
            30 => 
            array (
                'id' => 41,
                'ticket' => 'MSMBLIC001 - Licence to operate a standard boiler',
                'description' => 'Ability to operate a standard boiler safely',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:47:55',
                'updated_at' => '2019-10-14 13:47:55',
            ),
            31 => 
            array (
                'id' => 42,
                'ticket' => 'RIIHAN301D - Operate elevating work platform',
                'description' => 'Ability to operate an elevating work platform in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:48:30',
                'updated_at' => '2019-10-14 13:48:30',
            ),
            32 => 
            array (
                'id' => 43,
                'ticket' => 'TLID3035 - Operate a boom type elevating work platform',
                'description' => 'Ability to operate a boom type elevating work platform',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:48:57',
                'updated_at' => '2019-10-14 13:48:57',
            ),
            33 => 
            array (
                'id' => 44,
                'ticket' => 'RIIMPO301D - Conduct hydraulic excavator operations',
                'description' => 'Ability to conduct hydraulic excavator operations in Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:49:26',
                'updated_at' => '2019-10-14 13:49:26',
            ),
            34 => 
            array (
                'id' => 45,
                'ticket' => 'RIIMPO320D - Conduct civil construction excavator operations',
                'description' => 'Ability to conduct civil construction excavator operations in Civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:49:49',
                'updated_at' => '2019-10-14 13:49:49',
            ),
            35 => 
            array (
                'id' => 46,
                'ticket' => 'RIIMPO337D - Conduct articulated haul truck operations',
                'description' => 'Ability to conduct articulated haul truck operations in Civil construction, Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:50:31',
                'updated_at' => '2019-10-14 13:50:31',
            ),
            36 => 
            array (
                'id' => 47,
                'ticket' => 'RIIMPO338D - Conduct rigid haul truck operations',
                'description' => 'Ability to conduct rigid haul truck operations in Civil construction, Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:51:00',
                'updated_at' => '2019-10-14 13:51:00',
            ),
            37 => 
            array (
                'id' => 48,
                'ticket' => 'CPCCRI3001A - Operate personnel and materials hoists',
                'description' => 'Ability to operate personnel and materials hoists for moving people and equipment to various heights in a multi-storey structure.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:51:59',
                'updated_at' => '2019-10-14 13:51:59',
            ),
            38 => 
            array (
                'id' => 49,
                'ticket' => 'RIIHAN212D - Conduct non-slewing crane operations',
                'description' => 'Ability to conduct non-slewing crane operations in the Resources and Infrastructure Industries',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:52:56',
                'updated_at' => '2019-10-14 13:52:56',
            ),
            39 => 
            array (
                'id' => 50,
                'ticket' => 'RIIHAN209D - Perform basic rigging',
                'description' => 'Ability to perform basic rigging',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:53:20',
                'updated_at' => '2019-10-14 13:53:20',
            ),
            40 => 
            array (
                'id' => 51,
                'ticket' => 'RIIHAN210D - Perform intermediate rigging operations',
                'description' => 'Ability to perform intermediate rigging operations',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:53:42',
                'updated_at' => '2019-10-14 13:53:42',
            ),
            41 => 
            array (
                'id' => 52,
                'ticket' => 'CPCCBC4045A - Perform advanced rigging',
                'description' => 'Ability to perform advanced rigging',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:54:04',
                'updated_at' => '2019-10-14 13:54:04',
            ),
            42 => 
            array (
                'id' => 53,
                'ticket' => 'RIIHAN211D - Conduct basic scaffolding operations',
                'description' => 'Ability to conduct basic scaffolding operations',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:54:30',
                'updated_at' => '2019-10-14 13:54:30',
            ),
            43 => 
            array (
                'id' => 54,
                'ticket' => 'RIIHAN302D - Conduct intermediate scaffolding operations',
                'description' => 'Ability to to conduct intermediate scaffolding operations, including planning for intermediate scaffolding, and erecting, maintaining and dismantling scaffolding.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:54:53',
                'updated_at' => '2019-10-14 13:54:53',
            ),
            44 => 
            array (
                'id' => 55,
                'ticket' => 'CPCCBC4046A - Erect and dismantle advanced scaffolding',
                'description' => 'Ability to erect and dismantle advanced scaffolding',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:55:38',
                'updated_at' => '2019-10-14 13:55:38',
            ),
            45 => 
            array (
                'id' => 56,
                'ticket' => 'RIIMPO319D - Conduct backhoe/loader operations',
                'description' => 'Ability to conduct backhoe/loader operations in Civil Construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:56:05',
                'updated_at' => '2019-10-14 13:56:05',
            ),
            46 => 
            array (
                'id' => 57,
                'ticket' => 'CPCCDO3011A - Perform dogging',
                'description' => 'Ability to to undertake basic dogging work, both in sight and out of sight of the crane operator, for the purpose of shifting loads mechanically.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:56:29',
                'updated_at' => '2019-10-14 13:56:29',
            ),
            47 => 
            array (
                'id' => 58,
                'ticket' => 'RIIHAN208D - Perform dogging',
                'description' => 'Ability to perform dogging, including planning for dogging, preparing dogging equipment and moving loads.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:57:00',
                'updated_at' => '2019-10-14 13:57:00',
            ),
            48 => 
            array (
                'id' => 59,
                'ticket' => 'RIIMPO308D - Conduct tracked dozer operations',
                'description' => 'Ability to conduct tracked dozer operations in Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:57:33',
                'updated_at' => '2019-10-14 13:57:33',
            ),
            49 => 
            array (
                'id' => 60,
                'ticket' => 'RIIMPO309D - Conduct wheeled dozer operations',
                'description' => 'Ability to conduct wheeled dozer operations in Coal and Metalliferous mining, Civil construction and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:57:55',
                'updated_at' => '2019-10-14 13:57:55',
            ),
            50 => 
            array (
                'id' => 61,
                'ticket' => 'RIIMPO323D - Conduct civil construction dozer operations',
                'description' => 'Ability to conduct civil construction dozer operations in Civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:58:19',
                'updated_at' => '2019-10-14 13:58:19',
            ),
            51 => 
            array (
                'id' => 62,
                'ticket' => 'RIIMPO304D - Conduct wheel loader operations',
                'description' => 'Ability to conduct wheel loader operations in the Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:58:41',
                'updated_at' => '2019-10-14 13:58:41',
            ),
            52 => 
            array (
                'id' => 63,
                'ticket' => 'RIIMPO321D - Conduct civil construction wheeled front end loader operations',
                'description' => 'Ability to conduct civil construction wheeled front end loader operations in Civil construction',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:59:06',
                'updated_at' => '2019-10-14 13:59:06',
            ),
            53 => 
            array (
                'id' => 64,
                'ticket' => 'RIIMPO322D - Conduct civil construction tracked front end loader operations',
                'description' => 'Ability to conduct civil construction tracked front end loader operations in Civil construction',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:59:32',
                'updated_at' => '2019-10-14 13:59:32',
            ),
            54 => 
            array (
                'id' => 65,
                'ticket' => 'RIIMPO310D - Conduct grader operations',
                'description' => 'Ability to conduct grader operations in Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 13:59:55',
                'updated_at' => '2019-10-14 13:59:55',
            ),
            55 => 
            array (
                'id' => 66,
                'ticket' => 'RIIMPO324D - Conduct civil construction grader operations',
                'description' => 'Ability to conduct civil construction grader operations in Civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:00:18',
                'updated_at' => '2019-10-14 14:00:18',
            ),
            56 => 
            array (
                'id' => 67,
                'ticket' => 'TLILIC2002 - Licence to operate an order picking forklift truck',
                'description' => 'Ability to operate an order picking forklift truck safely',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:00:44',
                'updated_at' => '2019-10-14 14:00:44',
            ),
            57 => 
            array (
                'id' => 68,
                'ticket' => 'RIIMPO317D - Conduct roller operations',
                'description' => 'Ability to conduct roller operations in Civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:01:10',
                'updated_at' => '2019-10-14 14:01:10',
            ),
            58 => 
            array (
                'id' => 69,
                'ticket' => 'RIIMPO312D - Conduct scraper operations',
                'description' => 'Ability to conduct scraper operations in Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:01:31',
                'updated_at' => '2019-10-14 14:01:31',
            ),
            59 => 
            array (
                'id' => 70,
                'ticket' => 'AHCMOM210 - Conduct scraper operations',
                'description' => 'Ability to prepare for, carry out and shut down scraper operations used for earthworks in an agricultural environment.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:01:52',
                'updated_at' => '2019-10-14 14:01:52',
            ),
            60 => 
            array (
                'id' => 71,
                'ticket' => 'RIIMPO318E - Conduct civil construction skid steer loader operations',
                'description' => 'Ability to conduct civil construction skid steer loader operations in civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:02:15',
                'updated_at' => '2019-10-14 14:02:15',
            ),
            61 => 
            array (
                'id' => 72,
                'ticket' => 'RIIMPO334D - Conduct skid steer loader operations using attachments',
                'description' => 'Ability to conduct operations with skid steer loaders using attachments in Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:02:57',
                'updated_at' => '2019-10-14 14:02:57',
            ),
            62 => 
            array (
                'id' => 73,
                'ticket' => 'RIIMPO335D - Conduct skid steer loader operations without attachments',
                'description' => 'Ability to conduct operations with skid steer loaders without attachments in Coal and Metalliferous mining and Extractive.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:03:20',
                'updated_at' => '2019-10-14 14:03:20',
            ),
            63 => 
            array (
                'id' => 74,
                'ticket' => 'RIIHAN304D - Conduct slewing crane operations',
                'description' => 'Ability to conduct slewing crane operations in the Resources and Infrastructure Industries',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:03:45',
                'updated_at' => '2019-10-14 14:03:45',
            ),
            64 => 
            array (
                'id' => 75,
                'ticket' => 'RIIHAN309D - Conduct telescopic materials handler operations',
                'description' => 'Ability to conduct telescopic materials handler operations in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:04:10',
                'updated_at' => '2019-10-14 14:04:10',
            ),
            65 => 
            array (
                'id' => 76,
                'ticket' => 'AHCMOM202 - Operate tractors',
                'description' => 'Ability to to prepare for, operate and complete tractor operations under general supervision in the agriculture, horticulture and land management sectors.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:04:35',
                'updated_at' => '2019-10-14 14:04:35',
            ),
            66 => 
            array (
                'id' => 77,
                'ticket' => 'RIIMPO315D - Conduct tractor operations',
                'description' => 'Ability to conduct tractor operations in Civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:05:05',
                'updated_at' => '2019-10-14 14:05:05',
            ),
            67 => 
            array (
                'id' => 78,
                'ticket' => 'RIIHAN307D - Operate a vehicle loading crane',
                'description' => 'Ability to operate a vehicle loading crane in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:05:30',
                'updated_at' => '2019-10-14 14:05:30',
            ),
            68 => 
            array (
                'id' => 79,
                'ticket' => 'RIIMPO206D - Conduct bulk water truck operations',
                'description' => 'Ability to to conduct bulk water truck operations in the Coal and Metalliferous mining and Extractive',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:05:50',
                'updated_at' => '2019-10-14 14:05:50',
            ),
            69 => 
            array (
                'id' => 80,
                'ticket' => 'CPCCWHS2001 - Apply WHS requirements, policies and procedures in the construction industry',
                'description' => 'Ability to apply OHS requirements, policies and procedures in the construction industry.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:06:22',
                'updated_at' => '2019-10-14 14:06:22',
            ),
            70 => 
            array (
                'id' => 81,
                'ticket' => 'RIIWHS204D - Work safely at heights',
                'description' => 'Ability to work safety at heights in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:07:53',
                'updated_at' => '2019-10-14 14:07:53',
            ),
            71 => 
            array (
                'id' => 82,
                'ticket' => 'CPCCCM2010B - Work safely at heights',
                'description' => 'Ability to to work safely on construction sites where the work activity involves working above 1.5 metres from ground level and where fall protection measures are required.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:08:13',
                'updated_at' => '2019-10-14 14:08:13',
            ),
            72 => 
            array (
                'id' => 83,
                'ticket' => 'CPCCCM1013A  - Plan and organise work',
                'description' => 'Ability to plan and organise individual and group work activities on a construction site.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:08:34',
                'updated_at' => '2019-10-14 14:08:34',
            ),
            73 => 
            array (
                'id' => 84,
                'ticket' => 'CPCCOHS2001A - Apply OHS requirements, policies and procedures in the construction industry',
                'description' => 'Ability to to carry out OHS requirements through safe work practices at any on or off-site construction workplace.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:08:55',
                'updated_at' => '2019-10-14 14:08:55',
            ),
            74 => 
            array (
                'id' => 85,
                'ticket' => 'RIIBEF201D - Plan and organise work',
                'description' => 'Ability to plan and organise work',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:09:20',
                'updated_at' => '2019-10-14 14:09:20',
            ),
            75 => 
            array (
                'id' => 86,
                'ticket' => 'CPCCLDG3001A - Licence to perform dogging',
                'description' => 'Ability to perform slinging techniques, including the selection and inspection of lifting gear and/or the directing of the crane operator in the movement of the load when the load is out of v',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:09:48',
                'updated_at' => '2019-10-14 14:09:48',
            ),
            76 => 
            array (
                'id' => 87,
                'ticket' => 'CPCCOHS1001A - Work safely in the construction industry',
                'description' => 'Ability to demonstrate personal awareness of OHS legislative requirements, and the basic principles of risk management and prevention of injury and illness in the construction industry.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:10:13',
                'updated_at' => '2019-10-14 14:10:13',
            ),
            77 => 
            array (
                'id' => 88,
                'ticket' => 'TLID3031 - Rig Load',
                'description' => 'Skills and knowledge required to prepare and rig all types of loads in preparation for lifting by a crane',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:10:37',
                'updated_at' => '2019-10-14 14:10:37',
            ),
            78 => 
            array (
                'id' => 89,
                'ticket' => 'CPCCLRG3001A - Licence to perform rigging basic level',
                'description' => 'Ability to to perform basic rigging work',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:11:04',
                'updated_at' => '2019-10-14 14:11:04',
            ),
            79 => 
            array (
                'id' => 90,
                'ticket' => 'CPCCCM3001C - Operate elevated work platforms',
            'description' => 'Required to safely and effectively operate some types of elevated work platforms (EWPs)',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:11:26',
                'updated_at' => '2019-10-14 14:11:26',
            ),
            80 => 
            array (
                'id' => 91,
                'ticket' => 'CPCCLRG3002A - Licence to perform rigging intermediate level',
                'description' => 'Ability to perform rigging work at the intermediate level',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:12:44',
                'updated_at' => '2019-10-14 14:12:44',
            ),
            81 => 
            array (
                'id' => 92,
                'ticket' => 'CPCCLRG4001A - Licence to perform rigging advanced level',
                'description' => 'Ability to to perform rigging work at the advanced level',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:13:12',
                'updated_at' => '2019-10-14 14:13:12',
            ),
            82 => 
            array (
                'id' => 93,
                'ticket' => 'CPCCLBM3001 - Licence to operate a concrete placing boom',
                'description' => 'Ability to operate concrete placing booms safely',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:13:37',
                'updated_at' => '2019-10-14 14:13:37',
            ),
            83 => 
            array (
                'id' => 94,
                'ticket' => 'RIICOM201D - Communicate in the workplace',
                'description' => 'Ability to communicate in the workplace within the Resources and Infrastructure Industries',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:14:00',
                'updated_at' => '2019-10-14 14:14:00',
            ),
            84 => 
            array (
                'id' => 95,
            'ticket' => 'TLILIC3006 - Licence to operate a non-slewing mobile crane (greater than 3 tonnes capacity)',
                'description' => 'Ability to operate a non-slewing mobile crane safely',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:14:53',
                'updated_at' => '2019-10-14 14:14:53',
            ),
            85 => 
            array (
                'id' => 96,
                'ticket' => 'TLIB3012 - Plan job and set up work areas',
                'description' => 'Ability to plan a lifting job and to set up work areas prior to positioning and setting up a mobile crane in compliance with the licence/permit requirements and regulations in a variety of op',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:15:33',
                'updated_at' => '2019-10-14 14:15:33',
            ),
            86 => 
            array (
                'id' => 97,
                'ticket' => 'TLIF3084 - Follow mobile crane safety procedures',
            'description' => 'Ability to follow and apply mobile crane safety procedures, and work health and safety (WHS)/occupational health and safety (OHS) procedures when carrying out mobile crane operations',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:15:58',
                'updated_at' => '2019-10-14 14:15:58',
            ),
            87 => 
            array (
                'id' => 98,
                'ticket' => 'TLIB3012A - Plan job and set up work areas',
                'description' => 'Ability to to plan a lifting job and set up work areas',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:16:26',
                'updated_at' => '2019-10-14 14:16:26',
            ),
            88 => 
            array (
                'id' => 99,
                'ticket' => 'TLIF1001A - Follow OH&S procedures',
            'description' => 'Ability to follow and apply occupational health and safety (OH&S) procedures when carrying out work activities.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:16:47',
                'updated_at' => '2019-10-14 14:16:47',
            ),
            89 => 
            array (
                'id' => 100,
                'ticket' => 'TLILIC0012A - Licence to operate a vehicle loading crane, 10mt plus capacity',
                'description' => 'Required to operate a vehicle loading crane with a capacity of 10 metre tonnes or more, mounted on a vehicle for the principle purpose of loading and unloading such a vehicle, including the a',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:17:09',
                'updated_at' => '2019-10-14 14:17:09',
            ),
            90 => 
            array (
                'id' => 101,
                'ticket' => 'TLID3033A - Operate a vehicle mounted loading crane',
                'description' => 'Ability to operate a vehicle-mounted loading crane',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:17:31',
                'updated_at' => '2019-10-14 14:17:31',
            ),
            91 => 
            array (
                'id' => 102,
                'ticket' => 'TLIB3016 - De-rig, pack and store tools and equipment',
                'description' => 'Ability to de-rig a mobile crane, and to pack and store tools and equipment in accordance with licence/permit requirements and regulations.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:17:53',
                'updated_at' => '2019-10-14 14:17:53',
            ),
            92 => 
            array (
                'id' => 103,
                'ticket' => 'TLID3036 - Lift and move load using a mobile crane',
                'description' => 'Ability to lift and move a load using a non-slewing mobile crane or a slewing mobile crane',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:18:14',
                'updated_at' => '2019-10-14 14:18:14',
            ),
            93 => 
            array (
                'id' => 104,
                'ticket' => 'TLIE3015 - Undertake rigger/dogger and driver communication',
                'description' => 'Ability to complete receival/despatch documentation in accordance with regulatory and workplace requirements including analysing orders to identify work requirements to fill order, following ',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:18:47',
                'updated_at' => '2019-10-14 14:18:47',
            ),
            94 => 
            array (
                'id' => 105,
            'ticket' => 'TLILIC3008 - Licence to operate a slewing mobile crane (up to 20 tonnes)',
                'description' => 'Ability to safely operate a slewing mobile crane with a capacity up to 20 tonnes',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:19:08',
                'updated_at' => '2019-10-14 14:19:08',
            ),
            95 => 
            array (
                'id' => 106,
            'ticket' => 'TLILIC4009 - Licence to operate a slewing mobile crane (up to 60 tonnes)',
                'description' => 'Ability to safely operate a slewing mobile crane with a capacity up to 60 tonnes',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:19:32',
                'updated_at' => '2019-10-14 14:19:32',
            ),
            96 => 
            array (
                'id' => 107,
            'ticket' => 'TLILIC4010 - Licence to operate a slewing mobile crane (up to 100 tonnes)',
                'description' => 'Ability to safely operate a slewing mobile crane with a capacity up to 100 tonnes',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:20:35',
                'updated_at' => '2019-10-14 14:20:35',
            ),
            97 => 
            array (
                'id' => 108,
            'ticket' => 'TLILIC4011 - Licence to operate a slewing mobile crane (over 100 tonnes)',
                'description' => 'Ability to safely operate a slewing mobile crane with a capacity over 100 tonnes.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:20:59',
                'updated_at' => '2019-10-14 14:20:59',
            ),
            98 => 
            array (
                'id' => 109,
                'ticket' => 'TLIE1005 - Carry out basic workplace calculations',
                'description' => 'Ability to carry out basic routine workplace calculations',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:21:22',
                'updated_at' => '2019-10-14 14:21:22',
            ),
            99 => 
            array (
                'id' => 110,
                'ticket' => 'CPCCBC4044A - Operate a tower crane',
                'description' => 'Ability to operate a tower crane',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:21:48',
                'updated_at' => '2019-10-14 14:21:48',
            ),
            100 => 
            array (
                'id' => 111,
                'ticket' => 'CPCCLTC4001A - Licence to operate a tower crane',
                'description' => 'Ability to operate a tower crane for licensing purposes',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:22:12',
                'updated_at' => '2019-10-14 14:22:12',
            ),
            101 => 
            array (
                'id' => 112,
                'ticket' => 'TLILIC3004 - Licence to operate a derrick crane',
                'description' => 'Ability to operate a derrick crane safely',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:22:31',
                'updated_at' => '2019-10-14 14:22:31',
            ),
            102 => 
            array (
                'id' => 113,
                'ticket' => 'TLILIC3007 - Licence to operate a portal boom crane',
                'description' => 'Ability to operate a portal boom crane mounted on a portal frame',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:22:51',
                'updated_at' => '2019-10-14 14:22:51',
            ),
            103 => 
            array (
                'id' => 114,
                'ticket' => 'MSMPER200 - Work in accordance with an issued permit',
                'description' => 'Ability to work in accordance with an issued permit',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:23:14',
                'updated_at' => '2019-10-14 14:23:14',
            ),
            104 => 
            array (
                'id' => 115,
                'ticket' => 'MSMPER202 - Observe permit work',
                'description' => 'Ability to undertake the safety observer role for permits requiring a safety observer',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:23:34',
                'updated_at' => '2019-10-14 14:23:34',
            ),
            105 => 
            array (
                'id' => 116,
                'ticket' => 'CPCCCM2008B - Erect and dismantle restricted height scaffolding',
                'description' => 'Ability to erect and dismantle restricted height scaffolding to provide work platforms for various occupational applications',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:24:08',
                'updated_at' => '2019-10-14 14:24:08',
            ),
            106 => 
            array (
                'id' => 117,
                'ticket' => 'CPCCLSF2001A - Licence to erect, alter and dismantle scaffolding basic level',
                'description' => 'Ability to erect, alter and dismantle scaffolding at the basic level',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:24:31',
                'updated_at' => '2019-10-14 14:24:31',
            ),
            107 => 
            array (
                'id' => 118,
                'ticket' => 'CPCCSC2001A - Safely handle and use scaffolding tools and equipment',
                'description' => 'Ability to safely move, locate, inspect, service and store scaffolding together with associated tools and equipment',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:24:57',
                'updated_at' => '2019-10-14 14:24:57',
            ),
            108 => 
            array (
                'id' => 119,
                'ticket' => 'CPCCLSF3001A - Licence to erect, alter and dismantle scaffolding intermediate level',
                'description' => 'Ability to erect, alter and dismantle scaffolding at the Intermediate level',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:25:18',
                'updated_at' => '2019-10-14 14:25:59',
            ),
            109 => 
            array (
                'id' => 120,
                'ticket' => 'RIIWHS205D - Control traffic with stop-slow bat',
                'description' => 'To control traffic with stop-slow bat in the Resources and Infrastructure Industries.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:26:22',
                'updated_at' => '2019-10-14 14:26:22',
            ),
            110 => 
            array (
                'id' => 121,
                'ticket' => 'RIIWHS302D - Implement traffic management plan',
                'description' => 'To implement a traffic management plan in Civil construction',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:26:42',
                'updated_at' => '2019-10-14 14:26:42',
            ),
            111 => 
            array (
                'id' => 122,
                'ticket' => 'CPCCCM1016A - Identify requirements for safe tilt-up work',
                'description' => 'Required for tilt-up work induction training within the construction industry',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:27:03',
                'updated_at' => '2019-10-14 14:27:03',
            ),
            112 => 
            array (
                'id' => 123,
                'ticket' => 'CPCCLHS3001A - Licence to operate a personnel and materials hoist',
                'description' => 'Ability to operate a builder\'s hoist',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:27:30',
                'updated_at' => '2019-10-14 14:27:30',
            ),
            113 => 
            array (
                'id' => 124,
                'ticket' => 'CPCCLHS3002A - Licence to operate a materials hoist',
                'description' => 'Ability to to operate a materials hoist being a builder\'s hoist',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:28:21',
                'updated_at' => '2019-10-14 14:28:21',
            ),
            114 => 
            array (
                'id' => 125,
                'ticket' => 'CPCCCM1015A - Carry out measurements and calculations',
                'description' => 'Ability to carry out measurements and perform simple calculations to determine task and material requirements for a job in a construction work environment.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:28:42',
                'updated_at' => '2019-10-14 14:28:42',
            ),
            115 => 
            array (
                'id' => 126,
                'ticket' => 'TLILIC3019 - Licence to operate a Reach Stacker',
                'description' => 'Ability to operate a reach stacker safely',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:29:06',
                'updated_at' => '2019-10-14 14:29:06',
            ),
            116 => 
            array (
                'id' => 127,
            'ticket' => 'TLILIC2005 - Licence to operate a boom-type elevating work platform (boom length 11 metres or more)',
                'description' => 'Ability to safely operate a boom-type elevating work platform where the length of the boom is 11 metres or more.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:29:37',
                'updated_at' => '2019-10-14 14:29:37',
            ),
            117 => 
            array (
                'id' => 128,
                'ticket' => 'RIIMPO318D - Conduct civil construction skid steer loader operations',
                'description' => 'Ability to conduct civil construction skid steer loader operations in Civil construction.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:30:14',
                'updated_at' => '2019-10-14 14:30:14',
            ),
            118 => 
            array (
                'id' => 129,
                'ticket' => 'TLIF3022 - Implement/monitor procedures when warehousing/storing dangerous goods/hazardous substances',
            'description' => 'Ability to implement and monitor work health and safety (WHS)/occupational health and safety (OHS) policies, safe work procedures and programs for warehousing or storing dangerous goods and h',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:32:21',
                'updated_at' => '2019-10-14 14:32:21',
            ),
            119 => 
            array (
                'id' => 130,
                'ticket' => 'TLID3027 - Prepare for transport of dangerous goods',
                'description' => 'Ability to prepare for the transport of dangerous goods as part of work activities undertaken within the transport and logistics industry',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:32:44',
                'updated_at' => '2019-10-14 14:32:44',
            ),
            120 => 
            array (
                'id' => 131,
                'ticket' => 'TLIE4025 - Prepare and process transport documentation for dangerous goods',
                'description' => 'Ability to prepare and process transport documentation relating to dangerous goods.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:33:13',
                'updated_at' => '2019-10-14 14:33:13',
            ),
            121 => 
            array (
                'id' => 132,
                'ticket' => 'TLILIC0001 - Licence to transport dangerous goods by road',
            'description' => 'Ability to obtain a dangerous goods (DG) driver licence to transport DG by road.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:33:37',
                'updated_at' => '2019-10-14 14:33:37',
            ),
            122 => 
            array (
                'id' => 133,
                'ticket' => 'TLIA1001 - Secure Cargo',
                'description' => 'Ability to secure cargo in accordance with procedures and regulatory requirements as part of work activities within the transport and logistics industry.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:33:57',
                'updated_at' => '2019-10-14 14:33:57',
            ),
            123 => 
            array (
                'id' => 134,
                'ticket' => 'TLIA3015 - Complete receivabel/despatch documentation',
                'description' => 'Ability to complete receival/despatch documentation in accordance with relevant regulations and workplace requirements as part of work activities within the transport and logistics industry.',
                'created_by' => NULL,
                'created_at' => '2019-10-14 14:34:21',
                'updated_at' => '2019-10-14 14:34:21',
            ),
            124 => 
            array (
                'id' => 135,
                'ticket' => 'CPCCOHS1001A',
                'description' => 'Work safely in the construction industry',
                'created_by' => 37,
                'created_at' => '2019-10-15 05:34:56',
                'updated_at' => '2019-10-15 05:34:56',
            ),
            125 => 
            array (
                'id' => 139,
                'ticket' => 'Rail',
                'description' => 'Industry Worker Card',
                'created_by' => 38,
                'created_at' => '2019-10-15 06:48:57',
                'updated_at' => '2019-10-15 06:48:57',
            ),
            126 => 
            array (
                'id' => 143,
                'ticket' => 'Red',
                'description' => 'Card',
                'created_by' => 106,
                'created_at' => '2019-10-16 06:24:28',
                'updated_at' => '2019-10-16 06:24:28',
            ),
            127 => 
            array (
                'id' => 144,
                'ticket' => 'LF',
                'description' => 'Forklift Licence',
                'created_by' => 106,
                'created_at' => '2019-10-16 06:24:28',
                'updated_at' => '2019-10-16 06:24:28',
            ),
            128 => 
            array (
                'id' => 145,
                'ticket' => 'Moxy',
                'description' => 'Dump Truck',
                'created_by' => 27,
                'created_at' => '2019-11-06 14:33:03',
                'updated_at' => '2019-11-06 14:33:03',
            ),
            129 => 
            array (
                'id' => 146,
                'ticket' => 'Site',
                'description' => 'Safe Building Construction Passport 2014',
                'created_by' => 95,
                'created_at' => '2019-11-10 22:07:13',
                'updated_at' => '2019-11-10 22:07:13',
            ),
            130 => 
            array (
                'id' => 147,
                'ticket' => 'Certificate',
                'description' => 'in Construction Site Safety - Height and Harness Safety 2014',
                'created_by' => 95,
                'created_at' => '2019-11-10 22:07:13',
                'updated_at' => '2019-11-10 22:07:13',
            ),
            131 => 
            array (
                'id' => 148,
                'ticket' => 'HLTAID003',
                'description' => 'Provide First Aid',
                'created_by' => 164,
                'created_at' => '2019-11-11 01:40:03',
                'updated_at' => '2019-11-11 01:40:03',
            ),
            132 => 
            array (
                'id' => 149,
                'ticket' => 'Electrical',
                'description' => 'testing and tagging Certification',
                'created_by' => 165,
                'created_at' => '2019-11-11 02:04:46',
                'updated_at' => '2019-11-11 02:04:46',
            ),
            133 => 
            array (
                'id' => 150,
                'ticket' => 'Victorian',
                'description' => 'Heavy Vehicle Driver License',
                'created_by' => 177,
                'created_at' => '2019-11-11 02:21:38',
                'updated_at' => '2019-11-11 02:21:38',
            ),
            134 => 
            array (
                'id' => 151,
                'ticket' => 'Dogman',
                'description' => 'license',
                'created_by' => 248,
                'created_at' => '2019-11-12 02:12:29',
                'updated_at' => '2019-11-12 02:12:29',
            ),
            135 => 
            array (
                'id' => 152,
                'ticket' => 'Plant',
                'description' => 'operator',
                'created_by' => 248,
                'created_at' => '2019-11-12 02:12:29',
                'updated_at' => '2019-11-12 02:12:29',
            ),
            136 => 
            array (
                'id' => 153,
                'ticket' => 'Boat',
                'description' => 'license',
                'created_by' => 248,
                'created_at' => '2019-11-12 02:12:29',
                'updated_at' => '2019-11-12 02:12:29',
            ),
            137 => 
            array (
                'id' => 155,
                'ticket' => 'International',
                'description' => 'drivers license',
                'created_by' => 271,
                'created_at' => '2019-11-18 07:27:06',
                'updated_at' => '2019-11-18 07:27:06',
            ),
            138 => 
            array (
                'id' => 156,
                'ticket' => 'RIIMPO317E',
                'description' => 'RIIMPO317E',
                'created_by' => 292,
                'created_at' => '2019-11-21 04:51:05',
                'updated_at' => '2019-11-21 04:51:05',
            ),
            139 => 
            array (
                'id' => 159,
                'ticket' => 'fork',
                'description' => 'lift',
                'created_by' => 296,
                'created_at' => '2019-11-25 01:45:00',
                'updated_at' => '2019-11-25 01:45:00',
            ),
            140 => 
            array (
                'id' => 160,
                'ticket' => 'hc',
                'description' => 'truck lic',
                'created_by' => 296,
                'created_at' => '2019-11-25 01:45:00',
                'updated_at' => '2019-11-25 01:45:00',
            ),
            141 => 
            array (
                'id' => 161,
                'ticket' => 'cv',
                'description' => 'crane lic',
                'created_by' => 296,
                'created_at' => '2019-11-25 01:45:00',
                'updated_at' => '2019-11-25 01:45:00',
            ),
            142 => 
            array (
                'id' => 162,
                'ticket' => 'skide',
                'description' => 'steer',
                'created_by' => 296,
                'created_at' => '2019-11-25 01:45:00',
                'updated_at' => '2019-11-25 01:45:00',
            ),
            143 => 
            array (
                'id' => 163,
                'ticket' => 'OHS',
                'description' => 'OHS',
                'created_by' => 300,
                'created_at' => '2019-11-30 11:07:22',
                'updated_at' => '2019-11-30 11:07:22',
            ),
            144 => 
            array (
                'id' => 164,
                'ticket' => 'Cpcs',
                'description' => 'dumper/roller competent operator',
                'created_by' => 330,
                'created_at' => '2020-02-17 01:08:47',
                'updated_at' => '2020-02-17 01:08:47',
            ),
            145 => 
            array (
                'id' => 165,
                'ticket' => 'HR',
                'description' => 'truck license',
                'created_by' => 332,
                'created_at' => '2020-02-17 01:18:38',
                'updated_at' => '2020-02-17 01:18:38',
            ),
            146 => 
            array (
                'id' => 166,
                'ticket' => 'Excavator',
                'description' => 'Excavator',
                'created_by' => 332,
                'created_at' => '2020-02-17 01:18:38',
                'updated_at' => '2020-02-17 01:18:38',
            ),
            147 => 
            array (
                'id' => 167,
                'ticket' => 'Working',
                'description' => 'at heights, first aid',
                'created_by' => 358,
                'created_at' => '2020-02-18 05:48:01',
                'updated_at' => '2020-02-18 05:48:01',
            ),
            148 => 
            array (
                'id' => 171,
                'ticket' => 'First',
                'description' => 'aid',
                'created_by' => 367,
                'created_at' => '2020-02-20 10:07:32',
                'updated_at' => '2020-02-20 10:07:32',
            ),
            149 => 
            array (
                'id' => 172,
                'ticket' => 'Car',
                'description' => 'licence',
                'created_by' => 367,
                'created_at' => '2020-02-20 10:07:32',
                'updated_at' => '2020-02-20 10:07:32',
            ),
            150 => 
            array (
                'id' => 173,
                'ticket' => 'Chainsaw',
                'description' => 'Chainsaw',
                'created_by' => 367,
                'created_at' => '2020-02-20 10:07:32',
                'updated_at' => '2020-02-20 10:07:32',
            ),
            151 => 
            array (
                'id' => 175,
                'ticket' => 'Medium',
                'description' => 'track licence',
                'created_by' => 372,
                'created_at' => '2020-02-21 02:50:26',
                'updated_at' => '2020-02-21 02:50:26',
            ),
            152 => 
            array (
                'id' => 176,
                'ticket' => 'Australian',
                'description' => 'Drivers Licence',
                'created_by' => 387,
                'created_at' => '2020-02-22 01:09:21',
                'updated_at' => '2020-02-22 01:09:21',
            ),
            153 => 
            array (
                'id' => 177,
                'ticket' => 'White',
                'description' => 'Card',
                'created_by' => 387,
                'created_at' => '2020-02-22 01:09:21',
                'updated_at' => '2020-02-22 01:09:21',
            ),
            154 => 
            array (
                'id' => 178,
                'ticket' => 'Level3',
                'description' => 'in civil construction',
                'created_by' => 395,
                'created_at' => '2020-02-22 22:53:02',
                'updated_at' => '2020-02-22 22:53:02',
            ),
            155 => 
            array (
                'id' => 179,
                'ticket' => 'RIIMP0321-',
                'description' => 'Conduct civil construction wheeled FEL operations',
                'created_by' => 397,
                'created_at' => '2020-02-23 00:55:43',
                'updated_at' => '2020-02-23 00:55:43',
            ),
            156 => 
            array (
                'id' => 180,
                'ticket' => 'RIIMP0320-',
                'description' => 'Conduct civil construction excavator operation',
                'created_by' => 397,
                'created_at' => '2020-02-23 00:55:43',
                'updated_at' => '2020-02-23 00:55:43',
            ),
            157 => 
            array (
                'id' => 181,
                'ticket' => 'RIIP0318D-',
                'description' => 'Conduct civil construction skid steer loader operation',
                'created_by' => 397,
                'created_at' => '2020-02-23 00:55:43',
                'updated_at' => '2020-02-23 00:55:43',
            ),
            158 => 
            array (
                'id' => 182,
                'ticket' => 'RIIMP0317D',
                'description' => 'Conduct roller operation',
                'created_by' => 397,
                'created_at' => '2020-02-23 00:55:43',
                'updated_at' => '2020-02-23 00:55:43',
            ),
            159 => 
            array (
                'id' => 186,
                'ticket' => 'Scissor',
                'description' => 'lift',
                'created_by' => 400,
                'created_at' => '2020-02-23 09:36:20',
                'updated_at' => '2020-02-23 09:36:20',
            ),
            160 => 
            array (
                'id' => 187,
                'ticket' => 'digger',
                'description' => 'digger',
                'created_by' => 413,
                'created_at' => '2020-02-25 02:39:16',
                'updated_at' => '2020-02-25 02:39:16',
            ),
            161 => 
            array (
                'id' => 189,
                'ticket' => 'bld226704',
                'description' => 'bld226704',
                'created_by' => 406,
                'created_at' => '2020-02-25 06:35:09',
                'updated_at' => '2020-02-25 06:35:09',
            ),
            162 => 
            array (
                'id' => 190,
                'ticket' => 'builders',
                'description' => 'licence',
                'created_by' => 406,
                'created_at' => '2020-02-25 06:35:09',
                'updated_at' => '2020-02-25 06:35:09',
            ),
            163 => 
            array (
                'id' => 192,
                'ticket' => 'Driver',
                'description' => 'License',
                'created_by' => 423,
                'created_at' => '2020-02-25 07:29:59',
                'updated_at' => '2020-02-25 07:29:59',
            ),
            164 => 
            array (
                'id' => 193,
                'ticket' => 'Excavato',
                'description' => 'Excavato',
                'created_by' => 437,
                'created_at' => '2020-02-26 04:06:53',
                'updated_at' => '2020-02-26 04:06:53',
            ),
            165 => 
            array (
                'id' => 194,
                'ticket' => 'Mr',
                'description' => 'licence',
                'created_by' => 441,
                'created_at' => '2020-02-27 12:55:51',
                'updated_at' => '2020-02-27 12:55:51',
            ),
            166 => 
            array (
                'id' => 242,
                'ticket' => 'scizzor',
                'description' => 'lift',
                'created_by' => 449,
                'created_at' => '2020-02-28 19:45:48',
                'updated_at' => '2020-02-28 19:45:48',
            ),
            167 => 
            array (
                'id' => 243,
                'ticket' => 'Teloscopic',
                'description' => 'handler',
                'created_by' => 449,
                'created_at' => '2020-02-28 19:45:48',
                'updated_at' => '2020-02-28 19:45:48',
            ),
            168 => 
            array (
                'id' => 244,
                'ticket' => 'Traffic',
                'description' => 'control',
                'created_by' => 449,
                'created_at' => '2020-02-28 19:45:48',
                'updated_at' => '2020-02-28 19:45:48',
            ),
            169 => 
            array (
                'id' => 245,
                'ticket' => 'Driving',
                'description' => 'licenses',
                'created_by' => 475,
                'created_at' => '2020-03-03 00:51:16',
                'updated_at' => '2020-03-03 00:51:16',
            ),
            170 => 
            array (
                'id' => 246,
                'ticket' => 'Chilean',
                'description' => 'license, with appointment on Vicroads to get Victorian licence',
                'created_by' => 485,
                'created_at' => '2020-03-03 23:17:43',
                'updated_at' => '2020-03-03 23:17:43',
            ),
            171 => 
            array (
                'id' => 251,
                'ticket' => 'harn',
                'description' => 'harn',
                'created_by' => 543,
                'created_at' => '2020-03-16 10:38:25',
                'updated_at' => '2020-03-16 10:38:25',
            ),
            172 => 
            array (
                'id' => 252,
                'ticket' => 'ewp',
                'description' => 'ewp',
                'created_by' => 543,
                'created_at' => '2020-03-16 10:38:25',
                'updated_at' => '2020-03-16 10:38:25',
            ),
            173 => 
            array (
                'id' => 253,
                'ticket' => 'Alcohol',
                'description' => 'and drug test cert',
                'created_by' => 568,
                'created_at' => '2020-04-12 04:06:03',
                'updated_at' => '2020-04-12 04:06:03',
            ),
            174 => 
            array (
                'id' => 254,
                'ticket' => 'Return',
                'description' => 'to work and Rehab cert',
                'created_by' => 568,
                'created_at' => '2020-04-12 04:06:03',
                'updated_at' => '2020-04-12 04:06:03',
            ),
            175 => 
            array (
                'id' => 255,
                'ticket' => 'Drivers',
                'description' => 'license',
                'created_by' => 579,
                'created_at' => '2020-04-14 08:08:41',
                'updated_at' => '2020-04-14 08:08:41',
            ),
            176 => 
            array (
                'id' => 256,
                'ticket' => 'Mr-license',
                'description' => 'Mr-license',
                'created_by' => 607,
                'created_at' => '2020-06-02 00:26:20',
                'updated_at' => '2020-06-02 00:26:20',
            ),
            177 => 
            array (
                'id' => 257,
                'ticket' => 'Bobcat',
                'description' => 'Bobcat',
                'created_by' => 607,
                'created_at' => '2020-06-02 00:26:20',
                'updated_at' => '2020-06-02 00:26:20',
            ),
            178 => 
            array (
                'id' => 310,
                'ticket' => 'Heavy',
            'description' => 'rigid (non synchro)',
                'created_by' => 633,
                'created_at' => '2020-06-11 23:41:02',
                'updated_at' => '2020-06-11 23:41:02',
            ),
            179 => 
            array (
                'id' => 311,
                'ticket' => 'Accredited',
                'description' => 'Insulation installer',
                'created_by' => 646,
                'created_at' => '2020-06-12 18:41:49',
                'updated_at' => '2020-06-12 18:41:49',
            ),
            180 => 
            array (
                'id' => 312,
                'ticket' => 'RIIWHS205D',
                'description' => 'RIIWHS205D',
                'created_by' => 654,
                'created_at' => '2020-06-15 00:26:31',
                'updated_at' => '2020-06-15 00:26:31',
            ),
            181 => 
            array (
                'id' => 313,
                'ticket' => '10640427',
                'description' => NULL,
                'created_by' => 663,
                'created_at' => '2020-06-16 02:25:18',
                'updated_at' => '2020-06-16 02:25:18',
            ),
            182 => 
            array (
                'id' => 314,
                'ticket' => 'Pegasus',
                'description' => 'card',
                'created_by' => 670,
                'created_at' => '2020-06-16 21:03:59',
                'updated_at' => '2020-06-16 21:03:59',
            ),
            183 => 
            array (
                'id' => 316,
                'ticket' => 'WWC',
                'description' => 'ticket',
                'created_by' => 686,
                'created_at' => '2020-06-22 03:40:19',
                'updated_at' => '2020-06-22 03:40:19',
            ),
            184 => 
            array (
                'id' => 317,
                'ticket' => '0005494557',
                'description' => NULL,
                'created_by' => 703,
                'created_at' => '2020-06-25 03:01:52',
                'updated_at' => '2020-06-25 03:01:52',
            ),
            185 => 
            array (
                'id' => 318,
                'ticket' => 'CPCCWHS1001405948-',
                'description' => 'Prepare to work safely in the construction industry',
                'created_by' => 669,
                'created_at' => '2020-07-03 09:33:23',
                'updated_at' => '2020-07-03 09:33:23',
            ),
            186 => 
            array (
                'id' => 340,
                'ticket' => 'test',
                'description' => 'test',
                'created_by' => 305,
                'created_at' => '2020-07-06 04:24:57',
                'updated_at' => '2020-07-06 04:24:57',
            ),
            187 => 
            array (
                'id' => 341,
                'ticket' => 'CPCC0HS2001,OFA2014',
                'description' => 'Occupational First Aid, RIWHS 205D 302D Control Traffic and Implement Traffic Management Plan, CPC20112 Certificate 11 in Construction, CPCCCM2010B Work Safety at Heights,CPCCOHS 2001 A Apply',
                'created_by' => 771,
                'created_at' => '2020-07-09 09:35:59',
                'updated_at' => '2020-07-09 09:35:59',
            ),
            188 => 
            array (
                'id' => 342,
                'ticket' => 'TLILIC0003',
                'description' => 'TLILIC0003',
                'created_by' => 797,
                'created_at' => '2020-07-14 03:23:51',
                'updated_at' => '2020-07-14 03:23:51',
            ),
            189 => 
            array (
                'id' => 346,
                'ticket' => 'Assist',
                'description' => 'in electrical spotting services',
                'created_by' => 803,
                'created_at' => '2020-07-14 23:15:59',
                'updated_at' => '2020-07-14 23:15:59',
            ),
            190 => 
            array (
                'id' => 347,
                'ticket' => 'Stop',
                'description' => 'slow bat',
                'created_by' => 803,
                'created_at' => '2020-07-14 23:15:59',
                'updated_at' => '2020-07-14 23:15:59',
            ),
            191 => 
            array (
                'id' => 348,
                'ticket' => 'Fist',
                'description' => 'aid certificate 2',
                'created_by' => 803,
                'created_at' => '2020-07-14 23:15:59',
                'updated_at' => '2020-07-14 23:15:59',
            ),
            192 => 
            array (
                'id' => 349,
                'ticket' => 'Elevated',
                'description' => 'work platforms up to 11 meters',
                'created_by' => 803,
                'created_at' => '2020-07-14 23:15:59',
                'updated_at' => '2020-07-14 23:15:59',
            ),
            193 => 
            array (
                'id' => 350,
                'ticket' => 'Has',
                'description' => 'the right to work in Australia',
                'created_by' => 823,
                'created_at' => '2020-07-20 07:09:56',
                'updated_at' => '2020-07-20 07:09:56',
            ),
            194 => 
            array (
                'id' => 351,
                'ticket' => 'TFN',
                'description' => 'TFN',
                'created_by' => 823,
                'created_at' => '2020-07-20 07:09:56',
                'updated_at' => '2020-07-20 07:09:56',
            ),
            195 => 
            array (
                'id' => 352,
                'ticket' => 'Telehandler',
                'description' => 'Telehandler',
                'created_by' => 828,
                'created_at' => '2020-07-20 23:21:22',
                'updated_at' => '2020-07-20 23:21:22',
            ),
            196 => 
            array (
                'id' => 355,
                'ticket' => 'Carpentry',
                'description' => 'licence',
                'created_by' => 845,
                'created_at' => '2020-07-23 01:00:29',
                'updated_at' => '2020-07-23 01:00:29',
            ),
            197 => 
            array (
                'id' => 356,
                'ticket' => 'High',
                'description' => 'risk works',
                'created_by' => 845,
                'created_at' => '2020-07-23 01:00:29',
                'updated_at' => '2020-07-23 01:00:29',
            ),
            198 => 
            array (
                'id' => 357,
                'ticket' => 'Construction',
                'description' => 'induction card',
                'created_by' => 871,
                'created_at' => '2020-07-29 06:38:54',
                'updated_at' => '2020-07-29 06:38:54',
            ),
            199 => 
            array (
                'id' => 359,
                'ticket' => 'HRW',
                'description' => 'licence',
                'created_by' => 885,
                'created_at' => '2020-08-03 04:37:14',
                'updated_at' => '2020-08-03 04:37:14',
            ),
            200 => 
            array (
                'id' => 360,
                'ticket' => 'LR',
                'description' => 'truck',
                'created_by' => 885,
                'created_at' => '2020-08-03 04:37:14',
                'updated_at' => '2020-08-03 04:37:14',
            ),
        ));
        
        
    }
}