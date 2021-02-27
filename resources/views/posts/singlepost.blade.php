@extends('layout.app')

@section('content')
    <h1 class="index-title">Posts</h1>
    <br>
    <h2>{{$post->title}}</h2>
    <br>
    <div>
        {{$post->body}}
    </div>
    <hr>
    <small>{{$post->created_at}}</small>
@endsection