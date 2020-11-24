@extends('layouts.frontendLayout.design')
@section('content')
      <main class="main-content-wrapper">
          <section class="home-banner-section" style="background-image:url({{ url('cmsimages/'.$cms[0]->page_image1) }})">
             <div class="banner-bg-section">
                <div class="container">
                <div class="home-banner-cntnt">
                   <h4>{{$cms[0]->short_headline}}</h4>
                   <h2>{{$cms[0]->primary_headline}}</h2>
                 <form>
                    <div class="form-grouph input-serach-design">
                     <div class="input-field">  
                      <input type="text" placeholder="Search Events">
                      </div>
                      <span class="input-frm-search">
                        <i class="fas fa-search">&nbsp;</i>
                      </span>
                      <span class="search-reset-span">
                        <i class="fas fa-times">&nbsp;</i>
                      </span>
                    </div>
                 </form>
                </div>
                </div>
             </div>
            </section>
            <section class="wecom-wrapper-sec">
              <div class="container-fluid no-padd">
                 <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                       <div class="address-athlete-img">
                       <img src="{{ asset('/cmsimages/'.$cms[0]->page_image2) }}">
                       </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                     <div class="address-flex-text-design">
                         <div class="address-box-wrapper">
                            <address>The Box Warriors<br>
                            {{$cms[0]->office_address}}
                              </address>
                         </div>
                         <div class="contact-details-header">
                             <a href="mailto:Steven.Preston88@gmail.com">{{$cms[0]->office_email}}</a>
                              <a href="tel:+1-408-555-5555">{{$cms[0]->office_contact}}</a>
                         </div>
                     </div>
                  </div>
                 </div>
              </div>
            </section>
            <section class="about-us-wrapper">
               <div class="container">
                <div class="row align-items-center">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                     <div class="heading-paragraph-design black">
                        <h4>{{$cms[0]->page_title}}</h4>
                        <h2>{{$cms[0]->about_us_headline}}</h2>
                        <p>{{$cms[0]->about_us_description}}</p>
                        <h5>We are setting the standard for events!</h5>
                        <div class="arrow-btn-design">
                           <a href="#">Read More <span class="right-arrow"><img src="{{ asset('Frontend/images/right-arrow.png') }}"></span></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                     <div class="athlete-imge-right">
                     <img src="{{ asset('/cmsimages/'.$cms[0]->page_image3) }}">
                     </div>
                  </div>
                </div>
               </div>
            </section>
            <section class="gallery-design-wrapper" style="background-image:url({{url('Frontend/images/events-bannerpng.png')}})">
               <div class="container">
                  <div class="heading-paragraph-design white text-center">
                    <h4>Events</h4>
                    <h2>Our Events</h2>
                   </div>
                   <div class="gallery-tab-design">
                         <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#upcoming-event">Upcoming Event</a>
                           </li>
                           <li class="nav-item">
                           <a class="nav-link " data-toggle="tab" href="#Events">Events</a>
                           </li>
                           <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#past-event">Past Event</a>
                           </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div id="upcoming-event" class="container tab-pane active">
                           @if(count($upcoming_events) > 0)
                              @foreach($upcoming_events as $key => $value)
                              <div>
                                   <div class="event-wrapper">
                                      <div class="event-image">
                                      <!-- <a href="{{ url('/event-details/'.$value['id']) }}"> <img src="{{ asset('/event_logos/'.$value['event_logo']) }}" style="width:200px;"/></a> -->
                                      <img src="{{ asset('/event_logos/'.$value['event_logo']) }}">
                                      </div>
                                      <div class="event-date">
                                      <h4>{{$value['event_start_date']}}</h4>
                                      </div>
                                      <div class="event-description">
                                      <a href="{{ url('/event-details/'.$value['id']) }}"><h3>{{$value['event_name']}}</h3></a>
                                      <p>{{$value['event_location']}}</p>
                                         <div class="event-btn-flex">
                                         <a href="{{ url('/register-event/'.$value['id']) }}">Register</a>
                                            <a href="#">Leaderboard</a>
                                         </div>
                                      </div>
                                   </div>
                              </div>
                              @endforeach
                              @endif
                           </div>
                           <div id="Events" class="container tab-pane fade">
                              <section class="center slider">
                              @if(count($current_events) > 0)
                              @foreach($current_events as $key => $value)
                              <div>
                                   <div class="event-wrapper">
                                      <div class="event-image">
                                      <img src="{{ asset('/event_logos/'.$value->event_logo) }}">
                                      </div>
                                      <div class="event-date">
                                      <h4>{{$value->event_start_date}}</h4>
                                      </div>
                                      <div class="event-description">
                                      <h3>{{$value->event_name}}</h3>
                                      <p>{{$value->event_location}}</p>
                                         <div class="event-btn-flex">
                                         <a href="{{ url('/register-event/'.$value->id) }}">Register</a>
                                            <a href="#">Leaderboard</a>
                                         </div>
                                      </div>
                                   </div>
                              </div>
                              @endforeach
                              @endif
                               </section>
                           </div>
                           <div id="past-event" class="container tab-pane fade">
                           @if(count($past_events) > 0)
                              @foreach($past_events as $key => $value)
                              <div>
                                   <div class="event-wrapper">
                                      <div class="event-image">
                                      <img src="{{ asset('/event_logos/'.$value['event_logo']) }}">
                                      </div>
                                      <div class="event-date">
                                      <h4>{{$value['event_start_date']}}</h4>
                                      </div>
                                      <div class="event-description">
                                      <a href="{{ url('/event-details/'.$value['id']) }}"><h3>{{$value['event_name']}}</h3></a>
                                      <p>{{$value['event_location']}}</p>
                                         <div class="event-btn-flex">
                                             <a href="{{ url('/register-event/'.$value['id']) }}">Register</a>
                                            <!-- <a href="{{ url('/event-leaderboard/'.$value['id']) }}">Leaderboard</a> -->
                                            <a href="#">Leaderboard</a>
                                          </div>
                                      </div>
                                   </div>
                              </div>
                              @endforeach
                              @endif
                           </div>
                        </div>
                   </div>
               </div>
            </section>
            <section class="cutomer-feedback-se">
               <div class="container">
                  <div class="heading-paragraph-design black text-center">
                     <h2>Reviews</h2>
                   </div>
                   <div class="feedback-section-slider">
                     <section class="center slider">
                        <div>
                           <div class="feedback-white-box">
                              <div class="feedback-client-image">
                                 <img src="{{ asset('Frontend/images/client-1.png') }}">
                              </div>
                                 <div class="feedback-client-cntnt">
                                    <h2 class="name">Andrew T.</h2>
                                    <h5>Web designer</h5>
                                    <p>I am very pleased, having had a second look. You didn't have much to play with but the pics are excellent. Cheers</p>
                                 </div>
                           </div>
                        </div>
                        <div>
                           <div class="feedback-white-box">
                              <div class="feedback-client-image">
                                 <img src="{{ asset('Frontend/images/client-1.png') }}">
                              </div>
                                 <div class="feedback-client-cntnt">
                                    <h2 class="name">Andrew T.</h2>
                                    <h5>Web designer</h5>
                                    <p>I am very pleased, having had a second look. You didn't have much to play with but the pics are excellent. Cheers</p>
                                 </div>
                           </div>
                        </div>
                        <div>
                           <div class="feedback-white-box">
                              <div class="feedback-client-image">
                                 <img src="{{ asset('Frontend/images/client-1.png') }}">
                              </div>
                                 <div class="feedback-client-cntnt">
                                    <h2 class="name">Andrew T.</h2>
                                    <h5>Web designer</h5>
                                    <p>I am very pleased, having had a second look. You didn't have much to play with but the pics are excellent. Cheers</p>
                                 </div>
                           </div>
                        </div>
                        <div>
                           <div class="feedback-white-box">
                              <div class="feedback-client-image">
                                 <img src="{{ asset('Frontend/images/client-1.png') }}">
                              </div>
                                 <div class="feedback-client-cntnt">
                                    <h2 class="name">Andrew T.</h2>
                                    <h5>Web designer</h5>
                                    <p>I am very pleased, having had a second look. You didn't have much to play with but the pics are excellent. Cheers</p>
                                 </div>
                           </div>
                        </div>
                     </section>
                   </div>
               </div>
            </section>
            <section class="home-contact-sec">
                  <div class="row">
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="map-section">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109741.02912911311!2d76.69348873658222!3d30.73506264436677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1598466076104!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">

                     </div>
                  </div>
            </section>
      </main>
@endsection
     
     