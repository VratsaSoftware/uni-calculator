<h2>Добавяне на ново направление в базата данни</h2>

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
		<p>
			{!! Form::submit('Запиши') !!}
		</p>
	{!! Form::close() !!}
<p>
	<a href="{{ route('fields.index') }}">Назад</a>
</p>