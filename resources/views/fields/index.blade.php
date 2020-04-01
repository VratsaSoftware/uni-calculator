@extends('layouts.admin')

@section('title', 'Fields')

@section('content')

<h2>Направления</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table class="table table-hover">
	<tr>
		<td>
			№
		</td>
		<td>
			Направление
		</td>
		<td>
			-
		</td>
		<td>
			-
		</td>
	</tr>
	@foreach($fields as $field)
	<tr>
		<td>
			{{$field->id}}
		</td>
		<td>
			{{$field->name}}
		</td>
		<td>
			<a href="{{ route('fields.edit', $field->id )}}">Промени</a>
		</td>
		<td>
			<form action="{{ route('fields.destroy', $field->id )}}"  method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="Изтрий">
			</form>
		</td>
	</tr>
	@endforeach	
</table>

<p>
	<a href="{{route('fields.create')}}">Добавете направление</a>
</p>

@endsection