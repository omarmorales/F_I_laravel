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
      </div>
      <div class="column is-5">
        <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}">
      </div>
    </div>

    <b-tooltip label="Editar publicación" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('posts.edit',$post->id) }}" class="button-float button-round">
        <span class="fas fa-edit"></span>
      </a>
    </b-tooltip>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {

        },
      });
    }
  </script>
@endsection
