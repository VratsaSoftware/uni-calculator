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

<p>
	<a href="{{route('universities.create')}}">Добави университет</a>
</p>
