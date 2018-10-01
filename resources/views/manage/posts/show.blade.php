@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('posts.SectionTitle')</a></li>
        <li><a href="{{ route('posts.index') }}">@lang('posts.IndexTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $post->title }}</a></li>
      </ul>
    </nav>

    <h1 class="title">{{ $post->title }}</h1>
    <div class="columns is-multiline">
      <div class="column is-7">
        <p>{!! $post->description !!}</p>

        <a href="{{ Storage::disk('spaces')->url('IDEA/files/'.$post->file) }}" class="button is-link is-pulled-right" target="_blank">
          <span class="icon is-small">
            <i class="fas fa-download"></i>
          </span>
          <span>Descargar</span>
        </a>
        <button class="button is-link is-pulled-right m-r-10"
          @click="isCardModalActive = true">
          <span class="icon is-small">
            <i class="fas fa-plus"></i>
          </span>
          <span>Agregar archivo</span>
        </button>
      </div>
      <div class="column is-5">
        <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}">
      </div>
    </div>

    <div class="columns">
      @if ($post->files_psts->count() > 0)
        <div class="column">
          <h3 class="subtitle">Archivos extra</h3>
          @foreach ($post->files_psts as $extra_file)
            <p>
              <span class="icon is-small">
                <i class="fas fa-file"></i>
              </span>
              <span><a href="#">{{ $extra_file->file }}</a></span>
            </p>
          @endforeach
        </div>
      @endif
    </div>

    <b-tooltip label="Editar publicación" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('posts.edit',$post->id) }}" class="button-float button-round">
        <span class="fas fa-edit"></span>
      </a>
    </b-tooltip>

    <b-modal :active.sync="isCardModalActive" :width="640" scroll="keep">
      <div class="card">
        <form action="{{ route('filespst.store') }}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <header class="card-header">
            <p class="card-header-title">
              Agregar archivo
            </p>
          </header>
          <div class="card-content">
            <div class="field">
              <input type="file" class="input" name="file">
              <input type="hidden" name="post_id" value="{{ $post->id }}">
            </div>
          </div>
          <footer class="modal-card-foot">
            <button class="button is-link">Guardar</button>
          </footer>
        </form>
      </div>
    </b-modal>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
          isCardModalActive: false
        },
      });
    }
  </script>
@endsection
