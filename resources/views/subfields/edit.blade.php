<h2>Промени поднаправление</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach
	
{!! Form::model ( $subfield, ['route'=> ['subfields.update', $subfield->id], 'files'=>'true']) !!}
	{{ method_field('PATCH') }}
	<p>Име на поднаправлението:
		{!! Form::text('name') !!}
	</p>
	<p>
		Направление:
		<select name="field_id" >
			@foreach($fields as $field)
			<option value="{{$field->id}}">{{$field->name}} </option>
			@endforeach
		</select>
	</p>

	{!! Form::submit('Update') !!}

{!! Form::close() !!}

<a href="{{ route('subfields.index') }}">Back</a>