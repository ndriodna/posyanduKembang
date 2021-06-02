@extends('layouts.app')

@section('content')
<style type="text/css" scoped>
h5{
	font-weight: 900;
}
.teks{
	font-size: 16px;
	font-weight: 500;
}
</style>
<div class="container">
	<h3 class="text-center text-primary my-2">Bantuan Penggunaan Aplikasi</h3>
	<div class="row">
		<div class="col-12">
			<div class="card p-3">
				<div class="card-body">
					<div class="p-3 mb-4">
						<h5>Klik pada link berikut</h5>
						<ol>
							<li><a href="#account">Halaman Account</a></li>
							<li><a href="#pendaftaran">Halaman Pendaftaran</a></li>
							<li><a href="#ukur">Halaman Ukur & Timbang</a></li>
							<li><a href="#penyuluhan">Halaman Penyuluhan</a></li>
							<li><a href="#pelayanan">Halaman pelayanan</a></li>
							<li><a href="#Rekap">Halaman Rekap</a></li>
							<li><a href="#blog">Halaman blog</a></li>
						</ol>
					</div>
					<h5 id="account">1. Halaman Account User</h5>
					<img src="{{asset('assets/help-page/1.jpg')}}" alt="" class="shadow img-fluid">
					<p class="my-2 teks">Pada halaman ini digunakan untuk mengatur akun yang boleh menggunakan aplikasi ini</p>
					<ul class="my-5">
						<h6 class="my-4">Halaman User Profile</h6>
						<li class="teks">
							Halaman User Profile, halaman untuk mengatur akun anda dan dapat melakukan perubahan username dan password. yang dapat memasuki user profile adalah pemilik akun dan admin
							Berikut ini tampilan halaman user profile  <br>
							<img src="{{asset('assets/help-page/2.jpg')}}" alt="" class="img-fluid shadow">
						</li>
						<h6 class="my-4">Halaman User Management</h6>
						<li class="teks">
							Halaman User Management, halaman yang hanya dapat di akses oleh admin, halaman ini untuk mengatur seluruh akun pengguna yang ada <br>
							<img src="{{asset('assets/help-page/3.jpg')}}" alt="" class="img-fluid shadow mb-2">
						</li>
						<li class="teks">Pada halaman tersebut terdapat tombol tambah yang berwarna hijau berguna untuk menambah akun pengguna lainnya (hanya admin saja yang dapat menambah akun tersebut)<br>
							<img src="{{asset('assets/help-page/4.jpg')}}" alt="" class="img-fluid shadow mb-2">
							<br>
							terdapat inputan username dan password masukan username dan password dan role untuk dapat masuk menggunakan akun tersebut sesuai dengan rolenya (jangan sampai lupa username dan password)
						</li>
						<li class="teks">
							Kembali ke halaman user management, disitu terdapat tombol pensil berwarna kuning, tombol pensil tersebut digunakan untuk mengedit user halaman tersebut dapat digunakan oleh admin untuk mengganti data akun pengguna lainnya jika dibutuhkan. dan tombol sampah berwarna merah digunakan untuk menghapus akun pengguna (akun admin utama tidak dapat dihapus)
						</li>
						<li class="teks">
							dan tombol mata berwarna biru digunakan untuk melihat detail informasi akun tersebut
							<img src="{{asset('assets/help-page/5.jpg')}}" alt="" class="img-fluid shadow mb-2">
						</li>
					</ul>
					<hr>
					<h5>2. Halaman Pendaftaran</h5>
					<img src="{{asset('assets/help-page/2.1.jpg')}}" alt="" class="shadow img-fluid">
					<p class="my-2 teks">Pada halaman ini digunakan untuk mendata anak sebelum dilakukannya pengukuran dan penimbangan</p>
					<ul>
						<li class="teks">
							
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
