@extends('main.base')

@section('title')
    {{$curso->nombre}}
@endsection

@section('content')
    @if($curso->membresia == "gratuita")
        @include('cursos.base_gratuito')
    @elseif($curso->membresia == "extraordinaria")
        @include('cursos.base_extraordinaria')
    @elseif($curso->membresia == "premium")
        @include('cursos.base_premium')
    @endif
    <button>Quiero más informacion!</button>
    <h4>Contacta a la institucion!</h4>
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
    @if($curso->membresia != "gratuita")
    <div>
    <h3>Aqui iria el mapa</h3>
    <p>Latitud: {{$curso->latitud}}</p>
    <p>LOngitud: {{$curso->longitud}}</p>
    </div>
    @endif
    @if($curso->membresia == "premium")
        <h3>Otros cursos de la institucion</h3>
        @for($i = 0; $i < 3; $i++)
            <a href="{{route('cursos.detail',$institucion->cursos[$i]->slug)}}"><img src="{{$institucion->cursos[$i]->media}}" alt="" width="100px" height="100px"></a>
            <p>{{$institucion->cursos[$i]->nombre}}</p>
        @endfor
        <hr>
    @endif
    <h4>Cursos relacionados</h4>
    @foreach($relacionados as $curso_relacionado)
        @if(strpos($curso_relacionado->media, 'youtube') == false)
        <a href="{{route('cursos.detail',$curso_relacionado->slug)}}"><img src="{{$curso_relacionado->media}}" alt="" width="100px" height="100px"></a>
        <p>Nombre: {{$curso_relacionado->nombre}}</p>
        @else
        <iframe width="100" height="100" src="{{$curso_relacionado->media}}" frameborder="0" allowfullscreen></iframe>
        <a href="{{route('cursos.detail',$curso_relacionado->slug)}}"><p>Nombre: {{$curso_relacionado->nombre}}</p></a>
        @endif
    @endforeach
@endsection