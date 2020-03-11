@extends('layouts.app')

@section('title', 'Manage | Formulas')

@section('content')

	<a class="btn btn-outline-primary" href="{{ route('major.index')}}"> <<< </a>
	<h3>Промени формулата</h3>
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div class="container">
		<form method="POST" action="{{ route("formula.update", $admission_option->id)}}">
		{{ csrf_field() }}
		@method('PATCH')
			<table>
				<tr>
				@foreach($formulas as $formula)
					<div>
						{{-- Dropdown menu for exam types  --}}
						<tr>
							<select name="exam_type[]">

	                    		@foreach($exam_types as $exam_type)
									<option value="{{ $exam_type->id }}" {{ $exam_type->id == $formula->exam_type_id ? 'selected' : '' }} >
										{{ $exam_type->name }}
									</option>
	                    		@endforeach

	                    	</select>
						</tr>
						{{-- Dropdown menu for subjects  --}}
						<tr>
							<select name="subject[]">

	                        		@foreach($subjects as $subject)
										<option value="{{ $subject->id }}" {{ $subject->id == $formula->subject_id ? 'selected' : '' }} >
											{{ $subject->name }}
										</option>
	                        		@endforeach

	                        	</select>
						</tr>
						{{-- Coefficient --}}
						<tr>
							Коефициент
							<input type="number" name="coefficient[]" placeholder="Коефициент" class="form-control name_list" value="{{ $formula->coefficient}}" />
						</tr>
						{{-- Grade --}}
	                    <tr>
	                    	Максимална стойност
	                    	<input type="number" name="grade[]" placeholder="Максимална стойност" class="form-control name_list" value="{{ $formula->grade}}" />
	                    </tr>
	                    <p></p>
	                </div>
				@endforeach
				</tr>
			</table>
			<input type="submit" name="submit" id="submit" class="btn btn-info" value="Промени" />
		</form>
	</div>
@endsection