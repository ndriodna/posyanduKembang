@extends('layouts.app')
@section('content')

<div class="container-fluid mt-8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Data User</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="col-sm-4">
							<a href="{{route('user.create')}}" class="btn btn-success m-3"><i class="fas fa-plus-square"></i> Tambah</a>
            </div><br>
            <table class="table table-striped table-bordered data-table bg-white tex-dark" id="residentTable">
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Status</th>
									<th width="100px">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $data)
								<tr>
									<td><a href="{{route('user.show',$data->id)}}">{{$data->name}}</a></td>
									<td>{{$data->email}}</td>
									<td>
										@foreach($data->getRoleNames() as $role)
										{{$role}}
										@endforeach
									</td>
									<td>{{$data->status}}</td>
									<td>
										<form action="{{route('user.destroy',$data->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<a href="{{route('user.edit',$data->id)}}" class="btn btn-warning"><i class="fas fa-pen-square"></i></a>
											@foreach($data->getRoleNames() as $role)
											@if($role == "Admin")
											@else
											<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
											@endif
											@endforeach
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