<form action="{{ route('search') }}" method="GET">
  <div class="field">
    <div class="control has-icons-right">
      <input class="input" type="text" placeholder="Palabra clave" name="query" id="query" value="{{ request()->input('query') }}">
      <span class="icon is-right">
        <i class="fas fa-search"></i>
      </span>
    </div>
  </div>
</form>
