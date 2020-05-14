@extends('layouts.admin')

@section('title', 'Universities')

@section('header', 'Университети')

@section('content')

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach
<div>
	<table class="table table-hover">
		<thead>
			<th>
				Име на университет
			</th>
			<th>
				Град
			</th>
			<th>
				-
			</th>
			<th>
				-
			</th>
		</thead>
		@foreach($universities as $university)
		<tr>
			<td>
				{{ $university->name }}
			</td>
			<td>
				{{ $university->city->name }}
			</td>
			<td>
				<a href="{{ route('universities.edit', $university->id )}}">Промени</a>
			</td>
			<td>
				<form action="{{ route('universities.destroy', $university->id )}}"  method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<input type="submit" name="submit" value="Изтрий">
				</form>
			</td>
		</tr>
			@endforeach
	</table>
</div>
<div>
	<p>
		<a href="{{route('universities.create')}}">Добави университет</a>
	</p>
</div>
@endsection