@extends('main.base')
@section('title','CRUD Cursos')
@section('content')
    <table style="border: 1px solid black; text-align:center;">
        <thead style="border: 1px solid black">
            <th>Nombre</th>
            <th>Institución</th>
            <th>Categoria</th>
            <th>Subategoria</th>
            <th>Docente(s)</th>
            <th>No. Alumnos</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{$curso->nombre}}</td>

                    <td>{{$curso->institucion->nombre}}</td>

                    <td>{{$curso->categoria->nombre}}</td>
                    <td>{{$curso->subcategoria->nombre}}</td>

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