@extends('main.base')
@section('title','Dashboard')
@section('content')
<h1>Bienvenido a tu dashboard admin: {{\Auth::user()->name}}</h1>
<hr style="border-width: 10px"> 
<h3>Cursos añadidos recientemente</h3>
@foreach($cursos as $curso)
    <h3>Nombre: <a href="{{route ('cursos.detail',$curso->slug)}}">{{$curso->nombre}}</h3></a>
        <h5>Institucion: <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}">{{$curso->institucion->nombre}}</a></h5>
        <p>Fecha de Inicio: {{$curso->fecha_inicio}}</p>
        <br><hr><br>
@endforeach
<a href="{{route('cursos.index')}}"><h3>Ir al panel de administracion de los cursos</h3></a>
<hr style="border-width: 10px"> 
<h3>Alumnos registrados recientemente</h3>
@foreach($alumnos as $alumno)
    <a href="{{route('alumnos.perfil',$alumno->usuario)}}"><div><h4>Nombre: {{$alumno->nombre.' '.$alumno->apellidos}}</h4>
    <p>Usuario: {{$alumno->usuario}}</p>
    <p>Correo: {{$alumno->email}}</p></div></a>
    <hr>
@endforeach
<a href="{{route('alumnos.index')}}"><h3>Ir al panel de administracion de los alumnos</h3></a>
<hr style="border-width: 10px"> 
<h3>Instituciones con más cursos</h3>
@foreach($instituciones as $institucion)
    <a href="{{route('instituciones.detail',$institucion->slug)}}"><p>{{$institucion->nombre}}</p></a>
    <a href="{{route('instituciones.courses',$institucion->slug)}}"><p>Número de cursos: {{$institucion->cursos}}</p></a>
    <hr>
@endforeach
<a href="{{route('instituciones.index')}}"><h3>Ir al panel de administracion de las instituciones</h3></a>
<hr style="border-width: 10px"> 
<h3>Categorias con más cursos</h3>
@foreach($categorias as $categoria)
    <a href="{{route('categorias.detail',$categoria->slug)}}"><p>{{$categoria->nombre}}</p>
    <p>Número de cursos: {{$categoria->cursos}}</p></a>
    <hr>
@endforeach
<a href="{{route('categorias.index')}}"><h3>Ir al panel de administracion de las categorias</h3></a>
<hr style="border-width: 10px"> 
<h3>Tags con más cursos</h3>
@foreach($tags as $tag)
    <a href="{{route('tags.detail',$tag->slug)}}"<p>{{$tag->nombre}}</p>
    <p>Número de cursos: {{$tag->cursos}}</p></a>
    <hr>
@endforeach
<a href="{{route('tags.index')}}"><h3>Ir al panel de administracion de los tags</h3></a>

@endsection
