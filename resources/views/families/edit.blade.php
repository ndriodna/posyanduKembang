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
          <form class="form" method="POST" action="{{route('test.update', $residents->id)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
          <h3 class="description text-center text-success">Data Keluarga</h3>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$residents->id}}" aria-expanded="false" aria-controls="collapseExample">
                  {{$families->no_kk}}
                </button>

              <div class="collapse" id="collapseExample{{$residents->id}}">
                <div class="card card-body">
                  <div class="form-group">
                     <textarea class="form-control" name="alamat" placeholder="Alamat" rows="4">{{$residents->family['alamat']}}</textarea>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="rt_rw" value="{{$residents->family['rt_rw']}}" placeholder="RT/RW">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="kode_pos" value="{{$residents->family['kode_pos']}}" placeholder="Kode Pos">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="kel_desa" value="{{$residents->family['kel_desa']}}" placeholder="Kelurahan/Desa">
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control" name="kecamatan" value="{{$residents->family['kecamatan']}}" placeholder="kecamatan">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="kab_kota" value="{{$residents->family['kab_kota']}}" placeholder="Kabupaten/Kota">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="provinsi" value="{{$residents->family['provinsi']}}" placeholder="Provinsi">
                  </div>
                </div>
              </div>


              </div>
            </div>
          </div>
          </div>
          <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
       </div>
     </div>
   </div>
 </div>
</div>

@endsection
