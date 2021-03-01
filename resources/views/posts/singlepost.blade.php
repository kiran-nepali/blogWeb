@extends('layout.app')

@section('content')
    <h1 class="index-title">Posts</h1>
    <br>
    <h2>{{$post->title}}</h2>
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>{{$post->created_at}}</small>
    <hr>

    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-right']) !!}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection