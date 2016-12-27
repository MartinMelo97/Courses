@extends('main.base')

@section('title')
    {{$institucion->nombre}}
@endsection

@section('content')
    <h2>{{$institucion->nombre}}</h2>
    <br>
    <h4>Correo: {{$institucion->email}}</h4>
    <p>Aqui va la imagen {{$institucion->imagen}}</p>
    <br>
    <a href="{{route ('instituciones.courses',$institucion->slug)}}">Ir a cursos</a>
@endsection