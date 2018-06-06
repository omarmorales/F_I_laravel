@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Staff</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Staff</h1>

    <table class="table is-narrow is-hoverable is-fullwidth">
      <thead>
        <tr>
          <th>Name</th>
          <th>Job title</th>
          <th>Date created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->job_title }}</td>
            <td>{{ $employee->created_at }}</td>
            <td>
              <a href="{{ route('employees.show', $employee->id) }}" class="button">view</a>
              <a href="{{ route('employees.edit', $employee->id) }}" class="button">edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{ $employees->links() }}
    <a href="{{ route('employees.create') }}" class="button button-float"><i class="fas fa-plus"></i></a>
  </div>
@endsection
