@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $user->name }}</a></li>
      </ul>
    </nav>

    <div class="columns">
      <div class="column">
        <div class="field">
          <label for="name" class="label">Name</label>
          <pre>{{$user->name}}</pre>
        </div>

        <div class="field">
          <div class="field">
            <label for="email" class="label">Email</label>
            <pre>{{$user->email}}</pre>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="field">
          <label for="email" class="label">{{ $user->name }}'s Roles</label>
            @forelse ($user->roles as $role)
              <pre><i class="fas fa-angle-right"></i> {{$role->display_name}} ({{$role->description}})</pre>
            @empty
              <pre>This user has not been assigned any roles yet</pre>
            @endforelse
        </div>
      </div>
    </div>
  </div>
@endsection
