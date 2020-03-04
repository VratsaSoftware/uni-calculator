<h2>Добави роля</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('roles.store') }}" method="POST">
	{{ csrf_field() }}
	<p>
		<label>Име:</label>
		<input type="text" name="name" value="{{ old('name') }}">
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>

<p>
	<a href="{{ route('roles.index') }}">Назад</a>
</p>