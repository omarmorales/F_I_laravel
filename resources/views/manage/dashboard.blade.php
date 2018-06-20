@extends('layouts.app')

@section('content')
  {{-- <vacancies></vacancies> --}}
  <div class="flex-container m-t-10 m-l-20 m-r-20">
    <div class="tile is-ancestor">
      <div class="tile is-vertical is-8">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notification">
              <p class="title"><i class="fas fa-users"></i> Users</p>
              <p class="subtitle">Top tile</p>
            </article>
            <article class="tile is-child notification">
              <p class="title"><i class="fas fa-user-tag"></i> Roles</p>
              <p class="subtitle">Bottom tile</p>
            </article>
            <article class="tile is-child notification">
              <p class="title"><i class="fas fa-user-lock"></i> Permissions</p>
              <p class="subtitle">Bottom tile</p>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification">
              <p class="title">Middle tile</p>
              <p class="subtitle">With an image</p>
              <figure class="image is-4by3">
                <img src="https://bulma.io/images/placeholders/640x480.png">
              </figure>
            </article>
          </div>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child notification">
            <p class="title">Wide tile</p>
            <p class="subtitle">Aligned with the right tile</p>
            <div class="content">
              <!-- Content -->
            </div>
          </article>
        </div>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification">
          <div class="content">
            <p class="title">Tall tile</p>
            <p class="subtitle">With even more content</p>
            <div class="content">
              <!-- Content -->
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
@endsection
