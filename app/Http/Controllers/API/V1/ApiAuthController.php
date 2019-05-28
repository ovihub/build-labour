<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\Users;
use App\Models\Users\WorkerDetail;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiAuthController extends ApiBaseController
{
    protected $userRepo;

    public function __construct( UserRepository $userRepo ) {

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

    /**
     * @OA\Post(
     *      path="/auth/register",
     *      tags={"Auth"},
     *      summary="Register user as worker, sends 'thank you' email and returns a token.",
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
     *                      property="signup_type",
     *                      description="value must be employer or worker",
     *                      type="string",
     *                      example="worker"
     *                  ),
     *                  @OA\Property(
     *                      property="last_name",
     *                      description="Last Name",
     *                      type="string",
     *                      example="Doe"
     *                  ),
     *                  @OA\Property(
     *                      property="date_of_birth",
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
     *                      example="6141234567"
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
    public function register( Request $request )
    {
        $user = new Users;

        try {

            if( ! $user->store( $request ) ){
                return $this->apiErrorResponse( false, $user->getErrors( true ), self::HTTP_STATUS_INVALID_INPUT, 'invalidInput', $user->getErrorsDetail());
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        $token = $user->getJwtToken();

        return $this->apiSuccessResponse( compact( 'user' , 'token' ), true, 'User has been registered successfully!', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Post(
     *      path="/auth/company/register",
     *      tags={"Auth"},
     *      summary="User register as Employer",
     *      security={},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="email",
     *                      description="Email Address",
     *                      type="string",
     *                      example="testuser@gmail.com"
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
     *                      property="mobile_number",
     *                      description="Mobile Number",
     *                      type="string",
     *                      example="6141234567"
     *                  ),
     *                  @OA\Property(
     *                      property="address",
     *                      description="Address",
     *                      type="string",
     *                      example="85 Dover Street Melbourne VIC"
     *                  ),
     *                  @OA\Property(
     *                      property="company_name",
     *                      description="Company Name",
     *                      type="string",
     *                      example="Sample Company"
     *                  ),
     *                  @OA\Property(
     *                      property="company_business_entity_type",
     *                      description="Business Entity Type",
     *                      type="string",
     *                      example="Networking"
     *                  ),
     *                  @OA\Property(
     *                      property="company_entity_type_specialization",
     *                      description="Entity Type Specialization",
     *                      type="string",
     *                      example="Networking"
     *                  ),
     *                  @OA\Property(
     *                      property="company_address",
     *                      description="Company Main Address",
     *                      type="string",
     *                      example="51st St. John Avenue, AU"
     *                  ),
     *                  @OA\Property(
     *                      property="company_contact_number",
     *                      description="Company Contact Number",
     *                      type="string",
     *                      example="123456789"
     *                  ),
     *                  @OA\Property(
     *                      property="company_operate_outside_states",
     *                      description="Company Can operate outside states",
     *                      type="boolean",
     *                      example=true
     *                  ),
     *                  @OA\Property(
     *                      property="company_website",
     *                      description="Company Website",
     *                      type="string",
     *                      example="www.sample.com"
     *                  ),
     *                  @OA\Property(
     *                      property="company_states",
     *                      type="array",
     *                      @OA\Items(
     *                         type="string",
     *                         example="VIC"
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="company_specialization",
     *                      type="array",
     *                      @OA\Items(
     *                          @OA\Property(
     *                              property="name",
     *                              type="string",
     *                              example="consultation"
     *                          ),
     *                      ),
     *                  ),
     *                  @OA\Property(
     *                      property="company_photo",
     *                      description="Company Photo",
     *                      type="string",
     *                      example="data:image/png;base64,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"
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
    public function registerCompany( Request $request )
    {

        DB::beginTransaction();

        try {

            if (!$data = $this->userRepo->registerCompany($request)) {

                DB::rollBack();

                return $this->apiErrorResponse(
                    false,
                    $this->userRepo->user->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $this->userRepo->user->getErrorsDetail()
                );
            }


        } catch(\Exception $e) {

            DB::rollBack();

            return $this->apiErrorResponse(
                false,
                $e->getMessage(),
                self::INTERNAL_SERVER_ERROR, 'internalServerError'
            );

        }

        DB::commit();
      //  $token = $user->getJwtToken();

        return $this->apiSuccessResponse( $data, true, 'User has been registered successfully!', self::HTTP_STATUS_REQUEST_OK);
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
            $message = 'Invalid Email Format';
            return $this->apiErrorResponse(  false , $message, 422, 'invalidInput', array('email' => [$message]) );
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
            $user->experiences;
            $user->role;
            $user->skills;
            $user->educations;
            $user->workerDetail;
            $user->tickets;

            $user->experiences->map(function($e) {

            });

            if (!$user->workerDetail) {

                WorkerDetail::create(['user_id' => $user->id]);
            }

            if ($user->workerDetail) {

                $user->workerDetail->education;
            }

        } catch (\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('user'), true, 'Authenticated User', 200 );
    }

    /**
     * @OA\Post(
     *      path="/auth/verify",
     *      tags={"Auth"},
     *      summary="Verify a user after registration ",
     *      description="A 6 character verification code will be sent through email",
     *      operationId="",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="uid",
     *                      description="<b>Required</b> User ID",
     *                      type="string",
     *                      example="141203"
     *                  ),
     *                  @OA\Property(
     *                      property="verification_code",
     *                      description="<b>Required</b> Verification Code",
     *                      type="string",
     *                      example="",
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function verify( Request $request )
    {
        // Another option of using raw $request->user_id is to convert the user id using \Helpers\Utils::convertInt().
        // Emails can also be used instead of user id if the emails are unique and possibly used as usernames.
        $user = User::find( $request->uid );

        if( ! $user ) {
            $message = 'Invalid User ID';
            return $this->apiErrorResponse( false, $message, 400 , 'invalidInput', array('verification' => [$message]) );
        }

        if( ! $user->verify( $request->verification_code ) ){
            return $this->apiErrorResponse( false, $user->getErrors( true ), 400 , 'invalidInput', $user->getErrorsDetail() );
        }

        $token = JWTAuth::fromUser( $user );

        return $this->apiSuccessResponse( compact( 'user', 'token' ), true, 'Account Verified', 200 );

    }

    /**
     * @OA\Get(
     *      path="/auth/company",
     *      tags={"Auth"},
     *      summary="User is a company",
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

    public function company( Request $request ) {

        try {

            $company = $this->userRepo->company();

            if (!$company) {

                return $this->apiErrorResponse( false, 'no company', self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');

            }

        } catch (\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse(compact('company'), true, 'Authenticated Company User', 200 );
    }

    /**
     * @OA\Post(
     *      path="/auth/verification/resend",
     *      tags={"Auth"},
     *      summary="Resend verification code",
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
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid Input"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid Token / Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Token Expired"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="User Not Found / Token Not Found"
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
    public function resendVerificationCode(Request $request)
    {
        if( ! filter_var( $request->email , FILTER_VALIDATE_EMAIL)) {

            $message = 'Invalid Email';
            return $this->apiErrorResponse( false, $message, self::HTTP_STATUS_INVALID_INPUT, 'invalidEmail', array('verification' => [$message]) );
        }

        // On instances that emails are not used as usernames or identifiers then
        // you may also use user id for identification

        $user = ( new Users )->emailExists( $request->email );

        if( ! $user ){
            $message = 'Email does not exists';
            return $this->apiErrorResponse(false, $message, self::HTTP_STATUS_INVALID_INPUT, 'invalidInput', array('verification' => [$message]) );
        }

        if( $user->is_verified ){
            $message = 'User already verified';
            return $this->apiErrorResponse(false, $message, self::HTTP_STATUS_INVALID_INPUT, 'userAlreadyVerified', array('verification' => [$message]) );
        }

        if( ! $user->resendVerificationCode() ){
            return $this->apiErrorResponse(false, $user->getErrors( true ) , self::HTTP_STATUS_INVALID_INPUT, 'verificationCodeError', array('verification' => ['something wrong']));
        }

        return $this->apiSuccessResponse( [], true, 'Verification code successfully sent to email', self::HTTP_STATUS_REQUEST_OK);
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
        } catch ( \Exception $e ) {
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse([], true, 'Logged out successfully!', self::HTTP_STATUS_REQUEST_OK);

    }

}