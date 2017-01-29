@extends('main.base')

@section('title','Crear Tag')

@section('content')
    <h3>Crea tus tagsssssssss</h3>
    {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
        {{csrf_field()}}
        <div>
            {!! Form::label('nombre','Nombre del tag') !!}
            {!! Form::text('nombre',null,['class'=>'','required','placeholder'=>'Algo shido']) !!}
        </div>
        {!! Form::submit('Crear tag!') !!}
    {!! Form::close() !!}
@endsection