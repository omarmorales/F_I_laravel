@extends('layouts.site')

@section('content')
  <section>
    @if (App::isLocale('en'))
      <h1 class="is-size-0-desktop is-size-2-touch has-text-weight-light m-t-75">{{ $vacancy->name }}</h1>
    @else
      <h1 class="is-size-0-desktop is-size-2-touch has-text-weight-light m-t-75">{{ $vacancy->name_es }}</h1>
    @endif
    <hr class="separator" style="width:30%;">
    <div class="columns">
      <div class="column">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10">Requisitos de la vacante</p>
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
            <figure class="image is-4by3">
              <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
            </figure>
          </div>
          <div class="card-content">
            <div class="content">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Phasellus nec iaculis mauris. <a>@bulmaio</a>.
              <a href="#">#css</a> <a href="#">#responsive</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="columns has-background-white">
      <div class="column">
        hola
      </div>
    </div>
  </section>
@endsection
