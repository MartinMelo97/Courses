@extends('main.base')
@section('title','Crear Curso')

@section('content')
    <!-- Si no hay institucion seleccionada, debe seleccionarse para poder verificar su membresía -->
    @if($institucion_slug == "none")

        {!! Form::open(['route'=>'cursos.create','method'=>'GET','files'=>false]) !!}

            {{ csrf_field() }}

            <p>Por favor introduce a que institución pertenecerá el curso:</p>

            <div>
                {!! Form::label('institucion','Institución')!!}
                {!! Form::select('institucion',$institucion,['class'=>'','required'])!!}
            </div>
            {!! Form::submit('Siguiente') !!}

        {!! Form::close() !!}

    <!-- Si ya se selecciono, se muestran todos los datos a llenar dependiento de su membresía -->
    @else

    {!! Form::open(['route'=>'cursos.store','method'=>'POST','files'=>true]) !!}
        
        {{ csrf_field() }}

        <div>
            {!! Form::label('nombre',"Nombre del curso")!!}
            {!! Form::text('nombre',null,['class'=>'','placeholder'=>'Ingresa el nombre del curso aqui','required']) !!}
        </div>

        <div>
            {!! Form::label('institucion','Institución') !!}
            {!! Form::text('institucion', $institucion_owner->nombre ,['class'=>'','disabled','style'=>'width: 350px;'])!!}
        </div>

        <div>
            {!! Form::label('categorias','Selecciona 3 categorias como máximo')!!}
            {!! Form::select('categorias',$categorias,null,['class'=>'','required','multiple'])!!}
        </div>

        <div>
            {!! Form::label('duracion','Duración del curso')!!}
            {!! Form::number('duracion',null,['class'=>'','required']) !!}
            {!! Form:: select('duracion_unit',['horas'=>'horas','dias'=>'días','semanas'=>'semanas'],null,
                ['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('fecha_inicio','Fecha de inicio') !!}
            {!! Form::text('fecha_inicio',null,['class'=>'','placeholder'=>'YYYY-MM-DD','required']) !!}
        </div>

        <div>
            {!! Form::label('lenguaje','Idioma del curso') !!}
            {!! Form::select('lenguaje',['español'=>'Español','ingles'=>'Inglés'] ,null,['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('nivel','Nivel del curso') !!}
            {!! Form::select('nivel',['facil'=>'Fácil','intermedio'=>'Intermedio','alto'=>'Difícil'], null, 
                ['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('descripcion','Descripción del curso') !!}
            {!! Form::textarea('descripcion') !!}
        </div>

        <div>
            {!! Form::label('bloqueo','Bloqueo para visualizar información') !!}
            {!! Form::select('bloqueo',['correo'=>'Correo Electrónico','social'=>'Redes Sociales','login'=>'Iniciar sesión'],
            null,['class'=>'','required'])!!}
        </div>

        <!-- Si la membresia no es premium, podrán subir una imagen para su curso -->
        @if($institucion_owner->membresia != "premium")

            <div>
                {!! Form::label('media','Sube una foto para tu curso!') !!}
                {!! Form::file('media') !!}
            </div>
            <!-- Este if es para detectar cuantas tag tiene permitido implementar, dependiendo
            de la membresia que tenga -->
            @if($institucion_owner->membresia == "gratuita")

                <div>
                    {!!Form::label('tags','Puedes colocar hasta 3 tags, sepáralos con una coma') !!}
                    {!!Form::text('tags',null,['class'=>'']) !!}
                </div>

            @elseif($institucion_owner->membresia == "extraordinaria")

                <div>

                    {!!Form::label('tags','Puedes colocar hasta 5 tags, sepáralos con una coma') !!}
                    {!!Form::text('tags',null,['class'=>'']) !!}

                </div>
            @endif <!-- Termina if de las tags -->

        <!-- Si si es premium, podrá mandar la URL de su video (Youtube de preferencia) -->
        <!-- Tambien se pone el numero de tags que puede incluir -->
        @else

            <div>
                {!! Form::label('media','Adjunta la URL de un video que describa tu curso') !!}
                {!! Form::text('media', null,['class'=>'','placeholder'=>'https://...com']) !!}
            </div>

            <div>
                {!!Form::label('tags','Puedes colocar hasta 7 tags, sepáralos con una coma') !!}
                {!!Form::text('tags',null,['class'=>'']) !!}
            </div>

        @endif<!-- Termina if de membresia -->
        
        <div>
            {!! Form::label('ventajas','Escribe las ventajas del curso') !!}
               
                <div id="add_inputs_ventajas">
                    <span>1.- </span>{!! Form::text('ventajas[]') !!}
                </div>

                <button id="btn_add_ventajas">Agregar otra ventaja</button>
        </div>

        <!-- Si ya hay docentes registrados en esta institucion, los muestra para eligir a los
        encargados del curso -->

        @if(count($docentes)>0)

            <div>
                {!! Form::label('docentes','Selecciona a los docentes encargado del curso') !!}
                {!! Form::select('docentes',$docentes,null,['class'=>'','required','multiple']) !!}
            </div>
        <!-- Si no hay, se manda una alerta -->    
        @else

            <h5>No tienes profesores inscritos, añadelos!</h5>

        @endif

        <!-- Si la membresia no es gratuita, puede añadir el temario del curso -->
        @if($institucion_owner->membresia != "gratuita")

            <div>
                {!! Form::label('temario','Añade el temario de tu curso') !!}

                <div id="add_inputs_temarios">
                        <span>1.- </span>{!! Form::text('temarios[]') !!}
                </div>

                <button id="btn_add_temarios">Agregar otro temario</button>

            </div>

        @endif
        <br><br>
        {!!Form::submit('Crear curso!') !!}
    @endif <!-- Termina if de instituciones -->
    {!! Form::close() !!}

@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            
            const MAX_VENTAJAS = 6; 
            const MAX_TEMARIOS = 10;
            let cont = 2;
            let cont_t = 2;

            $('#btn_add_ventajas').click(function(){
                $('#add_inputs_ventajas').append('<br><span>'+cont+'.- </span><input name="ventajas[]" type="text">');
                
                cont += 1;

                if(cont == MAX_VENTAJAS){
                    console.log('Chinga');
                    $('#btn_add_ventajas').css({'display':'none'});
                }
            });

            $('#btn_add_temarios').click(function(){
                $('#add_inputs_temarios').append('<br><span>'+cont_t+'._ </span><input name="temarios[] type="text>');
                
                cont_t += 1;
                
                if(cont_t == MAX_TEMARIOS){
                    console.log('Chingax2');
                    $('#btn_add_temarios').css({'display':'none'});
                }
            });
        });

    </script>

@endsection
