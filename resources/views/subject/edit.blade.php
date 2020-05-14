@extends('layouts.admin')

@section('title', 'Manage | Subject')

@section('header', 'Промени предмет')

@section('content')

	<a class="btn btn-outline-primary" href="{{ route('subject.index')}}"> <<< </a>
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div class="container">
		<form method="POST" action="{{ route('subject.update', $subject->id)}}">
		{{ csrf_field() }}
		@method('PATCH')
			<strong>
				Име:
			</strong>
			<input type="text" value="{{ $subject->name}}" name="name">
			<input type="submit" name="submit" value="Промени">
		</form>
	</div>

@endsection