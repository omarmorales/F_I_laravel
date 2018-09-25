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
    <nav v-if="pagination.from != pagination.last_page" class="pagination is-rounded" role="navigation" aria-label="pagination">
      <a class="pagination-previous" title="This is the first page" :disabled="!pagination.prev_page_url" @click="loadPosts(pagination.prev_page_url)">Previous</a>
      <a class="pagination-next" @click="loadPosts(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next page</a>
      <!-- <ul class="pagination-list">
        <li>
          <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">{{pagination.current_page}}</a>
        </li>
        <li>
          <a class="pagination-link" aria-label="Goto page 2">2</a>
        </li>
        <li>
          <a class="pagination-link" aria-label="Goto page 3">3</a>
        </li>
      </ul> -->
      <span class="pagination-list">Page {{pagination.current_page}} of {{pagination.last_page}}</span>
    </nav>
  </div>
</template>

<script>
export default {
  data(){
    return {
      posts: [],
      pagination: {}
    }
  },

  methods: {
    loadPosts(first_page_url){
      first_page_url = first_page_url || '/api/post';
      let vm = this;
      axios.get(first_page_url).then((response) => {
        console.log(response);
        this.posts = response.data.data;
        vm.makePagination(response.data);
      })
    },
    makePagination(data) {
      let pagination = {
        from: data.from,
        to: data.to,
        current_page: data.current_page,
        last_page: data.last_page,
        next_page_url: data.next_page_url,
        prev_page_url: data.prev_page_url
      }
      this.pagination = pagination
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
