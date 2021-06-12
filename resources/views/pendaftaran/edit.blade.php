@extends('layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 md-6 sm-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Edit Pendaftaran</h5>
        </div>
        <div class="card-body">
          <form action="{{route('pendaftaran.update',$pendaftaran)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
             <label class="form-control-label">No BPJS</label>
             <input class="form-control" type="text" name="no_bpjs" value="{{$pendaftaran->no_bpjs}}">
             <p class="text-danger">{{ $errors->first('no_bpjs') }}</p>
           </div>
           <div class="form-group">
            <label class="form-control-label">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{$pendaftaran->nama}}">
            <p class="text-danger">{{ $errors->first('nama') }}</p>
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Bapak</label>
            <input class="form-control" type="text" name="nama_bpk" value="{{$pendaftaran->nama_bpk}}">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Ibu</label>
            <input class="form-control" type="text" name="nama_ibu" value="{{$pendaftaran->nama_ibu}}">
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="{{$pendaftaran->tgl_lahir}}">
              <p class="text-danger">{{ $errors->first('tgl_lahir') }}</p>
          </div>
          <div class="form-group">
            <label class="form-control-label">Jenis Kelamin</label><br>
            <select class="selectpicker" data-style="btn btn-info" name="jenis_kelamin" >
              <option value="laki-laki" {{$pendaftaran->jenis_kelamin == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
              <option value="perempuan" {{$pendaftaran->jenis_kelamin == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4">{{$pendaftaran->alamat}}</textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label">RT/RW</label>
            <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW" value="{{$pendaftaran->rt_rw}}">
          </div>
          <div class="form-group">
            <label class="form-control-label">Berat Badan Lahir</label>
            <input type="number" class="form-control" step=".01" name="bb_lahir" placeholder="Berat Badan Lahir" value="{{$pendaftaran->bb_lahir}}">
              <p class="text-danger">{{ $errors->first('bb_lahir') }}</p>
          </div>
          <div class="form-group">
            <label class="form-control-label">Panjang Badan Lahir</label>
            <input type="number" class="form-control" step=".01" name="tb_lahir" placeholder="Panjang Badan Lahir" value="{{$pendaftaran->tb_lahir}}">
              <p class="text-danger">{{ $errors->first('tb_lahir') }}</p>

          </div>
          <div class="form-group">
           <button type="submit" class="btn btn-warning">Ubah</button>
         </div>
       </form>
     </div>
   </div>
 </div>
</div>
</div>

@endsection
