<h2>Добавяне на нов университет в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach

{!! Form::open (['route'=> 'universities.store', 'files'=>'true']) !!}
	<p>Име на университета:
		{!! Form::text('name') !!}
	</p>
	<p>
		Град:
		<select name="city_id" >
			@foreach($cities as $city)
			<option value={{$city->id}}>{{$city->name}}</option>
			@endforeach
		</select>
	</p>

		{!! Form::submit('Save') !!}

{!! Form::close() !!}

	<p>
		<a href="{{ route('universities.index') }}">Back</a>
	</p>