@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('posts.SectionTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('posts.IndexTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('posts.IndexTitle')</h1>
    <div class="columns is-multiline">
      @foreach ($posts as $post)
        <div class="column is-4">
          <div class="box">
            <article class="media">
              <div class="media-left">
                <a href="">
                  <figure class="image is-64x64">
                    <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}" alt="{{ $post->name }}">
                  </figure>
                </a>
              </div>
              <div class="media-content">
                @if (App::isLocale('en'))
                  <div class="content">
                    <p class="m-b-5">
                      <strong>{{ $post->title }}</strong>
                    </p>
                    {!! str_limit($post->description,120) !!}
                  </div>
                @elseif (App::isLocale('es'))
                  <div class="content">
                    <p class="m-b-5">
                      <strong>{{ $post->title_es }}</strong>
                    </p>
                    {!! str_limit($post->description_es,120) !!}
                  </div>
                @endif
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a href="{{ route('posts.show',$post->id) }}" class="level-item" aria-label="show">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-eye" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a href="{{ route('posts.edit',$post->id) }}" class="level-item" aria-label="edit">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-edit" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a class="level-item toggle-modal" aria-label="delete" v-on:click="isActive{{ $post->id }} = !isActive{{ $post->id }}">
                      <span class="icon is-small has-text-danger">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </span>
                    </a>
                  </div>
                  <div class="level-right">
                    @if ($post->public == "true")
                      <span class="tag"><i class="fas fa-globe m-r-5"></i>@lang('posts.public_txt')</span>
                    @else
                      <span class="tag"><i class="fas fa-lock m-r-5"></i>@lang('posts.private')</span>
                    @endif
                  </div>
                </nav>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>

    {{ $posts->links() }}

    <b-tooltip label="@lang('posts.createTxt')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('posts.create') }}" class="button-float button-round">
        <span class="fas fa-plus"></span>
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
          @foreach ($posts as $post)
            isActive{{ $post->id }}: false,
          @endforeach
        },
      });
    }
  </script>
@endsection
