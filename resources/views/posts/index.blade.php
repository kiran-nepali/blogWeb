@extends('layout.app')

@section('content')
    <h1 class="index-title">Posts</h1>

    @if(count($posts)>0)
        @foreach ($posts as $post)
                <div class="card p-3 mb-3">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>{{$post->created_at}} by {{$post->user->name??'anonymous'}}</small>
                </div>
        @endforeach  
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection