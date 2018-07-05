@extends('layouts.site')

@section('content')
  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-grey-dark">
      <section class="hero">
        <div class="hero-body">
          <img class="m-t-20" src="{{ Storage::disk('spaces')->url('website_images/whatwedo.svg') }}" alt="aboutus">
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
      <div class="columns is-multiline">
        <div class="column is-6 has-background-grey-dark" style="padding:10%;">
          <div class="columns">
            <div class="column is-6 is-offset-3">
              <img class="m-b-20" src="{{ Storage::disk('spaces')->url('website_images/circle.svg') }}" alt="circle">
            </div>
          </div>
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-white has-text-centered has-text-weight-bold">Estrategias</p>
          <p class="has-text-white">Apoyamos a una variedad de clientes que desean desarrollar proyectos o intervenciones para mejorar las oportunidades o condiciones de vida de la población latinoamericana, así como el desarrollo económico de la región, con especial énfasis en México y Colombia.</p>
        </div>
        <div class="column is-6" style="padding:10%; background-image: url('{{ Storage::disk('spaces')->url('website_images/piramid_bg.svg') }}');">
          <div class="columns">
            <div class="column is-6 is-offset-3">
              <img class="m-b-20" src="{{ Storage::disk('spaces')->url('website_images/piramid.svg') }}" alt="circle">
            </div>
          </div>
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-centered has-text-weight-bold">Políticas Públicas</p>
          <p>Apoyamos a una variedad de clientes que desean desarrollar proyectos o intervenciones para mejorar las oportunidades o condiciones de vida de la población latinoamericana, así como el desarrollo económico de la región, con especial énfasis en México y Colombia.</p>
        </div>
        <div class="column is-6" style="padding:10%; background-image: url('{{ Storage::disk('spaces')->url('website_images/arrow_bg.svg') }}');">
          <div class="columns">
            <div class="column is-6 is-offset-3">
              <img class="m-b-20" src="{{ Storage::disk('spaces')->url('website_images/arrow.svg') }}" alt="arrow">
            </div>
          </div>
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-centered has-text-weight-bold">Problemas Públicos</p>
          <p>Apoyamos a una variedad de clientes que desean desarrollar proyectos o intervenciones para mejorar las oportunidades o condiciones de vida de la población latinoamericana, así como el desarrollo económico de la región, con especial énfasis en México y Colombia.</p>
        </div>
        <div class="column is-6 has-background-grey-dark" style="padding:10%;">
          <div class="columns">
            <div class="column is-6 is-offset-3">
              <img class="m-b-20" src="{{ Storage::disk('spaces')->url('website_images/circles.svg') }}" alt="circirclescle">
            </div>
          </div>
          <p class="is-size-4-desktop is-uppercase m-b-10 has-text-white has-text-centered has-text-weight-bold">Iniciativas Públicas</p>
          <p class="has-text-white">Apoyamos a una variedad de clientes que desean desarrollar proyectos o intervenciones para mejorar las oportunidades o condiciones de vida de la población latinoamericana, así como el desarrollo económico de la región, con especial énfasis en México y Colombia.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="columns">
    <div class="column">

    </div>
  </div>
@endsection
