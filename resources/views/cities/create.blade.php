<h2>Добавяне на нов град в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{route('cities.store')}}" method="POST">
	{{ csrf_field() }}
	<p>Име:
		<input type="text" name="name" value="{{ old('name') }}">
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>

<p>
	<a href="{{ route('cities.index') }}">Назад</a>
</p>