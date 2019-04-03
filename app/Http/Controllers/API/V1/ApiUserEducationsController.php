<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\Education;
use Illuminate\Http\Request;
use JWTAuth;

class ApiUserEducationsController extends ApiBaseController
{
    /**
     * @OA\Post(
     *      path="/user/educations",
     *      tags={"User Educations"},
     *      summary="Add a user education",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      description="<b>Required</b> Job Role",
     *                      type="string",
     *                      example="Bachelor of Psychology"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="Where I study 4 years on this course."
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
    public function add(Request $request)
    {

        $user = JWTAuth::toUser();

        $education = new Education();
        $education->setId($user->id);

        try {

            if (!$education->store($request)) {

                return $this->apiErrorResponse(
                    false,
                    $education->getErrors(true),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $education->getErrorsDetail()
                );
            }

        } catch (\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('education'), true, 'Successfully Added an Education', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Put(
     *      path="/user/skill/{id}",
     *      tags={"User Skill"},
     *      summary="Update a user skill",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Skill Id",
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
     *                      property="name",
     *                      description="<b>Required</b> Job Role",
     *                      type="string",
     *                      example="Proficient in Spanish"
     *                  ),
     *          @OA\Property(
     *                      property="description",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="Able to handle client with spanish confidently."
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
     *      )
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
    public function update(Request $request)
    {

        $user = JWTAuth::toUser();

        $education = Education::find($request->id);

        if (!$education) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $education->setUserId($user->id);

            if( !$education->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $education->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $education->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'skill' ), true, 'Successfully updated a Education', self::HTTP_STATUS_REQUEST_OK);
    }


    /**
     * @OA\Delete(
     *      path="/user/skill/{id}",
     *      tags={"User Skill"},
     *      summary="Delete a user skill",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Skill Id",
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
    public function delete(Request $request)
    {

        $education = Education::find($request->id);

        if (!$education) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $education->delete();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'education' ), true, 'Successfully deleted a Skill', self::HTTP_STATUS_REQUEST_OK);
    }
}
