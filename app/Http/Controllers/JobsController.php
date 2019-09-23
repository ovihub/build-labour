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
            if($user->isAdmin()){
                $role = 'Company';
            }
            else{
                $role = $user->role->name;
            }
            
            
            if ($user) {
                if (isset($request->cid) && isset($request->jid)) {
                    return view('jobs.view')->with( compact( 'role' ) );
                }
                return view('errors.404');
            }

            $this->clearAuthToken();
        
        } catch (\Exception $e) {

            return view('errors.500');
        }
    }

    public function viewApplicants(Request $request)
    {
        $hasCompareParam = false;

        if ($request->compare) {

            $hasCompareParam = true;
        }

        return view('jobs.applicants')->with(compact('hasCompareParam'));
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
                    return redirect('/job/search');
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

