<div id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">General</p>
    <ul class="menu-list">
      <li><a href="{{ route('manage.dashboard') }}" class="{{ Nav::isRoute('manage.dashboard') }}">Dashboard</a></li>
    </ul>
    <p class="menu-label">Content</p>
    <ul class="menu-list">
      <li><a href="#" class="">Manage Staff</a></li>
      <li><a href="#" class="">Manage Vacancies</a></li>
    </ul>
    <p class="menu-label">Administration</p>
    <ul class="menu-list">
      <li><a href="{{ route('users.index') }}" class="{{ Nav::isResource('users') }}">Manage Users</a></li>
      <li>
        <a class="has-submenu ">Roles &amp; Permissions</a>
        <ul class="submenu">
          <li><a href="{{ route('roles.index') }}" class="{{ Nav::isResource('roles') }}">Roles</a></li>
          <li><a href="{{ route('permissions.index') }}" class="{{ Nav::isResource('permissions') }}">Permissions</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
