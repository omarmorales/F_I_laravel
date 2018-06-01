@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $role->display_name }}</a></li>
      </ul>
    </nav>

    <div class="field">
      <label for="display_name" class="label">Display Name</label>
      <pre>{{$role->display_name}}</pre>
    </div>

    <div class="field">
      <label for="name" class="label">Name</label>
      <pre>{{$role->name}}</pre>
    </div>

    <div class="field">
      <label for="description" class="label">Description</label>
      <pre>{{$role->description}}</pre>
    </div>

  </div>
@endsection
