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
			{!!Form::open(['route'=> ['subfields.destroy', $subfield->id], 'method'=>'delete']) !!}
				{!! Form::submit('Изтрий') !!}
			{!! Form::close()!!}
		</td>
	</tr>
	@endforeach
</table>

<p>
	<a href="{{route('subfields.create')}}">Добавете поднаправление</a>
</p>

