@extends('layouts.frontendLayout.design')
@section('content')

<main class="main-content-wrapper padd-200 min-heigh-100vh">
        <div class="login-page-wrapper auth-padd">
          <div class="container">
             <div class="blue-page-heading">
                <h2>LOGIN</h2>
             </div>
             <div class="Form-Wrapper">
                <form>
                   <div class="form-grouph input-design form-field">
                      <input type="text" name="Email">
                      <label class="floating-element">Email</label>
                   </div>
                   <div class="form-grouph input-design form-field">
                      <input type="text" name="Password">
                      <label class="floating-element">Password</label>
                   </div>
                   <div class="form-grouph forget-password">
                      <a href="#">Forgot Password?</a>
                   </div>
                   <div class="form-grouph submit-design text-center">
                      <input class="highball-bg-btn" type="submit" value="SIGN IN">
                   </div>
                   <div class="form-grouph other-form-info text-center">
                      <p>Don’t have an account. <a href="#">SIGN UP HERE.</a></p>
                   </div>
                </form>
             </div>
          </div>
       </div>
      </main>

@endsection