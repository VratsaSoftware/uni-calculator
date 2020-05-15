@extends('layouts.app')

@section('title', 'Search')

{{-- @section('header', 'Търсене') --}}

@section('content')


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<div id="search-results">
	<h2>Резултати от Вашето търсене:</h2>
	
	{{-- Get the major that matches all the search criteria  --}}
	
	@if($majors_specific->isEmpty())
		<p><b> Няма специалност с всички изброени от Вас критерии. Разгледайте специалностите за всеки критерий пооотделно: </b></p>
	@else
		<div id="all" class="container">
		 	<p><i> Съвпадения с всички критерии:</i></p>
			@foreach($majors_specific as $major)
				<div class="row result">
					{{-- Icon --}}
					<div id="icon" class="col-2">
						<a href="{{ route('calculators.show', $major->id) }}"><i class="fas fa-clipboard-check"></i></a>
					</div>
					{{-- Major info --}}
					<div class="major col-6">
						<h3><a href="{{ route('calculators.show', $major->id) }}">{{$major->name}}</a></h3>			
						<p>
							<ul class="fa-ul">
								<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
								<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
								<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
								<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
								<li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	
							</ul>
						</p>
					</div>
					{{-- Button --}}
					<div id = "ball" class="major col-4 d-flex align-items-end d-flex justify-content-center">
						<a href="{{ route('calculators.show', $major->id) }}" class="btn btn-success {{-- btn-outline-primary --}}" role="button" aria-pressed="true">Изчисли бал</a>
					</div>	
				</div>	
			@endforeach
		</div>
	@endif

	{{-- If there is no match, get all the majors for each of the search criteria  --}}
	<div id="other">
		@if($majors_subfield->isEmpty() && $majors_program->isEmpty() && $majors_university->isEmpty() )
			<div>
				<p>	Няма съвпадения с посочените от вас критерии</p>
			</div>	
		@else

			{{-- Match by subfield --}}
			<div id="subfield" class="container">
				@if($majors_subfield->isNotEmpty())	
					<p><i> Всички специалности с поднаправление <b>{{ $majors_subfield[0]->subfield->name }}</b></i></p>
					@foreach($majors_subfield as $major)
						<div class="row result">
							{{-- Icon --}}
							<div id="icon" class="col-2">
								<a href="{{ route('calculators.show', $major->id) }}"><i class="fa fa-book"></i></a>
							</div>
							{{-- Major info --}}
							<div class="major col-6">
								<h3><a href="{{ route('calculators.show', $major->id) }}"> {{$major->name}} </a></h3>
								<p>
									<ul class="fa-ul">
										<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	
									</ul>
								</p>
							</div>
							{{-- Button --}}
							<div id = "ball" class="major col-4 d-flex align-items-end d-flex justify-content-center">
								<a href="{{ route('calculators.show', $major->id) }}" class="btn btn-success {{-- btn-outline-primary --}}" role="button" aria-pressed="true">Изчисли бал</a>
							</div>	
						</div>	
					@endforeach
				@endif
			</div>

			{{-- Match by program --}}
			<div id="program" class="container">
				@if($majors_program->isNotEmpty())	
					<p><i> Всички специалности с курс на обучение <b>{{ $majors_program[0]->program->name }}</b> </i></p>
					@foreach($majors_program as $major)
						<div class="row result">
							{{-- Icon --}}
							<div id="icon" class="col-2">
								<a href="{{ route('calculators.show', $major->id) }}"><i class="fas fa-user-graduate"></i></a>
							</div>
							{{-- Major info --}}
							<div class="major col-6">
								<h3><a href="{{ route('calculators.show', $major->id) }}"> {{$major->name}} </a></h3>
								<p>
									<ul class="fa-ul">
										<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	
									</ul>
								</p>
							</div>
							{{-- Button --}}
							<div id = "ball" class="major col-4 d-flex align-items-end d-flex justify-content-center">
								<a href="{{ route('calculators.show', $major->id) }}" class="btn btn-success {{-- btn-outline-primary --}}" role="button" aria-pressed="true">Изчисли бал</a>
							</div>	
						</div>		
					@endforeach
				@endif
			</div>

			{{-- Match by university --}}
			<div id="university" class="container">
				@if($majors_university->isNotEmpty())	
					<p><i> Всички специалности в <b>{{ $majors_university[0]->university->name }}</b> </i></p>
					@foreach($majors_university as $major)
						<div class="row result">
							{{-- Icon --}}
							<div id="icon" class="col-2">
								<a href="{{ route('calculators.show', $major->id) }}"><i class="fa fa-university"></i></a>
							</div>
							{{-- Major info --}}
							<div class="major col-6">
								<h3><a href="{{ route('calculators.show', $major->id) }}"> {{$major->name}} </a></h3>
								<p>
									<ul id="list" class="fa-ul">
										<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
										<li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	
									</ul>
								</p>
							</div>
							{{-- Button --}}
							<div id = "ball" class="major col-4 d-flex align-items-end d-flex justify-content-center">
								<a href="{{ route('calculators.show', $major->id) }}" class="btn btn-success {{-- btn-outline-primary --}}" role="button" aria-pressed="true">Изчисли бал</a>
							</div>	
						</div>		
					@endforeach
				@endif
			</div>	
		@endif
	</div>
</div>

@endsection