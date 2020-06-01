@extends('layouts.app')

@section('title', 'Резултати от търсене')


@section('content')


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<div id="search-results">


	@if (isset($majors_specific))
		@if($majors_specific->isNotEmpty())
			<div id="all" class="container">
		 		<p><i> Съвпадения с всички критерии:</i> <b>{{$majors_specific[0]->subfield->name}}, {{$majors_specific[0]->form}}, {{$majors_specific[0]->program->name}}, {{$majors_specific[0]->university->name}}. </b></p>
				@foreach($majors_specific as $major)
					<div class="row result">
						{{-- Icon --}}
						<div id="icon" class="col-2">
							<a href="{{ route('calculators.show', $major->id) }}"><i class="fas fa-clipboard-check"></i></a>
						</div>
						{{-- Major info --}}
						<div class="major col-6">
							<h4><a href="{{ route('calculators.show', $major->id) }}" class="badge badge-light">{{$major->name}} - {{$major->university->name}}</a></h4>			
							<p>
								<ul class="fa-ul">
									<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
									{{-- <li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	 --}}
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
		@else
			<p>Няма открити специалности с посочените от Вас критерии. </p>
		@endif	
	@endif


	@if (isset($majors_subfield))
		@if($majors_subfield->isNotEmpty())
			<div id="subfield" class="container">
								
				<p><i> Съвпадения с Вашите критерии:</i> <b>{{$majors_subfield[0]->subfield->name}}, {{$majors_subfield[0]->form}}, {{$majors_subfield[0]->program->name}}, Всички университети. </b></p>
				@foreach($majors_subfield as $major)
					<div class="row result">
						{{-- Icon --}}
						<div id="icon" class="col-2">
							<a href="{{ route('calculators.show', $major->id) }}"><i class="fa fa-book"></i></a>
						</div>
						{{-- Major info --}}
						<div class="major col-6">
							<h4><a href="{{ route('calculators.show', $major->id) }}" class="badge badge-light">{{$major->name}} - {{$major->university->name}}</a></h4>
							<p>
								<ul class="fa-ul">
									<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
									{{-- <li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	 --}}
								</ul>
							</p>
						</div>
						{{-- Button --}}
						<div id = "ball" class="major col-4 d-flex align-items-end d-flex justify-content-center">
							<a href="{{ route('calculators.show', $major->id) }}" class="btn btn-success" role="button" aria-pressed="true">Изчисли бал</a>
						</div>	
					</div>	
				@endforeach	
			</div>
		@else
			<p>Няма открити специалности с посочените от Вас критерии. </p>
		@endif
	@endif


	@if (isset($majors_university))
		@if($majors_university->isNotEmpty())
			<div id="university" class="container">
				<p><i> Съвпадения с всички критерии:</i> <b>Всички поднаправления, {{$majors_university[0]->form}}, {{$majors_university[0]->program->name}}, {{$majors_university[0]->university->name}}. </b></p>
				@foreach($majors_university as $major)
					<div class="row result">
						{{-- Icon --}}
						<div id="icon" class="col-2">
							<a href="{{ route('calculators.show', $major->id) }}"><i class="fa fa-university"></i></a>
						</div>
						{{-- Major info --}}
						<div class="major col-6">
							<h4><a href="{{ route('calculators.show', $major->id) }}" class="badge badge-light">{{$major->name}} - {{$major->university->name}} </a></h4>
							<p>
								<ul id="list" class="fa-ul">
									<li><i class="fas fa-pencil-alt"></i><b> Поднаправление</b> {{$major->subfield->name}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Форма на обучение:</b> {{$major->form}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Максимален бал:</b> {{$major->max_score}}</li>
									<li><i class="fas fa-pencil-alt"></i><b> Програма: </b> {{$major->program->name}}</li>
									{{-- <li><i class="fas fa-pencil-alt"></i><b> Университет:</b> {{$major->university->name}}</li>	 --}}
								</ul>
							</p>
						</div>
						{{-- Button --}}
						<div id = "ball" class="major col-4 d-flex align-items-end d-flex justify-content-center">
							<a href="{{ route('calculators.show', $major->id) }}" class="btn btn-success {{-- btn-outline-primary --}} " role="button" aria-pressed="true">Изчисли бал</a>
						</div>	
					</div>		
				@endforeach
			</div>	
		@else
			<p>Няма открити специалности с посочените от Вас критерии. </p>
		@endif	
	@endif
</div>


@endsection