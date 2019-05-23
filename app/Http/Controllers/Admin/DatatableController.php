<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Companies\Job;
use App\Models\Tickets\Ticket;
use App\Models\Companies\Company;
use Illuminate\Http\Request;
use App\Http\Resources\UsersResource;
use App\Http\Resources\JobsResource;
use App\Http\Resources\TicketsResource;
use App\Http\Resources\CompaniesResource;

class DatatableController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param User $user
     * @param Job $job
     * @param Ticket $ticket
     */
    public function __construct(User $user, Job $job, Ticket $ticket, Company $company)
    {        
        $this->user = $user;
        $this->job = $job;
        $this->ticket = $ticket;
        $this->company = $company;
    }
    
    public function showUsers() {
        return view('admin.users');
    }

    public function showJobs() {
        return view('admin.jobs');
    }

    public function showTickets() {
        return view('admin.tickets');
    }

    public function showCompanies() {
        return view('admin.companies');
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

    public function getJobsDatatable(Request $request)
    {
        $column = $request->get('column') ? $request->get('column') : 'id';
        $order = $request->get('order') ? $request->get('order') : 'asc';
        $per_page = $request->get('per_page') ? $request->get('per_page') : 10;
        $search_text = $request->get('search_text') ? $request->get('search_text') : '';

        $query = $this->job
                    ->where('id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('company_id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('title', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('description', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('about', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('exp_level', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('contract_type', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('company_id', 'LIKE', '%'.$search_text.'%')
                    ->orWhere('title', 'LIKE', '%'.$search_text.'%')
                    ->orderBy($column, $order);

        $data = $query->paginate($per_page);

        return JobsResource::collection($data);
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

    public function getCompaniesDatatable(Request $request)
    {
        $column = $request->get('column');

        $order = $request->get('order') ? $request->get('order') : 'asc';
        $per_page = $request->get('per_page') ? $request->get('per_page') : 10;
        $search_text = $request->get('search_text') ? $request->get('search_text') : '';

        $query = $this->company
                    ->where('name', 'LIKE', '%'.$search_text.'%')
                    ->orderBy($column, $order);

        $data = $query->paginate($per_page);

        return CompaniesResource::collection($data);
    }

}
