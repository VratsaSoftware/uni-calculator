@extends('layouts.app')

@section('title', 'Manage | Cities')

@section('content')
<section id="banner">
	<div>
		@if (Session::has('message'))
		<div>
			{!! Session::get('message') !!}
		</div>
		@endif
		<div>Градове</div>
		<table>
			<thead>
				<tr>
					<th>Име</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			@foreach($cities as $city)
				<tr>
					<td>
						{{ $city->name }}
					</td>	
					<td>
						<a href="{{ route('cities.edit', $city->id) }}">
							Промени
						</a>
					</td>
					<td>
						<form method="POST" action="cities/{{$city->id}}">
    						{{ csrf_field() }}
    						{{ method_field('DELETE') }}

						    <div>
						      <input type="submit" value="Изтрии">
						    </div>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
		<a href="{{ route('cities.create') }}">Нов град</a>
	</div>
</section>
@endsection