@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li><a href="{{ route('roles.index') }}">Manage Roles</a></li>
        <li class="is-active"><a href="#" aria-current="page">Create</a></li>
      </ul>
    </nav>

    <h1 class="title">Create Role</h1>
    <form action="{{ route('roles.store') }}" method="POST" id="myform">
      {{csrf_field()}}
      <div class="field">
        <p class="control">
          <label for="display_name" class="label">Name (Human Readable)</label>
          <input type="text" class="input" name="display_name" value="{{old('display_name')}}" id="display_name">
        </p>
      </div>

      <div class="field">
        <label for="name" class="label">Slug (Can not be changed)</label>
        <div class="control">
         <input class="input" type="text" name="name" id="name" value="{{old('name')}}">
       </div>
      </div>

      <div class="field">
        <p class="control">
          <label for="description" class="label">Description</label>
          <input type="text" class="input" value="{{old('description')}}" id="description" name="description">
        </p>
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
  </script>
@endsection