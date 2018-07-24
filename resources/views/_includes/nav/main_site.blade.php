<nav class="navbar is-link is-fixed-top">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Fundacion IDEA logo">
      </a>
      <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
      <div class="navbar-start">
        {{-- <div class="navbar-item has-dropdown is-hoverable">
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
        </div> --}}
      </div>

      <div class="navbar-end">
        <a class="navbar-item" href="{{ route('aboutus') }}">{{ __('Acerca') }}</a>
        <a class="navbar-item" href="{{ route('sitevacancies') }}">{{ __('Vacantes') }}</a>
        {{-- <a class="navbar-item" href="{{ route('login') }}">{{ __('Contacto') }}</a> --}}
        <a class="navbar-item" href="https://www.linkedin.com/company/c230-consultores" target="_blank">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="navbar-item" href="https://twitter.com/FundacionIDEAMX" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
      </div>
    </div>
  </div>
</nav>
