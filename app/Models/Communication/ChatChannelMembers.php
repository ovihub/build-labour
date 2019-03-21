<?php

namespace App\Models\Communication;

use App\Models\BaseModel;
use App\Models\Users\Users;
use Illuminate\Http\Request;

class ChatChannelMembers extends BaseModel{

    protected $table        = 'chat_channel_members';
    protected $primaryKey   = 'map_id';

    public $timestamps = false;

    protected $fillable = [ 'map_id', 'member_id', 'channel_id' ];

    public function store( $data = array() )
    {
        $validator = \Validator::make( $data , [
            'member_id'     => 'required',
            'channel_id'    => 'required'
        ] );

        if( $validator->fails() ){
            $this->errors = $validator->errors()->all();
            return false;
        }

        $this->fill( $data );
        $pk = isset( $data[ $this->primaryKey ] ) ? $data[$this->primaryKey] : null;

        if( $pk  ){
            $this->exists = true;
        }else{
            $this->unread_count = 0;
        }

        $this->save();

        return $this;
    }

    public function getCollection( Request $r )
    {
        $this->setLpo( $r );
        $this->fields = [ 'a.*' ];

        $this->query = static::from( $this->table.' as a' );
        // apply filters here

        if( $r->member_id ){
            $this->query->where( 'member_id' , $r->member_id );
        }

        if( $r->channel_id ){
            $this->query->where( 'channel_id' , $r->channel_id );
        }

        if( $r->return_total ){
           $this->total = $this->query->count( );
        }

        $this->assignLpo();

        if( $r->return_builder ){
            return $this->query;
        }

        return $this->query->get( $this->fields );
    }

    /**
     * Update recipient unread count
     *
     * @param $channel_id
     * @param $recipient_id
     */
    public static function updateRecipientUnreadCount( $channel_id, $recipient_id )
    {

        $recipient = static::where( 'channel_id' , $channel_id )
            ->where( 'member_id' ,  $recipient_id )
            ->first();

        if( $recipient ){
            $recipient->unread_count = $recipient->unread_count + 1;
            $recipient->save();
        }

        return $recipient;
    }

    public static function seen( $channel_id, $member_id )
    {
        $map = static::where( 'channel_id' , $channel_id )
            ->where( 'member_id' ,  $member_id )
            ->first();
        ;
        if( ! $map ){
            return false;
        }
        $map->last_seen_at = date( 'Y-m-d H:i:s' );
        $map->unread_count = 0;
        $map->save();

        return $map;
    }

    public function channels()
    {
        return $this->hasOne( ChatChannels::class , 'channel_id' , 'channel_id' );
    }

    public function members()
    {
        return $this->hasOne( Users::class , 'id' , 'member_id' );
    }

}