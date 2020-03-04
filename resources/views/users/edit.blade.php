<h2>Промяна на потребител в базата данни</h2>

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<form action="{{ route('users.update', $user->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }} 
	<p>
		<label>Потребителско име:</label>
		<input type="text" name="username" value="{{ $user->username }}">
	</p>
	<p>
		<label>Парола:</label>
		<input type="password" name="password" value="{{ $user->password }}">
	</p>
	<p>
		<label>Email:</label>
		<input type="text" name="email" value="{{ $user->email }}">
	</p>
	<p>
		<label>Име:</label>
		<input type="text" name="first_name" value="{{ $user->first_name }}">
	</p>
	<p>
		<label>Фамилия:</label>
		<input type="text" name="last_name" value="{{ $user->last_name }}">
	</p>
	<p>
		<label>Роля:</label>
		<select name="role_id">
			<option value="{{ $user->role->id }}" selected>{{ $user->role->name }}</option>
			@foreach($roles as $role)
			<option value="{{ $role->id }}">{{ $role->name }}</option>
			@endforeach
		</select>
	</p>
	<input type="submit" name="submit" value="Промени">
</form>

<p>
	<a href="{{ route('users.index') }}">Назад</a>
</p>