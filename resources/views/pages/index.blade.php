@extends('layouts.site')

@section('content')
  <div class="columns has-background-grey-dark">
    <div class="column">
      <section class="hero is-fullheight">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-6 is-offset-3 has-text-centered has-text-white has-text-weight-light ">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">¿Quiénes somos?</h2>
              <hr class="separator">
              <p class="is-size-5-desktop is-size-6-touch m-b-10">Somos una consultoría con <span class="has-text-orange">11 años de experiencia</span> generando información para impulsar la mejor toma de decisiones.</p>
              <p class="is-size-5-desktop is-size-6-touch">Nuestros valores se basan en la <span class="has-text-orange">excelencia e innovación en procesos</span>, solidez en el manejo de tiempos y flexibilidad para entregar resultados específicos y en sintonía a las necesidades de nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns has-background-white">
    <div class="column is-two-thirds">
      <section class="hero is-medium is-hidden-touch">
        <div class="hero-body">
          <div class="columns ">
            <div class="column is-8 is-offset-2 has-text-weight-light ">
              <h2 class="is-size-0-desktop has-text-weight-light">¿Qué hacemos?</h2>
              <hr class="separator">
              <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10">Asesoramos la toma de decisiones</p>
              <p class="is-size-5-desktop">Ayudamos a resolver problemas y añadimos valor a los proyectos de cada uno de nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="hero is-fullheight is-hidden-desktop">
        <div class="hero-body">
          <div class="columns ">
            <div class="column is-8 is-offset-2 has-text-weight-light ">
              <h2 class="is-size-2-touch has-text-weight-light">¿Qué hacemos?</h2>
              <hr class="separator">
              <p class="is-size-5-touch is-uppercase has-text-weight-normal">Asesoramos la toma de decisiones</p>
              <p class="is-size-6-touch">Ayudamos a resolver problemas y añadimos valor a los proyectos de cada uno de nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="column has-background-grey">
      <section class="hero">
        <div class="hero-body">
          <div class="columns ">
            <div class="column is-10 is-offset-1 has-text-weight-light ">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="{{ Storage::disk('spaces')->url('website_images/card_img.jpg') }}" alt="Card image">
                  </figure>
                </div>
                <div class="card-content">
                  <div class="content">
                    <p class="is-size-5-desktop is-size-6-touch is-uppercase has-text-weight-normal m-b-5">Nuestra práctica</p>
                    <p class="is-size-6-desktop is-size-7-touch">Nuestra experiencia nos facilita diseñar y adaptar el alcance de nuestros proyectos de acuerdo a los problemas y a las necesidades específicas de cada cliente.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns is-hidden-touch orange-gradient">
    <div class="column ">
      <section class="hero">
        <div class="hero-body">
          <div class="container has-text-centered has-text-white">
            <h2 class="is-size-2-desktop m-b-15">Únete a C230 Consultores</h2>
            <p class="m-b-0 is-size-5-desktop">Estamos constantemente en búsqueda de talento.</p>
            <p class="is-size-5-desktop m-b-15">Si estas interesado en ingresar a C230 Consultores, revisa nuestras vacantes:</p>
            <a class="button is-link is-inverted is-outlined">Ir a vacantes</a>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns has-background-white">
    <div class="column">
      <section class="hero">
        <div class="hero-body">
          <div class="container">
            <div class="fw_card">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">¿Para quiénes?</h2>
              <hr class="separator">
              <ul>
                <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Organizaciones públicas</span></li>
                <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Multilaterales</span></li>
                <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Organismos internacionales</span></li>
                <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Sector privado</span></li>
                <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Organizaciones sin fines de lucro</span></li>
              </ul>
            </div>
            <figure class="image fw_image">
              <img src="{{ Storage::disk('spaces')->url('website_images/city.png') }}" alt="city">
            </figure>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns has-background-white">
    <div class="column">
      <section class="hero">
        <div class="hero-body">
          <div class="container">
            <div class="columns">
              <div class="column is-5 is-offset-1">
                <figure class="image ww_image">
                  <img src="{{ Storage::disk('spaces')->url('website_images/graph.png') }}" alt="graph">
                </figure>
              </div>
              <div class="column is-5">
                <div class="ww_card">
                  <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">¿En qué trabajamos?</h2>
                  <hr class="separator">
                  <ul>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Estrategias</span></li>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Políticas públicas</span></li>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Problemas públicos</span></li>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Iniciativas públicas</span></li>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Comunicación</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns has-background-white">
    <div class="column">
      <section class="hero">
        <div class="hero-body">
          <div class="container">
            <div class="columns">
              <div class="column is-5 is-offset-1">
                <div class="ww_card">
                  <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">Proyectos</h2>
                  <hr class="separator">
                  <p class="is-size-5-desktop is-size-6-touch">
                    Desde hace 11 años hemos realizado proyectos en diversos sectores y para múltiples clientes lo cual nos ha brindado una experiencia única en consultoría en Latinoamérica.
                  </p>
                </div>
              </div>
              <div class="column is-5">
                <figure class="image ww_image">
                  <img src="{{ Storage::disk('spaces')->url('website_images/laptop.png') }}" alt="laptop">
                </figure>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <b-tooltip label="Volver al inicio" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
    <a class="button-float button-round">
      <span class="fas fa-angle-up"></span>
    </a>
  </b-tooltip>
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
