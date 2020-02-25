<h2>Промени направление</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('fields.update', $field->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<p>Name:
		<input type="text" name="name" value="{{ $field->name }}">
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<a href="{{ route('fields.index') }}">Назад</a>