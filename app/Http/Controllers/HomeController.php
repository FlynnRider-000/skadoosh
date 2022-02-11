<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Services\Job\JobService;
use App\Services\Company\CompanyService;
use App\Services\Category\CategoryService;

class HomeController extends Controller
{

    protected $jobService;
    protected $categoryService;
    protected $companyService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JobService $jobService, CategoryService $categoryService, CompanyService $companyService)
    {
        $this->jobService = $jobService;
        $this->categoryService = $categoryService;
        $this->companyService = $companyService;
    }

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $data['jobs'] = $this->jobService->findPremiumWithPagination();
        $data['newJobsToday'] = $this->jobService->findCountNewJobsToday();
        $data['categories'] = $this->categoryService->findAll();
        $data['companies'] = $this->companyService->findAll()->sortByDesc('logo');
        return view('app.index', $data);
    }
/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $data = [];
        $data['categories'] = $this->categoryService->findAll();
        return view('app.contact', $data);
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveContact(Request $request)
    {
        $request->validate([
            'phoneNumber'=> 'required',
            'reasonForContact'=> 'required',
            'companyEmail'=>'nullable|email:rfc,dns',
            'companyUrl' => 'nullable|url'
        ]);

        try {
            $data = $request;
            $data['subject'] = 'Contact Us';
            $data['logo'] = asset('assets/img/logo/logo.jpg');
            \CustomHelper::sendEmail([
                'subject' => 'Contact Us',
                'to' => 'ajjmair@gmail.com',
                'htmlBody' => view('email.contact-us', $data)->render(),
            ]);
            return redirect('/contact-us')->with('message', 'Contact form successfully submitted.');
        } catch(Exception $ex) {
            return redirect('/contact-us')->with('error', 'Failed to submit contact, please contact support');
        }
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'dob' => ['required', 'date', 'before:today'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->dob = date('Y-m-d', strtotime($request->get('dob')));

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = '/images/' . $avatarName;
        }
       
        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code 
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
