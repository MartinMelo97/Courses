@extends('main.base')

@section('title','Crear docente')

@section('content')
    {!! Form::open(['route'=>'docentes.store','method'=>'POST','files'=>true]) !!}

        <div> 
        {!! Form::label('nombre','Nombre del Docente') !!}
        {!! Form::text('nombre',null,['class'=>'','required','placehoder'=>'Por tu nombre']) !!}
        </div>

        <div> 
        {!! Form::label('apellidos','Apellidos del Docente') !!}
        {!! Form::text('apellidos',null,['class'=>'','required','placehoder'=>'Apellidos']) !!}
        </div>

        <div> 
        {!! Form::label('usuario','Usuario a utilizar')!!}
        {!! Form::text('usuario',null,['class'=>'','required','placehoder'=>'Uno cadago']) !!}
        </div>

        <div> 
        {!! Form::label('institucion_id','Institución a la que pertenece') !!}
        {!! Form::select('institucion_id',$instituciones,null,['class'=>'','required']) !!}
        </div>

        <div> 
        {!! Form::label('grado_estudio','Carrera o título') !!}
        {!! Form::text('grado_estudio',null,['class'=>'','required','placehoder'=>'Lic o Ing']) !!}
        </div>

        <div> 
        {!! Form::label('email','Correo electrónico') !!}
        {!! Form::email('email',null,['class'=>'','required','placehoder'=>'@']) !!}
        </div>

        <div> 
        {!! Form::label('password','Contraseña') !!}
        {!! Form::password('password') !!}
        </div>

        <div>
            {!! Form::label('imagen','Sube una foto tuya') !!}
            {!! Form::file('imagen') !!}
        </div>
        {!! Form::submit('Guardar docente') !!}
        
    {!! Form::close()!!}
@endsection