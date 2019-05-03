<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Skills\Level;
use App\Models\Users\WorkExperience;
use App\Repositories\SkillRepository;
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

    public function deleteNextRole( Request $request )
    {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $user->workerDetail->isForDelete = true;

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

        return $this->apiSuccessResponse( [ 'worker_detail' => $user->workerDetail ], true, 'Successfully deleted worker ideal role', self::HTTP_STATUS_REQUEST_OK);
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
     * @OA\Post(
     *      path="/worker/optional",
     *      tags={"Worker"},
     *      summary="Update Worker optional information",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="first_name",
     *                      description="First Name",
     *                      type="string",
     *                      example="Chris"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      description="Last Name",
     *                      type="string",
     *                      example="Webber"
     *                  ),
     *                  @OA\Property(
     *                      property="address",
     *                      description="Address",
     *                      type="string",
     *                      example="200 St. Southern Lane Avenue."
     *                  ),
     *                  @OA\Property(
     *                      property="profile_description",
     *                      description="Profile Description",
     *                      type="string",
     *                      example="Good worker"
     *                  ),
     *                  @OA\Property(
     *                      property="gender",
     *                      description="Gender",
     *                      type="string",
     *                      example="Male"
     *                  ),
     *                  @OA\Property(
     *                      property="date_of_birth",
     *                      description="Date of Birth",
     *                      type="string",
     *                      example="1988-10-08"
     *                  ),
     *                  @OA\Property(
     *                      property="marital_status",
     *                      description="Marital Status",
     *                      type="string",
     *                      example="Married"
     *                  ),
     *                  @OA\Property(
     *                      property="english_skill",
     *                      description="english_skill",
     *                      type="string",
     *                      example="Excellent in English"
     *                  ),
     *                  @OA\Property(
     *                      property="drivers_license",
     *                      description="Drivers License",
     *                      type="string",
     *                      example="I have a professional drivers license."
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
    public function updateOptional( Request $request )
    {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            if( !$user->workerDetail->store($request)){

                return $this->apiErrorResponse(
                    false,
                    $user->workerDetail->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $user->workerDetail->getErrorsDetail()
                );
            }

            $user->isOptionalTransaction = true;

            if( !$user->store($request)){

                return $this->apiErrorResponse(
                    false,
                    $user->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $user->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        $optional = $request->all();

        return $this->apiSuccessResponse( compact('optional'), true, 'Successfully updated worker details', self::HTTP_STATUS_REQUEST_OK);
    }

    public function updateIntroduction( Request $request )
    {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $user->workerDetail->isIntroductionUpdate = true;

            if( !$user->workerDetail->store($request)){

                return $this->apiErrorResponse(
                    false,
                    $user->workerDetail->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $user->workerDetail->getErrorsDetail()
                );
            }

            $user->isForIntroduction = true;

            if( !$user->store($request)){

                return $this->apiErrorResponse(
                    false,
                    $user->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $user->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        $introduction = $request->all() + ['education' => $user->WorkerDetail->Education ];

        return $this->apiSuccessResponse( compact('introduction'), true, 'Successfully updated worker details', self::HTTP_STATUS_REQUEST_OK);
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

    public function educations() {

        $user = JWTAuth::toUser();

        if (!$user->workerDetail) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        $educations = $user->educations;

        return $this->apiSuccessResponse( compact('educations'), true, 'Successfully retrieved worker educations', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Get(
     *      path="/worker/skill-options",
     *      tags={"Worker"},
     *      summary="Skill Options Default",
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
    public function skillOptions(SkillRepository $repo) {

        $skills = $repo->all();
        $levels = Level::all();
        return $this->apiSuccessResponse( compact('skills', 'levels'), true, 'Success', self::HTTP_STATUS_REQUEST_OK);
    }
}