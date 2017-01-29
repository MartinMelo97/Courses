@extends('main.base')
@section('title','CRUD Cursos')
@section('content')
    <table style="border: 1px solid black; text-align:center;">
        <thead style="border: 1px solid black">
            <th>Nombre</th>
            <th>Institución</th>
            <th>Categoria(s)</th>
            <th>Tag(s)</th>
            <th>Docente(s)</th>
            <th>No. Alumnos</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{$curso->nombre}}</td>

                    <td>{{$curso->institucion->nombre}}</td>

                    <td>
                        @foreach($curso->categorias as $categoria)
                            <span>{{$categoria->nombre}}, </span>
                        @endforeach
                    </td>

                    <td>
                        @foreach($curso->tags as $tag)
                            <span>{{$tag->nombre}}, </span>
                        @endforeach
                    </td>

                    <td>
                        @foreach($curso->docentes as $docente)
                            <span>{{$docente->usuario}}, </span>
                        @endforeach
                    </td>

                    <td>{{$curso->alumnos}}</td>

                    <td>
                        <a href="{{route('cursos.edit',$curso->slug)}}"><button type="button">Editar</button></a>
                        <a href="{{route('cursos.destroy',$curso->slug)}}"><button 
                        onclick="return confirm('Deseas eliminar a {{$curso->nombre}}?')"type="button">Eliminar</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $cursos->render()!!}
@endsection