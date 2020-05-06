@extends('layouts.app')

@section('title', 'Search')

@section('header', 'Търсене')

@section('content')
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
		<div class=" calculate-bal d-flex justify-content-center">
			<div id= "form-border">	
				<table id="admission-option" class="table-bordered">		
					<thead>
						{{-- <tr>
							<td><b> Вариант за приемане {{ $admission_option->id }} </b></td>
						</tr> --}}
						<tr>
							<th scope="col" class="text-center"><i>Предмет</i></th>
							<th scope="col" class="text-center"><i>Вид изпит</i></th>
							<th scope="col" class="text-center"><i>Добави оценка:</i></th>
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
										<div id ="bal-input" class="row">
							      			{{-- Input --}}
							      			<div  class="form-group">
							      				<p>		
								      				<input class="form-control" type="number" name="user_evals[{{ $admission_option->id }}][]" value="{{ old('name') }}">
								      			</p>
								      		</div>
								      		{{-- Coefficient --}}
								      		<div>
								      			<p>	
								      		 		x {{ $formula->coefficient }}
								      			</p>		
								      		</div>		
									      	{{-- Hidden --}}
									      	<textarea name="coefficient[{{ $admission_option->id }}][]" style="display:none;">{{ $formula->coefficient }}</textarea>
											<textarea name="major_id" style="display:none;">{{ $major->id }}</textarea>
										</div>
									</td>
								</tr>
								@endif
							@endforeach
							<tr>	
								<td colspan="2"><input type="submit" name="submit" value="Изчисли бал"> 
								</td>						
								<td class="bal">
									<p>
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
							       	</p>
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
