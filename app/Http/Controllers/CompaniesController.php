<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function showCompany($id = null)
    {
        return view('companies.profile')->with('company_id', $id);
    }
}

