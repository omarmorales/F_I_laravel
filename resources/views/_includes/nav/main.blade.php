<nav class="navbar is-primary">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/') }}">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{ url('/') }}">Home</a>
    </div>

    <div class="navbar-end">
      <!-- Authentication Links -->
      @guest
        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
      @else
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>
          <div class="navbar-dropdown is-boxed">
            <a class="navbar-item" href="{{ route('manage.dashboard') }}">Manage</a>
            <hr class="navbar-divider">
            <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      @endguest
    </div>
  </div>
</nav>
