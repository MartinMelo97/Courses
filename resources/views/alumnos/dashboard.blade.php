@extends('main.base')

@section('title')
    Dashboard {{$alumno->nombre.' '.$alumno->apellidos}}
@endsection

@section('content')
    <h2>Bienvenido a tu dashboard</h2>
    <h4>Cursos en los que estas inscrito: {{count($cursos)}}</h4>
    <hr>
    <h3>Cursos</h3>
    @if(count($cursos)>0)
        @foreach($cursos as $curso)
        <div>
            <h3>Nombre: <a href="{{route ('cursos.detail',$curso->slug)}}">{{$curso->nombre}}</h3></a>
            <h5>Institucion: <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}">{{$curso->institucion->nombre}}</a></h5>
            <p>Fecha de Inicio: {{$curso->fecha_inicio}}</p>
            <p>Ir a curso</p>
        </div>
        <br>
        @endforeach
    @endif
@endsection