@extends('layouts.app')

@section('title', 'Search')

@section('header', 'Търсене')

@section('content')

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<div id="major-calculate" class="container ">
	<div id="major-info">
		<h2>{{ $major->name }}</h2>
		<ul>
			<li><b> Поднаправление</b> {{$major->subfield->name}}</li>
			<li><b> Форма на обучение:</b> {{$major->form}}</li>
			<li><b> Максимален бал:</b> {{$major->max_score}}</li>
			<li><b> Програма: </b> {{$major->program->name}}</li>
			<li><b> Университет:</b> {{$major->university->name}}</li>	
		</ul>
	</div>

	@foreach($major->formulas as $key => $admission_option)
		<div class="calculate-bal d-flex justify-content-center pt-md-3">
			<div id= "form-border">	
				<table class="table-bordered p-3">		
					<thead>
						{{-- <tr>
							<td><b> Вариант за приемане {{ $admission_option->id }} </b></td>
						</tr> --}}
						<tr>
							<th scope="col" class="text-center font-italic">Предмет</th>
							<th scope="col" class="text-center font-italic">Вид изпит</th>
							<th scope="col" class="text-center font-italic">Добави оценка:</th>
						</tr>
					</thead>
					<tbody>
						<form action="{{route('calculators.store')}}" method="POST">
							{{ csrf_field() }}
							@foreach($formulas as $formula)
								@if($formula->admission_option_id == $admission_option->id)
								<tr>
									<td >{{ $formula->subject->name }}</td>
									<td>{{ $formula->exams->name }}</td>
									<td>
										<div id ="bal-input" class="row d-flex align-items-center">
							      			{{-- Input --}}
							      			<div  class="col">
							      				<p>	
							      					<input id="grade" class="form-control" type="number" min="0" max="18" step="0.5" name="user_evals[{{ $admission_option->id }}][]" value="{{ old('name') }} " required 
							      					oninvalid="this.setCustomValidity('Това поле е задължително! Моля, въведете оценка с точност до един знак след десетичната запатая!')"
     												oninput="this.setCustomValidity('')" style="" />	
								      			</p>
								      		</div>
								      		{{-- Coefficient --}}
								      		<div class="col">
								      			<p>	
								      		 		x {{ $formula->coefficient }}
								      			</p>		
								      		</div>		
									      	{{-- Hidden --}}
									      	<textarea name="coefficient[{{ $admission_option->id }}][]" class="d-none">{{ $formula->coefficient }}</textarea>
											<textarea name="major_id" class="d-none">{{ $major->id }}</textarea>
										</div>
									</td>
								</tr>
								@endif
							@endforeach
							<tr>
								<td colspan="2" class="text-center align-middle">
									<input class="align-self-center" type="submit" name="submit" value="Изчисли бал"> 
								 </td>					
								<td class="bal">
									<div id="result-display">
										@if (\Session::has('bal'))
											@foreach(  Session::get('bal') as $var => $value )
												@if($var == $admission_option->id)
													@if( $value != 0)
														{{ $value }}
													@endif			
												@endif		
											@endforeach
										@endif
							       	</div>
								</td>
							</tr>
						</form>		
					</tbody>			
				</table>
			</div>
		</div>
	@endforeach	 
</div>

@endsection
