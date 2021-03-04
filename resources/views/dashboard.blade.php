@extends('layout.app')
@section('content')
   <div class="card mt-3 text-center">
      <div class="card-header">
         <h3>Dashboard</h3> 
      </div>
      <div class="card-body">
      <h5 class="card-title">You're logged in !!</h5>
      <p class="card-text">Create Your Post here</p>
      <a href="/posts/create" class="btn btn-primary" style="width: 14rem;">Create</a>
      </div>
      <div class="card-footer text-muted">
      </div>
   </div>


@endsection