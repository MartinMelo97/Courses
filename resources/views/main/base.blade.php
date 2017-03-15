<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset='UTF-8'>
        <meta content='width=device-width, initial-scale=1.0' name='viewport'>
        <title>Courses | @yield('title', "")</title>
    </head>
    <body>
        <nav>
            <ul style="display: inline-block;">
                <a href="{{route ('main')}}"><li>Inicio</li></a>
                <a href="{{route ('cursos.list')}}"><li>Cursos</li></a>
                <a href="{{route ('categorias.list')}}"><li>Categorias</li></a>
                <a href="{{route ('instituciones.list')}}"><li>Instituciones</li></a>
                <a href="{{route ('tags.list')}}"><li>Tags</li></a>
            </ul>
            <ul style="display: inline-block;">
                @if(\Auth::guard('alumnos')->user())
                    @include('main.nav_alumnos')
                @elseif(\Auth::guard('docentes')->user())
                    @include('main.nav_docentes')
                @elseif(\Auth::check())
                    @include('main.nav_administradores')
                @else
                <a href="{{route ('alumnos.login')}}"><li>Iniciar sesion</li></a>
                <a href="{{route ('alumnos.registro')}}"><li>Registro</li></a>
                <a href="{{route ('docentes.login')}}"><li>Docentes</li></a>
                <a href="{{route ('login')}}"><li>Admin</li></a>
                @endif
            </ul>
        </nav>
        @yield('content','')
        <script
        src="https://code.jquery.com/jquery-3.1.1.js"
        integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous"></script>
        @yield('scripts','')

        <h1>Buscadooooooooooooooooooooooooooooooooooooooooooooooor</h1>
    {!! Form::open(['method'=>'GET','route'=>'buscador', ]) !!}
        {!! Form::text('buscador_txt',null,['class'=>'','require','placeholder'=>'Ingresa una palabra']) !!}
        {!! Form::submit('Buscar!') !!}
    {!! Form::close()!!}
    </body>
</html>