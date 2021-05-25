@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{route('pendaftaran.index')}}" class="btn btn-success m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>
  Kembali</a>
  <div class="row justify-content-center">
    <div class="col=lg-6 md-6 sm-12">
      <div class="card shadow p-3">
          <h5 class="text-center p-2">Data Anak</h5>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-6">
              <h5 class="">NO BPJS </h5>
            </div>
            <div class="col-6">
              <h5 class="" >{{$pendaftaran->no_bpjs}}</h5>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Nama Anak </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->nama}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Nama Bapak </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->nama_bpk ? $pendaftaran->nama_bpk : '-'}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Nama Ibu </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->nama_ibu ? $pendaftaran->nama_ibu : '-'}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Tanggal Lahir </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{date('d F Y', strtotime($pendaftaran->tgl_lahir))}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Jenis Kelamin</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->jenis_kelamin}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Alamat</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->alamat}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">RT/RW</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->rt_rw}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Berat Badan Lahir</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->bb_lahir}} Kg</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Panjang Badan Lahir </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$pendaftaran->tb_lahir}} CM</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <h4 class="text-center p-3">Data Riwayat Pencatatan</h4>
  <div class="row">
  @forelse($pendaftaran->pencatatan as $pencatatan)
    <div class="col-lg-4 md-4 sm-12">
      <div class="card shadow p-3">
        <h5 class="text-center p-2">{{$pendaftaran->nama}}</h5>
        <div class="card-body">
          <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Tgl Timbang</h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{date('d-m-Y',strtotime($pencatatan->tgl))}}</h6>
           </div>
         </div>
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Berat Badan </h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{$pencatatan->bb_kg}} KG</h6>
           </div>
         </div>
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Tinggi Badan </h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{$pencatatan->tb_cm}} CM</h6>
           </div>
         </div>
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Lingkaran Kepala</h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{$pencatatan->lingkar_kepala}} CM</h6>
           </div>
         </div>
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">NTOB</h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{$pencatatan->ntob}}</h6>
           </div>
         </div>
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Keterangan</h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{$pencatatan->keterangan}}</h6>
           </div>
         </div>
         <hr>
         @foreach($pencatatan->pelayanan as $data)
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Pelayanan</h6>
           </div>
           <div class="col-6">
             <h6 class="" >{{$data->jenis_pelayanan}}</h6>
           </div>
         </div>
         <div class="row mb-3">
           <div class="col-6">
             <h6 class="">Keterangan</h6>
           </div>
           <div class="col-6">
             <h6 class="">{!!$data->keterangan!!}</h6>
           </div>
         </div>
         @endforeach
       </div>
     </div>
   </div>
   @empty
   <p class="text-center">Belum ada pencatatan</p>
 @endforelse
 </div>
</div>
@endsection
