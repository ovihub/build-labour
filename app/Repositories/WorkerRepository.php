<?php

namespace App\Repositories;

use App\Events\Users\DeleteEducation;
use App\Http\Resources\PeoplesResource;
use App\Models\Companies\Company;
use App\Models\Companies\Job;
use App\Models\Options\BusinessType;
use App\Models\Options\Tier;
use App\Models\Users\Education;
use App\Models\Users\WorkerArea;
use App\Models\Users\WorkerDetail;
use App\Models\Users\WorkerTier;
use App\Models\Users\WorkExperience;
use App\Models\Users\WorkExperienceResponsibility;
use App\User;
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

    public function updateCurrentRole(Request $request) {

        $user = JWTAuth::toUser();

        $this->workExp = new WorkExperience();
        $this->workExp->setUserId($user->id);

        WorkExperience::where('user_id', $user->id)->update(['isCurrent' => 0]);

        if (!$this->workExp->store($request)) {

            return false;
        }

        return true;
    }

    public function updateSectors(Request $request) {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return false;
        }

        if (!empty($request->business_types)) {

            WorkerArea::where('worker_id', $user->workerDetail->id)->delete();

            $businessTypes = $request->business_types;

            $businessTypes = array_filter($businessTypes, function($id) {

                // check businsss type

                $b = BusinessType::find($id);

                if ($b) {

                    return $id;
                }

            });


            $saveBusinessTypes = array_map(function($id) use($user) {

                return array('business_type_id' => $id, 'worker_id' => $user->workerDetail->id);

            }, $businessTypes);

            WorkerArea::insert($saveBusinessTypes);

        }

        if (!empty($request->tiers)) {

            WorkerTier::where('worker_id', $user->workerDetail->id)->delete();

            $tiers = $request->tiers;

            $tiers = array_filter($tiers, function($id) {

                // check tier

                $b = Tier::find($id);

                if ($b) {

                    return $id;
                }

            });

            $saveTiers = array_map(function($id) use($user) {

                return array('tier_id' => $id, 'worker_id' => $user->workerDetail->id);

            }, $tiers);

            WorkerTier::insert($saveTiers);

        }

        return true;
    }


    public function updateAffirmations(Request $request) {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return false;
        }

        if ($request->right_to_work) {

            $user->workerDetail->right_to_work = true;

        } else {

            $user->workerDetail->right_to_work = false;
        }

        if ($request->has_tfn) {

            $user->workerDetail->has_tfn = true;

        } else {

            $user->workerDetail->has_tfn = false;
        }

        if ($request->has_abn) {

            $user->workerDetail->has_abn = true;

        } else {

            $user->workerDetail->has_abn = false;
        }

        if ($request->can_spoke_english) {

            $user->workerDetail->english_skill = true;

        } else {

            $user->workerDetail->english_skill = false;
        }

        if ($request->has_drivers_license) {

            $user->workerDetail->drivers_license = true;

        } else {

            $user->workerDetail->drivers_license = false;
        }

        if ($request->has_registered_vehicle) {

            $user->workerDetail->has_registered_vehicle = true;

        } else {

            $user->workerDetail->has_registered_vehicle = false;
        }

        $user->workerDetail->save();

        return true;
    }


    public function getWorker(Request $request) {

        $user = User::find($request->userid);

        if (!$user || !$user->workerDetail) {

            return false;
        }

        $exp = null;
        $jobRole = '';

        if ($user->workerDetail) {

            $exp = $user->workerDetail->getLatestExperience();
        }

        if ($exp) {

            $jobRole = $exp->job_role;
        }

        $user->job_role = $jobRole;

        $user->experiences;
        $user->role;
        $user->skills;
        $user->educations;
        $user->workerDetail;
        $user->tickets;

        if ($user->workerDetail) {

            $user->workerDetail->education;
        }

        return $user;
    }

}