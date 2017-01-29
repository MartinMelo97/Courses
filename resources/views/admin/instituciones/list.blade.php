@extends('main.base')
@section('title','CRUD Instituciones')
@section('content')
    <table style="border: 1px solid black; text-align:center;">
        <thead style="border: 1px solid black">
            <th >Nombre</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Membresia</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($instituciones as $institucion)
                <tr>
                    <td>{{$institucion->nombre}}</td>
                    <td>{{$institucion->email}}</td>
                    <td>{{$institucion->direccion}}, {{$institucion->estado}}</td>
                    <td>{{$institucion->membresia}}</td>
                    <td>
                        <a href="{{route('instituciones.edit',$institucion->slug)}}"><button type="button">Editar</button></a>
                        <a href="{{route('instituciones.destroy',$institucion->slug)}}"><button 
                        onclick="return confirm('Deseas eliminar a {{$institucion->nombre}}?')"type="button">Eliminar</button></a>
                    </td>
                </tr>
                <tr></tr><tr></tr><tr></tr>
            @endforeach
        </tbody>
    </table>

    {!! $instituciones->render() !!}
@endsection