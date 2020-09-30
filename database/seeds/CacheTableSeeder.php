<?php

use Illuminate\Database\Seeder;

class CacheTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cache')->delete();
        
        \DB::table('cache')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'job_preview',
                'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":"test","description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
                'created_at' => '2019-11-03 23:10:29',
                'updated_at' => '2019-11-03 23:10:29',
            ),
            1 => 
            array (
                'id' => 3,
                'type' => 'job_preview',
            'json_content' => '{"id":"46","is_template":0,"status":1,"template_name":null,"job_role_id":null,"title":"Project Manager 2","description":"This is a sample\\n\\nRequirements\\n1.) ID\\n2.) Birth Certificate","about":null,"project_size":null,"exp_level":"Entry Level","contract_type":"Part-Time","salary":null,"salary_type":"Salary","reports_to":[],"location":"Fitzroy, Victoria, Australia","min_exp_month":3,"min_exp_year":16,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":["Skills1"]},{"title":"Tickets","items":[]}],"responsibilities":[{"id":25,"title":"Formwork Carpentry","items_json":"[\\"Lead and drive a \\\\u201cQuality Built In\\\\u201d culture.\\",\\"Ensure systems and processes are in place to manage quality planning processes and the application of risk management methods.\\"]","job_id":46,"items":["Lead and drive a \\u201cQuality Built In\\u201d culture.","Ensure systems and processes are in place to manage quality planning processes and the application of risk management methods."]}],"isPreview":true}',
            'created_at' => '2019-11-03 23:17:06',
            'updated_at' => '2019-11-03 23:17:06',
        ),
        2 => 
        array (
            'id' => 4,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-11-19 14:57:40',
            'updated_at' => '2019-11-19 14:57:40',
        ),
        3 => 
        array (
            'id' => 5,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-11-19 15:25:04',
            'updated_at' => '2019-11-19 15:25:04',
        ),
        4 => 
        array (
            'id' => 7,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":11,"min_exp_year":9,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-11-20 03:00:09',
            'updated_at' => '2019-11-20 03:00:09',
        ),
        5 => 
        array (
            'id' => 8,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-11-20 08:10:50',
            'updated_at' => '2019-11-20 08:10:50',
        ),
        6 => 
        array (
            'id' => 10,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":"new","job_role_id":2,"title":"Plumber","description":"fdsfs","about":"fsdfsf","project_size":"$342,423.00","exp_level":"Junior","contract_type":"Full-time Fixed term","salary":"$435,345.00","salary_type":"Salary","reports_to":["Quarry Operator"],"location":"gdgdg","min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-11-22 06:18:40',
            'updated_at' => '2019-11-22 06:18:40',
        ),
        7 => 
        array (
            'id' => 11,
            'type' => 'job_preview',
            'json_content' => '{"id":"58","is_template":0,"status":1,"template_name":null,"job_role_id":null,"title":"Web Designer","description":"If you\\u2019re interested in [tech sales] and enjoy [talking to customers over the phone, via email and in-person] we\\u2019d like to meet you! We offer a vibrant workplace with [free meals and snacks], as well as a [generous vacation plan and a flexible work schedule].","about":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley","project_size":"40,000","exp_level":"Intermediate","contract_type":"Full-time Fixed term","salary":"33,000","salary_type":"Salary","reports_to":[],"location":"Devonport Airport, Wesley Vale, 7307, Tasmania","min_exp_month":2,"min_exp_year":3,"requirements":[{"title":"Qualifications","items":[{"course_type":"Construction & Engineer","qualification_level":"Advanced Diploma"}]},{"title":"Skills","items":["UI Design"]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-11-26 20:00:03',
            'updated_at' => '2019-11-26 20:00:03',
        ),
        8 => 
        array (
            'id' => 12,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-12-03 01:51:54',
            'updated_at' => '2019-12-03 01:51:54',
        ),
        9 => 
        array (
            'id' => 13,
            'type' => 'job_preview',
            'json_content' => '{"id":"73","is_template":0,"status":1,"template_name":null,"job_role_id":null,"title":"Gardener","description":"Test","about":"Test","project_size":"1,000","exp_level":"DD++","contract_type":"Full-time Fixed term","salary":"56,000","salary_type":"Salary","reports_to":["House Owner"],"location":"Wales Street, Margate, 4019, Brisbane, Queensland","min_exp_month":4,"min_exp_year":2,"requirements":[{"title":"Qualifications","items":[{"course_type":"Construction & Engineer","qualification_level":"Cert I"}]},{"title":"Skills","items":["Welding"]},{"title":"Tickets","items":[{"id":158,"ticket":"white","description":"white","created_by":29}]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-12-06 10:39:16',
            'updated_at' => '2019-12-06 10:39:16',
        ),
        10 => 
        array (
            'id' => 14,
            'type' => 'job_preview',
            'json_content' => '{"id":"58","is_template":0,"status":1,"template_name":null,"job_role_id":null,"title":"Web Designer","description":"If you\\u2019re interested in [tech sales] and enjoy [talking to customers over the phone, via email and in-person] we\\u2019d like to meet you! We offer a vibrant workplace with [free meals and snacks], as well as a [generous vacation plan and a flexible work schedule].","about":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley","project_size":"40,000","exp_level":"Intermediate","contract_type":"Full-time Fixed term","salary":"33,000","salary_type":"Salary","reports_to":[],"location":"Devonport Airport, Wesley Vale, 7307, Tasmania","min_exp_month":2,"min_exp_year":3,"requirements":[{"title":"Qualifications","items":[{"course_type":"Construction & Engineer","qualification_level":"Advanced Diploma"}]},{"title":"Skills","items":["UI Design"]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2019-12-06 10:40:36',
            'updated_at' => '2019-12-06 10:40:36',
        ),
        11 => 
        array (
            'id' => 15,
            'type' => 'job_preview',
            'json_content' => '{"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":"asdasdas","description":"asdaswww w wwww  www","about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true,"cache_id":"15"}',
            'created_at' => '2020-01-15 23:51:08',
            'updated_at' => '2020-01-15 23:51:17',
        ),
        12 => 
        array (
            'id' => 17,
            'type' => 'job_preview',
            'json_content' => '{"id":"84","is_template":1,"status":1,"template_name":"Concrete Repair Tech","job_role_id":null,"title":"Concrete Repair Technician","description":"We are seeking qualified Trades People with solid Construction experience and demonstrated knowledge in Remediation and Restoration methods, in both medium and large scale projects.\\n\\nYou will demonstrate your understanding, experience and qualifications in concrete repair and remediation. Applicants that show strong skills\\/ backgrounds in other construction work are highly considered.\\n\\nAll applicants must undergo a medical check prior to employment.\\n\\nCompetitive Industry rates paid based on level of experience and qualifications.","about":"You will be working across multiple projects throughout Australia.","project_size":null,"exp_level":"Intermediate","contract_type":"Part-Time","salary":"$40.00","salary_type":"Salary","reports_to":["Site Supervisor"],"location":"Keysborough, Victoria, Australia","min_exp_month":null,"min_exp_year":2,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":["Concrete Finishing","Concrete Reapir & Grouting","Caulking, Concrete Patching","Trowelling Skills","Solid Plastering","Steel Replacement","Rendering"]},{"title":"Tickets","items":[{"id":150,"ticket":"Victorian","description":"Heavy Vehicle Driver License","created_by":177},{"id":null,"ticket":"White","description":"Card"}]}],"responsibilities":[{"id":40,"title":"High Safety Standards","items_json":"[\\"Has experience with high risk work\\"]","job_id":84,"items":["Has experience with high risk work"]}],"isPreview":true}',
            'created_at' => '2020-02-22 01:08:35',
            'updated_at' => '2020-02-22 01:08:35',
        ),
        13 => 
        array (
            'id' => 18,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":28,"title":"Bricklayer","description":"We are looking for a fully qualified bricklayer to join our team. Majority of our work is based in the Bayside area of Melbourne. \\n\\nTo be considered for the role you must the following: \\n- Must have a minimum of 3 years of experience as a fully qualified bricklayer \\n- White Card\\n- Vehicle & Driver Licence\\n\\nJMW Masonry is a hardworking team that takes pride in our work.","about":"Multiple high end residential and low rise commercial project across Melbourne and Bayside area","project_size":"$2,000,000.00","exp_level":"Qualified","contract_type":"Full-time Permanent","salary":"$50.00","salary_type":"Salary","reports_to":[null],"location":"Melbourne","min_exp_month":1,"min_exp_year":3,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":["Re-cut stone and other types of building blocks","Partitions, Arches and other Structures","Erecting and dismantling restricted height scaffolding","Cutting, shaping bricks using machines and hand tools","Must be able to lay at least 500 clean bricks a day"]},{"title":"Tickets","items":[]}],"responsibilities":[{"title":"Bricklayer","items":["500 per day",null]}],"isPreview":true}',
            'created_at' => '2020-05-25 02:15:05',
            'updated_at' => '2020-05-25 02:15:05',
        ),
        14 => 
        array (
            'id' => 19,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2020-05-25 02:16:12',
            'updated_at' => '2020-05-25 02:16:12',
        ),
        15 => 
        array (
            'id' => 21,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":null,"project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2020-06-26 05:47:47',
            'updated_at' => '2020-06-26 05:47:47',
        ),
        16 => 
        array (
            'id' => 22,
            'type' => 'job_preview',
        'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":7,"title":"Carpenter","description":"Young carpentry company looking an extra team member\\n\\nThe successful candidate will need to be experienced in working to a high quality and at a fast pace.\\n\\nWe can offer the successful candidate (after the probationary period) a permanent position and an hourly rate which is above the standard award with an opportunity for future job progression within the company.","about":"You will need to have proven experience, to be considered for this role. \\n\\nAs well as be:\\n- A focused person who takes pride in their work\\n- Have an ability to follow instructions\\n- The ability to work unsupervised\\n- Have leadership qualities\\n- Be pro-active rather than re-active\\n- Have good communication skills\\n- Be reliable and honest\\n- Be punctual\\n- The ability to work alone or in a team environment\\n- Be well-mannered, presentable and professional\\n- Must have own hand and power tools\\n\\nRequired licences and certifications\\n- \\u202aRed or White card\\n\\u202a- Drivers Licence and must have own Vehicle\\n- Knowledge of Workplace, Occupation Health and Safety regulations","project_size":null,"exp_level":null,"contract_type":"Sub Contractor","salary":null,"salary_type":"Salary","reports_to":[null],"location":"Melbourne, Victoria, Australia","min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2020-06-26 05:51:49',
            'updated_at' => '2020-06-26 05:51:49',
        ),
        17 => 
        array (
            'id' => 23,
            'type' => 'job_preview',
            'json_content' => '{"id":null,"is_template":null,"status":null,"template_name":null,"job_role_id":null,"title":null,"description":null,"about":"You will need to have proven experience, to be considered for this role. \\n\\nAs well as be:\\n- A focused person who takes pride in their work\\n- Have an ability to follow instructions\\n- The ability to work unsupervised\\n- Have leadership qualities\\n- Be pro-active rather than re-active\\n- Have good communication skills\\n- Be reliable and honest\\n- Be punctual\\n- The ability to work alone or in a team environment\\n- Be well-mannered, presentable and professional\\n- Must have own hand and power tools\\n\\nRequired licences and certifications\\n- \\u202aRed or White card\\n- Drivers Licence and must have own Vehicle\\n- Knowledge of Workplace, Occupation Health and Safety regulations","project_size":null,"exp_level":null,"contract_type":null,"salary":null,"salary_type":"Salary","reports_to":[null],"location":null,"min_exp_month":null,"min_exp_year":null,"requirements":[{"title":"Qualifications","items":[]},{"title":"Skills","items":[]},{"title":"Tickets","items":[]}],"responsibilities":[],"isPreview":true}',
            'created_at' => '2020-06-26 05:53:35',
            'updated_at' => '2020-06-26 05:53:35',
        ),
    ));
        
        
    }
}