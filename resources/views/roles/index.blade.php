@extends('layouts.app')
@section('content')

<div class="container-fluid">
  <div class="row">

   <div class="col-lg-4 col-md-4 col-sm-12">
     <div class="card">
       <div class="card-header">
         <h4 class="card-title">Role User</h4>
       </div>
       <div class="card-body">
        <form action="{{route('roles.store')}}" method="POST" class="card-body">
          @csrf
          <div class="form-group">
            <label for="">Masukan Role</label>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " required>
          </div>
          <button class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-4 col-sm-12">
    <div class="card rounded shadow-lg">
      <div class="card-body">
        
        <div class="table-responsive">
         <table class="table table-striped table-bordered data-table bg-white text-dark card-body" id="DataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Role</th>
              <th>Guard</th>
              <th width="100px">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1; @endphp
            @foreach($roles as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->guard_name}}</td>
              <td>
                <form action="{{route('roles.destroy',$data->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
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