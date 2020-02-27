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
			<a href="{{ route('cities.edit', $city->id) }}">Промени</a>
		</td>
		<td>
			<form action="{{ route('cities.destroy', $city->id )}}"  method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="Изтрий">
			</form>
		</td>
	</tr>
	@endforeach
</table>

<p>
	<a href="{{route('cities.create')}}">Добави град</a>
</p>