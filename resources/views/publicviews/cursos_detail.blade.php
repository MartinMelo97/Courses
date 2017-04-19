@extends('main.base')

@section('title')
    {{$curso->nombre}}
@endsection

@section('content')

    <style>
        .datos_ocultos{
            display: none;
        }
    </style>
    
    @if($institucion->membresia != "premium")
        <div>
            <img src="{{$imagenes[0]->ruta}}" alt="">
            @if($institucion->membresia == "gratuita")
                <h3 id="curso_name" data-id="{{$curso->id}}">{{$curso->nombre}} | Institución: {{$curso->institucion->nombre}}</h3>
            @else
                <h3 id="curso_name" data-id="{{$curso->id}}">{{$curso->nombre}}</h3>
            @endif
            @if(count($imagenes) > 0)   
                @for($i = 1; $i < count($imagenes); $i++)
                    <img src="{{$imagenes[$i]->ruta}}" alt="" style="width:100px; height: 100px; display:inline;">
                @endfor
            @endif
        </div>
    @else
        <div>
            <iframe width="500" height="500" src="{{$curso->video}}" frameborder="0" allowfullscreen></iframe>
            <h3 id="curso_name" data-id="{{$curso->id}}">{{$curso->nombre}}</h3>
            @if(count($imagenes) > 0)
                @for($i = 0; $i < count($imagenes); $i++)
                    <img src="{{$imagenes[$i]->ruta}}" alt="" style="width:100px; height: 100px; display:inline;">
                @endfor
            @endif
        </div>
    @endif

    <div class="datos_publicos">
        <h3>Categoria: {{$categoria->nombre}}</h3>
        <h3>Subategoria: {{$subcategoria->nombre}}</h3>
        <h4>DESCRIPCIÓN: {{$curso->descripcion}}</h4>
        <p>Lenguaje: {{$curso->lenguaje}}</p>
        <p>Nivel: {{$curso->nivel}}</p>
    </div>

    @if($institucion->membresia != "gratuita" and count($ventajas) > 0)
        <h4>Ventajas laborales de tomar este curso</h4>
        <ul>
            @foreach($ventajas as $ventaja)
                <li>{{$ventaja->ventaja}}</li>
            @endforeach
        </ul>
    @endif

    @if($institucion->membresia == "premium")
        <h3>Temario / Contenido del curso</h3>
        <ul>
            @foreach($temario as $tema)
                <li>{{$tema->tema}}</li>
            @endforeach
        </ul>
    @endif

    <div class="datos_ocultos">
        <p>Duración: {{$curso->duracion}}</p>
        <p>Fecha de inicio: {{$curso->fecha_inicio}}</p>
    </div>

    <!--Boton de bloqueo-->
    <button id="{{$curso->bloqueo}}">Quiero más informacion!</button>
    <!--Si el bloqueo es por correo, se muestra el form con JQuery-->
    @if($curso->bloqueo == "correo")
        <div id="bloqueo_correo" style="display:none" class="bloqueo">
            <h3>Ingresa tu correo electrónico para ver más informacion de este curso</h3>
            <form action="" method="GET">
            <input type="text" placeholder="Ingresa tu correo electrónico">
            <input type="button" value="Desbloquear contenido" class="ver_contenido">
        </div>
    <!--Si el bloqueo es por media, muestro boton para compartir-->
    @elseif($curso->bloqueo == "social")
        <div class="bloqueo">
            <button id="bloqueo_social" style="color:blue; display:none;" type="button" >
            Comparte nuestra página con tus amigos!</button>
        </div>
    <!--Si el bloqueo es con login, hago que inicie sesión aquí mismo-->    
    @elseif($curso->bloqueo== "login")
        
        @if(\Auth::guard('alumnos')->user())
            <div id="bloqueo_login_confirm" style="display:none" class="bloqueo">
                <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}">
                <button id="course_registration">Confirma tu interes por más información</button>
            </div>
        @else
        <div id="bloqueo_login" style="display:none" class="bloqueo">
        <h3>Inicia sesión para ver la información completa de este curso</h3>
        <form action="{{route('alumnos.login')}}" method="POST">
        <input type="text" id="usuario" name="usuario" required placeholder="Usuario">
        <input id="password" type="password" name="password" placeholder="Contraseña" required>
        <input type="button" value="Iniciar sesion" class="ver_contenido">
        </form>
        <p>No tienes cuenta? <a href="{{route('alumnos.registro')}}">Crea una aquí</a></p>
        </div>
        @endif
    @endif


    @if($institucion->membresia == "gratuita")
        <div class="datos_ocultos">
    @else
        <div>
    @endif

            <h4>Contacta a la institucion!</h4>
            <h4>Tipo de membresia: {{$institucion->membresia}}</h4>
            <h4>CONTACTO</h4>
            <p>Email: {{$institucion->email}}</p>
            <p>Teléfono: {{$institucion->telefono}}</p>
            <table style="width:100%; text-aling:center;">
                <tr>
                    @if($institucion->facebook)
                    <td><a href="{{$institucion->facebook}}"><img src="{{asset('images/social-media-icons/facebook.png')}}"></a></td>
                    @endif
                    @if($institucion->twitter)
                    <td><a href="{{$institucion->twitter}}"><img src="{{asset('images/social-media-icons/twitter.png')}}"></a></td>
                    @endif
                    @if($institucion->google)
                    <td><a href="{{$institucion->google}}"><img src="{{asset('images/social-media-icons/google.png')}}"></a></td>
                    @endif
                    @if($institucion->pagina_web)
                    <td><a href="{{$institucion->pagina_web}}"><img src="{{asset('images/social-media-icons/web.png')}}"></a></td>
                    @endif
                </tr>
            </table>
        </div>

    <!--Si la membresia no es gratuita, mostrar el mapa-->
    @if($institucion->membresia != "gratuita")
        <div>
            <h3>Aqui iria el mapa</h3>
            <p>Latitud: {{$curso->latitud}}</p>
            <p>LOngitud: {{$curso->longitud}}</p>
        </div>

        <h4>Cursos de la misma subcategoria</h4>
        @if(count($relacionados_sub) > 0)
            <div style="display:inline;">
            @foreach($relacionados_sub as $curso_relacionado)
                @if($curso_relacionado->video == NULL)
                <a href="{{route('cursos.detail',$curso_relacionado->slug)}}"><img src="{{$curso_relacionado->imagenes[0]->ruta}}" alt="" width="100px" height="100px"></a>
                <p>Nombre: {{$curso_relacionado->nombre}}</p>
                @else
                <iframe width="100" height="100" src="{{$curso_relacionado->video}}" frameborder="0" allowfullscreen></iframe>
                <a href="{{route('cursos.detail',$curso_relacionado->slug)}}"><p>Nombre: {{$curso_relacionado->nombre}}</p></a>
                @endif
            @endforeach
            </div>
        @endif

        <h4>Cursos de la misma categoria</h4>
        @if(count($relacionados_cat) > 0)
            <div style="inline">
            @foreach($relacionados_cat as $curso_relacionado)
                <div style="display:inline">
                @if($curso_relacionado->video == NULL)
                <a href="{{route('cursos.detail',$curso_relacionado->slug)}}"><img src="{{$curso_relacionado->imagenes[0]->ruta}}" alt="" width="100px" height="100px"></a>
                <p>Nombre: {{$curso_relacionado->nombre}}</p>
                @else
                <iframe width="100" height="100" src="{{$curso_relacionado->video}}" frameborder="0" allowfullscreen></iframe>
                <a href="{{route('cursos.detail',$curso_relacionado->slug)}}"><p>Nombre: {{$curso_relacionado->nombre}}</p></a>
                @endif
                </div>
            @endforeach
            </div>
        @endif
    @endif
    
    <!-- Si el curso es membresia roja, mostrar cursos que igual imparte el INSTRUCTOR-->
    @if($institucion->membresia == "premium")
        
        @if(count($docentes) > 0)
        @foreach($docentes as $docente)
            <hr>
            <h3>Otros cursos impartidos por {{$docente->nombre}} {{$docente->apellidos}}</h3>
            @foreach($docente->cursos as $cursoo)
                @if($cursoo->id != $curso->id)
                    @if($cursoo->video == NULL)
                    <a href="{{route('cursos.detail',$cursoo->slug)}}"><img src="{{$cursoo->imagenes[0]->ruta}}" alt="" width="100px" height="100px"></a>
                    <p>Nombre: {{$cursoo->nombre}}</p>
                    @else
                    <iframe width="100" height="100" src="{{$cursoo->video}}" frameborder="0" allowfullscreen></iframe>
                    <a href="{{route('cursos.detail',$cursoo->slug)}}"><p>Nombre: {{$cursoo->nombre}}</p></a>
                    @endif
                @endif
            @endforeach
            <hr>
        @endforeach
        @endif
    @endif

    <button type="button">Quiero una promoción!</button>
    <button type="button">Guardar curso</button>

@endsection

<!-- Se hace esta seccion para los script necesarios-->
@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous"></script>
    
    <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '1906769682877351',
        xfbml      : true,
        version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <script>
        $('#correo').click(function(){
            $('#bloqueo_correo').css({'display':'block'});
            $(this).css({'display':'none'});
        });

        $('#social').click(function(){
            $('#bloqueo_social').css({'display':'block'});
            $(this).css({'display':'none'});
        });

        $('#bloqueo_social').click(function(){
            FB.ui({
                method: 'share',
                href: 'https://developers.facebook.com/docs/',
                display: 'popup',
                quote: 'He visto un curso en cursigue!'
                }, function(response){
                    if(response instanceof Array && response != 'undefined')
                    {
                        //alert("Verga");
                        $('.bloqueo').css({'display':'none'});
                        $('.datos_ocultos').css({'display':'block','background-color':'red'});
                    }
                    else
                    {
                        alert("Nel prro");
                    }
                });
        });

        $('#login').click(function(){
            $('#bloqueo_login').css({'display':'block'});
            $('#bloqueo_login_confirm').css({'display':'block'});
            $(this).css({'display':'none'});
        });

        $('.ver_contenido').click(function(){
            $('.bloqueo').css({'display':'none'});
            $('.datos_ocultos').css({'display':'block','background-color':'red'});
        });
        

        $('#course_registration').click(function(){
            var user_id = $('.user_logged_name').data('id');
            var curso_id = $('#curso_name').data('id');
            $.post("/cursos/curso_added", {
                user_id: user_id,
                curso_id: curso_id,
                _token: $('#_token').val()},
                function(data)
                {
                    if(data['status']== "OK")
                    {
                        alert("Ya te envie la info papu");
                    }
                    else if (data['status'] == 'ya')
                    {
                        alert("Ya estas inscrito, pendejo");
                    }
                    else
                    {
                        alert("Algo fallo, intentalo mas tarde");
                    }
                });
        });


    </script>
@endsection