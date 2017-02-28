@extends('main.base')

@section('title')
    {{$alumno->nombre}} {{$alumno->apellidos}}
@endsection

@section('content')
    <h3>Información del alumno {{$alumno->usuario}}</h3>
    <p>Nombre: {{$alumno->nombre}}</p>
    <p>Apellidos: {{$alumno->apellidos}}</p>
    <p>Usuario: {{$alumno->usuario}}</p>
    <p>Sexo: {{$alumno->sexo}}</p>
    @if($alumno->imagen == null)
        <h5>No tiene imagen</h5>
    @else
        <img src="{{asset($alumno->imagen->ruta)}}" style="width:200px; height:200px;">
    @endif
    <p>Pais: {{$alumno->pais}}</p>
    <p>Fecha de nacimiento: {{$alumno->fecha_nacimiento}}</p>
        <h2>Cursos en los que estas inscrito: </h2>
        @if(count($cursos)>0)
            @foreach($cursos as $curso)
                <a href="{{route ('cursos.detail',$curso->slug)}}"><p>{{$curso->nombre}}</p></a>
            @endforeach
        @else
            <p>Aun no estas inscrito a ninguno</p>
            <a href="{{route ('cursos.list')}}"><p>Busca alguno que te gustes!</p></a>
        @endif
@endsection