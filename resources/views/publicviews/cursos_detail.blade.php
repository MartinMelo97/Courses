@extends('main.base')

@section('title')
    {{$curso->nombre}}
@endsection

@section('content')
    <h3>Nombre: {{$curso->nombre}}</h3>
    <h4>Duracion: {{$curso->duracion}}</h4>
    <p>Fecha de inicio: {{$curso->fecha_inicio}}
    <p>Lenguaje: {{$curso->lenguaje}}<p>
    <p>Es gratis?: {{$gratis}}</p>
    <p>Es gratis?: {{$gratis}}</p>
    <p>Descripcion: {{$curso->descripcion}}</p>
    <p>Calificacion del curso: {{$curso->calificacion}}</p>
    <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}">
    <p>Institucion propietaria del curso: {{$curso->institucion->nombre}}</p></a>
    <h4>Categorias del curso: </h4>
    @foreach($categorias as $categoria)
    <a href="{{route ('categorias.detail',$categoria->slug)}}"><p>{{$categoria->nombre}}</p></a>
    @endforeach
    
    <h4>Docentes encargados del curso: </h4>
    @foreach($docentes as $docente)
    <a href="{{route ('docentes.perfil',$docente->usuario)}}"><p>{{$docente->nombre}}</p></a>
    @endforeach
    
    <br>
    <br>
    <h4>Tags del curso: </h4>
    @foreach($tags as $tag)
    <a href="{{route ('tags.detail',$tag->slug)}}"><p>{{$tag->nombre}}</p></a>
    @endforeach
    <br>
    @if($comentarios)
    <h4>Comentarios del curso: </h4>
    @foreach($comentarios as $comentario)
    <a href="{{route ('alumnos.perfil',$comentario->alumno_id->usuario)}}">
    <h3>{{$comentario->alumno_id->nombre}}</h3></a>
    <p>{{$comentario->comentario}}</p>
    @endforeach
    <br>
    @endif
@endsection