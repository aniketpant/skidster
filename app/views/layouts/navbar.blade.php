<nav class="grid one-whole">
  <ul class="nav nav--block navbar">
    <li class="grid__item one-quarter"><a class="brand" href="{{ url('/') }}">Skidster</a></li>
    @if (Auth::check())
    <li><a @if (Request::url() == url('user/dashboard'))class="active"@endif href="{{ url('user/dashboard') }}">Dashboard</a></li>
    <li><a @if (Request::url() == url('user/profile'))class="active"@endif href="{{ url('user/profile') }}">Profile</a></li>
    <li><a href="{{ url('user/logout') }}">Logout</a></li>
    @else
    <li><a @if (Request::url() == url('user/login'))class="active"@endif href="{{ url('user/login') }}">Login</a></li>
    <li><a @if (Request::url() == url('user/register'))class="active"@endif href="{{ url('user/register') }}">Register</a></li>
    @endif
  </ul>
</nav>