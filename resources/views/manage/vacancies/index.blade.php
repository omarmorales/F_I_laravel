@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li class="is-active"><a href="#" aria-current="page">Manage Vacancies</a></li>
      </ul>
    </nav>

    <h1 class="title">Manage Vacancies</h1>

    <table class="table is-narrow is-hoverable is-fullwidth">
      <thead>
        <tr>
          <th>Name</th>
          <th>Date created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($vacancies as $vacancy)
          <tr>
            <td>{{ $vacancy->name }}</td>
            <td>{{ $vacancy->created_at }}</td>
            <td>
              <a href="{{ route('vacancies.show', $vacancy->id) }}" class="button">view</a>
              <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="button">edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{ $vacancies->links() }}
    <a href="{{ route('vacancies.create') }}" class="button button-float"><i class="fas fa-plus"></i></a>
  </div>
@endsection
