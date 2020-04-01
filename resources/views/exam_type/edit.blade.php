@extends('layouts.admin')

@section('title', 'Manage | Exam type')

@section('content')

	<a class="btn btn-outline-primary" href="{{ route('exam_type.index')}}"> <<< </a>
	<h3>Промени вида</h3>
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div class="container">
		<form method="POST" action="{{ route("exam_type.update", $exam_type->id)}}">
		{{ csrf_field() }}
		@method('PATCH')
			<strong>
				Име:
			</strong>
			<input type="text" value="{{ $exam_type->name}}" name="name">
			<input type="submit" name="submit" value="Промени">
		</form>
	</div>

@endsection