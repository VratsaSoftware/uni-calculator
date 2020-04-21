<h2>Резултати от Вашето търсене:</h2>
{{-- Get the major that matches all the search criteria  --}}
<div>
	@if($majors_specific->isEmpty())
		<p><b> Няма специалност с всички изброени от Вас критерии. Разгледайте специалностите за всеки критерий пооотделно: </b></p>
	@else
	 	<p><i> Съвпадения с всички критерии:</i></p>
		@foreach($majors_specific as $major)
			<h3><u><a href="{{ route('calculators.show', $major->id) }}">{{$major->name}}</a></u></h3>
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
{{-- If there is no match, get all the majors for each of the search criteria  --}}
<div>
	@if($majors_subfield->isEmpty() && $majors_program->isEmpty() && $majors_university->isEmpty() )
		<div>
			<p>	Няма съвпадения по посочените от вас критерии</p>
		</div>	
	@else
		{{-- Match by subfield --}}
		<div>
			@if($majors_subfield->isNotEmpty())	
				<p><i> Всички специалности с поднаправление <b>{{ $majors_subfield[0]->subfield->name }}</b></i></p>
				@foreach($majors_subfield as $major)
					<h3><u><a href="{{ route('calculators.show', $major->id) }}"> {{$major->name}} </a></u></h3>
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
		{{-- Match by program --}}
		<div>
			@if($majors_program->isNotEmpty())	
				<p><i> Всички специалности с курс на обучение <b>{{ $majors_program[0]->program->name }}</b> </i></p>
				@foreach($majors_program as $major)
					<h3><u><a href="{{ route('calculators.show', $major->id) }}"> {{$major->name}} </a></u></h3>
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
		{{-- Match by university --}}
		<div>
			@if($majors_university->isNotEmpty())	
			
				<p><i> Всички специалности в <b>{{ $majors_university[0]->university->name }}</b> </i></p>
				@foreach($majors_university as $major)
				
				<h3><u><a href="{{ route('calculators.show', $major->id) }}"> {{$major->name}} </a></u></h3>
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
	@endif
</div>