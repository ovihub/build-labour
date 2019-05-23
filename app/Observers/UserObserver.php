<?php

namespace App\Observers;

use App\Mails\ResendVerificationCodeEmail;
use App\Models\Companies\Company;
use App\Models\Users\WorkerDetail;
use App\User;
use Illuminate\Http\Request;
use Mail;

class UserObserver {

    public function saved($user){

        $req = Request::capture();

        if (isset($req->signup_type) && $req->signup_type == 'employer') {

            Company::create(['created_by' => $user->id]);

        } else {

            if (!$user->WorkerDetail) {

                WorkerDetail::create(['user_id' => $user->id, 'english_skill' => null, 'drivers_license' => null, 'right_to_work' => null]);
            }

        }

        Mail::to( $user->email )->send( new ResendVerificationCodeEmail( $user ) );

    }

}