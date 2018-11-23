<style media="screen">
  .min-fullheight {
    min-height: 50vh;
  }
</style>

<template>
  <div class="container min-fullheight">
    <div class="column is-12 m-t-10">
      <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="http://www.fundacionidea.org.mx">Inicio</a></li>
          <li class="is-active"><a href="#" aria-current="page">Vacantes</a></li>
        </ul>
      </nav>
    </div>

    <div class="column is-12">
      <h2 class="is-size-1 has-text-weight-light">Vacantes</h2>
      <hr class="small-separator m-b-10">
    </div>

    <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-mobile is-multiline m-b-30 m-t-10">
      <div class="column is-12" v-for="(vacancy,index) in vacancies" :data-index="index" :key="vacancy.id">
        <div class="box">
          <div class="columns">
            <div class="column is-3" style="background-image: url('/images/vacancy_thumbnail.png'); height: 250px; background-size: cover; background-repeat: no-repeat; background-position: center center;">
            </div>
            <div class="column is-9">
              <article class="media">
                <div class="content">
                  <p class="subtitle is-6">
                    <i class="fas fa-clock m-r-5"></i>
                    Creado en {{ vacancy.created_at | myDate }} a la(s) {{ vacancy.created_at | myTime }}
                  </p>

                  <p class="title is-4 has-text-weight-light m-t-10">
                    {{ vacancy.name_es }}
                  </p>
                  <p v-html="$options.filters.vacancyRequirements(vacancy.requirements)"></p>
                  <a :href="'vacancies/'+ vacancy.id" class="has-text-link">
                    Leer más
                    <i class="fas fa-angle-right m-l-5"></i>
                  </a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  data(){
    return {
      vacancies: []
    }
  },

  methods: {
    loadVacancies(){
      let vm = this;
      axios.get('api/vacancy').then((response) => {
        this.vacancies = response.data;
        console.log(response.data);
      })
    },
    beforeEnter(el){
      el.style.opacity = 0;
      el.style.transform = "scale(0)";
      el.style.transition = "all 0.2s cubic-bezier(0.4, 0.0, 0.2, 1)";
    },
    enter(el){
      const delay = 200 * el.dataset.index;
      setTimeout(()=>{
        el.style.opacity = 1;
        el.style.transform = "scale(1)";
      },delay)

    },
    leave(el){
      el.style.opacity = 0;
      el.style.transform = "scale(0)";
    }
  },

  created() {
    this.loadVacancies();
  },

  computed: {

  }
}
</script>
