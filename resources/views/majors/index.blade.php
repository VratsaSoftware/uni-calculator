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
		<td>
			-
		</td>
		<td>
			-
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
			<a href="{{route('majors.edit', $major->id)}}">Промени</a>
		</td>
		<td>
			<form action="{{ route('majors.destroy', $major->id )}}"  method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="Изтрий">
			</form>
		</td>
	</tr>
		@endforeach
</table>

<p>
	<a href="{{route('majors.create')}}">Добави специалност</a>
</p>
