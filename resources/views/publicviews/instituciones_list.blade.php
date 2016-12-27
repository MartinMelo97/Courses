@extends('main.base')

@section('title','Instituciones')

@section('content')
    <h1>Universidades!</h1>
    <h2>Se van a mostrar las imagenes de las instituciones</h2>
    <ul>
    @foreach($instituciones as $institucion)
        <a href="{{route ('instituciones.detail',$institucion->slug)}}">
        <li>{{$institucion->imagen}}</a>
        <a href="{{route ('instituciones.courses',$institucion->slug)}}">
        <span>Ver cursos</span></a></li>
    @endforeach
    </ul>
    {!! $instituciones->render() !!}
@endsection