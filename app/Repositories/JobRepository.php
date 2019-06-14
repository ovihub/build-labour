<?php

namespace App\Repositories;

use App\Http\Resources\JobsResource;
use App\Models\Companies\CompanyPost;
use App\Models\Companies\Job;
use App\Models\Companies\JobRequirement;
use App\Models\Companies\JobResponsibility;
use App\Models\Companies\JobRole;
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

    public function getJob($jobId)
    {

        $this->job = Job::with('Responsibilities')->where('id', $jobId)->first();

        if ($this->job){

            $this->job->Responsibilities;
            $this->job->requirements;

            return $this->job;
        }

        return false;

    }

    public function getFilter(Request $request)
    {

        $params = (object) $request->all();

        $jobs = Job::with('Responsibilities')->where('title', 'like', "%{$params->role}%");

        foreach($params->locations as $location) {

            $location = trim($location);

            $jobs = $jobs->orWhere('location', 'LIKE', "%{$location}%");

        }

        $jobs = $jobs->get();

        return $jobs;
    }

    public function searchCompanyJobs(Request $request)
    {

        $column = $request->get('column') ? $request->get('column') : 'created_at';
        $order = $request->get('order') ? $request->get('order') : 'desc';
        $per_page = $request->get('per_page') ? $request->get('per_page') : 10;

        $jobs = Job::with('company');
        $jobs = $jobs->select('job_posts.*');

        $jobs = $jobs->leftjoin('job_roles as job_role', 'job_role.id', '=', 'job_posts.job_role_id');

        $keyword = $request->keyword ? $request->keyword : '';
        $location = $request->location ? $request->location : '';

        $jobs = $jobs->where('job_posts.is_template', false)
                ->whereNotNull('job_posts.company_id');

        $jobs = $jobs->where(function($query) use ($keyword) {
            $query->where('job_posts.title', 'like', "%{$keyword}%")
                ->orWhere('job_role.job_role_name', 'like', "%{$keyword}%");
        });

        if (!empty($location)) {

            $jobs = $jobs->where(function($query) use ($location) {
                $query->where('job_posts.location', 'like', "%{$location}%");
            });
        }

//        $jobs = $jobs->orderBy($column, $order);
//        $data = $jobs->paginate($per_page);

        $jobs = $jobs->take(30)->get();

        return $jobs;

    }

    public function createJob( Request $request )
    {

        $job = $this->saveJob($request, false);

        if ($job) {

            return $job;
        }

        return false;
    }

    public function saveTemplate( Request $request )
    {

        $job = $this->saveJob($request, true);

        if ($job) {

            return $job;
        }

        return false;
    }

    public function updateJob( Request $request )
    {

        $this->job = Job::find($request->id);

        if ($this->job){

            $data = $request->all();

            if ($request->job_role_id) {

                $jobRole = JobRole::find($request->job_role_id);

                if (!$jobRole) {

                    $message = "Can't process request";
                    $this->job->addError( $message );

                    return false;
                }
            }

            if ($request->id) {

                $data['id'] = $request->id;
            }

            if ($this->job->store($data)) {

                return $this->job;
            }
        }

        return false;
    }

    public function saveJob( Request $request, $isTemplate=true )
    {

        $user = JWTAuth::toUser();

        $this->job = new Job();

        $data = $request->all();
        $data['created_by'] = $user->id;
        $data['is_template'] = $isTemplate;

        if ($user->Company) {

            $data['company_id'] = $user->Company->id;
        }
        
        if ($request->job_role_id) {

            $jobRole = JobRole::find($request->job_role_id);

            if (!$jobRole) {

                $message = "Can't process request";
                $this->job->addError( $message );

                return false;
            }
        }

        if ($job = $this->job->store($data))
        {

            // job responsibilities

            if ($request->responsibilities) {

                foreach ($request->responsibilities as $r) {

                    $r['items_json'] = $r['items'];
                    $r['job_id'] = $job->id;

                    $jobRes = new JobResponsibility();

                    if (!$jobRes->store($r)) {

                        $message = "Can't processed request";
                        $this->job->addError( $message );

                        return false;
                    }
                }
            }

            if ($request->requirements) {

                foreach ($request->requirements as $r) {

                    $r['items_json'] = $r['items'];
                    $r['job_id'] = $job->id;

                    $jobReq = new JobRequirement();

                    if (!$jobReq->store($r)) {

                        $message = "Can't processed request";
                        $this->job->addError( $message );

                        return false;
                    }
                }
            }

            $this->job->Requirements;
            $this->job->Responsibilities;

            return $this->job;
        }

        return false;
    }

    public function saveRequirements( Request $request)
    {

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

    public function saveResponsibilities( Request $request )
    {

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

    public function getResponsibilities( Request $request )
    {

        $this->jobResponsibility = new JobResponsibility();

        $job = Job::find($request->id);

        if ($job) {

            return $job->responsibilities;
        }

        return false;
    }
}