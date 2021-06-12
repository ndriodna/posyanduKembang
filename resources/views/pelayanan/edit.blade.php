@extends('layouts.app')

@section('content')
<h3 class="m-3">Pelayanan</h3>

<div class="row">

  <div class="col-lg-4 md-4 sm-12">
    <div class="col-auto">
      <div class="card shadow p-2">
        <div class="card-header">
          <h3 class="card-title">{{$pendaftaran->nama}}</h3>
        </div>
        <div class="card-body">
          <div class="row mb-3">
           <div class="col-6">No BPJS</div>
           <div class="col-6">{{$pendaftaran->no_bpjs}}</div>
         </div>
         <div class="row mb-3">
           <div class="col-6">Jenis Kelamin</div>
           <div class="col-6">{{$pendaftaran->jenis_kelamin}}</div>
         </div>
         <div class="row mb-3">
           <div class="col-6">Nama orang tua</div>
           <div class="col-6">
            {{!empty($pendaftaran->nama_bpk) ? $pendaftaran->nama_bpk : "-"}} & {{!empty($pendaftaran->nama_ibu) == true ?$pendaftaran->nama_ibu : "-"}}
          </div>
        </div>
        <div class="row mb-3">
         <div class="col-6">Umur</div>
         <div class="col-6">{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($pendaftaran->tgl_lahir))}} Bulan</div>
       </div>
       @forelse($pendaftaran->pencatatanOne as $data)
       <div class="row mb-3">
         <div class="col-6">Tgl terakhir timbang</div>
         <div class="col-6">
           {{$data->tgl}}
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-6">NTOB</div>
         <div class="col-6">{{$data->ntob}}</div>
       </div>
       <div class="row mb-3">
         <div class="col-6">Berat Badan terakhir</div>
         <div class="col-6">{{$data->bb_kg}}</div>
       </div>
       <div class="row mb-3">
         <div class="col-6">Tinggi Badan terakhir</div>
         <div class="col-6">{{$data->tb_cm}}</div>
       </div>
       @empty
       <p>Belum ada riwayat pencatatan</p>
       @endforelse
     </div>
   </div>
 </div>
</div>

<div class="col-lg-8 md-8 sm-12">
    <div class="card p-2">
    <div class="card-body">
  <form class="form" method="POST" action="{{route('pelayanan.update',$pelayanan->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <input type="hidden" name="pencatatan_id" value="{{$pencatatan->id}}">
      <div class="form-group">
        <label for="">Jenis Pelayanan</label> <br>
        <input type="text" class="form-control" name="jenis_pelayanan" value="{{$pelayanan->jenis_pelayanan}}">
      </div>
      <div class="form-group">
        <label for="">Keterangan</label> <br>
        <textarea class="form-control" name="keterangan" rows="8" cols="80">{{$pelayanan->keterangan}}</textarea>
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
