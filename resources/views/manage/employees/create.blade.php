@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('employees.SectionTitle')</a></li>
        <li><a href="{{ route('employees.index') }}">@lang('employees.IndexTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('employees.CreateTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('employees.createTxt')</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="columns is-multiline">
        <div class="column is-12">
          <div class="field">
            <p class="control">
              <label for="name" class="label">@lang('employees.name')</label>
              <input type="text" class="input" name="name" value="{{old('name')}}" id="name">
            </p>
          </div>

          <b-tabs type="is-boxed">
            <b-tab-item>
              <template slot="header">
                <span>
                  <img src="{{ asset('storage/flags/4x3/us.svg') }}" style="max-width:20px;">
                </span>
                <span> English </span>
              </template>

              <div class="field">
                <label for="job_title" class="label">Job Title</label>
                <div class="control">
                 <input class="input" type="text" name="job_title" id="job_title" value="{{old('job_title')}}">
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
                  <img src="{{ asset('storage/flags/4x3/mx.svg') }}" style="max-width:20px;">
                </span>
                <span> Español</span>
              </template>

              <div class="field">
                <label for="puesto" class="label">Puesto</label>
                <div class="control">
                 <input class="input" type="text" name="puesto" id="puesto" value="{{old('puesto')}}">
               </div>
              </div>

              <div class="field">
                <p class="control">
                  <label for="descripcion" class="label">Descripción</label>
                  <textarea class="textarea" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
                </p>
              </div>

            </b-tab-item>
          </b-tabs>
        </div>

        <div class="column is-6">
          <label class="label">@lang('employees.thumbnail')</label>
          <input class="input" type="file" name="thumbnail" id="thumbnail" value="{{old('descripcion')}}">
        </div>

        <div class="column">
          <div class="field">
            <label class="label">@lang('employees.public')</label>
            <input type="hidden" :value="isPublic" name="public">
            <b-dropdown v-model="isPublic" class="m-b-10">
              <button class="button is-info" type="button" slot="trigger">
                <template v-if="isPublic">
                  <i class="fas fa-globe m-r-5"></i>
                  <span class="m-r-5">@lang('employees.public_txt')</span>
                </template>
                <template v-else>
                  <i class="fas fa-lock m-r-5"></i>
                  <span class="m-r-5">@lang('employees.private')</span>
                </template>
                <i class="fas fa-caret-down"></i>
              </button>

              <b-dropdown-item :value="true">
                <div class="media">
                  <i class="fas fa-globe m-r-5 m-t-5"></i>
                  <div class="media-content">
                    <h3>@lang('employees.public_txt')</h3>
                    <small>@lang('employees.public_desc')</small>
                  </div>
                </div>
              </b-dropdown-item>

              <b-dropdown-item :value="false">
                <div class="media">
                  <i class="fas fa-lock m-r-5 m-t-5"></i>
                  <div class="media-content">
                    <h3>@lang('employees.private')</h3>
                    <small>@lang('employees.private_desc')</small>
                  </div>
                </div>
              </b-dropdown-item>
            </b-dropdown>
          </div>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link">@lang('employees.submit')</button>
        </div>
      </div>
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

    $('#descripcion').summernote({
      placeholder: 'Add description for staff member',
      tabsize: 2,
      height: 100
    });

    $('#description').summernote({
      placeholder: 'Agrega una descripción para este miembro del personal',
      tabsize: 2,
      height: 100
    });
  }
  </script>
@endsection
