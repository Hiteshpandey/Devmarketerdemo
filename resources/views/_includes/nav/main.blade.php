<nav class="navbar has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item is-paddingless" href="{{route('home')}}">
                   <img src="{{asset('images/logo.jpg')}}" alt="sitelogo" /> 
                </a>
            </div>

            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <a href="#" class="navbar-item is-tab is-hidden-mobile m-l-10">Learn</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Discuss</a>
                    <a href="#" class="navbar-item is-tab is-hidden-mobile">Share</a>
                </div>
            </div>
            <div class="navbar-end nav-menu" style="overflow:visible">
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
                        <a class="navbar-item" href="{{route('manage.dashboard')}}"><i class="fa fa-fw fa-cog"></i></span>Manage</a>
                        <li class="navbar-divider" href="#"></li>
                        <a class="navbar-item" href="{{route('logout')}}"><i class="fa fa-fw fa-sign-out"></i></span>Logout</a>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </nav>