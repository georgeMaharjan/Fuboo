<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fuboo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('dist1/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->

    <style >
        .form-control:focus {
            box-shadow: none;
        }
    </style >
</head>
<!--searchbar-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document"  style="max-width: 700px !important;">
        <div class="modal-content">
            <form action="{{route('search.result')}}" method="get" >
                <div class="input-group input-group-lg" style="height: 60px; width:700px !important">
                    <input class="form-control border-0" type="search" id="search" name="query" placeholder="Find Futsals" aria-label="Search" style="height: 70px;width:600px !important; font-size: 30px">
                    <div class="input-group-append" >
                        <button class="btn-xl btn-black btn " style="height: 70px" type="submit">
                            <i class="fas fa-search" style="font-size: 30px"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--        searchbar-->
<body style="font-family: 'Calibri Light',monospace">

<nav class="navbar navbar-expand-lg fixed-top mb-5" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand js-scroll-trigger" href="{{route('welcome')}}">Fuboo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
                        <span> <i class="fa fa-search"></i> </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('futsals')}}">Futsals</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->type == 'owner')
                                <a href = "{{route('owner.profile',Auth::user()->id)}}" class = "dropdown-item" >profile</a >

                            @elseif(Auth::user()->type == 'admin')
                                <a href = "{{route('admin',Auth::user()->id)}}" class = "dropdown-item" >profile</a >
                            @else
                                <a href = "{{route('player.profile',Auth::user()->id)}}" class = "dropdown-item" >profile</a >
                            @endif                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-lg-5 mt-5">
    @yield('content')
</main>

</body>
</html>
