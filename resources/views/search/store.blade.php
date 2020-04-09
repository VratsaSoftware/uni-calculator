<h2>Резултати от Вашето търсене:</h2>
<div>
@if($majors_specific->isEmpty())
		<p><b> Няма специалност с всички изброени от Вас критерии. Разгледайте специалностите за всеки критерий пооотделно: </b></p>
 @else
 	<p><i> Съвпадения с всички критерии:</i></p>
	@foreach($majors_specific as $major)
			<h3><u> {{$major->name}} </u></h3>
			<p>
				<ul>
					<li><b> Поднаправление</b> {{$major->subfield->name}}</li>
					<li><b> Форма на обучение:</b> {{$major->form}}</li>
					<li><b> Максимален бал:</b> {{$major->max_score}}</li>
					<li><b> Програма: </b> {{$major->program->name}}</li>
					<li><b> Университет:</b> {{$major->university->name}}</li>	
				</ul>
			</p>	
	@endforeach
@endif
</div>
@if($majors_subfield->isEmpty() && $majors_program->isEmpty() && $majors_university->isEmpty() )
		<p>	Няма съвпадения по посочените от вас критерии</p>
@else
	@if($majors_subfield->isNotEmpty())	
	<div>
		<p><i> Всички специалности с поднаправление <b>{{ $majors_subfield[0]->subfield->name }}</b></i></p>
		@foreach($majors_subfield as $major)
		
		<h3><u> {{$major->name}} </u></h3>
		<p>
			<ul>
				<li><b> Поднаправление</b> {{$major->subfield->name}}</li>
				<li><b> Форма на обучение:</b> {{$major->form}}</li>
				<li><b> Максимален бал:</b> {{$major->max_score}}</li>
				<li><b> Програма: </b> {{$major->program->name}}</li>
				<li><b> Университет:</b> {{$major->university->name}}</li>	
			</ul>
		</p>
		@endforeach
	</div>
	@endif
	@if($majors_program->isNotEmpty())	
	<div>
		<p><i> Всички специалности с курс на обучение <b>{{ $majors_program[0]->program->name }}</b> </i></p>
		@foreach($majors_program as $major)
		
		<h3><u> {{$major->name}} </u></h3>
		<p>
			<ul>
				<li><b> Поднаправление</b> {{$major->subfield->name}}</li>
				<li><b> Форма на обучение:</b> {{$major->form}}</li>
				<li><b> Максимален бал:</b> {{$major->max_score}}</li>
				<li><b> Програма: </b> {{$major->program->name}}</li>
				<li><b> Университет:</b> {{$major->university->name}}</li>	
			</ul>
		</p>
		@endforeach
	</div>
	@endif
	@if($majors_university->isNotEmpty())	
	<div>
		<p><i> Всички специалности в <b>{{ $majors_university[0]->university->name }}</b> </i></p>
		@foreach($majors_university as $major)
		
		<h3><u> {{$major->name}} </u></h3>
		<p>
			<ul>
				<li><b> Поднаправление</b> {{$major->subfield->name}}</li>
				<li><b> Форма на обучение:</b> {{$major->form}}</li>
				<li><b> Максимален бал:</b> {{$major->max_score}}</li>
				<li><b> Програма: </b> {{$major->program->name}}</li>
				<li><b> Университет:</b> {{$major->university->name}}</li>	
			</ul>
		</p>
		@endforeach
	</div>
	@endif
@endif