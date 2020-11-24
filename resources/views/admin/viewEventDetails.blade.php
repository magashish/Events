@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Event Details</h4>
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
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Event Description</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <span class="m-b-15 d-block">{!!$get_event_details->event_description!!}</span>     
                        </div>
                    </div>
                    <!-- Comment Row -->
                </div>
                
                <div class="card-body">
                    <h4 class="card-title m-b-0">Event Headline</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <span class="m-b-15 d-block">{!!$get_event_details->event_headline!!}</span>     
                        </div>
                    </div>
                    <!-- Comment Row -->
                </div>

                <div class="card-body">
                    <h4 class="card-title m-b-0">Event Schedule Details</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <span class="m-b-15 d-block">{!!$get_event_details->event_schedule_details!!}</span>     
                        </div>
                    </div>
                    <!-- Comment Row -->
                </div>

                <div class="card-body">
                    <h4 class="card-title m-b-0">Event Waiver(Click To Open)</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <!-- <span class="m-b-15 d-block">{!!$get_event_details->event_headline!!}</span>      -->
                            <a href="{{asset('/event_waivers/' . $get_event_details->event_waiver)}}"target="_blank"> {{$get_event_details->event_waiver}} </a>  
                        </div>
                    </div>
                    <!-- Comment Row -->
                </div>

                <div class="card-body">
                    <h4 class="card-title m-b-0">Event Logo</h4>
                </div>
                <div class="comment-widgets scrollable">
                    <!-- Comment Row -->
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <!-- <span class="m-b-15 d-block">{!!$get_event_details->event_headline!!}</span>      -->
                            <img src="{{asset('/event_logos/' . $get_event_details->event_logo)}}" class="img-thumbnail" alt="Responsive image">
                        </div>
                    </div>
                    <!-- Comment Row -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title m-b-0">Basic Details</h4>
                </div>
                <ul class="list-style-none">
                    <li class="card-body">
                            <div class="d-flex no-block">
                                <i class="fa fa-check-circle w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event Name:-</span> {{$get_event_details->event_name}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event Location:-</span> {{$get_event_details->event_location}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Timezone:-</span> {{$get_event_details->timezone}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event Start Date:-</span> {{$get_event_details->event_start_date}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event End Date:-</span> {{$get_event_details->event_end_date}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event Start Time:-</span> {{$get_event_details->event_start_time}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event End Time:-</span> {{$get_event_details->event_end_time}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Reg. Start Date:-</span> {{$get_event_details->registration_start_date	}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Reg. Start Date:-</span> {{$get_event_details->registration_end_date	}}
                                </div>
                            </div>
                    </li>
                    <li class="card-body border-top">
                            <div class="d-flex no-block">
                                <i class="fa fa-gift w-30px m-t-5"></i>
                                <div>
                                    <span class="font-bold">Event Price:-</span> ${{$get_event_details->event_price	}}
                                </div>
                            </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection