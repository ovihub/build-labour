<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Companies\Company;
use Illuminate\Http\Request;
use JWTAuth;

class ApiCompaniesController extends ApiBaseController
{
    /**
     * @OA\Post(
     *      path="/company",
     *      tags={"Company"},
     *      summary="Add a Company",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      description="<b>Required</b> Company Name",
     *                      type="string",
     *                      example="Sample Company"
     *                  ),
     *                  @OA\Property(
     *                      property="address",
     *                      description="<b>Required</b> Company Address",
     *                      type="string",
     *                      example="28 St James, Victoria Avenue"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_name",
     *                      description="<b>Required</b> Company Contact Name",
     *                      type="string",
     *                      example="James Hayward"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_email",
     *                      description="<b>Required</b> Company Email",
     *                      type="string",
     *                      example="sample@test.com"
     *                  ),
     *                   @OA\Property(
     *                      property="phone",
     *                      description="<b>Required</b> Company Phone",
     *                      type="string",
     *                      example="61 2 9876 5432"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Token"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Token Expired"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Token Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function add( Request $request )
    {

        $user = JWTAuth::toUser();
        $company = new Company($user->id);

        try {

            if( !$company->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $company->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $company->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'Successfully registered a company', self::HTTP_STATUS_REQUEST_OK);
    }
}
