<?php

use Illuminate\Database\Seeder;

class JobPostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_posts')->delete();
        
        \DB::table('job_posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => NULL,
                'description' => 'A 20 years experience carpenter with a big salary',
                'about' => NULL,
                'exp_level' => 'Senior',
                'contract_type' => 'Full-time',
                'salary' => '20,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => 'Richmond, Victoria, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 1,
                'is_template' => 1,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-10-07 04:32:09',
                'status' => 1,
                'template_name' => 'Template 1',
                'template_id' => NULL,
                'deleted_at' => '2019-10-07 04:32:09',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => NULL,
                'description' => 'Looking for a c# programmer',
                'about' => NULL,
                'exp_level' => 'Senior',
                'contract_type' => 'Partime',
                'salary' => '10,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => NULL,
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 3,
                'is_template' => 1,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-12-19 04:39:55',
                'status' => 1,
                'template_name' => 'Template 2',
                'template_id' => NULL,
                'deleted_at' => '2019-12-19 04:39:55',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Maintenance Supervisor',
                'description' => 'Looking for an experienced supervisor',
                'about' => NULL,
                'exp_level' => '2 years',
                'contract_type' => 'Full-time',
                'salary' => '15,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => NULL,
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => NULL,
                'is_template' => 1,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-12-19 04:39:55',
                'status' => 1,
                'template_name' => 'Template 3',
                'template_id' => NULL,
                'deleted_at' => '2019-12-19 04:39:55',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => NULL,
                'description' => 'An opportunity is available for a Construction Manager to work in and with the Melbourne Asphalt team to take responsibility for delivery of a portfolio of projects whilst optimising performance.',
                'about' => NULL,
                'exp_level' => '1 year',
                'contract_type' => 'Full-time',
                'salary' => '10,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 3,
                'is_template' => 0,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-10-20 23:09:12',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-20 23:09:12',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Electrician',
                'description' => 'This is a past job.',
                'about' => NULL,
                'exp_level' => '1 year',
                'contract_type' => 'Full-time',
                'salary' => '10,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-10-20 23:29:56',
                'status' => 0,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-20 23:29:56',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => NULL,
                'description' => 'An opportunity is available for a Master Carpenter to work in and with the Richmond Asphalt team to take responsibility for delivery of a portfolio of projects whilst optimising performance.',
                'about' => NULL,
                'exp_level' => 'Junior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '110,000',
                'salary_type' => NULL,
                'project_size' => '2,000,000',
                'reports_to_json' => '["Construction Manager"]',
                'location' => 'Richmond, Victoria, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 137,
                'is_template' => 0,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-12-19 04:39:55',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-12-19 04:39:55',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => NULL,
                'description' => 'Looking for a experienced plumber',
                'about' => NULL,
                'exp_level' => '5 year more',
                'contract_type' => 'Full-time',
                'salary' => '30,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => NULL,
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 2,
                'is_template' => 1,
                'created_by' => 2,
                'created_at' => '2019-09-26 06:27:24',
                'updated_at' => '2019-11-19 09:22:19',
                'status' => 1,
                'template_name' => 'Template 4',
                'template_id' => NULL,
                'deleted_at' => '2019-11-19 09:22:19',
            ),
            7 => 
            array (
                'id' => 23,
                'title' => NULL,
                'description' => 'A 20 years experience carpenter with a big salary',
                'about' => NULL,
                'exp_level' => 'Senior',
                'contract_type' => 'Full-time',
                'salary' => '20,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => 'Richmond, Victoria, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 1,
                'is_template' => 1,
                'created_by' => 2,
                'created_at' => '2019-09-30 18:07:00',
                'updated_at' => '2019-10-07 04:32:03',
                'status' => 1,
                'template_name' => 'Template 1',
                'template_id' => 1,
                'deleted_at' => '2019-10-07 04:32:03',
            ),
            8 => 
            array (
                'id' => 24,
                'title' => NULL,
                'description' => 'A 20 years experience carpenter with a big salary',
                'about' => NULL,
                'exp_level' => 'Senior',
                'contract_type' => 'Full-time',
                'salary' => '20,000',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => NULL,
                'location' => 'Richmond, Victoria, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => 1,
                'is_template' => 1,
                'created_by' => 2,
                'created_at' => '2019-09-30 18:07:29',
                'updated_at' => '2019-11-19 09:22:14',
                'status' => 1,
                'template_name' => 'Template 1',
                'template_id' => 23,
                'deleted_at' => '2019-11-19 09:22:14',
            ),
            9 => 
            array (
                'id' => 25,
                'title' => 'Head Engineer',
                'description' => 'Head Engineer',
                'about' => 'Head Engineer',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '10,000',
                'salary_type' => NULL,
                'project_size' => '500,000',
                'reports_to_json' => '["CEO","General Manager"]',
                'location' => 'Head Engineer',
                'params' => NULL,
                'company_id' => 6,
                'job_role_id' => NULL,
                'is_template' => 1,
                'created_by' => 9,
                'created_at' => '2019-09-30 18:29:37',
                'updated_at' => '2019-09-30 18:29:37',
                'status' => 1,
                'template_name' => 'Test 1',
                'template_id' => NULL,
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 26,
                'title' => 'Head Engineer',
                'description' => 'Head Engineer',
                'about' => 'Head Engineer',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '10,000',
                'salary_type' => NULL,
                'project_size' => '500,000',
                'reports_to_json' => '["CEO","General Manager"]',
                'location' => 'Head Engineer',
                'params' => NULL,
                'company_id' => 6,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 9,
                'created_at' => '2019-09-30 18:29:46',
                'updated_at' => '2020-01-04 01:33:40',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2020-01-04 01:33:40',
            ),
            11 => 
            array (
                'id' => 27,
                'title' => 'Web Designer',
                'description' => 'Looking for web designer with atleast 2 years of experience',
                'about' => 'Looking for web designer with atleast 2 years of experience',
                'exp_level' => 'Senior',
                'contract_type' => 'Fixed-Term',
                'salary' => '40,000',
                'salary_type' => NULL,
                'project_size' => '1,000,000',
                'reports_to_json' => '["Mr. Miyagi"]',
                'location' => 'Perth, Western Australia, Australia',
                'params' => NULL,
                'company_id' => 1,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 2,
                'created_at' => '2019-10-07 04:29:47',
                'updated_at' => '2019-10-14 09:28:49',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-14 09:28:49',
            ),
            12 => 
            array (
                'id' => 28,
                'title' => 'Marketing Head',
                'description' => 'Marketing Head',
                'about' => 'Marketing Head',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '10,000',
                'salary_type' => NULL,
                'project_size' => '500,000',
                'reports_to_json' => '["CEO","General Manager"]',
                'location' => 'Marketing Head',
                'params' => NULL,
                'company_id' => 6,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 9,
                'created_at' => '2019-10-08 16:40:57',
                'updated_at' => '2019-10-29 08:47:54',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-29 08:47:54',
            ),
            13 => 
            array (
                'id' => 31,
                'title' => 'Builders Labourer',
                'description' => 'We are currently seeking a skilled labourer, with initiative  so assist our trades on site. 

Your responsibilities will include the following:
- Site Cleaning 
- Manual Labour
- Detailed Excavation 

You must have a drivers licence, and hold a white card.',
            'about' => 'We are seeking a labour to work across multiple projects, we currently projects from Melbourne to Flinders (mornington peninsula)',
                'exp_level' => 'Junior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => NULL,
                'salary_type' => NULL,
                'project_size' => '3,500,000',
                'reports_to_json' => '["Site Manager"]',
                'location' => '31 Council Streetr, Hawthorn',
                'params' => NULL,
                'company_id' => 8,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 22,
                'created_at' => '2019-10-12 11:45:25',
                'updated_at' => '2020-02-13 19:31:32',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2020-02-13 19:31:32',
            ),
            14 => 
            array (
                'id' => 32,
                'title' => 'Test',
                'description' => 'sdfhgdsfghdfsghdfgh',
                'about' => 'dfghdfghdfghdfghj',
                'exp_level' => 'Entry Level',
                'contract_type' => 'Part-Time',
                'salary' => '10,000,000',
                'salary_type' => NULL,
                'project_size' => '54,145,156',
                'reports_to_json' => '["dfghdfgh"]',
                'location' => 'fdghdfgh',
                'params' => NULL,
                'company_id' => 9,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 23,
                'created_at' => '2019-10-12 12:21:50',
                'updated_at' => '2019-10-14 09:13:34',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-14 09:13:34',
            ),
            15 => 
            array (
                'id' => 33,
                'title' => 'thdrtyfhu',
                'description' => 'ghfjgfhj',
                'about' => 'fghjfghj',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Full-Time Permanent',
                'salary' => NULL,
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => '[null]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 9,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 23,
                'created_at' => '2019-10-12 12:25:19',
                'updated_at' => '2019-10-14 09:13:39',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-14 09:13:39',
            ),
            16 => 
            array (
                'id' => 34,
                'title' => NULL,
                'description' => 'We are currently looking for skilled Formwork Carpenters to join our team. 

Our business is growing, and we need form-workers immediately. If you want to join a young company to grow your knowledge of forming up Melbournes best concrete structures, we want to hear from you.

Our projects extend across greater Melbourne.

To eligible you must have the following:
- 4+ years carpentry experience, preferably in formwork
- Basic power tools
- Driver licence 
- Motivation to learn and work autonomously
- Interpert construction drawings',
                'about' => 'We have over 15 live projects, all of which are based in greater Melbourne',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '40',
                'salary_type' => NULL,
                'project_size' => '800,000',
                'reports_to_json' => '["Project Manager"]',
                'location' => 'Melbourne',
                'params' => NULL,
                'company_id' => 10,
                'job_role_id' => 30,
                'is_template' => 1,
                'created_by' => 28,
                'created_at' => '2019-10-14 11:33:36',
                'updated_at' => '2019-10-14 11:33:36',
                'status' => 1,
                'template_name' => 'Formwork Carpenter',
                'template_id' => NULL,
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 35,
                'title' => 'Carpenter / Formworker',
                'description' => 'We are currently looking for skilled Formwork Carpenters to join our team. 

Our business is growing, and we need form-workers immediately. If you want to join a young company to grow your knowledge of forming up Melbournes best concrete structures, we want to hear from you.

Our projects extend across greater Melbourne.

To eligible you must have the following:
- 4+ years carpentry experience, preferably in formwork
- Basic power tools
- Driver licence 
- Motivation to learn and work autonomously
- Interpert construction drawings',
                'about' => 'We have over 15 live projects, all of which are based in greater Melbourne',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '40',
                'salary_type' => NULL,
                'project_size' => '800,000',
                'reports_to_json' => '["Project Manager"]',
                'location' => 'Melbourne',
                'params' => NULL,
                'company_id' => 10,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 28,
                'created_at' => '2019-10-14 11:45:28',
                'updated_at' => '2020-02-13 19:31:41',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2020-02-13 19:31:41',
            ),
            18 => 
            array (
                'id' => 36,
                'title' => 'Builder Labourer',
                'description' => 'We are currently in search of a skilled builders labourer to join our young team. If your a fit individual with experience in the game submit your profile 

Essential Criteria:
- fit & able to carry out labouring task, such as heavy lifting
- experience and initiative with various labouring tasks
- ability to work autonomously 
- valid drivers licence   
- white card
- PPE (personal protective equipment eg. steel cap boots etc)',
                'about' => 'Various sized projects',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Part-Time',
                'salary' => '0',
                'salary_type' => NULL,
                'project_size' => '0',
                'reports_to_json' => '["Construction Foreman"]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 11,
                'job_role_id' => NULL,
                'is_template' => 1,
                'created_by' => 29,
                'created_at' => '2019-10-14 12:33:53',
                'updated_at' => '2020-06-19 01:59:35',
                'status' => 0,
                'template_name' => 'Labouring Job',
                'template_id' => NULL,
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 37,
                'title' => 'Builders Labourer',
                'description' => 'We are currently in search of a skilled builders labourer to join our young team. If your a fit individual with experience in the game submit your profile 

Essential Criteria:
- fit & able to carry out labouring task, such as heavy lifting
- experience and initiative with various labouring tasks
- ability to work autonomously 
- valid drivers licence   
- white card
- PPE (personal protective equipment eg. steel cap boots etc)',
                'about' => 'Various sized projects',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Part-Time',
                'salary' => NULL,
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => '["Construction Foreman"]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 11,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 29,
                'created_at' => '2019-10-18 00:31:25',
                'updated_at' => '2020-02-13 19:31:50',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2020-02-13 19:31:50',
            ),
            20 => 
            array (
                'id' => 38,
                'title' => 'Tester',
                'description' => 'Someone with an eye for detail and a lot of patience',
                'about' => 'Development of a digital marketplace for construction recruitment',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Fixed-Term',
                'salary' => '0',
                'salary_type' => NULL,
                'project_size' => '250,000',
                'reports_to_json' => '["Founders"]',
                'location' => 'St Kilda, Victoria, Australia',
                'params' => NULL,
                'company_id' => 18,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 222,
                'created_at' => '2019-10-18 00:46:58',
                'updated_at' => '2019-10-20 23:30:22',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2019-10-20 23:30:22',
            ),
            21 => 
            array (
                'id' => 39,
                'title' => 'Tester',
                'description' => 'Someone with an eye for detail and a lot of patience',
                'about' => 'Development of a digital marketplace for construction recruitment',
                'exp_level' => 'Intermediate',
                'contract_type' => 'Fixed-Term',
                'salary' => NULL,
                'salary_type' => NULL,
                'project_size' => '250,000',
                'reports_to_json' => '["Founders"]',
                'location' => 'St Kilda, Victoria, Australia',
                'params' => NULL,
                'company_id' => 18,
                'job_role_id' => NULL,
                'is_template' => 1,
                'created_by' => 222,
                'created_at' => '2019-10-18 00:47:21',
                'updated_at' => '2019-10-18 00:47:21',
                'status' => 1,
                'template_name' => 'Tester',
                'template_id' => NULL,
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 40,
                'title' => NULL,
                'description' => 'RAW/CON is looking for a qualified Carpenter to join our team. 

We are based on the Mornington Peninsula and operate from Sorrento to Melbourne. Most of our work is High End Residential. We\'re a young company with great ambition, if you think your a fit for us please submit your application. 

Requirements: 
- Driver License 
- Extensive Power Tools 
- Hard Working Attitude 
- Must be Qualified Carpenter',
                'about' => 'We work on various size projects from deck builds to high end residential jobs valued over $5M',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '68',
                'salary_type' => NULL,
                'project_size' => '5,600,000',
                'reports_to_json' => '["Director"]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 13,
                'job_role_id' => 7,
                'is_template' => 1,
                'created_by' => 31,
                'created_at' => '2019-10-18 01:06:08',
                'updated_at' => '2020-05-25 03:26:40',
                'status' => 0,
                'template_name' => 'Carpenter',
                'template_id' => NULL,
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 41,
                'title' => 'Carpenter',
                'description' => 'RAW/CON is looking for a qualified Carpenter to join our team. 

We are based on the Mornington Peninsula and operate from Sorrento to Melbourne. Most of our work is High End Residential. We\'re a young company with great ambition, if you think your a fit for us please submit your application. 

Requirements: 
- Driver License 
- Extensive Power Tools 
- Hard Working Attitude 
- Must be Qualified Carpenter',
                'about' => 'We work on various size projects from deck builds to high end residential jobs valued over $5M',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '68',
                'salary_type' => NULL,
                'project_size' => '5,600,000',
                'reports_to_json' => '["Director"]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 13,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 31,
                'created_at' => '2019-10-18 01:07:14',
                'updated_at' => '2020-02-13 19:32:00',
                'status' => 1,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2020-02-13 19:32:00',
            ),
            24 => 
            array (
                'id' => 42,
                'title' => 'Builder Labourer',
                'description' => 'The Tempo Group is looking for a hard working labourer to join the team and assist with site cleaning, assisting other trades, helping unload delivery trucks.',
                'about' => 'Various size projects in Melbourne',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '30',
                'salary_type' => NULL,
                'project_size' => '0',
                'reports_to_json' => '["Site Manager"]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 7,
                'job_role_id' => NULL,
                'is_template' => 1,
                'created_by' => 21,
                'created_at' => '2019-10-18 01:17:55',
                'updated_at' => '2020-02-13 06:06:32',
                'status' => 0,
                'template_name' => 'Builder Labourers',
                'template_id' => NULL,
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 43,
                'title' => 'Builder Labourer',
                'description' => 'The Tempo Group is looking for a hard working labourer to join the team and assist with site cleaning, assisting other trades, helping unload delivery trucks.',
                'about' => 'Various size projects in Melbourne',
                'exp_level' => 'Senior',
                'contract_type' => 'Full-Time Permanent',
                'salary' => '30',
                'salary_type' => NULL,
                'project_size' => NULL,
                'reports_to_json' => '["Site Manager"]',
                'location' => 'Melbourne, Victoria, Australia',
                'params' => NULL,
                'company_id' => 7,
                'job_role_id' => NULL,
                'is_template' => 0,
                'created_by' => 21,
                'created_at' => '2019-10-18 01:18:03',
                'updated_at' => '2020-02-13 19:32:07',
                'status' => 0,
                'template_name' => NULL,
                'template_id' => NULL,
                'deleted_at' => '2020-02-13 19:32:07',
            ),
            26 => 
            array (
                'id' => 46,
                'title' => 'Project Manager 2',
                'description' => 'This is a sample

Requirements
1.) ID
2.) Birth Certificate',
        'about' => NULL,
        'exp_level' => 'Entry Level',
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'Fitzroy, Victoria, Australia',
        'params' => '{"min_exp_month":3,"min_exp_year":16}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-03 23:16:44',
        'updated_at' => '2019-11-20 04:31:10',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-11-20 04:31:10',
    ),
    27 => 
    array (
        'id' => 47,
        'title' => 'Airport Construction',
        'description' => 'We are going to build an Airport in SimCity',
        'about' => 'Very expensive.',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Full-time Fixed term',
        'salary' => '34',
        'salary_type' => 'Salary',
        'project_size' => '9,999,999,999',
        'reports_to_json' => '["Master Carpenter"]',
    'location' => 'Sydney Airport (SYD), Mascot, 2020, Sydney, New South Wales',
        'params' => '{"min_exp_month":3,"min_exp_year":50}',
        'company_id' => 21,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 279,
        'created_at' => '2019-11-19 13:36:49',
        'updated_at' => '2019-12-08 16:29:15',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-08 16:29:15',
    ),
    28 => 
    array (
        'id' => 52,
        'title' => NULL,
        'description' => 'Maintain tracks 24/7',
        'about' => 'Maintain',
        'exp_level' => '4 Years +++',
        'contract_type' => 'Hourly Rate',
        'salary' => '40',
        'salary_type' => 'Salary',
        'project_size' => '10,000',
        'reports_to_json' => '["Track Maintainers"]',
        'location' => 'Adey Court, Leeming, 6149, Perth, Western Australia',
        'params' => '{"min_exp_month":1,"min_exp_year":19}',
        'company_id' => 1,
        'job_role_id' => 29,
        'is_template' => 1,
        'created_by' => 2,
        'created_at' => '2019-11-19 15:28:08',
        'updated_at' => '2019-11-20 00:44:31',
        'status' => 1,
        'template_name' => 'Track Maintainer',
        'template_id' => NULL,
        'deleted_at' => '2019-11-20 00:44:31',
    ),
    29 => 
    array (
        'id' => 53,
        'title' => NULL,
        'description' => 'Maintain tracks 24/7',
        'about' => 'Maintain',
        'exp_level' => '4 Years +++',
        'contract_type' => 'Hourly Rate',
        'salary' => '40',
        'salary_type' => 'Salary',
        'project_size' => '10,000',
        'reports_to_json' => '["Track Maintainers"]',
        'location' => 'Adey Court, Leeming, 6149, Perth, Western Australia',
        'params' => '{"min_exp_month":1,"min_exp_year":19}',
        'company_id' => 1,
        'job_role_id' => 29,
        'is_template' => 1,
        'created_by' => 2,
        'created_at' => '2019-11-19 15:32:57',
        'updated_at' => '2019-11-19 15:40:31',
        'status' => 1,
        'template_name' => 'Track Maintainer',
        'template_id' => 52,
        'deleted_at' => '2019-11-19 15:40:31',
    ),
    30 => 
    array (
        'id' => 54,
        'title' => 'Track Maintainings',
        'description' => 'Maintain tracks 24/7',
        'about' => 'Maintain',
        'exp_level' => '4 Years +++',
        'contract_type' => 'Hourly Rate',
        'salary' => '40',
        'salary_type' => 'Salary',
        'project_size' => '10,000',
        'reports_to_json' => '["Track Maintainers"]',
        'location' => 'Adey Court, Leeming, 6149, Perth, Western Australia',
        'params' => '{"min_exp_month":1,"min_exp_year":19}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-19 15:34:11',
        'updated_at' => '2019-11-19 15:39:12',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => 52,
        'deleted_at' => '2019-11-19 15:39:12',
    ),
    31 => 
    array (
        'id' => 55,
        'title' => 'Track Maintainers',
        'description' => 'Maintain tracks 24/7',
        'about' => 'Maintain',
        'exp_level' => '4 Years +++',
        'contract_type' => 'Hourly Rate',
        'salary' => '40',
        'salary_type' => 'Salary',
        'project_size' => '10,000',
        'reports_to_json' => '["Track Maintainers"]',
        'location' => 'Adey Court, Leeming, 6149, Perth, Western Australia',
        'params' => '{"min_exp_month":1,"min_exp_year":19}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-19 16:09:12',
        'updated_at' => '2019-12-03 02:19:57',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-03 02:19:57',
    ),
    32 => 
    array (
        'id' => 56,
        'title' => 'Track Maintainers',
        'description' => 'Maintain tracks 24/7',
        'about' => 'Maintain',
        'exp_level' => '4 Years +++',
        'contract_type' => 'Hourly Rate',
        'salary' => '40',
        'salary_type' => 'Salary',
        'project_size' => '10,000',
        'reports_to_json' => '["Track Maintainers"]',
        'location' => 'Adey Court, Leeming, 6149, Perth, Western Australia',
        'params' => '{"min_exp_month":1,"min_exp_year":19}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-19 16:37:40',
        'updated_at' => '2019-12-19 04:39:55',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-19 04:39:55',
    ),
    33 => 
    array (
        'id' => 58,
        'title' => 'Web Designer',
        'description' => 'If you’re interested in [tech sales] and enjoy [talking to customers over the phone, via email and in-person] we’d like to meet you! We offer a vibrant workplace with [free meals and snacks], as well as a [generous vacation plan and a flexible work schedule].',
        'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Full-time Fixed term',
        'salary' => '33,000',
        'salary_type' => 'Salary',
        'project_size' => '40,000',
        'reports_to_json' => NULL,
        'location' => 'Devonport Airport, Wesley Vale, 7307, Tasmania',
        'params' => '{"min_exp_month":2,"min_exp_year":3}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-20 00:52:32',
        'updated_at' => '2019-12-19 04:39:55',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-19 04:39:55',
    ),
    34 => 
    array (
        'id' => 60,
        'title' => 'Sample',
        'description' => 'This is a sample',
        'about' => NULL,
        'exp_level' => 'Entry Level',
        'contract_type' => 'Hourly Rate',
        'salary' => '21',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '[]',
    'location' => 'Sydney Airport (SYD), Mascot, 2020, Sydney, New South Wales',
        'params' => NULL,
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-20 04:33:36',
        'updated_at' => '2019-11-20 04:33:54',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-11-20 04:33:54',
    ),
    35 => 
    array (
        'id' => 61,
        'title' => 'Sample 1',
        'description' => 'This is a sample',
        'about' => NULL,
        'exp_level' => 'Entry Level',
        'contract_type' => 'Hourly Rate',
        'salary' => '21',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
    'location' => 'Sydney Airport (SYD), Mascot, 2020, Sydney, New South Wales',
        'params' => NULL,
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-11-20 04:33:45',
        'updated_at' => '2019-12-19 04:39:55',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-19 04:39:55',
    ),
    36 => 
    array (
        'id' => 63,
        'title' => 'test job',
        'description' => 'Test jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest job',
        'about' => 'Test jobTest jobTest jobTest jobTest jobTest jobTest jobTest jobTest job',
        'exp_level' => 'Senior',
        'contract_type' => 'Full-time Fixed term',
        'salary' => '23,444',
        'salary_type' => 'Salary',
        'project_size' => '234,444',
        'reports_to_json' => '["Project Manager"]',
        'location' => 'Crown Entertainment Complex, Southbank, 3006, Melbourne, Victoria',
        'params' => '{"min_exp_month":8,"min_exp_year":17}',
        'company_id' => 24,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 291,
        'created_at' => '2019-11-20 20:17:17',
        'updated_at' => '2019-12-19 04:40:09',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-19 04:40:09',
    ),
    37 => 
    array (
        'id' => 64,
        'title' => NULL,
        'description' => 'dfdsf',
        'about' => 'fdsfsdf',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Full-time Fixed term',
        'salary' => '344',
        'salary_type' => 'Salary',
        'project_size' => '0',
        'reports_to_json' => '["Multi-Skilled Plant Operators"]',
        'location' => 'Qwyarigo Road, Lanitza, 2460, New South Wales',
        'params' => '{"min_exp_month":3,"min_exp_year":16}',
        'company_id' => 25,
        'job_role_id' => 112,
        'is_template' => 0,
        'created_by' => 294,
        'created_at' => '2019-11-21 15:27:36',
        'updated_at' => '2020-01-04 01:33:23',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-01-04 01:33:23',
    ),
    38 => 
    array (
        'id' => 67,
        'title' => 'job1',
        'description' => 'sdhfdsfh dsuihufihdsuf isdhufh',
        'about' => 'hifdsuhfidsiuf iudshifuhisdh',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Full-time Permanent',
        'salary' => '34,342',
        'salary_type' => 'Salary',
        'project_size' => '23,232',
        'reports_to_json' => '["dfgfdg"]',
        'location' => 'gdfgdfg',
        'params' => NULL,
        'company_id' => 25,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 294,
        'created_at' => '2019-11-22 05:50:41',
        'updated_at' => '2020-01-04 01:33:10',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-01-04 01:33:10',
    ),
    39 => 
    array (
        'id' => 70,
        'title' => NULL,
        'description' => 'Moon BG is looking for a undergraduate CA who is willing to learn the Residential Market. 

Are you currently studying but want a foot in the door to your career in construction?

This might suit you!',
        'about' => 'We have a position opening in our office to serve as our CA on multiple projects',
        'exp_level' => 'Junior',
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => '0',
        'reports_to_json' => '["Director"]',
    'location' => 'Melbourne Airport (MEL), Melbourne Airport, 3045, Melbourne, Victoria',
        'params' => NULL,
        'company_id' => 11,
        'job_role_id' => 111,
        'is_template' => 0,
        'created_by' => 29,
        'created_at' => '2019-11-22 12:35:59',
        'updated_at' => '2020-01-04 01:33:32',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-01-04 01:33:32',
    ),
    40 => 
    array (
        'id' => 71,
        'title' => 'Builder Labourer',
        'description' => 'We are currently in search of a skilled builders labourer to join our young team. If your a fit individual with experience in the game submit your profile 

Essential Criteria:
- fit & able to carry out labouring task, such as heavy lifting
- experience and initiative with various labouring tasks
- ability to work autonomously 
- valid drivers licence   
- white card
- PPE (personal protective equipment eg. steel cap boots etc)',
        'about' => 'Various sized projects',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Part-Time',
        'salary' => '0',
        'salary_type' => NULL,
        'project_size' => '0',
        'reports_to_json' => '["Construction Foreman"]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 11,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 29,
        'created_at' => '2019-11-22 12:43:46',
        'updated_at' => '2019-11-22 12:43:52',
        'status' => 1,
        'template_name' => 'Labouring Job',
        'template_id' => 36,
        'deleted_at' => '2019-11-22 12:43:52',
    ),
    41 => 
    array (
        'id' => 72,
        'title' => NULL,
        'description' => 'Job description',
        'about' => 'About the project',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Full-time Fixed term',
        'salary' => '12,000',
        'salary_type' => 'Salary',
        'project_size' => '12,300',
        'reports_to_json' => '["Chief Construction Officer"]',
        'location' => 'Sydney Opera House, Sydney, 2000, Sydney, New South Wales',
        'params' => '{"min_exp_month":3,"min_exp_year":3}',
        'company_id' => 26,
        'job_role_id' => 182,
        'is_template' => 0,
        'created_by' => 297,
        'created_at' => '2019-11-26 10:36:35',
        'updated_at' => '2020-01-04 01:33:48',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-01-04 01:33:48',
    ),
    42 => 
    array (
        'id' => 73,
        'title' => 'Gardener',
        'description' => 'Test',
        'about' => 'Test',
        'exp_level' => 'DD++',
        'contract_type' => 'Full-time Fixed term',
        'salary' => '56,000',
        'salary_type' => 'Salary',
        'project_size' => '1,000',
        'reports_to_json' => '["House Owner"]',
        'location' => 'Wales Street, Margate, 4019, Brisbane, Queensland',
        'params' => '{"min_exp_month":4,"min_exp_year":2}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-12-03 02:36:17',
        'updated_at' => '2019-12-19 04:39:55',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-19 04:39:55',
    ),
    43 => 
    array (
        'id' => 74,
        'title' => 'Maintenance Supervisor',
        'description' => 'Looking for an experienced supervisor',
        'about' => NULL,
        'exp_level' => '2 years',
        'contract_type' => 'Full-time Permanent',
        'salary' => '15,000',
        'salary_type' => NULL,
        'project_size' => '1,000',
        'reports_to_json' => '[]',
        'location' => 'Weipa Airport, Weipa Airport, 4874, Queensland',
        'params' => '{"min_exp_month":4,"min_exp_year":7}',
        'company_id' => 1,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 2,
        'created_at' => '2019-12-16 01:19:04',
        'updated_at' => '2019-12-19 04:39:55',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2019-12-19 04:39:55',
    ),
    44 => 
    array (
        'id' => 75,
        'title' => 'Test Job',
        'description' => 'Test Job',
        'about' => 'Test Job',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Full-time Permanent',
        'salary' => '500',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Managing Director"]',
        'location' => 'Melbourne, Victoria',
        'params' => NULL,
        'company_id' => 28,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 306,
        'created_at' => '2020-01-07 18:24:09',
        'updated_at' => '2020-02-10 08:30:12',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-02-10 08:30:12',
    ),
    45 => 
    array (
        'id' => 79,
        'title' => 'Commercial Labourer',
        'description' => 'We are in need of a switched on labourer, who has ideally done a stint on commercial sites and understands the nuances. 

The project is a fitout and is due to run for the next couple of months.

To eligible you must have:
- White Card
- Drivers Licence
- Physically Able  
- Experience in Commercial Labouring',
        'about' => 'Fit out of a Cinema in Clayton,',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Casual',
        'salary' => '35',
        'salary_type' => 'Salary',
        'project_size' => '7,500,000',
        'reports_to_json' => '["Construction Manager","Site Manager"]',
        'location' => 'Clayton, Victoria, Australia',
        'params' => '{"min_exp_month":5}',
        'company_id' => 7,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 21,
        'created_at' => '2020-02-13 06:13:20',
        'updated_at' => '2020-07-02 00:37:37',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-02 00:37:37',
    ),
    46 => 
    array (
        'id' => 80,
        'title' => 'Carpenter / Formworker',
        'description' => 'We are currently looking for skilled Formwork Carpenters to join our team. 

Our business is growing, and we need form-workers immediately. If you want to join a young company to grow your knowledge of forming up Melbournes best concrete structures, we want to hear from you.

Our projects extend across greater Melbourne.

To eligible you must have the following:
- 2+ years carpentry experience, preferably in formwork
- Basic power tools
- Driver licence 
- Motivation to learn and work autonomously
- Interpert construction drawings',
        'about' => 'We have multiple projects across Melbourne',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Full-time Permanent',
        'salary' => '40',
        'salary_type' => NULL,
        'project_size' => '800,000',
        'reports_to_json' => '["Project Manager"]',
        'location' => 'Melbourne',
        'params' => '{"min_exp_year":2}',
        'company_id' => 10,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 28,
        'created_at' => '2020-02-13 19:34:17',
        'updated_at' => '2020-07-02 00:37:46',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-02 00:37:46',
    ),
    47 => 
    array (
        'id' => 81,
        'title' => 'Test',
        'description' => 'Test',
        'about' => 'Test',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Part-Time',
        'salary' => '12,333',
        'salary_type' => 'Salary',
        'project_size' => '123,456',
        'reports_to_json' => '[]',
        'location' => 'Narre Warren, Victoria, Australia',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-02-16 23:32:42',
        'updated_at' => '2020-02-22 00:28:53',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-02-22 00:28:53',
    ),
    48 => 
    array (
        'id' => 82,
        'title' => 'Test',
        'description' => 'Test',
        'about' => 'Test',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Part-Time',
        'salary' => '12,333',
        'salary_type' => 'Salary',
        'project_size' => '123,456',
        'reports_to_json' => '[]',
        'location' => 'Narre Warren, Victoria, Australia',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-02-16 23:32:57',
        'updated_at' => '2020-02-22 00:28:48',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-02-22 00:28:48',
    ),
    49 => 
    array (
        'id' => 83,
        'title' => 'Estimator Assistant - part time',
        'description' => 'We are looking for an Estimating Assistant.

This role would suit a Quantity Surveying or Construction Management Student who can work part-time (2-3 days per week).  A completed qualification is NOT necessary for this position.
Some responsibilities would include:
o Assist Estimators in preparing tender quotations
o Take off & measure quantities
o Liaise with Contractors and Suppliers regarding pricing & quotations
o Vetting Trades

*salary is pro-rata of $40,000pa',
        'about' => 'We specialise in building unique, innovative and high-impact design projects.',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Part-Time',
        'salary' => '40,000',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Cost Planner \\/ Estimator"]',
        'location' => 'Richmond',
        'params' => '{"min_exp_month":1}',
        'company_id' => 30,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 368,
        'created_at' => '2020-02-20 12:54:59',
        'updated_at' => '2020-07-02 00:37:15',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-02 00:37:15',
    ),
    50 => 
    array (
        'id' => 84,
        'title' => 'Concrete Repair Technician',
        'description' => 'We are seeking qualified Trades People with solid Construction experience and demonstrated knowledge in Remediation and Restoration methods, in both medium and large scale projects.

You will demonstrate your understanding, experience and qualifications in concrete repair and remediation. Applicants that show strong skills/ backgrounds in other construction work are highly considered.

All applicants must undergo a medical check prior to employment.

Competitive Industry rates paid based on level of experience and qualifications.',
        'about' => 'You will be working across multiple projects throughout Australia.',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Supervisor"]',
        'location' => 'Keysborough, Victoria, Australia',
        'params' => '{"min_exp_year":2}',
        'company_id' => 31,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 387,
        'created_at' => '2020-02-22 01:05:01',
        'updated_at' => '2020-02-22 01:05:01',
        'status' => 1,
        'template_name' => 'Concrete Repair Tech',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    51 => 
    array (
        'id' => 85,
        'title' => 'Concrete Repair Technician',
        'description' => 'We are seeking qualified Trades People with solid Construction experience and demonstrated knowledge in Remediation and Restoration methods, in both medium and large scale projects.

You will demonstrate your understanding, experience and qualifications in concrete repair and remediation. Applicants that show strong skills/ backgrounds in other construction work are highly considered.

All applicants must undergo a medical check prior to employment.

Competitive Industry rates paid based on level of experience and qualifications.',
        'about' => 'You will be working across multiple projects throughout Australia.',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Part-Time',
        'salary' => '40',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Supervisor"]',
        'location' => 'Keysborough, Victoria, Australia',
        'params' => '{"min_exp_year":2}',
        'company_id' => 31,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 387,
        'created_at' => '2020-02-22 01:09:21',
        'updated_at' => '2020-07-02 00:37:53',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-02 00:37:53',
    ),
    52 => 
    array (
        'id' => 86,
        'title' => 'Test',
        'description' => 'Test',
        'about' => NULL,
        'exp_level' => 'Entry Level',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '[]',
        'location' => 'Narre Warren, Victoria, Australia',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-02-24 02:39:16',
        'updated_at' => '2020-04-12 03:08:18',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-04-12 03:08:18',
    ),
    53 => 
    array (
        'id' => 87,
        'title' => 'General Labourer',
        'description' => 'Build Labour is expanding their team to include labour hire services across Melbourne. 

If you\'ve got experience in General Labouring and want to join our team apply here.',
        'about' => 'Multiple opportunities across Melbourne in residential, commercial and civil projects',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Casual',
        'salary' => '27',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Build Labour Officer"]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 34,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 590,
        'created_at' => '2020-04-30 03:12:56',
        'updated_at' => '2020-05-21 01:53:44',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    54 => 
    array (
        'id' => 88,
    'title' => 'Certificate IV in Building Construction (Building) (CPC40110)',
        'description' => 'If you are an aspiring or working tradesperson, our building and construction certificates are your foundation for success.

This is your first step towards starting your own building business and preparing for the builders registration. We understand that you could be a busy tradie by day, that’s why this course offers greater flexibility in terms of how you would like to pursue this course. Utilising both physical and virtual classroom environments, we’re able to offer our CPC40110 Certificate IV in Building and Construction online in classrooms all across Victoria and throughout Australia through our unique virtual classroom training software.

Regardless of whether you’re in Melbourne or elsewhere in Australia, many of our building and construction certificates have been made straightforward and accessible for all with live lectures through our virtual classroom.',
        'about' => NULL,
        'exp_level' => 'Entry Level',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 36,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 595,
        'created_at' => '2020-05-14 01:11:28',
        'updated_at' => '2020-07-02 00:37:59',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-02 00:37:59',
    ),
    55 => 
    array (
        'id' => 89,
        'title' => NULL,
        'description' => 'We are looking for a fully qualified bricklayer to join our team. 

Majority of our work is in high end residential and low rise commercial construction. 

To be considered for this position you must have the following: 
- Trade Qualifications or minimum of 3 years experience on the tools   
- White Card
- Vehicle/ Transport to site 
- Valid licence 

JMW Masonry is young hard working team who take pride in their work',
        'about' => 'Multiple high end residential and commercial project across Melbourne and Bayside area',
        'exp_level' => 'Qualified',
        'contract_type' => 'Hourly Rate',
        'salary' => '50',
        'salary_type' => 'Salary',
        'project_size' => '2,000,000',
        'reports_to_json' => '["JMW Site Supervisor"]',
        'location' => 'Brighton, Victoria, Australia',
        'params' => '{"min_exp_year":3}',
        'company_id' => 37,
        'job_role_id' => 28,
        'is_template' => 1,
        'created_by' => 600,
        'created_at' => '2020-05-25 02:24:41',
        'updated_at' => '2020-05-25 02:24:41',
        'status' => 1,
        'template_name' => 'Bricklayer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    56 => 
    array (
        'id' => 90,
        'title' => 'Bricklayer',
        'description' => 'We are looking for a fully qualified bricklayer to join our team. 

Majority of our work is in high end residential and low rise commercial construction. 

To be considered for this position you must have the following: 
- Trade Qualifications or minimum of 3 years experience on the tools   
- White Card
- Vehicle/ Transport to site 
- Valid licence 

JMW Masonry is young hard working team who take pride in their work',
        'about' => 'Multiple high end residential and commercial project across Melbourne and Bayside area',
        'exp_level' => 'Qualified',
        'contract_type' => 'Hourly Rate',
        'salary' => '50',
        'salary_type' => 'Salary',
        'project_size' => '2,000,000',
        'reports_to_json' => '["JMW Site Supervisor"]',
        'location' => 'Brighton, Victoria, Australia',
        'params' => '{"min_exp_year":3}',
        'company_id' => 37,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 600,
        'created_at' => '2020-05-25 02:25:00',
        'updated_at' => '2020-05-25 02:25:00',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    57 => 
    array (
        'id' => 91,
        'title' => 'Brickies Labourer',
        'description' => 'We are looking for multiple labourers to join our team. 

To be considered for this position you must have the following: 
- Experience working as a brickies labourer or similar labouring work 
- White Card
- Vehicle/ Transport to site 
- Valid licence 

JMW Masonry is young hard working team who take pride in their work',
        'about' => 'Multiple high end residential and commercial projects across Melbourne and Bayside',
        'exp_level' => 'Labourer',
        'contract_type' => 'Hourly Rate',
        'salary' => '35',
        'salary_type' => 'Salary',
        'project_size' => '2,000,000',
        'reports_to_json' => '["JMW Bricklayers"]',
        'location' => 'Brighton, Victoria, Australia',
        'params' => '{"min_exp_month":2}',
        'company_id' => 37,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 600,
        'created_at' => '2020-05-25 02:40:58',
        'updated_at' => '2020-05-25 02:40:58',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    58 => 
    array (
        'id' => 92,
        'title' => 'Brickies Labourer',
        'description' => 'We are looking for multiple labourers to join our team. 

To be considered for this position you must have the following: 
- Experience working as a brickies labourer or similar labouring work 
- White Card
- Vehicle/ Transport to site 
- Valid licence 

JMW Masonry is young hard working team who take pride in their work',
        'about' => 'Multiple high end residential and commercial projects across Melbourne and Bayside',
        'exp_level' => 'Labourer',
        'contract_type' => 'Hourly Rate',
        'salary' => '35',
        'salary_type' => 'Salary',
        'project_size' => '2,000,000',
        'reports_to_json' => '["JMW Bricklayers"]',
        'location' => 'Brighton, Victoria, Australia',
        'params' => '{"min_exp_month":2}',
        'company_id' => 37,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 600,
        'created_at' => '2020-05-25 02:41:21',
        'updated_at' => '2020-05-25 02:41:21',
        'status' => 1,
        'template_name' => 'Brickies Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    59 => 
    array (
        'id' => 93,
        'title' => 'Carpenter',
        'description' => 'RAW/CON is looking for a qualified Carpenter to join our team. 

We are based on the Mornington Peninsula and operate from Sorrento to Melbourne. Most of our work is High End Residential. We\'re a young company with great ambition, if you think your a fit for us please submit your application. 

Requirements: 
- Driver License 
- Extensive Power Tools 
- Hard Working Attitude 
- Must be Qualified Carpenter',
        'about' => 'Multiple projects from Melbourne to Sorrento',
        'exp_level' => 'Senior',
        'contract_type' => 'Hourly Rate',
        'salary' => '68',
        'salary_type' => NULL,
        'project_size' => '2,200,000',
        'reports_to_json' => '["Rawcon Site Supervisor"]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => '{"min_exp_year":4}',
        'company_id' => 13,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 31,
        'created_at' => '2020-05-25 03:24:37',
        'updated_at' => '2020-05-25 03:24:37',
        'status' => 1,
        'template_name' => 'Carpenter',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    60 => 
    array (
        'id' => 95,
        'title' => NULL,
        'description' => 'RAW/CON is looking for a qualified Carpenter to join our team. 

We are based on the Mornington Peninsula and operate from Sorrento to Melbourne. Most of our work is High End Residential. We\'re a young company with great ambition, if you think your a fit for us please submit your application. 

Requirements: 
- Driver License 
- Extensive Power Tools 
- Hard Working Attitude 
- Must be Qualified Carpenter',
        'about' => 'Multiple high end residential projects from Melbourne to Sorrento',
        'exp_level' => 'Qualified',
        'contract_type' => 'Hourly Rate',
        'salary' => '68',
        'salary_type' => 'Salary',
        'project_size' => '2,200,000',
        'reports_to_json' => '["Rawcon Site Supervisor"]',
        'location' => 'Mornington Peninsula, Melbourne, Victoria 3199, Australia',
        'params' => '{"min_exp_year":3}',
        'company_id' => 13,
        'job_role_id' => 7,
        'is_template' => 0,
        'created_by' => 31,
        'created_at' => '2020-05-25 03:32:04',
        'updated_at' => '2020-05-25 03:32:04',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    61 => 
    array (
        'id' => 96,
        'title' => NULL,
        'description' => 'Earth Structures is looking to hire a motivated and hard working individual to join our team. 

To be considered for this position you must show the following skills as basic requirement:
- Knowledge of a residential building sites 
- Ablitiy to be on your feet for the whole day
- Basic knowledge of formwork and concrete materials 
- White Card 
- Driver Licence and Car

Majority of our work is from Melbourne down the Mornington Peninsula.',
        'about' => 'Multiple Projects throughout Melbourne and the Peninsula',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Hourly Rate',
        'salary' => '35',
        'salary_type' => 'Salary',
        'project_size' => '2,000,000',
        'reports_to_json' => '["Earth Structures Foreman"]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 39,
        'job_role_id' => 121,
        'is_template' => 0,
        'created_by' => 611,
        'created_at' => '2020-06-04 23:30:15',
        'updated_at' => '2020-06-04 23:30:15',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    62 => 
    array (
        'id' => 97,
    'title' => 'Labourer (concrete polisher)',
        'description' => 'We are looking to hire a labourer/ concrete polisher to join our team. 

What are we looking for?
- Individuals who are hardworking and are eager to learn the trade
- Basic site experience on residential building sites
- Theirs own transport to the factory or job sites 
- Knowledge of concrete placement, Finishing and polishing process (not essential) 

The bulk of our work is in Melbourne and the surrounding suburbs, if you think you\'ve got what it takes apply to day!',
        'about' => 'Multiple projects across Melbourne',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Hourly Rate',
        'salary' => '35',
        'salary_type' => 'Salary',
        'project_size' => '1,500,000',
        'reports_to_json' => '["Policrete Supervisor"]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 40,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 612,
        'created_at' => '2020-06-05 00:11:56',
        'updated_at' => '2020-06-05 00:11:56',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    63 => 
    array (
        'id' => 98,
        'title' => 'Labourer',
        'description' => 'We are currently in search of a skilled builders labourer to join our young team. If your a fit individual with experience in the game submit your profile 

Essential Criteria:
- fit & able to carry out labouring task, such as heavy lifting
- experience and initiative with various labouring tasks
- ability to work autonomously 
- valid drivers licence   
- white card
- PPE (personal protective equipment eg. steel cap boots etc)',
        'about' => 'Various sized projects',
        'exp_level' => 'Intermediate',
        'contract_type' => 'Hourly Rate',
        'salary' => '35',
        'salary_type' => NULL,
        'project_size' => '1,500,000',
        'reports_to_json' => '["Construction Foreman"]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 11,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 29,
        'created_at' => '2020-06-05 00:38:57',
        'updated_at' => '2020-07-02 00:38:29',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-02 00:38:29',
    ),
    64 => 
    array (
        'id' => 99,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
Underpinning and occasional  restumping work, with ad hoc labouring when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job
Red/white work safe card may be required for some worksites

Working With Children certification may be required for some worksites',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 678,
        'created_at' => '2020-06-19 08:48:13',
        'updated_at' => '2020-06-19 08:49:38',
        'status' => 0,
        'template_name' => 'Underpinning Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    65 => 
    array (
        'id' => 100,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
Underpinning and occasional  restumping work, with ad hoc labouring when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job
Red/white work safe card may be required for some worksites

Working With Children certification may be required for some worksites',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 678,
        'created_at' => '2020-06-19 08:49:13',
        'updated_at' => '2020-06-19 08:53:48',
        'status' => 0,
        'template_name' => 'Underpinning Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    66 => 
    array (
        'id' => 101,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
Underpinning and occasional  restumping work, with ad hoc labouring when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job
Red/white work safe card may be required for some worksites

Working With Children certification may be required for some worksites',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 678,
        'created_at' => '2020-06-19 08:53:23',
        'updated_at' => '2020-06-19 09:08:44',
        'status' => 0,
        'template_name' => 'Underpinning Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    67 => 
    array (
        'id' => 102,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
Underpinning and occasional  restumping work, with labouring tasks when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job
Red/white work safe card may be required for some worksites

Working With Children certification may be required for some worksites',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 678,
        'created_at' => '2020-06-19 09:08:28',
        'updated_at' => '2020-06-19 09:08:42',
        'status' => 0,
        'template_name' => 'Underpinning Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    68 => 
    array (
        'id' => 103,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
Underpinning and occasional  restumping work, with labouring tasks when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job
Red/white work safe card may be required for some worksites

Working With Children certification may be required for some worksites',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 678,
        'created_at' => '2020-06-19 09:09:14',
        'updated_at' => '2020-06-19 09:09:14',
        'status' => 1,
        'template_name' => 'Underpinning Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    69 => 
    array (
        'id' => 104,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
Underpinning and occasional  restumping work, with labouring tasks when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job

Red/white work safe card may be required for some worksites

Working With Children certification may be required for some worksites',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 1,
        'created_by' => 678,
        'created_at' => '2020-06-19 09:10:19',
        'updated_at' => '2020-06-19 09:10:36',
        'status' => 0,
        'template_name' => 'Underpinning Labourer',
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    70 => 
    array (
        'id' => 105,
        'title' => 'Underpinning Labourer',
        'description' => 'We require hard working, motivated individual.
For Underpinning and occasional  restumping work, with labouring tasks when required.
Organisational skills and time management are both very important in this job.

Drivers licence and own transport is a must have for this job.

Red/white work safe card may be required for some worksites.

Working With Children certification may be required for some worksites.',
        'about' => 'We work mostly on residential dwellings, and occasional commercial buildings. Our work takes us all over Melbourne.',
        'exp_level' => 'Entry Level to Experienced',
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '["Site Manager"]',
        'location' => 'Knoxfield, Victoria, Australia',
        'params' => NULL,
        'company_id' => 41,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 678,
        'created_at' => '2020-06-21 02:22:07',
        'updated_at' => '2020-06-21 02:24:53',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    71 => 
    array (
        'id' => 106,
        'title' => 'Commercial Carpenter',
        'description' => 'We are looking for a reliable carpenter for our commercial fit out project in Clayton. 

Full time position available for the right applicant.


We are looking to hire carpenters with:

- Keen eye for detail, take pride in their work and have a good work ethic
- Good communication and time management skills
- Willingness to expand their working knowledge and learn all aspects of the industry
- Be responsible for working autonomously and with others to succeed with room to grow within the company
- Hard working and diligent
- Be honest, punctual and reliable

Essential skills and qualifications

- Certificate III in Carpentry
- Their own transport and tool
- Experience in domestic framing, lockup and fix
- Knowledge in reading working drawings and engineering
- Good references
- Current White Card

Work is generally in Melbourne\'s inner south-east suburbs however it may vary

Job Types: Part-Time, Subcontract

Salary: $55.00 to $65.00 /hour (experience dependant)',
        'about' => 'Cinema Fit Out',
        'exp_level' => 'Entry Level',
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '[]',
        'location' => 'Clayton, Victoria, Australia',
        'params' => NULL,
        'company_id' => 43,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 708,
        'created_at' => '2020-06-25 23:41:00',
        'updated_at' => '2020-06-25 23:41:00',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    72 => 
    array (
        'id' => 107,
        'title' => NULL,
        'description' => 'Young carpentry company seeks a new team member

The successful candidate will need to be experienced in working to a high quality and at a fast pace.

We can offer the successful candidate (after the probationary period) a permanent position and an hourly rate which is above the standard award with an opportunity for future job progression within the company.

The Applicant

You will need to have proven experience.

As well as be:

A focused person who takes pride in their work
Have an ability to follow instructions
The ability to work unsupervised
Have leadership qualities
Be pro-active rather than re-active
Have good communication skills
Be reliable and honest
Be punctual
The ability to work alone or in a team environment
Be well-mannered, presentable and professional
Must have own hand and power tools.
‪Job tasks and responsibilities

This role requires the carpenter to perform various carpentry duties which include but not limited to:

Set-outs, Framing, Lockup and Fixes
Ensure all company assets are secure and used safely and competently
General labour and assist with deliveries
Be prepared to complete all aspects of building not limited to carpentry
Required licences and certifications

‪Red or White card
‪Drivers Licence and must have own Vehicle
Knowledge of Workplace, Occupation Health and Safety regulations',
        'about' => NULL,
        'exp_level' => 'Intermediate',
        'contract_type' => 'Sub Contractor',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => '[]',
        'location' => 'Melbourne, Victoria, Australia',
        'params' => NULL,
        'company_id' => 44,
        'job_role_id' => 7,
        'is_template' => 0,
        'created_by' => 710,
        'created_at' => '2020-06-26 05:54:59',
        'updated_at' => '2020-06-26 05:54:59',
        'status' => 1,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => NULL,
    ),
    73 => 
    array (
        'id' => 108,
        'title' => 'Test For Whitecard',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Full-time Permanent',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'narre warren south',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 04:20:10',
        'updated_at' => '2020-07-27 01:51:10',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:51:10',
    ),
    74 => 
    array (
        'id' => 122,
        'title' => 'asd',
        'description' => 'asd',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Casual',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'asd',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 04:43:58',
        'updated_at' => '2020-07-27 01:50:48',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:48',
    ),
    75 => 
    array (
        'id' => 126,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 12:41:07',
        'updated_at' => '2020-07-27 01:49:56',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:49:56',
    ),
    76 => 
    array (
        'id' => 127,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 12:44:05',
        'updated_at' => '2020-07-27 01:49:51',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:49:51',
    ),
    77 => 
    array (
        'id' => 128,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 12:49:14',
        'updated_at' => '2020-07-27 01:49:45',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:49:45',
    ),
    78 => 
    array (
        'id' => 129,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 12:53:39',
        'updated_at' => '2020-07-27 01:49:41',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:49:41',
    ),
    79 => 
    array (
        'id' => 130,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 12:57:45',
        'updated_at' => '2020-07-27 01:50:41',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:41',
    ),
    80 => 
    array (
        'id' => 131,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:01:40',
        'updated_at' => '2020-07-27 01:50:36',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:36',
    ),
    81 => 
    array (
        'id' => 132,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:03:17',
        'updated_at' => '2020-07-27 01:50:30',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:30',
    ),
    82 => 
    array (
        'id' => 133,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:05:47',
        'updated_at' => '2020-07-27 01:50:25',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:25',
    ),
    83 => 
    array (
        'id' => 134,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:08:05',
        'updated_at' => '2020-07-27 01:50:17',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:17',
    ),
    84 => 
    array (
        'id' => 135,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:12:31',
        'updated_at' => '2020-07-27 01:50:12',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:12',
    ),
    85 => 
    array (
        'id' => 136,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:17:26',
        'updated_at' => '2020-07-27 01:50:07',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:07',
    ),
    86 => 
    array (
        'id' => 137,
        'title' => 'Test',
        'description' => 'test',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Part-Time',
        'salary' => NULL,
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'est',
        'params' => NULL,
        'company_id' => 27,
        'job_role_id' => NULL,
        'is_template' => 0,
        'created_by' => 305,
        'created_at' => '2020-07-06 13:19:47',
        'updated_at' => '2020-07-27 01:50:02',
        'status' => 2,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:50:02',
    ),
    87 => 
    array (
        'id' => 138,
        'title' => NULL,
        'description' => 'We need someone to scrape the floor Error re drivers licence question, in comparison view the its says everyones doesn\'t have a valid drivers licence but when you look on their profile they do? see attached screenshots

Error re drivers licence question, in comparison view the its says everyones doesn\'t have a valid drivers licence but when you look on their profile they do? see attached screenshots

Error re drivers licence question, in comparison view the its says everyones doesn\'t have a valid drivers licence but when you look on their profile they do? see attached screenshotsError re drivers licence question, in comparison view the its says everyones doesn\'t have a valid drivers licence but when you look on their profile they do? see attached screenshots',
        'about' => NULL,
        'exp_level' => NULL,
        'contract_type' => 'Full-time Permanent',
        'salary' => '50',
        'salary_type' => 'Salary',
        'project_size' => NULL,
        'reports_to_json' => NULL,
        'location' => 'Melbourne, Victoria, Australia',
        'params' => '{"min_exp_month":6}',
        'company_id' => 43,
        'job_role_id' => 121,
        'is_template' => 0,
        'created_by' => 708,
        'created_at' => '2020-07-07 04:17:37',
        'updated_at' => '2020-07-27 01:51:27',
        'status' => 0,
        'template_name' => NULL,
        'template_id' => NULL,
        'deleted_at' => '2020-07-27 01:51:27',
    ),
));
        
        
    }
}