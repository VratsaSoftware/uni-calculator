@extends('layouts.admin')

@section('title', 'Subfields')

@section('content')
<h2>Промени поднаправление</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach
	

<form action="{{ route('subfields.update', $subfield->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<p>Име на поднаправлението:
		<input type="text" name="name" value="{{$subfield->name}}">
	</p>
	<p>
		Направление:
		<select name="field_id" >
			<option value="{{ $subfield->field->id }}" selected>{{ $subfield->field->name }}</option>
			@foreach($fields as $field)
			<option value="{{$field->id}}">{{$field->name}} </option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<a href="{{ route('subfields.index') }}">Назад</a>
@endsection