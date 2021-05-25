@extends('layouts.app')

@section('content')

      <h3 class="p-2 mb-3">Pelayanan</h3>
<div class="row">
<div class="col-lg-5 md-5 sm-12">
    <div class="col-auto">
      <div class="card shadow p-2">
        <div class="card-header">
          <h5>Data Anak</h5>
        </div>
        <div class="card-body">
          @foreach($pencatatan->pendaftaran as $data)
          <h5 class="text-center mb-3">{{$data->nama}}</h5>
          <div class="row mb-3">
           <div class="col-6">No BPJS</div>
           <div class="col-6">{{$data->no_bpjs}}</div>
         </div>
         <div class="row mb-3">
           <div class="col-6">Jenis Kelamin</div>
           <div class="col-6">{{$data->jenis_kelamin}}</div>
         </div>
         <div class="row mb-3">
           <div class="col-6">Nama orang tua</div>
           <div class="col-6">
            {{!empty($data->nama_bpk) ? $data->nama_bpk : "-"}} & {{!empty($data->nama_ibu) == true ?$data->nama_ibu : "-"}}
          </div>
        </div>
        <div class="row mb-3">
         <div class="col-6">Umur</div>
         <div class="col-6">{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($data->tgl_lahir))}} Bulan</div>
       </div>
       @endforeach
       <div class="row mb-3">
         <div class="col-6">Tgl terakhir timbang</div>
         <div class="col-6">
           {{date('d-m-Y',strtotime($pencatatan->tgl))}}
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-6">NTOB</div>
         <div class="col-6">{{$pencatatan->ntob}}</div>
       </div>
       <div class="row mb-3">
         <div class="col-6">Berat Badan terakhir</div>
         <div class="col-6">{{$pencatatan->bb_kg}}</div>
       </div>
       <div class="row mb-3">
         <div class="col-6">Tinggi Badan terakhir</div>
         <div class="col-6">{{$pencatatan->tb_cm}}</div>
       </div>
     </div>
   </div>
 </div>
</div>

  <div class="col-lg-7 md-7 sm-12">
    <div class="card shadow">
      <h5 class="text-center p-3">Form Pelayanan</h5>
    <form class="form" method="POST" action="{{route('pelayanan.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <input type="hidden" name="pencatatan_id" value="{{$pencatatan->id}}">
        <div class="form-group">
          <label for="">Jenis Pelayanan</label> <br>
          <input type="text" class="form-control" name="jenis_pelayanan">
        </div>
        <div class="form-group">
          <label for="">Keterangan</label> <br>
          <textarea class="form-control my-editor" name="keterangan" rows="8" cols="80"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
  
</div>

@endsection
