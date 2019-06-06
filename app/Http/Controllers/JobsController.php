<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function view()
    {
        return view('jobs.view');
    }

    public function search()
    {
        return view('jobs.search');
    }
}

