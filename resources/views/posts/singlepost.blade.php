@extends('layout.app')

@section('content')    
<div class="d-flex justify-content-center m-4">
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div class="mr-4">
                <a href="/posts/{{$post->id}}/edit"><i class="fas fa-user-edit fa-3x" title="Click to edit Post"></i></a>
            </div>
            <div class="ml-4">
                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-right']) !!}
                {{ Form::button('<i class="fa fa-trash-alt fa-3x" title="Click to delete Post"></i>', ['type' => 'submit', 'class' => 'btn btn-sm'] )  }}
                {!! Form::close() !!}
            </div>            
        @endif
    @endif
</div>

<div class="card mt-3">    
    <div class="text-center m-3">
        <img
        style="width:60%"      
        src="/storage/cover_images/{{$post->cover_image}}"
        class="card-img-top text-center"
        alt="..."
      />
    </div>
    
    <div class="card-body">
      <h2 class="card-title">{{$post->title}}</h5>
      <p class="card-text">
        {!!$post->body!!}
      </p>
      <p class="card-text">
        <small class="text-muted">{{$post->created_at}}  by {{$post->user->name}}</small>
      </p>
    </div>
    <hr>
    <hr>
    
  </div>
  @endsection
