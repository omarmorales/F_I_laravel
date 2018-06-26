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
    <div class="columns">
      <div class="column">
        <div class="profile">
          <h1>{{ $employee->name }}</h1>
          <div class="infoHolder">
            <h2>{{ $employee->job_title }}</h2>
            <span>{!! $employee->description !!}</span>
          </div>
          <div class="imageHolder">
            <img class="profilePic" src="{{ Storage::disk('spaces')->url('thumbnails/'.$employee->thumbnail) }}" alt="{{ $employee->name }}">
          </div>
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
      }
    });
  }
  </script>
@endsection
