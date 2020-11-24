@extends('layouts.adminLayout.admin_design')
@section('content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Registration Categories</h4>
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
                        <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/add-registration-types/'.$event_id) }}" id="reg_category_form" method="post">
                            @csrf     
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="reg_category_name" class="col-sm-2 text-right control-label col-form-label">Registration Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="reg_category_name" class="form-control" id="reg_category_name" placeholder="Registration Category Name Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reg_category_fees" class="col-sm-2 text-right control-label col-form-label">Registration Category Fees</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="reg_category_fees" id="reg_category_fees" placeholder="Registration Category Fees Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="team_type" class="col-sm-2 text-right control-label col-form-label">Team Type</label>
                                    <div class="col-sm-8">
                                    <input type="radio" id="single" name="team_type" onclick="javascript:yesnoCheck();" value="Individual" checked>
                                    <label for="single">Individual</label>&nbsp;&nbsp;
                                    <input type="radio" id="team" name="team_type" onclick="javascript:yesnoCheck();"  value="Team">
                                    <label class="mr-4" for="team">Team</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reg_category_details" class="col-sm-2 text-right control-label col-form-label">Registration Category Description</label>
                                    <div class="col-sm-8">
                                        <!-- <input type="number" class="form-control" name="reg_category_details" id="reg_category_details" placeholder="Registration Category Fees Here"> -->
                                        <textarea class="form-control" placeholder="Event Category Details Here" name="reg_category_details" id="reg_category_details"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" id="ifTeam" style="visibility:hidden">
                                    <label for="team_size" class="col-sm-2 text-right control-label col-form-label">Team Size</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="team_size" id="team_size" placeholder="Enter Team Size">
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
                @if(count($get_event_categories) > 0)
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th class="text-right">Fees</th>
                                    <th class="text-right">Team Type</th>
                                    <th class="text-right">Team Size</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($get_event_categories as $key => $value)
                                <tr>
                                    <td class="text-center">{{$key + 1}}</td>
                                    <td>{{$value['event_category_name']}}</td>
                                    <td class="text-right">${{$value['event_category_fees']}} </td>
                                    <td class="text-right">{{$value['team_type']}}</td>
                                    @if($value['team_size'] != null)
                                    <td class="text-right">{{$value['team_size']}}</td>
                                    @else
                                    <td class="text-right">N/A</td>
                                    @endif
                                    <td class="text-right"> $48 </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
<script>
function yesnoCheck() {
    if (document.getElementById('team').checked) {
        document.getElementById('ifTeam').style.visibility = 'visible';
    }
    else document.getElementById('ifTeam').style.visibility = 'hidden';

}
</script>
<script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<script>
   CKEDITOR.replace( 'reg_category_details' );
</script>
@endsection