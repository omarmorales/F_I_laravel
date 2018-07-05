@extends('layouts.site')

@section('content')
  <div class="columns" style="margin-right:0; margin-left:0; margin-bottom:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-grey-light">
      <section class="hero">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-10 is-offset-1">
              <h2 class="is-size-1 has-text-weight-light">Vacantes</h2>
              <hr class="small-separator">
            </div>
          </div>
          <div class="columns">
            @foreach ($vacancies as $vacancy)
              <div class="column is-10 is-offset-1">
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
                            <a href="{{ route('vacancy.show', $vacancy->id) }}" class="has-text-orange">Leer más <i class="fas fa-angle-right m-l-5"></i></a>
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
        </div>
      </section>
    </div>
  </div>

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-2-desktop is-hidden-touch"></div>
    <div class="column">
    </div>
  </div>
@endsection
