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
            <div class="col-sm-4">
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Data</a>
            </div><br>
          <div class="table-responsive">
            <table class="table" id="residentTable">
              <thead>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($brands as $brand)
                <tr>
                  <td>{{$brand->title}}</td>
                  <td>{{$brand->desc}}</td>
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
                            <form id="delete-form-{{$brand->id}}" action="{{ route('brands.destroy',$brand->id) }}" method="POST" >
                             @csrf
                             @method('DELETE')
                             <a href="#" class="dropdown-item" onclick="deleteItem({{$brand->id}})">Hapus KK</a>
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
<form class="form" method="POST" action="{{route('brands.store')}}" enctype="multipart/form-data">
@csrf
<h3 class="description text-center text-success">Input Data Keluarga</h3>
<div class="card-body">
  <div class="row">
    <div class="col-12">
      <div class="form-group">
          <input type="text" class="form-control" name="familie_id" placeholder="ID Keluarga" required>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" name="title" placeholder="Nama Brand" required>
      </div>
      <div class="form-group">
         <textarea class="form-control my-editor" name="desc" placeholder="Deskripsi" rows="4"></textarea>
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
