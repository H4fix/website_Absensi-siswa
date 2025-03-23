<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{$menu == 'dashboard' ? '' : 'collapsed'}}" href="{{route('dashboard-siswa')}}">
      <i class="bi bi-clipboard-data"></i>
      <span>Rekap Absensi   </span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link {{ $menu == 'absen' ? '' : 'collapsed' }}" href="{{ route('absen.index') }}">
      <i class="bi bi-calendar-check"></i>
      <span>Absensi</span>
    </a>
  </li>

  



</ul>