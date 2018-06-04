@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
        <li class="is-active"><a href="#" aria-current="page">Edit</a></li>
      </ul>
    </nav>

    <h1 class="title">Edit Permission</h1>
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="field">
        <label for="display_name" class="label">Name (Display Name)</label>
        <input type="text" class="input" name="display_name" value="{{$permission->display_name}}">
      </div>

      <div class="field">
        <label for="name" class="label">Slug <small>(Cannot be changed)</small></label>
        <input type="text" class="input" name="name" value="{{$permission->name}}" disabled>
      </div>

      <div class="field">
        <label for="description" class="label">Description</label>
        <input type="text" class="input" name="description" value="{{$permission->description}}">
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-link">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection
