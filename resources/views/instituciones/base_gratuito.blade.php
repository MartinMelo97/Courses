<div>
    <style>
        .oculto{
            display:none;
        }
        
    </style>
    <img src="{{$imagenes[0]->ruta}}" alt="" width="500px" height="300px">
    <h3>{{$curso->nombre}} - {{$curso->institucion->nombre}}</h3>
    <h4>DESCRIPCIÓN: {{$curso->descripcion}}</h4>
    <p>Lenguaje: {{$curso->lenguaje}}</p>
    <p>Nivel: {{$curso->nivel}}</p>

    <div class="oculto">
        <p>Fecha de inicio: {{$curso->fecha_inicio}}</p>
        <p>Duración: {{$curso->duracion}}</p>
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
</div>