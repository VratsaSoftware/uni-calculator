<h2>Университети</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table border="1">
	<tr>
		<td>
			Име на университет
		</td>
		<td>
			Град
		</td>
		<td>
			-
		</td>
		<td>
			-
		</td>
	</tr>
	@foreach($universities as $university)
	<tr>
		<td>
			{{$university->name}}
		</td>
		<td>
			{{$university->city->name}}
		</td>
		<td>
			<a href="{{route('universities.edit', $university->id)}}">Update</a>
		</td>
		<td>
			{!!Form::open(['route'=> ['universities.destroy', $university->id], 'method'=>'delete']) !!}
				{!! Form::submit('Изтрий') !!}
			{!! Form::close()!!}
		</td>
	</tr>
		@endforeach
</table>

<p>
	<a href="{{route('universities.create')}}">Add university</a>
</p>
