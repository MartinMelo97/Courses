@extends('main.base')

@section('title','Categorias Lista')

@section('content')
    <h3>Categorias existentes:</h3>
    <ul>
    @foreach($categorias as $categoria)
        <a href="{{route ('categorias.detail',$categoria->slug)}}">
        <li>{{$categoria->nombre}}</li></a>
    @endforeach
    </ul>
    {!! $categorias->render() !!}
@endsection