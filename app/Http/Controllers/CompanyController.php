<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Services\Job\JobService;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected $companyService;

    /**
     * Contruct function to initialize 
     *  @return void
     */
    public function __construct(CompanyService $companyService){
        $this->companyService = $companyService;
    }
}
