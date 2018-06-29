@extends('layouts.site')

@section('content')
  <div class="columns">
    <div class="column is-10 is-offset-1">
      @if (App::isLocale('en'))
        <h1 class="is-size-0-desktop is-size-2-touch has-text-weight-light m-t-75">{{ $vacancy->name }}</h1>
      @else
        <h1 class="is-size-0-desktop is-size-2-touch has-text-weight-light m-t-75">{{ $vacancy->name_es }}</h1>
      @endif
      <hr class="separator" style="width:30%;">
    </div>
  </div>
  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-6 is-offset-1">
      <div class="card" style="height:100%">
        <div class="card-content">
          <div class="content">
            <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10 has-text-orange">Requisitos de la vacante</p>
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
    <div class="column is-4">
      <div class="card">
        <div class="card-image">
          <figure class="image is-2by1">
            <img src="{{ Storage::disk('spaces')->url('website_images/team.jpg') }}" alt="team">
          </figure>
        </div>
        <div class="card-content">
          <div class="content">
            <figure class="image" style="width:300px; height:150px;">
              <img src="{{ Storage::disk('spaces')->url('website_images/iuvenia.jpg') }}" alt="team">
            </figure>
            C230 Consultores y Fundación IDEA cuentan con el distintivo IUVENIA para Empresas Amigas de los Jóvenes, por ser una organización líder en políticas de Recursos Humanos, que atrae al mejor talento, invierte en él y desarrolla a su gente.
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="columns is-multiline has-background-white" style="margin-right:0; margin-left:0;">
    <div class="column is-10 is-offset-1">
      <span class="description">
        @if (App::isLocale('en'))
          {!! $vacancy->description !!}
        @else
          {!! $vacancy->description_es !!}
        @endif
      </span>
    </div>
    <div class="column is-10 is-offset-1">
      <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

        <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10 has-text-orange">Datos del aplicante</p>
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
