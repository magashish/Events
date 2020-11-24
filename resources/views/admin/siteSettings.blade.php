@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Site Settings</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.siteSetting.update') }}" id="profile-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="stripe_s_key" class="col-sm-2 text-right control-label col-form-label">Stripe Secret Key:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="stripe_s_key" class="form-control" id="stripe_s_key" placeholder="Secret Key Here" value="{{ $site_setting->stripe_s_key }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stripe_p_key" class="col-sm-2 text-right control-label col-form-label">Stripe Publishable key:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="stripe_p_key" id="stripe_p_key" placeholder="Publishable key Here" value="{{ $site_setting->stripe_p_key }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="google_key" class="col-sm-2 text-right control-label col-form-label">Google Key:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="google_key" id="google_key" placeholder="Google Key Here" value="{{ $site_setting->google_key }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="service_fees" class="col-sm-2 text-right control-label col-form-label">Service Fees:</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="service_fees" id="service_fees" placeholder="Service Fees Here" value="{{ $site_setting->service_fees }}">
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