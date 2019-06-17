<?php

namespace App\Repositories;

use App\Models\Companies\Company;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Companies\Job;
use App\Models\Companies\JobRequirement;
use App\Models\Companies\JobResponsibility;
use App\Models\Companies\JobRole;
use App\Models\Options\SecondaryFunction;
use Illuminate\Http\Request;
use Torann\LaravelRepository\Repositories\AbstractRepository;
use JWTAuth;

class CompanyRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Company::class;

    public $company = null;
    public $job = null;
    public $jobRequirement = null;
    public $jobResponsibility = null;

    /**
     * Valid searchable columns
     *
     * @return array
     */
    protected $searchable = [
        'query' => [
            'name',
        ],
    ];

    public function updateCompany( Request $request ) {


        $user = JWTAuth::toUser();

        $this->company = new Company();

        if (!$user->company) {

            return false;
        }

        $this->company = $user->company;

        if ($user->company->store($request)) {

            // save specialization

            if (isset($request->secondary_functions) && is_array($request->secondary_functions)) {

                CompanySpecialized::where('company_id', $user->company->id)->delete();

                $secondaryFunctions = SecondaryFunction::whereIn('id', $request->secondary_functions)
                    ->where('main_id', $request->main_company_id)->pluck('id');

                foreach ($secondaryFunctions->toArray() as $id) {

                    CompanySpecialized::insert([
                        'company_id' => $this->company->id,
                        'secondary_id' => $id
                    ]);

                }
            }
            
            $user->company->BusinessType;
            $user->company->Tier;
            $user->company->MainFunction;
            $user->company->Specialization;

            return $user->company;
        }

        return false;
    }

    public function uploadPhoto( Request $request ) {

        $user = JWTAuth::toUser();
        $errMessage = 'Cannot upload a photo';
        $this->company = new Company();

        if( $user->company && $user->company->uploadProfilePhoto($request) ){

            $this->company = $user->company;
            return $this->company;
        }

        $this->company->addError($errMessage);
        $this->company->errorsDetail = ['photo' => $errMessage];

        return false;
    }

    public function getWorkers($id) {

        $company = Company::find($id);

        if ($company) {

            return $company->workers;
        }

        return [];
    }

    public function getJobs($id) {

        $jobs = Job::where('company_id', $id)
            ->orWhere('company_id', null)
            ->get();

        return $jobs;
    }

    public function getJob( Request $request ) {

        $job = Job::find($request->jid);

        if ($job) {

            $job->requirements;
            $job->responsibilities;

            $company = Company::find($request->id);

            if ($company) {
                $job->company = $company;
            }

            return $job;
        }

        return false;
    }

    public function getCompany($id) {

        $company = $this->find($id);

        if ($company && $company->Specialization) {

            $company->BusinessType;
            $company->Tier;
            $company->MainFunction;
            $company->Specialization;

            return $company;
        }

        return [];
    }

    public function getCompanySpecialization($id) {

        $company = $this->find($id);

        if ($company && $company->Specialization) {

            return $company->Specialization;
        }

        return [];
    }

    public function getPosts($id) {

        $posts = CompanyPost::with('job')
                    ->where('company_id', $id)
                    ->get();

        return $posts;
    }

    public function getJobPosts($id) {
        
        $jobs = Job::with('Company')
                ->where('company_id', $id)
                ->where('is_template', false)
                ->get();

        return $jobs;
    }

    public function searchJobRoles(Request $request) {

        $keyword = $request->keyword ? $request->keyword : '';

        $jobRoles = JobRole::where('job_role_name', 'like', "%{$keyword}%")
            ->orWhere('job_role_name', 'like', "%{$keyword}%")
            ->take(10)
            ->get();

        return $jobRoles;
    }

}