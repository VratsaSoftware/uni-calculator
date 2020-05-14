@extends('layouts.admin')

@section('title', 'Manage | Subject')

@section('header', 'Нов предмет')

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
		<form method="POST" action="{{ route('subject.store')}}">
		{{ csrf_field() }}
			<strong>
				Име:
			</strong>
			<input type="text" placeholder="Име на предмета" name="name">
			<input type="submit" name="submit" value="Създай">
		</form>
	</div>
	
@endsection