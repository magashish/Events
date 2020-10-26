@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">CMS Management</h4>
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
                    <h5 class="card-title">View CMS</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Page Title</th>
                                    <th>Page Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cms as $key => $row)
                                <tr>
                                    <td>{{$row->page_title}}</td>
                                    <td><img src="{{asset('/cmsimages/'.$row->page_image1)}}" width="70px"></td>
                                    <td>{{$row->created_at}}</td>
                                    <td>
                                        <a href={{url('/admin/edit-cms/'.$row->id)}}><i class="far fa-edit" id="edit-cms-page" title="Edit Page"></i></a>&nbsp;&nbsp;
                                    </td>
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