<?php

namespace App\Http\Controllers\API\V1;


/**
 * Class PasswordResetsController
 * @property PasswordReset passwordReset
 * @package App\Http\Controllers
 */
class ApiPushNotificationsController extends ApiBaseController
{
    /**
     *  Create a new controller instance.
     *
     */
    public function __construct()
    {

    }
    /**
     * @OA\Post(
     *      path="/pn/device/register",
     *      tags={"Push Notifications"},
     *      summary="Register an Android, iOs or web device for push notifications and chat. Auth Bearer authentication",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="token",
     *                      description="<b>Required</b><br />User token",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="device_token",
     *                      description="<b>Required</b><br />Device token",
     *                      type="string",
     *                  )
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Invalid Input"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function registerDevice( Request $request )
    {

        $user  = JWTAuth::toUser();

        if( ! $firebase_user = FirebaseUsers::byUserId( $user->id ) ){
            $firebase_user = new FirebaseUsers();
        }

        $r->merge(['user_id' => $user->id ]);

        if( ! $firebase_user->store( $r ) ){
            return response()->json(
                [
                    'status' => 400,
                    'error_code' => 'savingDeviceTokenFailed',
                    'message'=> $firebase_user->getErrors( true ),
                ],
                400
            );
        }

        return response()->json(
            [
                'status' => 200,
                'success' => true,
                'message'=> ' Device successfully registered'
            ],
            200
        );
    }
}
