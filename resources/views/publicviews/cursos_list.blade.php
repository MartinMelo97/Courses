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
            <h4>Categoria:</h4>
            <p>{{$curso->categoria->nombre}}</p>
            <h4>Subategoria:</h4>
            <p>{{$curso->subcategoria->nombre}}</p>
            <h3>Tags:</h3>
            <p>Tags: 
            @for($i = 0; $i < count($curso->tags); $i++)
                <a href="{{$curso->tags_slugs[$i]}}"><span> {{$curso->tags[$i]->nombre}}, </span></a>
            @endfor
            </p>
            </div></a>
        @endforeach
        {!! $cursos->render() !!}
@endsection