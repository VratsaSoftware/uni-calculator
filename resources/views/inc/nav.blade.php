<!-- Header -->
<header id="header">
	<h1><a href="{{ route('home') }}">{{ config('app.name') }}</a></h1>
	<nav id="nav">
		<ul>
            <li>
                <a href="{{ route('manage') }}">Управление</a>
            </li>
            <!-- Authentication Links -->
            @guest
            <li >
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li>
                <a id="navbarDropdown" href="#" role="button">
                	{{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
	</nav>
</header>