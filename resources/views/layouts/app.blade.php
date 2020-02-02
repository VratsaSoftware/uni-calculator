<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="{{ asset('js/skel.min.js') }}"></script>
	<script src="{{ asset('js/skel-layers.min.js') }}"></script>
	<script src="{{ asset('js/init.js') }}"></script>
	<noscript>
		
	<!-- Styles -->
		<link href="{{ asset('css/skel.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style-xlarge.css') }}" rel="stylesheet">
	</noscript>
	
	<!-- Meta -->

	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<!-- Title -->

	<title>@yield('title')</title>

</head>
<body>

	{{-- Header --}}

	@include('inc.nav')
	
	{{-- Content --}}

	@yield('content')
	
	{{-- Footer --}}

	@include('inc.footer')
</body>
</html>