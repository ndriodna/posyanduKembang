@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 md-6 sm-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Edit Pengunjung</h5>
        </div>
        <div class="card-body">
          <form action="{{route('pengunjung.update',$pengunjung)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
             <label class="form-control-label">NIK</label>
             <input class="form-control" type="text" name="nik" value="{{$pengunjung->nik}}" readonly>
             <p class="text-danger">{{ $errors->first('nik') }}</p>
           </div>
          <div class="form-group">
            <label class="form-control-label">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{$pengunjung->nama}}">
            <p class="text-danger">{{ $errors->first('nama') }}</p>
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{$pengunjung->tgl_lahir}}">
          </div>
          <div class="form-group">
            <label class="form-control-label">Jenis Kelamin</label><br>
            <select class="selectpicker" data-style="btn btn-info" name="jenis_kelamin" >
              <option value="laki-laki" {{$pengunjung->jenis_kelamin == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
              <option value="perempuan" {{$pengunjung->jenis_kelamin == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
            </select>
          </div>
           <div class="form-group">
            <label class="form-control-label">Kategori</label><br>
            <select class="selectpicker" data-style="btn btn-info" name="kategori" >
              <option value="ibu hamil" {{$pengunjung->kategori == 'ibu hamil' ? 'selected' : ''}}>Ibu Hamil</option>
              <option value="anak-anak" {{$pengunjung->kategori == 'anak-anak' ? 'selected' : ''}}>Anak-anak</option>
              <option value="balita" {{$pengunjung->kategori == 'balita' ? 'selected' : ''}}>Balita</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
           <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4">{{$pengunjung->alamat}}</textarea>
         </div>
         <div class="form-group">
            <label class="form-control-label">RT/RW</label>
          <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW" value="{{$pengunjung->rt_rw}}">
        </div>
        <div class="form-group">
            <label class="form-control-label">Kelurahan/Desa</label>
          <input type="text" class="form-control" name="kel_desa" placeholder="Kelurahan/Desa" value="{{$pengunjung->kel_desa}}">
        </div>
        <div class="form-group">
          <label class="form-control-label">Kecamatan</label>
          <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan" value="{{$pengunjung->kecamatan}}">
        </div>
        <div class="form-group">
         <button type="submit" class="btn btn-success">Ubah</button>
       </div>
     </form>
   </div>
 </div>
</div>
</div>
</div>
@endsection
