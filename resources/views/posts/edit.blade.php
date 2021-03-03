@extends('layout.app')

@section('content')
    <h1>Edit Post</h1> 
    @include('validationMsg')

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$post->id],'method'=>'PUT']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textArea('body',$post->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-default'])}}
    {!! Form::close() !!}
@endsection