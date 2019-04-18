<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Users\Ticket;
use Illuminate\Http\Request;
use JWTAuth;

class ApiUserTicketsController extends ApiBaseController
{

    /**
     * @OA\Post(
     *      path="/user/ticket",
     *      tags={"User Ticket"},
     *      summary="Add a Ticket",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="ticket",
     *                      description="<b>Required</b> Title",
     *                      type="string",
     *                      example="Certificate of HR"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="A certified HR Resource Master"
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
    public function add( Request $request )
    {

        $user = JWTAuth::toUser();

        $ticket = new Ticket();
        $ticket->setUserId($user->id);

        try {

            if( !$ticket->store($request) ){

                return $this->apiErrorResponse(
                    false,
                    $ticket->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $ticket->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'workExp' ), true, 'Successfully added a Ticket!', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Put(
     *      path="/user/ticket/{id}",
     *      tags={"User Ticket"},
     *      summary="Update a ticket",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Ticket Id",
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
     *                      property="ticket",
     *                      description="<b>Required</b> Title",
     *                      type="string",
     *                      example="Certificate of HRA"
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      description="<b>Required</b> Company",
     *                      type="string",
     *                      example="A certified HR Resource Associate"
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
    public function update( Request $request )
    {

        $user = JWTAuth::toUser();
        $ticket = Ticket::find($request->id);

        if (!$ticket) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $ticket->setUserId($user->id);

            if (!$ticket->store($request)) {

                return $this->apiErrorResponse(
                    false,
                    $ticket->getErrors( true ),
                    self::HTTP_STATUS_INVALID_INPUT,
                    'invalidInput',
                    $ticket->getErrorsDetail()
                );
            }

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'ticket' ), true, 'Successfully updated a ticket', self::HTTP_STATUS_REQUEST_OK);
    }

    /**
     * @OA\Delete(
     *      path="/user/ticket/{id}",
     *      tags={"User Ticket"},
     *      summary="Delete a ticket",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          description="Ticket ID",
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
    public function delete( Request $request )
    {

        $ticket = Ticket::find($request->id);

        if (!$ticket) {

            return $this->apiErrorResponse( false, 'Something wrong.', 400 , 'internalServerError' );
        }

        try {

            $ticket->delete();

        } catch(\Exception $e) {

            return $this->apiErrorResponse(false, $e->getMessage(), self::INTERNAL_SERVER_ERROR, 'internalServerError');
        }

        return $this->apiSuccessResponse( compact( 'ticket' ), true, 'Successfully deleted a ticket', self::HTTP_STATUS_REQUEST_OK);
    }
}
