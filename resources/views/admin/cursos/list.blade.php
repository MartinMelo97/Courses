@extends('main.base')
@section('title','CRUD Cursos')
@section('content')
    @foreach($cursos as $curso)
        <p>Nombre: {{$curso->nombre}}</p>
    @endforeach

    {!! $cursos->render()!!}
@endsection