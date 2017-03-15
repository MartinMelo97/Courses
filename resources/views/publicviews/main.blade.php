@extends('main.base')

@section('title','Cursos')

@section('content')
    <h1>Cursos disponibles!</h1>
    @foreach($cursos as $curso)
        <h3>Nombre: <a href="{{route ('cursos.detail',$curso->slug)}}">{{$curso->nombre}}</h3></a>
        <h5>Institucion: <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}">{{$curso->institucion->nombre}}</a></h5>
        <p>Fecha de Inicio: {{$curso->fecha_inicio}}</p>
        <p>Membresia: {{$curso->institucion->membresia}}</p>
        <br><hr><br>
    @endforeach
    <h1>Buscar cursos por categorias</h1>
    <ul>
        @foreach($categorias as $categoria)
            <a href="{{route ('categorias.detail',$categoria->slug)}}"><li>{{$categoria->nombre}}</li></a>
        @endforeach
    </ul>

@endsection