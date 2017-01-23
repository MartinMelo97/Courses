@extends('main.base')

@section('title','CRUD Alumnos')

@section('content')
    <h2>Alumnos</h2>
    @foreach($alumnos as $alumno)
        <p>Nombre: {{$alumno->nombre}}</p>
    @endforeach
@endsection