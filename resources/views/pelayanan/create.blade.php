@extends('layouts.app')

@section('content')


<form class="form" method="POST" action="{{route('pelayanan.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="card">
  <h3 class="description text-center text-info">Pelayanan</h3>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="">No BPJS</label> <br>
          <input type="number" class="form-control" name="no_bpjs" value="{{$pendaftaran->no_bpjs}}">
        </div>
        <div class="form-group">
          <label for="">Nama</label> <br>
          <input type="text" class="form-control" name="nama" >
        </div>
        <div class="form-group">
          <label for="">Nama Orang Tua</label> <br>
          <input type="text" class="form-control" name="nama_bpk">
        </div>
        <div class="form-group">
          <label for="">Nama Ibu</label> <br>
          <input type="text" class="form-control" name="nama_ibu">
        </div>
        <div class="form-group">
          <label for="">Umur</label><br>
          <input type="date" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Jenis Kelamin</label><br>
         <input type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Alamat</label> <br>
          <textarea class="form-control" name="alamat"rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="">RT/RW</label> <br>
          <input type="text" class="form-control" name="rt_rw" >
        </div>
        <div class="form-group">
          <label for="">Berat Badan Lahir</label> <br>
          <input type="number" class="form-control" name="bb_lahir" placeholder="Berat Badan Lahir" step=".01">
        </div>
        <div class="form-group">
          <label for="">Panjang Badan Lahir</label> <br>
          <input type="number" class="form-control" name="tb_lahir" placeholder="Panjang Badan Lahir" step=".01">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal-footer justify-content-center">
  <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>

@endsection
