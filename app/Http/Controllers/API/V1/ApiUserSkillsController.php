<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Users\UserSkill;

class ApiUserSkillsController extends ApiBaseController
{

    /**
     * @OA\Post(
     *      path="/user/skill",
     *      tags={"User Skills"},
     *      summary="Add a user skill",
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
     *                      example="Team Effort"
     *                  ),
     *          @OA\Property(
     *                      property="description",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="A Team player with a passion."
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
        $skill = new UserSkill();
        $skill->setUserId($user->id);

        try {

            if( !$skill->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $skill->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $skill->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'Successfully Added a Skill', self::HTTP_STATUS_REQUEST_OK);
    }
}
