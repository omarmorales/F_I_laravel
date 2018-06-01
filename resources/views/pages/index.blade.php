@extends('layouts.site')

@section('content')
  <div class="columns">
    <div class="column no-padding">
      <section id="about" class="hero is-fullheight">
        <div class="hero-body has-background-grey-dark">
          <div class="columns">
            <div class="column is-8 is-offset-2 has-text-centered has-text-white has-text-weight-light">
              <h1 class="is-size-1-desktop  has-text-weight-light">¿Quiénes somos?</h1>
              <hr class="separator">
              <p class="is-size-5-desktop">Somos una consultoría con <span>11 años de experiencia</span> generando información para impulsar la mejor toma de decisiones.</p>
              <p class="is-size-5 -desktop">Nuestros valores se basan en la <span>excelencia e innovación en procesos,</span> solidez en el manejo de tiempos y flexibilidad para entregar resultados específicos y en sintonía a las necesidades de nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns">
    <div class="column is-two-thirds no-padding">
      <section id="whatwedo" class="hero is-medium">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-8 is-offset-2 has-text-weight-light">
              <h1 class="is-size-1-desktop  has-text-weight-light">¿Qué hacemos?</h1>
              <hr class="separator">
              <p class="is-size-5-desktop">Asesoramos la toma de decisiones</p>
              <p class="is-size-5 -desktop">Ayudamos a resolver problemas y añadimos valor a los proyectos de cada uno de nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="column has-background-grey no-padding">
      <section id="practice" class="hero is-medium">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-10 is-offset-1 has-text-weight-light">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="{{ asset('storage/card_img.jpg') }}" alt="Card image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <p>Nuestra práctica</p>
                    <p>Nuestra experiencia nos facilita diseñar y adaptar el alcance de nuestros proyectos de acuerdo a los problemas y a las necesidades específicas de cada cliente.</p>
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
    <div class="column no-padding">
      <section class="hero orange-gradient is-medium">
        <div class="hero-body">
          <div class="container has-text-centered has-text-white">
            <h1 class="title has-text-white">
              Únete a C230 Consultores
            </h1>
            <p>Estamos constantemente en búsqueda de talento.
            Si estas interesado en ingresar a C230 Consultores, escríbenos al siguiente correo:</p>
            <h2 class="subtitle has-text-white">reclutamiento@c-230.com</h2>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
