
@extends('layout.app')

@section('content')
   <div class="d-flex justify-content-center">
       <div class="jumbotron mt-4">

            <form action="{{route('registerPost')}}" method="post">
                @csrf
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control form-control-lg @error('name')border border-danger @enderror" id="name" aria-describedby="name" placeholder="Your name" value={{old('name')}}>
                    @error('name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control form-control-lg @error('username')border border-danger @enderror" id="username" placeholder="Username" value={{old("username")}}>
                    @error('username')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control form-control-lg @error('email')border border-danger @enderror" id="email" placeholder="Email" value={{old("email")}}>
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg @error('password')border border-danger @enderror" id="password" placeholder="Password">
                    @error('password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password again</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation')border border-danger @enderror" id="password_confirmation" placeholder="Repeat your password">
                    @error('password_confirmation')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

        </div>

    </div> 
@endsection
