@extends('main.base')

@section('title','Editar subcategoria')

@section('content')
    <h3>Editando subcategoria {{$subcategoria->nombre}}</h3>
    {!! Form::open(['route'=>['subcategorias.update',$subcategoria->slug],'method'=>'PUT']) !!}
        {!! Form::label('nombre','Nombre de la subcategoria') !!}
        {!! Form::text('nombre',$subcategoria->nombre,['class'=>'']) !!} 
        <div>
                {!! Form::label('categoria','Categoria')!!}
                {!! Form::select('categoria',$categorias,$subcategoria->categoria,['class'=>'','required'])!!}
            </div>
        {!! Form::submit('Editar subcategoria') !!}
    {!! Form::close() !!}
@endsection