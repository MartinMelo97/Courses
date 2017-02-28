@extends('main.base')

@section('title','Editar docente')

@section('content')
    {!! Form::open(['route'=>['docentes.update',$docente->usuario],'method'=>'PUT','files'=>true]) !!}

        <div> 
        {!! Form::label('nombre','Nombre del Docente') !!}
        {!! Form::text('nombre',$docente->nombre,['class'=>'','required']) !!}
        </div>

        <div> 
        {!! Form::label('apellidos','Apellidos del Docente') !!}
        {!! Form::text('apellidos',$docente->apellidos,['class'=>'','required']) !!}
        </div>

        <div> 
        {!! Form::label('usuario','Usuario a utilizar')!!}
        {!! Form::text('usuario',$docente->usuario,['class'=>'','required']) !!}
        </div>

        <div> 
        {!! Form::label('institucion_id','Institución a la que pertenece') !!}
        {!! Form::select('institucion_id',$instituciones, $docente->institucion_id,['class'=>'','required']) !!}
        </div>

        <div> 
        {!! Form::label('grado_estudio','Carrera o título') !!}
        {!! Form::text('grado_estudio',$docente->grado_estudio,['class'=>'','required']) !!}
        </div>

        <div> 
        {!! Form::label('email','Correo electrónico') !!}
        {!! Form::email('email',$docente->email,['class'=>'','required']) !!}
        </div>

        @if($docente->imagen)
            <img src="{{$docente->imagen->ruta}}" alt="">
        @endif
        <div>
            {!! Form::label('imagen','Actualiza tu imagen') !!}
            {!! Form::file('imagen') !!}
        </div>
        {!! Form::submit('Actualizar docente') !!}
        
    {!! Form::close()!!}
@endsection