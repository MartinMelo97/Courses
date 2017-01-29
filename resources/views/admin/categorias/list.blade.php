@extends('main.base')

@section('title','CRUD Categorias')

@section('content')
    <table>
        <thead>
            <th>Nombre</th>
            <th>Número de cursos</th>
            <th>Opciones</th>
        </thead>
        <tbody>
        
        @foreach($categorias as $categoria)
            <tr>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->cursos}}</td>
                <td>
                    <a href="{{route('categorias.edit',$categoria->slug)}}"><button type="button">Editar</button></a>
                    <a href="{{route('categorias.destroy',$categoria->slug)}}"><button 
                    onclick="return confirm('Deseas eliminar a {{$categoria->nombre}}?')"type="button">Eliminar</button></a>
                </td>
            </tr>            
        @endforeach
        
        </tbody>
    </table>
    {!! $categorias->render() !!}
@endsection
