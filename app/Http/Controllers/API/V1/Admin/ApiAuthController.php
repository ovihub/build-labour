<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\ApiBaseController;
use App\Models\Users\Users;
use App\Models\Users\WorkerDetail;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiAuthController extends ApiBaseController
{

    /**
     * @OA\Post(
     *      path="/auth/login",
     *      tags={"Auth"},
     *      summary="Login user. Authenticate credentials and returns a token.",
     *      security={},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="email",
     *                      description="Email Address",
     *                      type="string",
     *                      example="testuser@gmail.com"
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      description="Password",
     *                      type="string",
     *                      example="password"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Credentials"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Success"
     *      )
     * )
     */
    public function login( Request $request )
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->apiErrorResponse(false, 'Invalid Credentials', self::HTTP_STATUS_BAD_REQUEST, 'invalidInput');
            }

        } catch (JWTException $e) {
            return $this->apiErrorResponse(false, 'Could Not Create Token '.$e->getMessage(), self::HTTP_STATUS_NOT_FOUND, 'tokenAbsent');
        
        } catch (\Exception $e) {
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        $user = JWTAuth::user();
        return $this->apiSuccessResponse( compact('user', 'token'), true, 'Login Success', self::HTTP_STATUS_REQUEST_OK);
    }

}