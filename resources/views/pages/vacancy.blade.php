@extends('layouts.site')

@section('content')
  <div class="container">
    <div class="columns">
      <div class="column">
        <section class="hero">
          <div class="hero-body">
            <div class="columns">
              <div class="column">
                <nav class="breadcrumb m-t-20" aria-label="breadcrumbs">
                  <ul>
                    <li><a href="{{ route('index') }}">Inicio</a></li>
                    <li><a href="{{ route('sitevacancies') }}">Vacantes</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{{ $vacancy->name }}</a></li>
                  </ul>
                </nav>
                <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">
                  @if (App::isLocale('en'))
                    <h2 class="is-size-1 has-text-weight-light">{{ $vacancy->name }}</h2>
                    <hr class="small-separator m-b-20">
                  @else
                    <h2 class="is-size-1 has-text-weight-light">{{ $vacancy->name_es }}</h2>
                    <hr class="small-separator m-b-20">
                  @endif
                </h2>
              </div>
            </div>
            <div class="columns">
              <div class="column is-7">
                <div class="card" style="height:100%">
                  <div class="card-content">
                    <div class="content">
                      <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10 has-text-link">Requisitos de la vacante</p>
                      <span class="is-size-5-desktop is-uppercase">
                        @if (App::isLocale('en'))
                          {!! $vacancy->requirements !!}
                        @else
                          {!! $vacancy->requirements_es !!}
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="card">
                  <div class="card-image">
                    <figure class="image is-2by1">
                      <img src="{{ asset('images/team.png') }}" alt="team">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <figure class="image is-hidden-touch" style="width:300px; height:150px;">
                        <img src="{{ asset('images/iuvenia.png') }}" alt="team">
                      </figure>
                      C230 Consultores y Fundación IDEA cuentan con el distintivo IUVENIA para Empresas Amigas de los Jóvenes, por ser una organización líder en políticas de Recursos Humanos, que atrae al mejor talento, invierte en él y desarrolla a su gente.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="columns">
      <div class="column has-background-white">
        <section class="hero">
          <div class="hero-body">
            <div class="columns">
              <div class="column">
                <span class="description">
                  @if (App::isLocale('en'))
                    {!! $vacancy->description !!}
                  @else
                    {!! $vacancy->description_es !!}
                  @endif
                </span>
              </div>
            </div>
            <div class="columns">
              <div class="column">
                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10 has-text-link">Datos del aplicante</p>
                  <div class="columns">
                    <div class="column">
                      <div class="field">
                        <p class="control">
                          <label for="name" class="label">Nombre</label>
                          <input type="text" class="input" name="name" value="{{old('name')}}" id="name">
                        </p>
                      </div>

                      <div class="field">
                        <p class="control">
                          <label for="email" class="label">Correo</label>
                          <input type="email" class="input" name="email" value="{{old('email')}}" id="email">
                        </p>
                      </div>

                      <div class="field">
                        <p class="control">
                          <label for="school" class="label">Universidad</label>
                          <input type="text" class="input" name="school" value="{{old('school')}}" id="school">
                        </p>
                      </div>
                    </div>

                    <div class="column">
                      <div class="field">
                        <div class="control">
                          <label for="motivation_letter" class="label">Carta motivos</label>
                          <input type="file" class="input" name="motivation_letter" value="{{old('motivation_letter')}}" id="motivation_letter">
                        </div>
                      </div>

                      <div class="field">
                        <div class="control">
                          <label for="cv" class="label">Currículum vitae</label>
                          <input type="file" class="input" name="cv" value="{{old('cv')}}" id="cv">
                        </div>
                      </div>
                      <input type="hidden" class="vacancy_id" name="vacancy_id" value="{{ $vacancy->id }}" id="vacancy_id">
                    </div>
                  </div>

                  <div class="field">
                    <div class="control">
                      <button class="button is-link is-medium">APLICAR</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="columns">
      <div class="column">

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
