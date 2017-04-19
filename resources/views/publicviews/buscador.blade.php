@extends('main.base')

@section('title')
    Resultados de la busqueda
@endsection

@section('content')
    <h1>Resultados de la busqueda de {{$word}}</h1>

    <h2>Categorias encontradas: </h2>
    @if(count($categorias)>0)
        @foreach($categorias as $cat)
            <a href=""><p>{{$cat->nombre}}</p></a>
        @endforeach
    @else
        <p>No hay  categorias</p>
    @endif

    <h2>Subcategorias encontradas: </h2>
    @if(count($subcategorias)>0)
        @foreach($subcategorias as $sub)
            <a href=""><p>{{$sub->nombre}}</p></a>
        @endforeach
    @else
        <p>No hay subcategoria</p>
    @endif

    <h2>Tags encontradas: </h2>
    @if(count($tags)>0)
        @foreach($tags as $tag)
            <a href=""><p>{{$tag->nombre}}</p></a>
        @endforeach
    @else
        <p>Ho hay tags alv</p>
    @endif
    
    <h2>Instituciones encontradas: </h2>
    @if(count($instituciones)>0)
        @foreach($instituciones as $institucion)
            <a href=""><p>{{$institucion->nombre}}</p></a>
        @endforeach
    @else
        <p>No hay instituciones</p>
    @endif

    <h2>Docentes encontradas: </h2>
    @if(count($docentes)>0)
        @foreach($docentes as $doc)
            <a href=""><p>{{$doc->nombre}}</p></a>
        @endforeach
    @else
        <p>No hay docentes</p>
    @endif

    <h2>Cursos encontrados</h2>
    @if(count($cursos)>0)
        @foreach($cursos as $curso)
           <hr>
                <a href="{{route ('cursos.detail', $curso->slug)}}"><div style="background:white;">
                <p>Nombre: {{$curso->nombre}}</p>
                <p>Inicia el: {{$curso->fecha_inicio}}</p>
                <a href="{{route ('instituciones.detail',$curso->institucion->slug)}}"><p>Institución: {{$curso->institucion->nombre}}</p></a>
                <p>Tipo de membresia: {{$curso->institucion->membresia}}</p>
                <h4>Categoria:</h4>
                <p>{{$curso->categoria->nombre}}</p>
                <h4>Subategoria:</h4>
                <p>{{$curso->subcategoria->nombre}}</p>
                <h3>Tags:</h3>
                <p>Tags: 
                @for($i = 0; $i < count($curso->tags); $i++)
                    <a href="{{$curso->tags_slugs[$i]}}"><span> {{$curso->tags[$i]->nombre}}, </span></a>
                @endfor
                </p>
                @if($curso->institucion->membresia == "premium")
                    <h3 style="color:red;">Recomendado</h3>
                @endif
            </div></a>
        @endforeach
    @else
        <p>No hay cursos que coincidan con tu búsqueda :(</p>
    @endif

@endsection