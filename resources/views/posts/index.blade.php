@extends('layout.app')

@section('content')
    <h1 class="index-title">Posts</h1>

    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="box1">
                <div class="box1-content">
                    <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <small>{{$post->created_at}}</small>
                </div>
            </div>
        @endforeach  
    @else
        <p>No posts found</p>
    @endif
@endsection