<?php

use App\Models\Skills\Skill;
use App\Models\Skills\SkillLevel;
use App\Models\Users\UserSkill;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("SET foreign_key_checks=0");
        DB::table('user_skills')->truncate();
        DB::statement("SET foreign_key_checks=1");

        // create default skills

        $skill1 = Skill::create([
           'skill' => 'Quality Control'
        ]);

        $skill2 = Skill::create([
            'skill' => 'Communication Skills'
        ]);

        $skill3 = Skill::create([
            'skill' => 'Example for the odd case it would be two lined'
        ]);

        $skill4 = Skill::create([
            'skill' => 'Can Accept Criticism'
        ]);

        $skill5 = Skill::create([
            'skill' => 'Team'
        ]);

        // 1
        $levels = array(
            ['level' => 'beginner', 'skill_id' => $skill1->id],
            ['level' => 'competent', 'skill_id' => $skill1->id],
            ['level' => 'expert', 'skill_id' => $skill1->id]
        );

        SkillLevel::insert($levels);

        // 2
        $levels = array(
            ['level' => 'beginner', 'skill_id' => $skill2->id],
            ['level' => 'competent', 'skill_id' => $skill2->id],
            ['level' => 'expert', 'skill_id' => $skill2->id]
        );

        SkillLevel::insert($levels);

        // 3
        $levels = array(
            ['level' => '2017', 'skill_id' => $skill3->id]
        );

        SkillLevel::insert($levels);

        // 4
        $levels = array(
            ['level' => 'beginner', 'skill_id' => $skill4->id],
            ['level' => 'competent', 'skill_id' => $skill4->id],
            ['level' => 'expert', 'skill_id' => $skill4->id]
        );

        SkillLevel::insert($levels);

        // 5
        $levels = array(
            ['level' => 'beginner', 'skill_id' => $skill5->id],
            ['level' => 'competent', 'skill_id' => $skill5->id],
            ['level' => 'expert', 'skill_id' => $skill5->id]
        );

        SkillLevel::insert($levels);


        // get user testemail@test.com

        $user = User::whereEmail('testemail@test.com')->first();

        print_r($skill1->levels->toArray());
        if ($user) {

            UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skill1->id,
                'skill_level_id' => $skill1->levels->toArray()[0]['id']
            ]);

            UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skill2->id,
                'skill_level_id' => $skill2->levels->toArray()[1]['id']
            ]);

            UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skill3->id,
                'skill_level_id' => $skill3->levels->toArray()[0]['id']
            ]);

            UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skill4->id,
                'skill_level_id' => $skill4->levels->toArray()[2]['id']
            ]);

            UserSkill::create([
                'user_id' => $user->id,
                'skill_id' => $skill5->id,
                'skill_level_id' => $skill5->levels->toArray()[2]['id']
            ]);
        }
    }
}
