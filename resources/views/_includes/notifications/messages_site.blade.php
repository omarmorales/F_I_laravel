@if(count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="notification is-danger m-t-75">
      <button class="delete" onclick="this.parentElement.style.display='none';"></button>
      {{ $error }}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="notification is-success m-t-75">
    <button class="delete" onclick="this.parentElement.style.display='none';"></button>
    {{session('success')}}
  </div>
@endif

@if(session('error'))
  <div class="notification is-danger m-t-75">
    <button class="delete" onclick="this.parentElement.style.display='none';"></button>
    {{session('error')}}
  </div>
@endif
