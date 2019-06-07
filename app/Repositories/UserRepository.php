<?php

namespace App\Repositories;

use App\Mails\ResendVerificationCodeEmail;
use App\Models\Companies\Company;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Options\SecondaryFunction;
use App\Models\Skills\Skill;
use App\Models\Users\Bookmark;
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
    public $bookmark = null;

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

        $this->user = new Users;
        $this->company = new Company();

        $rules = [
            'company_name'  => 'required|min:5',
            'company_main_company_id'  => 'required|integer',
            'company_secondary_functions' => 'required|array',
            'company_business_type_id' => 'required|integer',
            'company_tier_id' => 'required|integer',
            'company_photo' => 'required|image64:jpeg,jpg,png',
            'company_address'  => 'required|min:5',
            'company_contact_number' => 'required|min:5',
            'company_operate_outside_states' => 'required|boolean',
            'company_website' => 'required|min:5|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'email'     => 'required|string|email|max:50|unique:users',
            'password'  => 'required|string|min:6|max:24|confirmed'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ( $validator->fails() ) {

            $this->user->errorsDetail = $validator->errors()->toArray();

            return false;
        }

        // user validation
        $this->user->isEmployerSignup = true;

        if( !$this->user->store($request) ) {

            return false;
        }

        $this->company->setUserId($this->user->id);

        if ( !$this->company->store($request) ) {

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
        if (!$this->company->uploadProfilePhoto($request)) {

            return false;
        }

        $user = $this->user;
        $company = $this->company;
        $token = $this->user->getJwtToken();

        Mail::to( $user->email )->send( new ResendVerificationCodeEmail( $user ) );

        $user->makeHidden([
            'device_token',
            'dob_formatted',
            'full_name',
            'identifier',
            'is_verified',
        ]);

        $company->makeHidden([
            'address',
            'business_type_id',
            'created_at',
            'created_by',
            'locations',
            'main_company_id',
            'no_of_workers',
            'operate_outside_states',
            'phone',
            'photo_url',
            'states',
            'tier_id',
            'updated_at',
            'website',
            'workers'
        ]);

        return compact('user', 'company', 'token');
    }

    public function doBookMark(Request $request) {

        $this->bookmark = new Bookmark();

        $user = JWTAuth::toUser();

        if ($user) {

            $this->bookmark = Bookmark::where('user_id', $user->id)->where('post_id', $request->post_id)->first();

            // if the post id exists then delete
            if ($this->bookmark) {

                $this->bookmark->delete();
                $this->bookmark->unbookmarked = true;

            } else {

                $this->bookmark = new Bookmark();

                if (!$this->bookmark->store([
                    'post_id' => $request->post_id,
                    'user_id' => $user->id
                ])) {

                    return false;
                }
            }

            return $this->bookmark;
        }
    }

    public function getPostJobsBookmarks() {

        $user = JWTAuth::toUser();

        if ($user) {

            $query = Bookmark::with('CompanyPost', 'CompanyPost.Job');

            $bookmarkWithJobs = $query->where('user_id', $user->id)->get();

            if ($bookmarkWithJobs) {

                $jobs = [];

                foreach ($bookmarkWithJobs as $bookmark) {

                    if ($bookmark->CompanyPost && $bookmark->CompanyPost->Job) {

                        $jobPost = [
                            'bookmark_id' => $bookmark->id,
                            'post_id' => $bookmark->CompanyPost->id,
                            'company_photo' => $bookmark->CompanyPost->Company->photo,
                            'company_name' => $bookmark->CompanyPost->Company->name,
                            'job_role' => $bookmark->CompanyPost->Job->title,
                            'location' => $bookmark->CompanyPost->Job->location
                        ];

                        $jobs[] = $jobPost;
                    }

                }

                return $jobs;
            }
        }

        return [];
    }

    public function getBookmarksById() {

        $user = JWTAuth::toUser();

        if ($user) {

            $bookmarks = Bookmark::where('user_id', $user->id)->pluck('post_id');

            if ($bookmarks) {

                return $bookmarks;
            }
        }

        return [];
    }
}