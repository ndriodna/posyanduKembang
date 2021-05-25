@extends('layouts.app')

@section('content')

<div class="container-fluid mt-8">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Penyuluhan</h4>
        </div>
        <div class="card-body">
          <div class="col-sm-4">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</a>
          </div><br>
          <div class="table-responsive">
            <table class="table dt-responsive" id="DataTable">
              <thead>
                <th>Tgl</th>
                <th>Waktu & Tempat</th>
                <th>Materi</th>
                <th>Peserta</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($penyuluhans as $penyuluhan)
                <tr>
                  <td>{{date('d-m-y',strtotime($penyuluhan->tgl))}}</td>
                  <td>{{$penyuluhan->waktu_tempat}}</td>
                  <td>{{$penyuluhan->materi}}</td>
                  <td>{{$penyuluhan->peserta}}</td>
                  <td class="col-auto">
                    <div class="btn-group">
                      <div class="dropdown ">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton ">
                        </div>
                      </div>
                    </div>
                    <div class="btn-group">
                      <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-pen-square fa-lg"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="{{route('penyuluhan.edit',$penyuluhan->id)}}" class="dropdown-item">Ubah Data</a>
                        </div>
                      </div>
                    </div>
                    <a class=" btn btn-info" href="{{route('penyuluhan.show',$penyuluhan->id)}}"><i class="fa fa-eye fa-lg"></i></a>
                    <div class="btn-group">
                      <div class="dropdown ">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-trash fa-lg"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <form id="delete-form-{{$penyuluhan->id}}" action="{{ route('penyuluhan.destroy',$penyuluhan->id) }}" method="POST" >
                           @csrf
                           @method('DELETE')
                           <a href="#" class="dropdown-item" onclick="deleteItem({{$penyuluhan->id}})">Hapus</a>
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
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form class="form" method="POST" action="{{route('penyuluhan.store')}}" enctype="multipart/form-data">
          @csrf
          <h3 class="description text-center text-primary">Penyuluhan</h3>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="">Waktu & Tempat</label>
                  <input type="text" class="form-control" name="waktu_tempat" placeholder="Masukan waktu dan tempat">
                </div>
                <div class="form-group">
                  <label for="">Materi</label> <br>
                  <input type="text" class="form-control" name="materi" placeholder="Masukan materi">
                </div>
                <div class="form-group">
                  <label for="">Peserta</label> <br>
                  <input type="text" class="form-control" name="peserta" placeholder="Masukan peserta">
                </div>
                 <div class="form-group">
                  <label for="">Tanggal Penyuluhan</label>
                  <input type="date" class="form-control" name="tgl">
                <span class="text-danger">kosongkan bila tanggal sekarang</span>
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
