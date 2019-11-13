<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\ApiBaseController;
use App\Models\Companies\Company;
use Illuminate\Http\Request;

class ApiCompaniesController extends ApiBaseController
{
    public function get(Request $request)
    {
        try {
            $record = Company::find($request->id);

            if ($record) {
                return $this->apiSuccessResponse(compact('record'), true, 'Request OK', self::HTTP_STATUS_REQUEST_OK);
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

    public function deleteCompany( $company_id ){
        $company = Company::find($company_id);

        if (! $company) {
            return $this->apiErrorResponse( false, 'Company Not Found', 404 , 'companyNotFound' );
        }
        try {
            
            $company->delete();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
        return $this->apiSuccessResponse( [], true, 'Successfully deleted company', self::HTTP_STATUS_REQUEST_OK);
    }
}
