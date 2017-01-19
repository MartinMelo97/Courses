@extends('main.base')
@section('title','Crear Institución')
@section('content')
    <h3>Vamo a crear instituciones alv</h3>
    {!! Form::open(['route'=>'instituciones.store','method'=>'POST','files'=>true]) !!}
        {{ csrf_field() }}
    
    <div>
        {!! Form::label('nombre','Nombre')!!}
        {!! Form::text('nombre',null,['class'=>'','placeholder'=>'Nombre de la institución','required'])!!}
    </div>

    <div>
        {!! Form::label('email','Correo Electronico')!!}
        {!! Form::text('email',null,['class'=>'','placeholder'=>'Correo Electrónico','required'])!!}
    </div>

    <div>
        {!! Form::label('telefono','Número de contacto')!!}
        {!! Form::text('telefono',null,['class'=>'','placeholder'=>'+52...','required'])!!}
    </div>

    <div>
        {!!Form::label('membresia','Tipo de membresia')!!}
        {!! Form::select('membresia',['gratuita'=>'Gratuita','extraordinaria'=>'Extraordinaria','premium'=>'Premium']) !!}
    </div>

    <div>
        {!! Form::label('codigo_postal','Código Postal')!!}
        {!! Form::text('codigo_postal',null,['class'=>'','placeholder'=>'*****','required'])!!}
    </div>

    <div>
        {!! Form::label('pais','País')!!}
        {!! Form::text('pais',null,['class'=>'','placeholder'=>'City','required'])!!}
    </div>

    <div>
        {!! Form::label('estado','Estado')!!}
        {!! Form::text('estado',null,['class'=>'','placeholder'=>'Estado','required'])!!}
    </div>

    <div>
        {!! Form::label('municipio','Municipio')!!}
        {!! Form::text('municipio',null,['class'=>'','placeholder'=>'Municipio','required'])!!}
    </div>

    <div>
        {!! Form::label('direccion','Dirección')!!}
        {!! Form::text('direccion',null,['class'=>'','placeholder'=>'Dirección','required'])!!}
    </div>
    <h4>Para la API de Google Maps te dejo los campos, si quieres cámbialos por hidden</h4>
    <div>
        {!! Form::label('latitud','Latitud')!!}
        {!! Form::text('latitud',null,['class'=>'','placeholder'=>'Latitud'])!!}
    </div>

    <div>
        {!! Form::label('longitud','Longitud')!!}
        {!! Form::text('longitud',null,['class'=>'','placeholder'=>'Longitud'])!!}
    </div>

    <div>
        {!! Form::label('facebook',' URL de Facebook')!!}
        {!! Form::text('facebook',null,['class'=>'','placeholder'=>'www...'])!!}
    </div> 

    <div>
        {!! Form::label('twitter',' URL de Twitter')!!}
        {!! Form::text('twitter',null,['class'=>'','placeholder'=>'www...'])!!}
    </div> 

    <div>
        {!! Form::label('google',' URL de Google+')!!}
        {!! Form::text('google',null,['class'=>'','placeholder'=>'www...'])!!}
    </div> 

    <div>
        {!! Form::label('pagina_web',' URL de la página web')!!}
        {!! Form::text('pagina_web',null,['class'=>'','placeholder'=>'www...'])!!}
    </div> 

    <div>
        {!! Form::label('imagen',' Subir logo')!!}
        {!! Form::file('imagen') !!}
    </div> 

    {!! Form::submit('Crear institucion',['class'=>'']) !!}
    {!! Form::close() !!}
@endsection