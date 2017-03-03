@extends('main.base')

@section('title','CRUD Subcategorias')

@section('content')
    <table>
        <thead>
            <th>Nombre</th>
            <th>Número de cursos</th>
            <th>Categoria</th>
            <th>Opciones</th>
        </thead>
        <tbody>
        
        @foreach($subcategorias as $subcategoria)
            <tr>
                <td>{{$subcategoria->nombre}}</td>
                <td>{{$subcategoria->cursos}}</td>
                <td>{{$subcategoria->categoria->nombre}}</td>
                <td>
                    <a href="{{route('subcategorias.edit',$subcategoria->slug)}}"><button type="button">Editar</button></a>
                    <a href="{{route('subcategorias.destroy',$subcategoria->slug)}}"><button 
                    onclick="return confirm('Deseas eliminar a {{$subcategoria->nombre}}?')"type="button">Eliminar</button></a>
                </td>
            </tr>            
        @endforeach
        
        </tbody>
    </table>
    {!! $subcategorias->render() !!}
@endsection
