@extends('front.app')
@section('content')
<div class="container">
	<h5>Thanks To ...</h5>
	<span>We would like to thank the makers of these cool images</span>
	<div class="row my-4">
		<div class="col-12">
			<h5>Credits</h5>
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<img src="{{asset('assets/logo.png')}}" alt="" width="50"><br>
					Author : Ahkâm <br>
					<a target="_BLANK" href="https://www.freeiconspng.com/img/47439">bunga kembang sepatu Gambar Png</a>
				</li>
				<li class="list-group-item">
					<img src="{{asset('assets/svg/front_page.svg')}}" alt="" width="100"><br>
					By : <a target="_BLANK" href="https://undraw.co/">Undraw.co</a>
				</li>
				<li class="list-group-item">
					<img src="{{asset('assets/svg/Drawkit-Vector-Illustration-Medical-01.svg')}}" alt="" width="100"> <br>
					By : <a target="_BLANK" href="https://www.drawkit.io/">drawkit.io</a>
					<br>
					<a target="_BLANK" href="https://www.drawkit.io/product/medical-health-illustrations">Medical & Health Illustrations</a>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
