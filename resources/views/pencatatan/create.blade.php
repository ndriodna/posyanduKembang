@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="p-2 mb-3">Pencatatan</h3>
  <div class="row">
    <div class="col-lg-5 md-5 sm-12">
      <div class="card shadow">
        <div class="card-header" style="margin-bottom: -30px;"><h5>Data Anak</h5></div>
        <div class="card-body">
          <div class="row mb-3">
           <div class="col-lg-12 sm-12">
            <h4 class="text-center">{{$pendaftaran->nama}}</h4>
          </div>
        </div>
        <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">Jenis Kelamin</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($pendaftaran->jenis_kelamin)}}</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">Umur</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($pendaftaran->tgl_lahir))}} Bulan</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">BB Lahir</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($pendaftaran->bb_lahir)}} Kg</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">TB Lahir</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($pendaftaran->tb_lahir)}} Kg</h6>
         </div>
       </div>
       <hr>
       <div class="text-center p-2 mb-3"><h5>Riwayat Pencatatan</h5></div>
       @forelse($pendaftaran->pencatatanOne as $data)
       @if(!empty($data))
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">Tgl Timbang terakhir</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($data->tgl)}}</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">BB terakhir</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($data->bb_kg)}} Kg</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">TB terakhir</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($data->tb_cm)}} CM</h6>
         </div>
       </div>
        <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">LK terakhir</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($data->lingkar_kepala)}} CM</h6>
         </div>
       </div>
       <div class="row mb-3">
         <div class="col-lg-4 sm-12">
           <h6 class="">NTOB</h6>
         </div>
         <div class="col-lg-8 sm-12">
           <h6 class="" >{{($data->ntob)}}</h6>
         </div>
       </div>
       @endif
       @empty
       <p class="text-center">Belum memiliki catatan</p>
       @endforelse
     </div>
   </div>
 </div>
 {{-- form --}}
 <div class="col-lg-7 md-7 sm-12">
  <form action="{{route('pencatatan.store')}}" method="POST">
    @csrf
    <div class="card shadow">
      <div class="card-body">
       <div class="form-group">
        <label for="">Nama</label> <br>
        <select name="pendaftaran_id" id="" class="selectpicker">
          <option value="{{$pendaftaran->id}}">{{$pendaftaran->nama}}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Berat Badan / Kg</label><br>
        <input type="number" class="form-control" name="bb_kg" placeholder="Berat Badan" step=".01" autofocus>
      </div>
      <div class="form-group">
        <label for="">Tinggi Badan / CM</label>
        <input type="number" class="form-control" name="tb_cm" step=".01" placeholder="Tinggi Badan">
      </div>
      <div class="form-group">
        <label for="">Lingkaran Kepala / CM</label>
        <input type="number" class="form-control" name="lingkar_kepala" step=".01" placeholder="Lingkaran Kepala">
      </div>
      <div class="form-group">
        <label for="">NTOB</label> <br>
        <select name="ntob" id="" class="selectpicker">
          <option value=""></option>
          <option value="naik">Naik</option>
          <option value="turun">Turun</option>
          <option value="tidak_hadir">Tidak Hadir</option>
          <option value="baru">Baru</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Tanggal Timbang</label>
        <input type="date" name="tgl" class="form-control"/>
        <span class="text-danger">kosongkan bila tanggal sekarang</span>
      </div>
      <div class="form-group">
        <label for="">keterangan</label>
        <textarea name="keterangan" class="form-control" rows="8" cols="80"></textarea>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</form>
</div>
</div>
</div>
</div>
@endsection
