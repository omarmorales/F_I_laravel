@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('vacancies.SectionTitle')</a></li>
        <li><a href="{{ route('vacancies.index') }}">@lang('vacancies.IndexTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('vacancies.CreateTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('vacancies.createTxt')</h1>
    <form action="{{ route('vacancies.store') }}" method="POST">
      {{csrf_field()}}

      <div class="columns is-multiline">
        <div class="column">
          <div class="field">
              <label class="label">@lang('vacancies.public')</label>
              <input type="hidden" :value="isPublic" name="public">
              <b-dropdown v-model="isPublic" class="m-b-10">
                <button class="button is-info" type="button" slot="trigger">
                  <template v-if="isPublic">
                    <i class="fas fa-globe m-r-5"></i>
                    <span class="m-r-5">@lang('vacancies.public_txt')</span>
                  </template>
                  <template v-else>
                    <i class="fas fa-lock m-r-5"></i>
                    <span class="m-r-5">@lang('vacancies.private')</span>
                  </template>
                  <i class="fas fa-caret-down"></i>
                </button>

                <b-dropdown-item :value="true">
                  <div class="media">
                    <i class="fas fa-globe m-r-5 m-t-5"></i>
                    <div class="media-content">
                      <h3>@lang('vacancies.public_txt')</h3>
                      <small>@lang('vacancies.public_desc')</small>
                    </div>
                  </div>
                </b-dropdown-item>

                <b-dropdown-item :value="false">
                  <div class="media">
                    <i class="fas fa-lock m-r-5 m-t-5"></i>
                    <div class="media-content">
                      <h3>@lang('vacancies.private')</h3>
                      <small>@lang('vacancies.private_desc')</small>
                    </div>
                  </div>
                </b-dropdown-item>
              </b-dropdown>
          </div>
        </div>

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

              <div class="field">
                <label for="requirements" class="label">Requirements</label>
                <div class="control">
                 <textarea class="textarea" name="requirements" id="requirements">{{old('requirements')}}</textarea>
               </div>
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
                  <label for="name_es" class="label">Nombre</label>
                  <input type="text" class="input" name="name_es" value="{{old('name_es')}}" id="name_es">
                </p>
              </div>

              <div class="field">
                <label for="requirements_es" class="label">Requisitos</label>
                <div class="control">
                 <textarea class="textarea" name="requirements_es" id="requirements_es">{{old('requirements_es')}}</textarea>
               </div>
              </div>

              <div class="field">
                <p class="control">
                  <label for="description_es" class="label">Descripción</label>
                  <textarea class="textarea" id="description_es" name="description_es">{{old('description_es')}}</textarea>
                </p>
              </div>
            </b-tab-item>
          </b-tabs>
        </div>
      </div>

      <b-tooltip label="@lang('vacancies.submit')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
        <button href="{{ route('applications.create') }}" class="button-float button-round" style="border-width:0px; border-style:none;">
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
        isPublic: true
      }
    });

    $('#requirements').summernote({
      placeholder: 'Add requirements for this vacancy',
      tabsize: 2,
      height: 100
    });

    $('#description').summernote({
      placeholder: 'Add description for this vacancy',
      tabsize: 2,
      height: 100
    });

    $('#requirements_es').summernote({
      placeholder: 'Agrega una descripción para este miembro del personal',
      tabsize: 2,
      height: 100
    });

    $('#description_es').summernote({
      placeholder: 'Agrega una descripción para este miembro del personal',
      tabsize: 2,
      height: 100
    });
  }
  </script>
@endsection
