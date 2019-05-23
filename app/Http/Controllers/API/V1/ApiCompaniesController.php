<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Companies\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JWTAuth;

class ApiCompaniesController extends ApiBaseController
{

    /*
     *
     *      Route::get('search', 'ApiCompaniesController@search');
            Route::post('update', 'ApiCompaniesController@update');
            Route::post('photo', 'ApiCompaniesController@uploadPhoto');
            Route::get('{id}', 'ApiCompaniesController@view');
            Route::get('{id}/jobs', 'ApiCompaniesController@update');
            Route::get('{id}/workers', 'ApiCompaniesController@workers');
     */
    /**
     * @var CompanyRepository
     */
    protected $repository;

    public function __construct(CompanyRepository $repository) {

        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     *      path="/company/search",
     *      tags={"Company"},
     *      summary="Search Company",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="keyword",
     *          description="Keyword",
     *          required=true,
     *          @OA\Schema(
     *              type="string",
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
    public function search( Request $request )
    {

        try {

            $companies = $this->repository->search($request->get('keyword'))->all();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'companies' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/company/{id}",
     *      tags={"Company"},
     *      summary="View a Limit Data Company",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
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

            $company = $this->repository->find($request->id);

            if (!$company) {

                return $this->apiErrorResponse(false, 'Something wrong!', self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');

            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'company' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/company/{id}/workers",
     *      tags={"Company"},
     *      summary="Get company workers",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
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
    public function workers( Request $request )
    {
        try {

            $workers = $this->repository->getWorkers($request->id);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workers' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/company/update",
     *      tags={"Company"},
     *      summary="Update a Company",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
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
     *                      description="Locations",
     *                      type="string",
     *                      example="28 St James, Victoria Avenue"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_name",
     *                      description="Contact Name",
     *                      type="string",
     *                      example="James Hayward"
     *                  ),
     *                  @OA\Property(
     *                      property="contact_email",
     *                      description="Contact Email",
     *                      type="string",
     *                      example="sample@test.com"
     *                  ),
     *                   @OA\Property(
     *                      property="phone",
     *                      description="Phone",
     *                      type="string",
     *                      example="61 2 9876 5432"
     *                  ),
     *                  @OA\Property(
     *                      property="sector",
     *                      description="Sector",
     *                      type="string",
     *                      example="61 2 9876 5432"
     *                  ),
     *                  @OA\Property(
     *                      property="tier",
     *                      description="Tier",
     *                      type="string",
     *                      example="manufacturing"
     *                  ),
     *                  @OA\Property(
     *                      property="introduction",
     *                      description="Introduction Company",
     *                      type="string",
     *                      example="A good company"
     *                  ),
     *                  @OA\Property(
     *                      property="specialization",
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="name",
     *                              description="Specialize",
     *                              type="string",
     *                              example="Bachelor Degree in Construction or a related field"
     *                          ),
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="website",
     *                      description="Website Company",
     *                      type="string",
     *                      example="www.companymanu.com"
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

            if (!$company = $this->repository->updateCompany($request)) {

                return $this->apiErrorResponse(
                    false,
                    $this->repository->company->getErrors(),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $this->repository->company->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'company' ), true, 'Successfully updated a company', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/company/photo",
     *      tags={"Company"},
     *      summary="Upload photo",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="photo",
     *                      description="Image File",
     *                      format="file",
     *                      type="string",
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
    public function uploadPhoto( Request $request )
    {

        if( !$photoUrl = $this->repository->uploadPhoto( $request ) ) {
            return $this->apiErrorResponse(
                false,
                $this->repository->company->getErrors( true ),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput',
                $this->repository->company->getErrorsDetail()
            );
        }

        return $this->apiSuccessResponse([ 'photo_url' => $photoUrl ], true, 'Profile Photo Uploaded Successfully ', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/company/{id}/jobs",
     *      tags={"Company"},
     *      summary="Get company jobs",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
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
    public function jobs( Request $request )
    {
        try {

            $jobs = $this->repository->getJobs($request->id);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'jobs' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/company/{id}/jobs/{jid}",
     *      tags={"Company"},
     *      summary="View a job",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="jid",
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
    public function viewJob( Request $request ) {

        try {

            $job = $this->repository->getJob($request->jid);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'job' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/company/{id}/jobs",
     *      tags={"Company"},
     *      summary="Create a Job",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="id",
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
     *                   @OA\Property(
     *                      property="reports_to",
     *                      description="Reports to (comma separated)",
     *                      type="string",
     *                      example="Construction Manager, Construction Director"
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
    public function createJob( Request $request )
    {

        if ( !$job = $this->repository->createJob( $request ) ) {

            return $this->apiErrorResponse(
                false,
                $this->repository->job->getErrors( true ),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput'
            );
        }

        return $this->apiSuccessResponse( compact('job'), true, 'Successfully job posted.', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/company/{id}/jobs/{jid}/requirements",
     *      tags={"Company"},
     *      summary="Post Job Requirements",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="jid",
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

        if ( !$requirements = $this->repository->saveRequirements( $request ) ) {

            return $this->apiErrorResponse(
                false,
                $this->repository->jobRequirement->getErrors(),
                self::HTTP_STATUS_INVALID_INPUT,
                'invalidInput'
            );
        }

        return $this->apiSuccessResponse( compact('requirements'), true, 'Successfully updated job requirements.', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/company/{id}/jobs/{jid}/responsibilities",
     *      tags={"Company"},
     *      summary="Post Job Responsibilities",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          in="path",
     *          name="jid",
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

    public function updateJob( Request $request )
    {

    }

    public function deleteJob( Request $request )
    {

    }

    /**
     * @OA\Get(
     *      path="/company/{id}/posts",
     *      tags={"Company"},
     *      summary="Get company posts",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="company id",
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
    public function posts( Request $request )
    {
        try {

            $posts = $this->repository->getPosts($request->id);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'posts' ), true, '', self::HTTP_STATUS_REQUEST_OK);
    }
}
