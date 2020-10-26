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
            $update_page = CMS::find($id);
            // dd($update_page);
            $update_page->page_title = $data['page_title'];
            $update_page->page_headline = $data['page_headline'];
            $update_page->page_description = $data['page_description'];
            $update_page->page_image1 = $unique_name;
            $update_page->page_image2 = $unique_name2;
            $update_page->save();
            return redirect()->back();
        }
        return view('admin.editCms',compact('get_page_details'));
    }
}
