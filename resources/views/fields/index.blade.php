<h2>Направления</h2>

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
			Направление
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
			<a href="{{route('fields.edit', $field->id)}}">Промени</a>
		</td>
		<td>
			{!!Form::open(['route'=> ['fields.destroy', $field->id], 'method'=>'delete']) !!}
				{!! Form::submit('Изтрий') !!}
			{!! Form::close()!!}
		</td>
@endforeach
</table>

<p>
	<a href="{{route('fields.create')}}">Добавете направление</a>
</p>

