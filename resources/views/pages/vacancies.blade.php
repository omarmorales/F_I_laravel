@extends('layouts.site')

@section('content')
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
          </div>
          <div class="column">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="vacancies" class="m-t-20">
    <div class="container">
      <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="{{ route('index') }}">Inicio</a></li>
          <li class="is-active"><a href="#" aria-current="page">Vacantes</a></li>
        </ul>
      </nav>

      <h2 class="is-size-1 has-text-weight-light">Vacantes</h2>
      <hr class="small-separator m-b-20">
      @foreach ($vacancies as $vacancy)
        <div class="column">
          <div class="card">
            <div class="card-content">
              <div class="columns">
                <div class="column is-one-quarter no-padding">
                  <img src="{{ asset('images/vacancy_thumbnail.png') }}" alt="{{ $vacancy->name }}">
                </div>
                <div class="column">
                  <div class="media">
                    <div class="media-content">
                      <p class="subtitle is-6">
                        <i class="fas fa-clock m-r-5"></i>
                        {{ $vacancy->created_at->diffForHumans() }}
                      </p>
                      <p class="title is-4 has-text-weight-light m-t-10">
                        @if (App::isLocale('en'))
                          {{ $vacancy->name }}
                        @else
                          {{ $vacancy->name_es }}
                        @endif
                      </p>
                    </div>
                  </div>

                  <div class="content">
                    <span>
                      @if (App::isLocale('en'))
                        {!! str_limit($vacancy->requirements,500) !!}
                      @else
                        {!! str_limit($vacancy->requirements_es,500) !!}
                      @endif
                    </span>
                    <div class="control m-t-10">
                      <a href="{{ route('vacancy.show', $vacancy->id) }}" class="has-text-link">Leer más <i class="fas fa-angle-right m-l-5"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      {{ $vacancies->links() }}
    </div>
  </section>
@endsection
