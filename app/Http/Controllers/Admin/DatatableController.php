<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UsersResource;

class DatatableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {        
        $this->user = $user;
    }
    
    public function showUsers() {
        return view('admin.users');
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

}
