<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showProfile()
    {
        return view('users.profile');
    }

    public function showVerifyForm()
    {
        return view('users.verify');
    }
}

