<h2>Добавяне на нов град в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach

{!! Form::open (['route'=> 'fields.store', 'files'=>'true']) !!}
	<p>Име:
		{!! Form::text('name') !!}
	</p>
		{!! Form::submit('Запиши') !!}

{!! Form::close() !!}

	<p>
		<a href="{{ route('fields.index') }}">Назад</a>
	</p>