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
		<form method="POST" action="{{ route('cities.store')}}">
			{{ csrf_field() }}

			<input type="input" name="name" placeholder="Името на града">
			<input type="submit" name="submit" value="Създай">
		</form>
	</div>
</section>
@endsection