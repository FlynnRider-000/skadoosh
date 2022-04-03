<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\Job;
use App\Models\Category;

class ClientController extends Controller
{
    //
    public function index()
    {
        return view('clients.dashboard',['jobs'        => Job::all(),
                                         'companies'   => Company::all(),
                                         'categories'  => Category::all(),
                                         
                                        ]
                    );
    }
}
