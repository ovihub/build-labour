<?php

namespace App\Http\Controllers\API\V1;

use App\Repositories\JobRepository;
use JWTAuth;
use Illuminate\Http\Request;

class ApiJobsController extends ApiBaseController
{

    /**
     * @var CompanyRepository
     */
    protected $repository;

    public function __construct(JobRepository $repository) {

        $this->repository = $repository;
    }

    /**
     * @OA\Post(
     *      path="/job/search",
     *      tags={"Jobs"},
     *      summary="Search a jobs",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="role",
     *                      description="job role",
     *                      type="string",
     *                      example="ter"
     *                  ),
     *                  @OA\Property(
     *                      property="tiers",
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example="manufacturing"
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="sectors",
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example="automotive"
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="locations",
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example="south"
     *                      ),
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
    public function search(Request $request) {

        try {

            $jobs = $this->repository->getSearch($request);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'jobs' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/job/{id}",
     *      tags={"Jobs"},
     *      summary="View a Limit Data Job",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="job id",
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
    public function view( Request $request )
    {
        try {

            $job = $this->repository->find($request->id);

            if (!$job) {

                return $this->apiErrorResponse(false, 'Something wrong!', self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');

            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'job' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

}
