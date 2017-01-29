@extends('main.base')
@section('title','Editar Institución')
@section('content')
    <h3>Editando institucion: {{$institucion->nombre}}</h3>
    {!! Form::open(['route'=>['instituciones.update',$institucion->slug],'method'=>'PUT','files'=>true]) !!}
        {{ csrf_field() }}
    
    <div>
        {!! Form::label('nombre','Nombre')!!}
        {!! Form::text('nombre',$institucion->nombre,['class'=>'','required'])!!}
    </div>

    <div>
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::text('email',$institucion->email,['class'=>'','required'])!!}
    </div>

    <div>
        {!! Form::label('telefono','Número de contacto')!!}
        {!! Form::text('telefono',$institucion->telefono,['class'=>'','required'])!!}
    </div>

    <div>
        {!!Form::label('membresia','Tipo de membresia')!!}
        {!! Form::select('membresia',['gratuita'=>'Gratuita','extraordinaria'=>'Extraordinaria','premium'=>'Premium'],$institucion->membresia) !!}
    </div>

    <div>
        {!! Form::label('codigo_postal','Código Postal')!!}
        {!! Form::text('codigo_postal',$institucion->codigo_postal,['class'=>'','required'])!!}
    </div>

    <div>
        {!! Form::label('pais','País')!!}
        {!! Form::text('pais',$institucion->pais,['class'=>'','required'])!!}
    </div>

    <div>
        {!! Form::label('estado','Estado')!!}
        {!! Form::text('estado',$institucion->estado,['class'=>'','required'])!!}
    </div>

    <div>
        {!! Form::label('municipio','Municipio')!!}
        {!! Form::text('municipio',$institucion->municipio,['class'=>'','required'])!!}
    </div>

    <div>
        {!! Form::label('direccion','Dirección')!!}
        {!! Form::text('direccion',$institucion->direccion,['class'=>'','required'])!!}
    </div>
    <h4>Para la API de Google Maps te dejo los campos, si quieres cámbialos por hidden</h4>
    <div>
        {!! Form::label('latitud','Latitud')!!}
        {!! Form::text('latitud',$institucion->latitud,['class'=>''])!!}
    </div>

    <div>
        {!! Form::label('longitud','Longitud')!!}
        {!! Form::text('longitud',$institucion->longitud,['class'=>''])!!}
    </div>

    <div>
        {!! Form::label('facebook',' URL de Facebook')!!}
        {!! Form::text('facebook',$institucion->facebook,['class'=>''])!!}
    </div> 

    <div>
        {!! Form::label('twitter',' URL de Twitter')!!}
        {!! Form::text('twitter',$institucion->twitter,['class'=>''])!!}
    </div> 

    <div>
        {!! Form::label('google',' URL de Google+')!!}
        {!! Form::text('google',$institucion->google,['class'=>''])!!}
    </div> 

    <div>
        {!! Form::label('pagina_web',' URL de la página web')!!}
        {!! Form::text('pagina_web',$institucion->pagina_web,['class'=>''])!!}
    </div> 

    <img src="{{$institucion->imagen}}" alt="" width="300" height="200">
    <div>
        {!! Form::label('imagen',' Subir logo')!!}
        {!! Form::file('imagen') !!}
    </div> 

    {!! Form::submit('Guardar cambios',['class'=>'']) !!}
    {!! Form::close() !!}
@endsection