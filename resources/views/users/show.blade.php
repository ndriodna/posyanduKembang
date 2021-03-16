@extends('layouts.app')

@section('content')
    <div class="container-fluid mb-5">
       <h3 class="text-white">User Detail</h3>
   <div class="bg-white rounded shadow-lg">
    @if(!empty($user->img))
    <div class="form-row p-2">
        <img src="{{asset('storage/'.$user->img)}}" alt="" width="100" height="100">
    </div>
    @else
    <img src="http://via.placeholder.com/100x100">
    @endif
    <div class="form-row p-2">
     <div class="col-md-4">Nama</div>
     <div class="col-md-8">{{$user->name}}</div>
    </div>
    <div class="form-row p-2">
     <div class="col-md-4">Email</div>
     <div class="col-md-8">{{$user->email}}</div>
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
@endsection
