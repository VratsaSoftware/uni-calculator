@extends('layouts.app')

@section('title', 'The best in')

@section('content')
<section id="banner">
<div class="container">
    <table>
    	<thead>
    		<tr>
    			<th>#</th>
    			<th>Name</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($fields as $field)
    			@foreach($major_fields as $key => $value)
    				@if($field->id == $value)
	    				<tr class="field_row_{{$field->id}}">
	    					<th>
								<button class="field_{{$field->id}} btn btn-success">
									+
								</button>
							</th>
							<th>
								{{ $field->name}}
							</th>
	    				</tr>
	    				@foreach($subfields as $subfield)
			    			@foreach($major_subfields as $key_1 => $value_1)
			    				@if($subfield->id == $value_1)
				    				@if($subfield->field_id == $field->id)
				    					<tr class="formula_row major_subfield_{{$subfield->field_id}}">
				    						<th>
												<button class="subfield_{{$subfield->id}} btn btn-success">
													+
												</button>
											</th>
											<th>
												{{ $subfield->name}}
											</th>
				    					</tr>
				    					@foreach($majors as $major)
						    				@if($major->subfield_id == $value_1)
						    					<tr class="formula_row major_name_{{$major->id}}">
						    						<th>
														#
													</th>
													<th>
														{{ $major->name}}
													</th>
						    					</tr>
						    				@endif
					    				@endforeach
				    				@endif
			    				@endif
			    			@endforeach
	    				@endforeach
	    			@endif
    			@endforeach
    		@endforeach
    	</tbody>
    </table>
    <div>
    	<table>
    		
    	</table>
    </div>
    
</div>
</section>
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
   					$(".field_"+value['id']).toggleClass('btn-danger btn-success');
       			}else {
       				$.each($('.major_subfield_'+value['id']), function(k,v){
       					$(this).show('500').addClass('subfields-added-'+value['id']);
       				});	
       				$(".field_"+value['id']).toggleClass('btn-success btn-danger');
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
       					$(".subfield_"+value['id']).toggleClass('btn-danger btn-success');
       				}else{
       					$.each($('.major_name_'+value_2['id']), function(k,v){
	       					if (value['id'] == value_2['subfield_id']) {
	       						$(this).show('500').addClass('majors-added-'+value_2['id']);
	       					}
       					});
       					$(".subfield_"+value['id']).toggleClass('btn-success btn-danger');
       				}
   				});	
       		});
   		});
	});
</script>

@endsection