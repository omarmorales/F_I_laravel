@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('vacancies.SectionTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('vacancies.IndexTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('vacancies.IndexTitle')</h1>
    <div class="columns is-multiline">
      @foreach ($vacancies as $vacancy)
        <div class="column is-one-half">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  @if (App::isLocale('en'))
                    <p>
                      <strong>{{ $vacancy->name }}</strong> <small>(Created {{ $vacancy->created_at->diffForHumans() }})</small>
                      <br>
                      {!! str_limit($vacancy->requirements,600) !!}
                    </p>
                  @else
                    <p>
                      <strong>{{ $vacancy->name_es }}</strong> <small>(Created {{ $vacancy->created_at->diffForHumans() }})</small>
                      <br>
                      {!! str_limit($vacancy->requirements_es,400) !!}
                    </p>
                  @endif
                </div>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a href="{{ route('vacancies.show',$vacancy->id) }}" class="level-item" aria-label="show">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-eye" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a href="{{ route('vacancies.edit',$vacancy->id) }}" class="level-item" aria-label="edit">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-edit" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a class="level-item toggle-modal" aria-label="delete" v-on:click="isActive{{ $vacancy->id }} = !isActive{{ $vacancy->id }}">
                      <span class="icon is-small has-text-danger">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </span>
                    </a>
                  </div>
                  <div class="level-right">
                    @if ($vacancy->public == "true")
                      <span class="tag"><i class="fas fa-globe m-r-5"></i>@lang('vacancies.public_txt')</span>
                    @else
                      <span class="tag"><i class="fas fa-lock m-r-5"></i>@lang('vacancies.private')</span>
                    @endif
                  </div>
                </nav>
              </div>
            </article>
          </div>
        </div>

        <div id="modal" class="modal" v-bind:class="{ 'is-active': isActive{{ $vacancy->id }} }">
          <div class="modal-background"></div>
          <div class="modal-content">
            <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="POST">
              {{csrf_field()}}
              {{ method_field('DELETE') }}

              <div class="notification">
                <div class="columns">
                  <div class="column is-2 has-text-centered">
                    <i class="fas fa-trash has-text-danger is-size-1"></i>
                  </div>
                  <div class="column is-10">
                    <p class="is-size-5">Are you sure you want to delete <strong>{{ $vacancy->name }}</strong> from the database? <small>This action cannot be undone.</small></p>
                  </div>
                </div>
                <div class="field is-grouped is-grouped-right">
                  <div class="control">
                    <a class="button is-light" v-on:click="isActive{{ $vacancy->id }} = !isActive{{ $vacancy->id }}">Cancel</a>
                  </div>
                  <div class="control">
                    <button class="button is-danger">Delete</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <button class="modal-close is-large" aria-label="close" v-on:click="isActive{{ $vacancy->id }} = !isActive{{ $vacancy->id }}"></button>
        </div>
      @endforeach
    </div>

    {{ $vacancies->links() }}

    <b-tooltip label="@lang('vacancies.createTxt')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('vacancies.create') }}" class="button-float button-round">
        <span class="fas fa-plus"></span>
      </a>
    </b-tooltip>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
          @foreach ($vacancies as $vacancy)
            isActive{{ $vacancy->id }}: false,
          @endforeach
        }
      });
    }
  </script>
@endsection
