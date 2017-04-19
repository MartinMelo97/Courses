@extends('main.base')

@section('title')
    {{$categoria->nombre}}
@endsection
@section('content')
    @foreach($cursos as $curso)
         <h3>Nombre: <a href="{{route ('cursos.detail',$curso->slug)}}">{{$curso->nombre}}</h3></a>
        <h5>Institucion: <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}">{{$curso->institucion->nombre}}</a></h5>
        <p>Fecha de Inicio: {{$curso->fecha_inicio}}</p>
        <br><hr><br>
        @if($cursos->institucion->membresia == "premium")
            h3
        @endif
        
    @endforeach
@endsection