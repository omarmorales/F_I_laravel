@extends('layouts.site')

@section('content')
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
          </div>
          <div class="column">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
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
              <div class="card-image">
                <a href="{{ asset('storage/files/'. $post->file) }}" target="_blank">
                  <figure class="image is-4by3">
                    <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}">
                  </figure>
                </a>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    @if (App::isLocale('en'))
                      <p class="title is-4">{{ $post->title }}</p>
                      <p class="subtitle is-6"></p>
                    @elseif (App::isLocale('es'))
                      <p class="title is-4">{{ $post->title_es }}</p>
                      <p class="subtitle is-6"></p>
                    @endif
                  </div>
                </div>

                <div class="content">
                  @if (App::isLocale('en'))

                  @elseif (App::isLocale('es'))

                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
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
        }
      });
    }
  </script>
@endsection
