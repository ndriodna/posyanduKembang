@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-sm-8">

    <form class="form" method="POST" action="{{route('pelayanan.store')}}" enctype="multipart/form-data">
      @csrf
      <br>
      <h3 class="description text-info">Pelayanan</h3>
      <div class="card-body">
            <div class="form-group">
              <label for="">Nama</label> <br>
                <select class="selectpicker" data-style="btn btn-info" name="pendaftaran_id" >
                <option value="{{$pendaftaran->id}}">{{$pendaftaran->nama}}</option>
                </select>
            </div>
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
  <div class="col-md-4">
    <br>
      <div class="col-auto">
        <div class="card">
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
            @foreach($pendaftaran->pencatatan as $data)
            @if ($data->pendaftaran_id == null)
              <p>Belum ada Catatan</p>
            @else
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
            @endif
       @endforeach
         </div>
       </div>
     </div>
  </div>
</div>

@endsection
