@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Roles</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Roles</h1>

    <table class="table is-narrow is-hoverable is-fullwidth">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>display_name</th>
          <th>description</th>
          <th>date created</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($roles as $role)
          <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>
            <td>{{ $role->created_at }}</td>
            <td>
              <a href="{{ route('roles.show', $role->id) }}" class="button">view</a>
              <a href="{{ route('roles.edit', $role->id) }}" class="button">edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{ $roles->links() }}
    <a href="{{ route('roles.create') }}" class="button button-float"><i class="fas fa-plus"></i></a>
  </div>
@endsection
