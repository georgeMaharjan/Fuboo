<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dist1/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('dist1/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('dist1/css/grayscale.min.css')}}" rel="stylesheet">
    <style >
        .form-control:focus {
            box-shadow: none;
        }
        @media(min-width:1100px) and (max-width:1950px){
            .masthead #search{
                width:700px !important;
                height: 75px;
            }
        }

        .zoom{
            transition-duration: 0.3s;
        }
        .zoom:hover {
            transition-duration: 0.3s;
            transform: scale(1.1);
        }
        .close{
            position: absolute;
            top: 10px;
            right: -30pc;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            color:#fff;
            line-height: 0;
            z-index: 100000;
        }
    </style >

</head>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <form action="{{route('search.result')}}" method="get">
                <div class="input-group input-group-lg" style="height: 70px">
                    <input class="form-control border-0" type="search" id="search" name="query" placeholder="Find Futsals" aria-label="Search" style="height: 70px; font-size: 30px">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search" style="font-size: 30px"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<body id="page-top" style="font-family: 'Calibri Light',monospace">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
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
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('futsals')}}">Futsals</a>
                </li>
                @auth()
                    @if(Auth::user()->type == 'owner')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('owner',Auth::user()->id)}}">My Futsal</a>
                        </li>
                    @endif
                @endauth
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
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
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

<section class="masthead" id="browse">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto" style="font-family: 'Calibri Light',monospace">
            <h1>
                Kick Off!!!
            </h1>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section text-center" style="position: relative">
    <div class="container " >
        <div class="row mb-5">
            <div class="col-md">
                <i class="fa fa-search-location text-light fa-6x" style=""></i>
                <p>Find</p>
            </div>

            <div class="col-md">
                <i class="fa fa-ticket-alt text-light fa-6x" style=""></i>
                <p>Book</p>
            </div>

            <div class="col-md">
                <i class="fa fa-futbol text-light fa-6x" style=""></i>
                <p>Play</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="mb-4">How it Works</h1>
                <p class="text-50">Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <img class=" img-fluid mb-3 mb-lg-0 zoom" src="{{asset('images/volley.jpg')}}" alt="">
            </div>
            <div class="col">
                <img class=" img-fluid mb-3 zoom" src="{{asset('images/boot.jpg')}}" alt="">

                <img class=" img-fluid zoom" src="{{asset('images/ball.jpg')}}"  alt="">
            </div>
            <div class="col">
                <img class=" img-fluid mb-3 mb-lg-0 zoom" src="{{asset('images/bootball.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="futsals" class="projects-section">
    <div class="container-fluid">
        <h1 class="mb-2">
            <a href = "{{route('futsals')}}" class = "btn-link text-dark text-decoration-none" >Find Futsals</a >
        </h1>
        <!-- Project One Row -->
        <div class="card-deck">
            <div class="card no-radius">
                <img class="img-fluid card-img-top" src="{{asset('images/boot.jpg')}}" alt="">
                <div class="card-body bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Misty</h4>
                            <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card no-radius">
                <img class="img-fluid card-img-top" src="{{asset('images/boot.jpg')}}" alt="">
                <div class="card-body bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Misty</h4>
                            <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>


            <div class="card no-radius">
                <img class="img-fluid card-img-top" src="{{asset('images/boot.jpg')}}" alt="">
                <div class="card-body bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Misty</h4>
                            <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- Bootstrap core JavaScript -->
<script src="{{asset('dist1/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dist1/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('dist1/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('dist1/js/grayscale.min.js')}}"></script>

</body>

</html>


{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Fuboo</title>--}}

{{--    <!-- Fonts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--    <!-- Styles -->--}}
{{--    <style>--}}
{{--        html, body {--}}
{{--            background-color: #fff;--}}
{{--            color: #636b6f;--}}
{{--            font-family: 'Nunito', sans-serif;--}}
{{--            font-weight: 200;--}}
{{--            height: 100vh;--}}
{{--            margin: 0;--}}
{{--        }--}}

{{--        .full-height {--}}
{{--            height: 100vh;--}}
{{--        }--}}

{{--        .flex-center {--}}
{{--            align-items: center;--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--        }--}}

{{--        .position-ref {--}}
{{--            position: relative;--}}
{{--        }--}}

{{--        .top-right {--}}
{{--            position: absolute;--}}
{{--            right: 10px;--}}
{{--            top: 18px;--}}
{{--        }--}}

{{--        .content {--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .title {--}}
{{--            font-size: 84px;--}}
{{--        }--}}

{{--        .links > a {--}}
{{--            color: #636b6f;--}}
{{--            padding: 0 25px;--}}
{{--            font-size: 13px;--}}
{{--            font-weight: 600;--}}
{{--            letter-spacing: .1rem;--}}
{{--            text-decoration: none;--}}
{{--            text-transform: uppercase;--}}
{{--        }--}}

{{--        .m-b-md {--}}
{{--            margin-bottom: 30px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="flex-center position-ref full-height">--}}
{{--    <div class="top-right">--}}
{{--        @if (Route::has('login'))--}}
{{--            <div class="user_img">--}}
{{--                @auth--}}
{{--                    <div class="btn-group">--}}
{{--                            <img src="{{asset('images/default.png')}}" class="rounded-circle" style="height: 40px; width: 40px" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                        <div class="dropdown-menu dropdown-menu-right">--}}
{{--                            <a class="dropdown-item" href="{{ url('/home')}}">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                {{ __('Logout') }}--}}
{{--                            </a>--}}
{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <a href="{{ route('login')}}" class="btn dark"><h4>Login</h4></a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}" class="btn text-dark"><h4>Register</h4></a>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            </div>--}}
{{--        @endif--}}

{{--    </div>--}}
{{--    @if(session('status'))--}}
{{--        <div class="alert accent-warning text-light" role="alert">--}}
{{--            {{session('status')}}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <div class="content">--}}
{{--        <div class="title m-b-md">--}}
{{--            Fuboo--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}
