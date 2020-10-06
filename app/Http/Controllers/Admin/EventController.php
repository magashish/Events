<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Event;
use DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addEvent()
    {
        return view('admin.addEvent');
    }

    public function storeEvent(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'event_logo' => 'required',
            'event_date' => 'required',
            'event_location' => 'required',
            'event_details' => 'required',
            'event_headline' => 'required',
            'reg_start_date' => 'required',
            'reg_end_date' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.add.event'))->withInput()->withErrors($validator);
        }
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
        $add_event->event_name = $data['event_name'];
        $add_event->event_logo_url = $folderpath;
        $add_event->event_logo = $unique_name;
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
        return view('admin.editEvent',compact('get_event_details'));
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
        $update_event = Event::find($id);
        $update_event->event_name = $data['event_name'];
        $update_event->event_location = $data['event_location'];
        $update_event->event_headline = $data['event_headline'];
        $update_event->event_date = $data['event_date'];
        if($file)
        {
            $update_event->event_logo = $unique_name;
            $update_event->event_logo_url = $folderpath;
        }
        $update_event->registration_start_date = $data['reg_start_date'];
        $update_event->registration_end_date = $data['reg_end_date'];
        $update_event->event_description = $data['event_details'];
        $update_event->save();
        return redirect()->back()->with('success','Event Updated Successfully');
    }

}
