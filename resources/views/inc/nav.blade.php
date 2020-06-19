<!-- Header -->
<header id="header">
	<a href="{{ route('home') }}">
		<img src="{{ URL::asset("images/uni_calc_logo_tilted_hat.png") }}" alt="logo">
		<h3>{{ config('app.name') }}</h3>
	</a>
	<nav id="nav">
		<ul>
			@guest
            <li>
				<a href="{{ route('login') }}">Login</a>
            </li>
			@endguest
			@auth
            <li>
			    <div id="username">
			    	<h4>{{ Auth::user()->first_name }}</h4>
				    <a href="{{ route('logout') }}" onclick="event.preventDefault();
				    								document.getElementById('logout-form').submit();">
				        {{ __('Logout') }}
				    </a>
				    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				        @csrf
				    </form>
			    </div>
            </li>
            @endauth
        </ul>
	</nav>
	@auth
    @endauth
</header>