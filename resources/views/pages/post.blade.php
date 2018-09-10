@extends('layouts.site')

@section('content')
  <div class="container">
    <div class="columns">
      <div class="column">
        <section class="hero">
          <div class="hero-body">
            <div class="columns">
              <div class="column">
                <nav class="breadcrumb m-t-20" aria-label="breadcrumbs">
                  <ul>
                    <li><a href="{{ route('index') }}">Inicio</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ $post->title }}</a></li>
                  </ul>
                </nav>

                <div class="columns">
                  <div class="column is-7">
                    <h2 class="is-size-2 has-text-weight-light">{{ $post->title }}</h2>
                    <hr class="separator m-b-20">
                    <p class="m-b-20">{!! $post->description !!}</p>

                    <a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" class="button is-link is-pulled-right" target="_blank">
                      <span class="icon is-small">
                        <i class="fas fa-download"></i>
                      </span>
                      <span>Descargar</span>
                    </a>
                  </div>
                  <div class="column is-5">
                    <div class="fb-share-button m-b-10" data-href="{{ route('post.show',$post->id) }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2Fposts%2F4&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="columns">
      <div class="column">

      </div>
    </div>
  </div>
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
