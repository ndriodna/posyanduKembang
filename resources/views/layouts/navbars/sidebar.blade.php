<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('home')}}">Ambulung</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('home')}}">AM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class=""><a class="nav-link" href="{{route('home')}}"><i class="far fa-square"></i> <span>Home</span></a></li>
              <li class="menu-header">Main</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Account</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('user.show',auth()->user()->id)}}">User Profile</a></li>
                  <li><a class="nav-link" href="{{route('user.index')}}">User Management </a></li>
                  <li><a class="nav-link" href="{{route('roles.index')}}">Role</a></li>
                </ul>
              </li>
              <li class=""><a class="nav-link" href="{{route('residents.index')}}"><i class="far fa-square"></i> <span>Data Warga</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Item</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="#"></a></li>
                  <li><a class="nav-link" href="#"></a></li>
                  <li><a class="nav-link" href="#"></a></li>
                  <li><a class="nav-link" href="#"></a></li>
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
