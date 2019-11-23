{{-- navbar ready --}}

{{-- header --}}
@if (Route::has('login'))
<nav class="navbar navbar-light navbar-expand-md float-right navigation-clean-button">
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
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                <a class="btn btn-light" href="#">Log In</a>
                @if (Route::has('register'))
                <a class="btn btn-tnafos action-button pr-3" role="button" href="#">Sign Up</a>
                @endif
                @endauth
            </span>
        </div>
    </div>
</nav>
@endif

{{-- end of navbar --}}


{{-- logo --}}

<img src="{{asset('/img/logo.svg')}}" width="100px" alt="">

{{-- search form --}}

<div class="form-group">
    <form action="{{-- {{route('search')}} --}}" method="get">
        {{-- @csrf --}}
        <div class="input-group">
            <input type="text" class="form-control form-control-user" id="home-search" placeholder="Search for..."
                aria-label="Search" name="query">
            <div class="input-group-append">
                <button class="btn btn-tnafos" id="click" type="submit">
                    <i class="fas fa-search fa-lg"></i>
                </button>
            </div>
        </div>
    </form>
</div>

{{-- links --}}

<div class="links">
    <a href="https://laravel.com/docs">Docs</a>
    <a href="https://laracasts.com">Tuturials</a>
    <a href="https://laravel-news.com">News</a>
    <a href="https://blog.laravel.com">Blog</a>
    <a href="https://nova.laravel.com">FAQ</a>
    <a href="https://forge.laravel.com">emials</a>
    <a href="https://github.com/laravel/laravel">GitHub</a>
</div>
