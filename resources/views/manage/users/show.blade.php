@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $user->name }}</a></li>
      </ul>
    </nav>

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
@endsection
