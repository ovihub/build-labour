<?php
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Base Plate API",
 *      description="http://appetiser.com.au/",
 *      @OA\Contact(
 *          name="API Support",
 *          email="dennis.agulo@appetiser.com.au"
 *      )
 * )
 */

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use JWTAuth;

class ApiBaseController extends Controller
{
    protected $response = [];
    protected $user;

    /**
     * Standard format for successful API requests
     * @param $data
     * @param $success
     * @param $message
     * @param $http_status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiSuccessResponse( $data, $success = true , $message = '', $http_status = 200 )
    {
        return response()->json(compact( 'data', 'success', 'message', 'http_status' ), $http_status);
    }

    /**
     * Standard format for error API requests
     *
     * @param $success
     * @param $message
     * @param $http_status
     * @param $error_code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function apiErrorResponse( $success = false , $message, $http_status , $error_code = null )
    {
        return response()->json( compact( 'success', 'message', 'http_status', 'error_code' ), $http_status);
    }


    protected function authenticate( Request $r )
    {
        try {
            if ( ! $user = JWTAuth::authenticate( $r->token ) ) {
                $this->response = [
                    'status' => 404,
                    'error_code' => 'userNotFound',
                    'message'=>'User not found'
                ];
                return false;
            }

        }catch( TokenExpiredException $e) {

            $this->response = [
                'status' => 404,
                'error_code' => 'tokenExpired',
                'message'=>'Token expired'
            ];
            return false;

        } catch ( TokenInvalidException  $e) {

            $this->response = [
                'status' => 404,
                'error_code' => 'invalidToken',
                'message'=>'Invalid Token'
            ];
            return false;

        } catch (JWTException $e ) {

            $this->response = [
                'status' => 404,
                'error_code' => 'tokenAbsent',
                'message'=>'Token Absent '
            ];
            return false;

        }catch (\Exception $e ) {

            $this->response     =   [
                'status' => 404,
                'error_code' => 'Unknown Error',
                'message'=>'Unknown error'
            ];
            return false;
        }
        // the token is valid and we have found the user via the sub claim
        return $user;
    }

}