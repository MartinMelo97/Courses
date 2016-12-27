@extends('main.base')

@section('title','Lista Cursos')

@section('content')
    <h1>Cursos disponibles!</h1>
        @foreach($cursos as $curso)
            <a href="{{route ('cursos.detail', $curso->slug)}}"><div style="background:white;">
            <p>{{$curso->nombre}}</p>
            <p>{{$curso->fecha_inicio}}</p>
            <p>{{$curso->lenguaje}}</p>
            <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}"><p>{{$curso->institucion->nombre}}</p></a>
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
            <hr>
        @endforeach
        {!! $cursos->render() !!}
@endsection