@extends('layouts.site')

@section('headers')
  <meta name="description" content="¿Qué es lo que hacemos en fundaación IDEA">
  <title>Fundación IDEA | ¿Qué hacemos?</title>
@endsection

@section('content')
  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-grey-dark">
      <section class="hero">
        <div class="hero-body">
          <img class="m-t-20 is-hidden-touch" src="{{ Storage::disk('spaces')->url('website_images/whatwedo.svg') }}" alt="aboutus">
          <div class="columns is-hidden-desktop">
            <div class="column has-text-centered">
              <h1 class="has-text-white m-t-20 is-size-3">¿Qué hacemos?</h1>
              <i class="fas fa-long-arrow-alt-down has-text-orange is-size-3"></i>
              <p class="is-size-4 has-text-orange has-text-weight-light">Generamos insumos</p>
              <p class="has-text-orange has-text-weight-light">para apoyar la toma de decisiones de nuestros clientes.</p>
              <i class="fas fa-long-arrow-alt-down has-text-orange is-size-3"></i>
              <p class="is-size-4 has-text-orange has-text-weight-light">Ayudamos</p>
              <p class="has-text-orange has-text-weight-light">a resolver problemas.</p>
              <i class="fas fa-long-arrow-alt-down has-text-orange is-size-3"></i>
              <p class="is-size-4 has-text-orange has-text-weight-light">Añadimos valor</p>
              <p class="has-text-orange has-text-weight-light">al trabajo de nuestros clientes.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="columns is-hidden-desktop" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-white">
      <section class="hero">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-6 is-offset-3">
              <h2 class="is-size-1-desktop is-size-3-touch has-text-weight-light has-text-centered">¿Para quiénes?</h2>
              <hr class="separator">
            </div>
          </div>
          <div class="columns is-multiline">
            <div class="column is-12">
              <article class="message">
                <div class="message-header orange-gradient">
                  <p>Organizaciones Públicas</p>
                </div>
                <div class="message-body">
                  Son todas aquellas organizaciones que pertenecen al Estado, sea este nacional, municipal, o de cualquier otro ámbito administrativo-gubernamental, ya sea de una manera total o parcial.
                </div>
              </article>
            </div>

            <div class="column is-12">
              <article class="message">
                <div class="message-header orange-gradient">
                  <p>Sector Privado</p>
                </div>
                <div class="message-body">
                  Parte de la economía que busca el lucro en su actividad y que no está controlada por el Estado, como por ejemplo, las empresas.
                </div>
              </article>
            </div>

            <div class="column is-12">
              <article class="message">
                <div class="message-header orange-gradient">
                  <p>Multilaterales</p>
                </div>
                <div class="message-body">
                  Organización conformada por tres o más naciones cuya principal misión será trabajar conjuntamente enlas problemáticas y aspectos relacionados con los países que integran la organización en cuestión.
                </div>
              </article>
            </div>

            <div class="column is-12">
              <article class="message">
                <div class="message-header orange-gradient">
                  <p>Org. Internacionales</p>
                </div>
                <div class="message-body">
                  Todo grupo o asociación que se extiende más allá de las fronteras de un Estado y que adopta una estructura orgánica permanente.
                </div>
              </article>
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
    <div class="column has-background-white">
      <div class="columns">
        <div class="column is-6 is-offset-3">
          <h2 class="is-size-1-desktop is-size-3-touch has-text-weight-light has-text-centered">¿En qué trabajamos?</h2>
          <hr class="separator">
        </div>
      </div>
      <div class="columns is-multiline">
        <div class="column is-6 has-background-grey-dark" style="padding:10%;">
          <img class="m-b-30" src="{{ Storage::disk('spaces')->url('website_images/circle.svg') }}" alt="circle" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-white has-text-centered has-text-weight-bold">Estrategias</p>
          <p class="has-text-white is-size-5-desktop is-size-6-touch">
            Diseño, evaluación, análisis e implementación de programas, indicadores y soluciones que redunden en el beneficio de la sociedad, la economía y el medio ambiente.
          </p>
        </div>
        <div class="column is-6" style="padding:10%; background-image: url('{{ Storage::disk('spaces')->url('website_images/piramid_bg.svg') }}'); background-repeat: no-repeat; background-position: bottom;">
          <img class="m-b-30" src="{{ Storage::disk('spaces')->url('website_images/piramid.svg') }}" alt="circle" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-centered has-text-weight-bold">Políticas Públicas</p>
          <p class="is-size-5-desktop is-size-6-touch">
            Buscamos alinear intereses de diferentes grupos políticos sociales y económicos bajo una visión común que les permita desarrollarse y prosperar sosteniblemente.
          </p>
        </div>
        <div class="column is-6 is-hidden-touch" style="padding:10%; background-image: url('{{ Storage::disk('spaces')->url('website_images/arrow_bg.svg') }}'); background-repeat: no-repeat; background-position: bottom;">
          <img class="m-b-30" src="{{ Storage::disk('spaces')->url('website_images/arrow.svg') }}" alt="arrow" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-centered has-text-weight-bold">Problemas Públicos</p>
          <p class="is-size-5-desktop is-size-6-touch">
            Analizamos recursos y oportunidades de desarrollo que afecten a la calidad de vida de las personas, comunidades y el entorno que las sostiene.
          </p>
        </div>
        <div class="column is-6 has-background-grey-dark" style="padding:10%;">
          <img class="m-b-30" src="{{ Storage::disk('spaces')->url('website_images/circles.svg') }}" alt="circles" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-white has-text-centered has-text-weight-bold">Iniciativas Públicas</p>
          <p class="is-size-5-desktop is-size-6-touch has-text-white">
            Trabajamos en proyectos que involucran al gobierno y que tienen con fin último un beneficio positivo en México.
          </p>
        </div>
        <div class="column is-6 is-hidden-desktop" style="padding:10%; background-image: url('{{ Storage::disk('spaces')->url('website_images/arrow_bg.svg') }}'); background-repeat: no-repeat; background-position: bottom;">
          <img class="m-b-30" src="{{ Storage::disk('spaces')->url('website_images/arrow.svg') }}" alt="arrow" style="display: block;margin-left: auto;margin-right: auto;width: 50%;">
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-centered has-text-weight-bold">Problemas Públicos</p>
          <p class="is-size-5-desktop is-size-6-touch">
            Analizamos recursos y oportunidades de desarrollo que afecten a la calidad de vida de las personas, comunidades y el entorno que las sostiene.
          </p>
        </div>
      </div>
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
          <div class="container">
            <div class="columns">
              <div class="column is-7">
                <div class="ww_card">
                  <h2 class="is-size-1-desktop is-size-3-touch has-text-weight-light">Soluciones Digitales</h2>
                  <hr class="separator">
                  <p class="is-size-5-desktop is-size-6-touch m-b-10">
                    Generamos soluciones digitales basadas en principios de <span class="has-text-orange">Gobierno Digital</span> y <span class="has-text-orange">Gobierno Abierto</span>
                  </p>
                  <ul>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Diseñamos soluciones digitales para innovar en gobiernos.</span></li>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Construimos herramientas y sistemas tecnológicos para hacer eficientes los recursos.</span></li>
                    <li><i class="far fa-circle is-size-7-desktop m-r-10 has-text-link"></i><span class="is-size-5-desktop is-size-6-touch">Analizamos procesos y proponemos soluciones basadas en innovación y tecnología.</span></li>
                  </ul>
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

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column">

    </div>
  </div>
@endsection
