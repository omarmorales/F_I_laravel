@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li><a href="{{ route('applications.index') }}">Manage Applications</a></li>
        <li class="is-active"><a href="#" aria-current="page">Create</a></li>
      </ul>
    </nav>

    <h1 class="title">Create Vacancy Application</h1>
    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="columns">
        <div class="column">
          <div class="field">
            <p class="control">
              <label for="name" class="label">Name</label>
              <input type="text" class="input" name="name" value="{{old('name')}}" id="name">
            </p>
          </div>

          <div class="field">
            <p class="control">
              <label for="email" class="label">Email</label>
              <input type="email" class="input" name="email" value="{{old('email')}}" id="email">
            </p>
          </div>

          <div class="field">
            <p class="control">
              <label for="school" class="label">School</label>
              <input type="text" class="input" name="school" value="{{old('school')}}" id="school">
            </p>
          </div>

          <div class="field">
            <div class="control">
              <div class="select">
                <select name="vacancy_id" id="vacancy_id">
                  @foreach ($vacancies as $vacancy)
                    <option value="{{ $vacancy->id }}">{{ $vacancy->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <div class="field">
            <div class="control">
              <label for="motivation_letter" class="label">Motivation Letter</label>
              <input type="file" class="input" name="motivation_letter" value="{{old('motivation_letter')}}" id="motivation_letter">
            </div>
          </div>
        </div>

        <div class="column">
          <div class="field">
            <div class="control">
              <label for="cv" class="label">Curriculum vitae</label>
              <input type="file" class="input" name="cv" value="{{old('cv')}}" id="cv">
            </div>
          </div>
        </div>
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
  window.onload = function() {
    const app = new Vue({
      el: '#app',
      data: {
      }
    });
  }
  </script>
@endsection
