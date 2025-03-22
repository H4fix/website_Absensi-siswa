<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{$menu == 'dashboard' ? '' : 'collapsed'}}" href="{{route('dashboard-admin')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link {{ $menu == 'siswa' ? '' : 'collapsed' }}" href="{{ route('siswa.index') }}">
      <i class="bi bi-person"></i>
      <span>Siswa</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $menu == 'local' ? '' : 'collapsed' }}" href="{{ route('local.index') }}">
      <i class="bi bi-building"></i>
      <span>Local</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $menu == 'jurusan' ? '' : 'collapsed' }}" href="{{ route('jurusan.index') }}">
      <i class="fas fa-book"></i>
      <span>Jurusan</span>
    </a>
  </li>



</ul>