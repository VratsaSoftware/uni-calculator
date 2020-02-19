@extends('layouts.app')

@section('title', 'Manage | Major')

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
			Специалности
		</h2>
	</div>
	<div class="container form-login">
		<table>
			<tr>
				<th>Име</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>

			@foreach($majors as $major)

				<tr>
					<th>
						{{ $major->name }}
					</th>	
					<th>
						<a class="btn btn-success" href="{{ route('major.edit', $major->id) }}">
							Промени
						</a>
					</th>
					<th>
						<form method="POST" action="{{ route("major.destroy", $major->id )}}">
							{{ csrf_field() }}
							@method('DELETE')

							<button class="btn btn-danger" type="submit">
								Изтрии
							</button>
						</form>
					</th>
					<th>
						<a href="{{ route("formula.create", $major->id)}}">Добави формула</a>
						
					</th>
				</tr>

				@foreach($admission_options as $admission_option)

					@if($major->id == $admission_option->major_id)
					
					<tr>
					
					@foreach($formulas as $formula)
					
					@if($admission_option->id == $formula->admission_option_id)
						<th>
							{{ $formula->coefficient }}
						*
							@foreach($exam_types as $exam_type)

								@if($exam_type->id == $formula->exam_type_id)

									{{ $exam_type->name }}

								@endif

							@endforeach

							@foreach($subjects as $subject)

								@if($subject->id == $formula->subject_id)

									{{ $subject->name }}

								@endif

							@endforeach

						</th>
					@endif
				@endforeach
					<th>
						<a class="btn btn-success" href="{{ route('formula.edit', $formula->id) }}">
							Промени
						</a>
					</th>
					<th>
						<form method="POST" action="{{ route("formula.destroy", $formula->id )}}">
							{{ csrf_field() }}
							@method('DELETE')

							<button class="btn btn-danger" type="submit">
								Изтрии
							</button>
						</form>
					</th>

				@endif

				@endforeach

			@endforeach
		</table>
		<div class="row">
			{{ $majors->links() }}
		</div>
		<a class="btn btn-outline-primary" href="{{ route('major.create') }}">
			Нова специалност
		</a>
	</div>

@endsection