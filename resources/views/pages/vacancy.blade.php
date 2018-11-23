@extends('layouts.site')

@section('headers')
  <meta name="description" content="Descripción de una vacante de Fundación IDEA">
  <title>Fundación IDEA | Vacante</title>
@endsection

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
                      <span class="is-size-5-desktop">
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
                      Fundación IDEA cuentan con el distintivo IUVENIA para Empresas Amigas de los Jóvenes, por ser una organización líder en políticas de Recursos Humanos, que atrae al mejor talento, invierte en él y desarrolla a su gente.
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
                      <b-field label="Nombre">
                          <b-input type="text" name="name" id="name" required></b-input>
                      </b-field>

                      <b-field label="Email">
                        <b-input type="email" name="email" id="email" required></b-input>
                      </b-field>
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

                  <div class="columns is-multiline">
                    <div class="column is-12">
                      <b-field label="¿Cómo te enteraste de nosotros?">
                          <b-input type="text" name="how_hear_aboutus" id="how_hear_aboutus" required></b-input>
                      </b-field>

                      <b-field label="Favor de indicarnos cuál de las siguientes opciones describe mejor tu situación actual.">
                          <b-select placeholder="Selecciona una opción" name="situation" id="situation" required>
                              <option value="0">Soy estudiante</option>
                              <option value="1">Soy estudiante y busco empleo</option>
                              <option value="2">Soy recién egresado y busco empleo</option>
                              <option value="3">Terminé mis estudios (pero aún no me titulo) y busco empleo</option>
                              <option value="4">Terminé mis estudios (pero aún no me titulo) y estoy trabajando</option>
                              <option value="5">Estoy titulado y busco empleo</option>
                              <option value="6">Estoy titulado y trabajo actualmente</option>
                              <option value="7">Otro</option>
                          </b-select>
                      </b-field>

                      <b-field label="Universidad">
                        <b-input name="school" id="school" required></b-input>
                      </b-field>

                      <b-field label="¿Cuál es tu promedio actual en la licenciatura? Y si ya terminaste de estudiar, ¿cuál fue tu promedio final?">
                        <b-input type="number" min="0" max="100" name="average" id="average" required></b-input>
                      </b-field>

                      <b-field label="De los temas en los que hemos trabajado, ¿hay alguno en el que preferirías no trabajar? ¿por qué? No te preocupes, tu respuesta no afectará el proceso de reclutamiento. ">
                          <b-input maxlength="200" type="textarea" name="themes" id="themes" required></b-input>
                      </b-field>

                      <b-field label="Cuéntanos qué es lo más complejo que has hecho en STATA.">
                          <b-input maxlength="200" type="textarea" name="stata" id="stata" required></b-input>
                      </b-field>

                      <b-field label="¿Dónde te ves profesionalmente en 5 años? ¿Qué haces y qué has logrado? Tal vez es prematuro, pero queremos entender tus planes a futuro.">
                          <b-input maxlength="200" type="textarea" name="future" id="future" required></b-input>
                      </b-field>
                    </div>
                    <div class="column is-12">
                      <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10 has-text-link">Por último, las dos preguntas más importantes:</p>
                    </div>
                    <div class="column is-12">
                      <b-field label="Please answer in English: Tell us why you are interested in working at C230 Consultores (please use between 200 and 300 words).">
                          <b-input maxlength="300" type="textarea" name="whyinterested" id="whyinterested" required></b-input>
                      </b-field>

                      <b-field label="Please answer in English: Why should we hire you?">
                          <b-input maxlength="120" type="textarea" name="whyhireyou" id="whyhireyou" required></b-input>
                      </b-field>

                      <b-field label="¡Gracias por tu interés en nosotros! Si tienes algún otro comentario, puedes hacerlo en este espacio.">
                          <b-input maxlength="200" type="textarea" name="comments" id="comments" required></b-input>
                      </b-field>
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

  window.addEventListener('loader', function(){
    overlay.style.display = 'block';
  })
  </script>
@endsection
