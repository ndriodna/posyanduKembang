@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data Keluarga</h4>
        </div>
        <div class="card-body">
            {{-- <div class="col-sm-4">
              <a href="{{route('families.index')}}" class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data</a>
            </div><br> --}}
          <div class="table-responsive">
            <table class="table" id="residentTable">
              <thead>
                <th>No KK</th>
                <th>Anggota Keluarga</th>
                <th>test</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($families as $familie)
                <tr>
                  <td>{{$familie->no_kk}}</td>
                  <td>@foreach($familie->resident as $pp)
                    {{$pp->nama}}
                  @endforeach
                </td>
                  <td>
                    @foreach($familie->user as $pp)
                        {{$pp->id}}
                      @endforeach
                  </td>
                  <td class="col-1">
                      <div class="btn-group">
                        <div class="dropdown ">
                          <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-plus-square fa-lg"></i>
                          </button>
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
                            <form id="delete-form-{{$familie->id}}" action="{{ route('families.destroy',$familie->id) }}" method="POST" >
                             @csrf
                             @method('DELETE')
                             <a href="#" class="dropdown-item" onclick="deleteItem({{$familie->id}})">Hapus KK</a>
                           </form>
                           @foreach($users as $user)
                             {{-- @foreach($users->familie as $qq) klo mau harusnya gini--}}

                           <form id="delete-form-{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <a href="#" class="dropdown-item" onclick="deleteItem({{$user->id}})">Hapus - {{$user->name}}</a>
                          </form>
                        @endforeach
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
<form class="form" method="POST" action="{{route('families.store')}}" enctype="multipart/form-data">
@csrf
<h3 class="description text-center text-success">Input Data Keluarga</h3>
<div class="card-body">
  <div class="row">
    <div class="col-12">
      <div class="form-group">
          <input type="number" class="form-control" name="no_kk" placeholder="No KK" required>
      </div>
      <div class="form-group">
        <label for="">Kepala Keluarga</label><br>
        <select class="selectpicker" data-style="btn btn-info" name="kepala_keluarga" data-live-search="true">
          @foreach($residents as $resident)
            @if($resident->jenis_kelamin == 'laki-laki')
            <option value="{{$resident->id}}">{{$resident->nama}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">Anggota Keluarga</label><br>
        <select multiple class="selectpicker" data-style="btn btn-info" name="anggota[]" data-live-search="true">
          @foreach($residents as $resident)
            <option value="{{$resident->id}}">{{$resident->nama}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
         <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4"></textarea>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="kel_desa" placeholder="Kelurahan/Desa">
      </div>
      <div class="form-group">
      <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="kab_kota" placeholder="Kabupaten/Kota">
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="provinsi" placeholder="Provinsi">
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
