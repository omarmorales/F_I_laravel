<template lang="html">
  <div class="container">
    <a class="button toggle-modal">Create New Vacancy</a>
    <div class="modal" id="modal">
      <div class="modal-background"></div>
      <form @submit.prevent="addVacancy">
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">New Vacancy</p>
            <button class="delete toggle-modal" aria-label="close"></button>
          </header>
          <section class="modal-card-body">
            <!-- Content ... -->
            <b-tabs type="is-boxed">
                <b-tab-item label="English">
                  <div class="field">
                    <div class="control">
                      <label class="label">Name</label>
                      <input class="input" type="text" placeholder="Name" v-model="vacancy.name">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Requirements</label>
                    <div class="control">
                      <textarea class="textarea" placeholder="Requirements" v-model="vacancy.requirements"></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                      <textarea class="textarea" placeholder="Description" v-model="vacancy.description"></textarea>
                    </div>
                  </div>
                </b-tab-item>
                <b-tab-item label="Spanish">
                  <div class="field">
                    <div class="control">
                      <label class="label">Name</label>
                      <input class="input" type="text" placeholder="Name" v-model="vacancy.name_es">
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Requirements</label>
                    <div class="control">
                      <textarea class="textarea" placeholder="Requirements" v-model="vacancy.requirements_es"></textarea>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                      <textarea class="textarea" placeholder="Description" v-model="vacancy.description_es"></textarea>
                    </div>
                  </div>
                </b-tab-item>
            </b-tabs>
          </section>
          <footer class="modal-card-foot">
            <button type="submit" class="button is-success toggle-modal">Save changes</button>
            <button class="button toggle-modal">Cancel</button>
          </footer>
        </div>
      </form>
    </div>
    <nav class="pagination" role="navigation" aria-label="pagination">
      <a class="pagination-previous" @click="fetchVacancies(pagination.prev_page_url)" :disabled ="!pagination.prev_page_url">Previous</a>
      <a class="pagination-next" @click="fetchVacancies(pagination.next_page_url)" :disabled ="!pagination.next_page_url">Next page</a>
      <ul class="pagination-list">
        <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
      </ul>
    </nav>
    <div class="columns is-multiline">
      <div class="column is-one-quarter" v-for="vacancy in vacancies" v-bind:key="vacancy.id">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <h3>{{ vacancy.name }}</h3>
              <p>{{ vacancy.requirements }}</p>
              <p>{{ vacancy.description }}</p>
            </div>
          </div>
          <footer class="card-footer">
            <a @click="editVacancy(vacancy)" class="card-footer-item">Edit</a>
            <a @click="deleteVacancy(vacancy.id)" class="card-footer-item">Delete</a>
          </footer>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      activeTab:0,
      vacancies: [],
      vacancy: {
        id: '',
        name: '',
        requirements: '',
        description: '',
        name_es: '',
        requirements_es: '',
        description_es: ''
      },
      vacancy_id: '',
      pagination: {},
      edit: false
    }
  },

  created() {
    this.fetchVacancies();
  },

  methods: {
    fetchVacancies(page_url) {
      let vm = this;
      page_url = page_url || '../api/vacancies'
      fetch(page_url)
      .then(res => res.json())
      .then(res => {
        this.vacancies = res.data;
        vm.makePagination(res.meta, res.links);
      }).catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      }

      this.pagination = pagination;
    },
    deleteVacancy(id) {
      if (confirm('Are You Sure?')) {
        fetch(`../api/vacancy/${id}`, {
          method: 'delete'
        }).then(res => res.json())
        .then(data => {
          alert('Vacancy Removed');
          this.fetchVacancies();
        })
        .catch(err => console.log(err));
      }
    },
    addVacancy() {
      if(this.edit === false) {
        // Add
        fetch('../api/vacancy', {
          method: 'post',
          body: JSON.stringify(this.vacancy),
          headers: {
            'content-type': 'application/json'
          }
        }).then(res => res.json())
        .then(data => {
          this.vacancy.name = '';
          this.vacancy.requirements = '';
          this.vacancy.description = '';
          this.vacancy.name_es = '';
          this.vacancy.requirements_es = '';
          this.vacancy.description_es = '';
          alert('Vacancy Added');
          this.fetchVacancies();
        })
        .catch(err => console.log(err));
      } else {
        // Update
        fetch('../api/vacancy', {
          method: 'put',
          body: JSON.stringify(this.vacancy),
          headers: {
            'content-type': 'application/json'
          }
        }).then(res => res.json())
        .then(data => {
          this.vacancy.name = '';
          this.vacancy.requirements = '';
          this.vacancy.description = '';
          this.vacancy.name_es = '';
          this.vacancy.requirements_es = '';
          this.vacancy.description_es = '';
          alert('Vacancy Updated');
          this.fetchVacancies();
        })
        .catch(err => console.log(err));
      }
    },
    editVacancy(vacancy) {
      this.edit = true;
      this.vacancy.id = vacancy.id;
      this.vacancy.vacancy_id = vacancy.id;
      this.vacancy.name = vacancy.name;
      this.vacancy.requirements = vacancy.requirements;
      this.vacancy.description = vacancy.description;
      this.vacancy.name_es = vacancy.name_es;
      this.vacancy.requirements_es = vacancy.requirements_es;
      this.vacancy.description_es = vacancy.description_es;
    }
  }
}
</script>

<style lang="css">
</style>
