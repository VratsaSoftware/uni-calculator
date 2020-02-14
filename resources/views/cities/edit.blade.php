<h2>Промени град</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach
	
{!! Form::model ( $city, ['route'=> ['cities.update', $city->id], 'files'=>'true']) !!}
	{{ method_field('PATCH') }}
	<p>Name:
		{!! Form::text('name', $city->name) !!}
	</p>
	

	{!! Form::submit('Промени') !!}

{!! Form::close() !!}

<a href="{{ route('cities.index') }}">Back</a>