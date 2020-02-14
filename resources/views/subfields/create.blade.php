<h2>Добавяне на новo поднаправление в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach

{!! Form::open (['route'=> 'subfields.store', 'files'=>'true']) !!}
	<p>Име на поднаправлението:
		{!! Form::text('name') !!}
	</p>
	<p>
		Направление:
		<select name="field_id" >
			@foreach($fields as $field)
			<option value="{{$field->id}}">{{$field->name}}</option>
			@endforeach
		</select>
	</p>

		{!! Form::submit('Save') !!}

{!! Form::close() !!}

	<p>
		<a href="{{ route('subfields.index') }}">Назад</a>
	</p>