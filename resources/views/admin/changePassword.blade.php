@extends('layouts.adminLayout.admin_design')
@section('content')
<!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Change Password</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.updatePassword') }}" id="profile-form" method="post">
                        @csrf     
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="current_password" class="col-sm-1 text-right control-label col-form-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password Here">
                                    <span id="checkpassword"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-1 text-right control-label col-form-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-1 text-right control-label col-form-label">Confirm New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="cnfrm_new_password" id="cnfrm_new_password" placeholder="Confirm New Password Here">
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
<script>
 $('#current_password').on('change', function () {
                var curr_pwd = $(this).val();
                // alert(curr_pwd);
                $.ajax({
                    url: "{{ url('/admin/check-pswd') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        pwd: curr_pwd,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        console.log(response);
                        if(response.status == 'error')
                        {
                          alert(response.message);
                          document.getElementById('current_password').style.borderColor = "red";
                          $('#new_password').attr('readonly', true); 
                          $('#cnfrm_new_password').attr('readonly', true); 
                        }
                        else{
                            document.getElementById('current_password').style.borderColor = "green";
                          $('#new_password').attr('readonly', false);
                          $('#cnfrm_new_password').attr('readonly', false); 
                        }
                       
                    },
                    error: function () {
                      alert('error');
                    }
                });
            });
</script>
@endsection