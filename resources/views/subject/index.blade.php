@extends('layouts.app')

@section('title', 'Manage | Subject')

@section('content')
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div>
		<h2>
			Предмет
		</h2>
	</div>
	<div class="container form-login">
		<table>
			<tr>
				<th>Име</th>
				<th></th>
				<th></th>
			</tr>
			@foreach($subjects as $subject)
				<tr>
					<th>
						{{ $subject->name }}
					</th>	
					<th>
						<a class="btn btn-success" href="{{ route('subject.edit', $subject->id) }}">	Промени
						</a>
					</th>
					<th>
						<form method="POST" action="{{ route("subject.destroy", $subject->id )}}">
							{{ csrf_field() }}
							@method('DELETE')

							<button class="btn btn-danger" type="submit">
								Изтрии
							</button>
						</form>
					</th>
				</tr>
			@endforeach
		</table>
		<div class="row">
			{{ $subjects->links() }}
		</div>
		<a class="btn btn-outline-primary" href="{{ route('subject.create') }}">
			Нов предмет
		</a>
	</div>

@endsection