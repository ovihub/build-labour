<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function view()
    {
        try {
            $page = \Route::current()->getName();

            $user = $this->getAuthFromToken();

            if ($user) {
                $params = $_GET;

                if ($page == 'view_job' && $params) {
                    return view('jobs.view');

                } else if ($page == 'post_job' && $user && $user->role_id == 2 && ! isset($params['jid'])) {
                    return view('jobs.new');
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

