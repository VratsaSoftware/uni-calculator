<h2>Добавяне на ново направление в базата данни</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('fields.store') }}" method="POST">
	{{ csrf_field() }}
	<p>Име:
		<input type="text" name="name" value="{{ old('name') }}">
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>	

<p>
	<a href="{{ route('fields.index') }}">Назад</a>
</p>