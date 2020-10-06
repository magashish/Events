@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Event Management</h4>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">View Events</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Event Name</th>
                                    <th>Event Date</th>
                                    <th>Event Location</th>
                                    <th>Event Headline</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($get_events as $key => $event)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$event->event_name}}</td>
                                    <td>{{$event->event_date}}</td>
                                    <td>{{$event->event_location}}</td>
                                    <td>{{$event->event_headline}}</td>
                                    <td>
                                        <a href={{url('/admin/view-event-details/'.$event->id)}}><i class="fas fa-eye" id="view-details" title="View Details"></i></a>&nbsp;&nbsp;
                                        <a href={{url('/admin/edit-event/'.$event->id)}}><i class="far fa-edit" id="edit-event" title="Edit Event"></i></a>&nbsp;&nbsp;
                                        <a href={{url('/admin/delete-event/'.$event->id)}}><i class="fas fa-trash" id="delete-event" title="Delete Event"></i></a>&nbsp;                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- this page js -->
<script src="{{ asset('Admin/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{ asset('Admin/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{ asset('Admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script>
    /****************************************
        *       Basic Table                   *
        ****************************************/
    $('#zero_config').DataTable();
</script>
@endsection