@extends('main.base')
@section('title','CRUD Instituciones')
@section('content')
    @foreach($instituciones as $institucion)
    <p> Institución: {{$institucion->nombre}}</p>
    @endforeach
@endsection