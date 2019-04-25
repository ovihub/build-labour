<?php

namespace App\Http\Controllers\API\V1;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\Users\UserSkill;

class ApiUserSkillsController extends ApiBaseController
{

    /**
     * @var UserRepository
     */
    protected $userRepo;

    public function __construct(UserRepository $repository) {

        $this->userRepo = $repository;
    }

    /**
     * @OA\Post(
     *      path="/user/skill",
     *      tags={"User Skill"},
     *      summary="Add a user skill",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="skill",
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

        return $this->apiSuccessResponse( compact( 'skill' ), true, 'Successfully Added a Skill', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\POST(
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
     *                      property="skill",
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

        try {

            $skills = $this->userRepo->saveSkills($request);

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'skills' ), true, 'Successfully updated worker skills', self::HTTP_STATUS_REQUEST_OK);
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

        $skill = UserSkill::find($request->id);

        if (!$skill) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $skill->delete();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'skill' ), true, 'Successfully deleted a Skill', self::HTTP_STATUS_REQUEST_OK);
    }
}
