<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;

class SignUpController extends Controller
{
    //
    public function index()
    {
        return view('auth1.register');
    }

    // public function up()
    // {
    //     Schema::create('users_verify', function (Blueprint $table) {
    //         $table->integer('user_id');
    //         $table->string('token');
    //         $table->timestamps();
    //     });

    //     Schema::table('users', function (Blueprint $table) {
    //         $table->boolean('is_email_verified')->default(0);
    //     });
    // }
    
    public function process_signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role'     => 'required',
            'email'    => 'required|email|unique:users',
            'name'     => 'required',
            'password' => 'required|min:6',
            'country'  => 'required',
            'dob' => ['required', 'date', 'before:today'],
            'avatar' => ['required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],

        ]);
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $data = $request->all();
        $check = $this->create($data);
        // if( ($data[0]->role) === 'admin')
        return redirect('/nx/login')->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    {
        if (request()->has('avatar')) {            
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }

        return User::create([
            'role'  =>$data['role'],
            'name'   => $data['name'],
            'email'  => $data['email'],
            'country' => $data['country'],
            'password' => Hash::make($data['password']),
            'dob' => date('Y-m-d', strtotime($data['dob'])),
            'avatar' => "/images/" . $avatarName,
        ]);
    }

    // public function dashboard()
    // {
    //     if(Auth::check()){
    //         return view('admin/dashboard');
    //     }
  
    //     return redirect("login")->withSuccess('Opps! You do not have access');
    // }

    // public function verifyAccount($token)
    // {
    //     $verifyUser = UserVerify::where('token', $token)->first();
  
    //     $message = 'Sorry your email cannot be identified.';
  
    //     if(!is_null($verifyUser) ){
    //         $user = $verifyUser->user;
              
    //         if(!$user->is_email_verified) {
    //             $verifyUser->user->is_email_verified = 1;
    //             $verifyUser->user->save();
    //             $message = "Your e-mail is verified. You can now login.";
    //         } else {
    //             $message = "Your e-mail is already verified. You can now login.";
    //         }
    //     }
  
    //   return redirect()->route('/nx/login')->with('message', $message);
    // }
}
