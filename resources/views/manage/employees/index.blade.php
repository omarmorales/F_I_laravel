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
    <div class="columns is-multiline">
      @foreach ($employees as $employee)
        <div class="column is-one-half">
          <div class="box">
            <article class="media">
              <div class="media-left">
                <a href="{{ route('employees.show', $employee->id) }}">
                  <figure class="image is-64x64">
                    <img src="{{ asset('storage/thumbnails/'.$employee->thumbnail) }}" alt="{{ $employee->name }}">
                  </figure>
                </a>
              </div>
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>{{ $employee->name }}</strong> <small>{{ $employee->job_title }}</small>
                    <br>
                    {{ str_limit($employee->description,120) }}
                  </p>
                </div>
                <nav class="level is-mobile">
                  <div class="level-left">
                    <a href="{{ route('employees.show',$employee->id) }}" class="level-item" aria-label="show">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-eye" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a href="{{ route('employees.edit',$employee->id) }}" class="level-item" aria-label="edit">
                      <span class="icon is-small has-text-info">
                        <i class="far fa-edit" aria-hidden="true"></i>
                      </span>
                    </a>
                    <a class="level-item" aria-label="delete">
                      <span class="icon is-small has-text-danger">
                        <i class="fas fa-trash" aria-hidden="true"></i>
                      </span>
                    </a>
                  </div>
                  <div class="level-right">
                    @if ($employee->public == "true")
                      <span class="tag"><i class="fas fa-globe m-r-5"></i>Public</span>
                    @else
                      <span class="tag"><i class="fas fa-lock m-r-5"></i>Private</span>
                    @endif
                  </div>
                </nav>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>

    {{ $employees->links() }}

    <b-tooltip label="create new staff member" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('employees.create') }}" class="button-float button-round">
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
