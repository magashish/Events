@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add User</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/add-user') }}" id="edit-user-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-1 text-right control-label col-form-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-1 text-right control-label col-form-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-1 text-right control-label col-form-label">E-mail</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-1 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password Here">
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
@endsection