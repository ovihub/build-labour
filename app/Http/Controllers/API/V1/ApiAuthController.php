<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\Users;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiAuthController extends ApiBaseController
{
    protected $userRepo;

    public function __construct( UserRepository $userRepo ){
        $this->userRepo = $userRepo;
    }

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
                return $this->apiErrorResponse(false, 'Invalid Credentials', self::HTTP_STATUS_BAD_REQUEST, 'invalidCredentials');
            }

        } catch (JWTException $e) {
            return $this->apiErrorResponse(false, 'Could Not Create Token '.$e->getMessage(), self::HTTP_STATUS_NOT_FOUND, 'tokenAbsent');
        
        } catch (\Exception $e) {
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        $user = JWTAuth::user();
        return $this->apiSuccessResponse( compact('user', 'token'), true, 'Login Success', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/auth/register",
     *      tags={"Auth"},
     *      summary="Register user. Creates new user, sends 'thank you' email and returns a token.",
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
     *                      example="password",
     *                  ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      description="Confirm Password",
     *                      type="string",
     *                      example="password",
     *                  ),
     *                  @OA\Property(
     *                      property="first_name",
     *                      description="First Name",
     *                      type="string",
     *                      example="Jane"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      description="Last Name",
     *                      type="string",
     *                      example="Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="dob",
     *                      description="Date of Birth (Y-m-d)",
     *                      type="date",
     *                      example="1991-01-01"
     *                  ),
     *                  @OA\Property(
     *                      property="country",
     *                      description="Country",
     *                      type="string",
     *                      example="Australia"
     *                  ),
     *                  @OA\Property(
     *                      property="mobile_number",
     *                      description="Mobile Number",
     *                      type="string",
     *                      example="+61 412345678"
     *                  ),
     *                  @OA\Property(
     *                      property="address",
     *                      description="Address",
     *                      type="string",
     *                      example="85 Dover Street Melbourne VIC"
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid Input"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal Server Error"
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Request Created"
     *      )
     * )
     */
    public function register(Request $request )
    {
        $user =  new Users;
        try {
            if( ! $user->store( $request ) ){
                return $this->apiErrorResponse( false, $user->getErrors(), self::INTERNAL_SERVER_ERROR, 'sqlError');
            }
        } catch(\Exception $e) {
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        $token = $user->getJwtToken();

        return $this->apiSuccessResponse( compact( 'user' , 'token' ), true, 'User has been registered successfully!', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/auth/email/check",
     *      tags={"Auth"},
     *      summary="Check email if exists. Used as a first step in user registration",
     *      description="",
     *      operationId="",
     *      @OA\Parameter(
     *          in="query",
     *          name="email",
     *          description="",
     *          required=true,
     *          @OA\Schema(
     *              type="string",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function checkEmail( Request $request )
    {
        if( ! filter_var( $request->email, FILTER_VALIDATE_EMAIL ) ){
            return $this->apiErrorResponse(  false , 'Invalid Email Format', 400 , 'invalidEmailFormat' );
        }

        if(  $user   = ( new User )->emailExists( $request->email ) ){
            return $this->apiSuccessResponse( ['email_exists'  =>  true  ], true , 'Email exists', 200 );
        }

        return $this->apiSuccessResponse( ['email_exists'    =>  false  ], true , 'Email does not exists', 200 );
    }

    /**
     * @OA\Get(
     *      path="/auth/user",
     *      tags={"Auth"},
     *      summary="Get authenticated user's information",
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
     *          description="Authenticated User"
     *      )
     * )
     */
    public function getAuthUser()
    {
        try {

            $user = JWTAuth::toUser();
            return $this->apiSuccessResponse(compact('user'), true, 'Authenticated User', self::HTTP_STATUS_REQUEST_OK);

        } catch (\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');

        }
    }

    /**
     * @OA\Get(
     *      path="/auth/logout",
     *      tags={"Auth"},
     *      summary="Logout user",
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
     *          description="Logout Success"
     *      )
     * )
     */
    public function logout()
    {
        try {
            $user = JWTAuth::invalidate();
            return $this->apiSuccessResponse([], true, 'Logged out successfully!', self::HTTP_STATUS_REQUEST_OK);
        } catch ( \Exception $e ) {
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

}
