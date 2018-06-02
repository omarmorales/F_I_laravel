@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Administration</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Permissions</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Permissions</h1>

    <div class="table_wrapper">
      <table class="table is-narrow is-hoverable is-fullwidth responsive_table">
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
          @foreach ($permissions as $permission)
            <tr>
              <td>{{ $permission->id }}</td>
              <td>{{ $permission->name }}</td>
              <td>{{ $permission->display_name }}</td>
              <td>{{ $permission->description }}</td>
              <td>{{ $permission->created_at }}</td>
              <td>
                <a href="{{ route('permissions.show',$permission->id) }}" class="button">view</a>
                <a href="{{ route('permissions.edit', $permission->id) }}" class="button">edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{ $permissions->links() }}
    <a href="{{ route('permissions.create') }}" class="button button-float"><i class="fas fa-plus"></i></a>
  </div>
@endsection
