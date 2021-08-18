<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">

    <a class="navbar-brand" href="{{ url('/home') }}">Todo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="mr-auto">
        @if (Route::has('login'))
          @auth
              <a href="{{ url('profile/edit') }}" class="m-5">{{ auth()->user()->name }}</a>
              <a href="{{ route('logout') }}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          @else
              <a href="{{ route('login') }}" class="m-5">Login</a>
              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="">Register</a>
              @endif
          @endauth
        @endif 
    </div>
  </div>
</nav>
