@extends('layouts.frontendLayout.design')
@section('content')
<style>
.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
}
.enabledbutton {
    pointer-events: initial;
    
}
</style>
<main class="main-content-wrapper">
          <div class="ragister-page-wrapper">
             <div class="full-width">
                <div class="row">
                   <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                     <div class="registered-left-sidebar">
                        <div class="sideBar-img">
                           <img src="{{ asset('/Frontend/images/games.png') }}">
                        </div>
                          <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab"  href="#registration-type-tab">Registration Type</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab"   href="#personal-info-tab">Personal Info</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab"  href="#waiver-page-tab">Waiver</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab"  href="#review-order-tab">Review Your Order</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#billing-info-tab">Billing Info</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#cart-summary-tab">Summary</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab"  href="#purchase-confirmation-tab">Confirmation</a>
                           </li>
                        </ul>
                     </div>
                   </div>
                   <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                      <div class="tab-content-register">
                        <div class="tab-content">
                           <div id="registration-type-tab" role="tabpanel" class="tab-pane active">
                            <form action="javascript:void(0)" method="post" id="registration-type-form">
                                    <div class="panel panel-default">
                                        <div class="panel-heading heading-paragraph-design black">
                                            <h2 class="panel-title">Registration Type</h2>
                                        </div>
                                        <div class="panel-body">
                                            <p> Please select your event below to continue.</p>
                                        </div>
                                        <div class="table-responsive" id="table-registion-type">
                                            <table class="table table-hover table-striped" style="margin: 0">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 50px;"></th>
                                                        <th> Registration Type</th>
                                                        <th> Fee</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($get_event_registrations as $key => $value)
                                               
                                                    <tr>
                                                        <td class="text-center">
                                                            <!-- <input data-team_count="2" data-men="2" data-women="" data-team="Y" data-price="170.00" value="27055" type="radio" checked=""> -->
                                                            <input type="radio" class="{{$value['team_type']}}" data-name="{{$value['event_category_name']}}" data-price="{{$value['event_category_fees']}}" @if($key == 0) checked="checked" @endif   id="{{$value['team_size']}}" name="reg_type" value="{{$value['id']}}">
                                                        </td>
                                                        <td>{{$value['event_category_name']}}</td>
                                                        <td>${{$value['event_category_fees']}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="panel-body promo-code">
                                            <div class="row">
                                                <article class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="promo_code2">Promo Code</label>
                                                        <div class="input-grouph input-flex">
                                                            <input type="text" class="form-control" id="promo_code2" name="promo_code2">
                                                            <input type="submit" value="Send" id="submit_first_form">
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="personal-info-tab">
                             <form action="#" method="post" id="personal-info-singple-form">
                               <div class="panel panel-default" id="personal-info-single-panel" style="display: none;">
                                 <div class="panel-heading heading-paragraph-design black">
                                   <h2 class="panel-title">Personal Info / Account Creation</h2>
                                 </div>
                                 <div class='col-md-12 error form-group hide' id="errfrm" style="display: none;">
                                 <div class='alert-danger alert errmsg'>Please correct the errors and try
                                 again.</div>
                                  </div>
                                 <div class="panel-body">
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_first_name">First Name</label>
                                         <input type="text" name="personal_first_name" id="personal_first_name" class="form-control validate[required]" data-prompt-position="topLeft" required>
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_last_name">Last Name</label>
                                         <input type="text" name="personal_last_name" id="personal_last_name" class="form-control validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_phone">Mobile Phone</label>
                                         <input type="text" name="personal_phone" id="personal_phone" class="form-control validate[required,custom[phonecustom]]" required="" data-prompt-position="topLeft" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}">
                                       </div>
                                     </div>
                                     @guest
                                      <input type="hidden" id="is_authenticated" name="is_authenticated" value="false">
                                      <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_email">Email Address </label>
                                         <input type="email" name="personal_email" id="personal_email" class="form-control validate[required,custom[email]]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                      <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="password">Password</label>
                                         <input type="password" name="password" id="password" class="form-control validate[required,custom[password]]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="password_confirmation">Password Confirmation</label>
                                         <input type="password" name="password_confirmation" id="password_confirmation" class="form-control validate[required,custom[password_confirmation]]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     @else
                                     <input type="hidden" id="is_authenticated" name="is_authenticated" value="true">
                                     @endguest
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_affiliate">Affiliate/Sponsor </label>
                                         <input type="text" name="personal_affiliate" id="personal_affiliate" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_gender">Gender</label>
                                         <select name="personal_gender" id="personal_gender" class="form-control validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_birth">Birth Date</label>
                                         <input type="date" name="personal_birth" id="personal_birth" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_shirt">Shirt Size</label>
                                         <select name="personal_shirt" id="personal_shirt" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_address">Address</label>
                                         <input type="text" name="personal_address" id="personal_address" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>          
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_zip">Postal Code</label>
                                         <input type="text" name="personal_zip" id="personal_zip" class="form-control   validate[required]" data-prompt-position="topLeft" required="" >
                                       </div>
                                     </div>             
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_city">City</label>
                                         <input type="text" name="personal_city" id="personal_city" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>             
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="personal_state">State</label>
                                         <select name="personal_state" id="personal_state" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State">
                                           <option value="">- State -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>             
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="personal_county">County</label>
                                         <input type="text" name="personal_county" id="personal_county" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>             
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="personal_country">Country</label>
                                         <input type="text" name="personal_country" id="personal_country" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="panel-footer text-center">
                                   <button type="button" id="personal-info-form" class="btn btn-success">Continue</button> &nbsp;or&nbsp; <a href="#cancel_order_modal" target="#cancel_order_modal" data-toggle="modal" class="cancel-order">Cancel Order</a>
                                 </div>
                               </div>
                             </form>
                             <form action="#" method="post" id="personal-info-team-form" class="">
                               <div class="panel panel-default" id="personal-info-team-panel">
                                 <div class="panel-heading heading-paragraph-design black">
                                   <h2 class="panel-title">Personal Info / Account Creation for Team</h2>
                                 </div>
                                 <div class="panel-body form-horizontal">
                                   <div class="form-group" style="margin-bottom: 0">
                                     <label for="team-name" class="control-label col-sm-4">Team Name</label>
                                     <div class="full-width-input">
                                       <input type="text" name="team-name" id="team-name" class="form-control validate[required]" data-prompt-position="topLeft" required="">
                                     </div>
                                   </div>
                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form" style="display: block;">
                                  <div class="heading-paragraph-design black">
                                    <h2>Team Member 1 (You):</h2>
                                  </div>
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-first-name-1">First Name</label>
                                         <input type="text" name="team-first-name-1" id="team-first-name-1" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-last-name-1">Last Name</label>
                                         <input type="text" name="team-last-name-1" id="team-last-name-1" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-phone-1">Mobile Phone</label>
                                         <input type="text" name="team-phone-1" id="team-phone-1" class="form-control validate[required,custom[phonecustom]]" required="" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-email-1">Email Address </label>
                                         <input type="email" name="team-email-1" id="team-email-1" class="form-control validate[required,custom[email]]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-affiliate-1">Affiliate/Sponsor </label>
                                         <input type="text" name="team-affiliate-1" id="team-affiliate-1" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-gender-1">Gender</label>
                                         <select name="team-gender-1" id="team-gender-1" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-birth-1">Birth Date</label>
                                         <input type="text" name="team-birth-1" id="team-birth-1" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-shirt-1">Shirt Size</label>
                                         <select name="team-shirt-1" id="team-shirt-1" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                                           
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>                      
                                         
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-address-1">Address</label>
                                         <input type="text" name="team-address-1" id="team-address-1" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-zip-1">Postal Code</label>
                                         <input type="text" name="team-zip-1" id="team-zip-1" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#team-zip-1', '#team-city-1', '#team-county-1', '#team-state-1')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-city-1">City</label>
                                         <input type="text" name="team-city-1" id="team-city-1" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-state-1">State</label>
                                        <select name="team-state-1" id="team-state-1" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State">
                                           <option value="">- State -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-county-1">County</label>
                                         <input type="text" name="team-county-1" id="team-county-1" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-country-1">Country</label>
                                         <input type="text" name="team-country-1" id="team-country-1" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form" style="display: block;">
                                    <div class="heading-paragraph-design black">
                                      <h2>Team Member 2:</h2>
                                    </div>
                                   <label class="copy_team_check checkbox-inline"><input type="checkbox" value="1" class="copy_team_info" data-prompt-position="topLeft"> Copy From Above</label>
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-first-name-2">First Name</label>
                                         <input type="text" name="team-first-name-2" id="team-first-name-2" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-last-name-2">Last Name</label>
                                         <input type="text" name="team-last-name-2" id="team-last-name-2" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-phone-2">Mobile Phone</label>
                                         <input type="text" name="team-phone-2" id="team-phone-2" class="form-control validate[required,custom[phonecustom]]" required="" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-email-2">Email Address </label>
                                         <input type="email" name="team-email-2" id="team-email-2" class="form-control validate[required,custom[email]]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-affiliate-2">Affiliate/Sponsor </label>
                                         <input type="text" name="team-affiliate-2" id="team-affiliate-2" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-gender-2">Gender</label>
                                         <select name="team-gender-2" id="team-gender-2" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-birth-2">Birth Date</label>
                                         <input type="text" name="team-birth-2" id="team-birth-2" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-shirt-2">Shirt Size</label>
                                         <select name="team-shirt-2" id="team-shirt-2" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                   
                   
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>                      
                   
                   
                   
                                         </select>
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-address-2">Address</label>
                                         <input type="text" name="team-address-2" id="team-address-2" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-zip-2">Postal Code</label>
                                         <input type="text" name="team-zip-2" id="team-zip-2" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#team-zip-2', '#team-city-2', '#team-county-2', '#team-state-2')">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-city-2">City</label>
                                         <input type="text" name="team-city-2" id="team-city-2" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-state-2">State</label>
                                         <select name="team-state-2" id="team-state-2" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State">
                                           <option value="">- State -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-county-2">County</label>
                                         <input type="text" name="team-county-2" id="team-county-2" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-country-2">Country</label>
                                         <input type="text" name="team-country-2" id="team-country-2" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form" id="mem-3" style="display: none;">
                                    <div class="heading-paragraph-design black">
                                   <h2>Team Member 3:</h2>
                                   </div>
                                   <label class="copy_team_check checkbox-inline"><input type="checkbox" value="2" class="copy_team_info" data-prompt-position="topLeft"> Copy From Above</label>
                   
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-first-name-3">First Name</label>
                                         <input type="text" name="team-first-name-3" id="team-first-name-3" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-last-name-3">Last Name</label>
                                         <input type="text" name="team-last-name-3" id="team-last-name-3" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-phone-3">Mobile Phone</label>
                                         <input type="text" name="team-phone-3" id="team-phone-3" class="form-control validate[required,custom[phonecustom]]" required="" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-email-3">Email Address </label>
                                         <input type="email" name="team-email-3" id="team-email-3" class="form-control validate[required,custom[email]]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-affiliate-3">Affiliate/Sponsor </label>
                                         <input type="text" name="team-affiliate-3" id="team-affiliate-3" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-gender-3">Gender</label>
                                         <select name="team-gender-3" id="team-gender-3" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-birth-3">Birth Date</label>
                                         <input type="text" name="team-birth-3" id="team-birth-3" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-shirt-3">Shirt Size</label>
                                         <select name="team-shirt-3" id="team-shirt-3" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                   
                   
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>                      
                   
                   
                   
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-address-3">Address</label>
                                         <input type="text" name="team-address-3" id="team-address-3" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                                 
                                  <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-zip-3">Postal Code</label>
                                         <input type="text" name="team-zip-3" id="team-zip-3" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#team-zip-3', '#team-city-3', '#team-county-3', '#team-state-3')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-city-3">City</label>
                                         <input type="text" name="team-city-3" id="team-city-3" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-state-3">State</label>
                                        <select name="team-state-3" id="team-state-3" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State">
                                           <option value="">- State -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-county-3">County</label>
                                         <input type="text" name="team-county-3" id="team-county-3" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-country-3">Country</label>
                                         <input type="text" name="team-country-3" id="team-country-3" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                 
                   
                                     
                   
                                     
                   
                                   </div>
                   
                   
                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form" id="mem-4" style="display: none;">
                                   <h3>Team Member 4:</h3>
                   
                                   <label class="copy_team_check checkbox-inline"><input type="checkbox" value="3" class="copy_team_info" data-prompt-position="topLeft"> Copy From Above</label>
                   
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-first-name-4">First Name</label>
                                         <input type="text" name="team-first-name-4" id="team-first-name-4" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-last-name-4">Last Name</label>
                                         <input type="text" name="team-last-name-4" id="team-last-name-4" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-phone-4">Mobile Phone</label>
                                         <input type="text" name="team-phone-4" id="team-phone-4" class="form-control validate[required,custom[phonecustom]]" required="" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-email-4">Email Address </label>
                                         <input type="email" name="team-email-4" id="team-email-4" class="form-control validate[required,custom[email]]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-affiliate-4">Affiliate/Sponsor </label>
                                         <input type="text" name="team-affiliate-4" id="team-affiliate-4" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-gender-4">Gender</label>
                                         <select name="team-gender-4" id="team-gender-4" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-birth-4">Birth Date</label>
                                         <input type="text" name="team-birth-4" id="team-birth-4" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-shirt-4">Shirt Size</label>
                                         <select name="team-shirt-4" id="team-shirt-4" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                   
                   
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>                      
                   
                   
                   
                   
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-address-4">Address</label>
                                         <input type="text" name="team-address-4" id="team-address-4" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-address2-4">Address 2</label>
                                         <input type="text" name="team-address2-4" id="team-address2-4" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-zip-4">Postal Code</label>
                                         <input type="text" name="team-zip-4" id="team-zip-4" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#team-zip-4', '#team-city-4', '#team-county-4', '#team-state-4')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-city-4">City</label>
                                         <input type="text" name="team-city-4" id="team-city-4" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-state-4">State</label>
                                         <select name="team-state-4" id="team-state-4" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State">
                                           <option value="">- State -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-county-4">County</label>
                                         <input type="text" name="team-county-4" id="team-county-4" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-country-4">Country</label>
                                         <input type="text" name="team-country-4" id="team-country-4" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                   
                                     
                                   </div>
                   
                   
                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form" id="mem-5" style="display: none;">
                                   <h3>Team Member 5:</h3>
                   
                                   <label class="copy_team_check checkbox-inline"><input type="checkbox" value="4" class="copy_team_info" data-prompt-position="topLeft"> Copy From Above</label>
                   
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-first-name-5">First Name</label>
                                         <input type="text" name="team-first-name-5" id="team-first-name-5" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-last-name-5">Last Name</label>
                                         <input type="text" name="team-last-name-5" id="team-last-name-5" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-phone-5">Mobile Phone</label>
                                         <input type="text" name="team-phone-5" id="team-phone-5" class="form-control validate[required,custom[phonecustom]]" required="" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-email-5">Email Address </label>
                                         <input type="email" name="team-email-5" id="team-email-5" class="form-control validate[required,custom[email]]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-affiliate-5">Affiliate/Sponsor </label>
                                         <input type="text" name="team-affiliate-5" id="team-affiliate-5" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-gender-5">Gender</label>
                                         <select name="team-gender-5" id="team-gender-5" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-birth-5">Birth Date</label>
                                         <input type="text" name="team-birth-5" id="team-birth-5" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-shirt-5">Shirt Size</label>
                                         <select name="team-shirt-5" id="team-shirt-5" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                   
                   
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>                      
                   
                   
                   
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-address-5">Address</label>
                                         <input type="text" name="team-address-5" id="team-address-5" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-address2-5">Address 2</label>
                                         <input type="text" name="team-address2-5" id="team-address2-5" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-5">
                                       <div class="form-group">
                                         <label for="team-zip-5">Postal Code</label>
                                         <input type="text" name="team-zip-5" id="team-zip-5" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#team-zip-5', '#team-city-5', '#team-county-5', '#team-state-5')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-5">
                                       <div class="form-group">
                                         <label for="team-city-5">City</label>
                                         <input type="text" name="team-city-5" id="team-city-5" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-5">
                                       <div class="form-group">
                                         <label for="team-state-5">State</label>
                                         <div class="select2-container form-control input-select2" id="s2id_team-state-5"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-6">- Select -</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen6" class="select2-offscreen">State</label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-6" id="s2id_autogen6" data-prompt-position="topLeft"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen6_search" class="select2-offscreen">State</label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-6" id="s2id_autogen6_search" placeholder="" data-prompt-position="topLeft">   </div>   <ul class="select2-results" role="listbox" id="select2-results-6">   </ul></div></div><select name="team-state-5" id="team-state-5" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State" style="display: none;">
                                           <option value="">- Select -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-county-5">County</label>
                                         <input type="text" name="team-county-5" id="team-county-5" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-country-5">Country</label>
                                         <input type="text" name="team-country-5" id="team-country-5" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     
                                   </div>
                   
                   
                   
                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form" id="mem-6" style="display: none;">
                                   <h3>Team Member 6:</h3>
                   
                                   <label class="copy_team_check checkbox-inline"><input type="checkbox" value="5" class="copy_team_info" data-prompt-position="topLeft"> Copy From Above</label>
                   
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-first-name-6">First Name</label>
                                         <input type="text" name="team-first-name-6" id="team-first-name-6" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-last-name-6">Last Name</label>
                                         <input type="text" name="team-last-name-6" id="team-last-name-6" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-phone-6">Mobile Phone</label>
                                         <input type="text" name="team-phone-6" id="team-phone-6" class="form-control validate[required,custom[phonecustom]]" required="" placeholder="No Dashes or Parentheses (e.g. 4073219999)" pattern="[0-9_-_(_)]{10,14}" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-email-6">Email Address </label>
                                         <input type="email" name="team-email-6" id="team-email-6" class="form-control validate[required,custom[email]]" required="" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-affiliate-6">Affiliate/Sponsor </label>
                                         <input type="text" name="team-affiliate-6" id="team-affiliate-6" class="form-control validate[required]" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-gender-6">Gender</label>
                                         <select name="team-gender-6" id="team-gender-6" class="form-control validate[required]" required="" data-prompt-position="topLeft">
                                           <option value="">- Select -</option>
                                           <option value="M">Male</option>
                                           <option value="F">Female</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-birth-6">Birth Date</label>
                                         <input type="text" name="team-birth-6" id="team-birth-6" class="form-control input-datepick  validate[required] hasDatepicker" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-shirt-6">Shirt Size</label>
                                         <select name="team-shirt-6" id="team-shirt-6" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                           <option value="">- Select -</option>
                   
                                           <option value="FXS">Female Extra Small</option><option value="FS">Female Small</option><option value="FM">Female Medium</option><option value="FL">Female Large</option><option value="FXL">Female Extra Large</option><option value="MS">Male Small</option><option value="MM">Male Medium</option><option value="ML">Male Large</option><option value="MXL">Male XL</option><option value="MXXL">Male XX Large</option>                      
                   
                   
                   
                   
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-address-6">Address</label>
                                         <input type="text" name="team-address-6" id="team-address-6" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-address2-6">Address 2</label>
                                         <input type="text" name="team-address2-6" id="team-address2-6" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-zip-6">Postal Code</label>
                                         <input type="text" name="team-zip-6" id="team-zip-6" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#team-zip-6', '#team-city-6', '#team-county-6', '#team-state-6')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-city-6">City</label>
                                         <input type="text" name="team-city-6" id="team-city-6" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="team-state-6">State</label>
                                         <div class="select2-container form-control input-select2" id="s2id_team-state-6"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-7">- Select -</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen7" class="select2-offscreen">State</label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-7" id="s2id_autogen7" data-prompt-position="topLeft"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen7_search" class="select2-offscreen">State</label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-7" id="s2id_autogen7_search" placeholder="" data-prompt-position="topLeft">   </div>   <ul class="select2-results" role="listbox" id="select2-results-7">   </ul></div></div><select name="team-state-6" id="team-state-6" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State" style="display: none;">
                                           <option value="">- Select -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-county-6">County</label>
                                         <input type="text" name="team-county-6" id="team-county-6" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6" style="display:none;">
                                       <div class="form-group">
                                         <label for="team-country-6">Country</label>
                                         <input type="text" name="team-country-6" id="team-country-6" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     
                                   </div>
                   
                   
                                 </div>
                                 <div class="panel-footer text-center">
                                   <button type="button" id="team-info-form" class="btn btn-success">Continue</button> &nbsp;or&nbsp; <a href="#cancel_order_modal" target="#cancel_order_modal" data-toggle="modal" class="cancel-order">Cancel Order</a>
                                 </div>
                               </div>
                             </form>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="waiver-page-tab">
                   
                             <form action="#" method="post" id="waiver-page-form" class="">
                   
                               <div class="panel panel-default">
                                 <div class="panel-heading heading-paragraph-design black">
                                   <h2 class="panel-title">Waiver</h2>
                                 </div>
                                 <div class='col-md-12 error form-group hide' id="errfrm1" style="display: none;">
                                 <div class='alert-danger alert errmsg'>Please correct the errors and try
                                 again.</div>
                                  </div>
                                 <div class="panel-body">
                   
                                   <div class="form-group">
                                     <label for="waiver">You must read (and scroll) through the entire waiver below and then acknowledge your acceptance.</label>
                                     <div style="position: relative;">
                                       <div id="waiver">
                                         <p>Participants involved in any activities offered by 2020 Black Sheep Games 3  may be photographed or videotaped during training. The undersigned hereby consents to the use of these photographs and/or videos without compensation, on the 2020 Black Sheep Games 3 website or in any editorial, promotional or advertising material produced and/or published by 2020 Black Sheep Games 3.</p>
                                         <p>Express assumption of risk:  I, the undersigned, am aware that there are significant risks involved in all aspects of physical training. These risks include, but are not limited to: falls which can result in serious injury or death; injury or death due to negligence on the part of myself, my training partner, or other people around me; injury or death due to improper use or failure of equipment; strains and sprains. I am aware that any of these above mentioned risks may result in serious injury or death to myself and or my partner(s). I willingly assume full responsibility for the risks that I am exposing myself to and accept full responsibility for any injury or death that may result from participation in any activity or class while at, or under direction of 2020 Black Sheep Games 3.</p>
                                         <p>I acknowledge that I have no physical impairments, injuries, or illnesses that will endanger myself or others.
                                         </p><p>In consideration of the above mentioned risks and hazards and in consideration of the fact that I am willingly and voluntarily participating in the activities offered by 2020 Black Sheep Games 3, I, the undersigned hereby release 2020 Black Sheep Games 3, their principals, agents, employees, and volunteers from any and all liability, claims, demands, actions or rights of action, which are related to, arise out of, or are in any way connected with my participation in this activity, including those allegedly attributed to the negligent acts or omissions of the above mentioned parties. This agreement shall be binding upon me, my successors, representatives, heirs, executors, assigns, or transferees.  If any portion of this agreement is held invalid, I agree that the remainder of the agreement shall remain in full legal force and effect.  If I am signing on behalf of a minor child, I also give full permission for any person connected with 2020 Black Sheep Games 3 to administer first aid deemed necessary, and in case of serious illness or injury, I give permission to call for medical and or surgical care for the child and to transport the child to a medical facility deemed necessary for the well being of the child.</p>
                                         <p>The participant recognizes that there is risk involved in the types of activities offered by 2020 Black Sheep Games 3. Therefore the participant accepts financial responsibility for any injury that the participant may cause either to him/herself or to any other participant due to his/her negligence. Should the above mentioned parties, or anyone acting on their behalf, be required to incur attorneyâ€™s fees and costs to enforce this agreement, I agree to reimburse them for such fees and costs. I further agree to indemnify and hold harmless 2020 Black Sheep Games 3, their principals, agents, employees, and volunteers from liability for the injury or death of any person(s) and damage to property that may result from my negligent or intentional act or omission while participating in activities offered by 2020 Black Sheep Games 3, at the main building or abroad. This includes but is not limited to parks, recreational areas, playgrounds, areas adjacent to main building, and/or any area selected for training by 2020 Black Sheep Games 3.</p>
                                         <p>I have read and understood the foregoing assumption of risk, and release of liability and I understand that by signing it obligates me to indemnify the parties named for any liability for injury or death of any person and damage to property caused by my negligent or intentional act or omission. I understand that by signing this form I am waiving valuable legal rights.</p>
                                       </div>
                                       <div id="waiver-error">Please read the whole waiver before continuing.</div>
                                     </div>
                                   </div>
                   
                                   <div class="panel-body form-horizontal">
                                     <div class="form-group">
                                       <div class="col-sm-6">
                                         <div class="initialsformError parentFormwaiver-page-form formError"><div class="formErrorArrow"><div class="line10"><!-- --></div><div class="line9"><!-- --></div><div class="line8"><!-- --></div><div class="line7"><!-- --></div><div class="line6"><!-- --></div><div class="line5"><!-- --></div><div class="line4"><!-- --></div><div class="line3"><!-- --></div><div class="line2"><!-- --></div><div class="line1"><!-- --></div></div></div><input type="text" name="initials" id="initials" class="form-control validate[required]" required="" pattern="[a-zA-Z0-9]{2,5}" title="Please enter your initials" data-prompt-position="topLeft">
                                       </div>
                                     </div>
                                     <div class="checkbox form-group">
                                       <div class="col-sm-6 col-sm-offset-3">
                                         <label>
                                           <input id="agree_waiver" name="agree_waiver" type="checkbox" value="1" required="" class="validate[required]" data-prompt-position="topLeft">
                                           I acknowledge that I am over the age of 18 and that I have read and agree to the conditions of this waiver.
                                         </label>
                                       </div>
                                     </div>
                                   </div>
                   
                   
                                 </div>
                                 <div class="panel-footer text-center">
                                   <button type="button" id="save-waiver" class="btn btn-success">Continue</button> &nbsp;or&nbsp; <a href="#cancel_order_modal" target="#cancel_order_modal" data-toggle="modal" class="cancel-order">Cancel Order</a>
                                 </div>
                               </div>
                   
                             </form>
                   
                           </div>
                           <div role="tabpanel" class="tab-pane" id="review-order-tab">
                   
                             
                             <div class="panel panel-default">
                               <div class="panel-heading heading-paragraph-design black">
                                 <h2 class="panel-title">Review Your Order</h2>
                               </div>
                               <div class="panel-body">
                                 <b>Your registration for has been added to your cart.</b>
                               </div>
                                <style>#review_order_table tr td:first-child{display:none}</style>
                               <div id="review_order_table">
                                 <table class="table table-condensed">
                                   <thead>
                                     <tr>
                                       <td style="width: 50px;"></td>
                                       <td><strong>Item</strong></td>
                                       <td class="text-center"><strong>Price</strong></td>
                                       <td class="text-center"><strong>Quantity</strong></td>
                                       <td class="text-right"><strong>Total</strong></td>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr id="division_item">
                                       <td class="text-center"></td>
                                       <td id="review_category">Test</td>
                                       <span id="user_name"></span>
                                       <td class="text-center">$<span id="review_price"></span></td>
                                       <td class="text-center">1</td>
                                       <td class="text-right">$<span id="review_total_price"></span></td>
                                     </tr>
                                     <!-- <tr>
                                       <td class="thick-line"></td>
                                       <td class="thick-line"></td>
                                       <td class="thick-line"></td>
                                       <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                       <td class="thick-line text-right">$<span id="review_order_subtotal">0.00</span></td>
                                     </tr> -->
                                     <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Service Fee</strong></td>
                                       <td class="no-line text-right">$<span id="review_order_service_fee">{{$site_settings[0]->service_fees}}</span></td>
                                     </tr>
                                     <!-- <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Taxes</strong></td>
                                       <td class="no-line text-right">$<span id="review_order_taxes">0.00</span></td>
                                     </tr>
                                     <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Shipping</strong></td>
                                       <td class="no-line text-right">$<span id="review_order_shipping">0.00</span></td>
                                     </tr> -->
                                     <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Total</strong></td>
                                       <td class="no-line text-right">$<span id="review_order_total">0.00</span></td>
                                     </tr>
                                   </tbody>
                                 </table>
                               </div>
                               <div class="panel-footer text-center">
                                 <button type="button" id="save_review" class="btn btn-success">Continue</button> &nbsp;or&nbsp; <a href="#cancel_order_modal" target="#cancel_order_modal" data-toggle="modal" class="cancel-order">Cancel Order</a>
                               </div>
                             </div>
                   
                           </div>
                           <div role="tabpanel" class="tab-pane" id="billing-info-tab">
                   
                             <form action="#" method="post" id="billing-info-form">
                   
                               <div class="panel panel-default">
                                 <div class="panel-heading heading-paragraph-design black">
                                   <h2 class="panel-title">Billing Info</h2>
                                 </div>
                                 <div class="panel-body">
                   
                                   <div class="row">
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_info_first_name">First Name</label>
                                         <input type="text" name="billing_info_first_name" id="billing_info_first_name" class="form-control validate[required]" required="">
                                       </div>
                                     </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_info_last_name">Last Name</label>
                                         <input type="text" name="billing_info_last_name" id="billing_info_last_name" class="form-control validate[required]" required="">
                                       </div>
                                     </div>
                                   </div>
                                   <div class="row">
                                     <article class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_info_ctype">Card Type</label>
                                         <div class="input-group input-group-sm">
                                           <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                           <select name="ctype" id="billing_info_ctype" class="form-control validate[required]">
                                             <option value="">Select Card</option>
                                             <option value="Visa">Visa</option>
                                             <option value="Master Card">Master Card</option>
                                             <option value="Discover">Discover</option>
                                             <option value="Amex">Amex</option>
                                           </select>
                                         </div>
                                       </div>
                                     </article>
                                     <article class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_info_cnumber">Card Number</label>
                                         <div class="input-group input-group-sm">
                                           <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                           <input type="text" class="form-control validate[required]" id="billing_info_cnumber" name="billing_info_cnumber">
                                         </div>
                                       </div>
                                     </article>
                                   </div>
                                   <div class="row">
                                     <article class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_info_expdate_month">Expiration Date</label>
                                         <div class="row">
                                           <div class="col-sm-6">
                                             <div class="input-group input-group-sm">
                                               <span class="input-group-addon"></span>
                                               <!-- <select name="billing_info_expdate_month" id="billing_info_expdate_month" class="form-control validate[required]">
                                                 <option value="01">January</option>
                                                 <option value="02">February</option>
                                                 <option value="03">March</option>
                                                 <option value="04">April</option>
                                                 <option value="05">May</option>
                                                 <option value="06">June</option>
                                                 <option value="07">July</option>
                                                 <option value="08">August</option>
                                                 <option value="09">September</option>
                                                 <option value="10">October</option>
                                                 <option value="11">November</option>
                                                 <option value="12">December</option>
                   
                                               </select> -->
                                               <input type="text" placeholder="Expire Month" name="billing_info_expdate_month" id="billing_info_expdate_month" class="form-control validate[required]">
                                             </div>
                                           </div>
                                           <div class="col-sm-6">
                                             <div class="input-group input-group-sm">
                                               <span class="input-group-addon"></span>
                                               <!-- <select name="billing_info_expdate_year" id="billing_info_expdate_year" class="form-control validate[required]">
                                                 <option value="2015" selected="">2015</option>
                                                 <option value="2016">2016</option>
                                                 <option value="2017">2017</option>
                                                 <option value="2018">2018</option>
                                                 <option value="2019">2019</option>
                                                 <option value="2020">2020</option>
                                                 <option value="2021">2021</option>
                                                 <option value="2022">2022</option>
                                                 <option value="2023">2023</option>
                                                 <option value="2024">2024</option>
                                                 <option value="2025">2025</option>
                                                 <option value="2026">2026</option>
                                                 <option value="2027">2027</option>
                                                 <option value="2028">2028</option>
                                                 <option value="2029">2029</option>
                   
                                               </select> -->
                                               <input type="text" placeholder="Expire Year" name="billing_info_expdate_year" id="billing_info_expdate_year" class="form-control validate[required]">
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                     </article>
                   
                                     <article class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_info_cvv">CVV</label>
                                         <div class="input-group input-group-sm">
                                           <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                           <input type="text" class="form-control validate[required]" id="billing_info_cvv" name="billing_info_cvv">
                                         </div>
                                         <span class="help-block"><a href="#cvvguide" data-toggle="modal" data-target="#cvvguide">What is the CVV?</a></span>
                                       </div>
                                       <!-- Modal -->
                                       <div class="modal fade" id="cvvguide" tabindex="-1" role="dialog" aria-labelledby="cvvguide" aria-hidden="true">
                                         <div class="modal-dialog">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                               <h4 class="modal-title" id="myModalLabel">What is the CVV?</h4>
                                             </div>
                                             <div class="modal-body">
                                               <p>CVV stands for Card Verification Value. This number is used as a security feature to protect you from credit card fraud. Finding the number on your card is a very simple process. Just follow the directions below.</p>
                                               <div class="media">
                                                 <div class="pull-left">
                                                   <img class="media-object" src="{{ asset('Frontend/assets/img/icons/visa_cvv.jpg') }}" alt="VISA CVV" pagespeed_url_hash="1794320041" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                 </div>
                                                 <div class="media-body">
                                                   <h4 class="media-heading">Visa, MasterCard, Discover:</h4>
                                                   The CVV for these cards is found on the back side of the card. It is only the last three digits on the far right of the signature panel box.
                                                 </div>
                                               </div>
                                               <div class="media">
                                                 <div class="pull-left">
                                                   <img class="media-object" src="assets/img/icons/amex_cvv.jpg" alt="American Express CVV" pagespeed_url_hash="2862721091" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                                 </div>
                                                 <div class="media-body">
                                                   <h4 class="media-heading">American Express:</h4>
                                                   The CVV on American Express cards is found on the front of the card. It is a four digit number printed in smaller text on the right side above the credit card number.
                                                 </div>
                                               </div>
                                             </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                               <button type="button" class="btn btn-success" data-dismiss="modal">Okay!</button>
                                             </div>
                                           </div>
                                         </div>
                                       </div><!-- /.modal -->
                                     </article>
                                   </div>
                   
                                   <div class="row">
                                     <article class="col-sm-3">
                                       <div class="form-group">
                                         <label for="promo_code">Promo Code</label>
                                         <div class="input-group input-group-sm">
                                           <span class="input-group-addon"><i class="fas fa-ticket-alt"></i></span>
                                           <input type="text" class="form-control" id="promo_code" name="promo_code">
                                         </div>
                                       </div>
                                     </article>
                                     <article class="col-sm-9">
                                       <div class="form-group">
                                         <label class="hidden-xs">&nbsp;</label>
                                         <p class="form-control-static" style="    line-height: 1;"> <small style="line-height: 1;">Get special discount by adding a promo code if you have any.</small></p>
                                       </div>
                                     </article>
                                   </div>

                                 </div>
                                 <div class="panel-body panel-body-inner team-group-form">
                                   <h3>Billing Address</h3>
                   
                                   <div class="row">
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_address_address">Address</label>
                                         <input type="text" name="billing_address_address" id="billing_address_address" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="billing_address_address2">Address 2</label>
                                         <input type="text" name="billing_address_address2" id="billing_address_address2" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-4">
                                       <div class="form-group">
                                         <label for="billing_address_zip">Postal Code</label>
                                         <input type="text" name="billing_address_zip" id="billing_address_zip" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#billing_address_zip', '#billing_address_city', '#billing_address_county', '#billing_address_state')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-4">
                                       <div class="form-group">
                                         <label for="billing_address_city">City</label>
                                         <input type="text" name="billing_address_city" id="billing_address_city" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-4">
                                       <div class="form-group">
                                         <label for="billing_address_state">State</label>
                                         <select class="form-control input-select2">
                                           <option value="">- Select -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
  
                                   </div>
                   
                                 </div>
                   
                                 <div class="panel-body panel-body-inner team-group-form">
                                   <h3>Shipping Address</h3>
                   
                                   <label class="copy_team_check checkbox-inline"><input type="checkbox"id="same" class="copy_billing_info" data-prompt-position="topLeft" onchange= "addressFunction()"/> Same as Billing</label>
                   
                                   <div class="row">
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="shipping_address_address">Address</label>
                                         <input type="text" name="shipping_address_address" id="shipping_address_address" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                         <label for="shipping_address_address2">Address 2</label>
                                         <input type="text" name="shipping_address_address2" id="shipping_address_address2" class="form-control  " data-prompt-position="topLeft">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-4">
                                       <div class="form-group">
                                         <label for="shipping_address_zip">Postal Code</label>
                                         <input type="text" name="shipping_address_zip" id="shipping_address_zip" class="form-control   validate[required]" data-prompt-position="topLeft" required="" onkeyup="postal_to_county_mapping('#shipping_address_zip', '#shipping_address_city', '#shipping_address_county', '#shipping_address_state')">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-4">
                                       <div class="form-group">
                                         <label for="shipping_address_city">City</label>
                                         <input type="text" name="shipping_address_city" id="shipping_address_city" class="form-control   validate[required]" data-prompt-position="topLeft" required="">
                                       </div>
                                     </div>
                   
                                     <div class="col-sm-4">
                                       <div class="form-group">
                                         <label for="shipping_address_state">State</label>
                                         <select name="shipping_address_state" id="shipping_address_state" class="form-control input-select2" data-prompt-position="topLeft" required="" tabindex="-1" title="State">
                                           <option value="">- Select -</option>
                                           <option value="AL">Alabama</option>
                                           <option value="AK">Alaska</option>
                                           <option value="AZ">Arizona</option>
                                           <option value="AR">Arkansas</option>
                                           <option value="CA">California</option>
                                           <option value="CO">Colorado</option>
                                           <option value="CT">Connecticut</option>
                                           <option value="DE">Delaware</option>
                                           <option value="DC">District Of Columbia</option>
                                           <option value="FL">Florida</option>
                                           <option value="GA">Georgia</option>
                                           <option value="HI">Hawaii</option>
                                           <option value="ID">Idaho</option>
                                           <option value="IL">Illinois</option>
                                           <option value="IN">Indiana</option>
                                           <option value="IA">Iowa</option>
                                           <option value="KS">Kansas</option>
                                           <option value="KY">Kentucky</option>
                                           <option value="LA">Louisiana</option>
                                           <option value="ME">Maine</option>
                                           <option value="MD">Maryland</option>
                                           <option value="MA">Massachusetts</option>
                                           <option value="MI">Michigan</option>
                                           <option value="MN">Minnesota</option>
                                           <option value="MS">Mississippi</option>
                                           <option value="MO">Missouri</option>
                                           <option value="MT">Montana</option>
                                           <option value="NE">Nebraska</option>
                                           <option value="NV">Nevada</option>
                                           <option value="NH">New Hampshire</option>
                                           <option value="NJ">New Jersey</option>
                                           <option value="NM">New Mexico</option>
                                           <option value="NY">New York</option>
                                           <option value="NC">North Carolina</option>
                                           <option value="ND">North Dakota</option>
                                           <option value="OH">Ohio</option>
                                           <option value="OK">Oklahoma</option>
                                           <option value="OR">Oregon</option>
                                           <option value="PA">Pennsylvania</option>
                                           <option value="RI">Rhode Island</option>
                                           <option value="SC">South Carolina</option>
                                           <option value="SD">South Dakota</option>
                                           <option value="TN">Tennessee</option>
                                           <option value="TX">Texas</option>
                                           <option value="UT">Utah</option>
                                           <option value="VT">Vermont</option>
                                           <option value="VA">Virginia</option>
                                           <option value="WA">Washington</option>
                                           <option value="WV">West Virginia</option>
                                           <option value="WI">Wisconsin</option>
                                           <option value="WY">Wyoming</option>
                                         </select>
                                       </div>
                                     </div>
                   
                                   </div>
                   
                                 </div>
                               </div>
                               <div class="panel-footer text-center">
                                 <button type="button" id="save_billing" class="btn btn-success">Confirm</button>
                                 &nbsp;or&nbsp; <a href="#cancel_order_modal" target="#cancel_order_modal" data-toggle="modal" class="cancel-order">Cancel Order</a>
                               </div>
                   
                             </form>
                           </div>
                           
                           <div role="tabpanel" class="tab-pane" id="cart-summary-tab">
                             <div class="panel panel-default">
                               <div class="panel-heading heading-paragraph-design black">
                                 <h2 class="panel-title">Registration Summary</h2>
                               </div>
                               <div class="panel-body">
                                 <div class="alert alert-danger" id="promo_fail_message" style="display: none">
                                 </div>
                                 <div>
                                   Your order is not yet complete!
                                   <br>
                                   To complete your order, review the details below and click Submit Order.
                                   <br>
                                   <b>Please ** NOTE **: There are No Refunds for this event. An alternate athlete, in your exact division, may be substituted up to two weeks prior to event date. Please email support@boxtribe.com to provide alternate athlete registration details.</b>
                                 </div>
                               </div>
                               <div class="panel-body panel-body-inner">
                                 <h3>Shopping Cart</h3>
                   
                                 <div class="grey-box-info">
                                   <div class="billed-to-left">
                                     <address id="billing_info_text">
                                       <strong>Billed To:</strong><br>
                                       <span id="b1">John Smith</span><br>
                                       <span id="b2">1234 Main</span><br>
                                       <span id="b3">At. 4B</span><br>
                                       <span id="b4">Sringfield, ST 54321</span>
                                     </address>
                                   </div>
                                   <div class="billed-to-rght">
                                     <address id="shipping_info_text">
                                       <strong>Shipped To:</strong><br>
                                       <span id="s1">Jane Smith</span><br>
                                       <span id="s2">1234 Main</span><br>
                                       <span id="s3">Apt. 4B</span><br>
                                       <span id="s4">Springfield, ST 54321</span>
                                     </address>
                                   </div>
                                 </div>
                   
                               </div>
                               <div id="summary_table">
                                 <table class="table table-condensed">
                                   <thead>
                                     <tr>
                                       <td><strong>Item</strong></td>
                                       <td class="text-center"><strong>Price</strong></td>
                                       <td class="text-center"><strong>Quantity</strong></td>
                                       <td class="text-right"><strong>Total</strong></td>
                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr id="division_item2">
                                       <td id="summary_category">Test</td>
                                       <td class="text-center">$<span id="summary_fees">100</span></td>
                                       <td class="text-center">1</td>
                                       <td class="text-right">$<span id="summary_total">100</span></td>
                                     </tr>
                                     <!-- <tr>
                                       <td class="thick-line"></td>
                                       <td class="thick-line"></td>
                                       <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                       <td class="thick-line text-right">$<span id="summary_subtotal">0.00</span></td>
                                     </tr> -->
                                     <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Service Fee</strong></td>
                                       <td class="no-line text-right">$<span id="summary_service_fee">{{$site_settings[0]->service_fees}}</span></td>
                                     </tr>
                                     <!-- <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Taxes</strong></td>
                                       <td class="no-line text-right">$<span id="summary_taxes">0.00</span></td>
                                     </tr>
                                     <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Shipping</strong></td>
                                       <td class="no-line text-right">$<span id="summary_shipping">0.00</span></td>
                                     </tr> -->
                                     <tr>
                                       <td class="no-line"></td>
                                       <td class="no-line"></td>
                                       <td class="no-line text-center"><strong>Total</strong></td>
                                       <td class="no-line text-right">$<span id="summary_subtotal">0.00</span></td>
                                     </tr>
                                   </tbody>
                                 </table>
                               </div>
                               <div class="panel-body panel-body-inner" id="billing_info_summary">
                                 <h3>Billing Information</h3>
                                 <div class="form-horizontal billing-inforMation">
                                   <div class="form-group billing-frm-flex">
                                     <label class="control-label">Full Name:</label>
                                       <p class="form-control-static" id="summary_full_name">Some Name</p>
                                   </div>
                                   <div class="form-group billing-frm-flex">
                                     <label class="control-label">Zip Code:</label>
                                       <p class="form-control-static" id="summary_zip">XX45678</p>
                                   </div>
                                   <div class="form-group billing-frm-flex">
                                     <label class="control-label">Card:</label>
                                       <p class="form-control-static" id="summary_card">Card Company</p>
                                   </div>
                                   <div class="form-group billing-frm-flex">
                                     <label class="control-label">Card Expiration:</label>
                                       <p class="form-control-static" id="summary_card_expiry">18 August (08) 2019</p>
                                   </div>
                                 </div>
                   
                               </div>
                               <div class="panel-footer text-center">
                                 <!-- <a href="#none" class="btn btn-success" onclick="$(this).remove();
                                     $('.goto').show()">Submit Order</a> -->
                                 <!-- <a href="#none" class="btn btn-success goto" style="display: none">Click Again to Confirm</a> -->
                                 <button type="button" id="submit_last_form" class="btn btn-success">Confirm</button>
                                 &nbsp;or&nbsp; <a href="#cancel_order_modal" target="#cancel_order_modal" data-toggle="modal" class="cancel-order">Cancel Order</a>
                               </div>
                             </div>
                           </div>
                           <div role="tabpanel" class="tab-pane" id="purchase-confirmation-tab">
                   
                   
                             <div class="panel panel-default">
                               <div class="panel-heading heading-paragraph-design black">
                                 <h2 class="panel-title">Purchase Confirmation</h2>
                               </div>
                               <div class="panel-body">
                                 <div id="order_status">
                                   Thank you very much for your purchase! Below is your receipt. We've also emailed a copy to you for your records. Please hang on to these in case you need to make any changes or have any questions in the future.
                                   <br><br>
                   
                                   <b>**NOTE**</b> Charges on your Credit Card Statement will be noted as  <b id="credit_card_statment">TF COMP REGISTER 407-906-3562 FL</b>
                   
                                 </div>      <br>
                                 <a href="{{route('index')}}" class="btn btn-success">Return to Home Page</a>
                   
                               </div>
                               <!-- <div class="panel-body panel-body-inner">
                                 <h3>Order</h3>
                   
                                 <div class="row">
                                   <div class="col-xs-6">
                                     <address id="purchase_confirmation_info_text">
                   
                                     </address>
                                   </div>
                                   <div class="col-xs-6 text-right">
                                     <address id="purchase_confirmation_info_text2">
                   
                                     </address>
                                   </div>
                                 </div>
                   
                               </div>
                               <div class="table-responsive" id="purchase_confirmation_table">
                   
                               </div> -->
                   
                               <div class="panel-body panel-body-inner" id="billing_info_summary">
                                <h3>Billing Information</h3>
                                <div class="form-horizontal billing-inforMation">
                                  <div class="form-group billing-frm-flex">
                                    <label class="control-label">Full Name:</label>
                                      <p class="form-control-static" id="summary_full_name2">Some Name</p>
                                  </div>
                                  <div class="form-group billing-frm-flex">
                                    <label class="control-label">Zip Code:</label>
                                      <p class="form-control-static" id="summary_zip2">XX45678</p>
                                  </div>
                                  <div class="form-group billing-frm-flex">
                                    <label class="control-label">Card:</label>
                                      <p class="form-control-static" id="summary_card2">Card Company</p>
                                  </div>
                                  <div class="form-group billing-frm-flex">
                                    <label class="control-label">Card Expiration:</label>
                                      <p class="form-control-static" id="summary_card_expiry2">18 August (08) 2019</p>
                                  </div>
                                </div>
                              </div>
                             </div>
                           </div>
                         </div>
                      </div>
                  </div>
                </div>
             </div>
          </div>
</main>

<div class="modal" id="cancel_order_modal" tabindex="-1" role="dialog" aria-labelledby="cancel_order_modal" style="display: none;">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Order Process</h4>
        </div>
        <div class="modal-body text-center">
        Are you sure you would like to start over?
        </div>
        <div class="modal-footer text-center">
        <a href="" class="btn btn-default">Yes, start over</a>
        <a href="#" class="btn btn-primary" data-dismiss="modal">No, do not start over</a>
        </div>
    </div>
    </div>
</div>


<script src="https://js.stripe.com/v2/"></script>

<!-- <script>
function toggleStatus() {
    if ($('#toggleElement').is(':checked')) {
        $('#idOfTheDIV :input').attr('disabled', true);
    } else {
        $('#idOfTheDIV :input').removeAttr('disabled');
    }   
}
</script> -->


<script>
  $(document).ready(function() {

    // $("#personal-info-tab").addClass("disabledbutton");
    $("#waiver-page-tab").addClass("disabledbutton");
    $("#review-order-tab").addClass("disabledbutton");
    $("#billing-info-tab").addClass("disabledbutton");
    $("#cart-summary-tab").addClass("disabledbutton");
    $("#purchase-confirmation-tab").addClass("disabledbutton");
    var review_category = $("input[type='radio']:checked").data('name');
    $('#review_category').html(review_category);
    var review_price = $("input[type='radio']:checked").data('price');
    $('#review_price').html(review_price);
    var review_total_price = $("input[type='radio']:checked").data('price');
    $('#review_total_price').html(review_total_price);
    var service_fees = $("#review_order_service_fee").html();
 
    var subTotal = parseFloat(review_price) + parseFloat(service_fees);
    $('#review_order_total').html(subTotal);
    var team_type = $("input[type='radio']:checked").attr('class');
    var team_size =$("input[type='radio']:checked").attr('id')
    
      if(team_type == 'Team')
      {
          $('#personal-info-single-panel').hide();   
          $('#personal-info-team-panel').show(); 
          if(team_size == '3')
          {
            $("#mem-3").css('display', 'block');
          }
          if(team_size == '4')
          {
            $("#mem-3").css('display', 'block');
            $("#mem-4").css('display', 'block');
          }
          if(team_size == '5')
          {
            $("#mem-3").css('display', 'block');
            $("#mem-4").css('display', 'block');
            $("#mem-5").css('display', 'block');
          }
          if(team_size == '6')
          {
            $("#mem-3").css('display', 'block');
            $("#mem-4").css('display', 'block');
            $("#mem-5").css('display', 'block');
            $("#mem-6").css('display', 'block');
          }

      }
      else{
            $('#personal-info-team-panel').hide();   
            $('#personal-info-single-panel').show(); 
      }
  });
</script>

<script>
  function addressFunction() 
  { 
    if (document.getElementById('same').checked) 
    { 
      document.getElementById('shipping_address_address').value=document. 
              getElementById('billing_address_address').value; 
      document.getElementById('shipping_address_address2').value=document. 
              getElementById('billing_address_address2').value
      document.getElementById('shipping_address_zip').value=document. 
              getElementById('billing_address_zip').value
      document.getElementById('shipping_address_city').value=document. 
              getElementById('billing_address_city').value 
    } 
        
    else
    { 
      document.getElementById('shipping_address_address').value=""; 
      document.getElementById('shipping_address_address2').value=""; 
      document.getElementById('shipping_address_zip').value=""; 
      document.getElementById('shipping_address_city').value=""; 
    } 
  } 
</script>
<script>
  $('#personal_email').on('input', function () {
                var email = $(this).val();
                var url = "{{ url('/check-email-exists') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {"_token": "{{ csrf_token() }}","email":email},
                    beforeSend: function(){
                      // $("#confirm_booking"+id).html('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span> Loading ...');
                      // $("#confirm_booking"+id).attr('disabled','disabled');                
                    },
                    success: function(response) {
                      console.log(response);
                      if(response.status == 'false')
                      {
                        //  alert('in');
                        //$("#personal-info-form").attr('disabled','disabled');
                        $('#personal-info-form').prop('disabled', true);
                        $("#errfrm").css('display', 'block');
                        $('.errmsg').html('Email already exists,Please try with a different email');
                        $('.hide').removeClass('hide');
                        
                      }
                      else{
                        $("#errfrm").css('display', 'none');
                        $('.hide').addClass('hide');
                        $("#personal-info-form").attr('disabled',false);
                      }
                    },
                    error: { }
                });
  });
</script>

<script type="text/javascript">
  $('#submit_first_form').click(function(e){
     e.preventDefault();
     var reg_type = $("input[type='radio']:checked").val();
      //  alert(reg_type);
     var url = "{{ url('/save-registration-type') }}";
   // var url = "{{ route('save.registration.type') }}";

     $.ajax({
              type: 'post',
              //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: url,
              data: {"_token": "{{ csrf_token() }}","reg_type":reg_type},
              beforeSend: function(){
                  // $("#confirm_booking"+id).html('<span class="spinner"><i class="fa fa-spinner fa-spin"></i></span> Loading ...');
                  // $("#confirm_booking"+id).attr('disabled','disabled');                
              },    
              success: function(data) {
                 console.log(data);
                 if(data.status == 'success')
                 {
                  //  alert('in');
                  $("#registration-type-tab").removeClass('active');
                  $("#personal-info-tab").addClass('active');
                 }
              },
              error: { }
          });
  });
</script>

<script>
  $('#personal-info-form').click(function(e){
    e.preventDefault();
    // alert('in');
      $('.has-error').removeClass('has-error');
      $('.error').addClass('hide')
      valid = true;
      if(document.getElementById('personal_first_name').value=='')
      {
       document.getElementById('personal_first_name').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter first name');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
     else if(document.getElementById('personal_last_name').value=='')
      {
       document.getElementById('personal_last_name').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter last name');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_phone').value=='')
      {
       document.getElementById('personal_phone').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter contact number');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      // else if(document.getElementById('personal_email').value=='')
      // {
      //  document.getElementById('personal_email').parentElement.className = "has-error";
      //  $("#errfrm").css('display', 'block');
      //  $('.errmsg').html('Please enter email');
      //  $('.hide').removeClass('hide');
      //  valid = false;
      //  return false;
      // }
      else if(document.getElementById('personal_affiliate').value=='')
      {
       document.getElementById('personal_affiliate').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter affiliate/sponsor');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_gender').value=='')
      {
       document.getElementById('personal_gender').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter gender');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_birth').value=='')
      {
       document.getElementById('personal_birth').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter date of birth');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_shirt').value=='')
      {
       document.getElementById('personal_shirt').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter shirt size');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_address').value=='')
      {
       document.getElementById('personal_address').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter address');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_zip').value=='')
      {
       document.getElementById('personal_zip').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter zip code');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_city').value=='')
      {
       document.getElementById('personal_city').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter city');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      else if(document.getElementById('personal_state').value=='')
      {
       document.getElementById('personal_state').parentElement.className = "has-error";
       $("#errfrm").css('display', 'block');
       $('.errmsg').html('Please enter state');
       $('.hide').removeClass('hide');
       valid = false;
       return false;
      }
      if(valid==true)
      {
        $("#errfrm").css('display', 'none');
        // alert('in');
        var formdata = $('#personal-info-singple-form').serialize();
        console.log(formdata);
        var url = "/save-personal-info";
        $.ajax({
                type: 'post',
                //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                data: {"_token": "{{ csrf_token() }}","formdata":formdata},
                beforeSend: function(){
                              
                },    
                success: function(data) {
                  console.log(data);
                  if(data.status == 'success')
                  {
                    //  alert('in');
                    $("#waiver-page-tab").removeClass("disabledbutton");
                    // $("#waiver-page-tab").addClass("enabledbutton");
                    $("#personal-info-tab").removeClass('active');
                    $("#waiver-page-tab").addClass('active');
                  }
                },
                error: { }
        });
      }
     

  });
</script>

<script>
  $('#save-waiver').click(function(e){
      e.preventDefault();
      $('.has-error').removeClass('has-error');
      $('.error').addClass('hide');
      valid = true;
        if(document.getElementById('initials').value=='')
        {
        document.getElementById('initials').parentElement.className = "has-error";
        $("#errfrm1").css('display', 'block');
        $('.errmsg').html('Please enter your initials');
        $('.hide').removeClass('hide');
        valid = false;
        return false;
        }
        else if(document.getElementById('agree_waiver').value=='')
        {
        document.getElementById('agree_waiver').parentElement.className = "has-error";
        $("#errfrm1").css('display', 'block');
        $('.errmsg').html('Please check this box');
        $('.hide').removeClass('hide');
        valid = false;
        return false;
        }

        if(valid==true)
        {
          $("#errfrm").css('display', 'none');
          // alert('in');
          var formdata = $('#waiver-page-form').serialize();
          console.log(formdata);
          var url = "/save-waiver";

          $.ajax({
                    type: 'post',
                    //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: url,
                    data: {"_token": "{{ csrf_token() }}","formdata":formdata},
                    beforeSend: function(){

                    },    
                    success: function(data) {
                      console.log(data);
                      if(data.status == 'success')
                      {
                        //  alert('in');
                        $("#review-order-tab").removeClass("disabledbutton");
                        // $("#review-order-tab").addClass("enabledbutton");
                        $("#waiver-page-tab").removeClass('active');
                        $("#review-order-tab").addClass('active');
                      }
                    },
                    error: { }
          });
        }

  });
</script>

<script>
  $('#save_review').click(function(e){
    document.getElementById('billing_info_first_name').value=document. 
    getElementById('personal_first_name').value;

    document.getElementById('billing_info_last_name').value=document. 
    getElementById('personal_last_name').value; 

    document.getElementById('billing_address_address').value=document. 
    getElementById('personal_address').value; 

    document.getElementById('billing_address_zip').value=document. 
    getElementById('personal_city').value; 

    document.getElementById('billing_address_city').value=document. 
    getElementById('personal_city').value; 

    // document.getElementById('billing_address_state').value=document. 
    // getElementById('personal_state').value; 
      $("#billing-info-tab").removeClass("disabledbutton");
      $("#review-order-tab").removeClass('active');
      $("#billing-info-tab").addClass('active');        
  });
</script>

<script>
  $('#save_billing').click(function(e){
    e.preventDefault();
    var formdata = $('#billing-info-form').serialize();
    console.log(formdata);
    var url = "/save-billing-info";

    $.ajax({
              type: 'post',
              //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: url,
              data: {"_token": "{{ csrf_token() }}","formdata":formdata},
              // beforeSend: function(){
                             
              // },    
              success: function(response) {
                 console.log(response);
                 console.log(response.data.billing_info_first_name+ ' ' +response.data.billing_info_last_name);
                 if(response.status == 'success')
                 {
                  var review_category = $("input[type='radio']:checked").data('name');
                  $('#summary_category').html(review_category);
                  var review_price = $("input[type='radio']:checked").data('price');
                  $('#summary_fees').html(review_price);
                  var review_total_price = $("input[type='radio']:checked").data('price');
                  $('#summary_total').html(review_total_price);
                  var service_fees = $("#summary_service_fee").html();
                  var subTotal = parseFloat(review_price) + parseFloat(service_fees);
                  $('#summary_subtotal').html(subTotal);
                  $("#cart-summary-tab").removeClass("disabledbutton");
                  $("#billing-info-tab").removeClass('active');
                  $("#cart-summary-tab").addClass('active');
                  document.getElementById("b1").innerHTML =response.data.billing_info_first_name+ ' ' +response.data.billing_info_last_name;
                  document.getElementById("b2").innerHTML =response.data.billing_address_address;
                  document.getElementById("b3").innerHTML =response.data.billing_address_city;
                  document.getElementById("b4").innerHTML =response.data.billing_address_zip;
                  document.getElementById("s1").innerHTML =response.data.billing_info_first_name+ ' ' +response.data.billing_info_last_name;
                  document.getElementById("s2").innerHTML =response.data.shipping_address_address;
                  document.getElementById("s3").innerHTML =response.data.shipping_address_city;
                  document.getElementById("s4").innerHTML =response.data.shipping_address_zip;
                  document.getElementById("summary_full_name").innerHTML =response.data.billing_info_first_name+ ' ' +response.data.billing_info_last_name;
                  document.getElementById("summary_zip").innerHTML =response.data.billing_address_zip;
                  document.getElementById("summary_card").innerHTML =response.data.ctype;
                  document.getElementById("summary_card_expiry").innerHTML =response.data.billing_info_expdate_month+ '/' +response.data.billing_info_expdate_year;

                 }
              },
              error: { }
          });

  });
</script>

<script>
    $('input[type="radio"]').click(function() {
      var review_category = $("input[type='radio']:checked").data('name');
      $('#review_category').html(review_category);
      var review_price = $("input[type='radio']:checked").data('price');
      $('#review_price').html(review_price);
      var review_total_price = $("input[type='radio']:checked").data('price');
      $('#review_total_price').html(review_total_price);
      var service_fees = $("#review_order_service_fee").html();
    
      var subTotal = parseFloat(review_price) + parseFloat(service_fees);
      $('#review_order_total').html(subTotal);
      var team_size =$("input[type='radio']:checked").attr('id');
          if($(this).attr('class') == 'Team') {
            $('#personal-info-single-panel').hide();   
            $('#personal-info-team-panel').show();   
            if(team_size == '3')
            {
              $("#mem-3").css('display', 'block');
            }
            if(team_size == '4')
            {
              $("#mem-3").css('display', 'block');
              $("#mem-4").css('display', 'block');
            }
            if(team_size == '5')
            {
              $("#mem-3").css('display', 'block');
              $("#mem-4").css('display', 'block');
              $("#mem-5").css('display', 'block');
            }
            if(team_size == '6')
            {
              $("#mem-3").css('display', 'block');
              $("#mem-4").css('display', 'block');
              $("#mem-5").css('display', 'block');
              $("#mem-6").css('display', 'block');
            }
          }
          else {
            $('#personal-info-team-panel').hide();   
                $('#personal-info-single-panel').show();   
          }
   });
</script>

<script>
  $('#submit_last_form').click(function(e){
    e.preventDefault();
    Stripe.setPublishableKey('<?php echo $site_settings[0]->stripe_p_key ?>');
    Stripe.createToken({
           number: $('#billing_info_cnumber').val(),
           cvc: $('#billing_info_cvv').val(),
           exp_month: $('#billing_info_expdate_month').val(),
           exp_year: $('#billing_info_expdate_year').val()
         }, stripeResponseHandler);
  });

  function stripeResponseHandler(status, response)
  {
    console.log(response);
        if (response.error) {
          //  alert('errror');
        } 
        else {
          // alert('in');
          var token = response.id;
          var url = "/submit-final-form";
            $.ajax({
            type: 'post',
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: url,
            data: {"_token": "{{ csrf_token() }}","token":token},
            beforeSend: function(){
                            
            },    
            success: function(response) {
              console.log(response.get_billing_info);
              if(response.status == 'success')
              {
                //  alert('in');
                document.getElementById("summary_full_name2").innerHTML =response.get_billing_info.billing_info_first_name+ ' ' +response.get_billing_info.billing_info_last_name;
                document.getElementById("summary_zip2").innerHTML =response.get_billing_info.billing_address_zip;
                document.getElementById("summary_card2").innerHTML =response.get_billing_info.ctype;
                document.getElementById("summary_card_expiry2").innerHTML =response.get_billing_info.billing_info_expdate_month+ '/' +response.get_billing_info.billing_info_expdate_year;
                $("#purchase-confirmation-tab").removeClass("disabledbutton");
                $("#cart-summary-tab").removeClass('active');
                $("#purchase-confirmation-tab").addClass('active');
              }
            },
            error: { }
          });
        }
  }
</script>


<script>
  $('#team-info-form').click(function(e){
    e.preventDefault();
    // alert('in');
    var formdata = $('#personal-info-team-form').serialize();
    console.log(formdata);
    var url = "/save-team-info";

    $.ajax({
              type: 'post',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              url: url,
              data: {"formdata":formdata},
              beforeSend: function(){
                               
              },    
              success: function(data) {
                 console.log(data);
                 if(data.status == 'success')
                 {
                  //  alert('in');
                  $("#personal-info-tab").removeClass('active');
                  $("#waiver-page-tab").addClass('active');
                 }
              },
              error: { }
          });

  });
</script>

<!-- <script type="text/javascript">

    $(document).ready(function () {

        $('#personal-info-singple-form').validate({
          
          rules: {
            personal_first_name: {
                  required: true,
              },
              personal_last_name: {
                  required: true
              },
              personal_phone: {
                  required: true
              },
              personal_email: {
                  required: true
              },
              personal_affiliate: {
                  required: true
              },
              personal_gender: {
                  required: true
              },
              personal_birth: {
                  required: true
              },
              personal_shirt: {
                  required: true
              },
              personal_address: {
                  required: true
              },
              personal_zip: {
                  required: true
              },
              personal_city: {
                  required: true
              },
              personal_state: {
                  required: true
              },
              personal_county: {
                  required: true
              },
              personal_country: {
                  required: true
              },
              
          },
          // Specify validation error messages
          messages: {
            personal_first_name: {
                  required: "Please enter first name."
              },
              personal_last_name: {
                  required: "Please enter last name."
              },
              personal_phone: {
                  required: "Please enter phone number."
              },
              personal_email: {
                  required: "Please enter email."
              },
              personal_affiliate: {
                  required: "Please enter affiliate."
              },
              personal_gender: {
                  required: "Please enter your gender."
              },
              personal_birth: {
                  required: "Please enter you date of birth."
              },
              personal_shirt: {
                  required: "Please enter your shirt size."
              },
              personal_address: {
                  required: "Please enter your address."
              },
              personal_zip: {
                  required: "Please enter your zipcode."
              },
              personal_city: {
                  required: "Please enter your city."
              },
              personal_state: {
                  required: "Please enter your state."
              },
              personal_county: {
                  required: "Please enter your county."
              },
              personal_country: {
                  required: "Please enter your country."
              },
          },
          submitHandler: function (form) {
              signup(1);
          }
      });

    });

    function signup(step="") {
        var formdata = $('#personal-info-singple-form').serialize();
        console.log(formdata);
        
        $.ajax({
            async:false,
            type: 'POST',
           
            data: {_token: '<?php echo csrf_token() ?>', formdata: formdata},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                // $('#ajax_loader').show();
            },
            success: function (data) {
                // $('#ajax_loader').hide();
                console.log(data);
                if (data.status == 'success') {
                    console.log(status);
                    currentStep = step + 1;
                    manageSteps(currentStep);
                } else {
                    msg = data.message;
                    console.log(step);
                    $('#form-error-msg').html(msg);
                    $('#form-error-box').removeClass('hide').show();
                }
            }, error: function (data) {
                $('#ajax_loader').hide();
            }
        });
    }

</script> -->


@endsection