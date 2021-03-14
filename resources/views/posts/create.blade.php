@extends('layout.app')

@section('content')
    <h1>Create Post</h1> 
    @include('validationMsg')

    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','method'=>'POST','enctype'=>'multipart/form-data','files'=>true]) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textArea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-secondary'])}}
    {!! Form::close() !!}
@endsection