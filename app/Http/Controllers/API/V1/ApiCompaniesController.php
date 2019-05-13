<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Companies\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
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
     *          description="id",
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

            $company = $this->repository->find($request->get('id'));

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
     *      path="/company/{id}/jobs",
     *      tags={"Company"},
     *      summary="Get company jobs",
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
     *      path="/company/{id}/workers",
     *      tags={"Company"},
     *      summary="Get company workers",
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

        if( !$photoUrl = $this->repository->uploadPhoto( $request ) ){
            return $this->apiErrorResponse(false, $this->repository->company->getErrors( true ), self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');
        }

        return $this->apiSuccessResponse([ 'photo_url' => $photoUrl ], true, 'Profile Photo Uploaded Successfully ', self::HTTP_STATUS_REQUEST_OK);
    }

    public function addJob( Request $request )
    {

    }

    public function updateJob( Request $request )
    {

    }

    public function deleteJob( Request $request )
    {

    }
}
