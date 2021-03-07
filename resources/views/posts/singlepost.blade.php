@extends('layout.app')

@section('content')
    <h1 class="index-title">Posts</h1>
    <br>
    <h2>{{$post->title}}</h2>
    <small>{{$post->created_at}}  by {{$post->user->name}}</small>
    <br>
    <div>
        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
        {!!$post->body!!}
    </div>
    <hr>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-right']) !!}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection