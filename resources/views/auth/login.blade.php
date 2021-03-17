@extends('layout.app')

@section('content')
   <div class="d-flex justify-content-center">
       <div class="jumbotron mt-4">
            <div class="rounded bg-danger text-center w-100 text-light">
                @if(session('status'))
                {{session('status')}}
            @endif
            </div>                
            <form action="{{route('loginPost')}}" method="post">
                @csrf
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
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary text-center">Login</button>
                </div>
            </form>
        </div>

    </div> 
@endsection