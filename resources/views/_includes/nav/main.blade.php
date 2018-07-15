<nav class="navbar is-link is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}" alt="C230 Consultores logo">
    </a>
    @if (Request::segment(1) == "manage")
      <a class="navbar-item is-hidden-desktop" id="admin-slideout-button">
        <span class="icon"><i class="fas fa-angle-right"></i></span>
      </a>
    @endif
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          {{ config('languages')[app()->getLocale()] }}
        </a>

        <div class="navbar-dropdown">
          @foreach (config('languages') as $lang => $language)
              @if ($lang !== app()->getLocale())
                <a href="{{ route('lang.switch', $lang) }}" class="navbar-item">
                  {{$language}}
                </a>
              @endif
          @endforeach
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <!-- Authentication Links -->
      @guest
        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
        {{-- <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
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
