<div id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    @if (\Request::is('/'))
      <ul class="menu-list">
        <li>
          <a href="{{route('index')}}">
            <img id="logo_white" src="{{ Storage::disk('spaces')->url('website_images/logo_light.png') }}" alt="C230 Consultores logo">
            <img id="logo_dark" src="{{ Storage::disk('spaces')->url('website_images/logo_dark.png') }}" class="is-hidden" alt="C230 Consultores logo">
          </a>
        </li>
        <li><a id="aboutus" href="{{route('aboutus')}}" class="{{ Nav::isRoute('aboutus') }} has-text-white">Quiénes Somos</a></li>
        <li><a id="whatwedo" href="{{route('whatwedo')}}" class="{{ Nav::isRoute('whatwedo') }} has-text-white">Qué Hacemos</a></li>
        <li><a id="vacancies" href="{{route('sitevacancies')}}" class="{{ Nav::isRoute('sitevacancies') }} has-text-white">Vacantes</a></li>
      </ul>
    @else
      <ul class="menu-list">
        <li>
          <a href="{{route('index')}}">
            <img src="{{ Storage::disk('spaces')->url('website_images/logo_dark.png') }}" alt="C230 Consultores logo">
          </a>
        </li>
        <li><a href="{{route('aboutus')}}" class="{{ Nav::isRoute('aboutus') }}">Quiénes Somos</a></li>
        <li><a href="{{route('whatwedo')}}" class="{{ Nav::isRoute('whatwedo') }}">Qué Hacemos</a></li>
        <li><a href="{{route('sitevacancies')}}" class="{{ Nav::isRoute('sitevacancies') }}">Vacantes</a></li>
      </ul>
    @endif
  </aside>
</div>
