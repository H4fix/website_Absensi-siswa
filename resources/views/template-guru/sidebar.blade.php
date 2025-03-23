<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{$menu == 'dashboard' ? '' : 'collapsed'}}" href="{{route('dashboard-guru')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link {{ $menu == 'absen' ? '' : 'collapsed' }}" href="{{ route('absen.index3') }}">
      <i class="bi bi-calendar-check"></i>
      <span>Absensi</span>
    </a>
  </li>




</ul>