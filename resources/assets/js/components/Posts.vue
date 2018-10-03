<style media="screen">
  .post-header-card {
    min-height:130px;
  }

  .min-fullheight {
    min-height: 50vh;
  }
</style>

<template>
  <div>
    <section class="hero blue-gradient is-bold is-hidden-touch">
      <div class="hero-body js-section" style="margin-top:2em; margin-bottom:1em;">
        <div class="container">
          <div class="columns is-mobile">
            <div class="column is-8">
              <a href="">
                <img src="http://67.205.181.253/images/logoBig.png" alt="C230 Consultores logo">
              </a>
            </div>
            <div class="column">
              <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <div class="field m-t-20">
                <p class="control has-icons-right">
                  <input class="input" type="email" placeholder="Palabra clave" v-model="search">
                  <span class="icon is-small is-right">
                    <i class="fas fa-search"></i>
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <div class="tabs is-centered m-t-10">
                <ul id="tabs-menu-tags" v-for="tag in tags">
                  <li><a class="has-text-white is-uppercase is-size-6" @click="setNewValue(tag)">{{ tag }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container min-fullheight">
      <h2 class="subtitle m-t-20">Nuestras publicaciones</h2>
      <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-mobile is-multiline m-b-30 m-t-10">
        <div class="column is-12-mobile is-half-tablet is-one-third-desktop" v-for="(post,index) in filteredPosts" :data-index="index" :key="post.id">
          <div class="card">
            <header class="card-header has-background-link post-header-card">
              <p style="margin:1em;" v-for="tag in post.tags" :key="tag.id">
                <a @click="setNewValue(tag.name)"><b-tag class="m-b-10 is-uppercase" type="is-success">{{ tag.name }}</b-tag></a>
                <br>
                <a :href="'posts/'+ post.id" class="is-size-6 has-text-white">{{ post.title_es | first-characters }}</a>
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
  </div>
</template>

<script>
export default {
  data(){
    return {
      tag_selected: '',
      isActive: false,
      posts: [],
      tags: [],
      search: '',
    }
  },

  methods: {
    loadPosts(){
      let vm = this;
      axios.get('api/post').then((response) => {
        this.posts = response.data;
        console.log(response.data);
        vm.getTags(response.data);
      })
    },
    getTags(data){
      let vm = this;
      let all_tags = [];
      for (let x = 0; x < data.length; x++) {
        for (var i = 0; i < data[x].tags.length; i++) {
          all_tags.push(data[x].tags[i].name);
        }
      }
      vm.uniqueTags(all_tags);
    },
    uniqueTags(all_tags){
      let tags = all_tags.filter(function(elem, index, self){
        return index == self.indexOf(elem);
      });
      this.tags = tags;
    },
    setNewValue(value){
      this.tag_selected = value;
      console.log(this.tag_selected)
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
      let reg = new RegExp(this.search, "i");
      if (this.tag_selected == "") {
        return this.posts.filter(post => {return post.title_es.match(reg) || post.title.match(reg)});
      } else {
        return this.posts.filter(post => {
          for (var i = 0; i < post.tags.length; i++) {
            return post.tags[i].name.match(this.tag_selected || this.posts.filter(post => {return post.title_es.match(reg) || post.title.match(reg)}))
          }
        });
      }
    }
  }
}
</script>
