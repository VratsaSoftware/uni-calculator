@extends('layouts.admin')

@section('title', 'Manage | Exam type')

@section('header', 'Нов вид')

@section('content')
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div class="container">
		<form method="POST" action="{{ route('exam_type.store')}}">
		{{ csrf_field() }}
			<strong>
				Име:
			</strong>
			<input type="text" placeholder="Име на вида" name="name">
			<input type="submit" name="submit" value="Създай">
		</form>
	</div>
	
@endsection