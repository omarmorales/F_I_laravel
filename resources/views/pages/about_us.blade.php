@extends('layouts.site')

@section('content')
  <div class="flex-container m-t-50 m-l-100 m-r-100">
    <section id="staff">
      <div class="columns m-t-50">
        <div class="column">
          <h2 class="is-size-1 has-text-weight-light">Staff</h2>
          <hr class="small-separator">
        </div>
      </div>
      <div class="columns">
        @foreach ($employees as $employee)
          @if ($employee->public == "true")
            <div class="column is-one-third">
              <div class="container">
                <img src="{{ asset('storage/thumbnails/'.$employee->thumbnail) }}" alt="Avatar" class="image">
                <div class="content-img">
                  <p class="is-uppercase">{{ $employee->name }}</p>
                  <small>{{ $employee->job_title }}</small>
                </div>
                <div class="overlay">
                  <div class="text m-l-20 m-t-20 m-r-20">
                    <p class="is-uppercase">{{ $employee->name }}</p>
                    <small>{{ $employee->job_title }}</small>
                    <p class="m-t-30">{{ $employee->description }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </section>
  </div>
@endsection
