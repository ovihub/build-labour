<?php

namespace App\Http\Controllers\API\V1;

use App\Repositories\JobRepository;
use Illuminate\Support\Facades\DB;
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
     *      path="/job/search/filter",
     *      tags={"Job Applicant"},
     *      summary="Search and FIlter Jobs",
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
    public function postFilter(Request $request) {

        try {

            $jobs = $this->repository->getFilter($request);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'jobs' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/job/search?company_id=",
     *      tags={"Job"},
     *      summary="Search by keyword if company_id is present then it will search jobs within a company only",
     *      security={{"BearerAuth":{}}},
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
    public function searchCompanyJobs( Request $request )
    {
        try {

            $jobs = $this->repository->searchCompanyJobs($request);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'jobs' ), true, '', self::HTTP_STATUS_REQUEST_OK);

       // return $this->apiSuccessResponse( $data, true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/job/{id}",
     *      tags={"Job"},
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

            $job = $this->repository->getJob($request->id);

            if (!$job) {

                return $this->apiErrorResponse(false, 'Something wrong!', self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');

            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'job' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/job",
     *      tags={"Job"},
     *      summary="Post a Job",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="title",
     *                      description="<b>Required</b> Title",
     *                      type="string",
     *                      example="Project Manager"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="Job Description",
     *                      type="string",
     *                      example="The Project Manager is accountable for the leadership and management of their nominated project including the achievement of safety, quality, commercial and programme objectives and the effective day to day management of the project team."
     *                  ),
     *                  @OA\Property(
     *                      property="about",
     *                      description="About the project",
     *                      type="string",
     *                      example="$730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced apartments across 88 storeys. "
     *                  ),
     *                  @OA\Property(
     *                      property="exp_level",
     *                      description="Experience Level",
     *                      type="string",
     *                      example="Senior"
     *                  ),
     *                  @OA\Property(
     *                      property="contract_type",
     *                      description="Contract type",
     *                      type="string",
     *                      example="Full-time permanent"
     *                  ),
     *                  @OA\Property(
     *                      property="salary",
     *                      description="Salary",
     *                      type="string",
     *                      example="$500"
     *                  ),
     *                  @OA\Property(
     *                      property="reports_to",
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example="Company Owner"
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="location",
     *                      description="Location",
     *                      type="string",
     *                      example="South Yarra, Melbourne, Victoria"
     *                  ),
     *                  @OA\Property(
     *                      property="responsibilities",
     *                      description="Responsibilities",
     *                      type="array",
     *                      @OA\Items(
     *                         @OA\Property(
     *                              property="title",
     *                              type="string",
     *                              example="Quality Management"
     *                          ),
     *                          @OA\Property(
     *                              property="items",
     *                              type="array",
     *                              @OA\Items(
     *                                  type="string",
     *                                  example="Compliance"
     *                              ),
     *                          ),
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="requirements",
     *                      description="Requirements",
     *                      type="array",
     *                      @OA\Items(
     *                         @OA\Property(
     *                              property="title",
     *                              type="string",
     *                              example="Skills"
     *                          ),
     *                          @OA\Property(
     *                              property="items",
     *                              type="array",
     *                              @OA\Items(
     *                                  type="string",
     *                                  example="Able to mentor youth guys"
     *                              ),
     *                          ),
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
    public function create( Request $request )
    {
        DB::beginTransaction();

        if ( !$job = $this->repository->createJob( $request ) ) {

            DB::rollBack();
            return $this->apiErrorResponse(
                false,
                $this->repository->job->getErrors( true ),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput',
                $this->repository->job->getErrorsDetail()
            );
        }

        DB::commit();

        return $this->apiSuccessResponse( compact('job'), true, 'Posted job successfully', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/job/save-template",
     *      tags={"Job"},
     *      summary="Save a Job Template",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="title",
     *                      description="<b>Required</b> Title",
     *                      type="string",
     *                      example="Project Manager"
     *                  ),
     *                  @OA\Property(
     *                      property="template_name",
     *                      description="<b>Required</b> template name",
     *                      type="string",
     *                      example="Project Manager Template"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="Job Description",
     *                      type="string",
     *                      example="The Project Manager is accountable for the leadership and management of their nominated project including the achievement of safety, quality, commercial and programme objectives and the effective day to day management of the project team."
     *                  ),
     *                  @OA\Property(
     *                      property="about",
     *                      description="About the project",
     *                      type="string",
     *                      example="$730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced apartments across 88 storeys. "
     *                  ),
     *                  @OA\Property(
     *                      property="exp_level",
     *                      description="Experience Level",
     *                      type="string",
     *                      example="Senior"
     *                  ),
     *                  @OA\Property(
     *                      property="contract_type",
     *                      description="Contract type",
     *                      type="string",
     *                      example="Full-time permanent"
     *                  ),
     *                  @OA\Property(
     *                      property="salary",
     *                      description="Salary",
     *                      type="string",
     *                      example="$500"
     *                  ),
     *                  @OA\Property(
     *                      property="reports_to",
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example="Company Owner"
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="location",
     *                      description="Location",
     *                      type="string",
     *                      example="South Yarra, Melbourne, Victoria"
     *                  ),
     *                  @OA\Property(
     *                      property="responsibilities",
     *                      description="Responsibilities",
     *                      type="array",
     *                      @OA\Items(
     *                         @OA\Property(
     *                              property="title",
     *                              type="string",
     *                              example="Quality Management"
     *                          ),
     *                          @OA\Property(
     *                              property="items",
     *                              type="array",
     *                              @OA\Items(
     *                                  type="string",
     *                                  example="Compliance"
     *                              ),
     *                          ),
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="requirements",
     *                      description="Requirements",
     *                      type="array",
     *                      @OA\Items(
     *                         @OA\Property(
     *                              property="title",
     *                              type="string",
     *                              example="Skills"
     *                          ),
     *                          @OA\Property(
     *                              property="items",
     *                              type="array",
     *                              @OA\Items(
     *                                  type="string",
     *                                  example="Able to mentor youth guys"
     *                              ),
     *                          ),
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
    public function saveTemplate( Request $request )
    {
        DB::beginTransaction();

        if ( !$job = $this->repository->saveTemplate( $request ) ) {

            DB::rollBack();
            return $this->apiErrorResponse(
                false,
                $this->repository->job->getErrors( true ),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput',
                $this->repository->job->getErrorsDetail()
            );
        }

        DB::commit();

        return $this->apiSuccessResponse( compact('job'), true, 'Successfully saved template', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/job/{id}",
     *      tags={"Job"},
     *      summary="Update a Job",
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
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="title",
     *                      description="<b>Required</b> Title",
     *                      type="string",
     *                      example="Project Manager"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="Job Description",
     *                      type="string",
     *                      example="The Project Manager is accountable for the leadership and management of their nominated project including the achievement of safety, quality, commercial and programme objectives and the effective day to day management of the project team."
     *                  ),
     *                  @OA\Property(
     *                      property="about",
     *                      description="About the project",
     *                      type="string",
     *                      example="$730 million Residential Skycraper comprising of 941 residential apartments and 208 serviced apartments across 88 storeys. "
     *                  ),
     *                  @OA\Property(
     *                      property="exp_level",
     *                      description="Experience Level",
     *                      type="string",
     *                      example="Senior"
     *                  ),
     *                  @OA\Property(
     *                      property="contract_type",
     *                      description="Contract type",
     *                      type="string",
     *                      example="Full-time permanent"
     *                  ),
     *                  @OA\Property(
     *                      property="salary",
     *                      description="Salary",
     *                      type="string",
     *                      example="$500"
     *                  ),
     *                  @OA\Property(
     *                      property="reports_to",
     *                      type="array",
     *                      @OA\Items(
     *                          type="string",
     *                          example="Human Resource Department"
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="location",
     *                      description="Location",
     *                      type="string",
     *                      example="South Yarra, Melbourne, Victoria"
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

        DB::beginTransaction();

        if ( !$job = $this->repository->updateJob( $request ) ) {

            DB::rollback();

            return $this->apiErrorResponse(
                false,
                $this->repository->job->getErrors( true ),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput',
                $this->repository->job->getErrorsDetail()
            );
        }

        DB::commit();

        return $this->apiSuccessResponse( compact('job'), true, 'Updated job successfully', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/job/{id}/requirements",
     *      tags={"Job"},
     *      summary="Post Job Requirements",
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
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="requirements",
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="title",
     *                              type="string",
     *                              example="Qualifications"
     *                          ),
     *                          @OA\Property(
     *                              property="items",
     *                              type="array",
     *                              @OA\Items(
     *                                  type="string",
     *                                  example="Bachelor Degree in Construction or a related field"
     *                              ),
     *                          ),
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
    public function postJobRequirements(Request $request) {

        DB::beginTransaction();

        if ( !$requirements = $this->repository->saveRequirements( $request ) ) {

            DB::rollBack();

            return $this->apiErrorResponse(
                false,
                $this->repository->jobRequirement->getErrors(),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput'
            );
        }

        DB::rollBack();

        return $this->apiSuccessResponse( compact('requirements'), true, 'Successfully updated job requirements.', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/job/{id}/responsibilities",
     *      tags={"Job"},
     *      summary="Get Job Responsibilities",
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
    public function getJobResponsibilities(Request $request) {

        if ( !$responsibilities = $this->repository->getResponsibilities($request) ) {

            return $this->apiErrorResponse(
                false,
                $this->repository->jobResponsibility->getErrors(),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput'
            );
        }

        return $this->apiSuccessResponse( compact('responsibilities'), true, 'Successfully updated job responsibilities.', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/job/{id}/responsibilities",
     *      tags={"Job"},
     *      summary="Post Job Responsibilities",
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
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="responsibilities",
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="title",
     *                              type="string",
     *                              example="Quality Management "
     *                          ),
     *                          @OA\Property(
     *                              property="items",
     *                              type="array",
     *                              @OA\Items(
     *                                  type="string",
     *                                  example="Comply with and ensure project works are in accordance with Probuild QM Policies, Plans and Procedures."
     *                              ),
     *                          ),
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
    public function postJobResponsibilities(Request $request) {

        if ( !$responsibilities = $this->repository->saveResponsibilities($request) ) {

            return $this->apiErrorResponse(
                false,
                $this->repository->jobResponsibility->getErrors(),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput'
            );
        }

        return $this->apiSuccessResponse( compact('responsibilities'), true, 'Successfully updated job responsibilities.', self::HTTP_STATUS_REQUEST_OK);
    }
}
