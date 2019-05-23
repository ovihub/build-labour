<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\ApiBaseController;
use App\Models\Companies\Job;
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

            if ($record) {
                return $this->apiSuccessResponse(compact('record'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }
}
