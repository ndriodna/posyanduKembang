<div id="app">
	<div class="main-wrapper">
		@include('layouts.navbars.navs.auth')
		<div class="main-content">
			@include('layouts.navbars.sidebar')
			@yield('content')
		</div>
		@include('layouts.footers.auth')
	</div>
</div>
