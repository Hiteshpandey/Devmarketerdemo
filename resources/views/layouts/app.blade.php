<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{route('home')}}">
                       <img src="{{asset('images/logo.jpg')}}" alt="sitelogo" /> 
                    </a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
                </div>
                <div class="navbar-end">
                    @if(!Auth::guest())
                    <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                    <a href="{{route('register')}}" class="navbar-item is-tab">Join the community</a>
                    @else
                    <button class="dropdown navbar-item is-tab is-aligned-right">
                        Some Text <span class="icon"><i class="fa fa-caret-down"></i></span>
                        <ul class="dropdown-menu">
                            <li><a href="#"> <span class="icon"> <i class="fa fa-fw fa-user-circle-o"></i></span>Profile</a></li>
                            <li><a href="#"><span class="icon"> <i class="fa fa-fw fa-bell"></i></span>Notifications</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-cog"></i></span>Settings</a></li>
                            <li class="separator" href="#"></li>
                            <li><a href="#"><i class="fa fa-fw fa-sign-out"></i></span>Logout</a></li>
                        </ul>
                    </button>
                    @endif
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
