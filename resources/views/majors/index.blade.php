<h2>Специалности</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table border="1">

	<tr>
		<td>
			Наимнование на специалността
		</td>
		<td>
			Поднаправление
		</td>
		<td>
			Форма на обучение
		</td>
		<td>
			Квалификационна степен
		</td>
		<td>
			Максимален бал
		</td>
		<td>
			Университет
		</td>
	</tr>
	@foreach($majors as $major)
	<tr>
		<td>
			{{$major->name}}
		</td>
		<td>
			{{$major->subfield->name}}
		</td>
		<td>
			{{$major->form}}
		</td>
		<td>
			{{$major->max_score}}
		</td>
		<td>
			{{$major->program->name}}
		</td>
		<td>
			{{$major->university->name}}
		</td>
		<td>
			<a href="{{route('majors.edit', $major->id)}}">Update</a>
		</td>
		<td>
			{!!Form::open(['route'=> ['majors.destroy', $major->id], 'method'=>'delete']) !!}
				{!! Form::submit('Изтрий') !!}
			{!! Form::close()!!}
		</td>
@endforeach
</table>

<p>
	<a href="{{route('majors.create')}}">Add major</a>
</p>
