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
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="columns is-multiline">
        <div class="column is-12">
          @if (App::isLocale('en'))
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
                    <label for="title" class="label">@lang('posts.title')</label>
                    <input type="text" class="input" name="title" value="{{old('title')}}" id="title">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="description" class="label">Description</label>
                    <textarea class="textarea" id="description" name="description">{{old('description')}}</textarea>
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
                    <label for="title_es" class="label">Título</label>
                    <input type="text" class="input" name="title_es" value="{{old('title_es')}}" id="title_es">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="description_es" class="label">Descripción</label>
                    <textarea class="textarea" id="description_es" name="description_es">{{old('description_es')}}</textarea>
                  </p>
                </div>

              </b-tab-item>
            </b-tabs>
          @else
            <b-tabs type="is-boxed">
              <b-tab-item>
                <template slot="header">
                  <span>
                    <img src="{{ Storage::disk('spaces')->url('website_images/flags/4x3/mx.svg') }}" style="max-width:20px;">
                  </span>
                  <span> Español</span>
                </template>

                <div class="field">
                  <p class="control">
                    <label for="title_es" class="label">Título</label>
                    <input type="text" class="input" name="title_es" value="{{old('title_es')}}" id="title_es">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="description_es" class="label">Descripción</label>
                    <textarea class="textarea" id="description_es" name="description_es">{{old('description_es')}}</textarea>
                  </p>
                </div>

              </b-tab-item>

              <b-tab-item>
                <template slot="header">
                  <span>
                    <img src="{{ Storage::disk('spaces')->url('website_images/flags/4x3/us.svg') }}" style="max-width:20px;">
                  </span>
                  <span> English </span>
                </template>

                <div class="field">
                  <p class="control">
                    <label for="title" class="label">@lang('posts.title')</label>
                    <input type="text" class="input" name="title" value="{{old('title')}}" id="title">
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <label for="description" class="label">Description</label>
                    <textarea class="textarea" id="description" name="description">{{old('description')}}</textarea>
                  </p>
                </div>

              </b-tab-item>
            </b-tabs>
          @endif
        </div>

        <div class="column is-6">
          <div class="field">
            <label for="publication_date" class="label">@lang('posts.publication_date')</label>
            <input type="date" id="publication_date" name="publication_date" class="input">
          </div>
        </div>

        <div class="column is-6">
          <div class="field">
            <label class="label">@lang('posts.public')</label>
            <input type="hidden" :value="isPublic" name="public">
            <b-dropdown v-model="isPublic" class="m-b-10">
              <button class="button is-info" type="button" slot="trigger">
                <template v-if="isPublic">
                  <i class="fas fa-globe m-r-5"></i>
                  <span class="m-r-5">@lang('posts.public_txt')</span>
                </template>
                <template v-else>
                  <i class="fas fa-lock m-r-5"></i>
                  <span class="m-r-5">@lang('posts.private')</span>
                </template>
                <i class="fas fa-caret-down"></i>
              </button>

              <b-dropdown-item :value="true">
                <div class="media">
                  <i class="fas fa-globe m-r-5 m-t-5"></i>
                  <div class="media-content">
                    <h3>@lang('posts.public_txt')</h3>
                    <small>@lang('posts.public_desc')</small>
                  </div>
                </div>
              </b-dropdown-item>

              <b-dropdown-item :value="false">
                <div class="media">
                  <i class="fas fa-lock m-r-5 m-t-5"></i>
                  <div class="media-content">
                    <h3>@lang('posts.private')</h3>
                    <small>@lang('posts.private_desc')</small>
                  </div>
                </div>
              </b-dropdown-item>
            </b-dropdown>
          </div>
        </div>

        <div class="column is-6">
          <label class="label">@lang('posts.thumbnail')</label>
          <input class="input" type="file" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}">
        </div>

        <div class="column is-6">
          <label class="label">@lang('posts.file')</label>
          <input class="input" type="file" name="file" id="file" value="{{old('file')}}">
        </div>
        <div class="column is-12">
          <input type="hidden" :value="tagsSelected" name="tags">
          <label class="label"> Post's Tags</label>
          <section>
            @foreach ($tags as $tag)
              <div class="field">
                  <b-checkbox v-model="tagsSelected" :native-value="{{$tag->id}}">{{$tag->name}}</b-checkbox>
              </div>
            @endforeach
          </section>
        </div>
        <div class="column">

        </div>
      </div>
      <b-tooltip label="@lang('posts.submit')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
        <button href="{{ route('posts.create') }}" class="button-float button-round" style="border-width:0px; border-style:none;" @click="openLoading">
          <span class="fas fa-save"></span>
        </button>
      </b-tooltip>
    </form>
  </div>
  <b-loading :is-full-page="isFullPage" :active.sync="isLoading" :can-cancel="true"></b-loading>
@endsection

@section('scripts')
  <script type="text/javascript">
  window.onload = function() {
    const app = new Vue({
      el: '#app',
      data: {
        isLoading: false,
        isFullPage: true,
        isPublic: true,
        tagsSelected: [{!! old('tags') ? old('tags') : '' !!}]
      },
      methods: {
        openLoading() {
          this.isLoading = true
        }
      }
    });

    $('#description_es').summernote({
      placeholder: 'Agrega una descripción para este miembro del personal',
      tabsize: 2,
      height: 100
    });

    $('#description').summernote({
      placeholder: 'Add description for staff member',
      tabsize: 2,
      height: 100
    });
  }
  </script>
@endsection
