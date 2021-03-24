@extends('layouts.app')

@section('content')

<div class="container-fluid mt--8">
  <div class="row">
    <div class="col-lg-12 md-8 sm-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">KK</h4>
        </div>
        <div class="card-body">
          <form class="" action="{{route('families.store')}}" method="post">
            <div class="form-group">
              @csrf
              <label>Nama</label><br>
                <select class="selectpicker" data-style="btn btn-info" name="kk" >
                  <option value="{{$residents->id}}">{{$residents->nama}}</option>
                </select><br>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="no_kk" placeholder="No KK" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="name" placeholder="Confrim No KK">
            </div>
            <div class="form-group">
               <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="rt_rw" placeholder="RT/RW">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="kel_desa" placeholder="Kelurahan/Desa">
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="kecamatan" placeholder="kecamatan">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="kab_kota" placeholder="Kabupaten/Kota">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="provinsi" placeholder="Provinsi">
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
