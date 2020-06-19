<!-- Header -->
<header id="header">
	<div class="custom-nav">
		
		<div class="col-lg-4">
			<a href="{{ route('home') }}">
				<img src="{{ URL::asset("images/uni_calc_logo_tilted_hat.png") }}" alt="logo">
			</a>
		</div>
		<div class="col-lg-4">
			<a href="{{ route('home') }}">
				<h3>{{ config('app.name') }}</h3>
			</a>
		</div>
		<div class="col-lg-4 auth">
			@guest
				<a href="{{ route('login') }}">Вход</a>
			@endguest
			@auth
			<!-- <div class="auth-nav"> -->
		    	<h4>{{ Auth::user()->first_name }}</h4>
			    <a href="{{ route('logout') }}" onclick="event.preventDefault();
			    								document.getElementById('logout-form').submit();">
			        {{ __('Изход') }}
			    </a>
			    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			        @csrf
			    </form>
			<!-- </div> -->
            @endauth
		</div>
	</div>
</header>