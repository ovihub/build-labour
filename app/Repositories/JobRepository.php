<?php

namespace App\Repositories;

use App\Models\Companies\Job;
use App\Models\Companies\JobRequirement;
use App\Models\Companies\JobResponsibility;
use JWTAuth;
use Illuminate\Http\Request;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class JobRepository extends AbstractRepository
{

    /*
     * note
     * jobs property table
     * title - role
     * location
     *
     * companies property table
     * tier
     * sector
     * locations_json, address
     *
     * {
            "role": "Ter",
            "tiers":[
                "manufacturing"
            ],
            "sectors":[
                "programming"
            ],
            "locations": [
                "sydney",
                "james"
            ]
        }

     */
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Job::class;
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
            'title',
            'location',
            'company.tier'
        ],
    ];

    public function getJob($jobId) {

        $this->job = Job::find($jobId);

        if ($this->job){

            $this->job->Responsibilities;
            $this->job->requirements;

            return $this->job;
        }

        return false;

    }

    public function getSearch(Request $request) {

        $params = (object) $request->all();

     //   $jobs = Job::with('company');

        $jobs = Job::where('title', 'like', "%{$params->role}%");
//        $jobs = $jobs->orWhereHas('company',
//
//            function ($query) use ($params) {
//
//                foreach($params->tiers as $tier){
//
//                    $tier = trim($tier);
//
//                    $query->where('tier', 'LIKE', "%{$tier}%");
//                }
//
//                foreach($params->sectors as $sector) {
//
//                    $sector = trim($sector);
//
//                    if (count($params->tiers) > 0) {
//
//                        $query->orWhere('sector', 'LIKE', "%{$sector}%");
//
//                    } else {
//
//                        $query->where('sector', 'LIKE', "%{$sector}%");
//                    }
//                }
//
//            });

        foreach($params->locations as $location) {

            $location = trim($location);

            $jobs = $jobs->orWhere('location', 'LIKE', "%{$location}%");

        }

        $jobs = $jobs->get();

        return $jobs;
    }

    public function createJob( Request $request ) {

        $user = JWTAuth::toUser();

        $this->job = new Job();

        $data = $request->all();
        $data['created_by'] = $user->id;

        if ($this->job->store($data)) {

            return $this->job;
        }

        return false;
    }

    public function updateJob( Request $request ) {

        $this->job = Job::find($request->id);

        if ($this->job){

            $data = $request->all();

            if ($request->id) {

                $data['id'] = $request->id;
            }

            if ($this->job->store($data)) {

                return $this->job;
            }
        }

        return false;
    }

    public function saveRequirements( Request $request) {

        $this->jobRequirement = new JobRequirement();

        if (!$request->requirements) {

            $this->jobRequirement->addError('requirements is required');
        }

        $job = Job::find($request->id);

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

        $job = Job::find($request->id);

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