@extends('layouts.adminLayout.admin_design')
@section('content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Event Divisions</h4>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/add-event-divisions/'.$event_id) }}" id="event_division_form" method="post">
                            @csrf     
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="division_name" class="col-sm-2 text-right control-label col-form-label">Division Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="division_name" class="form-control" id="division_name" placeholder="Division Name Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="event_division_details" class="col-sm-2 text-right control-label col-form-label">Division Details</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" placeholder="Event Division Details Here" name="event_division_details" id="event_division_details"></textarea>
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
                @if(count($get_event_divisions) > 0)
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Division Name</th>
                                    <th class="text-right">Division Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($get_event_divisions as $key => $value)
                                <tr>
                                    <td class="text-center">{{$key + 1}}</td>
                                    <td>{{$value['division_name']}}</td>
                                    <td class="text-right">{!!$value['division_details']!!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>

<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<script>
   CKEDITOR.replace( 'event_division_details' );
</script>
@endsection