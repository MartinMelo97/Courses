@extends('main.base')

@section('title','Tags Lista')

@section('content')
    <h3>Tags existentes:</h3>
    <ul>
    @foreach($tags as $tag)
        <a href="{{route ('tags.detail',$tag->slug)}}">
        <li>{{$tag->nombre}}</li></a>
    @endforeach
    </ul>
    {!! $tags->render() !!}
@endsection