<?php

namespace App\Http\Controllers\API\V1;

use App\Repositories\PasswordResetRepository;
use App\Validators\ResetPasswordValidator;
use App\Validators\MailValidator;
use App\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class PasswordResetsController
 * @property PasswordReset passwordReset
 * @package App\Http\Controllers
 */
class ApiPasswordResetsController extends ApiBaseController
{
    const MODEL = 'user';

    protected $passwordResetRepo;

    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(PasswordReset $passwordReset, PasswordResetRepository $passwordResetRepo)
    {        
        $this->passwordReset = $passwordReset;
        $this->passwordResetRepo = $passwordResetRepo;
    }

    /**
     * @OA\Post(
     *      path="/api/v1/password/email",
     *      tags={"Password"},
     *      summary="Send reset password email with token",
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
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function sendResetLinkEmail(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), MailValidator::rules(), MailValidator::messages());
            
            if ($validator->fails()) {
                return $this->apiErrorResponse(false, $validator->errors()->first(), self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');
            }

            $responseData = $this->passwordResetRepo->sendResetLinkEmail($request->get('email'));

            return $this->checkResponseData(self::MODEL, $responseData, 'Password reset email has been sent successfully!');

        } catch(\Exception $e) {
            
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }

    /**
     * @OA\Post(
     *      path="/api/v1/password/reset",
     *      tags={"Password"},
     *      summary="Reset user's password",
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
     *                  ),
     *                  @OA\Property(
     *                      property="token",
     *                      description="Reset Token",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="password",
     *                      description="Password",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="password_confirmation",
     *                      description="Confirm Password",
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
     *          response=404,
     *          description="Reset Token Not Found"
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
    public function resetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ResetPasswordValidator::rules(), ResetPasswordValidator::messages());
            
            if ($validator->fails()) {
                return $this->apiErrorResponse(false, $validator->errors()->first(), self::HTTP_STATUS_INVALID_INPUT, 'invalidInput');
            }

            $responseData = $this->passwordResetRepo->resetPassword($request);

            return $this->checkResponseData(self::MODEL, $responseData, 'Password has been changed successfully!');

        } catch(\Exception $e) {
            
            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }
    }
    
}
