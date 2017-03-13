@extends('main.base')
@section('title','Crear Curso')

@section('content')
    <!-- Si no hay institucion seleccionada, debe seleccionarse para poder verificar su membresía -->
    @if($institucion_slug == "none")

        {!! Form::open(['route'=>'cursos.create','method'=>'GET','files'=>false]) !!}


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
            {!! Form::text('institucion', $institucion_owner->nombre ,['class'=>'','readonly','style'=>'width: 350px;'])!!}
        </div>

        <div>
            {!! Form::label('categoria','Selecciona tu categoria')!!}
            {!! Form::select('categoria',$categorias,null,['class'=>'','required','placeholder'=>'Selecciona una categoria'])!!}
        </div>
        <div>
            {!! Form::label('subcategoria','Selecciona tu subcategoria')!!}
            {!! Form::select('subcategoria',[],null,['class'=>'','required','placeholder'=>'Selecciona una subcategoria'])!!}
        </div>

        <div>
            {!! Form::label('duracion','Duración del curso')!!}
            {!! Form::number('duracion',null,['class'=>'','required']) !!}
            {!! Form::select('duracion_unit',['horas'=>'horas','dias'=>'días','semanas'=>'semanas'],null,
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
        @if($institucion_owner->membresia == "premium")

            <div>
                {!! Form::label('video','Adjunta la URL de un video que describa tu curso') !!}
                {!! Form::text('video', null,['class'=>'','placeholder'=>'https://...com']) !!}
            </div>

        @endif<!-- Termina if de membresia -->

        <!-- Si la membresia no es gratuita, puede tener hasta 5 imágenes -->
        @if($institucion_owner->membresia == "gratuita")
            <div>
                {!! Form::label('imagen','Sube una imagen de tu curso') !!}
                {!! Form::file('imagen[]') !!}
            </div>
        @else
            <div>
                {!! Form::label('imagenes','Sube imagenes de tu curso') !!}
                <p>Puedes agregar máximo 5 imágenes</p>
                <div id="add_inputs_images">
                    <span>1.- </span>{!! Form::file('imagen[]') !!}
                </div>
                <button id="btn_add_images" type="button">Agregar otra imagen</button>
            </div>
        @endif

        <br>
        <!-- Aqui se podrán agregar las tags del curso-->
        <div>
            {!! Form::label('tags', 'Agrega tags!') !!}
            <p>Puedes agregar máximo <span id="number_of_tags"></span> tags</p>
            <div id="add_inputs_tags">
                    <span>1.- </span>{!! Form::text('tags[]') !!}
            </div>

            <button id="btn_add_tags" type="button">Agregar otro tag</button>

        </div>
        <br>
        <div>
            {!! Form::label('ventajas','Escribe las ventajas del curso') !!}
               
                <div id="add_inputs_ventajas">
                    <span>1.- </span>{!! Form::text('ventajas[]') !!}
                </div>

                <button id="btn_add_ventajas" type="button">Agregar otra ventaja</button>
        </div>

        <!-- Si ya hay docentes registrados en esta institucion, los muestra para eligir a los
        encargados del curso -->

        @if(count($docentes)>0)

            <div>
                {!! Form::label('docentes','Selecciona a los docentes encargado del curso') !!}
                {!! Form::select('docentes[]',$docentes,null,['class'=>'','required','multiple']) !!}
            </div>
        <!-- Si no hay, se manda una alerta -->    
        @else

            <h5>No tienes profesores inscritos, añadelos!</h5>

        @endif

        <!-- Si la membresia es premium, puede añadir el temario del curso -->
        @if($institucion_owner->membresia == "premium")

            <div>
                {!! Form::label('temario','Añade el temario de tu curso') !!}

                <div id="add_inputs_temarios">
                        <span>1.- </span>{!! Form::text('temarios[]') !!}
                </div>

                <button id="btn_add_temarios" type="button">Agregar otro temario</button>

            </div>

        @endif
        <br><br>

        <!-- Debo crear un input tipo hidden para poder especificarle a jquery la constante de máximas tags que podrá agregar -->
        @if($institucion_owner->membresia == "gratuita")

            {!! Form::hidden('tags_number_id',3,['id'=>'tags_number_id']) !!}

        @elseif($institucion_owner->membresia == "extraordinaria")

            {!! Form::hidden('tags_number_id',5,['id'=>'tags_number_id']) !!}

        @elseif($institucion_owner->membresia == "premium")

            {!! Form::hidden('tags_number_id',7,['id'=>'tags_number_id']) !!}

        @endif


        {!!Form::submit('Crear curso!') !!}
    @endif <!-- Termina if de instituciones -->
    {!! Form::close() !!}

@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            
            const MAX_VENTAJAS = 6; 
            const MAX_TEMARIOS = 10;
            const MAX_CATEGORIAS = 3;
            const MAX_IMAGES = 6;
            const MAX_TAGS = $('#tags_number_id').val();
            let cont = 2;
            let cont_t = 2;
            let cont_tags = 1;
            let cont_images = 2;

            //Automáticamente que se carge la página, se le pasa el parámetro de cuantos tags puede agregar en el label
            $('#number_of_tags').append(MAX_TAGS);

            //Aqui hacemos la validacion de que solo se puedan escojer 3 categorias como máximo
                $('#categorias').on("click", function(){

                    if($(this).is(":focus")){

                        if($('#categorias').val().length > MAX_CATEGORIAS){

                            alert('Solo son 3!');
                            
                            $('#categorias').val([]);
                        }
                    }
            });

            $('#btn_add_ventajas').click(function(){
                $('#add_inputs_ventajas').append('<br><span>'+cont+'.- </span><input name="ventajas[]" type="text">');
                
                cont += 1;

                if(cont == MAX_VENTAJAS){
                    console.log('Chinga');
                    $('#btn_add_ventajas').css({'display':'none'});
                }
            });

            $('#btn_add_temarios').click(function(){
                $('#add_inputs_temarios').append('<br><span>'+cont_t+'.- </span><input name="temarios[]" type="text">');
                
                cont_t += 1;
                
                if(cont_t == MAX_TEMARIOS){
                    console.log('Chingax2');
                    $('#btn_add_temarios').css({'display':'none'});
                }
            });

            $('#btn_add_tags').click(function(){
                $('#add_inputs_tags').append('<br><span>'+(cont_tags+1)+'.- </span><input name="tags[]" type="text">');

                cont_tags += 1;

                if(cont_tags == MAX_TAGS)
                {
                    console.log('Chingax3');
                    $('#btn_add_tags').css({'display':'none'});
                }
            });

            $('#btn_add_images').click(function(){
                $('#add_inputs_images').append('<br><span>'+cont_images+'- </span><input name="imagen[]" type="file">');
                cont_images += 1;
                if(cont_images == MAX_IMAGES)
                {
                    console.log('Chingax4');
                    $('#btn_add_images').css({'display':'none'});
                }
            });
        });

            //AJAX para cargar las subcategoría dependiendo de la categoria seleccionada
            $('#categoria').on('change',function(){
                var categoria_selected = $('#categoria').val();
                console.log(categoria_selected);
                $.get("/admin/cursos/categoriaselected/" + categoria_selected,
                function(data){
                    if(data.length > 0)
                    {
                    for(var i = 0; i < data.length; i++){
                        $('#subcategoria').append(
                            '<option value="'+data[i]['id']+'">'+data[i]['nombre']+'</option'
                        );
                    }
                    }
                    else
                    {
                        alert("No hay subcategorias de esta categoria");
                    }
                }
                );
            });

    </script>

@endsection
