@extends('layouts.frontendLayout.design')
@section('content')
<main class="main-content-wrapper">
        <section class="home-banner-section single-event-banner" style="background-image:url({{url('Frontend/images/banner.png')}})">
             <div class="banner-bg-section">
                <div class="container">
                <div class="home-banner-cntnt">
                   <h4>{{$get_event_details['event_location']}}</h4><br>
                   <h2>{{$event_date}}</h2><br>
                   <a href="#" class="btn btn-primary">Register Today</a>
                </div>                              
                </div>
             </div>
        </section>
        <section class="about-us-wrapper">
            <div class="container">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                     <div class="heading-paragraph-design black">
                        <h2>The Competition</h2>
                        <p>{!!$get_event_details['event_description']!!}</p>
                       </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                     <p><strong>Date:</strong>&nbsp; {{$event_date}}<br>
                        <strong>Time: </strong>&nbsp;{{$get_event_details['event_start_time']}} - {{$get_event_details['event_end_time']}}<br>
                       <strong>Location: </strong>&nbsp;{{$get_event_details['event_location']}}</p>
                  </div>
                  <div class="col-md-12"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7010.050949555602!2d-81.384276!3d28.538954!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e77baaaaa60fc7%3A0x7e49af923a2a4693!2s400%20W%20Church%20St%20%23200%2C%20Orlando%2C%20FL%2032801!5e0!3m2!1sen!2sus!4v1604580417333!5m2!1sen!2sus"  height="450" frameborder="0" style="border:0; width: 100%;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
                  <!-- <div class="col-md-6">
                    <ul>
                        <li class="li1"><span class="s2">Warm-up area provided</span></li>
                        <li class="li1"><span class="s2"> This is an indoor/outdoor event; it is highly recommended athletes bring tents and/or canopies to provide shade for in-between heats</span></li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                        <li class="li1"><span class="s2">Warm-up area provided</span></li>
                        <li class="li1"><span class="s2"> This is an indoor/outdoor event; it is highly recommended athletes bring tents and/or canopies to provide shade for in-between heats</span></li>
                    </ul>
                  </div> -->
                  <div class="col-md-12 text-center"><a href="#" class="btn btn-primary">Register Today</a></div>
               </div>
            </div>
        </section>
        <section class="gallery-design-wrapper parallex-section text-light" style="background-image:url({{url('Frontend/images/events-bannerpng.png')}})">
            <div class="container">
                <div class="white text-center">
                    <h3 class="oswald text-primary" style="text-align: left;">SCHEDULE OF EVENTS</h3>
                    <!-- <h3 class="oswald text-primary" style="text-align: left;">SUNDAY</h3> -->
                    <p class="p1" style="text-align: left;">{!!$get_event_details['event_schedule_details']!!}</p>
                    <!-- <p class="p1" style="text-align: left;">9:00am: First heats begin.</p>
                    <p class="p1" style="text-align: left;"><span class="s1">Awards ceremony and closing remarks will begin at approximately 5:00pm</span></p> -->
                </div>
            </div>
        </section>
        <section class="cutomer-feedback-se">
            <div class="container">
                <div class="heading-paragraph-design black text-center">
                    <h2>Divisions &amp; Movements</h2>
                    <!-- <p>(all standards are working weight:)</p> -->
                </div>
                
                @foreach($get_event_divisions as $key => $division)      
               
                    <p style="text-align: left;"><strong>{{$division['division_name']}}</strong>
                    {!!$division['division_details']!!}
                    </p>
                @endforeach
            </div>
            <div class="col-md-12 text-center"><a href="#" class="btn btn-primary">Register Today</a></div>
        </section>
        <section class="cutomer-feedback-se">
            <div class="container">
                <div class="heading-paragraph-design black text-center">
                    <h2>Contact Us</h2>
                    
                </div>
                            <div class="col-md-12"><form method="post" action="index.php?id=3567" id="mycontactform">
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="contact_name">Name *</label>
                                    <input type="text" name="contact_name" id="contact_name" class="form-control" required="">
                                    <span class="help-block small">First Name</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="contact_name2">&nbsp;</label>
                                    <input type="text" name="contact_name2" id="contact_name2" class="form-control">
                                    <span class="help-block small">Last Name</span>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label for="contact_email">Email Address *</label>
                                    <input type="email" name="contact_email" id="contact_email" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label for="contact_subject">Subject *</label>
                                    <input type="text" name="contact_subject" id="contact_subject" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label for="contact_message">Message *</label>
                                    <textarea name="contact_message" id="contact_message" class="form-control" rows="5" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg2" type="submit" id="contact_message">Submit</button>
                                    </div>
                                </div>
                                </div>
                        
                            </form></div>      
                
                
                
            </div>
            
        </section>
        <section class="single-event-last-section">
            <div class="col-md-12 text-center"><a href="#" class="btn btn-primary">Register Today</a></div>
        </section>   
</main>
@endsection