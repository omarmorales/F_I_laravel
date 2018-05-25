@extends('layouts.site')

@section('content')
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

  <section id="about" class="hero is-fullheight">
    <div class="hero-body">
      <div class="columns">
        <div class="column is-three-fifths has-text-centered has-text-weight-light">
          <h1 class="is-size-1-desktop  has-text-weight-light">¿Quiénes somos?</h1>
          <hr class="separator">
          <p class="is-size-5-desktop">Somos una consultoría con <span>11 años de experiencia</span> generando información para impulsar la mejor toma de decisiones.</p>
          <p class="is-size-5 -desktop">Nuestros valores se basan en la <span>excelencia e innovación en procesos,</span> solidez en el manejo de tiempos y flexibilidad para entregar resultados específicos y en sintonía a las necesidades de nuestros clientes.</p>
        </div>
        <div class="column">
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img src="{{ asset('storage/card_img.jpg') }}" alt="Card image">
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
    </div>
  </section>
@endsection
