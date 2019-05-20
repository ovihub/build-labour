<?php


namespace App\Http\Controllers\Api\V1;

use App;
use App\Interfaces\ChatServices\ChatServiceInterface;
use App\Interfaces\ChatServices\Drivers\FirebaseChatService;
use App\Models\Communication\ChatChannelMembers;
use App\Models\Communication\ChatChannels;
use App\Models\Communication\ChatHistory;
use App\Models\Connections\Connections;
use App\Models\Users\Users;
use Helpers\Utils;
use Illuminate\Http\Request;

class ApiChatController extends ApiBaseController{

    /*
     * ChatServiceInterface
     */
    private  $chat_service;

    public function __construct(){
//        //$this->chat_service = \App::make('ChatServiceInterface');
//        $this->chat_service = $chat_service;
        $s = 'Firebase';
        App::bind( 'ChatServiceInterface', function( $app ) use($s)
        {
            switch( $s ){
                case 'Socket.io':
                    break;
                case 'Pusher':
                    break;
                case 'Firebase':
                default:
                    return new FirebaseChatService();
                    break;
            }
        });

        $this->chat_service = App::make('ChatServiceInterface');
    }

    /**
     * @OA\Post(
     *      path="/chat/send",
     *      tags={"Chat"},
     *      summary="Send a chat message",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="channel_id",
     *                      description="<b>Required</b><br /> Channel ID where message will be sent",
     *                      type="integer",
     *                  ),
     *                  @OA\Property(
     *                      property="message",
     *                      description="<b>Required</b><br /> Chat message",
     *                      type="string",
     *                  )
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function send( Request $r )
    {
        if( ! $user  = JWTAuth::toUser() ){
            return $this->apiErrorResponse( false, 'Invalid JWT Token', 400 , 'invalidToken' );
        }

        $sender_id      =   $user->id;

        if( ! $r->message ){
            return $this->apiErrorResponse( false, 'Message must not be empty', 400 , 'messageRequired' );
        }

        if( ! $r->channel_id ){
            return $this->apiErrorResponse( false, 'Channel ID is required', 400 , 'channelIDRequired' );
        }

        if( ! $channel = ChatChannels::find( $r->channel_id ) ){
            return $this->apiErrorResponse( false, 'Channel not found', 400 , 'channelNotFound' );
        }

        // if connection_id is present then
        // chat message will be sent to a single user
        if( $channel->connection_id ){
            // check if user is part of the connection
            if( ! $connection = Connections::find( $channel->connection_id ) ){
                return $this->apiErrorResponse( false, 'Channel connection not found', 400 , 'channelConnectionNotFound' );
            }

            if( $connection->status != 'active' ){
                return $this->apiErrorResponse( false, 'Channel connection not active', 400 , 'connectionNotActive' );
            }

            if( ! $connection->isPart( $user->id ) ){
                return $this->apiErrorResponse( false, 'Message sender is not a part of connection '.$connection->connection_id, 400 , 'userNotConnected' );
            }

            $recipient      =   $connection->theOther( $user->id );
            $recipient_id   =   $recipient;

            \DB::beginTransaction();
            $r->merge( [ 'channel_id' => $channel->channel_id ,   'message' => $r->message, 'sent_by' => $user->id  ] );

            if( ! $chat_history = ( new ChatHistory )->store( $r ) ){
                \DB::rollback();
                return $this->apiErrorResponse( false, 'Saving Chat Failed : '.$chat_history->getErrors( true ), 400 , 'savingChatFailed' );
            }

            $channel->last_message_at   = date( 'Y-m-d H:i:s');
            $channel->last_message      = $r->message;

            try{
                $channel->save();
            }catch( \Exception $e ){
                \DB::rollback();
                return $this->apiErrorResponse( false, $e->getMessage(), 400 , 'savingChannelException' );
            }

            try{
                $connection->saveLastMessage( $sender_id, $r->message );
            }catch( \Exception $e ){
                \DB::rollback();
                return $this->apiErrorResponse( false, $e->getMessage(), 400 , 'lastMessageException' );
            }

            $chat_data = [
                'pn_type'       =>  'chat',
                'channel_id'    =>  $r->channel_id,
                'sender_id'     =>  $sender_id,
                'recipient_id'  =>  $recipient_id,
                'sender_name'   =>  $user->first_name,
                'title' => $user->first_name,
                'sound' => 'message.wav'
            ];

            // update the unread count
            try{
                ChatChannelMembers::updateRecipientUnreadCount( $channel->channel_id , $recipient_id );
            }catch( \Exception $e ){
                \DB::rollback();
                return $this->apiErrorResponse( false, $e->getMessage(), 400 , 'updateUnreadCountException' );
            }

            // add unread chat count to recipient
            $user_recipient = ( new Users )->f( $recipient_id )->addChatUnreadCount();
            $badge  = $user_recipient->unread_chat;

            \DB::commit();

            if( ! $response  =   $this->chat_service->sendMessageToUser(  $recipient_id, $sender_id, $r->message , $chat_data , $badge ) ){
                return $this->apiSuccessResponse( ['chat_message' => $chat_history ], true, 'Message successfully saved but failed to send to chat service. Recipient might not be signed in' );
            }

            $data   =  [
                    'chat_message' => $chat_history,
                    'response' => $response,
                    'recepient_id'=>    $recipient_id,
                    'sender_id' => $sender_id,
                ];

            return $this->apiSuccessResponse(  $data , true, 'Message successfully saved' );


        }else{
            // @TODO code here for channels having multiple members

        }

    }

    /**
     * @OA\Post(
     *      path="/chat/reset_unread",
     *      tags={"Chat"},
     *      summary="Given a channel id, reset the unread count of the user",
     *      security={{"BearerAuth":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(
     *                  type="object",
     *                  @OA\Property(
     *                      property="channel_id",
     *                      description="<b>Required</b><br /> Channel ID ",
     *                      type="integer",
     *                  )
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function resetUnread( Request $r )
    {
        if( ! $user  = JWTAuth::toUser() ){
            return $this->apiErrorResponse( false, 'Invalid JWT Token', 400 , 'invalidToken' );
        }

        if( ! $r->channel_id ){
            return $this->apiErrorResponse( false, 'Invalid Chat Channel', 400 , 'invalidChatChannel' );
        }

        try{
            if( ! ChatChannelMembers::seen( $r->channel_id , $user->id ) ){
                return $this->apiErrorResponse( false, 'Invalid Chat Channel', 400 , 'invalidChatChannel' );
            }
        }catch( \Exception $e ){
            return $this->apiErrorResponse( false, $e->getMessage(), 400 , 'generalException' );
        }

        return $this->apiSuccessResponse([], true, 'Resetting unread count successful');
    }

    /**
     * @OA\GET(
     *      path="/chat/unread/count",
     *      tags={"Chat"},
     *      summary="Get the number of channels that has unread messages",
     *      security={{"BearerAuth":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function unReadCount( Request $r )
    {
        if( ! $user  = JWTAuth::toUser() ){
            return $this->apiErrorResponse( false, 'Invalid JWT Token', 400 , 'invalidToken' );
        }
        // get all channels of the user
        $r->merge( [ 'member_id' => $user->id ] );
        $channel_ids = ( new ChatChannelMembers() )
            ->getCollection( $r )->pluck( 'channel_id' );

        $messages = [];
        if( count( $channel_ids ) ){
            $messages = ChatHistory::whereIn( 'channel_id' , $channel_ids )
                ->where( 'sent_by' , '!=' , $user->id  )
                ->get();
        }

        $data = [
            'messages' => $messages,
            'channels' => $channel_ids
        ];

        return $this->apiSuccessResponse( $data, true, ' ' );

    }

    /**
     * @OA\GET(
     *      path="/chat/history",
     *      tags={"Chat"},
     *      summary="Get the number of channels that has unread messages",
     *      security={{"BearerAuth":{}}},
     *      @OA\Parameter(
     *          description="Channel ID",
     *          in="query",
     *          name="channel_id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          description="Date format (yyyy-mm-dd hh:ii:ss). Returns only the messages after the given date ",
     *          in="query",
     *          name="after",
     *          required=false,
     *          @OA\Schema(
     *              type="dateTime",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          description="Number of messages returned per query. Max 200",
     *          in="query",
     *          name="limit",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Parameter(
     *          description="Offset to query older messages",
     *          in="query",
     *          name="page",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Request OK"
     *      )
     * )
     */
    public function historyByChannel( Request $r )
    {
        if( ! $user = $this->authenticate( $r )){
            return response()->json( $this->response , $this->response['status'] );
        }

        if( ! $r->channel_id ){
            return response()->json(
                [
                    'status' => 400,
                    'error_code' => 'channelIDNotFound',
                    'message'=> 'Channel ID is required',
                ],
                400
            );
        }
        // check if user is a member of the channgel
        if( ! $channel = ChatChannels::find( $r->channel_id ) ){
            return response()->json(
                [
                    'status' => 400,
                    'error_code' => 'channelNotFound',
                    'message'=> 'Channel not found',
                ],
                400
            );
        }

        if( ! $channel_member = $channel->isMember( $user->id ) ){
            return response()->json(
                [
                    'status' => 400,
                    'error_code' => 'userNotChannelMember',
                    'message'=> 'User is not a channel member',
                    'data' => [
                        'channel' => $channel,
                        'user_id' => $user->id
                    ]
                ],
                400
            );
        }

        $channel_member->last_seen_at = date( 'Y-m-d H:i:s' );
        $channel_member->save();

        $limit = 20;
        if( $r->limit ){
            $limit = $r->limit > 200 ? 200 :  $r->limit;
        }

        $order_by = $r->order_by ? $r->order_by : 'sent_at';
        $order_direction = $r->order_direction ? $r->order_direction : 'DESC';

        $r->merge( [ 'order_by' => $order_by, 'order_direction'=> $order_direction,
            'limit' => $limit , 'with_sender'=>1 ] );

        $messages = new ChatHistory;

        ChatChannelMembers::seen( $channel->channel_id , $user->id );

        return response()->json(
            [
                'status' => 200,
                'success' => true,
                'message'=> 'success',
                'data' => [
                        'messages' => $messages->getCollection( $r ),
                    ],
                200
            ]
        );
    }

    public function makeChannel( Request $r )
    {
        // make channel
    }

}