<?php

namespace App\Repositories;

use App\Models\Tickets\Ticket;
use App\Models\Users\UserTicket;
use Torann\LaravelRepository\Repositories\AbstractRepository;
use JWTAuth;
use Illuminate\Http\Request;

class TicketRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Ticket::class;

    /**
     * Valid searchable columns
     *
     * @return array
     */
    protected $searchable = [
        'query' => [
            'ticket',
            'description'
        ],
    ];


    /**
     * Current User Tickets
     *
     * @return collection
     */
    public function getUserTickets() {

        $user = JWTAuth::toUser();
        $tickets = $user->tickets;

        return $tickets;
    }

    /**
     * Save User Tickets
     *
     * @return collection
     */
    public function saveUserTickets( Request $request ) {

        $user = JWTAuth::toUser();

        if (empty($request->tickets)) {

            UserTicket::where('user_id', $user->id)->delete();
        }

        if (isset($request->has_whitecard)) {

            $user->workerDetail->has_whitecard = $request->has_whitecard;
            $user->workerDetail->save();
        }

        if ($request->tickets) {

            UserTicket::where('user_id', $user->id)->delete();

            $tickets = $request->tickets;

            $saveTickets = array_map(function($ticket) use($user) {

                return array('ticket_id' => $ticket['ticket_id'], 'user_id' => $user->id);
            }, $tickets);

            UserTicket::insert($saveTickets);

            return $user->tickets;
        }

        return [];
    }
}