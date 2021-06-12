@extends('layouts.app')

@section('content')
<style type="text/css">
	.card.card-hero .card-header {
    padding: 30px 30px;
    background-image: linear-gradient(to bottom, #6777ef, #95a0f4);
    color: #fff;
    overflow: hidden;
    height: auto;
    min-height: auto;
    text-align: center;
}
}
.card .card-header {
    border-bottom-color: #f9f9f9;
    line-height: 10px;
    -ms-grid-row-align: center;
    align-self: center;
    width: 100%;
    min-height: 70px;
    padding: 5px 10px;
    display: flex;
    align-items: center;
}
</style>
<h5 class="text-center text-primary my-2">Selamat Datang {{auth()->user()->name}}, Anda masuk sebagai 
@foreach(auth()->user()->getRoleNames() as $data)
{{$data}}
@endforeach
</h5>
<div class="container my-5">
	<div class="row">
		<div class="col-lg-3 md-3 sm-12 ">
			<div class="card card-hero ">
				<div class="card-header">
					<h4>{{$user->count()}}</h4>
					Total User
				</div>
			</div>
		</div>
		<div class="col-lg-3 md-3 sm-12 ">
			<div class="card card-hero ">
				<div class="card-header">
					<h4>{{$pendaftaran->count()}}</h4>
					Total anak
				</div>
			</div>
		</div>
		<div class="col-lg-3 md-3 sm-12 ">
			<div class="card card-hero ">
				<div class="card-header">
					<h4>{{$blog->count()}}</h4>
					Total Artikel
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
