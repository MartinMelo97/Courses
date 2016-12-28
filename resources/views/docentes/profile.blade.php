@extends('main.base')
@section('title')
 Perfil {{$docente->nombre}}
@endsection
@section('content')
    @if(!$other)
        <h1>Bienvenido a tu perfil {{$docente->nombre}}</h1>
        <a href="{{route ('docentes.perfil.edit')}}"><h3 style="color:red;">Editar perfil</h3></a>
        <h3>Tu informacion: </h3>
    @endif
    <p>Nombre: {{$docente->nombre}}</p>
    <p>Usuario: {{$docente->usuario}}</p>
    <p>Correo Electrónico: {{$docente->email}}</p>
    <p>Grado de estudios: {{$docente->grado_estudio}}</p>
    <a href="{{route('instituciones.detail',$docente->institucion->slug)}}">
    <p>Institucion: {{$docente->institucion->nombre}}</p></a>
    <p>Fecha de nacimiento: {{$alumno->fecha_nacimiento}}</p>
    @if(!$other)
        <h2>Cursos en los que estas como docente: </h2>
        @if(count($cursos)>0)
            @foreach($cursos as $curso)
                <a href="{{route ('cursos.detail',$curso->slug)}}"><p>{{$curso->nombre}}</p></a>
            @endforeach
        @else
            <p>No eres docente en ninguno</p>
        @endif
    @endif
@endsection