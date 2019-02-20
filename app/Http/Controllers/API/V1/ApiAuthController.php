<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiAuthController extends ApiBaseController{
    /**
     * @OA\Post(
     *      path="/auth/register",
     *      tags={"Auth"},
     *      summary="Register user. Creates new user, sends 'thank you' email and returns a token.",
     *      description="",
     *      security={},
     *   @OA\Parameter(
     *         description="Email",
     *         in="path",
     *         name="email",
     *         required=true,
         *     @OA\Schema(
     *          type="string",
     *         ),
     *      ),
     *   @OA\Parameter(
     *         description="Registrant First Name",
     *         in="path",
     *         name="first_name",
     *         required=true,
     *     @OA\Schema(
     *          type="string",
     *         ),
     *      ),
     *   @OA\Parameter(
     *         description="Registrant Last Name",
     *         in="path",
     *         name="last_name",
     *         required=true,
     *     @OA\Schema(
     *          type="string",
     *         ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Registration Successful"
     *      )
     * )
     */
    public function register( Request $request )
    {

        // check for duplicate emails
        if(  ( new User )->emailExists( $request->email ) ){
            return $this->apiErrorResponse( false , 'User has already registered', 400 , 'userAlreadyRegistered' );
        }

        // use the Users Model
        $user =  new Users;

        try{
            if( ! $user->store( $request ) ){
                return $this->apiErrorResponse(  false , $user->getErrors( true ), 400 , 'sqlError' );
            }
        }catch ( \Exception $e ){
            return $this->apiErrorResponse(  false , $e->getMessage(), 400 , 'sqlException' );
        }

        $auth_user = ( new User )->find( $user->id );
        $token = JWTAuth::fromUser( $auth_user );

        return $this->apiSuccessResponse( [
            'token' => $token,
            'user'  => $auth_user
        ] );

    }

    /**
     * @OA\POST( path="/auth/email/check",
     *   tags={ "Auth" },
     *   summary="Register a user using an email",
     *   description="",
     *   operationId="",
     *  @OA\Parameter(
     *     in="path",
     *     name="email",
     *     description="",
     *     required=true,
     *    @OA\Schema(
     *      type="string",
     *    ),
     *
     *   ),
     *  @OA\Response(
     *      response=200,
     *      description="Successful operation"
     *   )
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
     * @OA\Post(
     *      path="/auth/login",
     *      tags={"Auth"},
     *      summary="Login user. Authenticate credentials and returns a token.",
     *      description="Login user. Authenticate credentials and returns a token.",
     *      security={},
     *  @OA\Parameter(
     *      description="Email as the username",
     *      in="path",
     *      name="email",
     *      required=true,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *  @OA\Parameter(
     *     in="path",
     *     name="password",
     *     description="",
     *     required=true,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Credentials"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Success",
     *      )
     * )
     */
    public function login( Request $request )
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);

        if( $validator->fails() ){
            return $this->apiErrorResponse( false , 'Invalid Credentials', 400 , 'invalidCredentials' );
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->apiErrorResponse( false , 'Invalid Credentials', 400 , 'invalidCredentials' );
            }
        } catch (JWTException $e) {
            return $this->apiErrorResponse( false , $e->getMessage(), 400 , 'jwtException' );
        } catch (\Exception $e) {
            return $this->apiErrorResponse( false , $e->getMessage(), 400 , 'generalException' );
        }

        // All good so return user data & token
        $auth_user   = JWTAuth::user();

        return $this->apiSuccessResponse( ['user' =>  $auth_user, 'token' => $token  ], true , 'Login Successful', 200 );
    }

}