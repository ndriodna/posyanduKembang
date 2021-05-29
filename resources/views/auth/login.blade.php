@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand">
        <img src="{{asset('/assets/Logo-new.png')}}" alt="logo" width="150" class="shadow rounded-circle">
      </div>
      <div class="card card-danger">
        <div class="card-header text-danger">
        <h6 class="text-center">Login Posyandu Kembang Sepatu</h6>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group">
              <label for="name">Username</label>
              <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
              <span class="text-danger">{{ $errors->first('name') }}</span>
              <div class="invalid-feedback">
                Mohon masukan Username anda
              </div>
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
              <span class="text-danger">{{ $errors->first('password') }}</span>
              <input type="checkbox" class="mt-2" id="toggle-password"> Tampilkan password
              <div class="invalid-feedback">
                Mohon masukan password anda
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                Login
              </button>
                <a href="{{url('/')}}" class="btn btn-primary btn-lg btn-block"><i class="fa fa-arrow-left" aria-hidden="true"></i> Halaman Utama</a>
            </div>
          </form>
        </div>
      </div>
      <div class="simple-footer">
        Copyright &copy; Stisla 2018
      </div>
    </div>
  </div>
</div>

@push('js')
<script type="text/javascript">
  $("#toggle-password").on('click', function() {
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});
</script>
@endpush
@endsection
