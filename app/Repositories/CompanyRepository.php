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

                    $excludeIds[] = $r['id'];

                } else {

                    // new
                    $spec = new CompanySpecialized();
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

    public function createJob( Request $request ) {

        $user = JWTAuth::toUser();
        $this->job = new Job();

        if ($user->company){

            $data = $request->all();
            $data['company_id'] = $request->id;
            $data['created_by'] = $user->id;

            if ($this->job->store($data)) {

                return $this->job;
            }

        }

        return false;
    }

    public function getJobs($id) {

        $jobs = Job::where('company_id', $id)->get();

        return $jobs;
    }

    public function getJob($id) {

        $job = Job::find($id);

        if ($job) {

            $job->requirements;
            $job->responsibilities;

            return $job;
        }

        return false;
    }

    public function getPosts($id) {

        $posts = CompanyPost::where('company_id', $id)->get();

        return $posts;
    }

    public function saveRequirements( Request $request) {

        $this->jobRequirement = new JobRequirement();

        if (!$request->requirements) {

            $this->jobRequirement->addError('requirements is required');
        }

        $job = Job::find($request->jid);

        if ($job && $request->requirements) {

            $excludeIds = [];

            foreach ($request->requirements as $r) {

                $r['items_json'] = $r['items'];
                $r['job_id'] = $job->id;

                if (isset($r['id'])) {

                    // update
                    $jobReq = JobRequirement::find($r['id']);

                    $excludeIds[] = $r['id'];

                } else {

                    // new
                    $jobReq = new JobRequirement();
                }


                if ($jobReq->store($r)) {

                    $excludeIds[] = $jobReq->id;
                }
            }

            JobRequirement::whereNotIn('id', $excludeIds)->where('job_id', $job->id)->delete();

            return $job->requirements;
        }

        return false;
    }

    public function saveResponsibilities( Request $request) {

        $this->jobResponsibility = new JobResponsibility();

        if (!$request->responsibilities) {

            $this->jobResponsibility->addError('responsibilities is required');
        }

        $job = Job::find($request->jid);

        if ($job && $request->responsibilities) {

            $excludeIds = [];
            foreach ($request->responsibilities as $r) {

                $r['items_json'] = $r['items'];
                $r['job_id'] = $job->id;

                if (isset($r['id'])) {

                    // update
                    $jobRes = JobResponsibility::find($r['id']);

                    $excludeIds[] = $r['id'];

                } else {

                    // new
                    $jobRes = new JobResponsibility();

                    $excludeIds[] = $r['id'];
                }

                if ($jobRes->store($r)) {

                    $excludeIds[] = $jobRes->id;
                }
            }

            JobResponsibility::whereNotIn('id', $excludeIds)->where('job_id', $job->id)->delete();

            return $job->responsibilities;
        }

        return false;
    }
}