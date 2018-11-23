@extends('layouts.site')

@section('headers')
  <meta name="description" content="Descripción de la publicación">
  <title>Fundación IDEA | {{ $post->title_es }}</title>
@endsection

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
      <nav class="breadcrumb m-t-20 is-hidden-touch" aria-label="breadcrumbs">
        <ul>
          <li><a href="{{ route('index') }}">Inicio</a></li>
          <li class="is-active"><a href="#" aria-current="page">{{ $post->title_es }}</a></li>
        </ul>
      </nav>

      <div class="m-t-75 is-hidden-desktop"></div>

      <h2 class="is-size-2-desktop is-size-4-touch has-text-weight-light">{{ $post->title_es }}</h2>
      <hr class="separator m-b-20">

      <div class="tile is-ancestor">
        <div class="tile is-vertical is-12">
          <div class="tile">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child notification">
                <span class="m-b-20 is-marginless">{!! $post->description_es !!}</span>
              </article>
              <article class="tile is-child notification">
                @if ($post->files_psts->count() > 0)
                  <h3 class="subtitle">Descargar archivos</h3>
                  <p>
                    <span class="icon is-small">
                      <i class="fas fa-file"></i>
                    </span>
                    <span>
                      <a class="is-hidden-desktop" href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ str_limit($post->file, $limit = 25, $end = '...') }}</a>
                      <a class="is-hidden-touch" href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ $post->file }}</a>
                    </span>
                  </p>
                  @foreach ($post->files_psts as $extra_file)
                    <p>
                      <form action="{{ action('FilesPstController@destroy', $extra_file->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <span class="icon is-small">
                          <i class="fas fa-file"></i>
                        </span>
                        <span>
                          <a class="is-hidden-desktop" href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ str_limit($extra_file->file, $limit = 25, $end = '...') }}</a>
                          <a class="is-hidden-touch" href="{{ Storage::disk('spaces')->url('IDEA/files/'.$extra_file->file) }}" target="_blank">{{ $extra_file->file }}</a>
                        </span>
                      </form>
                    </p>
                  @endforeach
                @else
                  @if ($post->file != "noimage.jpg")
                    <h3 class="subtitle">Descargar archivos</h3>
                    <p>
                      <span class="icon is-small">
                        <i class="fas fa-file"></i>
                      </span>
                      <span>
                        <a class="is-hidden-desktop" href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ str_limit($post->file, $limit = 25, $end = '...') }}</a>
                        <a class="is-hidden-touch" href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ $post->file }}</a>
                      </span>
                    </p>
                  @else

                  @endif
                @endif
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child notification">

                <figure class="image is-4by3">
                  <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}">
                </figure>
              </article>
            </div>
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
