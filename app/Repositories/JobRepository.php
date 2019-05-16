<?php

namespace App\Repositories;

use App\Models\Companies\Job;
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

    public function getSearch(Request $request) {

        $params = (object) $request->all();

        $jobs = Job::with('company');

        $jobs = $jobs->where('title', 'like', "%{$params->role}%");
        $jobs = $jobs->whereHas('company',

            function ($query) use ($params) {

                foreach($params->tiers as $tier){

                    $tier = trim($tier);

                    $query->where('tier', 'LIKE', "%{$tier}%");
                }

                foreach($params->sectors as $sector) {

                    $sector = trim($sector);

                    if (count($params->tiers) > 0) {

                        $query->orWhere('sector', 'LIKE', "%{$sector}%");

                    } else {

                        $query->where('sector', 'LIKE', "%{$sector}%");
                    }
                }

            });

        foreach($params->locations as $location) {

            $location = trim($location);

            $jobs = $jobs->orWhere('location', 'LIKE', "%{$location}%");

        }

        $jobs = $jobs->get();

        return $jobs;
    }
}