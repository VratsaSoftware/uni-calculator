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


<div class="row">
	<div class="col" style="background-color: #DA8A8A; ">
		<h3>Heading</H3>
	</div>
	<div class="col" style="background-color: #928383">
		<div>
			<h2>Търсене на специалност</h2>
			<p>Моля, изберете критерии за търсене на специалност:</p>
		</div>
	</div>
	<div class="w-100"></div>
	<div class="col d-flex justify-content-center" style="background-color: #DA8A8A">
		<div style="width: 60%;">
			<form action="{{ route('search.store') }}" method="POST">
				{{ csrf_field() }}
				<div id="form-border">
					<div class="form-group">
						<label for="Subfield"> Поднаправление: </label>
						<select class="custom-select" name="subfield_id" >
							{{-- <option selected>Изберете поднаправление...</option> --}}
							@foreach($subfields as $subfield)
							<option value={{$subfield->id}}>{{$subfield->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="row">
						<div class="form-group col">
							<label for="Form"> Форма на обучение: </label>
							<select class="custom-select" name="form">
								{{-- <option selected>Изберете форма на обучение...</option> --}}
								<option value="Редовно">Редовно</option>
								<option value="Задочно">Задочно</option>
							</select>
						</div>
						<div class="form-group col">
							<label for="Subfield"> Квалификационна степен: </label>
							<select class="custom-select" name="program_id" >
								{{-- <option selected>Изберете квалификационна степен...</option> --}}
								@foreach($programs as $program)
								<option value={{$program->id}}>{{$program->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="University"> Университет: </label>
						<select class="custom-select" name="university_id" >
							{{-- <option selected>Изберете университет...</option> --}}
							@foreach($universities as $university)
							<option value={{$university->id}}>{{$university->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div id="submit" class="d-flex justify-content-center">
	    			<input class="submit" type="submit" name="submit" value="Търсене">
	    		</div>
			</form>
		</div>
	</div>
	<div class="col d-flex justify-content-center" style="background-color: #897C7C">
		<div style="width: 60%;">
			<form action="{{ route('search.store') }}" method="POST">
				{{ csrf_field() }}
				<div id="form-border">
					<div class="form-group">
						<label for="Subfield"> Поднаправление: </label>
						<select class="custom-select" name="subfield_id" >
							{{-- <option selected>Изберете поднаправление...</option> --}}
							@foreach($subfields as $subfield)
							<option value={{$subfield->id}}>{{$subfield->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="row">
						<div class="form-group col">
							<label for="Form"> Форма на обучение: </label>
							<select class="custom-select" name="form">
								{{-- <option selected>Изберете форма на обучение...</option> --}}
								<option value="Редовно">Редовно</option>
								<option value="Задочно">Задочно</option>
							</select>
						</div>
						<div class="form-group col">
							<label for="Subfield"> Квалификационна степен: </label>
							<select class="custom-select" name="program_id" >
								{{-- <option selected>Изберете квалификационна степен...</option> --}}
								@foreach($programs as $program)
								<option value={{$program->id}}>{{$program->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="University"> Университет: </label>
						<select class="custom-select" name="university_id" >
							{{-- <option selected>Изберете университет...</option> --}}
							@foreach($universities as $university)
							<option value={{$university->id}}>{{$university->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div id="submit" class="row d-flex justify-content-center" style="width: 100%; padding: 0%">
					<div class="col">
	    				<input class="submit" type="submit" name="submit" value="Търсене">
	    			</div>
	    		</div>
			</form>
		</div>
	</div>
</div>

<section id="search" class="container row d-flex justify-content-between">
	
</section>



@endsection