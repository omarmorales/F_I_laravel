@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('applications.SectionTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">@lang('applications.IndexTitle')</a></li>
      </ul>
    </nav>

    <h1 class="title">@lang('applications.IndexTitle')</h1>
    <div class="columns is-multiline">
      @if (count($applications) == 0)
        <p class="m-l-10">There are no applications yet.</p>
      @else
        @foreach ($applications as $application)
          <div class="column is-half">
            <div class="box">
              <article class="media">
                <div class="media-content">
                  <div class="content">
                    <p>
                      <strong>{{ $application->name }} </strong><small>{{ $application->created_at->diffForHumans() }}</small>
                      <br>
                      <i class="far fa-envelope m-t-10"></i> {{ $application->email }}
                      <br>
                      <i class="fas fa-graduation-cap"></i> {{ $application->school }}
                    </p>
                  </div>
                  <nav class="level is-mobile">
                    <div class="level-left">
                      <a href="{{ Storage::disk('spaces')->url('motivation-letters/'.$application->motivation_letter) }}" class="level-item" aria-label="reply">
                        <span class="icon is-small has-text-info">
                          <b-tooltip label="Motivation letter" position="is-top" type="is-dark">
                            <i class="fas fa-file-alt" aria-hidden="true"></i>
                          </b-tooltip>
                        </span>
                      </a>
                      <a href="{{ Storage::disk('spaces')->url('cvs/'.$application->cv) }}" class="level-item" aria-label="reply">
                        <span class="icon is-small has-text-info">
                          <b-tooltip label="CV" position="is-top" type="is-dark">
                            <i class="fas fa-file-alt" aria-hidden="true"></i>
                          </b-tooltip>
                        </span>
                      </a>
                      <a href="{{ route('applications.show', $application->id) }}" class="level-item" aria-label="reply">
                        <span class="icon is-small has-text-primary">
                          <b-tooltip label="Show application" position="is-top" type="is-dark">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                          </b-tooltip>
                        </span>
                      </a>
                      <a class="level-item" aria-label="delete" v-on:click="isActive{{ $application->id }} = !isActive{{ $application->id }}">
                        <span class="icon is-small has-text-danger">
                          <b-tooltip label="Delete application" position="is-top" type="is-dark">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                          </b-tooltip>
                        </span>
                      </a>
                    </div>
                    <div class="level-right">
                      <a class="level-item" aria-label="reply">
                        <span class="tag"><i class="fas fa-tag m-r-5"></i>{{ $application->vacancy->name }}</span>
                      </a>
                    </div>
                  </nav>
                </div>
              </article>
            </div>
          </div>

          <div id="modal" class="modal" v-bind:class="{ 'is-active': isActive{{ $application->id }} }">
            <div class="modal-background"></div>
            <div class="modal-content">
              <form action="{{ route('applications.destroy', $application->id) }}" method="POST">
                {{csrf_field()}}
                {{ method_field('DELETE') }}

                <div class="notification">
                  <div class="columns">
                    <div class="column is-2 has-text-centered">
                      <i class="fas fa-trash has-text-danger is-size-1"></i>
                    </div>
                    <div class="column is-10">
                      <p class="is-size-5">Are you sure you want to delete <strong>{{ $application->name }}</strong> from the database? <small>This action cannot be undone.</small></p>
                    </div>
                  </div>
                  <div class="field is-grouped is-grouped-right">
                    <div class="control">
                      <a class="button is-light" v-on:click="isActive{{ $application->id }} = !isActive{{ $application->id }}">Cancel</a>
                    </div>
                    <div class="control">
                      <button class="button is-danger">Delete</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <button class="modal-close is-large" aria-label="close" v-on:click="isActive{{ $application->id }} = !isActive{{ $application->id }}"></button>
          </div>
        @endforeach
      @endif
    </div>

    {{ $applications->links() }}
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
          @foreach ($applications as $application)
            isActive{{ $application->id }}: false,
          @endforeach
        }
      });
    }
  </script>
@endsection
