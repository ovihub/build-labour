<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function showCompany()
    {
        return view('companies.profile');
    }
}

