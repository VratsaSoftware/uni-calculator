@extends('layouts.admin')

@section('title', 'Manage | exam_type types')

@section('header', 'Предмет')

@section('content')
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div class="container form-login">
		<table class="table table-hover">
			<tr>
				<th>Име</th>
				<th></th>
				<th></th>
			</tr>
			@foreach($exam_types as $exam_type)
				<tr>
					<th>
						{{ $exam_type->name }}
					</th>	
					<th>
						<a class="btn btn-success" href="{{ route('exam_type.edit', $exam_type->id) }}">	Промени
						</a>
					</th>
					<th>
						<form method="POST" action="{{ route('exam_type.destroy', $exam_type->id )}}">
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
			{{ $exam_types->links() }}
		</div>
		
		<a class="btn btn-outline-primary" href="{{ route('exam_type.create') }}">
			Нов вид
		</a>
	</div>

@endsection