<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Styles -->
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin_style.css') }}" rel="stylesheet">

	<!-- Scripts -->

	<link href="{{ asset('js/admin.js') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<!-- Meta -->

	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<!-- Title -->

	<title>@yield('title')</title>

</head>
<body>
	<div class="wrapper">
		<nav id="sidebar">
			<div class="sidebar-items">	
		        <div class="sidebar-header">
		    	    <a href="{{ route('manage') }}">
		            	<h3>Управление</h3>
		            </a>
		        </div>
		        <div class="list-group">
		    	    <a href="{{ route('cities.index') }}" class="list-group-item list-group-item-action">Градове</a>
		    	    <a href="{{ route('universities.index') }}" class="list-group-item list-group-item-action">Университети</a>
		    	    <a href="{{ route('fields.index') }}"class="list-group-item list-group-item-action">Направления</a>
		    	    <a href="{{ route('subfields.index') }}" class="list-group-item list-group-item-action">Поднаправления</a>
		    	    <a href="{{ route('majors.index') }}" class="list-group-item list-group-item-action">Специалности</a>
		    	    <a href="{{ route('exam_type.index') }}" class="list-group-item list-group-item-action">Типове изпити</a>
		    	    <a href="{{ route('subject.index') }}" class="list-group-item list-group-item-action">Предмети</a>
		    	    <a href="{{ route('formula.index') }}" class="list-group-item list-group-item-action">Формули</a>
		        </div>
		    </div>
	    </nav>

	    <div id="main">
	    	<!-- Page Header  -->
			<div id="header">
				<h2>@yield('header')</h2>
			</div>

	    	<!-- Page Content  -->
		    <div id="content">
				@yield('content')
		    </div>
	    </div>
	</div>
</body>
</html>
	
</div>