@extends('layouts.app')

@section('title', 'Manage | Cities create')

@section('content')
<section id="banner">
	<div>
		@if ($errors->any())
		    <div>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form method="POST" action="{{ route('cities.update' , $city->id)}}">
			{{ csrf_field() }}
    		{{ method_field('PUT') }}

			<input type="input" name="name" value="{{$city->name}}">
			<input type="submit" name="submit" value="Промени">
		</form>
	</div>
</section>
@endsection