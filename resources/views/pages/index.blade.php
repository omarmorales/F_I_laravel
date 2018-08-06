@extends('layouts.site')

@section('content')
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body js-section" style="margin-top:2em; margin-bottom:1em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <a href="{{ route('index') }}">
              <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
            </a>
          </div>
          <div class="column">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            @include('_includes.forms.search')
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <nav class="level m-t-10">
              @foreach ($tags as $tag)
                <div class="level-item has-text-centered">
                  <div>
                    <a class="heading has-text-white" href="{{ route('index', ['tag' => $tag->id]) }}">{{ $tag->name }}</a>
                  </div>
                </div>
              @endforeach
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="posts">
    <div class="container m-t-30 m-b-30">
      <div class="columns is-multiline">
        @foreach ($posts as $post)
          <div class="column is-4">
            <div class="card">
              <header class="card-header">
                <p style="margin:1em;">
                  @foreach ($post->tags as $tag)
                    <b-tag rounded class="m-b-10">{{ $tag->name }}</b-tag>
                  @endforeach
                  <br>
                  @if (App::isLocale('en'))
                    <span>{{ $post->title }}</span>
                  @elseif (App::isLocale('es'))
                    <span>{{ $post->title_es }}</span>
                  @endif
                </p>
              </header>
              <div class="card-image">
                <a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" alt="{{ $post->file }}" target="_blank">
                  <figure class="image is-4by3">
                    <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}">
                  </figure>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{ $posts->links() }}
    </div>
  </section>
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
