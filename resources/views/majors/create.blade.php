<h2>Добавяне на нова специалност в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach

{!! Form::open (['route'=> 'majors.store', 'files'=>'true']) !!}
	<p>
		Име на специалността:
		{!! Form::text('name') !!}
	</p>
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
		{!! Form::text('form') !!}
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
		Максимален бал:
		{!! Form::number('max_score') !!}
	</p>
	<p>
		Университет:
		<select name="university_id" >
			@foreach($universities as $university)
			<option value={{$university->id}}>{{$university->name}}</option>
			@endforeach
		</select>
	</p>
		{!! Form::submit('Save') !!}
{!! Form::close() !!}

	<p>
		<a href="{{ route('majors.index') }}">Back</a>
	</p>