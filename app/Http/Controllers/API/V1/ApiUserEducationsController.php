<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\Education;
use Illuminate\Http\Request;
use JWTAuth;

class ApiUserEducationsController extends ApiBaseController
{
    /**
     * @OA\Post(
     *      path="/user/education",
     *      tags={"User Education"},
     *      summary="Add a user education",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="course",
     *                      description="<b>Required</b> Course",
     *                      type="string",
     *                      example="Bachelor of Psychology"
     *                  ),
     *                  @OA\Property(
     *                      property="school",
     *                      description="<b>Required</b> School",
     *                      type="string",
     *                      example="University of Melbourne"
     *                  ),
     *                  @OA\Property(
     *                      property="start_date",
     *                      description="<b>Required</b> Start Date",
     *                      type="string",
     *                      example="2007/10/11"
     *                  ),
     *                  @OA\Property(
     *                      property="end_date",
     *                      description="<b>Required</b> End Date",
     *                      type="string",
     *                      example="2012/12/01"
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
        $education->setUserId($user->id);

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
     *      path="/user/education/{id}",
     *      tags={"User Education"},
     *      summary="Update a user education",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Education Id",
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
     *                      property="course",
     *                      description="<b>Required</b> Course",
     *                      type="string",
     *                      example="Bachelor of Amateur Psychology"
     *                  ),
     *                  @OA\Property(
     *                      property="school",
     *                      description="<b>Required</b> School",
     *                      type="string",
     *                      example="University of Victoria"
     *                  ),
     *                  @OA\Property(
     *                      property="start_date",
     *                      description="<b>Required</b> Start Date",
     *                      type="string",
     *                      example="2007/10/11"
     *                  ),
     *                  @OA\Property(
     *                      property="end_date",
     *                      description="<b>Required</b> End Date",
     *                      type="string",
     *                      example="2012/12/01"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="Where I study 5 years on this course."
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
     *      path="/user/education/{id}",
     *      tags={"User Education"},
     *      summary="Delete a Education",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Education ID",
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