<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('CSS/register.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>
<body  style="min-height:100vh;" @auth id="body-pd" class="body-pd-new" @endauth>
    <div id="app">
        @auth
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                          <li class="nav-item">
                              <a class="nav-link text-dark" href="home/profile">{{ __('Profile') }}</a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                              </li>
                            </div>
                          </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>    --}}
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <i class='bx bx-layer nav_logo-icon'></i>  </div>
            <div class="text-end"><i class='bx bx-user nav_icon'></i> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <a href="#" class="nav_logo text-center"> 
                        <img src="{{ asset('img/logo/linya-logo-mini.png') }}" style="width: 140px;"> 
                    </a>
                    <div class="nav_list"> 
                        <a href="{{ route('home') }}" class="nav_link {{ (Route::currentRouteName() == "home" || Route::currentRouteName() == "admin.architecture" || Route::currentRouteName() == "admin.engineering") ? "active" : "" }}"> 
                            <i class='bx bx-home-alt nav_icon'></i> 
                                <span class="nav_name">Home</span> 
                            </a> 
                        <a href="{{ route('admin.dashboard') }}" class="nav_link {{ Route::currentRouteName() == "admin.dashboard" ? "active" : "" }}"> 
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span> 
                        </a> 
                        <a href="{{ route('admin.appointment') }}" class="nav_link {{ (Route::currentRouteName() == "admin.appointment" || Route::currentRouteName() == "admin.appointments.completed" || Route::currentRouteName() == "admin.appointments.missed" || Route::currentRouteName() == "admin.appointments.visitors") ? "active" : "" }}"> 
                            <i class='bx bx-message-square-detail nav_icon'></i> 
                            <span class="nav_name">Appointments</span> 
                        </a> 
                        <a href="{{ route('admin.announcement') }}" class="nav_link {{ Route::currentRouteName() == "admin.announcement" ? "active" : "" }}"> 
                            <i class='bx bx-bookmark nav_icon'></i> 
                            <span class="nav_name">Announcement</span> 
                        </a> 
                        {{-- <a href="{{ route('admin.schedule') }}" class="nav_link {{ Route::currentRouteName() == "admin.schedule" ? "active" : "" }}"> 
                            <i class='bx bx-calendar nav_icon'></i> 
                            <span class="nav_name">Schedule</span> 
                        </a>  --}}
                        <a href="{{ route('admin.profile') }}" class="nav_link {{ Route::currentRouteName() == "admin.profile" ? "active" : "" }}"> 
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Profile</span> 
                        </a>
                    </div>
                </div> 
                <a class="nav_link" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav_link"> 
                    <i class='bx bx-log-out nav_icon'></i> 
                    <span class="nav_name">SignOut</span> 
                </a>
                <form id="logout-form" action="{{ route('login') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="bg-light">
            <main>
                @yield('content')
            </main>
        </div>
        <!--Container Main end-->
        @endauth

        @guest
            <main>
                @yield('content')
            </main>   
        @endguest
        
    </div>

    {{-- <footer id="sticky-footer" class="flex-shrink-0 py-4 text-dark-50">
      <div class="container text-center">
        <small>Made with ❤️ by <a href="https://www.youtube.com/channel/UCPj8ztcYe1D6SSuXPDpupeA" style="text-decoration: none;">Seven Stac</a></small>
      </div>
    </footer> --}}
    @yield('scripts')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
       document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId);
            
                // Function to set the navigation state based on local storage
                const setNavigationState = () => {
                    const isNavVisible = localStorage.getItem('isNavVisible') === 'true';

                    if (isNavVisible) {
                        nav.classList.add('show');
                        toggle.classList.add('bx-x');
                        bodypd.classList.add('body-pd');
                        headerpd.classList.add('body-pd');
                    }
                }

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // Toggle the 'show' class for the navigation
                        nav.classList.toggle('show');
                        
                        // Change icon
                        toggle.classList.toggle('bx-x');
                        
                        // Add/remove padding to body and header
                        bodypd.classList.toggle('body-pd');
                        headerpd.classList.toggle('body-pd');
                        
                        // Store the navigation state in local storage
                        const isNavVisible = nav.classList.contains('show');
                        localStorage.setItem('isNavVisible', isNavVisible.toString());
                    });
                }

                // Set the initial navigation state
                setNavigationState();
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');
            
            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link');

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            
            linkColor.forEach(l => l.addEventListener('click', colorLink));
        });


    </script>
</body>
</html>
