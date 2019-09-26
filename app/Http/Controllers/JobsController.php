<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Companies\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Companies\JobApplicant;

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
                // check if user already applied for the job
                $already_applied = 0;
                $temp_already_applied = JobApplicant::where([['user_id','=',$user->id,],['job_id','=', $request->jid]])->first();
                if($temp_already_applied){
                    $already_applied = 1;
                }
                
                if (isset($request->cid) && isset($request->jid)) {

                    // user a company then redirect to applicants page
                    if($user->Company && (isset($request->v) && $request->v == 'details')){
                        
                        return redirect(route('applicants', ['cid' => $request->cid, 'jid' => $request->jid]));

                    } else {

                        return view('jobs.view')->with( compact( 'role','already_applied') );
                    }

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

