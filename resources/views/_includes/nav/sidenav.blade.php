<div id="admin-side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">@lang('sidenav.General')</p>
    <ul class="menu-list">
      <li><a href="{{ route('manage.dashboard') }}" class="{{ Nav::isRoute('manage.dashboard') }}">@lang('sidenav.Dashboard')</a></li>
    </ul>
    <p class="menu-label">@lang('sidenav.Content')</p>
    <ul class="menu-list">
      <li><a href="{{route('employees.index')}}" class="{{ Nav::isResource('employees') }}">@lang('sidenav.Manage_Staff')</a></li>
      <li>
        <a class="has-submenu {{Nav::hasSegment(['vacancies', 'applications'],2)}}">@lang('sidenav.Manage_Vacancies')</a>
        <ul class="submenu">
          <li><a href="{{route('vacancies.index')}}" class="{{Nav::isResource('vacancies')}}">@lang('sidenav.Vacancies')</a></li>
          <li><a href="{{route('applications.index')}}" class="{{Nav::isResource('applications')}}">@lang('sidenav.Applications')</a></li>
        </ul>
      </li>
      <li><a href="" class="">@lang('sidenav.Manage_Media')</a></li>
    </ul>
    <p class="menu-label">@lang('sidenav.Administration')</p>
    <ul class="menu-list">
      <li><a href="{{ route('users.index') }}" class="{{ Nav::isResource('users') }}">@lang('sidenav.Manage_Users')</a></li>
      <li>
        <a class="has-submenu {{Nav::hasSegment(['roles', 'permissions'],2)}}">@lang('sidenav.Roles&Permissions')</a>
        <ul class="submenu">
          <li><a href="{{route('roles.index')}}" class="{{Nav::isResource('roles')}}">@lang('sidenav.Roles')</a></li>
          <li><a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions')}}">@lang('sidenav.Permissions')</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
