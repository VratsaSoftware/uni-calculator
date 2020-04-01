@extends('layouts.admin')

@section('title', 'Cities')

@section('content')

<h2>Промени град</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('cities.update', $city->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<p>Name:
		<input type="text" name="name" value="{{ $city->name }}">
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<a href="{{ route('cities.index') }}">Назад</a>

@endsection