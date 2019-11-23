<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}} | {{now()->year}}</title>
    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    {{-- styles --}}
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

</head>

<body>

    <div class="container container-fluid full-height flex-center ">
        @if (Route::has('login'))
        <nav class="navbar navbar-light navbar-expand-md top-right navigation-clean-button">
            <div class="container">
                <div class="collapse navbar-collapse" id="navcol-1">
                    <span class="ml-auto navbar-text">
                        @auth
                        <a class="" href="{{Route('dashboard')}}">Dashboard</a>
                        {{-- user profile picture --}}
                        <a class="dropdown-toggle pl-3" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600">{{auth()->user()->name}}</span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        {{-- user dropdown menu --}}
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                        @else
                        {{-- show signup & login links --}}
                        <a class="btn btn-light mr-1" href="{{route('login')}}">Log In</a>
                        @if (Route::has('register'))
                        <a class="btn btn-tnafos action-button pr-3" role="button" href="{{route('register')}}">Sign Up</a>
                        @endif
                        @endauth
                    </span>
                </div>
            </div>
        </nav>
        @endif
        <div class="content">
            <div class="title m-b-md">
                <img src="{{asset('/img/logo.svg')}}" width="150vw" alt="">
                tnafos  تنافس
            </div>
            <div class="search">
                <div class="form-group">
                    <form action="{{-- {{route('search')}} --}}" method="get">
                        {{-- @csrf --}}
                        <div class="input-group">
                            <input type="text" class="form-control" id="home-search" placeholder="Search for..."
                                aria-label="Search" name="query">
                            <div class="input-group-append">
                                <button class="btn btn-tnafos" id="click" type="submit">
                                    <i class="fas fa-search fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>

    </div>


    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.js')}}"></script>

    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>

</body>

</html>
