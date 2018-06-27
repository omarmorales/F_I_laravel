<div id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <ul class="menu-list">
      <li>
        <a href="{{route('index')}}">
          <img src="{{ Storage::disk('spaces')->url('website_images/logo_dark.png') }}" alt="C230 Consultores logo">
        </a>
      </li>
      <li><a href="{{route('aboutus')}}" class="{{ Nav::isRoute('aboutus') }}">Quiénes Somos</a></li>
      <li><a href="#" class="">Qué Hacemos</a></li>
      <li><a href="#" class="">Vacantes</a></li>
    </ul>
  </aside>
</div>
