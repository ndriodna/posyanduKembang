<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand mb-2 mt-2">
            <a href="{{route('home')}}" class="p-3"><img src="../assets/logo.png" alt="logo" width="70" class="shadow p-2 rounded-circle bg-white">
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('home')}}">
              <img src="{{url('/assets/logo.png')}}" alt="logo" width="40" class="shadow rounded-circle bg-white p-1">
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
              @role('Admin')
              <li class=""><a class="nav-link" href="{{route('pendaftaran.index')}}"><i class="far fa-square"></i> <span>Pendaftaran</span></a></li>
              <li class=""><a class="nav-link" href="{{route('pencatatan.index')}}"><i class="far fa-square"></i> <span>Pencatatan</span></a></li>
              <li class=""><a class="nav-link" href="{{route('penyuluhan.index')}}"><i class="far fa-square"></i> <span>Penyuluhan</span></a></li>
              <li class=""><a class="nav-link" href="{{route('pelayanan.index')}}"><i class="far fa-square"></i> <span>Pelayanan</span></a></li>
              @endrole
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Item</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('blog.index')}}">Blog</a></li>

                </ul>
              </li>
              {{-- <li class="menu-header">Content</li>
             <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Articles</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="#">List</a></li>
                  <li><a class="nav-link" href="#">Create</a></li>
                </ul>
              </li> --}}
            </ul>
        </aside>
      </div>
