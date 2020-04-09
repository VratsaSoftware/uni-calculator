<h2>Добавяне на нов университет в базата данни</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{route('universities.store')}}" method="POST">
	{{ csrf_field() }}
	<p>Име на университета:
		<input type="text" name="name" value="{{ old('name') }}">
	</p>
	<p>
		Град:
		<select name="city_id" >
			@foreach($cities as $city)
			<option value={{ $city->id }}>{{ $city->name }}</option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>

<p>
	<a href="{{ route('universities.index') }}">Назад</a>
</p>