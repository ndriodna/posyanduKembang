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
            <table class="table" id="DataTable">
              <thead>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kategori</th>
                <th>RT/RW</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($pengunjungs as $pengunjung)
                <tr>
                  <td>{{$pengunjung->nik}}</td>
                  <td>{{$pengunjung->nama}}</td>
                  <td>{{$pengunjung->tgl_lahir}}</td>
                  <td>{{$pengunjung->jenis_kelamin}}</td>
                  <td>{{$pengunjung->kategori}}</td>
                  <td>{{$pengunjung->rt_rw}}</td>
                  <td class="col-auto">
                      <div class="btn-group">
                        <div class="dropdown ">
                        {{--   @if ($pengunjung->familie->isEmpty())
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-plus-square fa-lg"></i>
                          </button>
                          @endif --}}
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton ">
                              {{-- <a href="{{route('buatkk',$pengunjung->id)}}" class="dropdown-item">Phase 2</a> --}}
                              {{-- <a href="{{route('selectkk',$pengunjung->slug)}}" class="dropdown-item" >Pilih KK</a> --}}
                          </div>
                        </div>
                      </div>
                      <div class="btn-group">
                        <div class="dropdown">
                          <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-pen-square fa-lg"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a href="{{route('pengunjung.edit',$pengunjung->id)}}" class="dropdown-item">Ubah Data</a>
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
                            <form id="delete-form-{{$pengunjung->id}}" action="{{ route('pengunjung.destroy',$pengunjung->id) }}" method="POST" >
                             @csrf
                             @method('DELETE')
                             <a href="#" class="dropdown-item" onclick="deleteItem({{$pengunjung->id}})">Hapus</a>
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
        <form class="form" method="POST" action="{{route('pengunjung.store')}}" enctype="multipart/form-data">
          @csrf
          <h3 class="description text-center text-success">Pendaftaran</h3>
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
                  <label for="">Tgl Lahir</label><br>
                  <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label><br>
                  <select class="selectpicker" data-style="btn btn-info" name="jenis_kelamin" >
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">kategori</label><br>
                  <select class="selectpicker" data-style="btn btn-info" name="kategori" >
                    <option value="ibu hamil">Ibu Hamil</option>
                    <option value="anak-anak">Anak-anak</option>
                    <option value="balita">Balita</option>
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
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>

@endsection
