@extends('main.base')

@section('title','CRUD tags')

@section('content')
    <table>
        <thead>
            <th>Nombre</th>
            <th>Número de cursos</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->nombre}}</td>
                    <td>{{$tag->cursos}}</td>
                    <td>
                        <a href="{{route('tags.edit',$tag->slug)}}"><button type="button">Editar</button></a>
                        <a href="{{route('tags.destroy',$tag->slug)}}"><button 
                        onclick="return confirm('Deseas eliminar a {{$tag->nombre}}?')"type="button">Eliminar</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $tags->render() !!}
@endsection