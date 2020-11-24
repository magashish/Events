@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Cms</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- Container fluid  -->
    <!-- ============================================================== -->
        <div class="container-fluid">
<!-- ============================================================== -->
    <!-- Start Page Content -->
        <!-- ============================================================== -->
                <div class="card">
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/edit-cms/'.$get_page_details->id) }}" id="edit-cms-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="page_title" class="col-sm-2 text-right control-label col-form-label">Page Title</label>
                                <div class="col-sm-8">
                                    <input type="text" name="page_title"  readonly class="form-control" id="page_title" placeholder="Page Title Here" value="{{$get_page_details->page_title}}" >
                                </div>
                            </div>
                            @if($get_page_details->page_title == 'KNOW ABOUT US')
                            <div class="form-group row">
                                <label for="short_headline" class="col-sm-2 text-right control-label col-form-label">Short Headline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="short_headline" id="short_headline" placeholder="Short Headline Here" value="{{$get_page_details->short_headline}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="primary_headline" class="col-sm-2 text-right control-label col-form-label">Primary Headline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="primary_headline" id="primary_headline" placeholder="Primary Headline Here" value="{{$get_page_details->primary_headline}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="about_us_headline" class="col-sm-2 text-right control-label col-form-label">About Us Headline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="about_us_headline" id="about_us_headline" placeholder="About Us Headline Here" value="{{$get_page_details->about_us_headline}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="about_us_description" class="col-sm-2 text-right control-label col-form-label">About Us Description</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="about_us_description" id="about_us_description" placeholder="About Us Description Here" value="{{$get_page_details->about_us_description}}">                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="about_us_description" class="col-sm-2 text-right control-label col-form-label">About Us Description</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="about_us_description" id="about_us_description" placeholder="About Us Description Here" value="{{$get_page_details->about_us_description}}">                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="office_address" class="col-sm-2 text-right control-label col-form-label">Office Address:-</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="office_address" id="office_address" placeholder="Office Address Here" value="{{$get_page_details->office_address}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="office_email" class="col-sm-2 text-right control-label col-form-label">Contact Email :-</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="office_email" id="office_email" placeholder="Contact Email Here" value="{{$get_page_details->office_email}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="office_contact" class="col-sm-2 text-right control-label col-form-label">Contact Number :-</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="office_contact" id="office_contact" placeholder="Contact Number Here" value="{{$get_page_details->office_contact}}">                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="page_description" class="col-sm-2 text-right control-label col-form-label">Page Description</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="page_description" id="page_description" placeholder="Page Headline Here" value="{{$get_page_details->page_description}}">                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="page_image1" class="col-sm-2 text-right control-label col-form-label">Primary Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="page_image1" id="page_image1" placeholder="Primary Image Here" value="{{$get_page_details->page_image1}}">                                </div>
                                    <img src="{{asset('/cmsimages/' . $get_page_details->page_image1)}}" style="width: 200px;;margin-left: 180px;" class="img-thumbnail" alt="Responsive image">
                            </div>
                            <div class="form-group row">
                                <label for="page_image2" class="col-sm-2 text-right control-label col-form-label">Image 2</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="page_image2" id="page_image2" placeholder="Image2 Here" value="{{$get_page_details->page_image2}}">                                </div>
                                    <img src="{{asset('/cmsimages/' . $get_page_details->page_image2)}}" style="width: 200px;;margin-left: 180px;" class="img-thumbnail" alt="Responsive image">
                            </div>
                            <div class="form-group row">
                                <label for="page_image3" class="col-sm-2 text-right control-label col-form-label">Image 3</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="page_image3" id="page_image3" placeholder="Image3 Here" value="{{$get_page_details->page_image3}}">                                </div>
                                    <img src="{{asset('/cmsimages/' . $get_page_details->page_image3)}}" style="width: 200px;;margin-left: 180px;" class="img-thumbnail" alt="Responsive image">
                            </div>
                            @elseif($get_page_details->page_title == 'Header&Footer')
                            <div class="form-group row">
                                <label for="header_image" class="col-sm-2 text-right control-label col-form-label">Header Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="header_image" id="header_image" placeholder="Header Image" value="{{$get_page_details->header_image}}">                                </div>
                                    <img src="{{asset('/cmsimages/' . $get_page_details->header_image)}}" style="width: 200px;;margin-left: 180px;" class="img-thumbnail" alt="Responsive image">
                            </div>
                            <div class="form-group row">
                                <label for="footer_text" class="col-sm-2 text-right control-label col-form-label">Footer Text</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="footer_text" id="footer_text" placeholder="Footer Text Here" value="{{$get_page_details->footer_text}}">                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection