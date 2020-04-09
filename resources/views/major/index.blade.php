@extends('layouts.app')

@section('title', 'Manage | Major')

@section('content')
	<div>
		@if(Session::has('message'))
			{{ Session::get('message') }}
		@endif

		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	</div>
	<div>
		<h2>
			Специалности
		</h2>
	</div>
	<div class="container form-login form-crud">
		<table class="table display" id="table_id">
			<thead class="">
				<tr>
					<th>#</th>
					<th>Име на специалност</th>
					<th>Университет</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($majors as $key => $major)

					<tr class="major_row_{{$major->id}}">
						<th>
							<button class="major_{{$major->id}} btn btn-success" type="submit">
								+
							</button>
						</th>
						<th class="col-3">
							{{ $major->name }}
						</th>
						<th class="col-3">
							@foreach( $universities as $university)
								@if($university->id == $major->university_id)
									{{ $university->name }}
								@endif
							@endforeach
						</th>
						<th class="col-2">
							<a class="btn btn-success" href="{{ route('major.edit', $major->id) }}">
								Промени
							</a>
						</th>
						<th class="col-2">
							<form method="POST" action="{{ route("major.destroy", $major->id )}}">
								{{ csrf_field() }}
								@method('DELETE')

								<button class="btn btn-danger" type="submit">
									Изтрии
								</button>
							</form>
						</th>
						<th class="col-2">
							<a class="btn btn-primary" href="{{ route("formula.create", $major->id)}}">Добави формула</a>
						</th>
					</tr>

					{{-- Formulas --}}
				
				@endforeach
			</tbody>
			
		</table>
		<div>
			<table>
			@foreach($majors as $key => $major)
				@foreach($admission_options as $admission_option)
					@if($major->id == $admission_option->major_id)
					
						<tr class="formula_row major_formula_{{$major->id}}">
							<td></td>
							<td class="col-8">
							@foreach($formulas as $formula)
							
								@if($admission_option->id == $formula->admission_option_id)
									
									{{ $formula->coefficient }}
								*
									@foreach($exam_types as $exam_type)

										@if($exam_type->id == $formula->exam_type_id)

											{{ $exam_type->name }}

										@endif

									@endforeach

									@foreach($subjects as $subject)

										@if($subject->id == $formula->subject_id)

											{{ $subject->name }}

										@endif
									@endforeach
									+
								@endif

							@endforeach
							</td>
							<td class="col-0"></td>
							<td class="col-0"></td>
							<td class="col-2">
								<a class="btn btn-success" href="{{ route('formula.edit', $admission_option->id) }}">
									Промени
								</a>
							</td>
							<td class="col-2">
								<form method="POST" action="{{ route("formula.destroy", $admission_option->id )}}">
									{{ csrf_field() }}
									@method('DELETE')

									<button class="btn btn-danger" type="submit">
										Изтрии
									</button>
								</form>
							</td>
						</tr>
					@endif
				@endforeach
			@endforeach
			</table>
		</div>
		<div class="row">
			{{ $majors->links() }}
		</div>
		<a class="btn btn-outline-primary" href="{{ route('major.create') }}">
			Нова специалност
		</a>
	</div>
<script>
	$(document).ready( function () {
    	$('#table_id').DataTable({
    		"bPaginate": false,
    		"columnDefs":  [{ "orderable": false, "targets": 0 },
    						{ "orderable": false, "targets": 3 },
    						{ "orderable": false, "targets": 4 },
    						{ "orderable": false, "targets": 5 }],
    	})
		
		var majors = <?php echo json_encode($majors); ?>;
		var arr_majors = $(majors).attr('data');
		var admission_options = <?php echo json_encode($admission_options); ?>;

    	$.each( arr_majors ,function(key , value) {

       		$(".major_"+value['id']).click(function() {

       			if ($('.added-'+value['id']).html()) {	
       				$("tr").filter($(".added-"+value['id'])).fadeOut(300, function(){ $(this).remove();});
       				$(".major_"+value['id']).toggleClass('btn-danger btn-success');
       			}else {
       				$.each($('.major_formula_'+value['id']), function(k,v){
       					var formulas = $(this).html();
	       				$('.major_row_'+value['id']).after('<tr style=" display: none" class="added-'+value['id']+'">'+formulas+'</tr>');
	       				
       				});
       				$('.added-'+value['id']).toggle(500);
       				$(".major_"+value['id']).toggleClass('btn-success btn-danger');
       			}
       		});
        });
	} );
</script>
@endsection