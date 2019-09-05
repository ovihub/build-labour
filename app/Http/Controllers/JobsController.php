<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Companies\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function view(Request $request)
    {
        try {
            $user = $this->getAuthFromToken();

            if ($user) {
                if (isset($request->cid) && isset($request->jid)) {
                    return view('jobs.view');
                }
                return view('errors.404');
            }

            $this->clearAuthToken();
        
        } catch (\Exception $e) {

            return view('errors.500');
        }
    }

    public function list(Request $request)
    {
        try {
            $type = isset($request->type) ? $request->type : null;
            
            if ($type == 'templates' || $type == 'active' || $type == 'closed') {
                $user = $this->getAuthFromToken();

                if ($user) {
                    if ($user && $user->role_id == 2) {
                        return view('jobs.list')->with('company_id', Company::where('created_by', $user->id)->first()->id);
                    }
                    return view('errors.404');
                }

                $this->clearAuthToken();
            
            } else {
                return view('errors.404');
            }
        
        } catch (\Exception $e) {

            return view('errors.500');
        }
    }

    public function post(Request $request)
    {
        try {
            $user = $this->getAuthFromToken();

            if ($user) {
                if (! $_GET || isset($request->jid)) {
                    return view('jobs.post')->with('company_id', Company::where('created_by', $user->id)->first()->id);
                }
                return view('errors.404');
            }

            $this->clearAuthToken();
            
        } catch (\Exception $e) {

            return view('errors.500');
        }
    }

    public function search()
    {
        return view('jobs.search');
    }

    public function searchAll()
    {
        return view('jobs.search_all');
    }
}

