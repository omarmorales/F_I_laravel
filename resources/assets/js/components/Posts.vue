<style media="screen">
  .post-header-card {
    min-height:130px;
  }

  .min-fullheight {
    min-height: 50vh;
  }
</style>

<template>
  <div class="container min-fullheight">
    <div class="field m-t-20">
      <p class="control has-icons-right">
        <input class="input" type="email" placeholder="Palabra clave" v-model="search">
        <span class="icon is-small is-right">
          <i class="fas fa-search"></i>
        </span>
      </p>
    </div>
    <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-multiline m-b-30 m-t-30">
      <div class="column is-4" v-for="(post,index) in filteredPosts" :data-index="index" :key="post.id">
        <div class="card">
          <header class="card-header has-background-link post-header-card">
            <p style="margin:1em;" v-for="tag in post.tags" :key="tag.id">
              <a href="#"><b-tag class="m-b-10 is-uppercase" type="is-success">{{ tag.name }}</b-tag></a>
              <br>
              <span class="is-size-5 has-text-white is-capitalized">{{ post.title_es | first-characters }}</span>
            </p>
          </header>
          <div class="card-image">
            <a :href="'posts/'+ post.id">
              <figure class="image is-4by3">
                <img :src="'http://67.205.181.253/storage/thumbnails/'+ post.thumbnail">
              </figure>
            </a>
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
      posts: [],
      search: '',
    }
  },

  methods: {
    loadPosts(){
      axios.get('api/post').then((response) => {
        console.log(response);
        this.posts = response.data;
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
    this.loadPosts();
  },

  computed: {
    filteredPosts() {
      return this.posts.filter(post => {return post.title_es.match(this.search)});
    }
  }
}
</script>
