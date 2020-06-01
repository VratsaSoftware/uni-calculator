@extends('layouts.app')

@section('title', 'Резултати от търсене')

@section('content')


<div id="first-results" class="container" style="width: 98%; 
	margin: 0 auto;">
	<div class="row">
		<div class="col">
			<p>Всички специалности, за които може да кандидатствате с <b>{{$subject_name}}</b></p>
			@foreach($fields as $field)
				@foreach($major_fields as $key => $value)
					@if($field->id == $value)
						<ul id="results" class="field_row_{{$field->id}} list-unstyled mb-md-2">
							<li class="text-lg-left" > <button class="field_{{$field->id}} btn btn-success btn-block text-lg-left mb-md-2" > <span><i class=" icon_{{$field->id}} fas fa-book  mr-md-4"></i></span>{{$field->name}} </button>
								<div class="card bg-light mb-2 ml-md-4">
								@foreach($subfields as $subfield)
		    						@foreach($major_subfields as $key_1 => $value_1)
		    							@if($subfield->id == $value_1)
			    							@if($subfield->field_id == $field->id)
			    								<ul class="formula_row major_subfield_{{$subfield->field_id}}  list-unstyled mt-md-2">
			    									<li><button class="subfield_{{$subfield->id}} btn btn-light btn-block text-left">
														{{$subfield->name}}
													</button>
			    										<div class="card border-light mb-2 ml-md-4 mr-md-2">
															@foreach($majors as $major)
						    									@if($major->subfield_id == $value_1)

						    										<ul class="formula_row major_name_{{$major->id}} ml-md-4" >
						    											<li><a href="{{ route('calculators.show', $major->id) }}" style="color: #000;">
																			{{ $major->name}} - {{$major->university->name}}
																		</a></li>
						    										</ul>
						    									@endif
						    								@endforeach	
						    							</div>	
													</li>
			    								</ul>
			    							@endif
			    						@endif
			    					@endforeach

			    				@endforeach	
			    			</div>
							</li>
						</ul>
					@endif	
				@endforeach		
			@endforeach	
		</div>
	</div>				
</div>


<script>
	$(document).ready( function () {
    	
		var fields = <?php echo json_encode($fields); ?>;
		var majors = <?php echo json_encode($majors); ?>;
		var subfields = <?php echo json_encode($subfields); ?>;

    	$.each( fields ,function(key , value) {
       		$(".field_"+value['id']).click(function() {
       			if ($('.subfields-added-'+value['id']).html()) {	
       				$('.subfields-added-'+value['id'])
       				.hide('500')
       				.removeClass('subfields-added-'+value['id']);
       				$.each( subfields ,function(key_3 , value_3) {
       					$.each(majors ,function(key_2 , value_2) {
		   					if ($('.majors-added-'+value_2['id']).html() && value_3['id'] == value_2['subfield_id'] && value_3['field_id'] == value['id']) {
		       					$('.majors-added-'+value_2['id'])
		       					.hide('500')
		       					.removeClass('majors-added-'+value_2['id']);
		       				}
	       				});
   					});
   					$(".field_"+value['id']).toggleClass('btn-outline-success btn-success');
       				$(".icon_"+value['id']).toggleClass('fa-book fa-book-open');

       			}else {
       				$.each($('.major_subfield_'+value['id']), function(k,v){
       					$(this).show('500').addClass('subfields-added-'+value['id']);
       				});	
       				$(".field_"+value['id']).toggleClass('btn-success btn-outline-success');
       				$(".icon_"+value['id']).toggleClass('fa-book-open fa-book');
       			}
       		});
        });
    	$.each( subfields ,function(key , value) {
       		$(".subfield_"+value['id']).click(function() {
       			$.each(majors ,function(key_2 , value_2) {
   					if ($('.majors-added-'+value_2['id']).html() && value['id'] == value_2['subfield_id']) {
       					$('.majors-added-'+value_2['id'])
       					.hide('500')
       					.removeClass('majors-added-'+value_2['id']);
       					$(".subfield_"+value['id']).toggleClass('btn-outline-success btn-success');
       				}else{
       					$.each($('.major_name_'+value_2['id']), function(k,v){
	       					if (value['id'] == value_2['subfield_id']) {
	       						$(this).show('500').addClass('majors-added-'+value_2['id']);
	       					}
       					});
       					$(".subfield_"+value['id']).toggleClass('btn-success btn-outline-success');
       				}
   				});	
       		});
   		});
	});
</script>

@endsection