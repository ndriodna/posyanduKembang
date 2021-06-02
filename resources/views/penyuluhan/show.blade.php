@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{route('pendaftaran.index')}}" class="btn btn-success m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>
  Kembali</a>
  <div class="row justify-content-center">
    <div class="col-lg-12 md-12 sm-12">
      <div class="card shadow p-4">
          <h5 class="text-center p-2">Data Penyuluhan</h5>
          <span class="text-center">{{date('d-m-Y',strtotime($penyuluhan->tgl))}}</span>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-4">
              <h5 class="">Waktu & Tempat</h5>
            </div>
            <div class="col-8">
              <h5 class="" >{{$penyuluhan->waktu_tempat}}</h5>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <h6 class="">Materi</h6>
            </div>
            <div class="col-8">
              <h6 class="" >{{$penyuluhan->materi}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <h6 class="">Peserta</h6>
            </div>
            <div class="col-8">
              <h6 class="" >{{$penyuluhan->peserta}}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
