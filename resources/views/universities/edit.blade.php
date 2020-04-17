@extends('layouts.admin')

@section('title', 'Universities')

@section('header', 'Промени университет')

@section('content')

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach
	
<form action="{{ route('universities.update', $university->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<p>Име на университет:
		<input type="text" name="name" value="{{ $university->name }}">
	</p>
	<p>
		Град:
		<select name="city_id">
			<option value="{{ $university->city->id }}" selected>{{ $university->city->name }}</option>
			@foreach($cities as $city)
			<option value="{{ $city->id }}">{{ $city->name }} </option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<a href="{{ route('universities.index') }}">Назад</a>
@endsection