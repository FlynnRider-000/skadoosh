<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Category\CategoryService;
use App\Services\Company\CompanyService;
use App\Services\Job\JobService;

class AdminJobController extends Controller
{
    protected $categoryService;
    protected $companyService;
    protected $jobService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService, CompanyService $companyService, JobService $jobService)
    {
        $this->categoryService  = $categoryService;
        $this->companyService   = $companyService;
        $this->jobService       = $jobService;
    }

    public function index()
    {
        return view('admin.job.list');
    }

    public function loadJobs(Request $request) {
        ## Read value
        $draw       = $request->get('draw');
        $start      = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr    = $request->get('order');
        $columnName_arr     = $request->get('columns');
        $order_arr          = $request->get('order');
        $search_arr         = $request->get('search');

        $columnIndex        = $columnIndex_arr[0]['column']; // Column index
        $columnName         = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder    = $order_arr[0]['dir']; // asc or desc
        $searchValue        = $search_arr['value']; // Search value

        // Total records
        $totalRecords           = Job::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Job::select('count(*) as allcount')->where('title', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Job::orderBy($columnName,$columnSortOrder)
                        ->where('jobs.title', 'like', '%' .$searchValue . '%')
                        ->select('jobs.*')
                        ->skip($start)
                        ->take($rowperpage)
                        ->get();

        $data_arr = array();
        
        foreach($records as $index => $record){
            $category = $this->categoryService->find($record->category_id);
            $category = (isset($category->name)) ? $category->name : "N/A";

            $company = $this->companyService->find($record->company_id);
            $company = (isset($company->name)) ? $company->name : "N/A";

            $editLink   = "<a href='". url('admin/job/'. $record->id . '/edit') ."'><i class='bx bx-edit text-primary'></i> Edit</a>";
            $deleteLink = "<a href='javascript:;' class='deleteJobButton' data-jobid='". $record->id ."'><i class='bx bx-trash text-danger'></i> Delete </a>";        
            if($record->is_premium == false) {
                $premiumLink = "<a href='javascript:;' class='makeJobPremium' data-jobid='". $record->id ."'><i class='bx bxs-star text-warning'></i> Premium </a>";        
            } else {
                $premiumLink = "<a href='javascript:;' class='removeJobPremium' data-jobid='". $record->id ."'><i class='bx bxs-star text-warning'></i> Remove Premium </a>";
            }

            $data_arr[] = array(
                "id"        => ($index+1),
                "title"     => $record->title,
                "jobType"   => \Config::get('constants.jobTypes')[$record->job_type],
                "location"  => 
                            $record->location == 'office' ? ( ($record->location_city != '' ? $record->location_city.', ' : '' ). $record->location_state) : (  $record->location == 'remote_region' ? $record->region_restriction : 'Remote' ),
                "apply"     => "<a href='". url($record->apply_link) . "' target='_blank'>view</a>",
                "is_premium"   => ($record->is_premium == 0) ? "<span class='badge rounded-pill bg-danger'>Free</span>" : ( $record->is_premium == 1 ? "<span class='badge rounded-pill bg-success'>Premium</span>" : "<span class='badge rounded-pill bg-warning'>Pinned</span>"),
                "category"  => ucfirst($category),
                "company"   => ucfirst($company),
                "action"    => $editLink.' '.$deleteLink
            );
        }

        $response = array(
            "draw"                  => intval($draw),
            "iTotalRecords"         => $totalRecords,
            "iTotalDisplayRecords"  => $totalRecordswithFilter,
            "aaData"                => $data_arr
        );

        return response()->json($response);
    }


    public function create()
    {
        $data['categories'] = $this->categoryService->findAll();
        return view('admin.job.create', $data);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jobTitle'          =>  'required|max:255',
            'jobCategory'       =>  'required',
            'jobType'           =>  'required',
            'jobLocation'       =>  'required',
            'jobOfficeLocationCity'     =>  'required',
            'jobOfficeLocationState'    =>  'required',
            'jobRegionalRestriction'    =>  'required',
            'jobApplyLink'      =>  'url',
            'companyName'       =>  'required',
            'companyEmail'      =>  'required|email:rfc,dns',
            'companyLogo'       =>  ($request->hasFile('companyLogo')) ? 'image|mimes:jpeg,png,jpg,gif,svg' : 'nullable',
            'companyWebsite'    =>  'nullable|url'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $request['jobLocationCity']      = '';
        $request['jobLocationState']     = '';
        $request['jobRegionRestriction'] = '';

        if($request->jobLocation === 'office'){
            $request['jobLocationCity'] = $request->jobOfficeLocationCity;
            $request['jobLocationState'] = $request->jobOfficeLocationState;
        }
        else if($request->jobLocation === 'remote_region')
            $request['jobRegionRestriction'] = $request->jobRegionalRestriction;
        else

        
        if ($request->hasFile('companyLogo')) {
        }
        
        $company = $this->companyService->findByEmail($request['companyEmail']);
        
        if(!$company) {
            $company = $this->companyService->create($request);
        } else {
            $company = $this->companyService->update($company['id'], $request);
        }
        
        $request['companyId'] = $company['id'];
        $request['isPremium'] = $request->isPremium;
        $request['creationStep'] = 2;

        $this->jobService->create($request->all());
        session()->flash('message', 'Job has been created successfully.');

        return redirect()->route('job.index');
    }


    public function edit($id)
    {
        $data = [];
        $jobDetails = $this->jobService->find($id);
        if(!empty($jobDetails)) {
            $data['categories'] = $this->categoryService->findAll();
            $data['job'] = $jobDetails;
            return view('admin.job.edit', $data);
        }  else {
            session()->flash('message', 'Invalid job.');
            return redirect('admin/job');
        }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jobTitle'      => 'required|max:255',
            'jobCategory'   =>'required',
            'jobType'       =>'required',
            'jobLocation'   =>'required',
            'jobOfficeLocationCity'  => $request->jobLocation === 'office' ? 'required' : 'nullable',
            'jobOfficeLocationState' => $request->jobLocation === 'office' ? 'required' : 'nullable',
            'jobRegionalRestriction' => $request->jobLocation === 'remote_region' ? 'required' : 'nullable',
            'jobApplyLink'  =>  'url',
            'companyName'   =>  'required',
            'companyEmail'  =>  'required|email:rfc,dns',
            'companyLogo'   =>  ($request->hasFile('companyLogo')) ? 'image|mimes:jpeg,png,jpg,gif,svg' : 'nullable',
            'companyWebsite'=>  'nullable|url'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        if($request->jobLocation === 'office'){
            $request['jobLocationCity'] = $request->jobOfficeLocationCity;
            $request['jobLocationState'] = $request->jobOfficeLocationState;
        }
        else if($request->jobLocation === 'remote_region')
            $request['jobRegionRestriction'] = $request->jobRegionalRestriction;
        else

        
        if ($request->hasFile('companyLogo')) {
			$name               = "";
            $image              = $request->file('companyLogo');
            $name               = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/'.env('COMPANY_IMAGE_PATH'));
            $image->move($destinationPath, $name);
			$request['companyLogoPath'] = $name;
        }
        
        $company = $this->companyService->findByEmail($request['companyEmail']);
        
        if(!$company) {
            $company = $this->companyService->create($request);
        } else {
            $company = $this->companyService->update($company['id'], $request);
        }
        
        $request['companyId'] = $company['id'];
        $request['isPremium'] = $request->isPremium;
        $request['creationStep'] = 2;

        $this->jobService->update($id, $request->all());

        session()->flash('message', 'Job has been updated successfully.');
        return redirect()->route('job.index');
    }


    public function destroy($id)
    {
        $job = $this->jobService->find($id);
        if (!empty($job)) {
            $job->delete();
            return response()->json(array('status' => 1, 'message' => 'Job has been deleted successfully.'));
        } else {
            return response()->json(array('status' => 0, 'message' =>'Somethings wents wrong'));
        }
        return redirect('admin/job');
    }

    public function makePremium(Request $request)
    {
        $id = $request->id;
        $job = $this->jobService->find($id);
        if (!empty($job)) {
            $jobDetail = [];
            $jobDetail['isPremium'] = 1;
            $this->jobService->update($id, $jobDetail);
            return response()->json(array('status' => 1, 'message' => 'Job has been marked as premium.'));
        } else {
            return response()->json(array('status' => 0, 'message' =>'Somethings wents wrong'));
        }
        return redirect('admin/job');
    }

    public function removePremium(Request $request)
    {
        $id = $request['id'];
        $job = $this->jobService->find($id);
        if (!empty($job)) {
            $jobDetail = [];
            $jobDetail['isPremium'] = 0;
            $this->jobService->update($id, $jobDetail);
            return response()->json(array('status' => 1, 'message' => 'Job has been removed as premium.'));
        } else {
            return response()->json(array('status' => 0, 'message' =>'Somethings wents wrong'));
        }
        return redirect('admin/job');
    }
}