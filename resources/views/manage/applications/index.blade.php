@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Applications</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Applications</h1>
    <div class="columns is-multiline">
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
      @endforeach
    </div>

    {{ $applications->links() }}

    <b-tooltip label="create new application" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('applications.create') }}" class="button-float button-round">
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
        }
      });
    }
  </script>
@endsection
