<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function showJob()
    {
        return view('jobs.view');
    }
}

