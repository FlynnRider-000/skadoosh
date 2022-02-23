<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobPaymentLog;

class DashboardController extends Controller
{

	public function index()
	{
		return view('admin.dashboard',['jobs' 							=> Job::all(), 
																		'revenue'          =>Job::where('is_premium', '=','1'),
																		'earning' 					=> (JobPaymentLog::sum('price')) / 100,
																		'commoncity' 				=>(Job::select('location_city')->groupBy('location_city')->where('location_city','!=','')->orderByRaw('COUNT(*) DESC')->limit(1)->get()),
																		'latesttransaction' =>JobPaymentLog::join('jobs','job_payment_logs.job_id', '=' ,'jobs.id')->orderBy('id', 'desc')->limit(5)->get(['job_payment_logs.*', 'jobs.title','jobs.job_type','jobs.location'])
																	]);
	}
}