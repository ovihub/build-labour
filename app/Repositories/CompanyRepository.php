<?php

namespace App\Repositories;

use App\Models\Companies\Company;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class CompanyRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Company::class;

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

}