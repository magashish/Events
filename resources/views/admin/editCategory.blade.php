@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Category Details</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/update-event-category/'.$get_category_details->id) }}" id="edit-category-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-1 text-right control-label col-form-label">Event Category</label>
                                <div class="col-sm-8">
                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name Here" value="{{$get_category_details->category_name}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_image" class="col-sm-1 text-right control-label col-form-label">Category Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="category_image" id="category_image" placeholder="Category Image Here" value="{{$get_category_details->category_image}}">
                                    <img src="{{asset('/category_images/' . $get_category_details->category_image)}}" style="width: 200px;" class="img-thumbnail" alt="Responsive image">
                                </div>
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
<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<script>
   CKEDITOR.replace( 'event_details' );
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<script>
$(document).ready(function () {
   $('#edit-event-form').validate({ // initialize the plugin
       rules: { 
            event_name: {
               required:true,
           },
           event_date:{
               required:true,
           },
           event_location:{
               required:true,
           },
           event_headline: {
               required:true,
           },
           event_details: {
               required:true,
           },
           reg_start_date: {
               required:true,
           },
           reg_end_ate: {
               required:true,
           },
           event_logo: {
               required:true,
           },
          
        }
   });
});

</script>
@endsection