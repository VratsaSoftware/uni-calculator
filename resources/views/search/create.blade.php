<h2>Търсене</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('search.store') }}" method="POST">
	{{ csrf_field() }}
	<p>
		Поднаправление:
		<select name="subfield_id" >
			@foreach($subfields as $subfield)
			<option value={{$subfield->id}}>{{$subfield->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		Форма на обучение:
		<select name="form">
			<option value="Редовно">Редовно</option>
			<option value="Задочно">Задочно</option>
		</select>
	</p>
	<p>
		Квалификационна степен:
		<select name="program_id" >
			@foreach($programs as $program)
			<option value={{$program->id}}>{{$program->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		Университет:
		<select name="university_id" >
			@foreach($universities as $university)
			<option value={{$university->id}}>{{$university->name}}</option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>	

<p>
	<a href="{{ route('majors.index') }}">Назад</a>
</p>