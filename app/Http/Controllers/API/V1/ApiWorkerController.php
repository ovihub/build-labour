<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\WorkExperience;
use Illuminate\Http\Request;
use JWTAuth;

class ApiWorkerController extends ApiBaseController
{

    /**
     * @OA\Post(
     *      path="/worker/next-role",
     *      tags={"Worker"},
     *      summary="Update worker next role",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="introduction",
     *                      description="Ideal next role",
     *                      type="string",
     *                      example="My next target is as CEO"
     *                  ),
     *                  @OA\Property(
     *                      property="when",
     *                      description="When or what date",
     *                      type="string",
     *                      example="Next 2 years"
     *                  ),
     *                  @OA\Property(
     *                      property="max_distance",
     *                      description="Distance from home",
     *                      type="string",
     *                      example="100km"
     *                  ),
     *                  @OA\Property(
     *                      property="address",
     *                      description="Address",
     *                      type="string",
     *                      example="21st corner st conwalum"
     *                  ),
     *                  @OA\Property(
     *                      property="state",
     *                      description="State",
     *                      type="string",
     *                      example="VIC"
     *                  ),
     *                  @OA\Property(
     *                      property="right_to_work",
     *                      description="right to work in Australia?",
     *                      type="string",
     *                      example="yes, i have right to work"
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
    public function updateNextRole( Request $request )
    {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            if( !$user->workerDetail->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $user->workerDetail->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $user->workerDetail->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( [ 'worker_detail' => $user->workerDetail ], true, 'Successfully updated worker details', self::HTTP_STATUS_REQUEST_OK);
    }


    /**
     * @OA\Post(
     *      path="/worker/about-me",
     *      tags={"Worker"},
     *      summary="Update worker about me",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="profile_description",
     *                      description="About me",
     *                      type="string",
     *                      example="Experienced Senior Project Manager; demonstrated history of working on a wide range of construction projects for leading companies."
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
    public function updateAboutMe( Request $request )
    {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            if( !$user->workerDetail->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $user->workerDetail->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $user->workerDetail->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }


        return $this->apiSuccessResponse( [ 'worker_detail' => $user->workerDetail ], true, 'Successfully updated worker details', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/worker/experiences",
     *      tags={"Worker"},
     *      summary="Worker Employment History / Experiences",
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
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Experiences"
     *      )
     * )
     */
    public function experiences() {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        $experiences = $user->experiences;

        $experiences->map(function($exp) {

            $exp->responsibilities;
        });

        return $this->apiSuccessResponse( compact('experiences'), true, 'Successfully updated worker details', self::HTTP_STATUS_REQUEST_OK);
    }
}
