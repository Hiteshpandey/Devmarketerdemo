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
                @if(Auth::guest())
                <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
                <a href="{{route('register')}}" class="navbar-item is-tab">Join the community</a>
                @else
                <button class="dropdown navbar-item is-tab is-aligned-right">
                    Hello {{Auth::user()->name}} <span class="icon"><i class="fa fa-caret-down"></i></span>
                    <ul class="dropdown-menu">
                        <li><a href="#"> <span class="icon"> <i class="fa fa-fw fa-user-circle-o"></i></span>Profile</a></li>
                        <li><a href="#"><span class="icon"> <i class="fa fa-fw fa-bell"></i></span>Notifications</a></li>
                        <li><a href="{{route('manage.dashboard')}}"><i class="fa fa-fw fa-cog"></i></span>Manage</a></li>
                        <li class="separator" href="#"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-fw fa-sign-out"></i></span>Logout</a></li>
                    </ul>
                </button>
                @endif
            </div>
        </div>
    </nav>