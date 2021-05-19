@extends('layouts.app')

@section('content')
<div class="container">
      <a href="{{route('pendaftaran.index')}}" class="btn btn-success m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Kembali</a>
  <div class="row">
    <div class="col-lg-6 md-6 sm-12">
      <div class="card shadow p-3">
        <div class="card-header text-center">
          <h5>Data Anak</h5>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h5 class="">NO BPJS </h5>
            </div>
            <div class="col-lg-8 sm-12">
              <h5 class="" >{{$pendaftaran->no_bpjs}}</h5>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Nama Anak </h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->nama}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Nama Bapak </h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->nama_bpk ? $pendaftaran->nama_bpk : '-'}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Nama Ibu </h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->nama_ibu ? $pendaftaran->nama_ibu : '-'}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Tanggal Lahir </h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{date('d F Y', strtotime($pendaftaran->tgl_lahir))}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Jenis Kelamin</h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->jenis_kelamin}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Alamat</h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->alamat}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">RT/RW</h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->rt_rw}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Berat Badan Lahir</h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->bb_lahir}} Kg</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 sm-12">
              <h6 class="">Panjang Badan Lahir </h6>
            </div>
            <div class="col-lg-8 sm-12">
              <h6 class="" >{{$pendaftaran->tb_lahir}} CM</h6>
            </div>
          </div>
     </div>
   </div>
 </div>
</div>
</div>
@endsection
