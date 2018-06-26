@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">Content</a></li>
        <li><a href="{{ route('vacancies.index') }}">Manage Vacancies</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $vacancy->name }}</a></li>
      </ul>
    </nav>

    <h1 class="title">
      {{ $vacancy->name }}
      <span class="tag">
        @if ($vacancy->public == "true")
          public
        @else
          private
        @endif
      </span>
    </h1>
    <div class="columns">
      <div class="column is-6">
        <h2 class="subtitle m-b-5">@lang('vacancies.requirements')</h2>
        <hr class="m-t-5">
        <span>
          @if(App::isLocale('en'))
            {!! $vacancy->requirements !!}
          @else
            {!! $vacancy->requirements_es !!}
          @endif
        </span>
      </div>
      <div class="column is-6">
        <h2 class="subtitle m-b-5">@lang('vacancies.description')</h2>
        <hr class="m-t-5">
        <span>
          @if (App::isLocale('en'))
            {!! $vacancy->description !!}
          @else
            {!! $vacancy->description_es !!}
          @endif
        </span>
      </div>
    </div>
    <b-tooltip label="@lang('vacancies.editTxt')" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="button-float button-round">
        <span class="fas fa-edit is-size-6"></span>
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
