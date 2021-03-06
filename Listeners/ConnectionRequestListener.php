<?php

namespace App\Listeners;

use App\Events\ConnectionRequest;
use App\Models\Communication\UsersNotificationInfo;
use App\Models\Users\Users;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConnectionRequestListener
{
    private $chat_service;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->chat_service = \App::make( 'ChatServiceInterface' );
    }

    /**
     * Handle the event.
     *
     * @param  ConnectionRequest  $event
     * @return void
     */
    public function handle(ConnectionRequest $event)
    {
        $request  = new Request();

        if( ! $user_notification_info = ( new UsersNotificationInfo )->byUserId( $event->recipient_id ) ){
            $user_notification_info =  new UsersNotificationInfo;
            $request->merge( [ 'user_id'=> $event->recipient_id, 'last_notification_check' => date( 'Y-m-d H:i:s' ) ,
                'last_message_check' => date( 'Y-m-d H:i:s' )
            ] );
        }

        $unread_notifications = $user_notification_info->unread_notifications + 1;
        $badge_count = $unread_notifications + $user_notification_info->unread_messages;

        $request->merge( [ 'unread_notifications' =>$unread_notifications , 'badge_count' => $badge_count ] );
        $user_notification_info->store( $request );

        $this->chat_service->sendMessageToUser( $event->recipient_id, $event->sender_id, $event->message ,
            [ 'pn_type' => 'request', 'connection_id' => $event->connection_id ,'sender_name' => $event->sender_name , 'sound' => 'request.wav' ],
            $badge_count
        );
    }
}
