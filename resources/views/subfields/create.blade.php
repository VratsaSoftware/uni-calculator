<h2>Добавяне на новo поднаправление в базата данни</h2>


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('subfields.store') }}" method="POST">
	{{ csrf_field() }}
	<p>Име на поднаправлението:
		<input type="text" name="name" value="{{ old('name') }}">
	</p>
	<p>
		Направление:
		<select name="field_id" >
			@foreach($fields as $field)
			<option value="{{$field->id}}">{{$field->name}}</option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Запиши">
</form>
<p>
	<a href="{{ route('subfields.index') }}">Назад</a>
</p>