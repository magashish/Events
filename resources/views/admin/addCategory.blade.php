@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Category Management</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.add.category') }}" id="category-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-1 text-right control-label col-form-label">Category Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_image" class="col-sm-1 text-right control-label col-form-label">Category Image</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="category_image" id="category_image" placeholder="Category Image Here">
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