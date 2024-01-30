<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('CSS/side-nav.css') }}" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="side-nav">
            <img src="/img/logo/linya-logo-mini.png" alt="" srcset="" class="logo-img">
            <hr class="text-light">
            <ul>
                <li><a href="/home"><i class="bi bi-house-fill"></i> <span>HOME</span></a></li>
                <li><a href="/dashboard"><i class="bi bi-windows"></i> <span>DASHBOARD</span></a></li>
                <li><a href="/appointment"><i class="bi bi-calendar-check-fill"></i> <span>APPOINTMENTS</span></a></li>
                <li><a href="/announcement"><i class="bi bi-megaphone-fill"></i> <span>ANNOUNCEMENT</span></a></li>
                <li><a href="/facultyinfo"><i class="bi bi-person-badge-fill"></i> <span>FACULTY</span></a></li>
                <li><a href="/schedule"><i class="bi bi-calendar-day-fill"></i> <span>SCHEDULE</span></a></li>
                <li><a href="/studentdata/computer-studies"><i class="bi bi-person-badge-fill"></i> <span>STUDENTS</span></a></li>
            </ul>
            <hr class="text-light">
            <ul class="flex-end">
                <li><a href="/profile"><i class="bi bi-person-vcard-fill"></i> <span>PROFILE</span></a></li>
            </ul>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    {{-- <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    </ul> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name}}
                                    {{ Auth::user()->last_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4 left">
            <div class="sample">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
