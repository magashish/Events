<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Event;
use App\EventRegistration;
use App\EventRegistrationType;
use App\UserEventRegistration;
use App\EventDivision;
use DateTime;
use DB;
use App\SiteSetting;
use Stripe;
use App\User;
use Session;
use App\Order;
use App\CMS;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->except('home','registerEvent');
        //$this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $today_date = Carbon::now()->toDateString();
        $upcoming_events = Event::where('event_start_date','>',$today_date)->orderBy('event_start_date','desc')->take(3)->get();
        $past_events = Event::where('event_end_date','<',$today_date)->orderBy('event_start_date','desc')->take(3)->get();
        $current_events = DB::table('events')->select( 'id','event_name', 'event_location','event_logo', 'event_start_date', 'event_end_date' )
            ->where( DB::raw('event_start_date'), '<=', $today_date )
            ->where( DB::raw('event_end_date'), '>=', $today_date )->orderBy('event_start_date','desc')->take(3)->get();
        $cms = CMS::all();
        return view('welcome',compact('upcoming_events','cms','past_events','current_events'));
    }

    public function home()
    {
        $today_date = Carbon::now()->toDateString();
        $upcoming_events = Event::where('event_start_date','>',$today_date)->orderBy('event_start_date','desc')->take(3)->get();
        $past_events = Event::where('event_end_date','<',$today_date)->orderBy('event_start_date','desc')->take(3)->get();
        $current_events = DB::table('events')->select( 'id','event_name', 'event_location','event_logo', 'event_start_date', 'event_end_date' )
            ->where( DB::raw('event_start_date'), '<=', $today_date )
            ->where( DB::raw('event_end_date'), '>=', $today_date )->orderBy('event_start_date','desc')->take(3)->get();
        $cms = CMS::all();
        return view('welcome',compact('upcoming_events','cms','past_events','current_events'));
    }

    public function eventLeaderboard($id)
    {
        return view('leaderboard');
    }

    public function registerEvent($id)
    {
        $get_event_details = Event::where('id',$id)->with('registrationTypes')->first();
        $site_settings = SiteSetting::all();
        $get_event_registrations = EventRegistrationType::where('event_id',$id)->get();
        return view('registerEvent',compact('get_event_registrations','site_settings'));
    }


    public function saveRegType(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $get_reg_type_details = EventRegistrationType::where('id',$data['reg_type'])->first();
            Session::put('reg_type', $get_reg_type_details);
            $get_data = Session::get('reg_type');
            // dd($get_data);
            return ['status' => 'success','data' => $get_reg_type_details];
        }
    }

    public function savePersonalInfo(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();      
            $myValue=  array();
            parse_str($data['formdata'], $myValue);
            Session::put('user_info', $myValue);
            $get_data = Session::get('user_info');
            // dd($get_data);
            return ['status' => 'success','data' => $myValue];
        }
    }

    public function saveTeamInfo(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();     
            $myValue=  array();
            parse_str($data['formdata'], $myValue);
            Session::put('team_info', $myValue);
            $get_data = Session::get('user_info');
            // dd($get_data);
            return ['status' => 'success','data' => $myValue];
        }
    }

    public function saveWaiver(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();       
            $myValue=  array();
            parse_str($data['formdata'], $myValue);
            Session::put('waiver_data', $myValue);
            $get_data = Session::get('waiver_data');
            // dd($get_data);
            return ['status' => 'success','data' => $myValue];
        }
    }

    public function saveBillingInfo(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();     
            $myValue=  array();
            parse_str($data['formdata'], $myValue);
            Session::put('billing_data', $myValue);
            $get_data = Session::get('billing_data');
            // dd($get_data);
            return ['status' => 'success','data' => $myValue];
        }
    }

    public function checkEmail(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            //dd($data);
            $check_email_exists = User::where('email',$data['email'])->first();
            // dd($check_email_exists);
            if($check_email_exists)
            {
                return ['status' => 'false','data' => $check_email_exists];
            }
            else{
                return ['status' => 'success'];
            }
            
        }
    }

    public function submitFinalForm(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();  
            // dd($data);   
            $get_reg_type = Session::get('reg_type');
            // dd($get_reg_type);
            $get_user_details = Session::get('user_info');
            // dd($get_user_details);
            $get_waiver_details = Session::get('waiver_data');
            // dd($get_waiver_details);
            $get_billing_info = Session::get('billing_data');
            //dd($get_billing_info);
            $site_settings = SiteSetting::all();
            Stripe\Stripe::setApiKey($site_settings[0]->stripe_s_key);
           
            DB::beginTransaction();

            try {
                    if($get_reg_type['team_type'] == 'Individual')
                    {
                         // Create User
                        if ($get_user_details['is_authenticated'] == "false" && !is_null($get_user_details['personal_email'])) {
                            
                            $add_user = new User();
                            $add_user->first_name = $get_user_details['personal_first_name'];
                            $add_user->last_name = $get_user_details['personal_last_name'];
                            $add_user->phone_number = $get_user_details['personal_phone'];
                            $add_user->password = bcrypt($get_user_details['password']);
                            $add_user->email = $get_user_details['personal_email'];
                            $add_user->gender = $get_user_details['personal_gender'];
                            $add_user->dob = $get_user_details['personal_birth'];
                            $add_user->address = $get_user_details['personal_address'];
                            $add_user->zip_code = $get_user_details['personal_zip'];
                            $add_user->city = $get_user_details['personal_city'];
                            $add_user->state = $get_user_details['personal_state'];
                            //  dd($add_user);
                            $add_user->save();
                            if ($add_user->save()) {
                                \Auth::loginUsingId($add_user->id, true);
                            }
                        }
                        $userId = \Auth::user()->id;
                        // dd($userId);
                        $username = \Auth::user()->first_name;
                        $email = \Auth::user()->email;
                         
                        // Create Customer
                    //     try {
                    //     $customerResponse = \Stripe\Customer::create([
                    //         "description" => $get_user_details['personal_email'],
                    //         "source" => $data['token'], // obtained with Stripe.js
                    //     ]);
                    //     } catch(\Stripe\Exception\CardException $e) {
                    //     return response()->json([
                    //     'status' => 'error',
                    //     'message' => 'Your payment has been declined. Please check with your credit card company or try another card',
                    //     ]);
                    //     } catch(\Stripe\Exception\RateLimitException $e) {
                    //     return response()->json([
                    //     'status' => 'error',
                    //     'message' => $e->getMessage(),
                    //     ]);
                    //     } catch (\Stripe\Exception\InvalidRequestException $e) {
                    //     return response()->json([
                    //     'status' => 'error',
                    //     'message' => $e->getMessage(),
                    //     ]);
                    //     } catch (\Stripe\Exception\AuthenticationException $e) {
                    //     return response()->json([
                    //     'status' => 'error',
                    //     'message' => $e->getMessage(),
                    //     ]);
                    //     } catch (\Stripe\Exception\ApiConnectionException $e) {
                    //     return response()->json([
                    //     'status' => 'error',
                    //     'message' => $e->getMessage(),
                    //     ]);
                    //     } catch (\Stripe\Exception\ApiErrorException $e) {
                    //     return response()->json([
                    //     'status' => 'error',
                    //     'message' => $e->getMessage(),
                    //     ]);
                    // }
                    // dd($customerResponse);
                        // $add_user->stripe_customer_id = $customerResponse['id'];
                        // $add_user->card_token = $customerResponse['default_source'];
                        // dd($add_user);
                        // $add_user->save();
                         
                    }
                    else{
                        dd('Team');
                    }

                    //  Add User Registration
                    $add_user_registration = new UserEventRegistration();
                    $add_user_registration->user_id = $add_user['id'];
                    $add_user_registration->event_id = $get_reg_type['event_id'];
                    $add_user_registration->event_registration_type_id = $get_reg_type['id'];
                    $add_user_registration->is_agreed = $get_waiver_details['agree_waiver'];
                    $add_user_registration->initials = $get_waiver_details['initials'];
                    $add_user_registration->affiliate_name = $get_user_details['personal_affiliate'];
                    $add_user_registration->shirt_size = $get_user_details['personal_shirt'];
                    //dd($add_user_registration);
                    $add_user_registration->save();

                    // Add Order
                    $subtotal = round($site_settings[0]->service_fees + $get_reg_type['event_category_fees'],2);
                    // dd($subtotal);

                    $add_order = new Order();
                    $add_order->item_name = $get_reg_type['event_category_name'];
                    $add_order->per_item_price = $get_reg_type['event_category_fees'];
                    $add_order->item_quantity = '1';
                    $add_order->sub_total = $subtotal;
                    // dd($add_order);
                    $add_order->save();

                    //  Charge Fees
                    try {
                        $Charge = \Stripe\Charge::create([
                        'amount' => $subtotal * 100,
                        'currency' => 'usd',
                        // 'customer' => $add_user->stripe_customer_id,
                        'source' => $data['token'],
                        "description" => 'Test Payment by Dev Team',
                        
                    ]);
                    // dd($Charge);
                    } catch(\Stripe\Exception\CardException $e) {
                    return response()->json([
                    'status' => 'error',
                    'message' => 'Your payment has been declined. Please check with your credit card company or try another card',
                    ]);
                    } catch(\Stripe\Exception\RateLimitException $e) {
                    return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    ]);
                    } catch (\Stripe\Exception\InvalidRequestException $e) {
                    return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    ]);
                    } catch (\Stripe\Exception\AuthenticationException $e) {
                    return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    ]);
                    } catch (\Stripe\Exception\ApiConnectionException $e) {
                    return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    ]);
                    } catch (\Stripe\Exception\ApiErrorException $e) {
                    return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    ]);
                    }
                    DB::commit();
                    session()->flush();
                    return ['status' => 'success','get_reg_type' => $get_reg_type,'get_user_details' => $get_user_details,'get_waiver_details' => $get_waiver_details,'get_billing_info' => $get_billing_info];
                }
            catch (\Exception $e) {
                DB::rollback();
                echo $e->getMessage() . ' Line No ' . $e->getLine() . ' in File' . $e->getFile();die;
            }
        }
    }

    public function eventDetails(Request $request,$id)
    {
        $get_event_details = Event::where('id',$id)->first();
        $datetime1 = new DateTime($get_event_details['event_start_date']);
        $datetime2 = new DateTime($get_event_details['event_end_date']);
        $interval = $datetime2->diff($datetime1);
        $diff = $interval->format('%a');//now do whatever you like with $days
        $month_year = date('F, Y', strtotime($get_event_details['event_start_date']));
        $month_year2 = date('F, Y', strtotime($get_event_details['event_end_date']));
        $explode = explode("-",$get_event_details['event_start_date']);
        $day = $explode['2'];
        $explode2 = explode("-",$get_event_details['event_end_date']);
        $day2 = $explode2['2'];
        $get_event_divisions = EventDivision::where('event_id',$id)->get();
        if($diff <= 0)
        {
            $event_date = $explode['2']. ' ' . $month_year;
        }
        else{
            $event_date = $explode['2']. ' ' . '-' . ' '. $explode2['2']. ' ' . $month_year2;
        }
       
        
        return view('event_details',compact('get_event_details','event_date','get_event_divisions'));
    }

    public function myEvents()
    {
        return view('atheleteEvents');
    }
}
