<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;
use App\Services\Job\JobService;
use App\Services\Company\CompanyService;
use Illuminate\Support\Facades\Log;

class AdminCompanyController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['companies'] = $this->companyService->findAll();
        return view('admin.company.list', $data);

    }

    public function loadCompanies(Request $request) {
        ## Read Value
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

        //Total records
        $totalRecords              = Company::select('count(*) as allcount')->count();
        $totalRecordswithFilter    = Company::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

        //Fetch records
        $records = Company::orderBy($columnName,$columnSortOrder)
                        ->where('companies.name', 'like', '%' .$searchValue . '%')
                        ->select('companies.*')
                        ->skip($start)
                        ->take($rowperpage)
                        ->get();

        $data_arr = array();

        foreach($records as $index => $record){
            $editLink   = "<a href='". url('admin/company/'. $record->id . '/edit') ."'><i class='bx bx-edit text-primary'></i> Edit</a>";
            $deleteLink = "<a href='javascript:;' class='deleteCompanyButton' data-companyid='". $record->id ."'><i class='bx bx-trash text-danger'></i> Delete </a>";
            $data_arr[] = array(
                "id"          => ($index+1),
                "companyname" => $record->name,
                "email"       => $record->email,
                "website"     => "<a href='". url($record->website) . "' target='_blank'>view</a>",
                "twitter"     => $record->twitter,
                "location"    => $record->location,
                "statement"   => $record->statement,
                "action"      => $editLink.' '.$deleteLink
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'companyName'       => 'required',
            'companyLogo'       =>  ($request->hasFile('companyLogo')) ? 'image|mimes:jpeg,png,jpg,gif,svg' : 'nullable',
            'companyWebsite'    =>  'nullable|url',
            'companyEmail'      =>  'required|email:rfc,dns',
            'companyLogo'       =>  ($request->hasFile('companyLogo')) ? 'image|mimes:jpeg,png,jpg,gif,svg' : 'nullable',
        ]);

        //if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $data = $request->all();
        $this->companyService->create($data);

        session()->flash('message', 'Company has been created successfully');
        return redirect('admin/company');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $companyDetails = $this->companyService->find($id);
        if(!empty($companyDetails)) {
            $data['company'] = $companyDetails;
            return view('admin.company.edit', $data);
        } else {
            session()->flash('message', 'Invalid Company.');
            return redirect('admin/company');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'companyName'       => 'required',
            'companyLogo'       =>  ($request->hasFile('companyLogo')) ? 'image|mimes:jpeg,png,jpg,gif,svg' : 'nullable',
            'companyWebsite'    =>  'nullable|url',
            'companyEmail'      =>  'required|email:rfc,dns',
            'companyLocation'   => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        
        if ($request->hasFile('companyLogo')) {
			$name               = "";
            $image              = $request->file('companyLogo');
            $name               = time().'.'.$image->getClientOriginalExtension();
            $destinationPath    = public_path('/'.env('COMPANY_IMAGE_PATH'));
            $image->move($destinationPath, $name);
			$request['companyLogoPath'] = $name;
        }
        
        $data = $request->all();
        $this->companyService->update($id, $data);

        session()->flash('message', 'Company has been updated successfully.');
        return redirect('admin/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = $this->companyService->find($id);
        if(!empty($company)) {
            $company->delete();
            session()->flash('message', '');
            return response()->json(array('status' => 1, 'message' => 'Company has been deleted successfully.'));
        } else {
            return response()->json(array('status' => 0, 'message' =>'Somethings wents wrong'));
        }
    }
}
