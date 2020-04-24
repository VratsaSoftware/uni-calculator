<h2>{{ $major->name }}</h2>

<ul>
	<li><b> Поднаправление</b> {{$major->subfield->name}}</li>
	<li><b> Форма на обучение:</b> {{$major->form}}</li>
	<li><b> Максимален бал:</b> {{$major->max_score}}</li>
	<li><b> Програма: </b> {{$major->program->name}}</li>
	<li><b> Университет:</b> {{$major->university->name}}</li>	
</ul>

<table border="0">
	@foreach($major->formulas as $key => $admission_option)
		<tr>
			<td colspan="3"><b> Вариант за приемане {{ $admission_option->id }} </b></td>
		</tr>
		<tr>
			<td><i>Предмет</i></td>
			<td><i>Вид изпит</i></td>
			<td><i>Добави оценка:</i></td>
		</tr>
		<form action="{{route('calculators.store')}}" method="POST">
			{{ csrf_field() }}
			@foreach($formulas as $formula)
				@if($formula->admission_option_id == $admission_option->id)
				<tr>
					<td>{{ $formula->subject->name }}</td>
					<td>{{ $formula->exams->name }}</td>
					<td>
						<input type="number" name="user_evals[{{ $admission_option->id }}][]" value="{{ old('name') }}"> x {{ $formula->coefficient }}	
						<textarea name="coefficient[{{ $admission_option->id }}][]" style="display:none;">{{ $formula->coefficient }}</textarea>
						<textarea name="major_id" style="display:none;">{{ $major->id }}</textarea>
					</td>
				</tr>
				@endif
			@endforeach
			<tr>	
				<td colspan="2"><input type="submit" name="submit" value="Изчисли бал"> 
				</td>
				<td><b>
					@if (\Session::has('bal'))
						@foreach(  Session::get('bal') as $var => $value )
							@if($var == $admission_option->id)
								@if( $value != 0)
									{{ $value }}
								@endif			
							@endif		
						@endforeach
			       	@endif
				</b></td>
			</tr>
			<tr>
				<td colspan="3" style='border-bottom:1pt solid black'>						
				</td>
			</tr>
		</form>
	@endforeach		
</table>