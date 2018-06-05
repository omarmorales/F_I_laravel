@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li class="is-active"><a href="#" aria-current="page">Edit</a></li>
      </ul>
    </nav>

    <h1 class="title">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" id="myform">
      {{method_field('PUT')}}
      {{csrf_field()}}

      <div class="field">
        <label for="name" class="label">Name</label>
        <div class="control">
         <input class="input" type="text" name="name" id="name" value="{{$user->name}}">
       </div>
      </div>

      <div class="field">
        <label for="email" class="label">Email</label>
        <div class="control">
         <input class="input" type="email" name="email" id="email" value="{{$user->email}}">
       </div>
      </div>

      <div class="field">
        <label for="password" class="label">Password</label>
        <div class="block">
          <div class="field">
            <b-radio name="password_options" v-model="password_options" native-value="keep">Do Not Change Password</b-radio>
          </div>
          <div class="field">
            <b-radio name="password_options" v-model="password_options" native-value="auto">Auto-Generate New Password</b-radio>
          </div>
          <div class="field">
            <b-radio name="password_options" v-model="password_options" native-value="manual">Manually Set New Password</b-radio>
            <p class="control m-t-15">
              <input type="text" class="input" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
            </p>
          </div>
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
        password_options: 'keep',
        rolesSelected: {!! $user->roles->pluck('id') !!}
      }
    });
  }
  </script>
@endsection
