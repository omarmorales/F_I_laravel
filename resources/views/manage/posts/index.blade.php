@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('posts.SectionTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('posts.IndexTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('posts.IndexTitle')</h1>
    <b-field grouped group-multiline>
      <b-select v-model="perPage" :disabled="!isPaginated">
          <option value="5">5 per page</option>
          <option value="10">10 per page</option>
          <option value="15">15 per page</option>
          <option value="20">20 per page</option>
      </b-select>
      <div class="control">
          <button class="button" @click="currentPage = 1" :disabled="!isPaginated">Set page to 1</button>
      </div>
      <div class="control is-flex">
          <b-switch v-model="isPaginated">Paginated</b-switch>
      </div>
    </b-field>

    <div class="columns">
      <div class="column">
        <b-table
          :data="{{ $posts }}"
          :paginated="isPaginated"
          :per-page="perPage"
          :current-page.sync="currentPage"
          detailed
          detail-key="id"
          :pagination-simple="isPaginationSimple">

          <template slot-scope="props">
            <b-table-column field="title" label="Title" width="40" sortable>
              @{{ props.row.title }}
            </b-table-column>
            <b-table-column field="created_at" label="Created at" width="40" sortable centered>
              @{{ new Date(props.row.created_at).toLocaleDateString() }}
            </b-table-column>
            <b-table-column field="actions" label="Actions" width="40">
              <form :action="'{{ route('posts.index') }}'+'/'+props.row.id" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <a :href="'posts/'+ props.row.id+ '/edit'" class="button"><i class="fas fa-edit"></i></a>
                <button class="button is-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </b-table-column>
          </template>

          <template slot="detail" slot-scope="props">
            <article class="media">
              <figure class="media-left">
                <p class="image is-64x64">
                  <img :src="'https://bulma.io/images/placeholders/'+props.row.thumbnail">
                  @{{ props.row.thumbnail }}
                </p>
              </figure>
              <div class="media-content">
                <div class="content">
                  <p>
                    @{{ props.row.description }}
                  </p>
                </div>
              </div>
            </article>
          </template>
        </b-table>
      </div>
    </div>

    <b-tooltip label="@lang('posts.createTxt')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('posts.create') }}" class="button-float button-round">
        <span class="fas fa-plus"></span>
      </a>
    </b-tooltip>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        props: ['data_db'],
        el: '#app',
        data: {
          data: this.data,
          isPaginated: true,
          isPaginationSimple: false,
          currentPage: 1,
          perPage: 10
        }
      });
    }
  </script>
@endsection
