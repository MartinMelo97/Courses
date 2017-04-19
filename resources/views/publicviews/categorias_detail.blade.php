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
        @if($curso->institucion->membresia == "premium")
            <h3 style="red">Recomendado</h3>
        @endif
        
        {!! $entries->appends(\Input::except('page'))->render() !!}
    @endforeach
@endsection