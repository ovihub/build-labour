<?php

namespace App\Http\Controllers\API\V1;

use App\WorkExperience;
use Illuminate\Http\Request;
use JWTAuth;

class ApiWorksController extends ApiBaseController
{
    
    /**
     * @OA\Post(
     *      path="/work/experience",
     *      tags={"Work"},
     *      summary="Add a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="job_role",
     *                      description="<b>Required</b> Job Role",
     *                      type="string",
     *                      example="Developer"
     *                  ),
     *          @OA\Property(
     *                      property="company_name",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="Appetiser"
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
    public function addWorkExperience( Request $request )
    {

        $user = JWTAuth::toUser();
        $workExp = new WorkExperience($user->id);

        try {

            if( !$workExp->store($request) ){

                return $this->apiErrorResponse( false, $workExp->getErrors( true ), self::HTTP_STATUS_INVALID_INPUT, 'invalidInput', $workExp->getErrorsDetail());
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'User has been registered successfully!', self::HTTP_STATUS_REQUEST_OK);
    }
}
