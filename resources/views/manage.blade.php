@extends('layouts.app')

@section('title', 'Manage')

@section('content')
<section id="banner">
    <div class="container">
        <a href="{{ route("subject.index")}}">Предмет</a>
        <p></p>
        <a href="{{ route("exam_type.index")}}">Вид</a>
        <p></p>
        <a href="{{ route("major.index")}}">Специалност</a>
    </div>
</section>
@endsection