@extends('layouts.site')

@section('headers')
  <meta name="description" content="Acerca de lo que hacemos en Fundación IDEA">
  <title>Fundación IDEA | Acerca de nosotros</title>
@endsection

@section('content')
  {{-- header fundacion idea starts --}}
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <a href="{{ route('index') }}">
              <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
            </a>
          </div>

          <div class="column is-4">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- header fundacion idea ends --}}

  {{-- content starts --}}
  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-12 m-t-10">
        <nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="{{ route('index') }}">Inicio</a></li>
            <li class="is-active"><a href="#" aria-current="page">Acerca</a></li>
          </ul>
        </nav>
      </div>

      <div class="column is-12">
        <h2 class="is-size-1 has-text-weight-light">Acerca</h2>
        <hr class="small-separator m-b-10">
      </div>

      <div class="box m-b-50">
        <div class="column is-12">
          <div class="columns is-multiline">
            <div class="column is-6">
              <p class="m-b-5">
                Fundación IDEA es uno de los primeros think tanks de política pública en México. Somos una organización sin fines de lucro, independiente y apartidista, cuya misión es diseñar y promover políticas públicas innovadoras que generan igualdad de oportunidades para los mexicanos a través del desarrollo económico y la reducción de la pobreza; así como ser una fuente confiable de análisis independiente para funcionarios de gobierno y el público en general.
              </p>
              <p>
                En Fundación IDEA nos dedicamos a generar información y a diseñar políticas que influyan positivamente en el futuro de México. Nuestro país enfrenta muchas barreras que impiden su desarrollo ecómico sostenido así como la movilidad social y económica de su población más pobre.
              </p>
            </div>
            <div class="column is-6">
              <p class="m-b-5">En Fundación IDEA identificamos estas barreras y a tráves del análisis riguroso y la investigación impulsamos los cambios necesarios para influir en las decisiones públicas y realizar recomendaciones de políticas adecuadas.</p>
              <p class="is-uppercase has-text-weight-semibold m-b-5">Cómo trabajamos</p>
              <p class="has-text-weight-semibold m-b-5">Llevamos a cabo investigación y análisis de la más alta calidad para evaluar las políticas públicas vigentes.</p>
              <p>
                Ofrecemos propuestas creativas y políticamente factiles para resolver los problemas públicos de México.Utilizamos las mejores prácticas e ideas a nivel internacional. Nuestro análisis es riguroso y nuestras conclusiones se basan en evidencia confiable.
              </p>
            </div>
          </div>
        </div>
      </div>
      {{-- content ends --}}
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
