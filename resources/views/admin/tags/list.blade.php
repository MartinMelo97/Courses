@extends('main.base')

@section('title','CRUD tags')

@section('content')
    <h2>Tags!</h2>
    @foreach($tags as $tag)
        <p>Nombre: {{$tag->nombre}}</p>
        <p>Curso: {{$tag->curso->nombre}}</p>
        <hr>
    @endforeach
@endsection