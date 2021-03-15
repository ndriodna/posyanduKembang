@auth()
    @include('layouts.navbars.navs.auth')
@endauth
@guest()
    @include('layouts.navbars.navs.guest')
@endguest
<div class="bg-primary pb-8 pt-5 pt-md-8"></div>
