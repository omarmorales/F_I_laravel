@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
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

    <b-tooltip label="create new permission" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('permissions.create') }}" class="button-float button-round">
        <span class="fas fa-plus"></span>
      </a>
    </b-tooltip>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    window.onload = function() {
      const app = new Vue({
        el: '#app',
        data: {
        }
      });
    }
  </script>
@endsection
