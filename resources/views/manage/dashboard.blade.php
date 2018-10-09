@extends('layouts.app')

@section('content')
  {{-- <vacancies></vacancies> --}}
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          @role('superadministrator|administrator')
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification">
              <a href="{{route('users.index')}}" style="text-decoration:none;">
                <p class="title"><i class="fas fa-users"></i> {{ count($users) }} Users</p>
              </a>
            </article>
            <article class="tile is-child notification">
              <a href="{{route('roles.index')}}" style="text-decoration:none;">
                <p class="title"><i class="fas fa-user-tag"></i> {{ count($roles) }} Roles</p>
              </a>
            </article>
            <article class="tile is-child notification">
              <a href="{{route('permissions.index')}}" style="text-decoration:none;">
                <p class="title"><i class="fas fa-user-lock"></i> {{ count($permissions) }} Permissions</p>
              </a>
            </article>
          </div>
          @endrole
          <div class="tile is-parent">
            <article class="tile is-child notification">
              <a href="{{route('vacancies.index')}}" style="text-decoration:none;">
                <p class="title"><i class="fas fa-bookmark"></i> Last Vacancies</p>
              </a>
              <article class="media">
                <figure class="media-left">
                  <i class="fas fa-caret-right"></i>
                </figure>
                <div class="media-content">
                  @foreach ($vacancies as $vacancy)
                    <a href="{{route('vacancies.show', $vacancy->id)}}" style="text-decoration:none;">
                      <p><strong>{{ $vacancy->name }}</strong> <small>{{ $vacancy->created_at->diffForHumans() }}</small>
                    </a>
                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a style="text-decoration:none;" class="level-item">
                          @if ($vacancy->public == true)
                            <span class="tag is-success">Public</span>
                          @else
                            <span class="tag is-light">Private</span>
                          @endif
                        </a>
                        <a href="{{route('applications.index')}}" style="text-decoration:none;" class="level-item">
                          <span class="tag is-info">{{ count($vacancy->applications) }} applications</span>
                        </a>
                      </div>
                    </nav>
                    </p>
                  @endforeach
                </div>
              </article>
            </article>
          </div>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification">
          <div class="content">
            <p class="title">Last Posts</p>
            <div class="content">
              @foreach ($posts as $post)
                <a href="{{route('posts.show', $post->id)}}" style="text-decoration:none;">
                  <p><strong>{{ $post->title }}</strong> <small>{{ $post->created_at->diffForHumans() }}</small>
                </a>
              @endforeach
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection
