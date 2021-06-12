<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand mb-2 mt-2">
      <a href="{{route('home')}}" class="p-3"><img src="{{asset('/assets/logo-new.png')}}" alt="logo" width="70" class="shadow rounded-circle">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('home')}}">
        <img src="{{asset('/assets/logo-new.png')}}" alt="logo" width="70" class="shadow rounded-circle">
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class=""><a class="nav-link" href="{{route('home')}}"><i class="far fa-square"></i> <span>Home</span></a></li>
      <li class="menu-header">Main</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Account</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('user.showAuthUser')}}">User Profile</a></li>
          @role('Admin')
          <li><a class="nav-link" href="{{route('user.index')}}">User Management </a></li>
          <li><a class="nav-link" href="{{route('roles.index')}}">Role</a></li>
          @endrole
        </ul>
      </li>
      <li class=""><a class="nav-link" href="{{route('pendaftaran.index')}}"><i class="fas fa-edit"></i> <span>Pendaftaran</span></a></li>
      <li class=""><a class="nav-link" href="{{route('pencatatan.index')}}"><i class="fas fa-pencil-ruler"></i> <span>Ukur & Timbang</span></a></li>
      <li class=""><a class="nav-link" href="{{route('penyuluhan.index')}}"><i class="fas fa-comment-medical"></i> <span>Penyuluhan</span></a></li>
      <li class=""><a class="nav-link" href="{{route('pelayanan.list')}}"><i class="fas fa-pills"></i> <span>Pelayanan</span></a></li>
      <li class=""><a class="nav-link" href="{{route('rekap.index')}}"><i class="fas fa-file-alt"></i> <span>Rekap</span></a></li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Item</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('blog.index')}}">Blog</a></li>

        </ul>
      </li>
      <li class=""><a href="{{route('help')}}"><i class="fas fa-question-circle text-dark" style="font-size: 20px;"></i><span>Bantuan</span></a>
      </li>
    </ul>
  </aside>
</div>
