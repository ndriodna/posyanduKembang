@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Buat Brand</h4>
        </div>
        <div class="card-body">
          <form class="" action="{{route('brands.store')}}" method="post">
          @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="familie_id" placeholder="ID Keluarga" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Nama Brand" required>
            </div>
            <div class="form-group">
               <textarea class="form-control my-editor" name="desc" placeholder="Deskripsi" rows="4"></textarea>
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
