@extends('layouts.app')

@section('content')
    <div class="container-fluid">
     <form action="{{route('user.store')}}" method="POST" class="bg-white rounded p-6 shadow-lg mb-5" enctype="multipart/form-data">
         @csrf
	    <div class="form-group">
	         <label class="form-control-label">Nama</label>
	         <input class="form-control" type="text" name="name" required>
         <p class="text-danger">{{ $errors->first('name') }}</p>
	    </div>
      <div class="form-group">
         <label class="form-control-label">Email</label>
         <input class="form-control" type="email" name="email" required>
       <p class="text-danger">{{ $errors->first('email') }}</p>
     </div>
	   <div class="form-group">
	        <label class="form-control-label">Password</label>
	        <input class="form-control" type="password" name="password" required>
         <p class="text-danger">{{ $errors->first('password') }}</p>
	    </div>
	     <div class="form-group">
	        <label class="form-control-label">Role</label>
	        <select name="role" class="form-control">
	        @foreach($roles as $data)
	       <option value="{{$data->name}}">
	          {{$data->name}}
	       </option>
	       @endforeach
	        </select>
         <p class="text-danger">{{ $errors->first('role') }}</p>
	    </div>
	    <div class="form-group">
    	<div class="custom-file">
        <input type="file" class="custom-file-input" name="img">
        <label class="custom-file-label" for="customFileLang">Pilih Gambar </label>
	    </div>
         <p class="text-danger">{{ $errors->first('img') }}</p>
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-success">Simpan</button>
	    </div>
	     </form>
 </div>
@endsection
