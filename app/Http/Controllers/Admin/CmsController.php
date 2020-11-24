<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CMS;

class CmsController extends Controller
{
    public function viewCms()
    {
        $cms = CMS::all();
        // dd($cms);
        return view('admin.viewCms',compact('cms'));
    }

    public function editCms(Request $request,$id)
    {
        // dd($id);
        $get_page_details = CMS::find($id);
        if($request->isMethod('post'))
        {
            // dd('1');
            $data =$request->all();
            // dd($data);
            $file = $request->file('page_image1');
            if($file)
            {
                $unique_name = uniqid().'.'.$data['page_image1']->getClientOriginalExtension();
                $host = request()->getHttpHost();
                $path = public_path(). '/cmsimages/';

                if (!is_dir(public_path('cmsimages/' ))) {
                    mkdir(public_path('cmsimages/'), 0777, true);
                }
                $folderpath = 'http://'. $host .'/'.'cmsimages/' . $unique_name;
                move_uploaded_file($data['page_image1'], "$path/$unique_name");
            }
            $file2 = $request->file('page_image2');
            if($file2)
            {
                $unique_name2 = uniqid().'.'.$data['page_image2']->getClientOriginalExtension();
                $host2 = request()->getHttpHost();
                $path2 = public_path(). '/cmsimages/';

                if (!is_dir(public_path('cmsimages/' ))) {
                    mkdir(public_path('cmsimages/'), 0777, true);
                }
                $folderpath2 = 'http://'. $host2 .'/'.'cmsimages/' . $unique_name2;
                move_uploaded_file($data['page_image2'], "$path2/$unique_name2");
            }
            $file3 = $request->file('page_image3');
            if($file3)
            {
                $unique_name3 = uniqid().'.'.$data['page_image3']->getClientOriginalExtension();
                $host3 = request()->getHttpHost();
                $path3 = public_path(). '/cmsimages/';

                if (!is_dir(public_path('cmsimages/' ))) {
                    mkdir(public_path('cmsimages/'), 0777, true);
                }
                $folderpath3 = 'http://'. $host3 .'/'.'cmsimages/' . $unique_name3;
                move_uploaded_file($data['page_image3'], "$path3/$unique_name3");
            }
            $file4 = $request->file('header_image');
            if($file4)
            {
                $unique_name4 = uniqid().'.'.$data['header_image']->getClientOriginalExtension();
                $host4 = request()->getHttpHost();
                $path4 = public_path(). '/cmsimages/';

                if (!is_dir(public_path('cmsimages/' ))) {
                    mkdir(public_path('cmsimages/'), 0777, true);
                }
                $folderpath3 = 'http://'. $host4 .'/'.'cmsimages/' . $unique_name4;
                move_uploaded_file($data['header_image'], "$path4/$unique_name4");
            }
            $update_page = CMS::find($id);
            // dd($update_page);
            $update_page->page_title = $data['page_title'];
            if($request->short_headline)
            {
                $update_page->short_headline = $data['short_headline'];
            }
            if($request->primary_headline)
            {
                $update_page->primary_headline = $data['primary_headline'];
            }
            if($request->about_us_headline)
            {
                $update_page->about_us_headline = $data['about_us_headline'];
            }
            if($request->about_us_description)
            {
                $update_page->about_us_description = $data['about_us_description'];
            }
            if($request->office_email)
            {
                $update_page->office_email = $data['office_email'];
            }
            if($request->office_address)
            {
                $update_page->office_address = $data['office_address'];
            }
            if($request->office_contact)
            {
                $update_page->office_contact = $data['office_contact'];
            }
            if($request->footer_text)
            {
                $update_page->footer_text = $data['footer_text'];
            }
           
            //$update_page->about_us_description = $data['about_us_description'];
            //$update_page->page_description = $data['page_description'];
            if($file)
            {
                $update_page->page_image1 = $unique_name;
            }
            if($file2)
            {
                $update_page->page_image2 = $unique_name2;
            }
            if($file3)
            {
                $update_page->page_image3 = $unique_name3;
            }
            if($file4)
            {
                $update_page->header_image = $unique_name4;
            }
            $update_page->save();
            return redirect()->back();
        }
        return view('admin.editCms',compact('get_page_details'));
    }
}
