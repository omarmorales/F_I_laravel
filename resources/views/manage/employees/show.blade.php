@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li><a href="{{ route('employees.index') }}">Manage Staff</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $employee->name }}</a></li>
      </ul>
    </nav>

    <b-dropdown v-model="isPublic" class="m-b-10">
      <button class="button is-primary" type="button" slot="trigger">
        <template v-if="isPublic">
          <i class="fas fa-globe m-r-10"></i>
          <span class="m-r-10">Public</span>
        </template>
        <template v-else>
          <i class="fas fa-lock m-r-10"></i>
          <span class="m-r-10">Private</span>
        </template>
        <i class="fas fa-caret-down"></i>
      </button>

      <b-dropdown-item :value="true">
        <div class="media">
          <i class="fas fa-globe m-r-10 m-t-5"></i>
          <div class="media-content">
            <h3>Public</h3>
            <small>Everyone can see</small>
          </div>
        </div>
      </b-dropdown-item>

      <b-dropdown-item :value="false">
        <div class="media">
          <i class="fas fa-lock m-r-10 m-t-5"></i>
          <div class="media-content">
            <h3>Private</h3>
            <small>Only visible for admins</small>
          </div>
        </div>
      </b-dropdown-item>
    </b-dropdown>

    <div class="columns">
      <div class="column is-4">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="{{ asset('storage/thumbnails/'.$employee->thumbnail) }}" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4">{{ $employee->name }}</p>
                <p class="subtitle is-6">{{ $employee->job_title }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Description
            </p>
          </header>
          <div class="card-content">
            <div class="content">
              {{ $employee->description }}
            </div>
          </div>
          <footer class="card-footer">
            <a href="#" class="card-footer-item">Edit</a>
            <a href="#" class="card-footer-item">Delete</a>
          </footer>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
  window.onload = function() {
    const app = new Vue({
      el: '#app',
      data: {
        isPublic: {{ $employee->public }}
      }
    });
  }
  </script>
@endsection
