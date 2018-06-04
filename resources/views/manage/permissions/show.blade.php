@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $permission->display_name }}</a></li>
      </ul>
    </nav>

    <div class="field">
      <label for="display_name" class="label">Display Name</label>
      <pre>{{$permission->display_name}}</pre>
    </div>

    <div class="field">
      <label for="name" class="label">Name</label>
      <pre>{{$permission->name}}</pre>
    </div>

    <div class="field">
      <label for="description" class="label">Description</label>
      <pre>{{$permission->description}}</pre>
    </div>
  </div>
@endsection
