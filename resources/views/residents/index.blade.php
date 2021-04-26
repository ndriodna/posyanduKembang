@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pendaftaran</h4>
        </div>
        <div class="card-body">
            <div class="col-sm-4">
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data</a>
            </div><br>
          <div class="table-responsive">
            <table class="table" id="residentTable">
              <thead>
                <th>NIK</th>
                <th>Phase 2</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Kelurahan/Desa</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($residents as $resident)
                <tr>
                  <td>{{$resident->nik}}</td>
                  <td>@forelse($resident->familie as $pp)
                    <span class="badge badge-info">{{$pp->no_kk}}</span>
                    @empty
                    <span>Belum Terdaftar KK</span>
                    @endforelse
                  </td>
                  <td>{{$resident->nama}}</td>
                  <td>
                    <img src="{{asset('storage/'.$resident->foto)}}" alt="responsive image" class="img-fluid">
                  </td>
                  <td>{{$resident->tempat_tgl_lahir}}</td>
                  <td>{{$resident->jenis_kelamin}}</td>
                  <td>{{$resident->alamat}}</td>
                  <td>{{$resident->rt_rw}}</td>
                  <td>{{$resident->kel_desa}}</td>
                  <td class="col-auto">
                      <div class="btn-group">
                        <div class="dropdown ">
                          @if ($resident->familie->isEmpty())
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-plus-square fa-lg"></i>
                          </button>
                          @endif
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton ">
                              <a href="{{route('buatkk',$resident->id)}}" class="dropdown-item">Phase 2</a>
                              <a href="{{route('selectkk',$resident->slug)}}" class="dropdown-item" >Pilih KK</a>
                          </div>
                        </div>
                      </div>
                      <div class="btn-group">
                        <div class="dropdown">
                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-pen-square fa-lg"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                          </div>

                        </div>
                      </div>
                          <a class=" btn btn-info" href="#"><i class="fa fa-eye fa-lg"></i></a>
                      <div class="btn-group">
                        <div class="dropdown ">
                          <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-trash fa-lg"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <form id="delete-form-{{$resident->id}}" action="{{ route('residents.destroy',$resident->id) }}" method="POST" >
                             @csrf
                             @method('DELETE')
                             <a href="#" class="dropdown-item" onclick="deleteItem({{$resident->id}})">Hapus</a>
                           </form>
                          </div>
                        </div>
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
