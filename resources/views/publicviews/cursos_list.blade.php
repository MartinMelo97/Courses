@extends('main.base')

@section('title','Lista Cursos')

@section('content')
    @if(count($cursos)>0)
        @foreach($cursos as $curso)
            @extends('main.courses')
        @endforeach
    @else
        <p>No hay cursos que coincidan con tu búsqueda :(</p>
    @endif
        
@endsection