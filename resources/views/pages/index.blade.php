@extends('layouts.site')

@section('headers')
  <meta name="description" content="Fundación IDEA es uno de los primeros think tanks de política pública en México.">
  <title>Fundación IDEA | think tank de política pública</title>
@endsection

@section('content')

  <posts></posts>

  <b-tooltip label="Volver al inicio" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
    <a id="js-btn" class="button-float button-round">
      <span class="fas fa-angle-up"></span>
    </a>
  </b-tooltip>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
          tag: 0
        }
      });

      function scrollIt(element) {
      window.scrollTo({
        'behavior': 'smooth',
        'left': 0,
        'top': element.offsetTop
      });
    }

    const btn = document.getElementById('js-btn');
    const section = document.querySelector('.js-section');

    btn.addEventListener('click', function() {
      scrollIt(section);
    });
    }
  </script>
@endsection
