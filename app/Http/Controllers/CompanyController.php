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
    protected $jobService;

    /**
     * Contruct function to initialize 
     *  @return void
     */
    public function __construct(CompanyService $companyService, JobService $jobService){
        
        $this->companyService = $companyService;
        $this->jobService = $jobService;
    }

    public function showAllCompanies()
    {   $companies = [];
        return view('company.listing', [
            'companies' => $this->companyService->findAllPaginate()
        ]);
    }

    public function showCompany($name) {
     $namegroup = Company::select('id','name')->get();
        foreach($namegroup as $onearray) {
            $namecom = $onearray->name;
            $reult = str_replace(' ','-', strtolower($namecom));
            if($reult === $name) {
             $unique_id = $onearray->id; 
            }
        };
      $company = $this->companyService->find($unique_id);
      $jobs = $company->jobs;
    //   echo $jobs;
      return view('company.jobs', ['company' => $company, 'jobs'=> $jobs]);
    }
    // $companies = Company::all();
    // foreach ($companies as $company) {
    //     if($company->slug === $name) {
    //         return view('company.jobs', ['company' => $company, 'jobs'=> $company->jobs]);
    //     }
    //     abort(404);
    // }
}