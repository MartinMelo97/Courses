@extends('main.base')

@section('title')
    {{$institucion->nombre}}
@endsection
@section('content')
    @if(count($cursos)>0)
        @foreach($cursos as $curso)
            <h3>Nombre: <a href="{{route ('cursos.detail',$curso->slug)}}">{{$curso->nombre}}</h3></a>
            <h5>Institucion: <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}">{{$curso->institucion->nombre}}</a></h5>
            <p>Fecha de Inicio: {{$curso->fecha_inicio}}</p>
            @if($curso->institucion->membresia == "premium")
                <h3 style="color:red;">Recomendado</h3>
            @endif
            <br><hr><br>
            {!! $cursos->render() !!}
        @endforeach
    @else
        <h3>No hay cursos todavia de esta institucion</h3>
    @endif

@endsection