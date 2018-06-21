@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('employees.SectionTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('employees.IndexTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('employees.IndexTitle')</h1>
    <div class="columns is-multiline">
      @foreach ($employees as $employee)
        <div class="column is-half">
          <div class="box">
            <article class="media">
              <div class="media-left">
                <a href="{{ route('employees.show', $employee->id) }}">
                  <figure class="image is-64x64">
                    <img src="{{ asset('storage/thumbnails/'.$employee->thumbnail) }}" alt="{{ $employee->name }}">
                  </figure>
                </a>
              </div>
              <div class="media-content">
                @if (App::isLocale('en'))
                  <div class="content">
                    <p>
                      <strong>{{ $employee->name }}</strong> <small>{{ $employee->job_title }}</small>
                      <br>
                      {{ str_limit($employee->description,120) }}
                    </p>
                  </div>
                @elseif (App::isLocale('es'))
                  <div class="content">
                    <p>
                      <strong>{{ $employee->name }}</strong> <small>{{ $employee->puesto }}</small>
                      <br>
                      {{ str_limit($employee->descripcion,120) }}
                    </p>
                  </div>
                @endif
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a href="{{ route('employees.show',$employee->id) }}" class="level-item" aria-label="show">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-eye" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a href="{{ route('employees.edit',$employee->id) }}" class="level-item" aria-label="edit">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-edit" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a class="level-item toggle-modal" aria-label="delete" v-on:click="isActive{{ $employee->id }} = !isActive{{ $employee->id }}">
                      <span class="icon is-small has-text-danger">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </span>
                    </a>
                  </div>
                  <div class="level-right">
                    @if ($employee->public == "true")
                      <span class="tag"><i class="fas fa-globe m-r-5"></i>@lang('employees.public_txt')</span>
                    @else
                      <span class="tag"><i class="fas fa-lock m-r-5"></i>@lang('employees.private')</span>
                    @endif
                  </div>
                </nav>
              </div>
            </article>
          </div>
        </div>
        <div id="modal" class="modal" v-bind:class="{ 'is-active': isActive{{ $employee->id }} }">
          <div class="modal-background"></div>
          <div class="modal-content">
            <div class="box">
              <article class="media">
                <div class="media-left">
                  <figure class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                  </figure>
                </div>
                <div class="media-content">
                  <div class="content">
                    <p>
                      <strong>{{ $employee->name }}</strong> <small>@johnsmith</small> <small>31m</small>
                      <br>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                    </p>
                  </div>
                  <nav class="level is-mobile">
                    <div class="level-left">
                      <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                          <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                      </a>
                      <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                          <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                      </a>
                      <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                          <i class="fas fa-heart" aria-hidden="true"></i>
                        </span>
                      </a>
                    </div>
                  </nav>
                </div>
              </article>
            </div>
          </div>
          <button class="modal-close is-large" aria-label="close" v-on:click="isActive{{ $employee->id }} = !isActive{{ $employee->id }}"></button>
        </div>
      @endforeach
    </div>

    {{ $employees->links() }}

    <b-tooltip label="@lang('employees.createTxt')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('employees.create') }}" class="button-float button-round">
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
          @foreach ($employees as $employee)
            isActive{{ $employee->id }}: false,
          @endforeach
        },
      });
    }
  </script>
@endsection
