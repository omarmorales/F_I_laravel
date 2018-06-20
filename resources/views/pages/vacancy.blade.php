@extends('layouts.site')

@section('content')
  <section id="vacancy" class="m-t-50 m-l-100 m-r-100 m-b-50">
    <div class="columns">
      <div class="column">
        <h2 class="is-size-1 has-text-weight-light">{{ $vacancy->name }}</h2>
        <hr class="small-separator">
      </div>
    </div>
    <div class="columns">
      <div class="column">
        <div class="card">
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <p class="title is-4 is-uppercase">Requisitos de la vacante</p>
              </div>
            </div>

            <div class="content is-uppercase">
              {{ $vacancy->requirements }}
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="card">
          <div class="card-image">
            <figure class="image is-4by3">
              <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
              C230 Consultores y Fundación IDEA cuentan con el distintivo IUVENIA para Empresas Amigas de políticas de Recursos Humanos, que atrae al mejor talento, invierte en él y desarrolla a su gente.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="application">
    <div class="columns m-l-100 m-r-100">
      <div class="column">
        <p class="title is-4 is-uppercase m-b-10">Descripción de la vacante</p>
        {{ $vacancy->description }}
      </div>
    </div>
    <div class="columns  m-l-100 m-r-100">
      <div class="column">
        <p class="title is-4 is-uppercase">Datos del aplicante</p>
        <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="columns">
            <div class="column">
              <div class="field">
                <div class="control has-icons-left">
                  <input class="input" type="text" name="name" value="{{old('name')}}" id="name" placeholder="Name">
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
              </div>

              <div class="field">
                <div class="control has-icons-left">
                  <input class="input" type="email" name="email" value="{{old('email')}}" id="email" placeholder="Email">
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
              </div>

              <div class="field">
                <div class="control has-icons-left">
                  <input class="input" type="text" name="school" value="{{old('school')}}" id="school" placeholder="University">
                  <span class="icon is-small is-left">
                    <i class="fas fa-university"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="field has-addons">
                <p class="control">
                  <a class="button is-static">
                    Motivation letter
                  </a>
                </p>
                <div class="control has-icons-right">
                  <input class="input" type="file" name="motivation_letter" value="{{old('motivation_letter')}}" id="motivation_letter" placeholder="Motivation Letter">
                  <span class="icon is-small is-right">
                    <i class="fas fa-paperclip"></i>
                  </span>
                </div>
              </div>

              <div class="field has-addons">
                <p class="control">
                  <a class="button is-static">
                    Curriculum vitae
                  </a>
                </p>
                <div class="control has-icons-right">
                  <input class="input" type="file" name="cv" value="{{old('cv')}}" id="cv" placeholder="CV">
                  <span class="icon is-small is-right">
                    <i class="fas fa-paperclip"></i>
                  </span>
                </div>
              </div>

              <input type="hidden" name="vacancy_id" id="vacancy_id" value="{{ $vacancy->id }}">
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
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
