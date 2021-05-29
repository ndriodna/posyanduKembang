@extends('front.app')
@section('content')
<div class="container">
	<div class="row justify-content" style="margin-bottom: 100px;">
		<div class="col-lg-6 md-6 sm-12 mt-2">
			<h2 class="text-danger">Posyandu Kembang Sepatu</h2>
			<p class="font-weight-light" style="font-size: 18px;">Salah satu program utama posyandu adalah menyelenggarakan pemeriksaan bayi dan balita secara rutin.
			<br>Pelayanan yang diselenggarakan posyandu untuk balita mencakup penimbangan berat badan, pengukuran tinggi badan dan lingkar kepala anak, evaluasi tumbuh kembang, serta penyuluhan dan konseling tumbuh kembang.</p>
		</div>
		<div class="col-lg-6 md-6 sm-12">
	<img src="{{asset('assets/svg/front_page.svg')}}" alt="" class="float-right img-fluid" width="600">
		</div>
	</div>
</div>
<hr>
<div class="container">
	<h3 class="text-center pt-4">Pelayanan Posyandu Kembang Sepatu</h3>
	<div class="row p-5">
		<div class="col-lg-6 md-6 sm-12">
			<img src="{{asset('assets/svg/Drawkit-Vector-Illustration-Medical-15.svg')}}" class="img-fluid" alt="" width="350">
		</div>
		<div class="col-lg-6 md-6 sm-12">
			<p class="pt-5 mt-5 font-weight-light" style="font-size: 22px;">Balita dan Bayi yang hadir bersama dengan orang tua harus mendaftar terlebih dahulu. <br> Setelah mendaftarkan nama balita dan bayi menunggu giliran di panggil ke meja penimbangan.</p>
		</div>
	</div>
	<div class="row p-5">
		<div class="col-lg-6 md-6 sm-12">
			<p class="pt-5 mt-5 font-weight-light" style="font-size: 22px;">Setelah melakukan pendaftaran dilakukannya penimbangan berat badan, mengukur panjang badan untuk anak usia dibawah 2 tahun, dan tinggi badan untuk anak usia diatas 2 tahun dan yang terakhir mengukur lingkar kepala</p>
		</div>
		<div class="col-lg-6 md-6 sm-12">
			<img src="{{asset('assets/svg/Drawkit-Vector-Illustration-Medical-01.svg')}}" class="img-fluid" alt="" width="350">
		</div>
	</div>
	<div class="row p-5">
		<div class="col-lg-6 md-6 sm-12">
			<img src="{{asset('assets/svg/Drawkit-Vector-Illustration-Medical-16.svg')}}" class="img-fluid" alt="" width="350">
		</div>
		<div class="col-lg-6 md-6 sm-12">
			<p class="pt-5 mt-5 font-weight-light" style="font-size: 22px;">Setelah dilakukanya penimbangan kader mengisi KMS berdasarkan hasil penimbangan yang dilakukan. <br>Kemudian menentukan data hasil penimbangan NTOB. Data tersebut disimpan kedalam sistem aplikasi </p>
		</div>
	</div>
	<div class="row p-5">
		<div class="col-lg-6 md-6 sm-12">
			<p class="pt-5 mt-5 font-weight-light" style="font-size: 22px;">Kader dapat melakukan penyuluhan mengenai masalah kesehatan yang ada. <br> Penyuhulan dapat dilakukan secara individu maupun secara kelompok serta posyandu menyediakan Vitamin A </p>
		</div>
		<div class="col-lg-6 md-6 sm-12">
			<img src="{{asset('assets/svg/Drawkit-Vector-Illustration-Medical-13.svg')}}" class="img-fluid" alt="" width="350">
		</div>
	</div>
	<div class="row p-5">
		<div class="col-lg-6 md-6 sm-12">
			<img src="{{asset('assets/svg/Drawkit-Vector-Illustration-Medical-06.svg')}}" class="img-fluid" alt="" width="450">
		</div>
		<div class="col-lg-6 md-6 sm-12">
			<p class="pt-5 mt-5 font-weight-light" style="font-size: 22px;">Posyandu dapat memberikan pelayanan berupa.
				<ul class="font-weight-light" style="font-size: 20px;">
					<li>Pemberian Imunisasi</li>
					<li>Pemeriksaan Ibu Hamil</li>
					<li>Pelayanan KB</li>
					<li>Pengobatan</li>
					<li>Dan lain-lain</li>
				</ul> </p>
		</div>
	</div>
</div>
<hr>
	<div class="container">
		<div class="p-2">
		<h3 class="text-center">Berita</h3>
		<a href="{{route('showNews')}}" class="float-right">Selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
	<div class="row mt-5">
			@foreach($beritas as $berita)
		<div class="col-lg-4 md-4 sm-12">
			<div class="card shadow p-3 mb-5">
				<div class="card-body">
				<h5 class="card-title">{{$berita->title}}</h5>
			@foreach($berita->tag as $tag)
				<span class="badge badge-primary p-2">{{$tag->name}}</span>
			@endforeach
				<hr>
					{!!Str::limit($berita->desc,200)!!}
					<br>
				<a href="{{route('showNewsDetail',$berita->slug)}}" class="btn btn-primary float-right mt-2">Baca Selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
			@endforeach
	</div>
</div>
@endsection
