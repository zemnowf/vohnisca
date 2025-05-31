<header class="site-header">
    <div class="container header-container">
        <div class="header-brand">
            <a class="navbar-logo" href="{{ url('/') }}">VOHNISCA</a>
            <div class="header-slogan">Your Campaign Platform</div>
        </div>

        <nav class="header-nav">
            <ul class="nav-list">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">Home</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item {{ request()->is('tools*') ? 'active' : '' }}">
                        <a href="#">Tools</a>
                    </li>
                    <li class="nav-item {{ request()->is('campaigns*') ? 'active' : '' }}">
                        <a href="/campaigns">Campaigns</a>
                    </li>
                    <li class="nav-item user-menu">
                        <a href="#">{{ Auth::user()->name }}</a>
                        <ul class="user-dropdown">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav>
    </div>
</header>
