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
                                    <input type="text" name="page_title" class="form-control" id="page_title" placeholder="Page Title Here" value="{{$get_page_details->page_title}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="page_headline" class="col-sm-2 text-right control-label col-form-label">Page Headline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="page_headline" id="page_headline" placeholder="Page Headline Here" value="{{$get_page_details->page_headline}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="page_description" class="col-sm-2 text-right control-label col-form-label">Page Description</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="page_description" id="page_description" placeholder="Page Headline Here" value="{{$get_page_details->page_description}}">                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="page_image1" class="col-sm-2 text-right control-label col-form-label">Primary Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="page_image1" id="page_image1" placeholder="Primary Image Here" value="{{$get_page_details->page_image1}}">                                </div>
                                    <img src="{{asset('/cmsimages/' . $get_page_details->page_image1)}}" style="width: 200px;;margin-left: 180px;" class="img-thumbnail" alt="Responsive image">
                            </div>
                            <div class="form-group row">
                                <label for="page_image2" class="col-sm-2 text-right control-label col-form-label">Image 2</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="page_image2" id="page_image2" placeholder="Primary Image Here" value="{{$get_page_details->page_image2}}">                                </div>
                                    <img src="{{asset('/cmsimages/' . $get_page_details->page_image2)}}" style="width: 200px;;margin-left: 180px;" class="img-thumbnail" alt="Responsive image">
                            </div>
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