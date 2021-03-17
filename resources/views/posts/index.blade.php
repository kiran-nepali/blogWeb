@extends('layout.app')

@section('content')
    <h1 class="index-title m-4">Posts</h1>

    @if(count($posts)>0)
        @foreach ($posts as $post)
                <div class="card p-3 mb-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                        </div>
                        <div class="col-md-8 col-sm-8"> 
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>{{$post->created_at}} by {{$post->user->name??'anonymous'}}</small>
                        </div>
                    </div>                    
                </div>
        @endforeach  
        <div class="d-flex justify-content-center">{{$posts->links()}}</div>
    @else
        <p>No posts found</p>
    @endif
@endsection