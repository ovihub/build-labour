<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Tickets\Ticket;
use Illuminate\Http\Request;
use App\Http\Resources\UsersResource;
use App\Http\Resources\TicketsResource;

class DatatableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param User $user
     * @param Ticket $ticket
     */
    public function __construct(User $user, Ticket $ticket)
    {        
        $this->user = $user;
        $this->ticket = $ticket;
    }
    
    public function showUsers() {
        return view('admin.users');
    }

    public function showTickets() {
        return view('admin.tickets');
    }

    /**
     * Get users for the data table.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getUsersDatatable(Request $request)
    {
        $column = $request->get('column');
        if ($column == 'full_name') {
            $column = 'first_name';
        }
        
        $order = $request->get('order') ? $request->get('order') : 'asc';
        $per_page = $request->get('per_page') ? $request->get('per_page') : 10;
        $search_text = $request->get('search_text') ? $request->get('search_text') : '';

        $query = $this->user
                    ->where('first_name', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('email', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('address', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('id', 'LIKE', '%'.$search_text.'%')
                    ->orderBy($column, $order);

        $data = $query->paginate($per_page);

        return UsersResource::collection($data);
    }

    public function getTicketsDatatable(Request $request)
    {
        $column = $request->get('column') ? $request->get('column') : 'id';
        $order = $request->get('order') ? $request->get('order') : 'asc';
        $per_page = $request->get('per_page') ? $request->get('per_page') : 10;
        $search_text = $request->get('search_text') ? $request->get('search_text') : '';

        $query = $this->ticket
                    ->where('ticket', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('description', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('id', 'LIKE', '%'.$search_text.'%')
                    ->orderBy($column, $order);

        $data = $query->paginate($per_page);

        return TicketsResource::collection($data);
    }

}
