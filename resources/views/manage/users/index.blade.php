@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Users</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Users</h1>
    <div class="columns is-multiline">
      @foreach ($users as $user)
        <div class="column is-one-third">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>{{ $user->name }}</strong> <small>({{ $user->email }})</small>
                    <br>
                  </p>
                </div>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a href="{{ route('users.show',$user->id) }}" class="level-item" aria-label="show">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-eye" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a href="{{ route('users.edit',$user->id) }}" class="level-item" aria-label="edit">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-edit" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a class="level-item" aria-label="delete">
                      <span class="icon is-small has-text-danger">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </span>
                    </a>
                  </div>
                  <div class="level-right">
                    <small>Created {{ $user->created_at->diffForHumans() }}</small>
                  </div>
                </nav>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>

    {{ $users->links() }}

    <b-tooltip label="create new user" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('users.create') }}" class="button-float button-round">
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
