@extends('layouts.site')

@section('content')
      {{-- <section id="staff" class="m-t-50 m-l-20 m-r-20 m-b-50 is-hidden-touch is-hidden-desktop">
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
      </section> --}}

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-grey-dark">
      <section class="hero has-background-grey-dark js-section">
        <div class="hero-body">
          <img class="m-t-20" src="{{ Storage::disk('spaces')->url('website_images/aboutus.svg') }}" alt="aboutus">
        </div>
      </section>
    </div>
  </div>

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-white">
      <section class="hero">
        <div class="hero-body">
          <div class="columns ">
            <div class="column is-5 is-offset-1 has-text-weight-light ">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">Incidencia</h2>
              <hr class="separator">
              <p class="is-size-5-desktop is-size-6-touch">
                Nosotros proponemos constribuir a la generación e implementación de políticas, intervenciones y programas que favorezcan de manera significativa y sustentable el desarrollo económico, lareducción de la pobreza y la igualdad de oportunidades.
              </p>
              <p class="is-size-5-desktop is-size-6-touch">
                Nos motiva pensar que nuestro quehacer fortalece a la región Latinoamericana, y en particular a los países en los que operamos.
              </p>
            </div>
            <div class="column is-5">
              <figure class="image">
                <img src="{{ Storage::disk('spaces')->url('website_images/coins.jpg') }}" alt="Card image">
              </figure>
            </div>
          </div>
        </div>
      </section>

      <section class="hero">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-5 is-offset-1 is-hidden-touch">
              <figure class="image">
                <img src="{{ Storage::disk('spaces')->url('website_images/arrow.jpg') }}" alt="Card image">
              </figure>
            </div>
            <div class="column is-5 has-text-weight-light ">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">Historia</h2>
              <hr class="separator">
              <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10">11 años de experiencia</p>
              <p class="is-size-5-desktop is-size-6-touch m-b-10">C230 Consultores nació como el brazo consultor de Fundación IDEA, con el propósito de extender la gama de servicios ofrecidos a clientes públicos y privados en aras de fomentar el desarrollo social y económico de América Latina y México.</p>
            </div>
            <div class="column is-5 is-offset-1 is-hidden-desktop">
              <figure class="image">
                <img src="{{ Storage::disk('spaces')->url('website_images/arrow.jpg') }}" alt="Card image">
              </figure>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-grey-dark">
      <section class="hero is-fullheight">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-8 is-offset-2 has-text-centered has-text-white has-text-weight-light ">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">Nuestro talento, nuestro valor</h2>
              <hr class="separator">
              <p class="is-size-5-desktop is-size-6-touch m-b-10">En C230 Consultores <span class="has-text-orange">contamos con un equipo de trabajo multidisciplinario</span>, con amplia experiencia y credenciales académicas <span class="has-text-orange">de las mejores universidades nacionales</span> (UNAM, CIDE, Tecnológico de Monterrey, Universidad Iberoamericana), <span class="has-text-orange">e internacionales</span> (Columbia, Harvard, Oxford, NYU, MIT, Stanford, Chicago, University of Toronto y University of Notre Dame).</p>
              <p class="is-size-5-desktop is-size-6-touch m-b-10">Además de las credenciales académicas, nos distinguen cualidades como el deseo de aportar a la región latinoamericana a través de nuestro trabajo, así como la curiosidad intelectual y sincero interés por los temas que tratamos.</p>
              <p class="is-size-5-desktop is-size-6-touch m-b-10">Nuestro objetivo es lograr <span class="has-text-orange">desarrollar las soluciones</span> que más valor aporten a Latinoamérica y a nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column" style="background-image: url({{ Storage::disk('spaces')->url('website_images/zocalo.jpg') }});">
      <section class="hero">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-8 is-offset-2 has-text-centered has-text-white has-text-weight-light ">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">Tenemos un objetivo claro:</h2>
              <hr class="separator">
              <p class="is-size-5-desktop is-size-6-touch m-b-10">Fomentar el desarrollo social y económico de América Latina y México.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

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
                <div class="has-text-centered">
                  @if (count($vacancies) >= 5)
                    <a href="{{ route('sitevacancies') }}" class="button is-link is-medium m-t-20">Ver todas</a>
                  @endif
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="has-background-grey-dark">
  </div>
@endsection
