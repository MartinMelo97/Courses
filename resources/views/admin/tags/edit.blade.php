@extends('main.base')

@section('title','Editar Tag')

@section('content')
    <h3>Crea tus tagsssssssss</h3>
    {!! Form::open(['route'=>['tags.update',$tag->slug],'method'=>'PUT']) !!}
        {{csrf_field()}}
        <div>
            {!! Form::label('nombre','Nombre del tag') !!}
            {!! Form::text('nombre',$tag->nombre,['class'=>'','required','placeholder'=>'Algo shido']) !!}
        </div>
        {!! Form::submit('Editar tag!') !!}
    {!! Form::close() !!}
@endsection