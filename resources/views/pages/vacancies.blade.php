@extends('layouts.site')

@section('content')
  {{-- header fundacion idea starts --}}
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <a href="{{ route('index') }}">
              <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
            </a>
          </div>

          <div class="column is-4">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- header fundacion idea ends --}}

  {{-- vuejs data starts --}}
  <vacancies></vacancies>
  {{-- vuejs data ends --}}
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
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
