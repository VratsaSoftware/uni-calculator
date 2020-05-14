@extends('layouts.admin')

@section('title', 'Manage | Formulas')

@section('header', 'Нова формула')

@section('content')

@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

@foreach($errors->all() as $error)
	{{ $error }}
@endforeach

<div class="container">   
    <div class="form-group">  
        <form id="formula" method="POST" action="{{ route('formula.store', $major->id)}}" >
        {{ csrf_field() }} 
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td>

                        	{{-- Dropdown menu for exam types  --}}

                        	<select name="exam_type[]">

                        		@foreach($exam_types as $exam_type)
									<option value="{{ $exam_type->id }}">
										{{ $exam_type->name }}
									</option>
                        		@endforeach

                        	</select>

                        	{{-- Dropdown menu for subjects  --}}

                        	<select name="subject[]">

                        		@foreach($subjects as $subject)
									<option value="{{ $subject->id }}">
										{{ $subject->name }}
									</option>
                        		@endforeach

                        	</select>
							
							{{-- Coefficient --}}

                        	<input type="number" name="coefficient[]" placeholder="Коефициент" class="form-control name_list" />

                        	{{-- Grade --}}

                        	<input type="number" name="grade[]" placeholder="Максимална стойност" class="form-control name_list" />
                        </td>

                        {{-- Add variables --}}

                        <td>
                        	<button type="button" name="add" id="add" class="btn btn-success">
                        		+
                        	</button>
                        </td>  
                    </tr>  
                   </table>
                   <input type="submit" name="submit" id="submit" class="btn btn-info" value="Добави" />  
              </div>  
        </form>  
    </div>  
</div> 

<script>  
	$(document).ready(function(){
 		var exam_types = <?php echo json_encode($exam_types); ?>;
 		var subjects = <?php echo json_encode($subjects); ?>;
    	var i=1;
    	var n=1;  
    	$('#add').click(function(){  
        	i++;
        	n++;
        	$('#dynamic_field').append('<tr id="row'+i+'"><td id="col'+i+'"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

        	// Dropdown menu exam types

        	$('#col'+i+'').hide().append('<select name="exam_type[]" id="exam_type'+i+'"></select>').fadeIn(1000);

        	$.each(exam_types ,function() {
           		$('#exam_type'+i+'').append('<option value="'+this.id+'">'+this.name+'</option>');
        	});

        	// Dropdown menu subjects

        	$('#col'+i+'').append('<select name="subject[]" id="subject'+i+'"></select>');

        	$.each(subjects ,function() {
           		$('#subject'+i+'').append('<option value="'+this.id+'">'+this.name+'</option>');
        	});

        	$('#col'+i+'').append('<input type="number" name="coefficient[]" placeholder="Коефициент" class="form-control name_list" />');

        	$('#col'+i+'').append('<input type="number" name="grade[]" placeholder="Максимална стойност" class="form-control name_list" />');

    	});  
    	$(document).on('click', '.btn_remove', function(){  
        	var button_id = $(this).attr("id");
        	$('#row'+button_id+'').remove();
        	n--;
    	});  
    	
	});  
</script>
@endsection