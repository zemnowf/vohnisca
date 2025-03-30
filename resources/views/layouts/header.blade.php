<header>
    <div class="container">
                <span class="logo">
                    <a class="navbar-brand" href="{{ url('/') }}">VOHNISCA</a>
                </span>
        <nav>
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>

                @guest
                    <li><a href="{{ route('login')}}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="#">Tools</a></li>
                    <li><a href="#">Campaigns</a></li>
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest

            </ul>
        </nav>
    </div>
</header>
