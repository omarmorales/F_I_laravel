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
        </div>
        <div class="column is-5">
          <figure class="image is-4by3">
            <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title_es }}">
          </figure>
        </div>
      </div>

      <div class="columns m-b-20">
        @if ($post->files_psts->count() > 0)
          <div class="column">
            <h3 class="subtitle">Descargar archivos</h3>
            <p>
              <span class="icon is-small">
                <i class="fas fa-file"></i>
              </span>
              <span><a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ $post->file }}</a></span>
            </p>
            @foreach ($post->files_psts as $extra_file)
              <p>
                <form action="{{ action('FilesPstController@destroy', $extra_file->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <span class="icon is-small">
                    <i class="fas fa-file"></i>
                  </span>
                  <span><a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$extra_file->file) }}" target="_blank">{{ $extra_file->file }}</a></span>
                  <span class="icon is-small">
                    <button class="button m-l-20" type="submit">
                      <span class="icon is-small">
                        <i class="fas fa-trash has-text-danger"></i>
                      </span>
                    </button>
                  </span>
                </form>
              </p>
            @endforeach
          </div>
        @else
          <div class="column">
            <h3 class="subtitle">Descargar archivos</h3>
            <p>
              <span class="icon is-small">
                <i class="fas fa-file"></i>
              </span>
              <span><a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" target="_blank">{{ $post->file }}</a></span>
            </p>
          </div>
        @endif
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
