<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use App\SiteSetting;
use Validator;

class AdminController extends Controller
{
    //
    public function __construct()
    {
       // $this->middleware('auth:admin');
       $this->middleware('auth:admin');
    }

    public function index()
    {  
        // dd('in');
        return view('admin.dashboard');
    }

    public function viewProfile()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();
        $get_admin_id = Auth::guard('admin')->id();
        $check_user_email = Admin::where(['email'=>$request->get('email')])->where(function($query) use($get_admin_id)
        {
            if(isset($get_admin_id))
            {
                $query->where('id', '<>', $get_admin_id);
            }
        })->exists();
        if($check_user_email)
        {
            return redirect()->back()->with('error','Email already exist');
        }
        else
        {
            $user = Admin::find($get_admin_id);
            $user->name = $request->get('fname');
            $user->email = $request->get('email');
            $user->about_me = $request->get('about_me');
            $user->save();
        return redirect()->back()->with('success', 'Profile Updated');

        }
    }

    public function viewUsers()
    {
        $get_users = User::all();
        return view('admin.users',compact('get_users'));
    }

    public function deleteUser(Request $request,$id)
    {
        $data = $request->all();
        DB::table('users')->where([
            'id' => $id
            ])->delete();
            return redirect()->back();
    }

    public function changePassword()
    {
        $get_admin_details = Auth::guard('admin')->user();
        return view('admin.changePassword',compact('get_admin_details'));
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $check_password = Admin::where(['email' => Auth::guard('admin')->user()->email])->first();
            $current_password = $data['current_password'];
            if (Hash::check($current_password, $check_password->password)) {
                $password = bcrypt($data['new_password']);
              
                Admin::where('id','1')->update(['password' => $password]);
                return redirect('/admin/change-password')->with('flash_message_success', 'Password Updated Successfully');
            } else {
                return redirect('/admin/change-password')->with('flash_message_error', 'Incorrect Current Password! ');
            }
        }
    }

    public function checkPassword(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $current_password = $data['pwd'];
            $check_password = Admin::where('id','1')->first();
         
            if (Hash::check($current_password, $check_password->password)) {
                // echo "true";die;
                return response()->json([
                    'status' => 'success',
                    'message' => 'Current Password is Correct'
                ]);  
                echo $response;
                exit();
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Current Password is inCorrect'
                ]);  
                echo $response;
                exit();
                // echo "false";die;
            }
        }
        
    }

    public function siteSettings()
    {
        $site_setting = SiteSetting::first();
        return view('admin.siteSettings',compact('site_setting'));
    }

    public function updateSiteSettings(Request $request)
    {
        $data = $request->all();
        $id = 1;
        $update_setting = SiteSetting::find($id);
        $update_setting->stripe_s_key = $data['stripe_s_key'];
        $update_setting->stripe_p_key = $data['stripe_p_key'];
        $update_setting->service_fees = $data['service_fees'];
        $update_setting->google_key = $data['google_key'];
        $update_setting->save();
        return redirect()->back()->with('success','Site Settings Updated Successfully');
        
    }

    public function addUser(Request $request)
    {
        if($request->isMethod('post'))
        {
            // dd('in');
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8'
            ]);
    
            if ($validator->fails()) {
                return redirect(route('admin.add.user'))->withInput()->withErrors($validator);
            }
           
            $add_user = new User();
            $add_user->first_name = $data['first_name'];
            $add_user->last_name = $data['last_name'];
            $add_user->email = $data['email'];
            $add_user->password =  Hash::make($data['password']);
            $add_user->save();
            return redirect()->route('admin.users')->with('success','User Added Successfully');

        }
        return view('admin.addUser');
    }

    public function editUser(Request $request,$id)
    {
        $get_user_details = User::where('id',$id)->first();
        return view('admin.editUser',compact('get_user_details'));
    }

    public function updateUser(Request $request,$id)
    {
        $data = $request->all();
        $update_user = User::find($id);
        $update_user->first_name = $data['first_name'];
        $update_user->last_name = $data['last_name'];
        $update_user->email = $data['email'];
        $update_user->save();
        return redirect()->back()->with('success','Event Updated Successfully');
    }

}
