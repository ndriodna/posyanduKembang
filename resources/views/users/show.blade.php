@extends('layouts.app')

@section('content')
<div class="container-fluid mb-5">
 <div class="row">
  <div class="col-lg-12 col-md-8 col-sm-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Detail User</h3>
      </div>
      <div class="card-body">

        @if(!empty($user->img))
        <div class="form-row p-2">
          <img src="{{asset('storage/'.$user->img)}}" alt="" width="100" height="100">
        </div>
        @else
        <img src="http://via.placeholder.com/100x100">
        @endif
        <div class="form-row p-2">
         <div class="col-md-4">Username</div>
         <div class="col-md-8">{{$user->name}}</div>
       </div>
       <div class="form-row p-2">
         <div class="col-md-4">Role</div>
         <div class="col-md-8">
          @foreach($user->getRoleNames() as $role)
          {{$role}}
          @endforeach
        </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
