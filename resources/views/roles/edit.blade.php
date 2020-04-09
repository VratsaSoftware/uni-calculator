<h2>Промени роля</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('roles.update', $role->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<p>
		<label>Име:</label>
		<input type="text" name="name" value="{{ $role->name }}">
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<p>
	<a href="{{ route('roles.index') }}">Назад</a>
</p>