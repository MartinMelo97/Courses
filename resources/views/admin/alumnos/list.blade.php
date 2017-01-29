@extends('main.base')

@section('title','CRUD Alumnos')

@section('content')
    <h2>Alumnos</h2>
    <table>
        <thead>
            <th>Nombre Completo</th>
            <th>Usuario</th>
            <th>email</th>
            <th>No. de cursos</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td><a href="{{route('alumnos.show',$alumno->usuario)}}">{{$alumno->nombre}} {{$alumno->apellidos}}</a></td>
                    <td>{{$alumno->apellidos}}</td>
                    <td>{{$alumno->email}}</td>
                    <td>{{$alumno->cursos}} <a href="{{route('alumnos.show',$alumno->usuario)}}">Ver cursos</a> </td>
                    <td>
                        <a href="{{route('alumnos.destroy',$alumno->usuario)}}"><button 
                        onclick="return confirm('Deseas eliminar a {{$alumno->nombre}} {{$alumno->apellidos}}?')"type="button">Eliminar</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $alumnos->render() !!}
@endsection