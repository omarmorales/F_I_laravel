@extends('layouts.site')

@section('content')
  <section class="hero blue-gradient is-bold is-hidden-touch">
    <div class="hero-body" style="margin:2em;">
      <div class="container">
        <div class="columns">
          <div class="column is-8">
            <a href="{{ route('index') }}">
              <img src="{{ asset('images/logoBig.png') }}" alt="C230 Consultores logo">
            </a>
          </div>
          <div class="column">
            <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="columns">
      <div class="column">
        <section class="hero">
          <div class="hero-body">
            <nav class="breadcrumb m-t-20" aria-label="breadcrumbs">
              <ul>
                <li><a href="{{ route('index') }}">Inicio</a></li>
                <li class="is-active"><a href="#" aria-current="page">Acerca</a></li>
              </ul>
            </nav>
            <h2 class="is-size-1 has-text-weight-light">Acerca</h2>
            <hr class="small-separator m-b-20">
            <div class="card">
              <div class="card-content">
                <div class="content">
                  <div class="columns">
                    <div class="column">
                      <p>
                        Fundación IDEA es uno de los primeros think tanks de política pública en México. Somos una organización sin fines de lucro, independiente y apartidista, cuya misión es diseñar y promover políticas públicas innovadoras que generan igualdad de oportunidades para los mexicanos a través del desarrollo económico y la reducción de la pobreza; así como ser una fuente confiable de análisis independiente para funcionarios de gobierno y el público en general.
                      </p>
                      <p>
                        En Fundación IDEA nos dedicamos a generar información y a diseñar políticas que influyan positivamente en el futuro de México. Nuestro país enfrenta muchas barreras que impiden su desarrollo ecómico sostenido así como la movilidad social y económica de su población más pobre.
                      </p>
                    </div>
                    <div class="column">
                      <p>En Fundación IDEA identificamos estas barreras y a tráves del análisis riguroso y la investigación impulsamos los cambios necesarios para influir en las decisiones públicas y realizar recomendaciones de políticas adecuadas.</p>
                      <p class="is-uppercase has-text-weight-semibold">Cómo trabajamos</p>
                      <p class="has-text-weight-semibold">Llevamos a cabo investigación y análisis de la más alta calidad para evaluar las políticas públicas vigentes.</p>
                      <p>
                        Ofrecemos propuestas creativas y políticamente factiles para resolver los problemas públicos de México.Utilizamos las mejores prácticas e ideas a nivel internacional. Nuestro análisis es riguroso y nuestras conclusiones se basan en evidencia confiable.
                      </p>
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
  </script>
@endsection
