<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\Login\RememberMeExpiration;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth1.login');
    }

    public function process_login(Request $request)
    {

        // Validation Rules
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // if validator fails
        if($validator->fails())
        {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->get('remember'))
        ) {
            session()->flash('message', 'Welcome to dashboard.');
            // echo $user;
            $user = User::select('role')
            ->where('email', $request->email)
            ->get();
            if( ($user[0]->role) === 'admin') {
                return redirect('admin/dashboard'); 
            } else if (($user[0]->role) === 'client') {
                return redirect('client/dashboard');
            } else{
                return redirect('freelancer/dashboard');
            }
        }
        else {
            // authentication failed...
            session()->flash('message', 'Invalid login credentials.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        session()->flash('message', 'You have been logged out.');
        return redirect('admin/login');
    }

}

