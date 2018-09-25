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
    <transition-group tag="div" :css="false" name="fadeIn" @before-enter="beforeEnter" @enter="enter" @leave="leave" class="columns is-multiline m-b-30 m-t-30">
      <div class="column is-4" v-for="(post,index) in posts" :data-index="index" :key="post.id">
        <div class="card">
          <header class="card-header has-background-link post-header-card">
            <p style="margin:1em;" v-for="tag in post.tags" :key="tag.id">
              <a href="#"><b-tag class="m-b-10 is-uppercase" type="is-success">{{ tag.name }}</b-tag></a>
              <br>
              <span v-if="post.title.length>=50" class="is-size-5 has-text-white is-capitalized">{{ post.title_es.substring(0,50)+".." }}</span>
              <span v-else class="is-size-5 has-text-white is-capitalized">{{ post.title_es }}</span>
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
      posts: {}
    }
  },
  methods: {
    loadPosts(){
      axios.get("api/post").then(({data}) => (this.posts = data.data));
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

  }
}
</script>
