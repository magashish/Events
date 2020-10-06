@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Edit Event Details</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/update-event/'.$get_event_details->id) }}" id="edit-event-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="event_name" class="col-sm-1 text-right control-label col-form-label">Event Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="event_name" class="form-control" id="event_name" placeholder="Event Name Here" value="{{$get_event_details->event_name}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reg_start_date" class="col-sm-1 text-right control-label col-form-label">Reg. Start Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="reg_start_date" id="reg_start_date" placeholder="Registration Start Date" value="{{$get_event_details->registration_start_date}}">
                                </div>
                                <label for="reg_end_date" class="col-sm-1 text-right control-label col-form-label">Reg. End Date</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="reg_end_date" id="reg_end_date" placeholder="Registration End Date" value="{{$get_event_details->registration_end_date}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_date" class="col-sm-1 text-right control-label col-form-label">Event Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="event_date" id="event_date" placeholder="Event Date Here" value="{{$get_event_details->event_date}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_location" class="col-sm-1 text-right control-label col-form-label">Event Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="event_location" id="event_location" placeholder="Event Location Here" value="{{$get_event_details->event_location}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_logo" class="col-sm-1 text-right control-label col-form-label">Event Logo</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="event_logo" id="event_logo" placeholder="Event Logo Here" value="{{$get_event_details->event_logo}}">
                                    <img src="{{asset('/event_logos/' . $get_event_details->event_logo)}}" style="width: 200px;" class="img-thumbnail" alt="Responsive image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_headline" class="col-sm-1 text-right control-label col-form-label">Event Headline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="event_headline" id="event_headline" placeholder="Event Headline Here" value="{{$get_event_details->event_headline}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="event_details" class="col-sm-1 text-right control-label col-form-label">Event Details</label>
                                <div class="col-sm-8">
                                <textarea class="form-control" placeholder="Event Details Here" name="event_details" id="event_details">{{$get_event_details->event_description}}</textarea>
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