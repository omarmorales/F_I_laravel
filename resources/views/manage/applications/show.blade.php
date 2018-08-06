@extends('layouts.app')

@section('content')
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="">@lang('applications.SectionTitle')</a></li>
        <li><a href="{{ route('applications.index') }}">@lang('applications.IndexTitle')</a></li>
        <li class="is-active"><a href="#" aria-current="page">{{ $application->name }}</a></li>
      </ul>
    </nav>

    <h1 class="title">{{ $application->name }} ({{ $application->email }})</h1>

    <div class="columns is-multiline">
      <div class="column is-6">
        <div class="field">
          <label class="label">Carta motivos</label>
          <a target="_blank" href="{{ asset('storage/motivation_letters/'.$application->motivation_letter) }}">
            <span class="icon is-medium"><i class="fas fa-file fa-lg"></i></span>{{ $application->motivation_letter }}
          </a>
        </div>
      </div>

      <div class="column is-6">
        <div class="field">
          <label class="label">Currículum Vitae</label>
          <a target="_blank" href="{{ asset('storage/cvs/'.$application->cv) }}">
            <span class="icon is-medium"><i class="fas fa-file fa-lg"></i></span>{{ $application->cv }}
          </a>
        </div>
      </div>

      <div class="column is-12">
        <div class="field">
          <label class="label">¿Cómo se enteró de nosotros?</label>
          <pre>{{ $application->how_hear_aboutus }}</pre>
        </div>

        <div class="field">
          <label class="label">Situacion actual</label>
          @if ($application->situation == 0)
            <pre>Soy estudiante</pre>
          @elseif ($application->situation == 1)
            <pre>Soy estudiante y busco empleo</pre>
          @elseif ($application->situation == 2)
            <pre>Soy recién egresado y busco empleo</pre>
          @elseif ($application->situation == 3)
            <pre>Terminé mis estudios (pero aún no me titulo) y busco empleo</pre>
          @elseif ($application->situation == 4)
            <pre>Terminé mis estudios (pero aún no me titulo) y estoy trabajando</pre>
          @elseif ($application->situation == 5)
            <pre>Estoy titulado y busco empleo</pre>
          @elseif ($application->situation == 6)
            <pre>Estoy titulado y trabajo actualmente</pre>
          @elseif ($application->situation == 7)
            <pre>Otro</pre>
          @endif

        </div>
      </div>

      <div class="column is-6">
        <div class="field">
          <label class="label">Universidad</label>
          <pre>{{ $application->school }}</pre>
        </div>
      </div>
      <div class="column is-6">
        <div class="field">
          <label class="label">Promedio actual / final</label>
          <pre>{{ $application->average }}</pre>
        </div>
      </div>

      <div class="column is-12">
        <div class="field">
          <label class="label">Temas en los que prefiere no trabajar</label>
          <pre>{{ $application->themes }}</pre>
        </div>

        <div class="field">
          <label class="label">Lo más complejo que ha realizado en STATA</label>
          <pre>{{ $application->stata }}</pre>
        </div>

        <div class="field">
          <label class="label">¿Dónde se ve profesionalmente en 5 años? ¿Qué hace y que a logrado?</label>
          <pre>{{ $application->future }}</pre>
        </div>


        <label class="label">Por qué esta interesado/a en la vacante:</label>
        <pre>{{ $application->whyinterested }}</pre>

        <label class="label">Por qué considera que se le debería contratar:</label>
        <pre>{{ $application->whyhireyou }}</pre>

        <label class="label">Comentarios adicionales:</label>
        <pre>{{ $application->comments }}</pre>
      </div>
    </div>
  </div>

  <form id="myform" action="{{ route('applications.destroy', $application->id) }}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{ method_field('DELETE') }}

    <b-tooltip label="delete application" position="is-left" type="is-dark" animated class="button-float m-r-40 m-b-20">
      <a onclick="document.getElementById('myform').submit()" class="button-float button-round">
        <span class="fas fa-trash"></span>
      </a>
    </b-tooltip>
  </form>
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
