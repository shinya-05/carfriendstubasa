<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function president()
    {
        return view('company.president');
    }

    public function profile()
    {
        return view('company.profile');
    }

    public function philosophy()
    {
        return view('company.philosophy');
    }

    public function history()
    {
        return view('company.history');
    }
}
