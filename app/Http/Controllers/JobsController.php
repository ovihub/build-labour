<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Companies\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function view()
    {
        try {
            $user = $this->getAuthFromToken();

            if ($user) {
                $params = $_GET;

                if ($params && isset($params['cid']) && isset($params['jid'])) {
                    return view('jobs.view');
                }

                return view('errors.404');
            }

            $this->clearAuthToken();
        
        } catch (\Exception $e) {

            return view('errors.500');
        }
    }

    public function list()
    {
        try {
            $user = $this->getAuthFromToken();

            if ($user) {
                if ($user && $user->role_id == 2) {
                    return view('jobs.list')->with('company_id', Company::where('created_by', $user->id)->first()->id);
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
}

