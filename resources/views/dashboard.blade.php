@extends('layout.app')
@section('content')
   <div class="card mt-3 text-center">
      <div class="card-header">
         <h3>Dashboard</h3> 
      </div>
      <div class="card-body">
      <h5 class="card-title">You're logged in !!</h5>
      <p class="card-text">Create Your New Post here</p>
      <a href="/posts/create" class="btn btn-primary" style="width: 14rem;">Create</a>
      </div>
      <div class="card-footer text-muted">
      </div>
   </div>
   <br>
   <br>
   <hr>
   <div class="d-flex justify-content-center mt-10rem">
      <table class="table  table-striped table-hover text-center" style="width:25rem;">
         <thead>
            <tr>
               <th scope="col">Title</th>
            </tr>
         </thead>
         <tbody>
            @if($posts->count())
               @foreach($posts as $post)
               <tr>
                  <td>{{$post->title}}</td>
                  <td><a href="/posts/{{$post->id}}/edit"><i class="fas fa-user-edit"></i></a>
                  </td>
                  <td>{!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id],'method'=>'DELETE','class'=>'float-right']) !!}
                     {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm'] )  }}
                     {!! Form::close() !!}</td>
               </tr>
               @endforeach
            @else
               <h4>There are no post</h4>
            @endif
         </tbody>
       </table>
   </div>   
@endsection