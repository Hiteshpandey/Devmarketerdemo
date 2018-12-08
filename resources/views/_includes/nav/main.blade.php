<nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item is-paddingless" href="{{route('home')}}">
                   <img src="{{asset('images/logo.jpg')}}" alt="sitelogo" /> 
                </a>
                {{-- if route has manage in second segment of url --}}
                @if (Request::segment(1) == "manage") 
                <a class="navbar-item is-hidden-desktop" id="slideout-button">
                    <span class="icon">
                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                    </span>
                </a>
                @endif

                <a role="button" class="nav-toggle navbar-burger burger" id="nav-toggle" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu navbarBasicExample" id='navbarBasicExample'>
                <div class="navbar-start">
                    <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
                </div>
                <div class="navbar-end nav-menu">
                    {{-- guest is laravel 5 above functionality --}}
                    @guest
                    <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                    <a href="{{route('register')}}" class="navbar-item is-tab">Join the community</a>
                    @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Hello {{Auth::user()->name}} 
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="#"> <span class="icon"> <i class="fa fa-fw fa-user-circle-o"></i></span>Profile</a>
                            <a class="navbar-item" href="#"><span class="icon"> <i class="fa fa-fw fa-bell"></i></span>Notifications</a>
                            <a class="navbar-item" href="{{route('manage.dashboard')}}"><span class="icon"><i class="fa fa-fw fa-cog"></i></span>Manage</a>
                            <li class="navbar-divider" href="#"></li>
                            <a class="navbar-item" href="{{route('logout')}}"><span class="icon"><i class="fa fa-fw fa-sign-out"></i></span>Logout</a>
                        </div>
                    </div>
                    @endguest
                </div>
        </div>
        </div>
    </nav>