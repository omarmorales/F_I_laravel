@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('posts.SectionTitle')</a></li>
        <li><a href="{{ route('posts.index') }}">@lang('posts.IndexTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('posts.CreateTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('posts.createTxt')</h1>
    <form action="{{ route('tags.store') }}" method="POST">
      {{csrf_field()}}

      <div class="columns is-multiline">
        <div class="column is-12">
          <b-tabs type="is-boxed">
            <b-tab-item>
              <template slot="header">
                <span>
                  <img src="{{ Storage::disk('spaces')->url('website_images/flags/4x3/us.svg') }}" style="max-width:20px;">
                </span>
                <span> English </span>
              </template>

              <div class="field">
                <p class="control">
                  <label for="name" class="label">Name</label>
                  <input type="text" class="input" name="name" value="{{old('name')}}" id="name">
                </p>
              </div>

            </b-tab-item>
            <b-tab-item>
              <template slot="header">
                <span>
                  <img src="{{ Storage::disk('spaces')->url('website_images/flags/4x3/mx.svg') }}" style="max-width:20px;">
                </span>
                <span> Español</span>
              </template>

              <div class="field">
                <p class="control">
                  <label for="name_es" class="label">Nombre</label>
                  <input type="text" class="input" name="name_es" value="{{old('name_es')}}" id="name_es">
                </p>
              </div>

            </b-tab-item>
          </b-tabs>
        </div>
      </div>
      <b-tooltip label="@lang('posts.submit')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
        <button href="{{ route('tags.create') }}" class="button-float button-round" style="border-width:0px; border-style:none;">
          <span class="fas fa-save"></span>
        </button>
      </b-tooltip>
    </form>
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
