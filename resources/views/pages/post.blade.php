@extends('layouts.site')

@section('content')
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
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
      </div>
    </div>
  </section>
  <section id="post">
    <div class="container">
      <nav class="breadcrumb m-t-20" aria-label="breadcrumbs">
        <ul>
          <li><a href="{{ route('index') }}">Inicio</a></li>
          <li class="is-active"><a href="#" aria-current="page">{{ $post->title_es }}</a></li>
        </ul>
      </nav>
      <div class="columns">
        <div class="column is-7">
          <h2 class="is-size-2 has-text-weight-light">{{ $post->title_es }}</h2>
          <hr class="separator m-b-20">
          <p class="m-b-20">{!! $post->description_es !!}</p>

          <a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" class="button is-link is-pulled-right m-b-20" target="_blank">
            <span class="icon is-small">
              <i class="fas fa-download"></i>
            </span>
            <span>Descargar</span>
          </a>
        </div>
        <div class="column is-5">
          <div class="fb-share-button is-pulled-right m-b-10 is-hidden-touch" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
          <figure class="image is-4by3">
            <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title_es }}">
          </figure>
        </div>
      </div>
    </div>
  </section>
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
