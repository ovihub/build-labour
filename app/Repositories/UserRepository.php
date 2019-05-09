<?php

namespace App\Repositories;

use App\Models\Skills\Skill;
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

        UserSkill::where('user_id', '=', $user->id)->delete();

        if ($request->skills) {

            $skills = $request->skills;

            foreach ($skills as $skill) {
                
                if ($skill['skill_name'] != '') {

                    $newSkill = Skill::firstOrCreate([
                        'name' => $skill['skill_name']
                    ]);
                    
                    UserSkill::updateOrCreate([
                        'user_id' => $user->id,
                        'skill_id' => $newSkill->id,
                    ], [
                        'level_id' => $skill['level_id']
                    ]);
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

    public function company() {

        $user = JWTAuth::toUser();

        if ($user) {

            if (!$user->company) {

                return false;
            }


            return $user->company;
        }

        return false;
    }
}