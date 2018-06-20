@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li><a href="{{ route('vacancies.index') }}">Manage Vacancies</a></li>
        <li class="is-active"><a href="#" aria-current="page">Create</a></li>
      </ul>
    </nav>

    <h1 class="title">Create Vacancy</h1>
    <form action="{{ route('vacancies.store') }}" method="POST">
      {{csrf_field()}}

      <div class="columns is-multiline">
        <div class="column is-12">
          <b-tabs type="is-boxed">
            <b-tab-item>
              <template slot="header">
                <span>
                  <img src="{{ asset('storage/flags/4x3/us.svg') }}" style="max-width:20px;">
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
                  <img src="{{ asset('storage/flags/4x3/mx.svg') }}" style="max-width:20px;">
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

        <div class="column">
          <div class="field">
              <label class="label">Show Vacancy as public?</label>
              <input type="hidden" :value="isSwitched" name="public">
              <b-switch v-model="isSwitched">
                  @{{ isSwitched }}
              </b-switch>
          </div>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link">Submit</button>
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
        isSwitched: false
      }
    });
  }
  </script>
@endsection
