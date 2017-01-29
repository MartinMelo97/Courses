@extends('main.base')

@section('title','Editar categoria')

@section('content')
    <h3>Editando categoria {{$categoria->nombre}}</h3>
    {!! Form::open(['route'=>['categorias.update',$categoria->slug],'method'=>'PUT']) !!}
        {!! Form::label('nombre','Nombre de la categoria') !!}
        {!! Form::text('nombre',$categoria->nombre,['class'=>'']) !!}
        {!! Form::submit('Editar categoria') !!}
    {!! Form::close() !!}
@endsection