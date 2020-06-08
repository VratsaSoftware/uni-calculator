@extends('layouts.app')

@section('title', 'Search')

@section('content')


@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach


<div id="search" class="container">
	<div class="row">
		<div id="first-search" class="col">
			<div class="content">
				<div>
					<span>	
						<h2>Искам да кандидатствам със...</h2>
						<p>Проверете за коя специалност може да кандидатствате с предпочитан от Вас учебен предмет</p>	
					</span>
				</div>
		
				<div>
					<form method="POST" action="{{ route("results/1") }}">
						{{ csrf_field() }}
						<div id="form-border">

							<div class="form-group">
								<label for="subject">Моля, изберете учебен предмет, с който желаете да кандидатствате: </label>
								<select class="form-control custom-select" name="subject" {{-- required --}}>
			                    	<option value="" selected > Изберете учебен предмет ... </option>
			                        @foreach($subjects as $subject)
			                            <option value="{{ $subject->id}}">{{ $subject->name}}</option>
			                        @endforeach
			                    </select>
			                    <label id="errmsg" class="text-left text-danger">
									@if(Session::has('errmsg'))
										@foreach(  Session::get('errmsg') as $var => $value )
											@if($var == 'subjectmsg')
												{{ $value }}	
											@endif		
										@endforeach
									@endif
								</label>
			                </div>
		                </div>
						<input type="submit" name="submit" value="Продължи">
					</form>			 
				</div>
			</div>		
		</div>
		

		<div id="second-search" class="col ">
			<div class="content">	
				<span>	
					<h2>Искам да уча... </h2>
						<p>Изберете критерии за търсената от Вас специалност</p>
				</span>	
				<div id="form-border" class="wrapper">
					<form id="select-criteria" action="{{ route('results/2') }}" method="POST" >
						{{ csrf_field() }}
							
							<div class="form-group">
								<label for="subfield_id"> Поднаправление: </label>
								<select id="subfield" class="form-control custom-select" name="subfield_id">
									<option value="" selected>Изберете поднаправление...</option>
									@foreach($subfields_list as $value)
										@foreach($value as $subfield)
											<option value="{{$subfield->id}}">{{$subfield->name}}</option>
										@endforeach	
									@endforeach
								</select>
								<label id="errmsg" class="text-left text-danger">
									@if(Session::has('errmsg'))
										@foreach(  Session::get('errmsg') as $var => $value )
											@if($var == 'subfieldmsg')
												{{ $value }}	
											@endif		
										@endforeach
									@endif
								</label>
							</div>
							<div class="row">
								
								<div class="form-group col nowrap">
	
									<label for="form"> Форма на обучение: </label>
									<select class="custom-select" name="form">
										{{-- <option selected>Изберете форма на обучение...</option> --}}
										<option value="Редовно">Редовно</option>
										<option value="Задочно">Задочно</option>
									</select>
								</div>
							
								<div  id="nowrap" class="form-group col nowrap">
									<label for="program_id"   {{-- style="white-space: nowrap;" --}}> Квалификационна степен: </label>
									<select class="custom-select" name="program_id" >
											{{-- <option selected>Изберете квалификационна степен...</option> --}}
										@foreach($programs as $program)
											<option value="{{$program->id}}">{{$program->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="university_id"> Университет: </label>
								<select class="custom-select" name="university_id">
									<option value="" selected> Изберете университет...</option>
									@foreach($university_list as $value)
										@foreach ($value as $university)
											<option value={{$university->id}}>{{$university->name}}</option>
										@endforeach	
									@endforeach
								</select>
								<label id="errmsg" class="text-left text-danger">
									@if(Session::has('errmsg'))
										@foreach(  Session::get('errmsg') as $var => $value )
											@if($var == 'universitymsg')
												{{ $value }}	
											@endif		
										@endforeach
									@endif
								</label>
							</div>
						</div>
			    		<input type="submit" name="submit" value="Търсене">
					</form>
				</div>
			</div>	
		</div>
	</div>
</div>


@endsection