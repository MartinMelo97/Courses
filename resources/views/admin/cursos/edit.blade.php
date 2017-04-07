@extends('main.base')
@section('title','Editar Curso')

@section('content')

    {!! Form::open(['route'=>['cursos.update',$curso->slug],'method'=>'PUT','files'=>true]) !!}
        
        {{ csrf_field() }}

        <div>
            {!! Form::label('nombre',"Nombre del curso")!!}
            {!! Form::text('nombre',$curso->nombre,['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('institucion','Institución') !!}
            {!! Form::select('institucion', $instituciones, $curso->institucion->id ,['class'=>'','readonly','style'=>'width: 350px;'])!!}
        </div>

        <div>
            {!! Form::label('categoria','Selecciona tu categoria')!!}
            {!! Form::select('categoria',$categorias,$curso->categoria->id,['class'=>'','required','placeholder'=>'Selecciona una categoria'])!!}
        </div>
        <div>
            {!! Form::label('subcategoria','Selecciona tu subcategoria')!!}
            {!! Form::select('subcategoria',$subcategorias,$curso->subcategoria->id,['class'=>'','required','placeholder'=>'Selecciona una subcategoria'])!!}
        </div>

        <div>
            {!! Form::label('precio','Precio del curso (MXN)') !!}
            {!! Form::number('precio',$curso->precio,['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('duracion','Duración del curso')!!}
            {!! Form::number('duracion',$duracion[0],['class'=>'','required']) !!}
            {!! Form::select('duracion_unit',['horas'=>'horas','dias'=>'días','semanas'=>'semanas'],$duracion[1],
                ['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('fecha_inicio','Fecha de inicio') !!}
            {!! Form::text('fecha_inicio',$curso->fecha_inicio,['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('estado','Estado donde se dará el curso') !!}
            {!! Form::text('estado',$curso->estado,['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('lenguaje','Idioma del curso') !!}
            {!! Form::select('lenguaje',['español'=>'Español','ingles'=>'Inglés'] ,$curso->lenguaje,['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('nivel','Nivel del curso') !!}
            {!! Form::select('nivel',['facil'=>'Fácil','intermedio'=>'Intermedio','alto'=>'Difícil'], $curso->nivel, 
                ['class'=>'','required']) !!}
        </div>

        <div>
            {!! Form::label('descripcion','Descripción del curso') !!}
            {!! Form::textarea('descripcion',$curso->descripcion) !!}
        </div>

        <div>
            {!! Form::label('bloqueo','Bloqueo para visualizar información') !!}
            {!! Form::select('bloqueo',['correo'=>'Correo Electrónico','social'=>'Redes Sociales','login'=>'Iniciar sesión'],
            $curso->bloqueo,['class'=>'','required'])!!}
        </div>

        <!-- Si la membresia no es premium, podrán subir una imagen para su curso -->
        @if($curso->institucion->membresia != "premium")

            <img src="{{$curso->media}}" alt="" width="200" height="100">
            <div>
                {!! Form::label('media','Actualizar foto') !!}
                {!! Form::file('media') !!}
            </div>

        <!-- Si si es premium, podrá mandar la URL de su video (Youtube de preferencia) -->
        @else
            <iframe width="500" height="500" src="{{$curso->video}}" frameborder="0" allowfullscreen></iframe>
            <div>
                {!! Form::label('video','Actualizar curso') !!}
                {!! Form::text('video', null,['class'=>'','placeholder'=>'https://...com']) !!}
            </div>

        @endif<!-- Termina if de membresia -->

        <!-- Aqui se podrán agregar las tags del curso-->
        <div>
            {!! Form::label('tags', 'Tags!') !!}
            <br>
            @foreach($curso->tags as $tag)
                {!! Form::text('tags[]',$tag->nombre) !!}
                <br>
            @endforeach

        </div>
        <br>
        <div>
            {!! Form::label('ventajas','Ventajas del curso') !!}
               <br>
               <div id="add_inputs_ventajas">
                    @foreach($curso->ventajas as $ventaja)
                        {!! Form::text('ventajas[]',$ventaja->ventaja) !!}<br>
                    @endforeach
                </div>
                <button id="btn_add_ventajas" type="button">Agregar otra ventaja</button>
        </div>

        <!-- Si ya hay docentes registrados en esta institucion, los muestra para eligir a los
        encargados del curso -->

        @if(count($docentes)>0)

            <div>
                {!! Form::label('docentes','Selecciona a los docentes encargado del curso') !!}
                {!! Form::select('docentes[]',$docentes,$docentes_curso,['class'=>'','required','multiple']) !!}
            </div>
        <!-- Si no hay, se manda una alerta -->    
        @else

            <h5>No tienes profesores inscritos, añadelos!</h5>

        @endif

        <!-- Si la membresia no es gratuita, puede añadir el temario del curso -->
        @if($curso->institucion->membresia != "gratuita")

            <div>
                {!! Form::label('temario','Temario de tu curso') !!}
                <br>
                <div id="add_inputs_temarios">
                @foreach($curso->temarios as $temario)
                    {!! Form::text('temarios[]',$temario->tema) !!} <br>
                @endforeach
                </div>
                <button id="btn_add_temarios" type="button">Agregar otro temario</button>

            </div>

        @endif
        <br><br>

        <!-- Debo crear un input tipo hidden para poder especificarle a jquery la constante de máximas tags que podrá agregar -->
        @if($curso->institucion->membresia == "gratuita")

            {!! Form::hidden('tags_number_id',3,['id'=>'tags_number_id']) !!}

        @elseif($curso->institucion->membresia == "extraordinaria")

            {!! Form::hidden('tags_number_id',5,['id'=>'tags_number_id']) !!}

        @elseif($curso->institucion->membresia == "premium")

            {!! Form::hidden('tags_number_id',7,['id'=>'tags_number_id']) !!}

        @endif


        {!!Form::submit('Actualizar curso!') !!}
    {!! Form::close() !!}

@endsection

@section('scripts')

    <script>

        $(document).ready(function(){
            
            const MAX_VENTAJAS = 6; 
            const MAX_TEMARIOS = 10;
            const MAX_CATEGORIAS = 3;
            const MAX_TAGS = $('#tags_number_id').val();
            let cont = 2;
            let cont_t = 2;
            let cont_tags = 1;

            //Automáticamente que se carge la página, se le pasa el parámetro de cuantos tags puede agregar en el label
            //$('#number_of_tags').append(MAX_TAGS);

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
        });

        //AJAX para cargar las subcategoría dependiendo de la categoria seleccionada
            $('#categoria').on('change',function(){
                var categoria_selected = $('#categoria').val();
                console.log(categoria_selected);
                $.get("/admin/cursos/categoriaselected/" + categoria_selected,
                function(data){
                    $('#subcategoria').html('');
                    if(data.length > 0)
                    {
                    for(var i = 0; i < data.length; i++){
                        $('#subcategoria').append(
                            '<option value="'+data[i]['id']+'">'+data[i]['nombre']+'</option'
                        );
                        console.log(data[i]['id']);
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
