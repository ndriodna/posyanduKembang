@extends('layouts.app')

@section('content')
<style type="text/css" scoped>
h5{
	font-weight: 800;
}
.teks{
	font-size: 16px;
	font-weight: 500;
	margin-top: 10px;
	margin-bottom: 10px;
}
</style>
<div class="container-fluid margin-0">
	<h3 class="text-center text-primary my-2">Bantuan Penggunaan Aplikasi</h3>
	<div class="row">
		<div class="col-12">
			<div class="card">
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
						<span class="text-danger">Catatan : data yang tertera pada gambar hanya data sementara bukan data aslinya <br> Tekan gambar untuk memperbesar</span>
					</div>
					<h5 id="account" class="my-2">1. Halaman Account User</h5>
					<img src="{{asset('assets/help-page/1.1.jpg')}}" alt="" class="shadow img-fluid" onclick="window.open(this.src, '_blank');">
					<p class="my-3 teks">Pada halaman ini digunakan untuk mengatur akun yang boleh menggunakan aplikasi ini</p>
					<ul class="my-5">
						<h6 class="my-4">Halaman User Profile</h6>
						<li class="teks">
							Halaman User Profile, halaman untuk mengatur akun anda dan dapat melakukan perubahan username dan password. yang dapat memasuki user profile adalah pemilik akun dan admin
							Berikut ini tampilan halaman user profile  <br>
							<img src="{{asset('assets/help-page/1.2.jpg')}}" alt="" class="img-fluid shadow" onclick="window.open(this.src, '_blank');">
						</li>
						<h6 class="my-4">Halaman User Management</h6>
						<li class="teks">
							Halaman User Management, halaman yang hanya dapat di akses oleh admin, halaman ini untuk mengatur seluruh akun pengguna yang ada <br>
							<img src="{{asset('assets/help-page/1.3.jpg')}}" alt="" class="img-fluid shadow mb-2" onclick="window.open(this.src, '_blank');">
						</li>
						<li class="teks">Pada halaman tersebut terdapat tombol tambah yang berwarna hijau berguna untuk menambah akun pengguna lainnya (hanya admin saja yang dapat menambah akun tersebut)<br>
							<img src="{{asset('assets/help-page/1.4.jpg')}}" alt="" class="img-fluid shadow mb-2" onclick="window.open(this.src, '_blank');">
							<br>
							terdapat inputan username dan password masukan username dan password dan role untuk dapat masuk menggunakan akun tersebut sesuai dengan rolenya (jangan sampai lupa username dan password)
						</li>
						<li class="teks">
							Kembali ke halaman user management, disitu terdapat tombol pensil berwarna kuning, tombol pensil tersebut digunakan untuk mengedit user halaman tersebut dapat digunakan oleh admin untuk mengganti data akun pengguna lainnya jika dibutuhkan. dan tombol sampah berwarna merah digunakan untuk menghapus akun pengguna (akun admin utama tidak dapat dihapus)
						</li>
						<li class="teks">
							dan tombol mata berwarna biru digunakan untuk melihat detail informasi akun tersebut
							<img src="{{asset('assets/help-page/1.5.jpg')}}" alt="" class="img-fluid shadow mb-2" onclick="window.open(this.src, '_blank');">
						</li>
					</ul>
					<hr>
					<h5 id="pendaftaran" class="my-2">2. Halaman Pendaftaran</h5>
					<img src="{{asset('assets/help-page/2.1.jpg')}}" alt="" class="shadow img-fluid" onclick="window.open(this.src, '_blank');">
					<p class="my-3 teks">Pada halaman ini digunakan untuk mendata anak sebelum dilakukannya pengukuran dan penimbangan</p>
					<ul>
						<h6 class="my-4">Halaman tambah data</h6>
						<li class="teks">
							Halaman tambah data pada halaman pendaftaran untuk menambahkan data anak yang belum terdaftar sebelumnya
							<img src="{{asset('assets/help-page/2.2.jpg')}}" alt="" class="img-fluid shadow" onclick="window.open(this.src, '_blank');">
						</li>
						<h6 class="my-5">Halaman ubah data</h6>
						<li class="teks">
							Halaman ubah data pada halaman pendaftaran untuk mengubah data anak apabila terjadi kesalahan inputan, untuk melakukan ubah data pertama yang dilakukan adalah pilih data anak yang ingin diubah lalu tekan tombol kuning bergambar pensil lalu tekan tulisan ubah data seperti pada gambar di bawah berikut <br>
							<img src="{{asset('assets/help-page/2.3.jpg')}}" alt="" class="img-fluid shadow my-2" onclick="window.open(this.src, '_blank');"> 
							<br>
							pada halaman ubah data mirip seperti tambah data hanya lakukan perubahan data yang diinginkan lalu tekan tombol ubah pada bagian bawah
						</li>
						<h6 class="my-5">Halaman lihat data</h6>
						<li class="teks">
							Halaman lihat data pada halaman pendaftaran untuk melihat seluruh riwayat pengukuran data anak, tekan tombol berwarna biru bergambar mata, maka anda akan dibawa ke halaman data anak tersebut seperti gambar di bawah<br>
							<img src="{{asset('assets/help-page/2.4.jpg')}}" alt="" class="img-fluid shadow my-2" onclick="window.open(this.src, '_blank');"> <br>
							jika anda geser kebawah anda dapat melihat data riwayat pengukuran yang telah tercatat pada anak tersebut seperti gambar dibawah ini <br>
							<img src="{{asset('assets/help-page/2.5.jpg')}}" alt="" class="img-fluid shadow my-2" onclick="window.open(this.src, '_blank');">
						</li>
						<h6 class="my-5">Hapus data anak</h6>
						<li class="teks">
							Terdapat tombol berwarna merah bergambar tempat sampah, tombol tersebut digunakan untuk menghapus data anak dan seluruh riwayat pengukuran nya. Untuk menhapus data anak anda harus menghapus data riwayat anak tersebut pada saat anda menekan tombol tersebut akan muncul data riawat anak yang harus dihapus terlebih dahulu seperti gambar di bawah<br>
							<img src="{{asset('assets/help-page/2.6.jpg')}}" alt="" class="img-fluid shadow my-2" onclick="window.open(this.src, '_blank');"> <br>
							jika anda telah menghapus seluruh riwayat anak tersebut barulah anda dapat menghapus data anak tersebut maka tulisan pada tombol hapus tersebut akan berubah seperti gambar dibawah ini <br>
							<img src="{{asset('assets/help-page/2.7.jpg')}}" alt="" class="img-fluid shadow my-2" onclick="window.open(this.src, '_blank');">
						</li>
					</ul>
					<hr>
					<h5 id="ukur" class="my-2">3. Halaman Ukur & Timbang</h5>
					<img src="{{asset('assets/help-page/3.1.jpg')}}" alt="" class="shadow img-fluid" onclick="window.open(this.src, '_blank');">
					<p class="my-3 teks">Pada halaman ini digunakan untuk pengukuran dan penimbangan anak </p>
					<ul>
						<h6 class="my-4">Menambah data Ukur & Timbang</h6>
						<li class="teks">
							Untuk menambahkan data ukur pada anak anda harus kembali ke halaman pendaftaran dan menekam tombol berwarna hijau bergambar plus lalu tekan tambah ukur & timbang seperti gambar dibawah ini <br>
							<img src="{{asset('assets/help-page/3.2.jpg')}}" alt="" class="shadow img-fluid" onclick="window.open(this.src, '_blank');"> <br>
							setelah anda menekan tombol tersebut anda akan diarahkan kehalaman pengukuran & penimbangan seperti gambar dibawah ini <br>
							<img src="{{asset('assets/help-page/3.3.jpg')}}" alt="" class="shadow img-fluid" onclick="window.open(this.src, '_blank');"> <br>
							pada halaman tersebut terdapat data anak dan data riwayat jika sudah memiliki catatan sebelumnya anak tersebut dan terdapat form inputan untuk memasukan data ukur dan timbang pada anak
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
