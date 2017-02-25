@extends('main.base')

@section('title','Instituciones')

@section('content')
    <h1>Universidades!</h1>
    <h2>Se van a mostrar las imagenes de las instituciones</h2>
    @foreach($instituciones as $institucion)
        <a href="{{route ('instituciones.detail',$institucion->slug)}}">
            <img src="{{$institucion->imagen->ruta}}" alt="" width="300px" height="250px"></a>
        <a href="{{route ('instituciones.courses',$institucion->slug)}}">
        <span>Ver cursos</span></a></li>
    @endforeach
    {!! $instituciones->render() !!}
@endsection