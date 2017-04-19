@extends('main.base')

@section('title')
    {{$institucion->nombre}}
@endsection

@section('content')
    <img src="{{$institucion->imagen->ruta}}" alt="">
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
    <a href="{{route ('instituciones.courses',$institucion->slug)}}">Ir a cursos</a>
@endsection