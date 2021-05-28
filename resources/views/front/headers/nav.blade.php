<div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded">
	<div class="container">
		<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/logo-posyandu-rev.png')}}" alt="" class="img-fluid" width="180"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          {{-- pengennya show by tag atau ada saran lagi klo by id takutnya nanti pas tehapus sma org sana --}}
          <a class="nav-link" href="{{route('showNews')}}">Agenda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Profile Posyandu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          {{-- pengennya show by tag atau ada saran lagi klo by id takutnya nanti pas tehapus sma org sana --}}
            <li><a class="dropdown-item" href="{{route('showNews')}}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
          {{-- pengennya show by tag atau ada saran lagi klo by id takutnya nanti pas tehapus sma org sana --}}
            <li><a class="dropdown-item" href="{{route('showNews')}}">Visi & Misi</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
      </ul>
    </div>
	</div>
</div>
