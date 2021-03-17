@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Warga</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-sm-4">
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data</a>
            </div><br>
            <table class="table" id="residentTable">
              <thead>
                <th>NIK</th>
                <th>No KK</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Kelurahan/Desa</th>
                <th>Kecamatan</th>
                <th>Agama</th>
                <th>Status Perkawinan</th>
                <th>Pekerjaan</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($residents as $resident)
                <tr>
                  <td>{{$resident->nik}}</td>
                  @if(!empty($resident->family->no_kk))
                  <td>{{$resident->family->no_kk}}</td>
                  @else <td></td> @endif
                  <td>{{$resident->nama}}</td>
                  <td>
                    <img src="{{asset('storage/'.$resident->foto)}}" alt="responsive image" class="img-fluid">
                  </td>
                  <td>{{$resident->tempat_tgl_lahir}}</td>
                  <td>{{$resident->jenis_kelamin}}</td>
                  <td>{{$resident->alamat}}</td>
                  <td>{{$resident->rt_rw}}</td>
                  <td>{{$resident->kel_desa}}</td>
                  <td>{{$resident->kecamatan}}</td>
                  <td>{{$resident->agama}}</td>
                  <td>{{$resident->status_perkawinan}}</td>
                  <td>{{$resident->pekerjaan}}</td>
                  <td class="col-1">
                    <div class="btn-group">
                      <a href="#" class="btn btn-info">Lihat</a>
                      <a href="{{route('residents.edit',$resident)}}" class="btn btn-warning">Ubah</a>
                      <form id="delete-form-{{$resident->id}}" action="{{ route('residents.destroy',$resident->id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                      <a href="#" class="btn btn-danger" onclick="deleteItem({{$resident->id}})">Hapus</a>
                     </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- modal --}}
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg " role="document">
<div class="modal-content">
<div class="modal-body">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<form class="form" method="POST" action="{{route('residents.store')}}" enctype="multipart/form-data">
@csrf
<h3 class="description text-center text-success">Input Data Warga</h3>
<div class="card-body">
  <div class="row">
    <div class="col-12">
      <div class="form-group">
          <input type="number" class="form-control" name="nik" placeholder="NIK">
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
          <input type="text" class="form-control" name="nama" placeholder="Nama">
      </div>
      <div class="form-group">
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <label>Foto</label>
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
        <input type="text" class="form-control" name="tempat_tgl_lahir" placeholder="Tempat, Tanggal Lahir">
      </div>
      <div class="form-group">
        <select class="selectpicker" data-style="btn btn-info" name="jenis_kelamin" >
          <option value="laki-laki">Laki-laki</option>
          <option value="perempuan">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
         <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4"></textarea>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="kel_desa" placeholder="Kelurahan/Desa">
      </div>
      <div class="form-group">
      <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="agama" placeholder="Agama">
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="status_perkawinan" placeholder="Status Perkawinan">
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan">
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal-footer justify-content-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>

@endsection
