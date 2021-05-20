@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <form class="form" method="POST" action="{{route('pencatatan.update',$pencatatan->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <h3 class="description text-center text-success">Edit Pencatatan</h3>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                @foreach ($pencatatan->pendaftaran as $data)
                <div class="form-group">
                  <label for="">Nama</label> <br>
                  <select name="pendaftaran_id" id="" class="selectpicker">
                      <option value="{{$data->id}}">{{$data->nama}}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Umur / Bulan</label><br>
                  <input type="text" class="form-control" name="umur" value="
                  {{Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($data->tgl_lahir))}}" readonly>
                </div>
                 <div class="form-group">
                <label for="">Berat Badan lahir / Kg</label><br>
                <input type="number" class="form-control" value="{{$data->bb_lahir}}" readonly>
              </div>
               <div class="form-group">
                <label for="">Tinggi Badan lahir / CM</label>
                <input type="number" class="form-control" value="{{$data->tb_lahir}}" readonly>
              </div>
              <div class="form-group">
                <label for="">Berat Badan / Kg</label><br>
                <input type="number" class="form-control" name="bb_kg" placeholder="Berat Badan" step=".01" autofocus value="{{$pencatatan->bb_kg}}">
              </div>
              <div class="form-group">
                <label for="">Tinggi Badan / CM</label>
                <input type="number" class="form-control" name="tb_cm" step=".01" placeholder="Tinggi Badan" value="{{$pencatatan->tb_cm}}">
              </div>
              <div class="form-group">
                <label for="">Lingkaran Kepala / CM</label>
                <input type="number" class="form-control" name="lingkar_kepala" step=".01" placeholder="Lingkaran Kepala" value="{{$pencatatan->lingkar_kepala}}">
              </div>
              <div class="form-group">
                <label for="">NTOB</label> <br>
                <select name="ntob" id="" class="selectpicker">
                  <option value="{{$pencatatan->ntob}}">{{$pencatatan->ntob}}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">keterangan</label>
                <textarea name="keterangan" class="form-control" rows="8" cols="80">{!!$pencatatan->keterangan!!}</textarea>
              </div>
              <div class="form-group">
                <label for="">Tanggal Timbang</label>
                <input type="date" name="tgl" class="form-control" value="{{ date('Y-m-d',strtotime($pencatatan->tgl)) }}"/>
              </div>
            @endforeach

            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer justify-content-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
