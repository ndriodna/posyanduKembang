@extends('layouts.app')

@section('content')
<div class="container">
      <a href="{{route('pencatatan.index')}}" class="btn btn-success m-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Kembali</a>
  <div class="row">
    @foreach ($pencatatan->pendaftaran as $data)

    <div class="col-lg-6 md-6 sm-12">
      <div class="card shadow p-3">
          <h5 class="text-center p-2">Data Anak</h5>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-6">
              <h5 class="">NO BPJS </h5>
            </div>
            <div class="col-6">
              <h5 class="" >{{$data->no_bpjs}}</h5>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Nama Anak </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->nama}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Nama Bapak </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->nama_bpk ? $data->nama_bpk : '-'}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Nama Ibu </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->nama_ibu ? $data->nama_ibu : '-'}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Tanggal Lahir </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{date('d F Y', strtotime($data->tgl_lahir))}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Jenis Kelamin</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->jenis_kelamin}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Alamat</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->alamat}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">RT/RW</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->rt_rw}}</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Berat Badan Lahir</h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->bb_lahir}} Kg</h6>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-6">
              <h6 class="">Panjang Badan Lahir </h6>
            </div>
            <div class="col-6">
              <h6 class="" >{{$data->tb_lahir}} CM</h6>
            </div>
          </div>
     </div>
   </div>
 </div>
 <div class="col-lg-6 md-6 sm-12">
   <div class="card shadow p-3">
       <h5 class="text-center p-2">Riwayat Pencatatan</h5>
     <div class="card-body">
      <div class="row mb-3">
         <div class="col-6">
           <h6 class="">Tgl Timbang </h6>
         </div>
         <div class="col-6">
           <h6 class="" >{{date('d-m-Y',strtotime($pencatatan->tgl))}}</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-6">
           <h6 class="">Umur</h6>
         </div>
         <div class="col-6">
           <h6 class="" >{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($data->tgl_lahir))}} Bulan</h6>
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
  </div>
</div>
</div>
@endforeach

</div>
</div>
@endsection
