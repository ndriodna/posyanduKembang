@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 md-6 sm-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Edit User</h5>
        </div>
        <div class="card-body">
          <form action="{{route('residents.update',$resident)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
             <label class="form-control-label">NIK</label>
             <input class="form-control" type="text" name="nik" value="{{$resident->nik}}" readonly>
             <p class="text-danger">{{ $errors->first('nik') }}</p>
           </div>
           <div class="form-group">
             <label for="">No KK</label><br>
             <select class="selectpicker" data-style="btn btn-info" name="no_kk" data-live-search="true">
              @foreach($families as $familie)
              <option value="{{$familie->id}}">{{$familie->no_kk}} - {{$familie->kepala['nama']}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{$resident->nama}}">
            <p class="text-danger">{{ $errors->first('nama') }}</p>
          </div>
          <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <label>Foto</label>
              <img src="{{asset('storage/'.$resident->foto)}}" width="100" height="100">
              <div class="fileinput-new img-thumbnail" >
              </div>
              <div class="fileinput-preview fileinput-exists img-thumbnail" ></div>
              <div>
                <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Pilih Foto</span><span class="fileinput-exists">Ganti</span><input type="file" name="foto"></span>
                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Buang</a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="tempat_tgl_lahir" placeholder="Tempat, Tanggal Lahir" value="{{$resident->tempat_tgl_lahir}}">
          </div>
          <div class="form-group">
            <select class="selectpicker" data-style="btn btn-info" name="jenis_kelamin" >
              <option value="laki-laki" {{$resident->jenis_kelamin == 'laki-laki' ? 'selected' : ''}}>Laki-laki</option>
              <option value="perempuan" {{$resident->jenis_kelamin == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
            </select>
          </div>
          <div class="form-group">
           <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4">{{$resident->alamat}}</textarea>
         </div>
         <div class="form-group">
          <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW" value="{{$resident->rt_rw}}">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="kel_desa" placeholder="Kelurahan/Desa" value="{{$resident->kel_desa}}">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan" value="{{$resident->kecamatan}}">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="agama" placeholder="Agama" value="{{$resident->agama}}">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="status_perkawinan" placeholder="Status Perkawinan" value="{{$resident->status_perkawinan}}">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="{{$resident->pekerjaan}}">
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