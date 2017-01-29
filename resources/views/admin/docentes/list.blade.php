@extends('main.base')

@section('title','CRUD Docentes')

@section('content')
    <table style="border: 1px solid black; text-align:center; width:100%;">
        <thead style="border: 1px solid black">
            <th>Nombre Completo</th>
            <th>Usuario</th>
            <th>Email</th>
            <th>Institucion</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($docentes as $docente)
                <tr>
                    <td>{{$docente->nombre}} {{$docente->apellidos}}</td>
                    <td>{{$docente->usuario}}</td>
                    <td>{{$docente->email}}</td>
                    <td>{{$docente->institucion->nombre}}</td>
                    <td>
                        <a href="{{route('docentes.edit',$docente->usuario)}}"><button type="button">Editar</button></a>
                        <a href="{{route('docentes.destroy',$docente->usuario)}}"><button 
                        onclick="return confirm('Deseas eliminar a {{$docente->nombre}}?')"type="button">Eliminar</button></a>
                    </td>
                </tr>
                <tr></tr><tr></tr><tr></tr>
            @endforeach
        </tbody>
    </table>


    {!! $docentes->render() !!}
@endsection