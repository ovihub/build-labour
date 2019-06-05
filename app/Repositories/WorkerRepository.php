<?php

namespace App\Repositories;

use App\Events\Users\DeleteEducation;
use App\Models\Companies\Company;
use App\Models\Companies\Job;
use App\Models\Users\Education;
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
        $this->workExp->Job;
        $this->workExp->Company;

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
        $this->workExp->Job;
        $this->workExp->Company;

        return $this->workExp;
    }

    public function deleteAboutMe() {

        $user = JWTAuth::toUser();

        if ($user->workerDetail) {

            $user->date_of_birth = null;
            $user->gender = null;
            $user->marital_status = null;
            $user->save();

            $user->workerDetail->english_skill = null;
            $user->workerDetail->drivers_license = null;
            $user->workerDetail->save();

        }

        return true;
    }

    public function deleteIdealRole() {

        $user = JWTAuth::toUser();

        if ($user->workerDetail) {

            $user->workerDetail->introduction = null;
            $user->workerDetail->when = null;
            $user->workerDetail->max_distance = null;
            $user->workerDetail->state = null;
            $user->workerDetail->right_to_work = 0;
            $user->workerDetail->save();

        }

        return true;
    }

    public function deleteEducation(Request $request) {

        $education = Education::find($request->id);
        $user = JWTAuth::toUser();

        if ($education) {

            $education->delete();

            event(new DeleteEducation($user));
            return $education;
        }


        return false;
    }
}