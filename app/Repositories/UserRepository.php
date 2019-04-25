<?php

namespace App\Repositories;

use App\Models\Users\UserSkill;
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

    public function saveSkills(Request $request) {

        $user = JWTAuth::toUser();

        if ($request->skills) {

            $skills = $request->skills;

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
}