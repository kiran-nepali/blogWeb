<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">{{config('app.name')}}</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts" >Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts/create" >Add Post</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
      @auth
      <li class="nav-item">
        <a href="#" class="nav-link">{{Auth::user()->username}}</a>
      </li>
      <li class="nav-item">
        <form action="{{route('logout')}}" method="post" class="inline">
          @csrf
            <button type="submit" class="p-2 btn btn-outline-* text-light">Logout</button>
        </form>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a href="{{route('login')}}" class="nav-link">Login</a>
      </li>
      <li class="nav-item">
        <a href="{{route('register')}}" class="nav-link">Register</a>
      </li>
      @endguest
    </ul>
    
  </div>
</nav>

  

  