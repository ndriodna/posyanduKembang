@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 md-6 sm-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Edit User</h5>
          </div>
          <div class="card-body">
            <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
       	    <div class="form-group">
       	         <label class="form-control-label">Nama</label>
       	         <input class="form-control" type="text" name="name" value="{{$user->name}}" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
       	    </div>
             <div class="form-group">
                <label class="form-control-label">Email</label>
                <input class="form-control" type="email" name="email" value="{{$user->email}}" required>
              <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>
       	   <div class="form-group">
       	        <label class="form-control-label">Password</label>
       	        <input class="form-control" type="password" name="password">
                <p class="text-warning">Kosongkan password jika tidak diubah</p>
                <p class="text-danger">{{ $errors->first('password') }}</p>
       	    </div>
       	    {{-- <div class="form-group">
              <label class="form-control-label">Pilih Gambar</label>
               <input type="file" class="form-control" name="img">
       	       <img src="{{asset('storage/'.$user->img)}}" alt="" width="100" height="100" class="p-2">
                <p class="text-danger">{{ $errors->first('img') }}</p>
       	    </div> --}}
             <div class="form-group">
               <div class="fileinput fileinput-new" data-provides="fileinput">
                 <div class="fileinput-preview thumbnail" data-trigger="fileinput"><img src="{{url('storage/'.$user->img)}}" alt="" width="100" height="100" class="p-2">
                   <p class="text-danger">{{ $errors->first('img') }}</p>
                 </div>
                 <div>
                   <span class="btn btn-success btn-file"><span class="fileinput-new">Pilih Gambar</span>
                   <span class="fileinput-exists">Change</span>
                   <input type="file" name="img"></span>
                   <a href="#" class="btn btn-success fileinput-exists" data-dismiss="fileinput">Remove</a>
                 </div>
               </div>
             </div>
       	    <div class="form-group">
       	    	<button type="submit" class="btn btn-success">Simpan</button>
       	    </div>
       	     </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
