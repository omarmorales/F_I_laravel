<template>
  <div>
    <div class="filters-sidenav has-background-link" v-bind:class="{ 'filters-sidenav-active' : sidenavOpen }">
      <aside class="menu has-background-link m-l-10">
        <button class="modal-close is-large sidenav-close-btn" aria-label="close" @click="openSidenav"></button>
        <p class="menu-label">
          <a href="http://www.fundacionidea.org.mx/">
            <img class="sidenav-logo" src="http://www.fundacionidea.org.mx/images/logo.png" alt="C230 Consultores logo">
          </a>
        </p>
        <p class="menu-label has-text-white">
          Temas
        </p>
        <ul class="menu-list" v-for="tag in tags">
          <li><a class="has-text-white is-uppercase" @click="setNewValue(tag)">{{ tag }}</a></li>
        </ul>
      </aside>
    </div>
    <a class="button sidenav-trigger is-hidden-desktop" @click="openSidenav">
      <span class="icon has-text-info">
        <i class="fas fa-filter"></i>
      </span>
    </a>
    <section class="hero blue-gradient is-bold is-hidden-touch filters">
      <div class="hero-body js-section" style="margin-top:2em;padding-bottom: 25px;">
        <div class="container">
          <div class="columns is-mobile">
            <div class="column is-8">
              <a href="">
                <img src="http://www.fundacionidea.org.mx/images/logoBig.png" alt="C230 Consultores logo">
              </a>
            </div>
            <div class="column">
              <p class="has-text-white">Somos Fundación IDEA, uno de los primeros think tanks de política pública en México</p>
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <div class="field has-addons m-t-20">
                <div class="control" style="width:100%;">
                  <input class="input" type="text" placeholder="Palabra clave" @keyup.enter="searchit" v-model="search1">
                </div>
                <div class="control">
                  <a class="button is-info" @click="searchit">
                    <i class="fas fa-search"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <div class="tabs is-centered">
                <ul id="tabs-menu-tags" v-for="tag in tags">
                  <li><a class="has-text-white is-uppercase tags-font-size is-paddingless" @click="setNewValue(tag)">{{ tag }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container min-fullheight posts" v-if="posts.length >= 1">
      <div class="columns is-multiline">
        <div class="column is-12-mobile is-12-tablet is-8-desktop is-hidden-desktop">
          <h2 class="subtitle m-t-75 is-hidden-desktop has-text-link m-b-5">Publicaciones</h2>
          <hr class="separator-posts">
          <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-mobile is-multiline m-b-30 m-t-10">
            <div class="column is-12-mobile is-half-tablet is-half-desktop" v-for="(post,index) in posts" :data-index="index" :key="post.id">
              <div class="card">
                <header class="card-header has-background-link post-header-card">
                  <p style="margin:1em;">
                    <a @click="setNewValue(tag.name)" v-for="tag in post.tags" :key="tag.id">
                      <b-tag class="m-b-10 is-uppercase is-size-7 m-r-5" type="is-success">{{ tag.name }}</b-tag>
                    </a>
                    <br>
                    <a :href="'posts/'+ post.id" class=" has-text-white post-font-size has-text-weight-semibold">{{ post.title_es | first-characters }}</a>
                  </p>
                  <span class="tag is-white is-medium year-tag">{{ post.publication_date | myYear }}</span>
                </header>
                <div class="card-image">
                  <a :href="'posts/'+ post.id">
                    <figure class="image is-4by3">
                      <img :src="'/storage/thumbnails/'+ post.thumbnail">
                    </figure>
                  </a>
                </div>
              </div>
            </div>
          </transition-group>
        </div>
        <div class="column is-12-mobile is-12-tablet is-8-desktop is-hidden-touch" v-if="generalPosts.length >= 1" v-bind:class = "(generalPosts.length >= 1 && pressPosts.length == 0)?'is-12-desktop':'is-8-desktop'">
          <h2 class="subtitle m-t-20 is-hidden-touch has-text-link m-b-5">Publicaciones</h2>
          <hr class="separator-posts">
          <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-mobile is-multiline m-b-30 m-t-10">
            <div class="column is-12-mobile is-half-tablet is-half-desktop" v-for="(post,index) in generalPosts" :data-index="index" :key="post.id" v-bind:class = "(generalPosts.length >= 1 && pressPosts.length == 0)?'is-4-desktop':'is-half-desktop'">
              <div class="card">
                <header class="card-header has-background-link post-header-card">
                  <p style="margin:1em;">
                    <a @click="setNewValue(tag.name)" v-for="tag in post.tags" :key="tag.id">
                      <b-tag class="m-b-10 is-uppercase is-size-7 m-r-5" type="is-success">{{ tag.name }}</b-tag>
                    </a>
                    <br>
                    <a :href="'posts/'+ post.id" class=" has-text-white post-font-size has-text-weight-semibold">{{ post.title_es | first-characters }}</a>
                  </p>
                  <span class="tag is-white is-medium year-tag">{{ post.publication_date | myYear }}</span>
                </header>
                <div class="card-image">
                  <a :href="'posts/'+ post.id">
                    <figure class="image is-4by3">
                      <img :src="'/storage/thumbnails/'+ post.thumbnail">
                    </figure>
                  </a>
                </div>
              </div>
            </div>
          </transition-group>
        </div>
        <div class="column is-12-mobile is-12-tablet is-hidden-touch" v-if="pressPosts.length >= 1" v-bind:class = "(pressPosts.length >= 1 && generalPosts.length == 0)?'is-12-desktop':'is-4-desktop'">
          <h2 class="subtitle m-t-20 is-hidden-touch has-text-link m-b-5">Prensa</h2>
          <h2 class="subtitle m-t-75 is-hidden-desktop has-text-link m-b-5">Prensa</h2>
          <hr class="separator-posts">
          <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-mobile is-multiline m-b-30 m-t-10">
            <div class="column is-12-mobile is-12-tablet" v-for="(post,index) in pressPosts" :data-index="index" :key="post.id" v-bind:class = "(pressPosts.length >= 1 && generalPosts == 0)?'is-4-desktop':'is-12-desktop'">
              <div class="card">
                <header class="card-header has-background-white post-header-card">
                  <p style="margin:1em;">
                    <a @click="setNewValue(tag.name)" v-for="tag in post.tags" :key="tag.id">
                      <b-tag class="m-b-10 is-uppercase is-size-7 m-r-5" type="is-success">{{ tag.name }}</b-tag>
                    </a>
                    <br>
                    <a :href="'posts/'+ post.id" class=" has-text-link post-font-size has-text-weight-semibold">{{ post.title_es | first-characters }}</a>
                  </p>
                  <span class="tag is-white is-medium year-tag">{{ post.publication_date | myYear }}</span>
                </header>
                <div class="card-image">
                  <a :href="'posts/'+ post.id">
                    <figure class="image is-4by3">
                      <img :src="'/storage/thumbnails/'+ post.thumbnail">
                    </figure>
                  </a>
                </div>
              </div>
            </div>
          </transition-group>
        </div>
      </div>
    </div>
    <div class="container min-fullheight posts" v-else>
      <h2 class="subtitle m-t-20 has-text-link">No se han encontrado resultados.</h2>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      tag_selected: '',
      isActive: false,
      sidenavOpen: false,
      pressPosts: {},
      generalPosts: {},
      posts: {},
      tags: [],
      search1: ''
    }
  },
  methods: {
    searchit(){
      Fire.$emit('searching');
    },
    openSidenav(){
      this.sidenavOpen = !this.sidenavOpen;
    },
    loadPosts(){
      let vm = this;
      axios.get('api/post').then((response) => {
        this.posts = response.data;
        vm.getTags(response.data);
      });
      axios.get('api/pressPosts').then((response) => {this.pressPosts = response.data});
      axios.get('api/generalPosts').then((response) => {this.generalPosts = response.data});
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
      this.sidenavOpen = false;
      this.search1 = ""
      this.tag_selected = value;
      Fire.$emit('load_filtered_data');
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
    console.log(this.$router);
    Fire.$on('searching', () => {
      let query = this.search1;
      this.tag_selected = "";
      axios.get('api/findPost?q=' + query).then((data) => {
        this.posts = data.data
      }).catch(() => {

      })
      axios.get('api/findPressPost?q=' + query).then((data) => {
        this.pressPosts = data.data
      }).catch(() => {

      })
      axios.get('api/findGeneralPost?q=' + query).then((data) => {
        this.generalPosts = data.data
      }).catch(() => {

      })
    });
    Fire.$on('load_filtered_data', () => {
      axios.get('api/findPostbyTag?q=' + this.tag_selected).then((data) => {
        this.posts = data.data
      }).catch(() => {

      })
      axios.get('api/findGeneralPostbyTag?q=' + this.tag_selected).then((data) => {
        this.generalPosts = data.data
      }).catch(() => {

      })
      axios.get('api/findPressPostbyTag?q=' + this.tag_selected).then((data) => {
        this.pressPosts = data.data
      }).catch(() => {

      })
    })
    this.loadPosts();
  },
}

let filters = document.getElementsByClassName("filters");
let posts = document.getElementsByClassName("posts");
let logo = document.getElementsByClassName("logo");

window.onscroll = function() {
  if (document.body.scrollTop >= 150 || document.documentElement.scrollTop > 150) {
    // filters[0].style.backgroundColor = "red";
    filters[0].classList.add("fix-filters");
    posts[0].classList.add("posts-with-filters");
    logo[0].classList.remove("is-hidden-desktop");

  } else {
    filters[0].classList.remove("fix-filters");
    posts[0].classList.remove("posts-with-filters");
    logo[0].classList.add("is-hidden-desktop");
  }
};
</script>

<style media="screen">
  .post-header-card {
    min-height:150px;
  }

  .min-fullheight {
    min-height: 50vh;
  }
  .tags-font-size {
    font-size: .9em;
  }
  .post-font-size {
    font-size: .95em;
  }
  .fix-filters{
    position: fixed;
    width: 100%;
    top: -120px;
    z-index: 10;
  }

  .posts-with-filters{
    margin-top: 250px;
  }

  .year-tag {
    position: absolute;
    right: 5px;
    bottom: 5px;
    z-index: 5;
  }

  .sidenav-trigger {
    position: fixed;
    left: 10px;
    top: 100px;
    z-index: 10;
  }
  .filters-sidenav{
    height: 100%;
    width: 0;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 10px;
    overflow-x: hidden;
    overflow-y: scroll;
    transition: 0.5s;
    z-index: 200;
    background-color: white;
  }

  .filters-sidenav-active{
    width:250px;
  }

  .sidenav-logo{
    height: 50px;
  }

  .sidenav-close-btn{
    position: absolute;
    right: 10px;
    top: 10px;
  }

  .separator-posts{
    border: 1px solid #3fa9f5;
    width: 20%;
    margin-top: 0;
  }
</style>
