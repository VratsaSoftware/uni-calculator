<h2>Промени град</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

{!! Form::model ( $field, ['route'=> ['fields.update', $field->id], 'files'=>'true']) !!}
	{{ method_field('PATCH') }}
	<p>Name:
		{!! Form::text('name', $field->name) !!}
	</p>
	{!! Form::submit('Промени') !!}
{!! Form::close() !!}

<a href="{{ route('fields.index') }}">Назад</a>