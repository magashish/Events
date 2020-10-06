<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;

class AdminLoginController extends Controller
{
    public function __construct()
	{
		$this->middleware('guest:admin',['except' => ['logout']]);
	}

    public function showLoginForm()
    {
    	return view('admin.login');
    }

    public function login(Request $request)
    {
        // dd('in');
        // dd($request->email,$request->password);
    	Validator::make($request->all(), [
    		'email' => 'required|email',
    		'password' => 'required|min:6',
    	])->validate();

             if (Auth::guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ], 
                $request->remember)) {
                    // dd('hii');
                return redirect()->route('admin.dashboard');
            } else {
                // dd('hello');
                return redirect()->route('admin.login');
            }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
