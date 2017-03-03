@extends('main.base')

@section('title','Crear subcategoria')

@section('content')
    <h3>Subcategories Creator</h3>
    {!! Form::open(['route'=>'subcategorias.store','method'=>'POST']) !!}
        {!! Form::label('nombre','Nombre de la subcategoria') !!}
        {!! Form::text('nombre',null,['class'=>'']) !!}
        <div>
                {!! Form::label('categoria','Categoria')!!}
                {!! Form::select('categoria',$categorias,null,['class'=>'','required'])!!}
            </div>
        {!! Form::submit('Crear subcategoria') !!}
    {!! Form::close() !!}
@endsection