@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li><a href="{{ route('employees.index') }}">Manage Staff</a></li>
        <li class="is-active"><a href="#" aria-current="page">Create</a></li>
      </ul>
    </nav>

    <h1 class="title">Create Staff Member</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="columns is-multiline">
        <div class="column is-12">
          <div class="field">
            <p class="control">
              <label for="name" class="label">Name</label>
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
          <label class="label">Add thumbnail</label>
          <input class="input" type="file" name="thumbnail" id="thumbnail" value="{{old('descripcion')}}">
        </div>

        <div class="column">
          <div class="field">
              <label class="label">Show Staff Member as public?</label>
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
