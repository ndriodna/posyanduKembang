@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Brand</h4>
        </div>
        <div class="card-body">
          @foreach ($families as $familie)
            User
            @foreach ($familie->user as $user)
              <h5>{{$user->name}}</h5>
            @endforeach
            Anggota
            @foreach ($familie->resident as $resident)
              <h5>{{$resident->nama}}</h5>
            @endforeach
          @endforeach
            <div class="col-sm-4">
              <a href="{{route('brands.create')}}" class="btn btn-success">Buat</a>
            </div>
            <br>
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

@endsection
