<header id="main-header">
           <div id="main-navigation">
            <nav class="navbar navbar-expand-xl">
            
               <a class="navbar-brand" href="#"><img src="{{ asset('Frontend/images/logo.png') }}" alt="logo"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                 <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                 <ul class="navbar-nav">
                   <li class="nav-item">
                     <a class="nav-link" href="#">Home</a>
                   </li>
                    @guest

                    @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('athlete.events') }}">Purchased Events</a>
                    </li> 
                    @endguest
                  
                   @guest
                    <li class="nav-item dropdown">
                        
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Login') }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">
                                Athlete login
                            </a>
                            <a class="dropdown-item" href="{{ url('/judge/login') }}">
                                Judge Login
                            </a>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                   <!-- <li class="nav-item">
                     <a class="nav-link" href="#">EVENT CORDINATOR <span class="right-arrow"><img src="{{ asset('Frontend/images/right-arrow.png') }}"></span></a>
                   </li>     -->
                 </ul>
               </div>  
             </nav>
           </div>
</header>
