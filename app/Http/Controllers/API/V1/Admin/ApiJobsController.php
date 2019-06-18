<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\ApiBaseController;
use App\Models\Companies\Job;
use App\Models\Companies\JobRole;
use Illuminate\Http\Request;

class ApiJobsController extends ApiBaseController
{
    public function get(Request $request)
    {
        try {
            $record = Job::find($request->id)
                        ->makeHidden([
                            'created_by',
                            'created_at',
                            'updated_at',
                            'company_id',
                        ])->makeVisible([

                        ]);

            $record->JobRole;

            if ($record) {
                return $this->apiSuccessResponse(compact('record'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

    public function getRoles(Request $request)
    {
        try {

            $job_roles = JobRole::all();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('job_roles'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
    }

    public function postRole(Request $request)
    {

        $job_role = new JobRole();

        try {

            if ($request->id) {

                $job_role = JobRole::find($request->id);

                if (!$job_role) {

                    return $this->apiErrorResponse(
                        false,
                        $job_role->getErrors( true ),
                        self::HTTP_STATUS_INVALID_INPUT,
                        'invalidInput'
                    );
                }
            }

            if (!$job_role->store($request->all())) {

                return $this->apiErrorResponse(
                    false,
                    $job_role->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $job_role->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('job_role'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
    }

    public function getRole(Request $request)
    {
        try {

            $role = JobRole::find($request->id);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('role'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
    }
}
