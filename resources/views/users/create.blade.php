@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<h3 class="description text-center text-success">Buat Akun</h3>
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
							<label class="form-control-label">Role</label><br>
							<select name="role" class="selectpicker" data-style="btn btn-info">
								@foreach($roles as $data)
								<option value="{{$data->name}}">
									{{$data->name}}
								</option>
								@endforeach
							</select>
							<p class="text-danger">{{ $errors->first('role') }}</p>
						</div>
						<div class="form-group">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<label>Foto</label>
								<div class="fileinput-new img-thumbnail" >
								</div>
								<div class="fileinput-preview fileinput-exists img-thumbnail" ></div>
								<div>
									<span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Pilih Foto</span><span class="fileinput-exists">Ganti</span><input type="file" name="img"></span>
									<a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Buang</a>
								</div>
							</div>
							<p class="text-danger">{{ $errors->first('img') }}</p>
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
