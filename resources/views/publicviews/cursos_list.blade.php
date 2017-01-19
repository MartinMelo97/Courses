@extends('main.base')

@section('title','Lista Cursos')

@section('content')
    <h1>Cursos disponibles!</h1>
        @foreach($cursos as $curso)
            <hr>
            <a href="{{route ('cursos.detail', $curso->slug)}}"><div style="background:white;">
            <p>Nombre: {{$curso->nombre}}</p>
            <p>Inicia el: {{$curso->fecha_inicio}}</p>
            <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}"><p>Institución: {{$curso->institucion->nombre}}</p></a>
            <p>Tipo de membresia: {{$curso->institucion->membresia}}</p>
            <h3>Categorias:</h3>
            <p>
            @for($i = 0; $i < count($curso->categorias); $i++)
                <a href="{{$curso->categorias_slugs[$i]}}"><span> {{$curso->categorias[$i]}}, </span></a>
            @endfor
            </p>
            <br>
            <h3>Tags:</h3>
            <p>Tags: 
            @for($i = 0; $i < count($curso->tags); $i++)
                <a href="{{$curso->tags_slugs[$i]}}"><span> {{$curso->tags[$i]}}, </span></a>
            @endfor
            </p>
            </div></a>
        @endforeach
        {!! $cursos->render() !!}
@endsection