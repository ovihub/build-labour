<?php

namespace App\Repositories;

use App\Models\Users\WorkerDetail;
use App\Models\Users\WorkExperience;
use App\Models\Users\WorkExperienceResponsibility;
use JWTAuth;
use Illuminate\Http\Request;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class WorkerRepository extends AbstractRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = WorkerDetail::class;

    public $workExp = null;

    public function addExperience(Request $request) {

        $user = JWTAuth::toUser();

        $this->workExp = new WorkExperience();
        $this->workExp->setUserId($user->id);

        if (!$this->workExp->store($request)) {

            return false;
        }

        $responsibilities = [];

        if ($request->responsibilities) {

            foreach ($request->responsibilities as $r) {

                if (!empty($r)) {

                    $responsibilities[] = array('work_experience_id' => $this->workExp->id, 'responsibility' => $r);
                }
            }

            WorkExperienceResponsibility::insert($responsibilities);
        }

        $this->workExp->responsibilities;
        return $this->workExp;
    }

    public function updateExperience(Request $request) {


        $user = JWTAuth::toUser();

        $workExp = WorkExperience::find($request->id);

        if (!$workExp) {

            $this->workExp = new WorkExperience();
            $this->workExp->addError('Something wrong!');

            return false;
        }


        $this->workExp = $workExp;
        $this->workExp->setUserId($user->id);

        if (!$this->workExp->store($request)) {

            return false;
        }

        $responsibilities = [];

        if ($request->responsibilities) {

            WorkExperienceResponsibility::where('work_experience_id', $this->workExp->id)->delete();

            foreach ($request->responsibilities as $r) {

                if (!empty($r)) {

                    $responsibilities[] = array('work_experience_id' => $this->workExp->id, 'responsibility' => $r);
                }
            }

            WorkExperienceResponsibility::insert($responsibilities);
        }

        $this->workExp->responsibilities;
        return $this->workExp;
    }
}