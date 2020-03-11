@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section id="banner">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route("best") }}">
                {{ csrf_field() }}

                    <select name="subject">
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id}}">{{ $subject->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" name="submit" value="Продължи">
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection