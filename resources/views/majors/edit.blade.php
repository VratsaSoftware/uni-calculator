<h2>Промяна специалност</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('majors.update', $major->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<p>
		Име на специалността:
		<input type="text" name="name" value="{{$major->name}}">
	</p>
	<p>
		Поднаправление:
		<select name="subfield_id" >
			<option selected>Изберете поднаправление...</option>
			@foreach($subfields as $subfield)
			<option value={{$subfield->id}}>{{$subfield->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		Форма на обучение:
		<input type="text" name="form" value="Форма на обучение...">
	</p>
	<p>
		Квалификационна степен:
		<select name="program_id" >
			<option selected>Изберете степен...</option>
			@foreach($programs as $program)
			<option value={{$program->id}}>{{$program->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		Максимален бал:
		<input type="number" name="max_score">
	</p>
	<p>
		Университет:
		<select name="university_id" >
			<option selected>Изберете университет...</option>
			@foreach($universities as $university)
			<option value={{$university->id}}>{{$university->name}}</option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<p>
	<a href="{{ route('majors.index') }}">Назад</a>
</p>