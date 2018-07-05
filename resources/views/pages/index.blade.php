@extends('layouts.site')

@section('content')
  <div id="slider">
    <div class="cont">
      <div class="container-image img1" style="background-image: url({{ Storage::disk('spaces')->url('website_images/bus.jpg') }});">
        <div class="content">
          <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-5">Proyecto destacado</p>
          <p class="is-size-1-desktop is-size-3-touch has-text-weight-bold m-b-5">Reducción de traslados laborales</p>
          <p class="is-size-5-desktop is-size-6-touch">¿Se puede reducir la emisión de gases de efectos contaminantes y mejorar el bienestar de los trabajadores al mismo tiempo que se reduce el congestionamiento vehicular?</p>
        </div>
      </div>
      <div class="container-image img2" style="background-image: url({{ Storage::disk('spaces')->url('website_images/march.jpg') }});">
        <div class="content">
          <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-5">Proyecto destacado</p>
          <p class="is-size-1-desktop has-text-weight-bold m-b-5 is-hidden-touch">
            Diagnóstico  sobre los vínculos entre la inseguridad pública y la violencia basada en género en México
          </p>
          <p class="is-size-3-touch is-hidden-desktop has-text-weight-bold m-b-5">
            {!! str_limit("Diagnóstico  sobre los vínculos entre la inseguridad pública y la violencia basada en género en México",60) !!}
          </p>
          <p class="is-size-5-desktop is-size-6-touch">
            ¿La inseguridad pública se experimenta de manera distinta en mujeres y hombres?
          </p>
        </div>
      </div>
      <div class="container-image img3" style="background-image: url({{ Storage::disk('spaces')->url('website_images/business.jpg') }});">
        <div class="content">
          <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-5">Proyecto destacado</p>
          <p class="is-size-1-desktop is-size-3-touch has-text-weight-bold m-b-5">Mejora Regulatoria</p>
          <p class="is-size-5-desktop is-size-6-touch">
            ¿Las regulaciones gubernamentales fomentan o restringen la actividad empresarial? La simplificación administrativa de procesos estatales y municipales promueve la eficiencia y el fortalecimiento de capacidades para lograr objetivos específicos de las administraciones.
          </p>
        </div>
      </div>
      <div class="container-image img4" style="background-image: url({{ Storage::disk('spaces')->url('website_images/poli.jpg') }});">
        <div class="content">
          <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-5">Proyecto destacado</p>
          <p class="is-size-1-desktop is-size-3-touch has-text-weight-bold m-b-5">Policía de Proximidad</p>
          <p class="is-size-5-desktop is-size-6-touch">
            ¿Cómo podemos mejorar la seguridad pública local integrando un enfoque de proximidad a las policías locales?
          </p>
        </div>
      </div>
    </div>
    <div class="controls">
      <ul></ul>
    </div>
  </div>

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column has-background-grey-dark">
      <section class="hero is-fullheight has-background-grey-dark js-section">
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

  <div class="columns" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column is-7 has-background-white">
      <section class="hero is-medium">
        <div class="hero-body">
          <div class="columns ">
            <div class="column is-8 is-offset-2 has-text-weight-light ">
              <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">¿Qué hacemos?</h2>
              <hr class="separator">
              <p class="is-size-4-desktop is-uppercase has-text-weight-normal m-b-10">Asesoramos la toma de decisiones</p>
              <p class="is-size-5-desktop">Ayudamos a resolver problemas y añadimos valor a los proyectos de cada uno de nuestros clientes.</p>
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

  <div class="columns is-hidden-touch" style="margin-right:0; margin-left:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column orange-gradient">
      <section class="hero">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-10 is-offset-1 has-text-centered has-text-white has-text-weight-light ">
              <h2 class="is-size-2-desktop m-b-15">Únete a C230 Consultores</h2>
              <p class="is-size-5-desktop is-size-6-touch">Estamos constantemente en búsqueda de talento.</p>
              <p class="is-size-5-desktop is-size-6-touch m-b-15">Si estas interesado en ingresar a C230 Consultores, revisa nuestras vacantes:</p>
              <a href="{{route('sitevacancies')}}" class="button is-link is-inverted is-outlined">Ir a vacantes</a>
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

      <section class="hero">
        <div class="hero-body">
          <div class="container">
            <div class="columns">
              <div class="column is-6">
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
              <div class="column is-6">
                <figure class="image ww_image">
                  <img src="{{ Storage::disk('spaces')->url('website_images/graph.png') }}" alt="graph">
                </figure>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="hero">
        <div class="hero-body">
          <div class="container">
            <div class="columns">
              <div class="column is-6 is-hidden-touch">
                <figure class="image ww_image">
                  <img src="{{ Storage::disk('spaces')->url('website_images/laptop.png') }}" alt="laptop">
                </figure>
              </div>
              <div class="column is-6">
                <div class="ww_card">
                  <h2 class="is-size-0-desktop is-size-2-touch has-text-weight-light">Proyectos</h2>
                  <hr class="separator">
                  <p class="is-size-5-desktop is-size-6-touch">
                    Desde hace 11 años hemos realizado proyectos en diversos sectores y para múltiples clientes lo cual nos ha brindado una experiencia única en consultoría en Latinoamérica.
                  </p>
                </div>
              </div>
              <div class="column is-6 is-hidden-desktop">
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

  <div class="columns is-hidden-desktop" style="margin-right:0; margin-left:0; margin-bottom:0;">
    <div class="column is-narrow is-hidden-touch">
      <div style="width: 250px;">
      </div>
    </div>
    <div class="column orange-gradient">
      <section class="hero">
        <div class="hero-body">
          <div class="columns">
            <div class="column is-10 is-offset-1 has-text-centered has-text-white has-text-weight-light ">
              <h2 class="is-size-2-desktop m-b-15">Únete a C230 Consultores</h2>
              <p class="is-size-5-desktop is-size-6-touch">Estamos constantemente en búsqueda de talento.</p>
              <p class="is-size-5-desktop is-size-6-touch m-b-15">Si estas interesado en ingresar a C230 Consultores, revisa nuestras vacantes:</p>
              <a href="{{route('sitevacancies')}}" class="button is-link is-inverted is-outlined">Ir a vacantes</a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>


  <b-tooltip label="Volver al inicio" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
    <a id="js-btn" class="button-float button-round">
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

      let logo_dark = document.getElementById("logo_dark");
      let logo_white = document.getElementById("logo_white");
      let aboutus =  document.getElementById("aboutus");
      let whatwedo =  document.getElementById("whatwedo");
      let vacancies =  document.getElementById("vacancies");

      window.onscroll = function () {
        if (document.body.scrollTop >= 300 || document.documentElement.scrollTop > 300) {
          logo_white.classList.add("is-hidden");
          logo_dark.classList.remove("is-hidden");
          aboutus.classList.remove("has-text-white");
          whatwedo.classList.remove("has-text-white");
          vacancies.classList.remove("has-text-white");
        } else {
          logo_white.classList.remove("is-hidden");
          logo_dark.classList.add("is-hidden");
          aboutus.classList.add("has-text-white");
          whatwedo.classList.add("has-text-white");
          vacancies.classList.add("has-text-white");
        }
      };

      function scrollIt(element) {
        window.scrollTo({
          'behavior': 'smooth',
          'left': 0,
          'top': element.offsetTop
        });
      }

      const btn = document.getElementById('js-btn');
      const section = document.querySelector('.js-section');

      btn.addEventListener('click', function() {
        scrollIt(section);
      });

      class IndexForSiblings{
        static get(el){
          let children = el.parentNode.children;

          for (var i = 0; i < children.length; i++) {
            let child = children[i];
            if(child == el) return i;
          }
        }
      }

      class Slider{
        constructor(selector,movimiento=true){
          this.move = this.move.bind(this);
          this.moveByButton = this.moveByButton.bind(this);
          this.slider = document.querySelector(selector);
          this.itemsCount = this.slider.querySelectorAll(".cont > *").length;
          this.interval = null;
          this.contador = 0;
          this.movimiento = movimiento;

          this.start();
          this.buildControls();
          this.bindEvents();
        }

        start(){
          if(!this.movimiento) return;
          this.interval = window.setInterval(this.move,10000);
        }

        restart(){
          if(this.interval) window.clearInterval(this.interval);
          this.start();
        }

        bindEvents(){
          this.slider.querySelectorAll(".controls li")
              .forEach(item =>{

                item.addEventListener("click",this.moveByButton)
              });
        }

        moveByButton(ev){
          let index = IndexForSiblings.get(ev.currentTarget);
          this.contador = index;
          this.moveTo(index);
          this.restart();
        }

        buildControls(){
          for (var i = 0; i < this.itemsCount; i++) {
            let control = document.createElement("li");

            if(i == 0) control.classList.add("active");

            this.slider.querySelector(".controls ul").appendChild(control);
          }
        }

        move(){
          this.contador++;
          if(this.contador > this.itemsCount - 1) this.contador = 0;
          this.moveTo(this.contador);
        }

        resetIndicator(){
          this.slider.querySelectorAll(".controls li.active")
              .forEach(item => item.classList.remove("active"));
        }

        moveTo(index){
          let left = index * 100;

          this.resetIndicator();
          this.slider.querySelector(".controls li:nth-child("+(index+1)+")").classList.add("active");

          this.slider.querySelector(".cont").style.left = "-"+left+"%";
        }
      }

      (function(){

        new Slider("#slider",true);

      })();
    }
  </script>
@endsection
