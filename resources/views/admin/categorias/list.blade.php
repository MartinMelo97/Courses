@extends('main.base')

@section('title','CRUD Categorias')

@section('content')
    <h2>Categorias existentes:</h2>
    @foreach($categorias as $categoria)
        <p>{{$categoria->nombre}}</p>
    @endforeach

    {!! $categorias->render() !!}
@endsection
