<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Event;
use DB;
use App\EventCategory;
use DateTimeZone;
use DateTime;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addEvent()
    {
        $zones_array = array();
        $timestamp = time();
        $dummy_datetime_object = new DateTime();
        foreach(timezone_identifiers_list() as $key => $zone) {
          date_default_timezone_set($zone);
          $zones_array[$key]['zone'] = $zone;
          $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
          $tz = new DateTimeZone($zone);
          $zones_array[$key]['offset'] = $tz->getOffset($dummy_datetime_object);
        }
        $get_categories = EventCategory::all();
        return view('admin.addEvent',compact('get_categories','zones_array'));
    }

    public function storeEvent(Request $request)
    {
        $data = $request->all();
        // dd($data);
        // $validator = Validator::make($request->all(), [
        //     'event_category_id' => 'required',
        //     'event_name' => 'required',
        //     'event_logo' => 'required|max:500000',
        //     'event_waiver' => 'required|max:500000',
        //     'event_date' => 'required',
        //     'event_start_time' => 'required',
        //     'event_end_time' => 'required',
        //     'timezone' => 'required',
        //     'event_price' => 'required',
        //     'event_location' => 'required',
        //     'event_details' => 'required',
        //     'event_headline' => 'required',
        //     'reg_start_date' => 'required',
        //     'reg_end_date' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return redirect(route('admin.add.event'))->withInput()->withErrors($validator);
        // }
        $add_event = new Event();
        $file = $request->file('event_logo');
        if($file)
        {
            $unique_name = uniqid().'.'.$data['event_logo']->getClientOriginalExtension();
            $host = request()->getHttpHost();
            $path = public_path(). '/event_logos/';

            if (!is_dir(public_path('event_logos/' ))) {
                mkdir(public_path('event_logos/'), 0777, true);
            }
            $folderpath = 'http://'. $host .'/'.'event_logos/' . $unique_name;
            move_uploaded_file($data['event_logo'], "$path/$unique_name");
        }
        $file2 = $request->file('event_waiver');
        if($file2)
        {
            $unique_name2 = uniqid().'.'.$data['event_waiver']->getClientOriginalExtension();
            $host2 = request()->getHttpHost();
            $path2 = public_path(). '/event_waivers/';

            if (!is_dir(public_path('event_waivers/' ))) {
                mkdir(public_path('event_waivers/'), 0777, true);
            }
            $folderpath2 = 'http://'. $host2 .'/'.'event_waivers/' . $unique_name2;
            move_uploaded_file($data['event_waiver'], "$path2/$unique_name2");
        }
        $add_event->event_category_id = $data['event_category_id'];
        $add_event->event_name = $data['event_name'];
        $add_event->event_start_time = $data['event_start_time'];
        $add_event->event_end_time = $data['event_end_time'];
        $add_event->event_waiver = $unique_name2;
        $add_event->event_logo_url = $folderpath;
        $add_event->event_logo = $unique_name;
        $add_event->event_price = $data['event_price'];
        $add_event->timezone = $data['timezone'];
        $add_event->event_date = $data['event_date'];
        $add_event->event_location = $data['event_location'];
        $add_event->event_headline = $data['event_headline'];
        $add_event->event_description= $data['event_details'];
        $add_event->registration_start_date= $data['reg_start_date'];
        $add_event->registration_end_date= $data['reg_end_date'];
        $add_event->save();
        return redirect()->route('admin.view.events')->with('success','Event Added Successfully');

    }

    public function viewEvent()
    {
        $get_events = Event::all();
        return view('admin.viewEvents',compact('get_events'));
    }

    public function deleteEvent(Request $request,$id)
    {
        DB::table('events')->where([
            'id' => $id
            ])->delete();
            return redirect()->back();
    }

    public function viewEventDetails($id)
    {
        $get_event_details = Event::where('id',$id)->first();
        return view('admin.viewEventDetails',compact('get_event_details'));
    }

    public function editEvent(Request $request,$id)
    {
        $get_event_details = Event::where('id',$id)->first();
        $get_categories = EventCategory::all();
        $zones_array = array();
        $timestamp = time();
        $dummy_datetime_object = new DateTime();
        foreach(timezone_identifiers_list() as $key => $zone) {
          date_default_timezone_set($zone);
          $zones_array[$key]['zone'] = $zone;
          $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
          $tz = new DateTimeZone($zone);
          $zones_array[$key]['offset'] = $tz->getOffset($dummy_datetime_object);
        }
        return view('admin.editEvent',compact('get_event_details','get_categories','zones_array'));
    }

    public function updateEvent(Request $request,$id)
    {
        $data = $request->all();
        $file = $request->file('event_logo');
        if($file)
        {
            $unique_name = uniqid().'.'.$data['event_logo']->getClientOriginalExtension();
            $host = request()->getHttpHost();
            $path = public_path(). '/event_logos/';

            if (!is_dir(public_path('event_logos/' ))) {
                mkdir(public_path('event_logos/'), 0777, true);
            }
            $folderpath = 'http://'. $host .'/'.'event_logos/' . $unique_name;
            move_uploaded_file($data['event_logo'], "$path/$unique_name");
        }
        $file2 = $request->file('event_waiver');
        if($file2)
        {
            $unique_name2 = uniqid().'.'.$data['event_waiver']->getClientOriginalExtension();
            $host2 = request()->getHttpHost();
            $path2 = public_path(). '/event_waivers/';

            if (!is_dir(public_path('event_waivers/' ))) {
                mkdir(public_path('event_waivers/'), 0777, true);
            }
            $folderpath2 = 'http://'. $host2 .'/'.'event_waivers/' . $unique_name2;
            move_uploaded_file($data['event_waiver'], "$path2/$unique_name2");
        }
        $update_event = Event::find($id);
        $update_event->event_name = $data['event_name'];
        $update_event->event_location = $data['event_location'];
        $update_event->event_price = $data['event_price'];
        $update_event->event_headline = $data['event_headline'];
        $update_event->event_date = $data['event_date'];
        $update_event->timezone = $data['timezone'];
        $update_event->event_start_time = $data['event_start_time'];
        $update_event->event_end_time = $data['event_end_time'];
        if($file)
        {
            $update_event->event_logo = $unique_name;
            $update_event->event_logo_url = $folderpath;
        }
        if($file2)
        {
            $update_event->event_waiver = $unique_name2;
        }
        $update_event->registration_start_date = $data['reg_start_date'];
        $update_event->registration_end_date = $data['reg_end_date'];
        $update_event->event_description = $data['event_details'];
        $update_event->save();
        return redirect()->back()->with('success','Event Updated Successfully');
    }

    public function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'category_name' => 'required',
                'category_image' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect(route('admin.add.category'))->withInput()->withErrors($validator);
            }
            $add_category = new EventCategory();
            $add_category->category_name = $data['category_name'];
            if($request->file('category_image'))
            {
                $unique_name = uniqid().'.'.$data['category_image']->getClientOriginalExtension();
                $host = request()->getHttpHost();
                $path = public_path(). '/category_images/';

                if (!is_dir(public_path('category_images/' ))) {
                    mkdir(public_path('category_images/'), 0777, true);
                }
                $folderpath = 'http://'. $host .'/'.'category_images/' . $unique_name;
                move_uploaded_file($data['category_image'], "$path/$unique_name");
            }
            $add_category->category_image = $unique_name;
            $add_category->save();
            return redirect()->route('admin.view.category');
        }
        return view('admin.addCategory');
    }

    public function viewCategory()
    {
        $get_categories = EventCategory::all();
        return view('admin.viewCategory',compact('get_categories'));
    }

    public function deleteEventCategory(Request $request,$id)
    {
        DB::table('event_categories')->where([
            'id' => $id
        ])->delete();
        return redirect()->back();
    }

    public function editEventCategory($id)
    {
        $get_category_details = EventCategory::where('id',$id)->first();
        return view('admin.editCategory',compact('get_category_details'));
    }

    public function updateEventCategory(Request $request,$id)
    {
        $data = $request->all();
        // dd($data);
        $file = $request->file('category_image');
        if($file)
        {
            $unique_name = uniqid().'.'.$data['category_image']->getClientOriginalExtension();
            $host = request()->getHttpHost();
            $path = public_path(). '/category_images/';

            if (!is_dir(public_path('category_images/' ))) {
                mkdir(public_path('category_images/'), 0777, true);
            }
            $folderpath = 'http://'. $host .'/'.'category_images/' . $unique_name;
            move_uploaded_file($data['category_image'], "$path/$unique_name");
        }
        $update_category = EventCategory::find($id);
        $update_category->category_name = $data['category_name'];
        if($file)
        {
            $update_category->category_image = $unique_name;   
        }
        $update_category->save();
        return redirect()->back()->with('success','Category Updated Successfully');
    }

}
