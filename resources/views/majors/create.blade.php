@extends('layouts.admin')

@section('title', 'Majors')

@section('content')

<h2>Добавяне на нова специалност в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('majors.store') }}" method="POST">
	{{ csrf_field() }}
	<p>
		Име на специалността:
		<input type="text" name="name" value="{{ old('name') }}">
	</p>
	<p>
		Поднаправление:
		<select name="subfield_id" >
			@foreach($subfields as $subfield)
			<option value={{$subfield->id}}>{{$subfield->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		Форма на обучение:
		<input type="text" name="form" value="{{ old('form') }}">
	</p>
	<p>
		Квалификационна степен:
		<select name="program_id" >
			@foreach($programs as $program)
			<option value={{$program->id}}>{{$program->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		Максимален бал:
		<input type="number" name="max_score" value="{{ old('max_score') }}">
	</p>
	<p>
		Университет:
		<select name="university_id" >
			@foreach($universities as $university)
			<option value={{$university->id}}>{{$university->name}}</option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>	

<p>
	<a href="{{ route('majors.index') }}">Назад</a>
</p>
@endsection