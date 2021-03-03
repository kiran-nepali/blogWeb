@extends('layout.app')

@section('content')
    <h1>Create Post</h1> 
    @include('validationMsg')

    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body','Body')}}
            {{Form::textArea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-default'])}}
    {!! Form::close() !!}
@endsection