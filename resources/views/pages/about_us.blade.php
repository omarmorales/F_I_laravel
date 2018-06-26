@extends('layouts.site')

@section('content')
    <section id="staff" class="m-t-50 m-l-20 m-r-20 m-b-50">
      <div class="columns">
        <div class="column">
          <h2 class="is-size-1 has-text-weight-light">Staff</h2>
          <hr class="small-separator">
        </div>
      </div>
      <div class="columns is-multiline">
        @foreach ($employees as $employee)
          @if ($employee->public == "true")
            <div class="column is-one-third">
              <div class="container">
                <img src="{{ Storage::disk('spaces')->url('thumbnails/'.$employee->thumbnail) }}" alt="{{ $employee->name }}" class="image">
                <div class="content-img">
                  <p class="is-uppercase">{{ $employee->name }}</p>
                  <small>{!! $employee->job_title !!}</small>
                </div>
                <div class="overlay">
                  <div class="text m-l-20 m-t-20 m-r-20">
                    <p class="is-uppercase">{{ $employee->name }}</p>
                    <small>{{ $employee->job_title }}</small>
                    <p class="m-t-30">{!! $employee->description !!}</p>
                  </div>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </section>

    <section id="vacancies" class="has-background-grey-light">
      <div class="columns m-t-20 m-l-20 m-r-20">
        <div class="column">
          <h2 class="is-size-1 has-text-weight-light">Vacantes</h2>
          <hr class="small-separator">
        </div>
      </div>
      <div class="columns is-multiline m-t-20 m-l-20 m-r-20">
        @foreach ($vacancies as $vacancy)
          <div class="column">
            <div class="card">
              <div class="card-content">
                <div class="columns">
                  <div class="column is-one-quarter no-padding">
                    <img src="{{ Storage::disk('spaces')->url('website_images/thumbnail_vacancy.jpg') }}" alt="{{ $vacancy->name }}">
                  </div>
                  <div class="column">
                    <div class="media">
                      <div class="media-content">
                        <p class="subtitle is-6">
                          <i class="fas fa-clock m-r-5"></i>
                          {{ $vacancy->created_at->diffForHumans() }}
                        </p>
                        <p class="title is-4 has-text-weight-light">{{ $vacancy->name }}</p>
                      </div>
                    </div>

                    <div class="content">
                      <span>{!! str_limit($vacancy->requirements,600) !!}</span>
                      <div class="control m-t-10">
                        <a href="{{ route('vacancies.public', $vacancy->id) }}" class="has-text-orange">Leer más <i class="fas fa-angle-right m-l-5"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
@endsection
