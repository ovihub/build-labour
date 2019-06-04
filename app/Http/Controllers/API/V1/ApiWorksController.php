<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\WorkExperience;
use App\Models\Users\WorkExperienceResponsibility;
use App\Repositories\WorkerRepository;
use Illuminate\Http\Request;
use JWTAuth;

class ApiWorksController extends ApiBaseController
{
    protected $workerRepo;

    /**
     * @OA\Post(
     *      path="/work/experience",
     *      tags={"Work"},
     *      summary="Add a work experience",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
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
     *                      description="Company",
     *                      type="string",
     *                      example="Appetiser"
     *                  ),
     *                  @OA\Property(
     *                      property="project_size",
     *                      description="Project Size",
     *                      type="string",
     *                      example="20000"
     *                  ),
     *                  @OA\Property(
     *                      property="start_year",
     *                      description="<b>Required</b> 2014-01-01",
     *                      type="integer",
     *                      example="11"
     *                  ),
     *                  @OA\Property(
     *                      property="start_month",
     *                      description="<b>Required</b> Start Month",
     *                      type="integer",
     *                      example="11"
     *                  ),
     *                  @OA\Property(
     *                      property="end_month",
     *                      description="<b>Optional</b> End Month",
     *                      type="integer",
     *                      example="12"
     *                  ),
     *                  @OA\Property(
     *                      property="job_id",
     *                      description="Existing Job ID",
     *                      type="integer",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="company_id",
     *                      description="Existing Company ID",
     *                      type="integer",
     *                      example="1"
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

        try {

            $workerRepo = new WorkerRepository();

            if (!$work_experience = $workerRepo->addExperience($request)) {

                return $this->apiErrorResponse(
                    false,
                    $workerRepo->workExp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $workerRepo->workExp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'work_experience' ), true, 'Successfully added an experience!', self::HTTP_STATUS_REQUEST_OK);
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
     *                      property="project_size",
     *                      description="<b>Required</b> Project Size",
     *                      type="string",
     *                      example="20000"
     *                  ),
     *                  @OA\Property(
     *                      property="responsibilities",
     *                      description="<b>Required</b> Responsibilities",
     *                      type="string",
     *                      example="Make computer programs."
     *                  ),
     *                  @OA\Property(
     *                      property="start_year",
     *                      description="<b>Required</b> 2014-01-01",
     *                      type="integer",
     *                      example="11"
     *                  ),
     *                  @OA\Property(
     *                      property="start_month",
     *                      description="<b>Required</b> Start Month",
     *                      type="integer",
     *                      example="11"
     *                  ),
     *                  @OA\Property(
     *                      property="end_month",
     *                      description="<b>Optional</b> End Month",
     *                      type="integer",
     *                      example="9"
     *                  ),
     *                  @OA\Property(
     *                      property="job_id",
     *                      description="Existing Job ID",
     *                      type="integer",
     *                      example="1"
     *                  ),
     *                  @OA\Property(
     *                      property="company_id",
     *                      description="Existing Company ID",
     *                      type="integer",
     *                      example="1"
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

        try {

            $workerRepo = new WorkerRepository();

            if (!$work_experience = $workerRepo->updateExperience($request)) {

                return $this->apiErrorResponse(
                    false,
                    $workerRepo->workExp->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $workerRepo->workExp->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'work_experience' ), true, 'Successfully updated a work experience', self::HTTP_STATUS_REQUEST_OK);
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
}
