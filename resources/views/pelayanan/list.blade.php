@extends('layouts.app')

@section('content')

<div class="container-fluid mt-8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Pelayanan</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="DataTable">
              <thead>
                <th>BPJS</th>
                <th>nama</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($pelayanan as $data)
                <tr>
                  <td>{{$data->pendaftaran->no_bpjs}}</td>
                  <td>{{$data->pendaftaran->nama}}</td>
                  <td>{{$data->jenis_pelayanan}}</td>
                  <td>{!!$data->keterangan!!}</td>
                  <td class="col-auto">
                    <div class="btn-group">
                      <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-pen-square fa-lg"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a href="{{route('pelayanan.edit',$data->id)}}" class="dropdown-item">Ubah Data</a>
                        </div>
                      </div>
                    </div>
                    <a class=" btn btn-info" href="{{route('pelayanan.show',$data->id)}}"><i class="fa fa-eye fa-lg"></i></a>
                    <div class="btn-group">
                      <div class="dropdown ">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-trash fa-lg"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <form id="delete-form-{{$data->id}}" action="{{ route('pelayanan.destroy',$data->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <a href="#" class="dropdown-item" onclick="deleteItem({{$data->id}})">Hapus</a>
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


@endsection
