@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Profile Info</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.profile.update') }}" id="profile-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="fname" class="col-sm-1 text-right control-label col-form-label">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="fname" class="form-control" id="fname" placeholder="Full Name Here" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile" class="col-sm-1 text-right control-label col-form-label">About Me</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="about_me" id="profile" placeholder="About Me Here" value="{{ $user->about_me }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-1 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Here" value="{{ $user->email }}">
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