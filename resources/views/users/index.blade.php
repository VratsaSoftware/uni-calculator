<h2>Потребители</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table border="1">
	<tr>
		<td>
			Username
		</td>
		<td>
			Парола
		</td>
		<td>
			Email
		</td>
		<td>
			Име
		</td>
		<td>
			Фамилия
		</td>
		<td>
			Роля
		</td>
		<td>
			-
		</td>
		<td>
			-
		</td>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>
			{{ $user->username }}
		</td>
		<td>
			{{ $user->password }}
		</td>
		<td>
			{{ $user->email }}
		</td>
		<td>
			{{ $user->first_name }}
		</td>
		<td>
			{{ $user->last_name }}
		</td>
		<td>
			{{ $user->role->name }}
		</td>
		<td>
			<a href="{{ route('users.edit', $user->id) }}">Промени</a>
		</td>
		<td>
			<form action="{{ route('users.destroy', $user->id )}}"  method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="Изтрий">
			</form>
		</td>
	</tr>
	@endforeach
</table>

<p>
	<a href="{{route('users.create')}}">Добави потребител</a>
</p>
