<h2>Градове</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table border="1">
	<tr>
		<td>
			№
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
	@foreach($cities as $city)
	<tr>
		<td>
			{{$city->id}}
		</td>
		<td>
			{{$city->name}}
		</td>
		<td>
			<a href="{{route('cities.edit', $city->id)}}">Промени</a>
		</td>
		<td>
			{!!Form::open(['route'=> ['cities.destroy', $city->id], 'method'=>'delete']) !!}
				{!! Form::submit('Изтрий') !!}
			{!! Form::close()!!}
		</td>
	</tr>
	@endforeach
</table>

<p>
	<a href="{{route('cities.create')}}">Add city</a>
</p>