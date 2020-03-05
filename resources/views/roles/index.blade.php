<h2>Роли</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<table border="1">
	<tr>
		<td>
			№
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
	@foreach($roles as $role)
	<tr>
		<td>
			{{ $role->id }}
		</td>
		<td>
			{{ $role->name }}
		</td>
		<td>
			<a href="{{ route('roles.edit', $role->id) }}">Промени</a>
		</td>
		<td>
			<form action="{{ route('roles.destroy', $role->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<input type="submit" name="submit" value="Изтрий">
			</form>
		</td>
	</tr>
	@endforeach
</table>

<p>
	<a href="{{ route('roles.create') }}">Добави роля</a>
</p>