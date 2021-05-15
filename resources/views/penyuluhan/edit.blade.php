@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 md-6 sm-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Edit Penyuluhan</h5>
        </div>
        <div class="card-body">
          <form action="{{route('penyuluhan.update',$penyuluhan)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="form-control-label">Waktu Tempat</label>
              <input type="text" class="form-control" name="waktu_tempat" placeholder="Masukan waktu dan tempat" value="{{$penyuluhan->waktu_tempat}}">
            </div>
            <div class="form-group">
              <label class="form-control-label">Materi</label>
              <input type="text" class="form-control" name="materi" placeholder="Masukan materi" value="{{$penyuluhan->materi}}">
            </div>
            <div class="form-group">
              <label class="form-control-label">Peserta</label>
              <input type="text" class="form-control" name="peserta" placeholder="Masukan peserta" value="{{$penyuluhan->peserta}}">
            </div>
            <div class="form-group">
             <button type="submit" class="btn btn-success">Ubah</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
