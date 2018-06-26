@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li class="is-active"><a href="#" aria-current="page">Create</a></li>
      </ul>
    </nav>

    <h1 class="title">Create User</h1>
    <form action="{{ route('users.store') }}" method="POST" id="myform">
      {{csrf_field()}}

      <div class="columns">

        <div class="column">
          <div class="field">
            <label for="name" class="label">Name</label>
            <div class="control">
             <input class="input" type="text" name="name" id="name" placeholder="User name">
           </div>
          </div>

          <div class="field">
            <label for="email" class="label">Email</label>
            <div class="control">
             <input class="input" type="email" name="email" id="email" placeholder="Email">
           </div>
          </div>

          <div class="field">
            <label for="password" class="label">Password</label>
            <div class="control">
             <input class="input" type="password" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user">
             <b-checkbox name="auto_generate" class="m-t-15" v-model="auto_password">Auto Generate Password</b-checkbox>
           </div>
          </div>

          <input type="hidden" :value="rolesSelected" name="roles">
        </div>

        <div class="column">
          <label for="roles" class="label">User's Roles</label>
          <section>
            @foreach ($roles as $role)
              <div class="field">
                  <b-checkbox v-model="rolesSelected" :native-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
              </div>
            @endforeach
          </section>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
          auto_password: true,
          rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
        }
      });
    }
  </script>
@endsection
