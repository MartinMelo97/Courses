@extends('main.base')

@section('title','CRUD Docentes')

@section('content')
    <h2>Docentes</h2>

    @foreach($docentes as $docente)
        <p>Nombre: {{$docente->nombre}}</p>
    @endforeach

    {!! $docentes->render() !!}
@endsection