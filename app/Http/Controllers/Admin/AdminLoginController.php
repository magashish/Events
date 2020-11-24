<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AdminLoginController extends Controller
{
    public function __construct()
	{
        //$this->middleware('guest:admin',['except' => ['logout']]);
        $this->middleware('guest:admin')->except('logout');
	}

    public function showLoginForm()
    {
    	return view('admin.login');
    }

    public function login(Request $request)
    {
        // dd($request->email,$request->password);
    	// Validator::make($request->all(), [
    	// 	'email' => 'required|email',
    	// 	'password' => 'required|min:6',
    	// ])->validate();

        //      if (Auth::guard('admin')->attempt([
        //         'email' => $request->email,
        //         'password' => $request->password
        //     ], 
        //         $request->remember)) {
        //         return redirect()->route('admin.dashboard');
        //     } else {
        //         return redirect()->route('admin.login');
        //     }

        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
            // dd('in');
        // Attempt to log the user in
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            // dd('in');
            return redirect()->intended(route('admin.dashboard'));
        }
        // dd('out');
        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
