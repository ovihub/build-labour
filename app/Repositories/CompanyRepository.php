<?php

namespace App\Repositories;

use App\Models\Companies\Company;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\CompanySpecialized;
use App\Models\Companies\Job;
use App\Models\Companies\JobRequirement;
use App\Models\Companies\JobResponsibility;
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
            if (!$request->specialization) {

                $this->company->addError('requirements is required');
            }

            $excludeIds = [];

            foreach ($request->specialization as $r) {

                $r['company_id'] = $user->company->id;

                if (isset($r['id'])) {

                    // update
                    $spec = CompanySpecialized::find($r['id']);

                    if ($spec) {

                        $excludeIds[] = $r['id'];

                    } else {

                        $spec = new CompanySpecialized();
                    }

                }

                if ($spec->store($r)) {

                    $excludeIds[] = $spec->id;
                }
            }

            CompanySpecialized::whereNotIn('id', $excludeIds)->where('company_id', $user->company->id)->delete();

            $user->company->specialization;

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

        $jobs = Job::where('company_id', $id)->get();

        return $jobs;
    }

    public function getJob($id) {

        $job = Job::find($id);

        if ($job) {

            $job->company;
            $job->requirements;
            $job->responsibilities;

            return $job;
        }

        return false;
    }

    public function getCompany($id) {

        $company = $this->find($id);

        if ($company && $company->Specialization) {

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
                    ->whereNull('job_id')
                    ->get();

        return $posts;
    }

    public function getJobPosts($id) {

        $posts = CompanyPost::with('job')
                    ->where('company_id', $id)
                    ->whereNotNull('job_id')
                    ->get();

        return $posts;
    }

}