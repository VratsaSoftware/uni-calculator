<h2>Промени университет</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach
	
{!! Form::model ( $university, ['route'=> ['universities.update', $university->id], 'files'=>'true']) !!}
	{{ method_field('PATCH') }}
	<p>Име на университет:
		{!! Form::text('name') !!}
	</p>
	<p>
		Град:
		<select name="city_id" >
			@foreach($cities as $city)
			<option value="{{$city->id}}">{{$city->name}} </option>
			@endforeach
		</select>
	</p>

	{!! Form::submit('Update') !!}

{!! Form::close() !!}

<a href="{{ route('universities.index') }}">Back</a>