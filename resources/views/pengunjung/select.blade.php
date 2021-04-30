@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 md-6 sm-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Pilih No KK</h5>
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
           <label>No KK</label><br>
           <select class="selectpicker" data-style="btn btn-danger" name="kk" data-live-search="true">
             @foreach($families as $familie)
             <option @foreach($resident->familie as $qq)
               @if($familie != "no_kk")
               {{$qq->id == $familie->id ? 'selected' : ''}}
               @endif
               @endforeach
             value="{{$familie->id}}">{{$familie->no_kk}}</option>
             @endforeach
           </select>
           </div>
           {{-- <div class="form-group">
             <label for="">No KK</label><br>
             <select class="selectpicker" data-style="btn btn-danger" name="no_kk" data-live-search="true">
               <option value=""></option>
              @foreach($families as $familie)
              <option value="{{$familie->id}}">{{$familie->no_kk}} - {{$familie->kepala['nama']}}</option>
              @endforeach
            </select>
          </div> --}}
          <div class="form-group">
            <label class="form-control-label">Nama</label>
            <input class="form-control" type="text" name="nama" value="{{$resident->nama}}" readonly>
            <p class="text-danger">{{ $errors->first('nama') }}</p>
          </div>
          <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput" hidden>
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
            <input type="text" class="form-control" name="tempat_tgl_lahir" placeholder="Tempat, Tanggal Lahir" value="{{$resident->tempat_tgl_lahir}}" hidden>
          </div>
          <div class="form-group">
            <input type="text" name="jenis_kelamin" value="{{$resident->jenis_kelamin}}" hidden>
          </div>
          <div class="form-group">
           <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4" hidden>{{$resident->alamat}}</textarea>
         </div>
         <div class="form-group">
          <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW" value="{{$resident->rt_rw}}" hidden>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="kel_desa" placeholder="Kelurahan/Desa" value="{{$resident->kel_desa}}" hidden>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan" value="{{$resident->kecamatan}}" hidden>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="agama" placeholder="Agama" value="{{$resident->agama}}" hidden>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="status_perkawinan" placeholder="Status Perkawinan" value="{{$resident->status_perkawinan}}" hidden>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="{{$resident->pekerjaan}}" hidden>
        </div>
        <div class="form-group">
         <button type="submit" class="btn btn-success">Simpan</button>
       </div>
     </form>
   </div>
 </div>
</div>
</div>
</div>
@endsection
