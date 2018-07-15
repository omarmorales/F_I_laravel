<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="apple-touch-icon" sizes="152x152" href="{{ Storage::disk('spaces')->url('website_images/logos/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ Storage::disk('spaces')->url('website_images/logos/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ Storage::disk('spaces')->url('website_images/logos/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ Storage::disk('spaces')->url('website_images/logos/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ Storage::disk('spaces')->url('website_images/logos/safari-pinned-tab.svg') }}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Scripts -->
  <script src="{{ asset('js/site.js') }}" defer></script>
  @yield('scripts')

  <!-- Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/site.css') }}" rel="stylesheet">
  @yield('styles')
</head>
<body>
  <div id="overlay">
    <div class="spinner"></div>
  </div>
  @include('_includes.nav.main_site')
  <div id="app">
    <main class="">
      @include('_includes.notifications.messages_site')
      @yield('content')
    </main>
    @include('_includes.nav.footer_site')
  </div>
  <script type="text/javascript" defer>
    var overlay = document.getElementById("overlay");

    window.addEventListener('load', function(){
      overlay.style.display = 'none';
    })
  </script>
</body>
</html>
