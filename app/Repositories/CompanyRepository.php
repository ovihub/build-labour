<?php

namespace App\Repositories;

use App\Models\Companies\Company;
use App\Models\Companies\Job;
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

            return $user->company;
        }

        return false;
    }

    public function uploadPhoto( Request $request ) {

        $user = JWTAuth::toUser();

        if( $user->company && $user->company->uploadProfilePhoto($request) ){

            $this->company = $user->company;
            return $this->company;
        }

        return false;
    }

    public function getJobs($id) {

        $jobs = Job::where('company_id', $id)->get();

        return $jobs;
    }

    public function getWorkers($id) {

        $company = Company::find($id);

        if ($company) {

            return $company->workers;
        }

        return [];
    }
}