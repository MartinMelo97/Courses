@extends('main.base')

@section('title','Crear categoria')

@section('content')
    <h3>Categories Creator</h3>
    {!! Form::open(['route'=>'categorias.store','method'=>'POST']) !!}
        {!! Form::label('nombre','Nombre de la categoria') !!}
        {!! Form::text('nombre',null,['class'=>'']) !!}
        {!! Form::submit('Crear categoria') !!}
    {!! Form::close() !!}
@endsection