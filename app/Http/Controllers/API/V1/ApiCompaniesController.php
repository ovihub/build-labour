<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Companies\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use JWTAuth;

class ApiCompaniesController extends ApiBaseController
{

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
     * @OA\Post(
     *      path="/company",
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
    public function update( Request $request )
    {

        $user = JWTAuth::toUser();
        $company = $user->company;

        if (!$company) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

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

        return $this->apiSuccessResponse( compact( 'company' ), true, 'Successfully registered a company', self::HTTP_STATUS_REQUEST_OK);
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
