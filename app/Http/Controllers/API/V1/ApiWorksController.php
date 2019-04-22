<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\WorkExperience;
use App\Models\Users\WorkExperienceResponsibility;
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
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="job_role",
     *                      description="<b>Required</b> Job Role",
     *                      type="string",
     *                      example="Developer"
     *                  ),
     *                  @OA\Property(
     *                      property="company_name",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="Appetiser"
     *                  ),
     *                  @OA\Property(
     *                      property="responsibilities",
     *                      description="<b>Required</b> Responsibilities",
     *                      type="string",
     *                      example="Make computer programs."
     *                  ),
     *                  @OA\Property(
     *                      property="start_date",
     *                      description="<b>Required</b> Start Date",
     *                      type="string",
     *                      example="11/10/2012"
     *                  ),
     *                  @OA\Property(
     *                      property="end_date",
     *                      description="<b>Required</b> End Date",
     *                      type="string",
     *                      example="09/04/2017"
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

        $workExp = new WorkExperience();
        $workExp->setUserId($user->id);

        try {

            if( !$workExp->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $workExp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $workExp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'Successfully added an experience!', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/work/experience/{id}",
     *      tags={"Work"},
     *      summary="Update a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Work ID",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
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
     *                  @OA\Property(
     *                      property="company_name",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="Appetiser"
     *                  ),
     *                  @OA\Property(
     *                      property="responsibilities",
     *                      description="<b>Required</b> Responsibilities",
     *                      type="string",
     *                      example="Make computer programs."
     *                  ),
     *                  @OA\Property(
     *                      property="start_date",
     *                      description="<b>Required</b> Start Date",
     *                      type="string",
     *                      example="11/10/2012"
     *                  ),
     *                  @OA\Property(
     *                      property="end_date",
     *                      description="<b>Required</b> End Date",
     *                      type="string",
     *                      example="09/04/2017"
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
    public function update( Request $request )
    {

        $user = JWTAuth::toUser();
        $workExp = WorkExperience::find($request->id);

        if (!$workExp) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $workExp->setUserId($user->id);

            if (!$workExp->store($request)) {

                return $this->apiErrorResponse(
                    false,
                    $workExp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $workExp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'Successfully added a work experience', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Delete(
     *      path="/work/experience/{id}",
     *      tags={"Work"},
     *      summary="Delete a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Work ID",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
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
    public function delete( Request $request )
    {

        $workExp = WorkExperience::find($request->id);

        if (!$workExp) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $workExp->delete();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'Successfully deleted work experience', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/work/experience/{id}/responsibility",
     *      tags={"Work"},
     *      summary="Add a responsibility in a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Work ID",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="responsibility",
     *                      description="<b>Required</b> Responsibility",
     *                      type="string",
     *                      example="Computer Analyst"
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
    public function respAdd( Request $request )
    {

        $user = JWTAuth::toUser();
        $workExp = WorkExperience::find($request->id);

        if (!$workExp) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $resp = new WorkExperienceResponsibility();

            if (!$resp->store($request)) {

                return $this->apiErrorResponse(
                    false,
                    $resp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $resp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( ['responsibility' => $resp ] , true, 'Successfully added a work responsibility', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/work/experience/{id}/responsibility/{rid}/update",
     *      tags={"Work"},
     *      summary="Update a responsibility in a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Work ID",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="rid",
     *          description="Responsibility id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="responsibility",
     *                      description="<b>Required</b> Responsibility",
     *                      type="string",
     *                      example="Computer Specialist"
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
    public function respUpdate( Request $request )
    {

        $user = JWTAuth::toUser();

        $resp = WorkExperienceResponsibility::find($request->rid);

        if (!$resp) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            if (!$resp->store($request)) {

                return $this->apiErrorResponse(
                    false,
                    $resp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $resp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( ['responsibility' => $resp ] , true, 'Successfully updated a work responsibility', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Delete(
     *      path="/work/experience/{id}/responsibility/{rid}/delete",
     *      tags={"Work"},
     *      summary="Delete a responsibility in a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Work ID",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="rid",
     *          description="Responsibility id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
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
    public function respDelete( Request $request )
    {

        $user = JWTAuth::toUser();

        $resp = WorkExperienceResponsibility::find($request->rid);

        if (!$resp) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            if (!$resp->delete()) {

                return $this->apiErrorResponse(
                    false,
                    $resp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $resp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( [] , true, 'Successfully deleted a work responsibility', self::HTTP_STATUS_REQUEST_OK);
    }
}
