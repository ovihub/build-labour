<?php

namespace App\Repositories;

use App\Mails\ResendVerificationCodeEmail;
use App\Models\Companies\Company;
use App\Models\Companies\CompanySpecialized;
use App\Models\Options\SecondaryFunction;
use App\Models\Skills\Skill;
use App\Models\Users\Users;
use App\Models\Users\UserSkill;
use App\Models\Users\WorkerDetail;
use App\User;
use Illuminate\Support\Facades\Mail;
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
    public $user = null;
    public $company = null;

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

            $user->company->BusinessType;
            $user->company->Tier;
            $user->company->MainFunction;
            $user->company->Specialization;

            return $user->company;
        }

        return false;
    }

    public function registerCompany(Request $request) {

      //  dd($request->all());
        $this->user = new Users;
        $this->company = new Company();

        // user validation
        $this->user->isEmployerSignup = true;

        if( !$this->user->store($request) ) {

            return false;
        }

        $this->company->setUserId($this->user->id);

        // check company validation
        if ( !$this->company->store($request) ) {

            $this->user->errorsDetail = $this->company->getErrorsDetail();

            return false;
        }

        // company specialize

        if ($request->company_secondary_functions && $request->company_main_company_id) {

            $secondaryFunctions = SecondaryFunction::whereIn('id', $request->company_secondary_functions)
                                ->where('main_id', $request->company_main_company_id)->pluck('id');


            foreach ($secondaryFunctions->toArray() as $id) {

                CompanySpecialized::insert([
                    'company_id' => $this->company->id,
                    'secondary_id' => $id
                ]);

            }

        }

        // check company photo validation
        if ($request->company_photo && !$this->company->uploadProfilePhoto($request)) {

            $this->user->errorsDetail = $this->company->getErrorsDetail();
            return false;
        }

        $user = $this->user;
        $company = $this->company;
        $token = $this->user->getJwtToken();

        Mail::to( $user->email )->send( new ResendVerificationCodeEmail( $user ) );
        return compact('user', 'company', 'token');
    }
}