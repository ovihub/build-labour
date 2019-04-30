<?php

namespace App\Repositories;

use App\Models\Users\UserSkill;
use App\Models\Users\WorkerDetail;
use App\User;
use JWTAuth;
use Illuminate\Http\Request;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = User::class;

    public $workerDetail = null;

    public function __construct()
    {
        $this->workerDetail = new WorkerDetail();
    }

    public function saveMainSkill(Request $request) {

        $user = JWTAuth::toUser();

        if ($user->workerDetail) {

            $this->workerDetail = $user->workerDetail;
            $user->workerDetail->isMainSkillUpdate = true;

            if (!$user->workerDetail->store($request)) {

                return false;
            }
        }

        return $request->main_skill;
    }

    public function saveSkills(Request $request) {

        $user = JWTAuth::toUser();

        if ($request->skills) {

            $skills = $request->skills;

            $existingSkills = UserSkill::where('user_id', $user->id)->exists();

            if (!$existingSkills) {

                UserSkill::create([
                    'user_id' => $user->id,
                    'skill_id' => 1,
                    'level_id' => 1
                ]);

                UserSkill::create([
                    'user_id' => $user->id,
                    'skill_id' => 2,
                    'level_id' => 1
                ]);

                UserSkill::create([
                    'user_id' => $user->id,
                    'skill_id' => 3,
                    'level_id' => 1
                ]);

                UserSkill::create([
                    'user_id' => $user->id,
                    'skill_id' => 4,
                    'level_id' => 1
                ]);

                UserSkill::create([
                    'user_id' => $user->id,
                    'skill_id' => 5,
                    'level_id' => 1
                ]);
            }

            foreach ($skills as $skill) {

                $existingSkill = UserSkill::where('user_id', $user->id)->where('skill_id', $skill['skill_id'])->first();

                if ($existingSkill) {

                    $existingSkill->level_id = $skill['level_id'];
                    $existingSkill->save();
                }
            }
        }

        return $user->skills;
    }


    public function deleteMainSkills(Request $request) {

        // delete user skills
        // empty worker_details.main_skill field

        $user = JWTAuth::toUser();

        if ($user->workerDetail) {

            $user->workerDetail->main_skill = null;
            $user->workerDetail->save();
            UserSkill::where('user_id', $user->id)->delete();
        }

        return true;
    }


}