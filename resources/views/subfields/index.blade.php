<h2>Поднаправления</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table border="1">
	<tr>
		<td>
			<b>Поднаправление</b>
		</td>
		<td>
			<b>Направление</b>
		</td>
		<td>
			-
		</td>
		<td>
			-
		</td>
	</tr>
	@foreach($subfields as $subfield)
	<tr>
		<td>
			{{$subfield->name}}
		</td>
		<td>
			{{$subfield->field->name}}
		</td>
		<td>
			<a href="{{route('subfields.edit', $subfield->id)}}">Промени</a>
		</td>
		<td>
			<form action="{{ route('subfields.destroy', $subfield->id )}}"  method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="Изтрий">
			</form>
		</td>
	</tr>
	@endforeach
</table>

<p>
	<a href="{{route('subfields.create')}}">Добавете поднаправление</a>
</p>

