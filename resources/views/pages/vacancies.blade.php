@extends('layouts.site')

@section('content')
  {{-- header fundacion idea starts --}}
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <a href="{{ route('index') }}">
              <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
            </a>
          </div>

          <div class="column is-4">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-12 m-t-10">
        <nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="{{ route('index') }}">Inicio</a></li>
            <li class="is-active"><a href="#" aria-current="page">Vacantes</a></li>
          </ul>
        </nav>
      </div>

      <div class="column is-12">
        <h2 class="is-size-1 has-text-weight-light">Vacantes</h2>
        <hr class="small-separator m-b-10">
      </div>

      <div class="column is-12 m-b-20">
        @foreach ($vacancies as $vacancy)
          <div class="columns is-multiline">
            <div class="column is-12">
              <div class="box">
                <div class="columns">
                  <div class="column is-3" style="background-image: url('{{ asset('images/vacancy_thumbnail.png') }}'); height: 250px; background-size: cover;background-repeat: no-repeat;background-position: center;">

                  </div>
                  <div class="column is-9">
                    <article class="media">
                      <div class="media-content">
                        <div class="content">
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
                           <p>
                             @if (App::isLocale('en'))
                               {!! str_limit($vacancy->requirements,500) !!}
                             @else
                               {!! str_limit($vacancy->requirements_es,500) !!}
                             @endif
                           </p>
                           <a href="{{ route('vacancy.show', $vacancy->id) }}" class="has-text-link">Leer más <i class="fas fa-angle-right m-l-5"></i></a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @endforeach
        {{ $vacancies->links() }}
      </div>


    </div>
  </div>
  <section id="vacancies" class="m-t-20">
    <div class="container">




    </div>
  </section>
@endsection
