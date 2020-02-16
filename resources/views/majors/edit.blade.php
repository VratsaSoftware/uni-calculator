<h2>Промяна специалност</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach

{!! Form::model ( $major, ['route'=> ['majors.update', $major->id], 'files'=>'true']) !!}
	{{ method_field('PATCH') }}
	<p>
		Име на специалността:
		{!! Form::text('name') !!}
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
		{!! Form::text('form') !!}
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
		{!! Form::number('max_score') !!}
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
		{!! Form::submit('Update') !!}
{!! Form::close() !!}

	<p>
		<a href="{{ route('majors.index') }}">Back</a>
	</p>