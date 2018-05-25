@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Users</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Users</h1>

    <table class="table is-narrow is-hoverable is-fullwidth">
      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>email</th>
          <th>date created</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
              <a href="" class="button">view</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
